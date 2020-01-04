package com.ground11.g11.MyTabFragment;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.BottomSheetDialog;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.DefaultItemAnimator;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
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
import com.ground11.g11.Bean.BeanMyJoinedContestList;
import com.ground11.g11.Bean.BeanWiningInfoList;
import com.ground11.g11.R;
import com.ground11.g11.SessionManager;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.List;

import com.ground11.g11.Constants;

import static com.ground11.g11.Config.MYJOINCONTESTLIST;
import static com.ground11.g11.Config.WINNINGINFOLIST;

public class MyJoinedFixtureContestListActivity extends AppCompatActivity implements ResponseManager {

    MyJoinedFixtureContestListActivity activity;
    Context context;
    RecyclerView Rv_MyJoinedContestList;
    AdapterMyJoinedContestList adapterMyJoinedContestList;

    ResponseManager responseManager;
    APIRequestManager apiRequestManager;
    public static String IntentMatchId,IntentTime,IntenTeamsName,IntentTeamOneName,IntentTeamTwoName;
    //Dialog dialog;
    BottomSheetDialog dialog;
    public static String ContestId,Matchid;
    List<BeanWiningInfoList> beanWinningLists;
    String prize_pool,contest_description;


    ImageView im_back;
    TextView tv_HeaderName,tv_MyJoinedContestTimer,tv_MyJoinedContestTeamsName;
    SessionManager sessionManager;
    SwipeRefreshLayout swipeRefreshLayout;
    TextView tv_NoDataAvailable;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_my_joined_contest_list);

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


        Validations.CountDownTimer(IntentTime,tv_MyJoinedContestTimer);

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

            apiRequestManager.callAPI(MYJOINCONTESTLIST,
                    createRequestJson(), context, activity, Constants.MYJOINCONTESTLISTTYPE,
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




        }
        else {

            tv_NoDataAvailable.setVisibility(View.GONE);
            Rv_MyJoinedContestList.setVisibility(View.VISIBLE);
            swipeRefreshLayout.setRefreshing(false);

            try {
                JSONArray jsonArray = result.getJSONArray("data");
                List<BeanMyJoinedContestList> beanContestLists = new Gson().fromJson(jsonArray.toString(),
                        new TypeToken<List<BeanMyJoinedContestList>>() {
                        }.getType());
                adapterMyJoinedContestList = new AdapterMyJoinedContestList(beanContestLists, activity);
                Rv_MyJoinedContestList.setAdapter(adapterMyJoinedContestList);

            } catch (Exception e) {
                e.printStackTrace();
            }

            adapterMyJoinedContestList.notifyDataSetChanged();

        }
    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    @Override
    public void onError(Context mContext, String type, String message) {
        //ShowToast(context,message);
        if (type.equals(Constants.MYJOINCONTESTLISTTYPE)){

            tv_NoDataAvailable.setVisibility(View.VISIBLE);
            Rv_MyJoinedContestList.setVisibility(View.GONE);
            swipeRefreshLayout.setRefreshing(false);
        }

    }

    public class AdapterMyJoinedContestList extends RecyclerView.Adapter<AdapterMyJoinedContestList.MyViewHolder> {
        private List<BeanMyJoinedContestList> mListenerList;
        Context mContext;


        public AdapterMyJoinedContestList(List<BeanMyJoinedContestList> mListenerList, Context context) {
            mContext = context;
            this.mListenerList = mListenerList;

        }

        public class MyViewHolder extends RecyclerView.ViewHolder {
            TextView tv_TotalPrice,tv_WinnersCount,tv_EntryFees,tv_TeamLeftCount,tv_TotalTeamCount
                    ,tv_JoinContest,tv_MyJoinedTeamCount;

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
                tv_MyJoinedTeamCount = view.findViewById(R.id.tv_MyJoinedTeamCount);


            }

        }
        @Override
        public int getItemCount() {
            return mListenerList.size();
        }

        @Override
        public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
            View itemView = LayoutInflater.from(parent.getContext())
                    .inflate(R.layout.adapter_my_joined_contest_list, parent, false);

            return new MyViewHolder(itemView);
        }

        @Override
        public void onBindViewHolder(final MyViewHolder holder, final int position) {

            holder.tv_JoinContest.setVisibility(View.INVISIBLE);
            final String contest_id = mListenerList.get(position).getContest_id();
            String contest_name= mListenerList.get(position).getContest_name();
            String contest_tag= mListenerList.get(position).getContest_tag();
            String winners= mListenerList.get(position).getWinners();
            prize_pool= mListenerList.get(position).getPrize_pool();
            String total_team= mListenerList.get(position).getTotal_team();
            String join_team= mListenerList.get(position).getJoin_team();
            String entry= mListenerList.get(position).getEntry();

            String contest_note1 = mListenerList.get(position).getContest_note1();
            String contest_note2= mListenerList.get(position).getContest_note2();
            String match_id= mListenerList.get(position).getMatch_id();
            String type= mListenerList.get(position).getType();
            String remaining_team= mListenerList.get(position).getRemaining_team();
            String joinedteamcount= mListenerList.get(position).getTeam_count();


            holder.tv_MyJoinedTeamCount.setText("Joined with "+joinedteamcount+" Team");
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

        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Matchid = IntentMatchId;
                ContestId = mListenerList.get(position).getContest_id();
                Intent i = new Intent(activity, MyFixtureContestDetailsActivity.class);
                startActivity(i);
            }
        });

        }

    }

}
