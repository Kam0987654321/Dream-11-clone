package com.ground11.g11;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

import com.ground11.g11.APICallingPackage.Class.APIRequestManager;
import com.ground11.g11.APICallingPackage.Interface.ResponseManager;

import org.json.JSONObject;

public class InviteFriendsActivity extends AppCompatActivity implements ResponseManager {


    InviteFriendsActivity  activity;
    Context context;
    ResponseManager responseManager;
    APIRequestManager apiRequestManager;
    ImageView im_back;
    TextView tv_HeaderName;
    SessionManager sessionManager;
    TextView tv_InviteFriend,tv_UniqueCode,tv_MyFriendList;
    String ReferralCode,UserName;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_invite_friends);

        context = activity = this;
        initViews();
        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);
        sessionManager = new SessionManager();
        ReferralCode = sessionManager.getUser(context).getReferral_code();
        UserName = sessionManager.getUser(context).getName();

        tv_UniqueCode.setText(ReferralCode);

        tv_InviteFriend.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent sendIntent = new Intent();
                sendIntent.setAction(Intent.ACTION_SEND);
                sendIntent.putExtra(Intent.EXTRA_TEXT, "Your friend " + UserName +" invited you to the" +
                        "Myheros11" +
                        "Where you earn real money." +
                        "Download the app using this " +
                        "link:- https://mybytecode.com/demo/fantasy/demo2/dream11/apk/apk.apk and Enter this unique Code:- " +
                        ReferralCode+" And create your account.");

                sendIntent.setType("text/plain");
                startActivity(Intent.createChooser(sendIntent, "Share"));
            }
        });

        tv_MyFriendList.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(activity, InvitedFriendListActivity.class);
                startActivity(i);
            }
        });

    }

    public void initViews(){
        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);
        tv_InviteFriend = findViewById(R.id.tv_InviteFriend);
        tv_UniqueCode = findViewById(R.id.tv_UniqueCode);
        tv_MyFriendList = findViewById(R.id.tv_MyFriendList);



        tv_HeaderName.setText("INVITE FRIENDS");
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                onBackPressed();
            }
        });

    }

    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {

    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    @Override
    public void onError(Context mContext, String type, String message) {

    }
}
