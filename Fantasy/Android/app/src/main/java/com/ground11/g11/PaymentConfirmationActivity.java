package com.indian11.app;

import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.indian11.app.APICallingPackage.Class.APIRequestManager;
import com.indian11.app.APICallingPackage.Interface.ResponseManager;
import com.indian11.app.CreateContest.InviteInContestActivity;

import org.json.JSONException;
import org.json.JSONObject;

import com.indian11.app.APICallingPackage.Class.Validations;

import static com.indian11.app.Config.JOINCONTEST;
import static com.indian11.app.Config.MYACCOUNT;

public class PaymentConfirmationActivity extends AppCompatActivity implements ResponseManager {

    TextView tv_ConfirmationJoinContest,tv_ConfirmationToPay,tv_ConfirmationEntryFee,
            tv_WalletBalance,tv_ConfirmationBonus;
    PaymentConfirmationActivity activity;
    Context context;
    ResponseManager responseManager;
    APIRequestManager apiRequestManager;
    ImageView im_back;
    TextView tv_HeaderName;
    SessionManager sessionManager;
    String JoinMyTeamId;
    String MyContestCode;

    double TotalAmount,Deposited,Winnings,Bonus;
    double FinaltoPayAmount,EntryFee;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_payment_confirmation);
        context = activity = this;
        initViews();
        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);
        sessionManager = new SessionManager();
    /*    final String Entryfees=getIntent().getStringExtra("EntryFee");
         EntryFee = Double.valueOf(getIntent().getStringExtra("EntryFee"));
        JoinMyTeamId = getIntent().getStringExtra("MyTeamId");
        MyContestCode= getIntent().getStringExtra("MyContestCode");*/

        final String Entryfees=JoinContestActivity.EntryFee;
        EntryFee = Double.valueOf(JoinContestActivity.EntryFee);
        JoinMyTeamId = ContestListActivity.JoinMyTeamId;
        MyContestCode= JoinContestActivity.MyContestCode;

        tv_ConfirmationEntryFee.setText("₹ "+EntryFee);
        tv_ConfirmationToPay.setText("₹ "+EntryFee);

        tv_ConfirmationJoinContest.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (TotalAmount>=FinaltoPayAmount) {
                    callJoinContest(true);
                }
                else {
                    AlertDialog.Builder ab = new AlertDialog.Builder(activity);
                    ab.setMessage("Not enough balance in your account to join contest.");

                    ab.setPositiveButton("Add Amount", new DialogInterface.OnClickListener() {
                        public void onClick(DialogInterface dialog, int id) {
                            Intent i = new Intent(activity,AddCashActivity.class);
                            i.putExtra("Activity","PaymentConfirmationActivity");
                            i.putExtra("EntryFee",Entryfees);
                            startActivity(i);
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
            }
        });

        callMyAccountDetails(true);
    }

    public void initViews(){

        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);
        tv_ConfirmationJoinContest = findViewById(R.id.tv_ConfirmationJoinContest);
        tv_ConfirmationToPay = findViewById(R.id.tv_ConfirmationToPay);
        tv_ConfirmationEntryFee = findViewById(R.id.tv_ConfirmationEntryFee);
        tv_WalletBalance = findViewById(R.id.tv_WalletBalance);
        tv_ConfirmationBonus = findViewById(R.id.tv_ConfirmationBonus);
        tv_HeaderName.setText("CONFIRMATION");
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                onBackPressed();
            }
        });

    }
    private void callMyAccountDetails(boolean isShowLoader) {
        try {
            apiRequestManager.callAPI(MYACCOUNT,
                    createRequestJsonWin(), context, activity, Constants.MYACCOUNTTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }

    }

    JSONObject createRequestJsonWin() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("user_id", HomeActivity.sessionManager.getUser(context).getUser_id());

        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }

    private void callJoinContest(boolean isShowLoader) {
        try {
            apiRequestManager.callAPI(JOINCONTEST,
                    createRequestJsonJoin(), context, activity, Constants.JOINCONTESTTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJsonJoin() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("user_id", sessionManager.getUser(context).getUser_id());
            jsonObject.put("match_id", ContestListActivity.IntentMatchId);
            jsonObject.put("my_team_id",ContestListActivity.JoinMyTeamId );
            jsonObject.put("contest_id", ContestListActivity.ContestId);
            jsonObject.put("contest_amount", FinaltoPayAmount+"");
            //if contest is private then value is 1 else 0
            if (JoinContestActivity.MyContestCode.equals("")) {
                jsonObject.put("private", "0");
            }
            else {
                jsonObject.put("private", "1");
            }


        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }

    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {
        if (type.equals(Constants.JOINCONTESTTYPE)) {
            if (JoinContestActivity.MyContestCode.equals("")) {
                //ShowToast(context, message);
               LayoutInflater li = getLayoutInflater();
                //Getting the View object as defined in the customtoast.xml file
                View layout = li.inflate(R.layout.custom_toast,(ViewGroup) findViewById(R.id.custom_toast_layout));
                 TextView textView= (TextView)  layout.findViewById(R.id.custom_toast_message);
                //Creating the Toast object
                textView.setText(message);
                Toast toast = new Toast(getApplicationContext());
                toast.setDuration(Toast.LENGTH_SHORT);
                toast.setView(layout);//setting the view of custom toast layout
                toast.show();
                Intent i = new Intent(activity, HomeActivity.class);
                startActivity(i);
                finish();
            }else {
                Validations.ShowToast(context, message);
                Intent i = new Intent(activity, InviteInContestActivity.class);
                i.putExtra("ContestCode",JoinContestActivity.MyContestCode);
                startActivity(i);
                finish();
            }


        }
        else {
            try {
                TotalAmount = Double.parseDouble((result.getString("total_amount")));
                Deposited = Double.valueOf(result.getString("credit_amount"));
                Winnings = Double.valueOf(result.getString("winning_amount"));
                Bonus = Double.valueOf(result.getString("bonous_amount"));
                tv_WalletBalance.setText("Unutilized Balance + Winnings = ₹"+TotalAmount);
                double After10PercentBonus = EntryFee*10/100;
                if (Bonus>=After10PercentBonus){
                    tv_ConfirmationBonus.setText("- ₹ "+After10PercentBonus);
                    FinaltoPayAmount = EntryFee-After10PercentBonus;
                    tv_ConfirmationToPay.setText("₹ "+FinaltoPayAmount);
                }
                else {
                    tv_ConfirmationBonus.setText("- ₹ "+0.0);
                    FinaltoPayAmount = EntryFee;
                    tv_ConfirmationToPay.setText("₹ "+FinaltoPayAmount);
                }
            } catch (JSONException e) {
                e.printStackTrace();
            }
        }
    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    @Override
    public void onError(Context mContext, String type, String message) {
        Validations.ShowToast(context,message);
    }
}
