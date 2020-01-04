package com.ground11.g11.MyTabFragment;

import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.support.design.widget.BottomSheetDialog;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.DefaultItemAnimator;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.Window;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;
import com.ground11.g11.APICallingPackage.Class.APIRequestManager;
import com.ground11.g11.APICallingPackage.Class.Validations;
import com.ground11.g11.APICallingPackage.Interface.ResponseManager;
import com.ground11.g11.Bean.BeanMyFixLeaderboard;
import com.ground11.g11.Config;
import com.ground11.g11.ContestListActivity;
import com.ground11.g11.CreateTeamActivity;
import com.ground11.g11.R;
import com.ground11.g11.SessionManager;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.List;

import static com.ground11.g11.APICallingPackage.Class.Validations.ShowToast;
import static com.ground11.g11.Config.MYFIXTURELEADERBOARD;
import static com.ground11.g11.Config.MYFIXTURELEADERBOARDTEAM;
import static com.ground11.g11.Constants.MYFIXTURELEADERBORADTEAMTYPE;
import static com.ground11.g11.Constants.MYFIXTURELEADERBORADTYPE;

public class MyFixtureContestDetailsActivity extends AppCompatActivity implements ResponseManager {


    MyFixtureContestDetailsActivity activity;
    Context context;
    RecyclerView Rv_MyFixLeaderboard;

    AdapterLeaderboard adapterLeaderboard;

    ResponseManager responseManager;
    APIRequestManager apiRequestManager;

    ImageView im_back;
    TextView tv_HeaderName,tv_ContestTimer,tv_ContestTeamsName;

    TextView tv_TotalWinning,tv_EntryFess,tv_JoinedWithTeam,tv_TotalJoinedTeamCount;

