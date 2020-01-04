package com.ground11.g11.MyAccount;

import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.view.WindowManager;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;

import com.ground11.g11.APICallingPackage.Class.APIRequestManager;
import com.ground11.g11.APICallingPackage.Interface.ResponseManager;
import com.ground11.g11.R;
import com.ground11.g11.SessionManager;

import org.json.JSONException;
import org.json.JSONObject;

import com.ground11.g11.Constants;

import static com.ground11.g11.APICallingPackage.Class.Validations.ShowToast;
import static com.ground11.g11.Config.WITHDRAWAMOUNTUSERDATA;
import static com.ground11.g11.Config.WITHDRAWLREQUEST;

public class WithdrawAmountActivity extends AppCompatActivity implements ResponseManager {


    WithdrawAmountActivity activity;
    Context context;
    ResponseManager responseManager;
    APIRequestManager apiRequestManager;
    ImageView im_back;
    TextView tv_HeaderName;
    SessionManager sessionManager;

    TextView tv_SubmitWithdrawRequest,tv_WithdrawAvailabeBalance;
    EditText et_WithdrawEnterAmount,et_WithdrawName,et_WithdrawMobile,
            et_WithdrawAccountNumber,et_WithdrawBankName,et_WithdrawIFSCCode,
            et_WithdrawBranchAddress,et_WithdrawPAN,et_WithdrawAdhaar;

    String Amount,Name,Number,AccountNumber,BankName,
    IFSCCode,BranchAddress,PanCardNumber, AdhaarCardNumber;
    String AvailableBalance;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_withdraw_amount);
        this.getWindow().setSoftInputMode(WindowManager.LayoutParams.SOFT_INPUT_STATE_ALWAYS_HIDDEN);
        context = activity = this;
        initViews();
        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);
        sessionManager = new SessionManager();

        AvailableBalance = getIntent().getStringExtra("AvailableBalance");

        tv_WithdrawAvailabeBalance.setText("Available Amount for Withdrawl\n₹"+AvailableBalance);

        tv_SubmitWithdrawRequest.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Amount = et_WithdrawEnterAmount.getText().toString();
                Name = et_WithdrawName.getText().toString();
                Number = et_WithdrawMobile.getText().toString();
                AccountNumber = et_WithdrawAccountNumber.getText().toString();
                BankName = et_WithdrawBankName.getText().toString();
                IFSCCode = et_WithdrawIFSCCode.getText().toString();
                BranchAddress = et_WithdrawBranchAddress.getText().toString();
                PanCardNumber = et_WithdrawPAN.getText().toString();
                AdhaarCardNumber = et_WithdrawAdhaar.getText().toString();

                if (Amount.equals("")|| Name.equals("")|| Number.equals("")||
                        AccountNumber.equals("")|| BankName.equals("")|| IFSCCode.equals("")||
                        BranchAddress.equals("")|| PanCardNumber.equals("")||
                        AdhaarCardNumber.equals("")){
                        ShowToast(context,"Field Can't Be Empty");

                }
                else {
                    ConfirmationDialog(Amount);
                }
            }
        });


        callLoadAccountData(true);

    }

    public void initViews(){

        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);

        et_WithdrawEnterAmount= findViewById(R.id.et_WithdrawEnterAmount);
        et_WithdrawName= findViewById(R.id.et_WithdrawName);
        et_WithdrawMobile= findViewById(R.id.et_WithdrawMobile);
        et_WithdrawAccountNumber= findViewById(R.id.et_WithdrawAccountNumber);
        et_WithdrawBankName= findViewById(R.id.et_WithdrawBankName);
        et_WithdrawIFSCCode= findViewById(R.id.et_WithdrawIFSCCode);
        et_WithdrawBranchAddress= findViewById(R.id.et_WithdrawBranchAddress);
        et_WithdrawPAN= findViewById(R.id.et_WithdrawPAN);
        et_WithdrawAdhaar= findViewById(R.id.et_WithdrawAdhaar);

        tv_SubmitWithdrawRequest= findViewById(R.id.tv_SubmitWithdrawRequest);
        tv_WithdrawAvailabeBalance= findViewById(R.id.tv_WithdrawAvailabeBalance);



        tv_HeaderName.setText("WITHDRAW AMOUNT");
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                onBackPressed();
            }
        });

    }

    private void callLoadAccountData(boolean isShowLoader) {
        try {
            apiRequestManager.callAPI(WITHDRAWAMOUNTUSERDATA,
                    createRequestJson(), context, activity, Constants.WITHDRAWAMOUNTUSERDATATYPE,
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




    private void callSubmitWithdrawlRequest(boolean isShowLoader) {
        try {

            apiRequestManager.callAPI(WITHDRAWLREQUEST,
                    createWithdrawlRequestJson(), context, activity, Constants.SUBMITWITHDRAWLREQUESTTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createWithdrawlRequestJson() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("user_id", sessionManager.getUser(context).getUser_id());
            jsonObject.put("amount", Amount);
            jsonObject.put("user_name", Name);
            jsonObject.put("user_mobile", Number);
            jsonObject.put("acc_no", AccountNumber);
            jsonObject.put("bank_name", BankName);
            jsonObject.put("Ifsc_code", IFSCCode);
            jsonObject.put("branch_address", BranchAddress);
            jsonObject.put("pan_number", PanCardNumber);
            jsonObject.put("aadhar", AdhaarCardNumber);

        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }




    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {

        if (type.equals(Constants.SUBMITWITHDRAWLREQUESTTYPE)){

            ShowToast(context,message+"");
            onBackPressed();
            finish();

        }
        else {
            try {
                Name = result.getString("user_acc_name");
                Number = result.getString("user_mobile");
                AccountNumber = result.getString("acc_no");
                BankName = result.getString("bank_name");
                IFSCCode = result.getString("ifsc_code");
                BranchAddress = result.getString("branch_address");
                PanCardNumber = result.getString("pan_number");
                AdhaarCardNumber = result.getString("aadhar");

                et_WithdrawName.setText(Name);
                et_WithdrawMobile.setText(Number);
                et_WithdrawAccountNumber.setText(AccountNumber);
                et_WithdrawBankName.setText(BankName);
                et_WithdrawIFSCCode.setText(IFSCCode);
                et_WithdrawBranchAddress.setText(BranchAddress);
                et_WithdrawPAN.setText(PanCardNumber);
                et_WithdrawAdhaar.setText(AdhaarCardNumber);


            } catch (Exception e) {
                e.printStackTrace();
            }
        }
    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    public void ConfirmationDialog(String Amount) {
    AlertDialog.Builder ab = new AlertDialog.Builder(activity);
    ab.setMessage("Confirm your withdrawl request of ₹"+Amount+" ?");
    ab.setPositiveButton("Confirm", new DialogInterface.OnClickListener() {
        public void onClick(DialogInterface dialog, int id) {
            callSubmitWithdrawlRequest(true);
        }
    });

    ab.setNegativeButton("Cancel", new DialogInterface.OnClickListener() {
        public void onClick(DialogInterface dialog, int id) {
            dialog.cancel();
        }
    });
    AlertDialog alert = ab.create();
    alert.show();

}
    @Override
    public void onError(Context mContext, String type, String message) {
        ShowToast(context,message);

    }

}
