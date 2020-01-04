package com.ground11.g11.MyTabFragment;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.DefaultItemAnimator;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.ground11.g11.APICallingPackage.Class.APIRequestManager;
import com.ground11.g11.APICallingPackage.Class.Validations;
import com.ground11.g11.APICallingPackage.Interface.ResponseManager;
import com.ground11.g11.Bean.BeanMyLiveJoinedContest;
import com.ground11.g11.R;
import com.ground11.g11.SessionManager;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.List;

import com.ground11.g11.Constants;

import static com.ground11.g11.Config.MYJOINLIVECONTESTLIST;

public class MyJoinedLiveContestListActivity extends AppCompatActivity implements ResponseManager {

    MyJoinedLiveContestListActivity activity;
    Context context;
    RecyclerView Rv_MyJoinedContestList;
    AdapterMyJoinedContestList adapterMyJoinedContestList;

    ResponseManager responseManager;
    APIRequestManager apiRequestManager;
    public static String IntentMatchId,IntentTime,IntenTeamsName,IntentTeamOneName,IntentTeamTwoName;

    public static String ContestId,Matchid;

    ImageView im_back;
    TextView tv_HeaderName,tv_MyJoinedContestTimer,tv_MyJoinedContestTeamsName;
    SessionManager sessionManager;
    SwipeRefreshLayout swipeRefreshLayout;
    TextView tv_NoDataAvailable;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_my_joined_live_contest_list);

        context = activity = this;
        initViews();

        sessionManager = new SessionManager();
        IntentMatchId = getIntent().getStringExtra("MatchId");
        IntentTime = getIntent().getStringExtra("Time");
        IntenTeamsName = getIntent().getStringExtra("TeamsName");
        IntentTeamOneName = getIntent().getStringExtra("TeamsOneName");
        IntentTeamTwoName = getIntent().getStringExtra("TeamsTwoName");


        tv_MyJoinedContestTeamsName.setText(IntenTeamsName);
        tv_MyJoinedContestTimer.setText(IntentTime);


        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);


        Rv_MyJoinedContestList.setHasFixedSize(true);
        Rv_MyJoinedContestList.setNestedScrollingEnabled(false);
        RecyclerView.LayoutManager mLayoutManager = new LinearLayoutManager(activity);
        Rv_MyJoinedContestList.setLayoutManager(mLayoutManager);
        Rv_MyJoinedContestList.setItemAnimator(new DefaultItemAnimator());

        //callMyJoinedContestList(true);

        Validations.CountDownTimer(IntentTime, tv_MyJoinedContestTimer);
        tv_MyJoinedContestTimer.setText("In Progress");

        swipeRefreshLayout = findViewById(R.id.swipeRefreshLayout);
        swipeRefreshLayout.post(new Runnable() {
                @Override
                public void run() {
                    swipeRefreshLayout.setRefreshing(true);
                        callMyJoinedContestList(false);
                }
        }
        );

        swipeRefreshLayout.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {

                callMyJoinedContestList(false);
            }
        });


    }


    public void initViews(){
        Rv_MyJoinedContestList =  findViewById(R.id.Rv_MyJoinedContestList);
        tv_MyJoinedContestTimer =  findViewById(R.id.tv_MyJoinedContestTimer);
        tv_MyJoinedContestTeamsName =  findViewById(R.id.tv_MyJoinedContestTeamsName);
        tv_NoDataAvailable =  findViewById(R.id.tv_NoDataAvailable);



        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);

        tv_HeaderName.setText("JOIN CONTESTS");
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                onBackPressed();
            }
        });

    }

    private void callMyJoinedContestList(boolean isShowLoader) {
        try {

            apiRequestManager.callAPI(MYJOINLIVECONTESTLIST,
                    createRequestJson(), context, activity, Constants.MYJOINLIVECONTESTLISTTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJson() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("match_id", IntentMatchId);
            jsonObject.put("user_id", sessionManager.getUser(context).getUser_id());


        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }

    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {
        tv_NoDataAvailable.setVisibility(View.GONE);
        Rv_MyJoinedContestList.setVisibility(View.VISIBLE);
        swipeRefreshLayout.setRefreshing(false);

        try {
                JSONArray jsonArray = result.getJSONArray("data");
                List<BeanMyLiveJoinedContest> beanContestLists = new Gson().fromJson(jsonArray.toString(),
                        new TypeToken<List<BeanMyLiveJoinedContest>>() {
                        }.getType());
                adapterMyJoinedContestList = new AdapterMyJoinedContestList(beanContestLists, activity);
                Rv_MyJoinedContestList.setAdapter(adapterMyJoinedContestList);

            } catch (Exception e) {
                e.printStackTrace();
            }

            adapterMyJoinedContestList.notifyDataSetChanged();


    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    @Override
    public void onError(Context mContext, String type, String message) {
       // ShowToast(context,message);
        swipeRefreshLayout.setRefreshing(false);
        tv_NoDataAvailable.setVisibility(View.VISIBLE);
        Rv_MyJoinedContestList.setVisibility(View.GONE);
    }



    public class AdapterMyJoinedContestList extends RecyclerView.Adapter<AdapterMyJoinedContestList.MyViewHolder> {
        private List<BeanMyLiveJoinedContest> mListenerList;
        Context mContext;


        public AdapterMyJoinedContestList(List<BeanMyLiveJoinedContest> mListenerList, Context context) {
            mContext = context;
            this.mListenerList = mListenerList;

        }

        public class MyViewHolder extends RecyclerView.ViewHolder {
            TextView tv_LiveContestName,tv_LiveContestDesc,tv_LiveContestFees,
                    tv_LiveJoinedWith,tv_ContestPoints
                    ,tv_ContestRank ;




            public MyViewHolder(View view) {
                super(view);

                tv_LiveContestName = view.findViewById(R.id.tv_LiveContestName);
                tv_LiveContestDesc = view.findViewById(R.id.tv_LiveContestDesc);
                tv_LiveContestFees = view.findViewById(R.id.tv_LiveContestFees);
                tv_LiveJoinedWith = view.findViewById(R.id.tv_LiveJoinedWith);
                tv_ContestPoints = view.findViewById(R.id.tv_ContestPoints);

                tv_ContestRank = view.findViewById(R.id.tv_ContestRank);

            }

        }
        @Override
        public int getItemCount() {
            return mListenerList.size();
        }

        @Override
        public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
            View itemView = LayoutInflater.from(parent.getContext())
                    .inflate(R.layout.adapter_live_contest_list, parent, false);

            return new MyViewHolder(itemView);
        }

        @Override
        public void onBindViewHolder(final MyViewHolder holder, final int position) {


            final String contest_id = mListenerList.get(position).getContest_id();
            String contest_name= mListenerList.get(position).getContest_name();
            String contest_tag= mListenerList.get(position).getContest_tag();
            String winners= mListenerList.get(position).getWinners();

            String total_team= mListenerList.get(position).getTotal_team();
            String join_team= mListenerList.get(position).getJoin_team();
            String entry= mListenerList.get(position).getEntry();

            String contest_note1 = mListenerList.get(position).getContest_note1();
            String contest_note2= mListenerList.get(position).getContest_note2();
            String match_id= mListenerList.get(position).getMatch_id();
            String type= mListenerList.get(position).getType();
            String remaining_team= mListenerList.get(position).getRemaining_team();
            String points= mListenerList.get(position).getPoints();
            String rank= mListenerList.get(position).getRank();
            String JoinedWithTeamName = mListenerList.get(position).getTeam_name();

            holder.tv_LiveContestName.setText(contest_name);
            holder.tv_LiveContestDesc.setText(contest_tag);
            holder.tv_LiveContestFees.setText("₹ "+entry);
            holder.tv_ContestRank.setText(rank);
            holder.tv_ContestPoints.setText(points);
            holder.tv_LiveJoinedWith.setText(JoinedWithTeamName);



            holder.itemView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    Matchid = IntentMatchId;
                    ContestId = mListenerList.get(position).getContest_id();
                    Intent i = new Intent(activity, MyLiveContestDetailsActivity.class);
                    startActivity(i);
                }
            });

        }

    }
}
