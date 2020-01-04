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
import android.widget.ProgressBar;
import android.widget.TextView;

import com.ground11.g11.APICallingPackage.Class.APIRequestManager;
import com.ground11.g11.APICallingPackage.Class.Validations;
import com.ground11.g11.APICallingPackage.Interface.ResponseManager;
import com.ground11.g11.Bean.BeanContestList;
import com.ground11.g11.Bean.BeanWiningInfoList;
import com.ground11.g11.CreateContest.CreateContestActivity;
import com.ground11.g11.CreateContest.EnterInviteCodeContestActivity;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.List;

import static com.ground11.g11.APICallingPackage.Class.Validations.ShowToast;
import static com.ground11.g11.Config.CONTESTLIST;
import static com.ground11.g11.Config.MYTEAMLIST;
import static com.ground11.g11.Config.WINNINGINFOLIST;

public class ContestListActivity extends AppCompatActivity implements ResponseManager {


    ContestListActivity activity;
    Context context;
    RecyclerView Rv_ContestList;
    AdapterContestList adapterContestList;

    ResponseManager responseManager;
    APIRequestManager apiRequestManager;
   public static String IntentMatchId,IntentTime,IntenTeamsName,IntentTeamOneName,IntentTeamTwoName
           ,MyTeamEditorSave,MyContestCode="";
   public static String JoinMyTeamId;
    //Dialog dialog;
    BottomSheetDialog dialog;
   public static String ContestId,EntryFee;
    List<BeanWiningInfoList> beanWinningLists;
    String prize_pool,contest_description;


    ImageView im_back;
    TextView tv_HeaderName,tv_ContestTimer,tv_ContestTeamsName,tv_MyTeam;
    TextView tv_NoDataAvailable;

    SwipeRefreshLayout swipeRefreshLayout;
    TextView tv_CreateContest,tv_EnterContestCode;
    SessionManager sessionManager;
    int TeamCount = 0;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_contest_list);

        context = activity = this;
        initViews();
