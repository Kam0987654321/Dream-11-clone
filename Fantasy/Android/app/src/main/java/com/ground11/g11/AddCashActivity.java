package com.indian11.app;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;

import com.indian11.app.APICallingPackage.Class.APIRequestManager;
import com.indian11.app.APICallingPackage.Interface.ResponseManager;

import org.json.JSONObject;

import com.indian11.app.APICallingPackage.Class.Validations;

public class AddCashActivity extends AppCompatActivity implements ResponseManager {

    AddCashActivity activity;
    Context context;
    ResponseManager responseManager;
    APIRequestManager apiRequestManager;
    ImageView im_back;
    TextView tv_HeaderName;
    SessionManager sessionManager;

    EditText et_AddCashEnterAmount;
    TextView tv_AddCash,tv_OneHundred,tv_TwoHundred,tv_FiveHundred;
    String FinalAmountToAdd;
    String EntryFee;
    public  static  String Activity="";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add_cash);

        context = activity = this;
        initViews();
        sessionManager = new SessionManager();
        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);
try{
    EntryFee = getIntent().getStringExtra("EntryFee");

    if(EntryFee!=null)
    {
        et_AddCashEnterAmount.setText(String.valueOf(EntryFee));
    }

}
catch (Exception e)
{
e.printStackTrace();
}

try{
    Activity = getIntent().getStringExtra("Activity");
    System.out.print(Activity);
    if(Activity==null)
    {
        Activity="";
    }
}
catch (Exception e)
{
    e.printStackTrace();
}

        tv_AddCash.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                FinalAmountToAdd = et_AddCashEnterAmount.getText().toString();

                if (FinalAmountToAdd.equals("")){
                    Validations.ShowToast(context,"Enter Valid Amount");
                    FinalAmountToAdd = "0";
                }else if (Integer.parseInt(FinalAmountToAdd)<10){
                    Validations.ShowToast(context,"Enter minimum  Amount is 10");

                }
                else {
                    Intent i = new Intent(activity,PaymentOptionActivity.class);
                    i.putExtra("FinalAmount",FinalAmountToAdd);

                    startActivity(i);
                }
            }
        });

        tv_OneHundred.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                et_AddCashEnterAmount.setText("100");
            }
        });
        tv_TwoHundred.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                et_AddCashEnterAmount.setText("200");
            }
        });
        tv_FiveHundred.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                et_AddCashEnterAmount.setText("500");
            }
        });



    }

    public void initViews() {

        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);
        et_AddCashEnterAmount = findViewById(R.id.et_AddCashEnterAmount);
        tv_AddCash = findViewById(R.id.tv_AddCash);

        tv_OneHundred = findViewById(R.id.tv_OneHundred);
        tv_TwoHundred = findViewById(R.id.tv_TwoHundred);
        tv_FiveHundred = findViewById(R.id.tv_FiveHundred);



        tv_HeaderName.setText("ADD CASH");
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
