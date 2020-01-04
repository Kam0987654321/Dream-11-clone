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
import com.ground11.g11.Bean.BeanNotification;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.List;

import static com.ground11.g11.Config.NOTIFICATIONLIST;
import static com.ground11.g11.Constants.NOTIFICATIONTYPE;

public class NotificationActivity extends AppCompatActivity implements ResponseManager {

    RecyclerView RV_Notification;

    NotificationActivity activity;
    Context context;
    ResponseManager responseManager;
    APIRequestManager apiRequestManager;
    ImageView im_back;
    TextView tv_HeaderName;
    SessionManager sessionManager;
    AdapterNotificationList adapterNotificationList;

    SwipeRefreshLayout swipeRefreshLayout;
    TextView tv_NoDataAvailable;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_notification);

        context = activity = this;
        initViews();
        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);
        sessionManager = new SessionManager();

        RV_Notification.setHasFixedSize(true);
        RV_Notification.setNestedScrollingEnabled(false);
        RecyclerView.LayoutManager mLayoutManager = new LinearLayoutManager(activity);
        RV_Notification.setLayoutManager(mLayoutManager);
        RV_Notification.setItemAnimator(new DefaultItemAnimator());


        swipeRefreshLayout = findViewById(R.id.swipeRefreshLayout);
        swipeRefreshLayout.post(new Runnable() {
                                @Override
                                public void run() {
                                    swipeRefreshLayout.setRefreshing(true);
                                    callNotificationList(false);
                                }
                            }
        );

        swipeRefreshLayout.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {

                callNotificationList(false);
            }
        });


    }

    public void initViews(){
        RV_Notification =  findViewById(R.id.RV_Notification);

        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);
        tv_NoDataAvailable = findViewById(R.id.tv_NoDataAvailable);

        tv_HeaderName.setText("NOTIFICATIONS");
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                onBackPressed();
            }
        });

    }

    private void callNotificationList(boolean isShowLoader) {
        try {
            apiRequestManager.callAPI(NOTIFICATIONLIST,
                    createRequestJson(), context, activity, NOTIFICATIONTYPE,
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
        RV_Notification.setVisibility(View.VISIBLE);
        swipeRefreshLayout.setRefreshing(false);

        try {
            JSONArray jsonArray = result.getJSONArray("data");
            List<BeanNotification> beanContestLists = new Gson().fromJson(jsonArray.toString(),
                    new TypeToken<List<BeanNotification>>() {
                    }.getType());
            adapterNotificationList = new AdapterNotificationList(beanContestLists, activity);
            RV_Notification.setAdapter(adapterNotificationList);

        } catch (Exception e) {
            e.printStackTrace();
        }

        adapterNotificationList.notifyDataSetChanged();


    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    @Override
    public void onError(Context mContext, String type, String message) {

        //ShowToast(context,message);
        tv_NoDataAvailable.setVisibility(View.VISIBLE);
        RV_Notification.setVisibility(View.GONE);
        swipeRefreshLayout.setRefreshing(false);
    }


    public class AdapterNotificationList extends RecyclerView.Adapter<AdapterNotificationList.MyViewHolder> {
        private List<BeanNotification> mListenerList;
        Context mContext;


        public AdapterNotificationList(List<BeanNotification> mListenerList, Context context) {
            mContext = context;
            this.mListenerList = mListenerList;

        }

        public class MyViewHolder extends RecyclerView.ViewHolder {
            TextView tv_NotificationTitle,tv_NotificationContest ;




            public MyViewHolder(View view) {
                super(view);

                tv_NotificationTitle = view.findViewById(R.id.tv_NotificationTitle);
                tv_NotificationContest = view.findViewById(R.id.tv_NotificationContest);

            }

        }
        @Override
        public int getItemCount() {
            return mListenerList.size();
        }

        @Override
        public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
            View itemView = LayoutInflater.from(parent.getContext())
                    .inflate(R.layout.adapter_notification_list, parent, false);

            return new MyViewHolder(itemView);
        }

        @Override
        public void onBindViewHolder(final MyViewHolder holder, final int position) {


            final String ContestName = mListenerList.get(position).getContest_name();
            String Title= mListenerList.get(position).getTitle();


            holder.tv_NotificationTitle.setText(Title);
            holder.tv_NotificationContest.setText(ContestName);




        }

    }
}
