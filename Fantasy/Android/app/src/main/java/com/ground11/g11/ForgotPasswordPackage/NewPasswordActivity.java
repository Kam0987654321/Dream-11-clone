package com.ground11.g11.ForgotPasswordPackage;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.TextInputLayout;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;

import com.ground11.g11.APICallingPackage.Class.APIRequestManager;
import com.ground11.g11.APICallingPackage.Class.Validations;
import com.ground11.g11.APICallingPackage.Interface.ResponseManager;
import com.ground11.g11.HomeActivity;
import com.ground11.g11.LoginActivity;
import com.ground11.g11.R;

import org.json.JSONException;
import org.json.JSONObject;

import static com.ground11.g11.APICallingPackage.Class.Validations.ShowToast;
import static com.ground11.g11.Config.CHANGEPASSWORD;
import static com.ground11.g11.Config.UPDATENEWPASSWORD;
import static com.ground11.g11.Constants.CHANGEPASSWORDTPYE;
import static com.ground11.g11.Constants.UPDATENEWPASSWORDTPYE;

public class NewPasswordActivity extends AppCompatActivity implements ResponseManager {

    ResponseManager responseManager;
    APIRequestManager apiRequestManager;

    Context context;
    NewPasswordActivity activity;

    ImageView im_back;
    TextView tv_HeaderName,tv_SubmitNewPassword;
    TextInputLayout input_OldPassword,input_NewPassword,input_ConfirmNewPassword;
    EditText et_OldPassword,et_NewPassword,et_ConfirmNewPassword;

    String UserId,IntentActivity;
    String NewPassword,ConfirmNewPassword,OldPassword;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_new_password);
        context = activity = this;
        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);
        initViews();

        UserId = getIntent().getStringExtra("UserId");
        IntentActivity = getIntent().getStringExtra("IntentActivity");

        if (IntentActivity.equals("ForgotPassword")){
            input_OldPassword.setVisibility(View.GONE);
        }
        else if (IntentActivity.equals("ChangePassword")){
            input_OldPassword.setVisibility(View.VISIBLE);
        }


        tv_SubmitNewPassword.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                NewPassword = et_NewPassword.getText().toString();
                ConfirmNewPassword = et_ConfirmNewPassword.getText().toString();

                if (IntentActivity.equals("ChangePassword")){
                    OldPassword = et_OldPassword.getText().toString();
                    if (OldPassword.equals("")){
                        ShowToast(context,"Enter Old Password");
                    }else if (OldPassword.length()<8&& !Validations.isValidPassword(OldPassword)){

                        ShowToast(context,"Password Pattern Not Macthed");
                    }

                    else if (NewPassword.equals("")){
                        ShowToast(context,"Enter New Password");
                    }
                    else if (NewPassword.length()<8&& !Validations.isValidPassword(NewPassword)){

                        ShowToast(context,"Password Pattern Not Macthed");
                    }
                    else if (ConfirmNewPassword.equals("")){
                        ShowToast(context,"Enter Confirm New Password");
                    }
                    else if (!NewPassword.equals(ConfirmNewPassword)){
                        ShowToast(context,"Confirm Password Not Match");
                    }
                    else {
                        callChangePasswordApi(true);
                    }
                }
                else {

                    if (NewPassword.equals("")) {
                        ShowToast(context, "Enter New Password");
                    }else if (NewPassword.length()<8&& !Validations.isValidPassword(NewPassword)){

                        ShowToast(context,"Password Pattern Not Macthed");
                    }
                    else if (ConfirmNewPassword.equals("")) {
                        ShowToast(context, "Enter Confirm New Password");
                    } else if (!NewPassword.equals(ConfirmNewPassword)) {
                        ShowToast(context, "Confirm Password Not Match");
                    } else {
                        callUpdatePasswordApi(true);
                    }
                }

            }
        });

    }

    public void initViews(){

        tv_SubmitNewPassword = findViewById(R.id.tv_SubmitNewPassword);
        et_OldPassword = findViewById(R.id.et_OldPassword);
        et_NewPassword = findViewById(R.id.et_NewPassword);
        et_ConfirmNewPassword = findViewById(R.id.et_ConfirmNewPassword);

        input_OldPassword = findViewById(R.id.input_OldPassword);
        input_NewPassword = findViewById(R.id.input_NewPassword);
        input_ConfirmNewPassword = findViewById(R.id.input_ConfirmNewPassword);


        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);
        tv_HeaderName.setText("NEW PASSWORD");
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                onBackPressed();
            }
        });

    }

    private void callChangePasswordApi(boolean isShowLoader) {
        try {

            apiRequestManager.callAPI(CHANGEPASSWORD,
                    createRequestJsonForgotPassword(), context, activity, CHANGEPASSWORDTPYE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    private void callUpdatePasswordApi(boolean isShowLoader) {
        try {

            apiRequestManager.callAPI(UPDATENEWPASSWORD,
                    createRequestJsonForgotPassword(), context, activity, UPDATENEWPASSWORDTPYE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJsonForgotPassword() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("password", NewPassword);
            jsonObject.put("user_id", UserId);
            if (IntentActivity.equals("ChangePassword")) {
                jsonObject.put("old_password", OldPassword);
            }
        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }

    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {
        if (IntentActivity.equals("ChangePassword")){
            ShowToast(context,message);
            Intent i = new Intent(activity, HomeActivity.class);
            startActivity(i);
            finish();
        }
        else {
            ShowToast(context,message);
            Intent i = new Intent(activity, LoginActivity.class);
            startActivity(i);
        }

    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    @Override
    public void onError(Context mContext, String type, String message) {
        ShowToast(context,message);
    }

    @Override
    public void onBackPressed() {

        if (IntentActivity.equals("ForgotPassword")){
            Intent i = new Intent(activity,LoginActivity.class);
            startActivity(i);
        }
        else {
            super.onBackPressed();
        }
    }
}
