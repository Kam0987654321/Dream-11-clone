package com.indian11.app;

import android.content.Context;
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

import com.indian11.app.APICallingPackage.Class.APIRequestManager;
import com.indian11.app.APICallingPackage.Interface.ResponseManager;
import com.indian11.app.Bean.BeanGlobalRankingList;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.List;

import static com.indian11.app.Config.GLOBALRANKINGLIST;
import static com.indian11.app.Constants.GLOBALRANKINGTYPE;

public class GlobalRankActivity extends AppCompatActivity implements ResponseManager {

    RecyclerView RV_GlobalRankList;

    GlobalRankActivity activity;
    Context context;
    ResponseManager responseManager;
    APIRequestManager apiRequestManager;
    ImageView im_back;
    TextView tv_HeaderName;
    SessionManager sessionManager;
    AdapterGlobalRankList adapterGlobalRankList;

    SwipeRefreshLayout swipeRefreshLayout;
    TextView tv_NoDataAvailable;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_global_rank);

        context = activity = this;
        initViews();
        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);
        sessionManager = new SessionManager();

        RV_GlobalRankList.setHasFixedSize(true);
        RV_GlobalRankList.setNestedScrollingEnabled(false);
        RecyclerView.LayoutManager mLayoutManager = new LinearLayoutManager(activity);
        RV_GlobalRankList.setLayoutManager(mLayoutManager);
        RV_GlobalRankList.setItemAnimator(new DefaultItemAnimator());


        swipeRefreshLayout = findViewById(R.id.swipeRefreshLayout);
        swipeRefreshLayout.post(new Runnable() {
                                    @Override
                                    public void run() {
                                        swipeRefreshLayout.setRefreshing(true);
                                        callGlobalRanking(false);
                                    }
                                }
        );

        swipeRefreshLayout.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {

                callGlobalRanking(false);
            }
        });

    }

    public void initViews(){
        RV_GlobalRankList =  findViewById(R.id.RV_GlobalRankList);

        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);
        tv_NoDataAvailable = findViewById(R.id.tv_NoDataAvailable);


        tv_HeaderName.setText("YOUR GLOBAL RANKING");
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                onBackPressed();
            }
        });

    }

    private void callGlobalRanking(boolean isShowLoader) {
        try {
            apiRequestManager.callAPI(GLOBALRANKINGLIST,
                    createRequestJson(), context, activity, GLOBALRANKINGTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJson() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("user_id", sessionManager.getUser(context).getUser_id());

        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }

    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {
        tv_NoDataAvailable.setVisibility(View.GONE);
        RV_GlobalRankList.setVisibility(View.VISIBLE);
        swipeRefreshLayout.setRefreshing(false);

        try {
            JSONArray jsonArray = result.getJSONArray("data");
            List<BeanGlobalRankingList> beanContestLists = new Gson().fromJson(jsonArray.toString(),
                    new TypeToken<List<BeanGlobalRankingList>>() {
                    }.getType());
            adapterGlobalRankList = new AdapterGlobalRankList(beanContestLists, activity);
            RV_GlobalRankList.setAdapter(adapterGlobalRankList);

        } catch (Exception e) {
            e.printStackTrace();
        }

        adapterGlobalRankList.notifyDataSetChanged();


    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    @Override
    public void onError(Context mContext, String type, String message) {

        //ShowToast(context,message);
        tv_NoDataAvailable.setVisibility(View.VISIBLE);
        RV_GlobalRankList.setVisibility(View.GONE);
        swipeRefreshLayout.setRefreshing(false);
    }


    public class AdapterGlobalRankList extends RecyclerView.Adapter<AdapterGlobalRankList.MyViewHolder> {
        private List<BeanGlobalRankingList> mListenerList;
        Context mContext;


        public AdapterGlobalRankList(List<BeanGlobalRankingList> mListenerList, Context context) {
            mContext = context;
            this.mListenerList = mListenerList;

        }

        public class MyViewHolder extends RecyclerView.ViewHolder {
            TextView tv_RankTeamName,tv_RankRank,tv_RankPoints ;


            public MyViewHolder(View view) {
                super(view);

                tv_RankTeamName = view.findViewById(R.id.tv_RankTeamName);
                tv_RankRank = view.findViewById(R.id.tv_RankRank);
                tv_RankPoints = view.findViewById(R.id.tv_RankPoints);

            }
        }
        @Override
        public int getItemCount() {
            return mListenerList.size();
        }

        @Override
        public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
            View itemView = LayoutInflater.from(parent.getContext())
                    .inflate(R.layout.adapter_global_list, parent, false);

            return new MyViewHolder(itemView);
        }

        @Override
        public void onBindViewHolder(final MyViewHolder holder, final int position) {

            final String TeamName = mListenerList.get(position).getName();
            String Points = mListenerList.get(position).getPoints();
            String Rank = mListenerList.get(position).getRank();


            holder.tv_RankTeamName.setText(TeamName);
            holder.tv_RankRank.setText("#"+Rank);
            holder.tv_RankPoints.setText(Points+" Points");
        }

    }
}
