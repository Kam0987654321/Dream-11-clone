package com.ground11.g11;

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

import com.ground11.g11.APICallingPackage.Class.APIRequestManager;
import com.ground11.g11.APICallingPackage.Interface.ResponseManager;
import com.ground11.g11.Bean.BeanFriendsList;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.List;

import static com.ground11.g11.Config.INVITEDFRIENDSLIST;

public class InvitedFriendListActivity extends AppCompatActivity implements ResponseManager {

    RecyclerView RV_FriendsList;

    InvitedFriendListActivity activity;
    Context context;
    ResponseManager responseManager;
    APIRequestManager apiRequestManager;
    ImageView im_back;
    TextView tv_HeaderName;
    SessionManager sessionManager;
    AdapterFriendsList adapterFriendsList;

    SwipeRefreshLayout swipeRefreshLayout;
    TextView tv_NoDataAvailable;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_invited_friend_list);

        context = activity = this;
        initViews();
        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);
        sessionManager = new SessionManager();

        RV_FriendsList.setHasFixedSize(true);
        RV_FriendsList.setNestedScrollingEnabled(false);
        RecyclerView.LayoutManager mLayoutManager = new LinearLayoutManager(activity);
        RV_FriendsList.setLayoutManager(mLayoutManager);
        RV_FriendsList.setItemAnimator(new DefaultItemAnimator());


        swipeRefreshLayout = findViewById(R.id.swipeRefreshLayout);
        swipeRefreshLayout.post(new Runnable() {
                                @Override
                                public void run() {
                                    swipeRefreshLayout.setRefreshing(true);
                                    callFriendsList(false);
                                }
                            }
        );

        swipeRefreshLayout.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {

                callFriendsList(false);
            }
        });

    }

    public void initViews(){
        RV_FriendsList =  findViewById(R.id.RV_FriendsList);

        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);
        tv_NoDataAvailable = findViewById(R.id.tv_NoDataAvailable);


        tv_HeaderName.setText("YOUR INVITED FRIENDS");
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                onBackPressed();
            }
        });

    }

    private void callFriendsList(boolean isShowLoader) {
        try {
            apiRequestManager.callAPI(INVITEDFRIENDSLIST,
                    createRequestJson(), context, activity, Constants.INVITEDFRIENDSLISTTYPE,
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
        RV_FriendsList.setVisibility(View.VISIBLE);
        swipeRefreshLayout.setRefreshing(false);

        try {
            JSONArray jsonArray = result.getJSONArray("data");
            List<BeanFriendsList> beanContestLists = new Gson().fromJson(jsonArray.toString(),
                    new TypeToken<List<BeanFriendsList>>() {
                    }.getType());
            adapterFriendsList = new AdapterFriendsList(beanContestLists, activity);
            RV_FriendsList.setAdapter(adapterFriendsList);

        } catch (Exception e) {
            e.printStackTrace();
        }

        adapterFriendsList.notifyDataSetChanged();


    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    @Override
    public void onError(Context mContext, String type, String message) {

        //ShowToast(context,message);
        tv_NoDataAvailable.setVisibility(View.VISIBLE);
        RV_FriendsList.setVisibility(View.GONE);
        swipeRefreshLayout.setRefreshing(false);
    }


    public class AdapterFriendsList extends RecyclerView.Adapter<AdapterFriendsList.MyViewHolder> {
        private List<BeanFriendsList> mListenerList;
        Context mContext;


        public AdapterFriendsList(List<BeanFriendsList> mListenerList, Context context) {
            mContext = context;
            this.mListenerList = mListenerList;

        }

        public class MyViewHolder extends RecyclerView.ViewHolder {
            TextView tv_FriendName,tv_CreditedAmount ;


            public MyViewHolder(View view) {
                super(view);

                tv_FriendName = view.findViewById(R.id.tv_FriendName);
                tv_CreditedAmount = view.findViewById(R.id.tv_CreditedAmount);
            }
        }
        @Override
        public int getItemCount() {
            return mListenerList.size();
        }

        @Override
        public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
            View itemView = LayoutInflater.from(parent.getContext())
                    .inflate(R.layout.adapter_friends_list, parent, false);

            return new MyViewHolder(itemView);
        }

        @Override
        public void onBindViewHolder(final MyViewHolder holder, final int position) {

            final String FriendEmail = mListenerList.get(position).getEmail();
            String BonusEarned= mListenerList.get(position).getBonus();

            holder.tv_FriendName.setText(FriendEmail);
            holder.tv_CreditedAmount.setText("Earning through friend - ₹"+BonusEarned);
        }

    }
}
