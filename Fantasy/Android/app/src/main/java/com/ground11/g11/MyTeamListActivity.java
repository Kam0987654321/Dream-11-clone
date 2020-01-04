package com.ground11.g11;

import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.os.Handler;
import android.support.design.widget.BottomSheetDialog;
import android.support.v4.widget.SwipeRefreshLayout;
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
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;
import com.ground11.g11.APICallingPackage.Class.APIRequestManager;
import com.ground11.g11.APICallingPackage.Class.Validations;
import com.ground11.g11.APICallingPackage.Interface.ResponseManager;
import com.ground11.g11.Bean.BeanMyTeamList;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.List;

import static com.ground11.g11.APICallingPackage.Class.Validations.ShowToast;
import static com.ground11.g11.Config.MYTEAMLIST;
import static com.ground11.g11.Config.PLAYERLIST;
import static com.ground11.g11.Constants.MYTEAMLISTTYPE;
import static com.ground11.g11.Constants.PLAYERLISTTYPE;
import static com.ground11.g11.ContestListActivity.JoinMyTeamId;

public class MyTeamListActivity extends AppCompatActivity implements ResponseManager {

    MyTeamListActivity activity;
    Context context;
    ImageView im_back;
    TextView tv_HeaderName,tv_MyTeamMatchTimer,tv_MyTeamsMatchName,tv_MyCreateTeam;
    RecyclerView Rv_MyTeamList;
    AdapterMyTeamList adapterMyTeamList;

    ResponseManager responseManager;
    APIRequestManager apiRequestManager;

