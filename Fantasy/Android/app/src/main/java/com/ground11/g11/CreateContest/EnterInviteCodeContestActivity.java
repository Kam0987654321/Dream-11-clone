package com.indian11.app.CreateContest;

import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.os.Handler;
import android.support.design.widget.BottomSheetDialog;
import android.support.v7.app.AppCompatActivity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.Window;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.ProgressBar;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.indian11.app.APICallingPackage.Class.APIRequestManager;
import com.indian11.app.APICallingPackage.Interface.ResponseManager;
import com.indian11.app.Bean.BeanWiningInfoList;
import com.indian11.app.ContestListActivity;
import com.indian11.app.JoinContestActivity;
import com.indian11.app.R;
import com.indian11.app.SessionManager;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.List;

import static com.indian11.app.APICallingPackage.Class.Validations.ShowToast;
import static com.indian11.app.Config.CREATEOWNCONTESTLIST;
import static com.indian11.app.Config.WINNINGINFOLIST;
import static com.indian11.app.Constants.CREATEOWNCONTESTLISTTYPE;
import static com.indian11.app.Constants.WINNINGINFOLISTTYPE;

public class EnterInviteCodeContestActivity extends AppCompatActivity implements ResponseManager {

    EditText et_InviteCodeforContest;
    TextView tv_JoinThisContest;

    ResponseManager responseManager;
    APIRequestManager apiRequestManager;
    SessionManager sessionManager;
    EnterInviteCodeContestActivity activity;
    Context context;

    ImageView im_back;
    TextView tv_HeaderName;
    String Code;

    RelativeLayout RL_ContestList;
    TextView tv_TotalPrice,tv_WinnersCount,tv_EntryFees;
    ProgressBar PB_EntryProgress;
    TextView tv_TeamLeftCount,tv_TotalTeamCount,tv_JoinContest;

   String EntryFees,MyContestCode,  userWinners;
    List<BeanWiningInfoList> beanWinningLists;
    BottomSheetDialog dialog;

