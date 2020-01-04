package com.ground11.g11;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.ground11.g11.APICallingPackage.Class.APIRequestManager;
import com.ground11.g11.APICallingPackage.Interface.ResponseManager;
import com.ground11.g11.PayUMoneyPackage.PayUMoneyPaymentActivity;
import com.ground11.g11.PaytmPackage.PaytmActivity;

import com.ground11.g11.TrakNPayPackage.TrakNPayActivity;

import org.json.JSONObject;

import static com.ground11.g11.APICallingPackage.Class.Validations.ShowToast;

public class PaymentOptionActivity extends AppCompatActivity implements ResponseManager {


    PaymentOptionActivity activity;
    Context context;
    ResponseManager responseManager;
    APIRequestManager apiRequestManager;
    ImageView im_back;
    TextView tv_HeaderName;
    SessionManager sessionManager;

    String IntentFinalAmount;

    TextView tv_PaymentFinalAmount;
    RelativeLayout RL_PaytmPayment,RL_PayUMoneyPayment,RL_TrakNPayPayment;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_payment_option);


        context = activity = this;
        initViews();
        sessionManager = new SessionManager();
        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);

        IntentFinalAmount = getIntent().getStringExtra("FinalAmount");
        tv_PaymentFinalAmount.setText("₹ "+IntentFinalAmount);

        RL_PaytmPayment.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (IntentFinalAmount.equals("")){
                    ShowToast(context,"Please Select Correct Amount");
                }
                else {
                    Intent i  = new Intent(activity, PaytmActivity.class);
                    i.putExtra("FinalAmount",IntentFinalAmount);
                    startActivity(i);
                }

            }
        });

        RL_PayUMoneyPayment.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (IntentFinalAmount.equals("")){
                    ShowToast(context,"Please Select Correct Amount");
                }
                else {
                    Intent i  = new Intent(activity, PayUMoneyPaymentActivity.class);
                    i.putExtra("FinalAmount",IntentFinalAmount);
                    startActivity(i);
                }

            }
        });
        RL_TrakNPayPayment.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (IntentFinalAmount.equals("")){
                    ShowToast(context,"Please Select Correct Amount");
                }
                else {
                    Intent i  = new Intent(activity, TrakNPayActivity.class);
                    i.putExtra("FinalAmount",IntentFinalAmount);
                    startActivity(i);
                }

            }
        });




    }

    public void initViews() {

        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);
        tv_HeaderName.setText("PAYMENT OPTION");
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                onBackPressed();
            }
        });

        RL_PaytmPayment = findViewById(R.id.RL_PaytmPayment);
        RL_PayUMoneyPayment = findViewById(R.id.RL_PayUMoneyPayment);
        RL_TrakNPayPayment = findViewById(R.id.RL_TrakNPayPayment);

        tv_PaymentFinalAmount = findViewById(R.id.tv_PaymentFinalAmount);

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