try {
    IntentMatchId = getIntent().getStringExtra("MatchId");
    IntentTime = getIntent().getStringExtra("Time");
    IntenTeamsName = getIntent().getStringExtra("TeamsName");
    IntentTeamOneName = getIntent().getStringExtra("TeamsOneName");
    IntentTeamTwoName = getIntent().getStringExtra("TeamsTwoName");

}
catch (Exception e)
{
    e.printStackTrace();
}




        tv_ContestTeamsName.setText(ContestListActivity.IntenTeamsName);
        tv_ContestTimer.setText(ContestListActivity.IntentTime);




        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);
        sessionManager = new SessionManager();


        Rv_ContestList.setHasFixedSize(true);
        Rv_ContestList.setNestedScrollingEnabled(false);
        RecyclerView.LayoutManager mLayoutManager = new LinearLayoutManager(activity);
        Rv_ContestList.setLayoutManager(mLayoutManager);
        Rv_ContestList.setItemAnimator(new DefaultItemAnimator());


        swipeRefreshLayout = findViewById(R.id.swipeRefreshLayout);
        swipeRefreshLayout.post(new Runnable() {
                                    @Override
                                    public void run() {
                                        swipeRefreshLayout.setRefreshing(true);
                                        callContestList(false);
                                    }
                                }
        );

        swipeRefreshLayout.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {
                callContestList(false);
            }
        });


        Validations.CountDownTimer(IntentTime,tv_ContestTimer);

        tv_MyTeam.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                MyTeamEditorSave = "New";
                Intent i = new Intent(activity,MyTeamListActivity.class);
                i.putExtra("TeamsName",ContestListActivity.IntenTeamsName);
                i.putExtra("Time",ContestListActivity.IntentTime);
                i.putExtra("MatchId",ContestListActivity.IntentMatchId);
                startActivity(i);
            }
        });

        tv_CreateContest.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
              callMyTeamList(true);
            }
        });

        tv_EnterContestCode.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
              Intent i = new Intent(activity, EnterInviteCodeContestActivity.class);
                i.putExtra("MatchId",IntentMatchId);
              startActivity(i);
            }
        });

    }

    public void initViews(){
        Rv_ContestList =  findViewById(R.id.Rv_ContestList);
        tv_ContestTimer =  findViewById(R.id.tv_ContestTimer);
        tv_ContestTeamsName =  findViewById(R.id.tv_ContestTeamsName);
        tv_MyTeam =  findViewById(R.id.tv_MyTeam);
        tv_NoDataAvailable =  findViewById(R.id.tv_NoDataAvailable);

        tv_CreateContest =  findViewById(R.id.tv_CreateContest);
        tv_EnterContestCode =  findViewById(R.id.tv_EnterContestCode);



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



    private void callMyTeamList(boolean isShowLoader) {
        try {

            apiRequestManager.callAPI(MYTEAMLIST,
                    createRequestJson12(), context, activity, Constants.MYTEAMLISTTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJson12() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("match_id", IntentMatchId);
            jsonObject.put("user_id", sessionManager.getUser(context).getUser_id());


        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }


    private void callContestList(boolean isShowLoader) {
        try {

            apiRequestManager.callAPI(CONTESTLIST,
                    createRequestJson(), context, activity, Constants.CONTESTLISTTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJson() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("match_id", IntentMatchId);
            jsonObject.put("type", "All");


        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }

    private void callWinningInfoList(boolean isShowLoader) {
        try {

            apiRequestManager.callAPI(WINNINGINFOLIST,
                    createRequestJsonWin(), context, activity, Constants.WINNINGINFOLISTTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJsonWin() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("contest_id", ContestId);


        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }


    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {
        if (type.equals(Constants.WINNINGINFOLISTTYPE)){
            try {
                JSONArray jsonArray = result.getJSONArray("data");
               // Log.e("Data",jsonArray.toString());
                beanWinningLists = new Gson().fromJson(jsonArray.toString(),
                        new TypeToken<List<BeanWiningInfoList>>() {
                        }.getType());

                dialog = new BottomSheetDialog(activity);
                dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);
                dialog.setContentView(R.layout.dialog_winning_breakups);
                final TextView tv_DClose = dialog.findViewById(R.id.tv_DClose);
                final TextView tv_DTotalWinning =dialog.findViewById(R.id.tv_DTotalWinning);
                final TextView tv_DBottomNote =dialog.findViewById(R.id.tv_DBottomNote);
                final LinearLayout LL_WinningBreackupList=dialog.findViewById(R.id.LL_WinningBreackupList);
                dialog.show();
                tv_DTotalWinning.setText("₹ "+prize_pool);
                tv_DBottomNote.setText("Note: "+contest_description);
                tv_DClose.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View view) {
                        dialog.cancel();
                    }
                });
                for (int i = 0; i <beanWinningLists .size(); i++) {

                    View to_add = LayoutInflater.from(context).inflate(R.layout.item_winning_breakup,
                            LL_WinningBreackupList,false);
                    TextView tv_Rank = to_add.findViewById(R.id.tv_Rank);
                    TextView tv_Price = to_add.findViewById(R.id.tv_Price);

                    tv_Rank.setText("Rank: "+beanWinningLists.get(i).getRank());
                    tv_Price.setText("₹ "+beanWinningLists.get(i).getPrice());

                    LL_WinningBreackupList.addView(to_add);
                }


            }
            catch (Exception e){
                e.printStackTrace();
            }




        }else if (type.equals(Constants.MYTEAMLISTTYPE)){
            try {
                JSONArray jsonArray = result.getJSONArray("data");
                Log.e("Data ",jsonArray.toString());
                TeamCount = jsonArray.length();
                if (TeamCount==0){
                    ShowToast(context,"For Creating Contest, You have to Create Team First.");
                    MyTeamEditorSave = "New";
                    Intent i = new Intent(activity,MyTeamListActivity.class);
                    i.putExtra("TeamsName",ContestListActivity.IntenTeamsName);
                    i.putExtra("Time",ContestListActivity.IntentTime);
                    i.putExtra("MatchId",ContestListActivity.IntentMatchId);
                    startActivity(i);
                }else {
                    Intent i = new Intent(activity,CreateContestActivity.class);
                    i.putExtra("MatchId",IntentMatchId);
                    startActivity(i);
                }

            } catch (Exception e) {
                e.printStackTrace();
            }
        }

        else {
            swipeRefreshLayout.setRefreshing(false);
            tv_NoDataAvailable.setVisibility(View.GONE);
            Rv_ContestList.setVisibility(View.VISIBLE);
            try {
                JSONArray jsonArray = result.getJSONArray("data");
                //Log.e("Data",jsonArray.toString());
                List<BeanContestList> beanContestLists = new Gson().fromJson(jsonArray.toString(),
                        new TypeToken<List<BeanContestList>>() {
                        }.getType());
                adapterContestList = new AdapterContestList(beanContestLists, activity);
                Rv_ContestList.setAdapter(adapterContestList);

            } catch (Exception e) {
                e.printStackTrace();
            }

            adapterContestList.notifyDataSetChanged();

        }
    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }


    @Override
    public void onError(Context mContext, String type, String message) {
        //ShowToast(context,message);
        if (type.equals(Constants.CONTESTLISTTYPE)){
            swipeRefreshLayout.setRefreshing(false);
            tv_NoDataAvailable.setVisibility(View.VISIBLE);
            Rv_ContestList.setVisibility(View.GONE);
        }
        else if (type.equals(Constants.MYTEAMLISTTYPE)){

            ShowToast(context,"For Creating Contest, You have to Create Team First.");
            MyTeamEditorSave = "New";
            Intent i = new Intent(activity,MyTeamListActivity.class);
            i.putExtra("TeamsName",ContestListActivity.IntenTeamsName);
            i.putExtra("Time",ContestListActivity.IntentTime);
            i.putExtra("MatchId",ContestListActivity.IntentMatchId);
            startActivity(i);
        }
    }

    public class AdapterContestList extends RecyclerView.Adapter<AdapterContestList.MyViewHolder> {
        private List<BeanContestList> mListenerList;
        Context mContext;


        public AdapterContestList(List<BeanContestList> mListenerList, Context context) {
            mContext = context;
            this.mListenerList = mListenerList;

        }

        public class MyViewHolder extends RecyclerView.ViewHolder {
            TextView tv_TotalPrice,tv_WinnersCount,tv_EntryFees,tv_TeamLeftCount,tv_TotalTeamCount
                    ,tv_JoinContest;

            ProgressBar PB_EntryProgress;


            public MyViewHolder(View view) {
                super(view);

                tv_TotalPrice = view.findViewById(R.id.tv_TotalPrice);
                tv_WinnersCount = view.findViewById(R.id.tv_WinnersCount);
                tv_EntryFees = view.findViewById(R.id.tv_EntryFees);
                tv_TeamLeftCount = view.findViewById(R.id.tv_TeamLeftCount);
                tv_TotalTeamCount = view.findViewById(R.id.tv_TotalTeamCount);
                PB_EntryProgress = view.findViewById(R.id.PB_EntryProgress);
                tv_JoinContest = view.findViewById(R.id.tv_JoinContest);




            }

        }
        @Override
        public int getItemCount() {
            return mListenerList.size();
        }

        @Override
        public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
            View itemView = LayoutInflater.from(parent.getContext())
                    .inflate(R.layout.adapter_contest_list, parent, false);

            return new MyViewHolder(itemView);
        }

        @Override
        public void onBindViewHolder(final MyViewHolder holder, final int position) {


            final String contest_id = mListenerList.get(position).getContest_id();
            String contest_name= mListenerList.get(position).getContest_name();
            String contest_tag= mListenerList.get(position).getContest_tag();
            String winners= mListenerList.get(position).getWinners();
            prize_pool= mListenerList.get(position).getPrize_pool();
            String total_team= mListenerList.get(position).getTotal_team();
            String join_team= mListenerList.get(position).getJoin_team();
            final String entry= mListenerList.get(position).getEntry();

            String contest_note1 = mListenerList.get(position).getContest_note1();
            String contest_note2= mListenerList.get(position).getContest_note2();
            String match_id= mListenerList.get(position).getMatch_id();
            String type= mListenerList.get(position).getType();
            String remaining_team= mListenerList.get(position).getRemaining_team();

            holder.tv_TotalPrice.setText("₹ "+prize_pool);
            holder.tv_WinnersCount.setText(winners);
            holder.tv_EntryFees.setText("₹ "+entry);

            holder.tv_TeamLeftCount.setText(remaining_team+" Spots Left");
            holder.tv_TotalTeamCount.setText(total_team+" Teams");

           // float JoinTeamPercent =  Integer.parseInt(join_team)*100/Integer.parseInt(total_team);

            holder.PB_EntryProgress.setMax(Integer.parseInt(total_team));
            holder.PB_EntryProgress.setProgress(Integer.parseInt(join_team));


        holder.tv_WinnersCount.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                ContestId = mListenerList.get(position).getContest_id();
                contest_description= mListenerList.get(position).getContest_description();
                prize_pool= mListenerList.get(position).getPrize_pool();

                callWinningInfoList(true);
            }
        });

    holder.tv_JoinContest.setOnClickListener(new View.OnClickListener() {
        @Override
        public void onClick(View view) {
            String Spot_left=mListenerList.get(position).getRemaining_team();
            if(Spot_left.equals("0"))
            {
                ShowToast(context,"Contest Full");
            }
            else {
                MyTeamEditorSave = "Save";
                MyContestCode = "";
                ContestId = mListenerList.get(position).getContest_id();
                EntryFee=mListenerList.get(position).getEntry();
                holder.tv_JoinContest.setTextColor(Color.WHITE);
                holder.tv_JoinContest.setBackgroundResource(R.drawable.joinbutton_hover);
                final Handler handler = new Handler();
                handler.postDelayed(new Runnable() {
                    @Override
                    public void run() {
                        holder.tv_JoinContest.setTextColor(Color.parseColor("#ffff0000"));
                        holder.tv_JoinContest.setBackgroundResource(R.drawable.joinbutton_back);
                    }
                }, 400);

                Intent i = new Intent(activity,JoinContestActivity.class);
                i.putExtra("EntryFee",entry);
                i.putExtra("ContestCode",MyContestCode);
                startActivity(i);}


        }
    });

        }

    }

}