    String MatchId;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_enter_invite_code_contest);
        tv_JoinThisContest = findViewById(R.id.tv_JoinThisContest);
        et_InviteCodeforContest = findViewById(R.id.et_InviteCodeforContest);

        RL_ContestList = findViewById(R.id.RL_ContestList);
        tv_TotalPrice = findViewById(R.id.tv_TotalPrice);
        tv_WinnersCount = findViewById(R.id.tv_WinnersCount);
        tv_EntryFees = findViewById(R.id.tv_EntryFees);
        PB_EntryProgress = findViewById(R.id.PB_EntryProgress);
        tv_TeamLeftCount = findViewById(R.id.tv_TeamLeftCount);
        tv_TotalTeamCount = findViewById(R.id.tv_TotalTeamCount);
        tv_JoinContest = findViewById(R.id.tv_JoinContest);


        context = activity = this;
        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);
        sessionManager = new SessionManager();

        MatchId = getIntent().getStringExtra("MatchId");

        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);
        tv_HeaderName.setText("Join Contest");
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                onBackPressed();
            }
        });

        tv_JoinThisContest.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Code = et_InviteCodeforContest.getText().toString().trim();
                if (Code.equals("")){
                    ShowToast(context,"Enter Contest Invite Code");
                }
                else {
                    callLoadContest(true);
                }
            }
        });

        tv_JoinContest.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                ContestListActivity.MyTeamEditorSave = "Save";

                tv_JoinContest.setTextColor(Color.WHITE);
                tv_JoinContest.setBackgroundResource(R.drawable.joinbutton_hover);
                final Handler handler = new Handler();
                handler.postDelayed(new Runnable() {
                    @Override
                    public void run() {
                        tv_JoinContest.setTextColor(Color.parseColor("#1890b2"));
                        tv_JoinContest.setBackgroundResource(R.drawable.joinbutton_back);
                    }
                }, 400);

                Intent i = new Intent(activity,JoinContestActivity.class);
                i.putExtra("EntryFee",EntryFees);
                i.putExtra("ContestCode",MyContestCode);
                startActivity(i);
            }
        });

        tv_WinnersCount.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                callWinningInfoList(true);
            }
        });

    }


    private void callWinningInfoList(boolean isShowLoader) {
        try {

            apiRequestManager.callAPI(WINNINGINFOLIST,
                    createRequestJsonWin(), context, activity, WINNINGINFOLISTTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJsonWin() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("contest_id",ContestListActivity.ContestId);


        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }

    private void callLoadContest(boolean isShowLoader) {
        try {
            apiRequestManager.callAPI(CREATEOWNCONTESTLIST,
                    createRequestJson2(), context, activity, CREATEOWNCONTESTLISTTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJson2() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("unique_code", Code);
            jsonObject.put("userMatchid", MatchId);
            jsonObject.put("user_id", sessionManager.getUser(context).getUser_id());


        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }


    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {

        if (type.equals(WINNINGINFOLISTTYPE)){
            try {
                JSONArray jsonArray = result.getJSONArray("data");

                beanWinningLists = new Gson().fromJson(jsonArray.toString(),
                        new TypeToken<List<BeanWiningInfoList>>() {
                        }.getType());

                dialog = new BottomSheetDialog(activity);
                dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);
                dialog.setContentView(R.layout.dialog_winning_breakups);
                final TextView tv_DClose = dialog.findViewById(R.id.tv_DClose);
                final TextView tv_DTotalWinning =dialog.findViewById(R.id.tv_DTotalWinning);
                final TextView tv_DBottomNote =dialog.findViewById(R.id.tv_DBottomNote);
                final LinearLayout LL_WinningBreackupList=dialog.findViewById(R.id.LL_WinningBreackupList);
                dialog.show();
                tv_DTotalWinning.setText("₹ "+userWinners);
                tv_DBottomNote.setVisibility(View.GONE);
                tv_DClose.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View view) {
                        dialog.cancel();
                    }
                });
                for (int i = 0; i <beanWinningLists .size(); i++) {

                    View to_add = LayoutInflater.from(context).inflate(R.layout.item_winning_breakup,
                            LL_WinningBreackupList,false);
                    TextView tv_Rank = to_add.findViewById(R.id.tv_Rank);
                    TextView tv_Price = to_add.findViewById(R.id.tv_Price);

                    tv_Rank.setText("Rank: "+beanWinningLists.get(i).getRank());
                    tv_Price.setText("₹ "+beanWinningLists.get(i).getPrice());

                    LL_WinningBreackupList.addView(to_add);
                }


            }
            catch (Exception e){
                e.printStackTrace();
            }




        }else{
        try {
            RL_ContestList.setVisibility(View.VISIBLE);
            ContestListActivity.ContestId = result.getString("user_Contestid");
            String userContestName = result.getString("userContestName");
             userWinners = result.getString("userWinners");
            String userTotalteam = result.getString("userTotalteam");
            String userJoinTeam = result.getString("userJoinTeam");
            EntryFees = result.getString("userEntry");
            String userMatchid = result.getString("userMatchid");
            MyContestCode = result.getString("unique_code");
            String Totalwinners = result.getString("userTotalWinners");


            tv_TotalPrice.setText("₹ " + userWinners);
            tv_WinnersCount.setText(Totalwinners);
            tv_EntryFees.setText("₹ " + EntryFees);

            tv_TeamLeftCount.setText(userJoinTeam + " Spots Left");
            tv_TotalTeamCount.setText(userTotalteam + " Teams");
            PB_EntryProgress.setMax(Integer.parseInt(userTotalteam));
            PB_EntryProgress.setProgress(Integer.parseInt(userTotalteam) - Integer.parseInt(userJoinTeam));

        } catch (Exception e) {
            e.printStackTrace();
        }

    }

    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    @Override
    public void onError(Context mContext, String type, String message) {
        ShowToast(context,message);
        RL_ContestList.setVisibility(View.GONE);

    }
}
