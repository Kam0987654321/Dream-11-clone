package com.indian11.app.MyAccount;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.indian11.app.APICallingPackage.Class.APIRequestManager;
import com.indian11.app.APICallingPackage.Interface.ResponseManager;
import com.indian11.app.AddCashActivity;
import com.indian11.app.R;
import com.indian11.app.SessionManager;

import org.json.JSONException;
import org.json.JSONObject;

import static com.indian11.app.APICallingPackage.Class.Validations.ShowToast;
import static com.indian11.app.Config.MYACCOUNT;
import static com.indian11.app.Constants.MYACCOUNTTYPE;

public class MyAccountActivity extends AppCompatActivity implements ResponseManager {

    MyAccountActivity activity;
    Context context;
    ResponseManager responseManager;
    APIRequestManager apiRequestManager;
    ImageView im_back;
    TextView tv_HeaderName;
    SessionManager sessionManager;

    TextView tv_TotalBalance,tv_AddBalance,tv_DepositedAmount,tv_WinningAmount,tv_Withdraw,
    tv_BonusAmount;
    ImageView im_DepositeInfo,im_WinningInfo,im_BonusInfo;
    RelativeLayout RL_MyRecentTransactions,RL_ManagePayments;

    String TotalBalance,Deposited,Winnings,Bonus,PanStatus,AadhaarStatus;

    //Upload Document
    TextView tv_UploadPan,tv_UploadAadhaar;
    ImageView im_PanVerified,im_AadhaarVerified;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_my_account);
        context = activity = this;
        initViews();
        sessionManager = new SessionManager();
        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);


        tv_AddBalance.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(activity, AddCashActivity.class);
                startActivity(i);
            }
        });
        callMyAccount(true);

        RL_MyRecentTransactions.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(activity,MyTransactionActivity.class);
                startActivity(i);
            }
        });

        tv_Withdraw.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                double Amount = Double.parseDouble(activity.getString(R.string.MinimumWithdrawAmountLimit));
                if (PanStatus.equals("2")&&AadhaarStatus.equals("2")) {
                    if (Double.parseDouble(Winnings) >= Amount) {
                        Intent i = new Intent(activity, WithdrawAmountActivity.class);
                        i.putExtra("AvailableBalance", Winnings);
                        startActivity(i);
                    } else {
                        ShowToast(context, "Not Enough Amount for Withdraw Request.");
                    }
                }
                else {
                    ShowToast(context, "Update your KYC document for withdraw amount.");
                }
            }
        });

        tv_UploadAadhaar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i  = new Intent(activity,UploadKYCActivity.class);
                i.putExtra("DocType","Aadhaar");
                startActivity(i);
            }
        });
        tv_UploadPan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i  = new Intent(activity,UploadKYCActivity.class);
                i.putExtra("DocType","Pan");
                startActivity(i);
            }
        });


    }
    public void initViews() {

        tv_TotalBalance = findViewById(R.id.tv_TotalBalance);
        tv_AddBalance = findViewById(R.id.tv_AddBalance);
        tv_DepositedAmount = findViewById(R.id.tv_DepositedAmount);
        im_DepositeInfo = findViewById(R.id.im_DepositeInfo);
        tv_WinningAmount = findViewById(R.id.tv_WinningAmount);
        tv_Withdraw = findViewById(R.id.tv_Withdraw);
        im_WinningInfo = findViewById(R.id.im_WinningInfo);
        tv_BonusAmount = findViewById(R.id.tv_BonusAmount);
        im_BonusInfo = findViewById(R.id.im_BonusInfo);
        RL_MyRecentTransactions = findViewById(R.id.RL_MyRecentTransactions);
        RL_ManagePayments = findViewById(R.id.RL_ManagePayments);

        //Upload Document
        im_AadhaarVerified = findViewById(R.id.im_AadhaarVerified);
        tv_UploadAadhaar = findViewById(R.id.tv_UploadAadhaar);
        im_PanVerified = findViewById(R.id.im_PanVerified);
        tv_UploadPan = findViewById(R.id.tv_UploadPan);


        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);

        tv_HeaderName.setText("MY ACCOUNT");
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                onBackPressed();
            }
        });


    }

    private void callMyAccount(boolean isShowLoader) {
        try {
            apiRequestManager.callAPI(MYACCOUNT,
                    createRequestJson(), context, activity, MYACCOUNTTYPE,
                    isShowLoader, responseManager);
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

        try{
            TotalBalance = result.getString("total_amount");
            Deposited = result.getString("credit_amount");
            Winnings = result.getString("winning_amount");
            Bonus = result.getString("bonous_amount");
            AadhaarStatus = result.getString("aadhar_status");
            PanStatus = result.getString("pan_status");


            tv_TotalBalance.setText("₹ "+TotalBalance);
            tv_DepositedAmount.setText("₹ "+Deposited);
            tv_WinningAmount.setText("₹ "+Winnings);
            tv_BonusAmount.setText("₹ "+Bonus);

            if (PanStatus.equals("0")){
                im_PanVerified.setVisibility(View.INVISIBLE);
                tv_UploadPan.setEnabled(true);
            }
            else if (PanStatus.equals("1")){
                im_PanVerified.setVisibility(View.VISIBLE);
                im_PanVerified.setImageResource(R.drawable.pending_icon);
                tv_UploadPan.setText("Pending");
                tv_UploadPan.setEnabled(false);
            }
            else if (PanStatus.equals("2")){
                im_PanVerified.setVisibility(View.VISIBLE);
                im_PanVerified.setImageResource(R.drawable.verify_icon);
                tv_UploadPan.setText("Verified");
                tv_UploadPan.setEnabled(false);
            }
            else {
                im_PanVerified.setVisibility(View.INVISIBLE);
                tv_UploadPan.setText("Upload");
                tv_UploadPan.setEnabled(true);
            }

            if (AadhaarStatus.equals("0")){
                im_AadhaarVerified.setVisibility(View.INVISIBLE);
                tv_UploadAadhaar.setEnabled(true);
            }
            else if (AadhaarStatus.equals("1")){
                im_AadhaarVerified.setVisibility(View.VISIBLE);
                im_AadhaarVerified.setImageResource(R.drawable.pending_icon);
                tv_UploadAadhaar.setText("Pending");
                tv_UploadAadhaar.setEnabled(false);

            }
            else if (AadhaarStatus.equals("2")){
                im_AadhaarVerified.setVisibility(View.VISIBLE);
                im_AadhaarVerified.setImageResource(R.drawable.verify_icon);
                tv_UploadAadhaar.setText("Verified");
                tv_UploadAadhaar.setEnabled(false);
            }
            else {
                im_AadhaarVerified.setVisibility(View.INVISIBLE);
                tv_UploadAadhaar.setText("Upload");
                tv_UploadAadhaar.setEnabled(true);
            }

    } catch (JSONException e) {
        e.printStackTrace();
    }

    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    @Override
    public void onError(Context mContext, String type, String message) {

    }

}
