package com.indian11.app.CreateContest;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.view.WindowManager;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.indian11.app.APICallingPackage.Class.APIRequestManager;
import com.indian11.app.APICallingPackage.Interface.ResponseManager;
import com.indian11.app.R;

import org.json.JSONObject;

import static com.indian11.app.APICallingPackage.Class.Validations.ShowToast;

public class CreateContestActivity extends AppCompatActivity implements ResponseManager {

    ImageView im_back;
    TextView tv_HeaderName;

    CreateContestActivity activity;
    Context context;

    ResponseManager responseManager;
    APIRequestManager apiRequestManager;

    EditText et_ContestName,et_WinningAmount, et_ContestSize;
    TextView tv_EntryFees;
    String ContestName;
    int WinningAmount,ContestSize;
    double EntryFees;
    String StringWinningAmount,StringContestSize;
    RelativeLayout RL_BottomCreateMyContest,RL_2;
    TextView tv_CalculateEntryFees;
    String MatchId;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_create_contest);
        this.getWindow().setSoftInputMode(WindowManager.LayoutParams.SOFT_INPUT_STATE_ALWAYS_HIDDEN);
        context = activity = this;
        initViews();
        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);
        MatchId = getIntent().getStringExtra("MatchId");

        RL_2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                ContestName = et_ContestName.getText().toString();
                StringWinningAmount = et_WinningAmount.getText().toString();
                StringContestSize = et_ContestSize.getText().toString();

                if (StringWinningAmount.equals("")){

                    ShowToast(context,"Enter Winning Amount");

                }else if (StringContestSize.equals("")){

                    ShowToast(context,"Enter Contest Size");

                }else {
                    WinningAmount = Integer.parseInt(StringWinningAmount);
                    ContestSize = Integer.parseInt(StringContestSize);

                    if (WinningAmount==0||WinningAmount>10000){
                        ShowToast(context,"Winning Amount Should be between 0 to 10,000");
                    }else if (ContestSize<2||ContestSize>100){
                        ShowToast(context,"Contest Size Must be between 2 to 100");
                    }
                    else {
                        double amount = WinningAmount;
                        double TwentyPercentAmount = (amount / 100.0f) * 20;
                        double FinalAmount = amount+TwentyPercentAmount;
                        EntryFees = FinalAmount/ContestSize;
                        tv_EntryFees.setText("Entry Fees - "+EntryFees);
                        if (EntryFees<5){
                            ShowToast(context,"Entry Fees cannot be less than 5 Rs.");

                        }
                    }


                }

            }
        });
        RL_BottomCreateMyContest.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                ContestName = et_ContestName.getText().toString();
                StringWinningAmount = et_WinningAmount.getText().toString();
                StringContestSize = et_ContestSize.getText().toString();

                if (StringWinningAmount.equals("")){

                    ShowToast(context,"Enter Winning Amount");

                }else if (StringContestSize.equals("")){

                    ShowToast(context,"Enter Contest Size");

                }else {
                    WinningAmount = Integer.parseInt(StringWinningAmount);
                    ContestSize = Integer.parseInt(StringContestSize);

                    if (WinningAmount==0||WinningAmount>10000){
                        ShowToast(context,"Winning Amount Should be between 0 to 10,000");
                    }else if (ContestSize<2||ContestSize>100){
                        ShowToast(context,"Contest Size Must be between 2 to 100");
                    }
                    else {
                        double amount = WinningAmount;
                        double TwentyPercentAmount = (amount / 100.0f) * 20;
                        double FinalAmount = amount+TwentyPercentAmount;
                        EntryFees = FinalAmount/ContestSize;
                        tv_EntryFees.setText("Entry Fees - "+EntryFees);
                        if (EntryFees<5){
                            ShowToast(context,"Entry Fees cannot be less than 5 Rs.");
                        }
                        else {
                            Intent i = new Intent(activity,SelectPrizeCreateActivity.class);
                            i.putExtra("ContestName",ContestName);
                            i.putExtra("ContestSize",ContestSize);
                            i.putExtra("ContestWinningAmount",WinningAmount);
                            i.putExtra("EntryFees",EntryFees);
                            i.putExtra("MatchId",MatchId);
                            startActivity(i);

                        }
                    }


                }

            }
        });


    }
    public void initViews(){

        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);

        tv_HeaderName.setText("Make Your Own Contest");
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                onBackPressed();
            }
        });

        et_ContestName = findViewById(R.id.et_ContestName);
        et_WinningAmount = findViewById(R.id.et_WinningAmount);
        et_ContestSize = findViewById(R.id.et_ContestSize);
        tv_EntryFees = findViewById(R.id.tv_EntryFees);
        RL_BottomCreateMyContest = findViewById(R.id.RL_BottomCreateMyContest);
        tv_CalculateEntryFees = findViewById(R.id.tv_CalculateEntryFees);
        RL_2 = findViewById(R.id.RL_2);




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
