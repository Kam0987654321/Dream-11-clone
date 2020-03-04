package com.indian11.app;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.LinearLayout;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {

    TextView tv_LetsPlay;
    LinearLayout LL_StartLogin,LL_StartSignUp;

    Context context;
    MainActivity activity;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        context = activity = this;
        initViews();


        LL_StartLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(activity,LoginActivity.class);
                startActivity(i);
            }
        });

        LL_StartSignUp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(activity,RegistrationActivity.class);
                i.putExtra("Reffered","Yes");
                startActivity(i);
            }
        });

        tv_LetsPlay.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(activity,RegistrationActivity.class);
                i.putExtra("Reffered","No");
                startActivity(i);
            }
        });



    }

    public void initViews(){

        LL_StartSignUp = findViewById(R.id.LL_StartSignUp);
        LL_StartLogin = findViewById(R.id.LL_StartLogin);
        tv_LetsPlay = findViewById(R.id.tv_LetsPlay);
    }

    @Override
    public void onBackPressed() {


        Intent intent = new Intent(Intent.ACTION_MAIN);
        intent.addCategory(Intent.CATEGORY_HOME);
        intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
        startActivity(intent);


    }
}
