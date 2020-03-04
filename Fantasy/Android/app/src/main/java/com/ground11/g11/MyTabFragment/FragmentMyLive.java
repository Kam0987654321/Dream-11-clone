package com.indian11.app.MyTabFragment;


import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.support.v4.app.Fragment;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.widget.DefaultItemAnimator;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;
import com.indian11.app.APICallingPackage.Class.APIRequestManager;
import com.indian11.app.APICallingPackage.Interface.ResponseManager;
import com.indian11.app.Bean.BeanMyLive;
import com.indian11.app.Config;
import com.indian11.app.HomeActivity;
import com.indian11.app.R;
import com.indian11.app.SessionManager;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.List;

import static com.indian11.app.APICallingPackage.Class.Validations.ShowToast;
import static com.indian11.app.Config.MYFIXTURES;
import static com.indian11.app.Constants.MYLIVETYPE;


public class FragmentMyLive extends Fragment implements ResponseManager {

    HomeActivity activity;
    Context context;
    RecyclerView Rv_MyLive;
    AdapterMyLiveList adapterMyLiveList;

    ResponseManager responseManager;
    APIRequestManager apiRequestManager;
    SessionManager sessionManager;
    SwipeRefreshLayout swipeRefreshLayout;
    TextView tv_NoDataAvailable,tv_Score_refresh;
    Handler mHandler;
    Runnable refresh;
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View v = inflater.inflate(R.layout.fragment_my_live, container, false);
        context = activity = (HomeActivity)getActivity();
        initViews(v);
        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);
        sessionManager = new SessionManager();

        Rv_MyLive.setHasFixedSize(true);
        Rv_MyLive.setNestedScrollingEnabled(false);
        RecyclerView.LayoutManager mLayoutManager = new LinearLayoutManager(getActivity());
        Rv_MyLive.setLayoutManager(mLayoutManager);
        Rv_MyLive.setItemAnimator(new DefaultItemAnimator());




        swipeRefreshLayout = v.findViewById(R.id.swipeRefreshLayout);
        swipeRefreshLayout.post(new Runnable() {
                                @Override
                                public void run() {
                                    swipeRefreshLayout.setRefreshing(true);
                                    callMyLive(false);
                                }
                            }
        );

        swipeRefreshLayout.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {

                callMyLive(false);
            }
        });
        tv_Score_refresh.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                callMyLive(true);

            }
        });
        FragmentMyLive.this.mHandler = new Handler();

        FragmentMyLive.this.mHandler.postDelayed(m_Runnable,15000);
        return v;
    }

    public void initViews(View v){
        Rv_MyLive = v.findViewById(R.id.Rv_MyLive);
        tv_NoDataAvailable = v.findViewById(R.id.tv_NoDataAvailable);
        tv_Score_refresh=v.findViewById(R.id.tv_Score_refresh);

    }

    private void callMyLive(boolean isShowLoader) {
        try {

            apiRequestManager.callAPI(MYFIXTURES,
                    createRequestJson(), context, activity, MYLIVETYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }
    JSONObject createRequestJson() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("status", "Live");
            jsonObject.put("user_id", sessionManager.getUser(context).getUser_id());

        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }

    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {
        swipeRefreshLayout.setRefreshing(false);
        tv_NoDataAvailable.setVisibility(View.GONE);
        Rv_MyLive.setVisibility(View.VISIBLE);
        tv_Score_refresh.setVisibility(View.VISIBLE);

        try {

            JSONArray jsonArray = result.getJSONArray("data");
            List<BeanMyLive> beanHomeLive = new Gson().fromJson(jsonArray.toString(),
                    new TypeToken<List<BeanMyLive>>() {
            }.getType());
            adapterMyLiveList = new AdapterMyLiveList(beanHomeLive, activity);
            Rv_MyLive.setAdapter(adapterMyLiveList);
        }
        catch (Exception e){
            e.printStackTrace();
        }
        adapterMyLiveList.notifyDataSetChanged();
    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    @Override
    public void onError(Context mContext, String type, String message) {
        swipeRefreshLayout.setRefreshing(false);
        tv_NoDataAvailable.setVisibility(View.VISIBLE);
        Rv_MyLive.setVisibility(View.GONE);
        tv_Score_refresh.setVisibility(View.GONE);
        //ShowToast(context,message);
    }

    public class AdapterMyLiveList extends RecyclerView.Adapter<AdapterMyLiveList.MyViewHolder> {
        private List<BeanMyLive> mListenerList;
        Context mContext;

        public AdapterMyLiveList(List<BeanMyLive> mListenerList, Context context) {
            mContext = context;
            this.mListenerList = mListenerList;

        }

        public class MyViewHolder extends RecyclerView.ViewHolder {
            TextView tv_TeamOneName, tv_TeamsName, tv_TimeRemained, tv_TeamTwoName,tv_JoinedContestCount,tv_TeamOneScore,tv_TeamTwoScore,
                    tv_TeamOneOver,tv_TeamTwoOver,tv_MatchResult;
            LinearLayout linearLayout;
            ImageView im_Team1, im_Team2;


            public MyViewHolder(View view) {
                super(view);

                im_Team1 = view.findViewById(R.id.im_Team1);
                tv_TeamOneName = view.findViewById(R.id.tv_TeamOneName);
                tv_TeamsName = view.findViewById(R.id.tv_TeamsName);
                tv_TimeRemained = view.findViewById(R.id.tv_TimeRemained);
                im_Team2 = view.findViewById(R.id.im_Team2);
                tv_TeamTwoName = view.findViewById(R.id.tv_TeamTwoName);
                tv_JoinedContestCount = view.findViewById(R.id.tv_JoinedContestCount);
                tv_TeamOneScore=view.findViewById(R.id.tv_TeamOneScore);
                tv_TeamTwoScore=view.findViewById(R.id.tv_TeamTwoScore);
                tv_TeamOneOver=view.findViewById(R.id.tv_TeamOneOver);
                tv_TeamTwoOver=view.findViewById(R.id.tv_TeamTwoOver);
                tv_MatchResult=view.findViewById(R.id.tv_MatchResult);
                //tv_MatchResult.setVisibility(View.VISIBLE);
                linearLayout=view.findViewById(R.id.linearlayout2);
                linearLayout.setVisibility(View.VISIBLE);
            }
        }

        @Override
        public int getItemCount() {
            return mListenerList.size();
        }

        @Override
        public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
            View itemView = LayoutInflater.from(parent.getContext())
                    .inflate(R.layout.adapter_my_match_list, parent, false);

            return new MyViewHolder(itemView);
        }

        @Override
        public void onBindViewHolder(final MyViewHolder holder, final int position) {

            final String match_id = mListenerList.get(position).getMatch_id();
            String teamid1 = mListenerList.get(position).getTeamid1();
            String match_status = mListenerList.get(position).getMatch_status();
            String type = mListenerList.get(position).getType();
            final int time = mListenerList.get(position).getTime();
            String teamid2 = mListenerList.get(position).getTeamid2();
            String team_name1 = mListenerList.get(position).getTeam_name1();
            String team_image1 = mListenerList.get(position).getTeam_image1();
            final String team_short_name1 = mListenerList.get(position).getTeam_short_name1();
            String team_name2 = mListenerList.get(position).getTeam_name2();
            String team_image2 = mListenerList.get(position).getTeam_image2();
            final String team_short_name2 = mListenerList.get(position).getTeam_short_name2();

            String contest_count = mListenerList.get(position).getContest_count();
            final String team_one_score=mListenerList.get(position).getTeam1Score();
            final String team_two_score=mListenerList.get(position).getTeam2Score();
            final String team_one_over=mListenerList.get(position).getTeam1Over();
            final  String team_two_over=mListenerList.get(position).getTeam2Over();
            final String match_status_note=mListenerList.get(position).getMatch_status_note();
            holder.tv_JoinedContestCount.setText(contest_count+" Contest Joined");


            holder.tv_TeamOneName.setText(team_name1);
            holder.tv_TeamTwoName.setText(team_name2);
            holder.tv_TeamsName.setText(team_short_name1 + " vs " + team_short_name2 + "\n" + type);
            Glide.with(getActivity()).load(Config.TEAMFLAGIMAGE + team_image1)
                    .crossFade()
                    .diskCacheStrategy(DiskCacheStrategy.ALL)
                    .into(holder.im_Team1);
            Glide.with(getActivity()).load(Config.TEAMFLAGIMAGE + team_image2)
                    .crossFade()
                    .diskCacheStrategy(DiskCacheStrategy.ALL)
                    .into(holder.im_Team2);

            if (match_status.equals("Live")) {
                holder.tv_TimeRemained.setText("Live");
            }

            holder.itemView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    ShowToast(context, "Coming Soon...");
                }
            });
            holder.tv_TeamOneScore.setText("Score:-"+team_one_score);
            holder.tv_TeamTwoScore.setText("Score:-"+team_two_score);
            holder.tv_TeamOneOver.setText("Over:-"+team_one_over);
            holder.tv_TeamTwoOver.setText("Over:-"+team_two_over);
            //holder.tv_MatchResult.setText(match_status_note);
            holder.itemView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {

                    Intent k = new Intent(activity, MyJoinedLiveContestListActivity.class);
                    k.putExtra("MatchId",match_id);
                    k.putExtra("Time",time+"");
                    k.putExtra("TeamsName", holder.tv_TeamsName.getText().toString());
                    k.putExtra("TeamsOneName", team_short_name1);
                    k.putExtra("TeamsTwoName", team_short_name2);
                    startActivity(k);
                }
            });

        }
    }
    private final Runnable m_Runnable = new Runnable()
    {
        public void run()

        {
            //Toast.makeText(context,"Score Is Updated",Toast.LENGTH_SHORT).show();
           callMyLive(false);
            FragmentMyLive.this.mHandler.postDelayed(m_Runnable, 15000);
        }

    };
}
