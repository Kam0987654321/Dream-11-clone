package com.ground11.g11.CreateContest;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

import com.ground11.g11.HomeActivity;
import com.ground11.g11.R;
import com.ground11.g11.SessionManager;

public class InviteInContestActivity extends AppCompatActivity {

    InviteInContestActivity activity;
    Context context;
    ImageView im_back;
    TextView tv_HeaderName;
    TextView tv_InviteFriend,tv_UniqueCode;
    String UserName,ContestCode;
    SessionManager sessionManager;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_invite_in_contest);
        context = activity = this;

        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);
        tv_InviteFriend = findViewById(R.id.tv_InviteFriend);
        tv_UniqueCode = findViewById(R.id.tv_UniqueCode);

        ContestCode = getIntent().getStringExtra("ContestCode");

        tv_UniqueCode.setText(ContestCode+"");

        tv_HeaderName.setText("INVITE FRIENDS TO CONTEST");
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                onBackPressed();
            }
        });

        sessionManager = new SessionManager();

        UserName = sessionManager.getUser(context).getName();


        tv_InviteFriend.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent sendIntent = new Intent();
                sendIntent.setAction(Intent.ACTION_SEND);
                sendIntent.putExtra(Intent.EXTRA_TEXT, "Your friend " + UserName +" invited you to join" +
                        "privcate contest in the" +
                        " Cricket Manager Fantasy App. " +
                        "Where you earn real money." +
                        "Download the app using this " +
                        "link:- link:- http://bowbucket.com/perfect11/apk/apk.apk and Enter this unique Code:- " +
                        ContestCode+" And Join contest.");

                sendIntent.setType("text/plain");
                startActivity(Intent.createChooser(sendIntent, "Share"));
            }
        });


    }

    @Override
    public void onBackPressed() {
        Intent i = new Intent(context, HomeActivity.class);
        startActivity(i);
        finish();

    }
}
