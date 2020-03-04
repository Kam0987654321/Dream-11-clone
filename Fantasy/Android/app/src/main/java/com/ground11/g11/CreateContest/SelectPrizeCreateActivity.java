package com.indian11.app.CreateContest;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.DefaultItemAnimator;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.indian11.app.APICallingPackage.Class.APIRequestManager;
import com.indian11.app.APICallingPackage.Interface.ResponseManager;
import com.indian11.app.Bean.BeanRank;
import com.indian11.app.ContestListActivity;
import com.indian11.app.JoinContestActivity;
import com.indian11.app.R;
import com.indian11.app.SessionManager;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.List;

import static com.indian11.app.APICallingPackage.Class.Validations.ShowToast;
import static com.indian11.app.Config.CREATECONTESTRANK;
import static com.indian11.app.Config.CREATEOWNCONTEST;
import static com.indian11.app.Constants.CREATEOWNCONTESTTYPE;
import static com.indian11.app.Constants.RANKLISTTYPE;

public class SelectPrizeCreateActivity extends AppCompatActivity implements ResponseManager {

    String ContestName,ContestSize,ContestWinningAmount,EntryFees,MatchId;

    ImageView im_back;
    TextView tv_HeaderName;

    SelectPrizeCreateActivity activity;
    Context context;

    ResponseManager responseManager;
    APIRequestManager apiRequestManager;

    RecyclerView Rv_RankList;
    AdapterRankList adapterRankList;

    TextView tv_CSize,tv_CPrizePool,tv_CEntryFees;
    RelativeLayout RL_BottomFinalCreateMyContest;
    SessionManager sessionManager;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_select_prize_create);

        Intent i = getIntent();
        ContestName = i.getStringExtra("ContestName");
        ContestSize = String.valueOf(i.getIntExtra("ContestSize",0));
        ContestWinningAmount = String.valueOf(i.getIntExtra("ContestWinningAmount",0));
        EntryFees = String.valueOf(i.getDoubleExtra("EntryFees",0));
        MatchId = i.getStringExtra("MatchId");

        context = activity = this;
        initViews();
        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);
        sessionManager = new SessionManager();

        tv_CEntryFees.setText("₹"+EntryFees);
        tv_CPrizePool.setText("₹"+ContestWinningAmount);
        tv_CSize.setText(""+ContestSize);
        callRankList(true);

        RL_BottomFinalCreateMyContest.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
               callCreateContest(true);
            }
        });

    }
    public void initViews(){

        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);

        tv_CEntryFees = findViewById(R.id.tv_CEntryFees);
        tv_CPrizePool = findViewById(R.id.tv_CPrizePool);
        tv_CSize = findViewById(R.id.tv_CSize);
        RL_BottomFinalCreateMyContest = findViewById(R.id.RL_BottomFinalCreateMyContest);


        tv_HeaderName.setText(""+ContestName);
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                onBackPressed();
            }
        });

        Rv_RankList =  findViewById(R.id.Rv_RankList);
        Rv_RankList.setHasFixedSize(true);
        Rv_RankList.setNestedScrollingEnabled(false);
        RecyclerView.LayoutManager mLayoutManager = new LinearLayoutManager(activity);
        Rv_RankList.setLayoutManager(mLayoutManager);
        Rv_RankList.setItemAnimator(new DefaultItemAnimator());


    }

    private void callRankList(boolean isShowLoader) {

        try {

            apiRequestManager.callAPI(CREATECONTESTRANK,
                    createRequestJson1(), context, activity, RANKLISTTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJson1() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("team_size", ContestSize);
            jsonObject.put("price", ContestWinningAmount);

        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }

    private void callCreateContest(boolean isShowLoader) {
        try {
            apiRequestManager.callAPI(CREATEOWNCONTEST,
                    createRequestJson2(), context, activity, CREATEOWNCONTESTTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJson2() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("user_id", sessionManager.getUser(context).getUser_id());
            jsonObject.put("userContestName", ContestName);
            jsonObject.put("userWinners", ContestWinningAmount);
            jsonObject.put("userTotalteam", ContestSize);
            jsonObject.put("userEntry", EntryFees);
            jsonObject.put("userMatchid", MatchId);


        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }

    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {
        if (type.equals(CREATEOWNCONTESTTYPE)) {
            try {
                ContestListActivity.ContestId=result.getString("user_Contestid");
                ContestListActivity.MyContestCode = result.getString("unique_code");
                Intent i = new Intent(activity,JoinContestActivity.class);
                i.putExtra("EntryFee",EntryFees);
                i.putExtra("ContestCode",ContestListActivity.MyContestCode);
                startActivity(i);
                }
                catch (Exception e){
                e.printStackTrace();
                }
        }
        else {
            try {
                JSONArray jsonArray = result.getJSONArray("data");
                List<BeanRank> beanRanks = new Gson().fromJson(jsonArray.toString(),
                        new TypeToken<List<BeanRank>>() {
                        }.getType());
                adapterRankList = new AdapterRankList(beanRanks, activity);
                Rv_RankList.setAdapter(adapterRankList);

            } catch (Exception e) {
                e.printStackTrace();
            }
            adapterRankList.notifyDataSetChanged();

        }


    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    @Override
    public void onError(Context mContext, String type, String message) {
            ShowToast(context,message);
    }



    public class AdapterRankList extends RecyclerView.Adapter<AdapterRankList.MyViewHolder> {
        private List<BeanRank> mListenerList;
        Context mContext;


        public AdapterRankList(List<BeanRank> mListenerList, Context context) {
            mContext = context;
            this.mListenerList = mListenerList;

        }

        public class MyViewHolder extends RecyclerView.ViewHolder {
            TextView tv_Rank,tv_Percent,tv_Price;


            public MyViewHolder(View view) {
                super(view);

                tv_Rank = view.findViewById(R.id.tv_Rank);
                tv_Percent = view.findViewById(R.id.tv_Percent);
                tv_Price = view.findViewById(R.id.tv_Price);


            }

        }
        @Override
        public int getItemCount() {
            return mListenerList.size();
        }

        @Override
        public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
            View itemView = LayoutInflater.from(parent.getContext())
                    .inflate(R.layout.adapter_rank_list, parent, false);

            return new MyViewHolder(itemView);
        }

        @Override
        public void onBindViewHolder(final MyViewHolder holder, final int position) {

            String Rank = mListenerList.get(position).getRank();
            String PoolPriceDistribute = mListenerList.get(position).getPoolprice();
            String RankPercent = mListenerList.get(position).getPercent_destribution();

            holder.tv_Rank.setText("Rank "+Rank);
            holder.tv_Price.setText("₹"+PoolPriceDistribute);
            holder.tv_Percent.setText(RankPercent+"%");

        }

    }
}
