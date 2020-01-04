package com.ground11.g11.ForgotPasswordPackage;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.content.IntentFilter;
import android.os.Bundle;
import android.os.CountDownTimer;
import android.support.v4.content.LocalBroadcastManager;
import android.support.v7.app.AppCompatActivity;
import android.text.Editable;
import android.text.TextWatcher;
import android.view.View;
import android.view.WindowManager;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;

import com.ground11.g11.APICallingPackage.Class.APIRequestManager;
import com.ground11.g11.APICallingPackage.Interface.ResponseManager;
import com.ground11.g11.LoginActivity;
import com.ground11.g11.R;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.concurrent.TimeUnit;

import com.ground11.g11.APICallingPackage.Class.Validations;
import com.ground11.g11.Config;
import com.ground11.g11.Constants;

public class ForgotVerifyOTPActivity extends AppCompatActivity implements ResponseManager {


    ResponseManager responseManager;
    APIRequestManager apiRequestManager;

    Context context;
    ForgotVerifyOTPActivity activity;


    EditText et_Otp1,et_Otp2,et_Otp3,et_Otp4;

    TextView tv_VerifyOTP,tv_OtpSendTo,tv_OtpTimer,tv_OtpResend,tv_HeaderName;

    ImageView im_back;

    String OTP;
    String IntentType,IntentEmailorMobile;
    private static CountDownTimer countDownTimer;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_verify_otp);

        this.getWindow().setSoftInputMode(WindowManager.LayoutParams.SOFT_INPUT_STATE_ALWAYS_HIDDEN);
        context = activity = this;
        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);
        initView();


        Intent o = getIntent();
        IntentType = o.getStringExtra("type");
        IntentEmailorMobile = o.getStringExtra("EmailorMobile");


        tv_OtpSendTo.setText("OTP sent to "+IntentEmailorMobile);

        callForgotPasswordApi(true);

        et_Otp1.addTextChangedListener(new TextWatcher() {

            public void onTextChanged(CharSequence s, int start, int before, int count) {
                if (et_Otp1.getText().toString().length() == 1)     //size as per your requirement
                {
                    et_Otp2.requestFocus();
                }
            }

            public void beforeTextChanged(CharSequence s, int start,
                                          int count, int after) {
            }

            public void afterTextChanged(Editable s) {
            }

        });

        et_Otp2.addTextChangedListener(new TextWatcher() {

            public void onTextChanged(CharSequence s, int start, int before, int count) {
                if (et_Otp2.getText().toString().length() == 1)     //size as per your requirement
                {
                    et_Otp3.requestFocus();
                }
            }

            public void beforeTextChanged(CharSequence s, int start,
                                          int count, int after) {
            }

            public void afterTextChanged(Editable s) {
            }

        });

        et_Otp3.addTextChangedListener(new TextWatcher() {

            public void onTextChanged(CharSequence s, int start, int before, int count) {
                if (et_Otp3.getText().toString().length() == 1)     //size as per your requirement
                {
                    et_Otp4.requestFocus();
                }
            }

            public void beforeTextChanged(CharSequence s, int start,
                                          int count, int after) {
            }

            public void afterTextChanged(Editable s) {
            }

        });
        et_Otp4.addTextChangedListener(new TextWatcher() {

            public void onTextChanged(CharSequence s, int start, int before, int count) {
                if (et_Otp4.getText().toString().length() == 1)     //size as per your requirement
                {
                   OTP = GetOTP();
                   callVerifyOTPApi(true);

                }
            }

            public void beforeTextChanged(CharSequence s, int start,
                                          int count, int after) {
            }

            public void afterTextChanged(Editable s) {
            }

        });


        tv_VerifyOTP.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                OTP  = GetOTP();
                callVerifyOTPApi(true);
                countDownTimer.cancel();

            }
        });

        tv_OtpResend.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                callForgotPasswordApi(true);
                tv_OtpTimer.setVisibility(View.VISIBLE);
                tv_OtpResend.setVisibility(View.GONE);

            }
        });

    }

    public void initView(){
        et_Otp1 = findViewById(R.id.et_Otp1);
        et_Otp2 = findViewById(R.id.et_Otp2);
        et_Otp3 = findViewById(R.id.et_Otp3);
        et_Otp4 = findViewById(R.id.et_Otp4);


        tv_VerifyOTP = findViewById(R.id.tv_VerifyOTP);
        tv_OtpSendTo = findViewById(R.id.tv_OtpSendTo);
        tv_OtpTimer = findViewById(R.id.tv_OtpTimer);
        tv_OtpResend = findViewById(R.id.tv_OtpResend);
        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);

        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                try {
                    countDownTimer.cancel();
                }
                catch (Exception e){
                    e.printStackTrace();
                }
                onBackPressed();
            }
        });
        tv_HeaderName.setText("VERIFY OTP");


    }

    public String GetOTP(){
        String GETOTP = "";
        String Otp1 = et_Otp1.getText().toString();
        String Otp2 = et_Otp2.getText().toString();
        String Otp3 = et_Otp3.getText().toString();
        String Otp4 = et_Otp4.getText().toString();

        if (Otp1.equals("")){
            Validations.ShowToast(context,"Enter OTP");
        }
        else if (Otp2.equals("")){
            Validations.ShowToast(context,"Enter OTP");
        }else if (Otp3.equals("")){
            Validations.ShowToast(context,"Enter OTP");
        }else if (Otp4.equals("")){
            Validations.ShowToast(context,"Enter OTP");
        }
        else {
            GETOTP = Otp1+Otp2+Otp3+Otp4;
        }

        return GETOTP;
    }


    private BroadcastReceiver receiver = new BroadcastReceiver() {
        @Override
        public void onReceive(Context context, Intent intent) {
            if (intent.getAction().equalsIgnoreCase("otp")) {
                final String message = intent.getStringExtra("message");

                char o1 = message.charAt(0);
                char o2 = message.charAt(1);
                char o3 = message.charAt(2);
                char o4 = message.charAt(3);


                et_Otp1.setText(o1+"");
                et_Otp2.setText(o2+"");
                et_Otp3.setText(o3+"");
                et_Otp4.setText(o4+"");

                GetOTP();
                callVerifyOTPApi(true);
                countDownTimer.cancel();

            }
        }
    };

    private void callVerifyOTPApi(boolean isShowLoader) {
        try {

            apiRequestManager.callAPI(Config.VERIFYFORGOTPASSWORD,
                    createRequestJson(), context, activity, Constants.VERIFYFORGOTPASSWORDTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJson() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("EmailorNumber", IntentEmailorMobile);
            jsonObject.put("otp", OTP);
            jsonObject.put("type", IntentType);



        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }



    private void callForgotPasswordApi(boolean isShowLoader) {
        try {

            countDownTimer =  new CountDownTimer(60000, 1000) {

                public void onTick(long millisUntilFinished) {
                    //tv_Timer.setText("Resend OTP in: " + millisUntilFinished / 1000);
                    tv_OtpTimer.setText("Didn't receive the OTP? Request for a new one in "+ String.format("%d:%d sec",
                            TimeUnit.MILLISECONDS.toMinutes( millisUntilFinished),
                            TimeUnit.MILLISECONDS.toSeconds(millisUntilFinished) -
                                    TimeUnit.MINUTES.toSeconds(TimeUnit.MILLISECONDS.toMinutes(millisUntilFinished))));
                }
                public void onFinish() {
                    tv_OtpResend.setVisibility(View.VISIBLE);
                    tv_OtpTimer.setVisibility(View.GONE);
                }

            }.start();


            apiRequestManager.callAPI(Config.FORGOTPASSWORD,
                    createRequestJsonForgotPassword(), context, activity, Constants.FORGOTPASSWORDTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJsonForgotPassword() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("EmailorNumber", IntentEmailorMobile);
            jsonObject.put("type", IntentType);

        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }



    @Override
    public void onResume() {
        try {
            LocalBroadcastManager.getInstance(this).registerReceiver(receiver, new IntentFilter("otp"));
        }
        catch (Exception e){
            e.printStackTrace();
        }
        super.onResume();
    }

    @Override
    public void onPause() {
        super.onPause();
        try {
            LocalBroadcastManager.getInstance(this).unregisterReceiver(receiver);
        }
        catch (Exception e){
            e.printStackTrace();
        }
    }



    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {


        if (type.equals(Constants.VERIFYFORGOTPASSWORDTYPE)) {
            Validations.ShowToast(context,message);

            try {
                Intent i = new Intent(activity, NewPasswordActivity.class);
                i.putExtra("UserId", result.getString("user_id"));
                i.putExtra("IntentActivity", "ForgotPassword");

                startActivity(i);
            }
            catch (Exception e){
                e.printStackTrace();
            }
        }
        else if (type.equals(Constants.FORGOTPASSWORDTYPE)){
            Validations.ShowToast(context,message);
        }

    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    @Override
    public void onError(Context mContext, String type, String message) {
        //ShowToast(context,message);
        if (type.equals(Constants.VERIFYFORGOTPASSWORDTYPE)){
            Validations.ShowToast(context,"Invalid OTP");
        }
        else if (type.equals(Constants.FORGOTPASSWORDTYPE)){
            Validations.ShowToast(context,message);
        }

    }

    @Override
    public void onBackPressed() {
        Intent i = new Intent(activity,LoginActivity.class);
        startActivity(i);
    }
}