    SessionManager sessionManager;
    BottomSheetDialog dialogGroundView;
   /* public static String MyTeamId;
    public static String JoinMyTeamId;*/
    TextView tv_NoDataAvailable;
    SwipeRefreshLayout swipeRefreshLayout;
    String EntryFee;
    int TeamCount = 0;
    String MyContestCode;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_my_team_list);

        context = activity = this;
        sessionManager = new SessionManager();
        initViews();

        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);

        tv_MyTeamsMatchName.setText(ContestListActivity.IntenTeamsName);
        tv_MyTeamMatchTimer.setText(ContestListActivity.IntentTime);

        Validations.CountDownTimer(ContestListActivity.IntentTime,tv_MyTeamMatchTimer);


        tv_MyCreateTeam.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                if (TeamCount<6) {
                    Intent i = new Intent(activity, CreateTeamActivity.class);
                    i.putExtra("Activity", "MyTeamListActivity");
                    startActivity(i);
                }
                else {
                    ShowToast(context,"You can only create maximum 6 Teams");
                }

            }
        });

        swipeRefreshLayout = findViewById(R.id.swipeRefreshLayout);
        swipeRefreshLayout.post(new Runnable() {
                                    @Override
                                    public void run() {
                                        swipeRefreshLayout.setRefreshing(true);
                                        callMyTeamList(false);
                                    }
                                }
        );

        swipeRefreshLayout.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {
                callMyTeamList(false);
            }
        });
    }

    public void initViews(){

        Rv_MyTeamList =  findViewById(R.id.Rv_MyTeamList);
        tv_MyTeamMatchTimer =  findViewById(R.id.tv_MyTeamMatchTimer);
        tv_MyTeamsMatchName =  findViewById(R.id.tv_MyTeamsMatchName);
        tv_MyCreateTeam =  findViewById(R.id.tv_MyCreateTeam);
        tv_NoDataAvailable =  findViewById(R.id.tv_NoDataAvailable);




        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);

        tv_HeaderName.setText("MY TEAMS");
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                onBackPressed();
            }
        });


        Rv_MyTeamList.setHasFixedSize(true);
        Rv_MyTeamList.setNestedScrollingEnabled(false);
        RecyclerView.LayoutManager mLayoutManager = new LinearLayoutManager(activity);
        Rv_MyTeamList.setLayoutManager(mLayoutManager);
        Rv_MyTeamList.setItemAnimator(new DefaultItemAnimator());

    }

    private void callMyTeamList(boolean isShowLoader) {
        try {

            apiRequestManager.callAPI(MYTEAMLIST,
                    createRequestJson(), context, activity, MYTEAMLISTTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJson() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("match_id", ContestListActivity.IntentMatchId);
            jsonObject.put("user_id", sessionManager.getUser(context).getUser_id());


        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }

    private void callMyTeamPlayerList(boolean isShowLoader) {

        try {

            apiRequestManager.callAPI(PLAYERLIST,
                    createRequestJson1(), context, activity, PLAYERLISTTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJson1() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("matchid", ContestListActivity.IntentMatchId);
            jsonObject.put("user_id", sessionManager.getUser(context).getUser_id());
            jsonObject.put("designationid", "0");
            jsonObject.put("my_team", "1");
            jsonObject.put("my_team_id", ContestListActivity.JoinMyTeamId);

        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }



    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {

        //ShowToast(context,message);
        if (type.equals(PLAYERLISTTYPE)){

            dialogGroundView = new BottomSheetDialog(activity);
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
            });


            try {
                JSONArray jsonArray = result.getJSONArray("data");
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
                    //String contest_id=userData.getString("contest_id");
                    //String entry_fees=userData.getString("entry_fees");
                    //String team_id=userData.getString("team_id");
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

                            LL_GroundWK.addView(to_add);
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
                            LL_GroundBAT.addView(to_add);
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

                            LL_GroundAR.addView(to_add);
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
                            LL_GroundBOWL.addView(to_add);
                        }
                    }

                }
            } catch (Exception e) {
                e.printStackTrace();
            }
        }
        else {
            swipeRefreshLayout.setRefreshing(false);
            tv_NoDataAvailable.setVisibility(View.GONE);
            Rv_MyTeamList.setVisibility(View.VISIBLE);
            try {
                JSONArray jsonArray = result.getJSONArray("data");
                Log.e("DataArray",jsonArray.toString());
                TeamCount = jsonArray.length();
                List<BeanMyTeamList> beanContestLists = new Gson().fromJson(jsonArray.toString(),
                        new TypeToken<List<BeanMyTeamList>>() {
                        }.getType());
                adapterMyTeamList = new AdapterMyTeamList(beanContestLists, activity);
                Rv_MyTeamList.setAdapter(adapterMyTeamList);

            } catch (Exception e) {
                e.printStackTrace();
            }
            adapterMyTeamList.notifyDataSetChanged();
        }
    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    @Override
    public void onError(Context mContext, String type, String message) {
        //ShowToast(context,message);
        if (type.equals(MYTEAMLISTTYPE)) {
            swipeRefreshLayout.setRefreshing(false);
            tv_NoDataAvailable.setVisibility(View.VISIBLE);
            Rv_MyTeamList.setVisibility(View.GONE);
        }
    }
    public class AdapterMyTeamList extends RecyclerView.Adapter<AdapterMyTeamList.MyViewHolder> {
        private List<BeanMyTeamList> mListenerList;
        Context mContext;


        public AdapterMyTeamList(List<BeanMyTeamList> mListenerList, Context context) {
            mContext = context;
            this.mListenerList = mListenerList;

        }

        public class MyViewHolder extends RecyclerView.ViewHolder {
            TextView tv_MyTeamName,tv_MyTeamCaptain,tv_MyTeamViceCaptain,tv_MyWKCount,tv_MyBATCount
                    ,tv_MyARCount,tv_MyBOWLCount,tv_JoinContestTeam;

            LinearLayout LL_MyTeamEdit,LL_MyTeamPreview,LL_MyTeamClone;


            public MyViewHolder(View view) {
                super(view);

                tv_MyTeamName = view.findViewById(R.id.tv_MyTeamName);
                tv_MyTeamCaptain = view.findViewById(R.id.tv_MyTeamCaptain);
                tv_MyTeamViceCaptain = view.findViewById(R.id.tv_MyTeamViceCaptain);
                tv_MyWKCount = view.findViewById(R.id.tv_MyWKCount);
                tv_MyBATCount = view.findViewById(R.id.tv_MyBATCount);
                tv_MyBOWLCount = view.findViewById(R.id.tv_MyBOWLCount);
                tv_MyARCount = view.findViewById(R.id.tv_MyARCount);
                tv_JoinContestTeam = view.findViewById(R.id.tv_JoinContestTeam);
                LL_MyTeamEdit = view.findViewById(R.id.LL_MyTeamEdit);
                LL_MyTeamPreview = view.findViewById(R.id.LL_MyTeamPreview);
                LL_MyTeamClone = view.findViewById(R.id.LL_MyTeamClone);

            }

        }
        @Override
        public int getItemCount() {
            return mListenerList.size();
        }

        @Override
        public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
            View itemView = LayoutInflater.from(parent.getContext())
                    .inflate(R.layout.adapter_my_team, parent, false);

            return new MyViewHolder(itemView);
        }

        @Override
        public void onBindViewHolder(final MyViewHolder holder, final int position) {

            final String Id = mListenerList.get(position).getId();
            final String TeamName = mListenerList.get(position).getTeam_number();
            final String Captain = mListenerList.get(position).getCaptain();
            final String ViceCaptain = mListenerList.get(position).getVicecaptain();
            final String BatCount = mListenerList.get(position).getBatsman();
            final String WkCount = mListenerList.get(position).getWkeeper();
            final String ArCount = mListenerList.get(position).getAllrounder();
            final String BowlCount = mListenerList.get(position).getBoller();

            holder.tv_MyWKCount.setText(WkCount);
            holder.tv_MyBATCount.setText(BatCount);
            holder.tv_MyARCount.setText(ArCount);
            holder.tv_MyBOWLCount.setText(BowlCount);
            holder.tv_MyTeamName.setText(TeamName);
            holder.tv_MyTeamCaptain.setText(Captain);
            holder.tv_MyTeamViceCaptain.setText(ViceCaptain);

            holder.LL_MyTeamPreview.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    JoinMyTeamId = mListenerList.get(position).getId();
                    callMyTeamPlayerList(true);

                }
            });

            holder.LL_MyTeamClone.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    if (TeamCount<6) {
                        JoinMyTeamId = mListenerList.get(position).getId();
                        ContestListActivity.MyTeamEditorSave = "Clone";

                        Intent i = new Intent(activity, CreateTeamActivity.class);
                        i.putExtra("Activity", "MyTeamListActivity");
                        startActivity(i);
                    }
                    else {
                        ShowToast(context,"You can only create maximum 6 Teams");
                    }

                }
            });

            holder.LL_MyTeamEdit.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    JoinMyTeamId = mListenerList.get(position).getId();
                    ContestListActivity.MyTeamEditorSave = "Edit";
                    Intent i = new Intent(activity,CreateTeamActivity.class);
                    i.putExtra("Activity", "MyTeamListActivity");
                    startActivity(i);

                }
            });

           holder.tv_JoinContestTeam.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                   // Log.e("JoinMyTeamId",JoinMyTeamId);
                    JoinMyTeamId = mListenerList.get(position).getId();
                    EntryFee=mListenerList.get(position).getEntry_fee();
                    MyContestCode=mListenerList.get(position).getContest();
                    Log.e("Data",JoinMyTeamId+".."+EntryFee+"..."+MyContestCode);
                    holder.tv_JoinContestTeam.setTextColor(Color.WHITE);
                    holder.tv_JoinContestTeam.setBackgroundResource(R.drawable.joinbutton_hover);
                    final Handler handler = new Handler();
                    handler.postDelayed(new Runnable() {
                        @Override
                        public void run() {
                            holder.tv_JoinContestTeam.setTextColor(Color.parseColor("#ffff0000"));
                            holder.tv_JoinContestTeam.setBackgroundResource(R.drawable.joinbutton_back);
                        }
                    }, 400);
                    //callJoinContest(true);
                    Intent i = new Intent(activity,PaymentConfirmationActivity.class);
                    i.putExtra("EntryFee",EntryFee);
                    i.putExtra("MyTeamId",JoinMyTeamId);
                    i.putExtra("MyContestCode", "");
                    startActivity(i);

                }
            });
        }

    }

    @Override
    public void onBackPressed() {
        Intent i = new Intent(activity,HomeActivity.class);
        startActivity(i);
    }
}