    boolean Add_View=true;
    String UserTeamId;
    BottomSheetDialog dialogGroundView=null;
    String match_status,ApiUserId;
    SessionManager sessionManager;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_my_fixture_contest_details);
        context = activity = this;
        initViews();
        sessionManager = new SessionManager();

        tv_ContestTeamsName.setText(MyJoinedFixtureContestListActivity.IntenTeamsName);
        tv_ContestTimer.setText(MyJoinedFixtureContestListActivity.IntentTime);

        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);


        Rv_MyFixLeaderboard.setHasFixedSize(true);
        Rv_MyFixLeaderboard.setNestedScrollingEnabled(false);
        RecyclerView.LayoutManager mLayoutManager = new LinearLayoutManager(activity);
        Rv_MyFixLeaderboard.setLayoutManager(mLayoutManager);
        Rv_MyFixLeaderboard.setItemAnimator(new DefaultItemAnimator());

        callLeaderboardList(true);

        Validations.CountDownTimer(MyJoinedFixtureContestListActivity.IntentTime,tv_ContestTimer);




    }

    public void initViews(){
        Rv_MyFixLeaderboard =  findViewById(R.id.Rv_MyFixLeaderboard);
        tv_ContestTimer =  findViewById(R.id.tv_ContestTimer);
        tv_ContestTeamsName =  findViewById(R.id.tv_ContestTeamsName);

        tv_TotalJoinedTeamCount =  findViewById(R.id.tv_TotalJoinedTeamCount);
        tv_JoinedWithTeam =  findViewById(R.id.tv_JoinedWithTeam);
        tv_EntryFess =  findViewById(R.id.tv_EntryFess);
        tv_TotalWinning =  findViewById(R.id.tv_TotalWinning);




        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);

        tv_HeaderName.setText("CONTESTS");
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

              onBackPressed();
            }
        });

    }



    private void callLeaderboardList(boolean isShowLoader) {
        try {
            apiRequestManager.callAPI(MYFIXTURELEADERBOARD,
                    createRequestJson(), context, activity, MYFIXTURELEADERBORADTYPE,
                    isShowLoader,responseManager);
        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJson() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("contest_id", MyJoinedFixtureContestListActivity.ContestId);
            jsonObject.put("user_id", sessionManager.getUser(context).getUser_id());

        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }


    private void callLeaderboardTeam(boolean isShowLoader) {
        try {

            JSONObject jsonObject = new JSONObject();
            jsonObject.put("team_id", UserTeamId);
            jsonObject.put("match_id", MyJoinedFixtureContestListActivity.Matchid);

            apiRequestManager.callAPI(MYFIXTURELEADERBOARDTEAM,
                   jsonObject, context, activity, MYFIXTURELEADERBORADTEAMTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {

        if (type.equals(MYFIXTURELEADERBORADTEAMTYPE)){

            DialogGroundView(result);
        }
        else {

            try {
                String prize_pool = result.getString("prize_pool");
                String entry = result.getString("entry");
                String all_team_count = result.getString("all_team_count");
                String user_team_count = result.getString("user_team_count");
                 match_status = result.getString("match_status");

                tv_EntryFess.setText("₹ " + entry);
                tv_TotalWinning.setText("₹ " + prize_pool);
                tv_TotalJoinedTeamCount.setText(all_team_count + " Teams");
                tv_JoinedWithTeam.setText(user_team_count + " Teams");


                JSONArray jsonArray = result.getJSONArray("leaderboard");
                List<BeanMyFixLeaderboard> beanContestLists = new Gson().fromJson(jsonArray.toString(),
                        new TypeToken<List<BeanMyFixLeaderboard>>() {
                        }.getType());
                adapterLeaderboard = new AdapterLeaderboard(beanContestLists, activity);
                Rv_MyFixLeaderboard.setAdapter(adapterLeaderboard);

            } catch (Exception e) {
                e.printStackTrace();
            }
            adapterLeaderboard.notifyDataSetChanged();
        }
    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    @Override
    public void onError(Context mContext, String type, String message) {
        //ShowToast(context,message);

    }

    public class AdapterLeaderboard extends RecyclerView.Adapter<AdapterLeaderboard.MyViewHolder> {
        private List<BeanMyFixLeaderboard> mListenerList;
        Context mContext;


        public AdapterLeaderboard(List<BeanMyFixLeaderboard> mListenerList, Context context) {
            mContext = context;
            this.mListenerList = mListenerList;
        }

        public class MyViewHolder extends RecyclerView.ViewHolder {
            TextView tv_LeaderboardPlayerTeamName,tv_LeaderboardPlayerRank;
            ImageView im_LeaderboardPlayerAvtar;
            RelativeLayout RL_LeaderboardMain;

            public MyViewHolder(View view) {
                super(view);

                im_LeaderboardPlayerAvtar = view.findViewById(R.id.im_LeaderboardPlayerAvtar);
                tv_LeaderboardPlayerTeamName = view.findViewById(R.id.tv_LeaderboardPlayerTeamName);
                tv_LeaderboardPlayerRank = view.findViewById(R.id.tv_LeaderboardPlayerRank);
                RL_LeaderboardMain = view.findViewById(R.id.RL_LeaderboardMain);



            }

        }
        @Override
        public int getItemCount() {
            return mListenerList.size();
        }

        @Override
        public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
            View itemView = LayoutInflater.from(parent.getContext())
                    .inflate(R.layout.adapter_leaderboard_list, parent, false);

            return new MyViewHolder(itemView);
        }

        @Override
        public void onBindViewHolder(final MyViewHolder holder, final int position) {

            ApiUserId = mListenerList.get(position).getUser_id();
            String name= mListenerList.get(position).getName();
            String rank= mListenerList.get(position).getRank();
            String id= mListenerList.get(position).getId();
            String Image= mListenerList.get(position).getImage();
            String Team= mListenerList.get(position).getTeam();





            holder.tv_LeaderboardPlayerTeamName.setText(name+"(T"+Team+")");
            holder.tv_LeaderboardPlayerRank.setText(rank);

            Glide.with(activity).load(Config.LEADERBOARDPLAYERIMAGE+Image)
                    .crossFade()
                    .diskCacheStrategy(DiskCacheStrategy.ALL)
                    .into(holder.im_LeaderboardPlayerAvtar);


            if (ApiUserId.equals(sessionManager.getUser(activity).getUser_id())){
                holder.RL_LeaderboardMain.setBackgroundResource(R.drawable.leaderboard_dark_rectangle);
                holder.tv_LeaderboardPlayerTeamName.setTextColor(Color.parseColor("#ffffff"));
                holder.tv_LeaderboardPlayerRank.setTextColor(Color.parseColor("#ffffff"));
            }
            else {
                holder.RL_LeaderboardMain.setBackgroundResource(R.drawable.white_rectangle);
                holder.tv_LeaderboardPlayerTeamName.setTextColor(Color.parseColor("#1e1e1e"));
                holder.tv_LeaderboardPlayerRank.setTextColor(Color.parseColor("#1e1e1e"));
            }


            holder.itemView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    UserTeamId = mListenerList.get(position).getTeamid();
                    ApiUserId = mListenerList.get(position).getUser_id();
                    if (ApiUserId.equals(sessionManager.getUser(activity).getUser_id())){
                        callLeaderboardTeam(true);
                    }
                    else {
                        if (match_status.equals("1")){
                            callLeaderboardTeam(true);
                        }
                        else {
                            ShowToast(context,"Please Wait! Match has not started yet.");
                        }
                    }
                }
            });
        }

    }
    public void DialogGroundView(JSONObject result){
       /* dialogGroundView = new BottomSheetDialog(activity);
        dialogGroundView.requestWindowFeature(Window.FEATURE_NO_TITLE);
        dialogGroundView.setContentView(R.layout.dialog_ground_view);

        final LinearLayout LL_GroundWK = dialogGroundView.findViewById(R.id.LL_GroundWK);
        final LinearLayout LL_GroundBAT = dialogGroundView.findViewById(R.id.LL_GroundBAT);
        final LinearLayout LL_GroundAR = dialogGroundView.findViewById(R.id.LL_GroundAR);
        final LinearLayout LL_GroundBOWL = dialogGroundView.findViewById(R.id.LL_GroundBOWL);
        ImageView im_CloseIcon = dialogGroundView.findViewById(R.id.im_CloseIcon);
        dialogGroundView.show();
        im_CloseIcon.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                dialogGroundView.dismiss();
            }
        });*/
        if (dialogGroundView == null){
            dialogGroundView = new BottomSheetDialog(activity);
            dialogGroundView.requestWindowFeature(Window.FEATURE_NO_TITLE);
            dialogGroundView.setContentView(R.layout.dialog_ground_view); // initiate it the way you need
            dialogGroundView.show();

        }
        else if (!dialogGroundView.isShowing()){
            dialogGroundView.show();
        }


        final LinearLayout LL_GroundWK = dialogGroundView.findViewById(R.id.LL_GroundWK);
        final LinearLayout LL_GroundBAT = dialogGroundView.findViewById(R.id.LL_GroundBAT);
        final LinearLayout LL_GroundAR = dialogGroundView.findViewById(R.id.LL_GroundAR);
        final LinearLayout LL_GroundBOWL = dialogGroundView.findViewById(R.id.LL_GroundBOWL);
        ImageView im_CloseIcon = dialogGroundView.findViewById(R.id.im_CloseIcon);
        ImageView im_Editteam = dialogGroundView.findViewById(R.id.im_Editteam);
        ImageView im_Refresh=dialogGroundView.findViewById(R.id.im_Refresh);
        im_Refresh.setVisibility(View.GONE);
        im_Editteam.setVisibility(View.VISIBLE);
        im_CloseIcon.setOnClickListener(
                new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                dialogGroundView.dismiss();
                dialogGroundView=null;
                Add_View=true;

            }
        });
        im_Editteam.setOnClickListener(
                new View.OnClickListener() {
                    @Override
                    public void onClick(View view) {
                    ContestListActivity.JoinMyTeamId=UserTeamId;
                    ContestListActivity.MyTeamEditorSave = "Edit";
                    ContestListActivity.IntentMatchId= MyJoinedFixtureContestListActivity.Matchid;
                    Intent i = new Intent(activity, CreateTeamActivity.class);
                    i.putExtra("Activity", "MyFixtureContestDetailActivity");
                    startActivity(i);

                    }
                }
        );

        try {
            JSONArray jsonArray = result.getJSONArray("data");
            Log.e("jsonArray",jsonArray.toString());
            for (int i = 0; i < jsonArray.length(); i++) {
                JSONObject userData = jsonArray.getJSONObject(i);

                String PlayerId = userData.getString("player_id");
                String IsSelected = userData.getString("is_select");
                String Role = userData.getString("short_term");
                String player_shortname = userData.getString("player_shortname");
                String PlayerImage = userData.getString("image");
                String PlayerCredit = userData.getString("credit_points");
                String is_captain = userData.getString("is_captain");
                String is_vicecaptain = userData.getString("is_vicecaptain");
                if (is_captain==null){
                    is_captain = "0";
                }
                if (is_vicecaptain==null){
                    is_vicecaptain = "0";
                }

                if (IsSelected.equals("1")) {
                    if (Role.equals("WK")) {
                        View to_add = LayoutInflater.from(context).inflate(R.layout.item_ground_player,
                                LL_GroundWK, false);
                        ImageView im_GroundPlayerImage = to_add.findViewById(R.id.im_GroundPlayerImage);
                        TextView tv_GroundPlayerName = to_add.findViewById(R.id.tv_GroundPlayerName);
                        TextView tv_GroundPlayerCredit = to_add.findViewById(R.id.tv_GroundPlayerCredit);
                        TextView tv_CorVC = to_add.findViewById(R.id.tv_CorVC);

                        Glide.with(activity).load(Config.PLAYERIMAGE + PlayerImage)
                                .crossFade()
                                .diskCacheStrategy(DiskCacheStrategy.ALL)
                                .into(im_GroundPlayerImage);
                        tv_GroundPlayerName.setText(player_shortname);
                        tv_GroundPlayerCredit.setText(PlayerCredit + " Cr");

                        if (is_captain.equals("1")){
                            tv_CorVC.setVisibility(View.VISIBLE);
                            tv_CorVC.setText(" C ");
                        }
                        if (is_vicecaptain.equals("1")){
                            tv_CorVC.setVisibility(View.VISIBLE);
                            tv_CorVC.setText("VC");
                        }
                       // LL_GroundWK.addView(to_add);
                        if (Add_View) {
                            LL_GroundWK.addView(to_add);
                        }

                    } else if (Role.equals("BAT")) {
                        View to_add = LayoutInflater.from(context).inflate(R.layout.item_ground_player,
                                LL_GroundBAT, false);
                        ImageView im_GroundPlayerImage = to_add.findViewById(R.id.im_GroundPlayerImage);
                        TextView tv_GroundPlayerName = to_add.findViewById(R.id.tv_GroundPlayerName);
                        TextView tv_GroundPlayerCredit = to_add.findViewById(R.id.tv_GroundPlayerCredit);
                        TextView tv_CorVC = to_add.findViewById(R.id.tv_CorVC);

                        Glide.with(activity).load(Config.PLAYERIMAGE + PlayerImage)
                                .crossFade()
                                .diskCacheStrategy(DiskCacheStrategy.ALL)
                                .into(im_GroundPlayerImage);

                        tv_GroundPlayerName.setText(player_shortname);
                        tv_GroundPlayerCredit.setText(PlayerCredit + " Cr");

                        if (is_captain.equals("1")){
                            tv_CorVC.setVisibility(View.VISIBLE);
                            tv_CorVC.setText(" C ");
                        }
                        if (is_vicecaptain.equals("1")){
                            tv_CorVC.setVisibility(View.VISIBLE);
                            tv_CorVC.setText("VC");
                        }
                        //LL_GroundBAT.addView(to_add);
                        if (Add_View) {
                            LL_GroundBAT.addView(to_add);
                        }
                    } else if (Role.equals("AR")) {
                        View to_add = LayoutInflater.from(context).inflate(R.layout.item_ground_player,
                                LL_GroundAR, false);
                        ImageView im_GroundPlayerImage = to_add.findViewById(R.id.im_GroundPlayerImage);
                        TextView tv_GroundPlayerName = to_add.findViewById(R.id.tv_GroundPlayerName);
                        TextView tv_GroundPlayerCredit = to_add.findViewById(R.id.tv_GroundPlayerCredit);
                        TextView tv_CorVC = to_add.findViewById(R.id.tv_CorVC);

                        Glide.with(activity).load(Config.PLAYERIMAGE + PlayerImage)
                                .crossFade()
                                .diskCacheStrategy(DiskCacheStrategy.ALL)
                                .into(im_GroundPlayerImage);
                        tv_GroundPlayerName.setText(player_shortname);
                        tv_GroundPlayerCredit.setText(PlayerCredit + " Cr");

                        if (is_captain.equals("1")){
                            tv_CorVC.setVisibility(View.VISIBLE);
                            tv_CorVC.setText(" C ");
                        }
                        if (is_vicecaptain.equals("1")){
                            tv_CorVC.setVisibility(View.VISIBLE);
                            tv_CorVC.setText("VC");
                        }
                        //LL_GroundAR.addView(to_add);
                        if (Add_View) {
                            LL_GroundAR.addView(to_add);
                        }
                    } else if (Role.equals("BOWL")) {
                        View to_add = LayoutInflater.from(context).inflate(R.layout.item_ground_player,
                                LL_GroundBOWL, false);
                        ImageView im_GroundPlayerImage = to_add.findViewById(R.id.im_GroundPlayerImage);
                        TextView tv_GroundPlayerName = to_add.findViewById(R.id.tv_GroundPlayerName);
                        TextView tv_GroundPlayerCredit = to_add.findViewById(R.id.tv_GroundPlayerCredit);
                        TextView tv_CorVC = to_add.findViewById(R.id.tv_CorVC);

                        Glide.with(activity).load(Config.PLAYERIMAGE + PlayerImage)
                                .crossFade()
                                .diskCacheStrategy(DiskCacheStrategy.ALL)
                                .into(im_GroundPlayerImage);
                        tv_GroundPlayerName.setText(player_shortname);
                        tv_GroundPlayerCredit.setText(PlayerCredit + " Cr");

                        if (is_captain.equals("1")){
                            tv_CorVC.setVisibility(View.VISIBLE);
                            tv_CorVC.setText(" C ");
                        }
                        if (is_vicecaptain.equals("1")){
                            tv_CorVC.setVisibility(View.VISIBLE);
                            tv_CorVC.setText("VC");
                        }
                       // LL_GroundBOWL.addView(to_add);
                        if (Add_View) {
                            LL_GroundBOWL.addView(to_add);

                        }
                    }
                }

            }
            Add_View=false;

        } catch (Exception e) {
            e.printStackTrace();
        }


    }


}
