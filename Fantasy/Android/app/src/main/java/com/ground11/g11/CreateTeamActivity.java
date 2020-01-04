package com.ground11.g11;

import android.annotation.SuppressLint;
import android.content.ContentValues;
import android.content.Context;
import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.graphics.Color;
import android.os.Bundle;
import android.os.Parcelable;
import android.support.design.widget.BottomSheetDialog;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.Window;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;
import com.ground11.g11.APICallingPackage.Class.APIRequestManager;
import com.ground11.g11.APICallingPackage.Class.Validations;
import com.ground11.g11.APICallingPackage.Interface.ResponseManager;
import com.ground11.g11.Bean.BeanDBTeam;
import com.ground11.g11.Bean.BeanPlayerList;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.List;

import de.hdodenhof.circleimageview.CircleImageView;

import static com.ground11.g11.APICallingPackage.Class.Validations.ShowToast;
import static com.ground11.g11.Config.PLAYERINFO;
import static com.ground11.g11.Config.PLAYERLIST;

public class CreateTeamActivity extends AppCompatActivity implements ResponseManager {

    CreateTeamActivity activity;
    Context context;
    RecyclerView Rv_PlayerList;
    AdapterPlayerList adapterPlayerList;

    ResponseManager responseManager;
    APIRequestManager apiRequestManager;
   int playpostion;
    String ContestId;
    List<BeanPlayerList> beanPlayerLists;
    String prize_pool, contest_description;


    ImageView im_back;
    TextView tv_HeaderName, tv_CreateTeamTimer, tv_CreateTeamsName,
            tv_WKCount, tv_BATCount, tv_ARCount, tv_BOWLCount, tv_TeamPreview,tv_TeamOneSize,tv_TeamTwoSize
            ,tv_TeamTwoName,tv_TeamOneName;
    CircleImageView im_WKIcon, im_BATIcon, im_ARIcon, im_BOWLIcon;

    String DesignationId = "WK";

    private Parcelable recyclerViewState;
    ArrayList<BeanPlayerList> WKList = new ArrayList<>();
    ArrayList<BeanPlayerList> BATList = new ArrayList<>();
    ArrayList<BeanPlayerList> ARList = new ArrayList<>();
    ArrayList<BeanPlayerList> BOWLList = new ArrayList<>();
    SQLiteDatabase db;


    int WkCount = 0, BatCount = 0, ArCount = 0, BowlCount = 0;
    int TotalCount = 0, TeamOneCount = 0, TeamTwoCount = 0;
    String PlayerTeam;
    BottomSheetDialog dialogPlayerInfo, dialogGroundView;


    TextView tv_TotalSelectedPlayer, tv_TotalCredit, tv_TeamNext;
    int SelectedCredit;
    Double TotalCredit = 100d, PlayerCredit;
    String InfoPlayerId,InfoPlayerImage;


    TextView tv_WK,tv_BAT,tv_AR,tv_BOWL,alertMsg;
    SessionManager sessionManager;
   String ActivityValue;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_create_team);

        context = activity = this;
        initViews();
        sessionManager = new SessionManager();

        ActivityValue = getIntent().getStringExtra("Activity");
        tv_CreateTeamsName.setText(ContestListActivity.IntenTeamsName);
        tv_CreateTeamTimer.setText(ContestListActivity.IntentTime);
        tv_TeamOneName.setText(ContestListActivity.IntentTeamOneName);
        tv_TeamTwoName.setText(ContestListActivity.IntentTeamTwoName);


        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);


        Rv_PlayerList.setHasFixedSize(true);
        Rv_PlayerList.setNestedScrollingEnabled(false);
        RecyclerView.LayoutManager mLayoutManager = new LinearLayoutManager(activity);
        Rv_PlayerList.setLayoutManager(mLayoutManager);
        //Rv_PlayerList.setItemAnimator(new DefaultItemAnimator());
        Rv_PlayerList.setItemAnimator(null);
        Validations.showProgress(context);
        callPlayerList(true);


       /* Rv_PlayerList.setOnTouchListener(new View.OnTouchListener() {
            @Override
            public boolean onTouch(View v, MotionEvent event) {
                //Rv_PlayerList.setLayoutFrozen(false);
                return false;
            }
        });*/



        Validations.CountDownTimer(ContestListActivity.IntentTime,tv_CreateTeamTimer);


        im_WKIcon.setImageResource(R.drawable.wk_hvr);
        im_BATIcon.setImageResource(R.drawable.bats_hvr);
        im_ARIcon.setImageResource(R.drawable.all_round_hvr);
        im_BOWLIcon.setImageResource(R.drawable.bowler_hvr);
        tv_WK.setTextColor(Color.parseColor("#1c2e46"));
        tv_BAT.setTextColor(Color.parseColor("#8e8e8e"));
        tv_AR.setTextColor(Color.parseColor("#8e8e8e"));
        tv_BOWL.setTextColor(Color.parseColor("#8e8e8e"));
        alertMsg.setVisibility(View.VISIBLE);
        alertMsg.setText("Wicket Keeper Should be 1");


        im_WKIcon.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                DesignationId = "WK";
                GetTeamData("WK", "");
                //  callPlayerList(false);
                im_WKIcon.setImageResource(R.drawable.wk_hvr);
                im_BATIcon.setImageResource(R.drawable.bats_hvr);
                im_ARIcon.setImageResource(R.drawable.all_round_hvr);
                im_BOWLIcon.setImageResource(R.drawable.bowler_hvr);
                tv_WK.setTextColor(Color.parseColor("#1c2e46"));
                tv_BAT.setTextColor(Color.parseColor("#8e8e8e"));
                tv_AR.setTextColor(Color.parseColor("#8e8e8e"));
                tv_BOWL.setTextColor(Color.parseColor("#8e8e8e"));
                alertMsg.setVisibility(View.VISIBLE);
                alertMsg.setText("Wicket Keeper Should be 1");
            }
        });

        im_BATIcon.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                DesignationId = "BAT";
                GetTeamData("BAT", "");

                // callPlayerList(false);
                im_WKIcon.setImageResource(R.drawable.wk_hvr);
                im_BATIcon.setImageResource(R.drawable.bats_hvr);
                im_ARIcon.setImageResource(R.drawable.all_round_hvr);
                im_BOWLIcon.setImageResource(R.drawable.bowler_hvr);
                tv_WK.setTextColor(Color.parseColor("#8e8e8e"));
                tv_BAT.setTextColor(Color.parseColor("#1c2e46"));
                tv_AR.setTextColor(Color.parseColor("#8e8e8e"));
                tv_BOWL.setTextColor(Color.parseColor("#8e8e8e"));
                alertMsg.setVisibility(View.VISIBLE);
                alertMsg.setText("Batsman Should be 3-5");
            }
        });

        im_ARIcon.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                DesignationId = "AR";
                GetTeamData("AR", "");
                // callPlayerList(false);
                im_WKIcon.setImageResource(R.drawable.wk_hvr);
                im_BATIcon.setImageResource(R.drawable.bats_hvr);
                im_ARIcon.setImageResource(R.drawable.all_round_hvr);
                im_BOWLIcon.setImageResource(R.drawable.bowler_hvr);
                tv_WK.setTextColor(Color.parseColor("#8e8e8e"));
                tv_BAT.setTextColor(Color.parseColor("#8e8e8e"));
                tv_AR.setTextColor(Color.parseColor("#1c2e46"));
                tv_BOWL.setTextColor(Color.parseColor("#8e8e8e"));
                alertMsg.setVisibility(View.VISIBLE);
                alertMsg.setText("All Rounder Should be 1-3");
            }
        });

        im_BOWLIcon.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                DesignationId = "BOWL";
                GetTeamData("BOWL", "");
                //  callPlayerList(false);
                im_WKIcon.setImageResource(R.drawable.wk_hvr);
                im_BATIcon.setImageResource(R.drawable.bats_hvr);
                im_ARIcon.setImageResource(R.drawable.all_round_hvr);
                im_BOWLIcon.setImageResource(R.drawable.bowler_hvr);
                tv_WK.setTextColor(Color.parseColor("#8e8e8e"));
                tv_BAT.setTextColor(Color.parseColor("#8e8e8e"));
                tv_AR.setTextColor(Color.parseColor("#8e8e8e"));
                tv_BOWL.setTextColor(Color.parseColor("#1c2e46"));
                alertMsg.setVisibility(View.VISIBLE);
                alertMsg.setText("Bowler Should be 3-5");
            }
        });


        tv_TeamPreview.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {


                dialogGroundView = new BottomSheetDialog(activity);
                dialogGroundView.requestWindowFeature(Window.FEATURE_NO_TITLE);
                dialogGroundView.setContentView(R.layout.dialog_ground_view);

                final LinearLayout LL_GroundWK = dialogGroundView.findViewById(R.id.LL_GroundWK);
                final LinearLayout LL_GroundBAT = dialogGroundView.findViewById(R.id.LL_GroundBAT);
                final LinearLayout LL_GroundAR = dialogGroundView.findViewById(R.id.LL_GroundAR);
                final LinearLayout LL_GroundBOWL = dialogGroundView.findViewById(R.id.LL_GroundBOWL);
                ImageView im_CloseIcon = dialogGroundView.findViewById(R.id.im_CloseIcon);
                dialogGroundView.show();
                im_CloseIcon.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View view) {
                        dialogGroundView.dismiss();
                    }
                });
                
                try {
                    String qry = "select * from TeamListTable"; // where Role="+RoleDes;
                    Cursor cur = db.rawQuery(qry, null);
                    ArrayList<BeanDBTeam> arr_bea = new ArrayList<>();
                    if (cur == null) {
                        ShowToast(context, "No Data Found");
                    } else

                        while (cur.moveToNext()) {
                            String IsSelected = cur.getString(cur.getColumnIndex("IsSelected"));
                            String Role = cur.getString(cur.getColumnIndex("Role"));
                            String PlayerData = cur.getString(cur.getColumnIndex("PlayerData"));
                            JSONObject job = new JSONObject(PlayerData);

                            String PlayerName = job.getString("name");
                            String PlayerImage = job.getString("image");
                            String PlayerPoints = job.getString("player_points");
                            String PlayerCredit = job.getString("credit_points");
                            String TeamShortName = job.getString("team_short_name");
                            String team_number = job.getString("team_number");
                            String player_shortname = job.getString("player_shortname");


                            if (IsSelected.equals("1")) {
                                if (Role.equals("WK")) {

                                    View to_add = LayoutInflater.from(context).inflate(R.layout.item_ground_player,
                                            LL_GroundWK, false);
                                    ImageView im_GroundPlayerImage = to_add.findViewById(R.id.im_GroundPlayerImage);
                                    TextView tv_GroundPlayerName = to_add.findViewById(R.id.tv_GroundPlayerName);
                                    TextView tv_GroundPlayerCredit = to_add.findViewById(R.id.tv_GroundPlayerCredit);

                                    Glide.with(activity).load(Config.PLAYERIMAGE + PlayerImage)
                                            .crossFade()
                                            .diskCacheStrategy(DiskCacheStrategy.ALL)
                                            .into(im_GroundPlayerImage);
                                    tv_GroundPlayerName.setText(player_shortname);
                                    tv_GroundPlayerCredit.setText(PlayerCredit+" Cr");


                                    LL_GroundWK.addView(to_add);
                                } else if (Role.equals("BAT")) {
                                    View to_add = LayoutInflater.from(context).inflate(R.layout.item_ground_player,
                                            LL_GroundBAT, false);
                                    ImageView im_GroundPlayerImage = to_add.findViewById(R.id.im_GroundPlayerImage);
                                    TextView tv_GroundPlayerName = to_add.findViewById(R.id.tv_GroundPlayerName);
                                    TextView tv_GroundPlayerCredit = to_add.findViewById(R.id.tv_GroundPlayerCredit);
                                    Glide.with(activity).load(Config.PLAYERIMAGE + PlayerImage)
                                            .crossFade()
                                            .diskCacheStrategy(DiskCacheStrategy.ALL)
                                            .into(im_GroundPlayerImage);
                                    tv_GroundPlayerName.setText(player_shortname);
                                    tv_GroundPlayerCredit.setText(PlayerCredit+" Cr");
                                    LL_GroundBAT.addView(to_add);
                                } else if (Role.equals("AR")) {
                                    View to_add = LayoutInflater.from(context).inflate(R.layout.item_ground_player,
                                            LL_GroundAR, false);
                                    ImageView im_GroundPlayerImage = to_add.findViewById(R.id.im_GroundPlayerImage);
                                    TextView tv_GroundPlayerName = to_add.findViewById(R.id.tv_GroundPlayerName);
                                    TextView tv_GroundPlayerCredit = to_add.findViewById(R.id.tv_GroundPlayerCredit);
                                    Glide.with(activity).load(Config.PLAYERIMAGE + PlayerImage)
                                            .crossFade()
                                            .diskCacheStrategy(DiskCacheStrategy.ALL)
                                            .into(im_GroundPlayerImage);
                                    tv_GroundPlayerName.setText(player_shortname);
                                    tv_GroundPlayerCredit.setText(PlayerCredit+" Cr");
                                    LL_GroundAR.addView(to_add);
                                } else if (Role.equals("BOWL")) {
                                    View to_add = LayoutInflater.from(context).inflate(R.layout.item_ground_player,
                                            LL_GroundBOWL, false);
                                    ImageView im_GroundPlayerImage = to_add.findViewById(R.id.im_GroundPlayerImage);
                                    TextView tv_GroundPlayerName = to_add.findViewById(R.id.tv_GroundPlayerName);
                                    TextView tv_GroundPlayerCredit = to_add.findViewById(R.id.tv_GroundPlayerCredit);
                                    Glide.with(activity).load(Config.PLAYERIMAGE + PlayerImage)
                                            .crossFade()
                                            .diskCacheStrategy(DiskCacheStrategy.ALL)
                                            .into(im_GroundPlayerImage);
                                    tv_GroundPlayerName.setText(player_shortname);
                                    tv_GroundPlayerCredit.setText(PlayerCredit+" Cr");
                                    LL_GroundBOWL.addView(to_add);
                                }


                            }
                        }
                    cur.close();

                } catch (Exception ex) {

                    ShowToast(context, "No Data Found.");
                }


            }
        });


        tv_TeamNext.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                if (TotalCount<11){
                    //Intent i = new Intent(activity, ChooseCandVCActivity.class);

                    //startActivity(i);
                    //ShowToast(context,"Please Select 11 Player");
                    alertMsg.setVisibility(View.VISIBLE);
                    alertMsg.setText("Please Select 11 Player");
                }
                else if (WkCount<1){
                    alertMsg.setVisibility(View.VISIBLE);
                    alertMsg.setText("Wicket Keeper Should be 1");
                    //ShowToast(context,"Wicket Keeper Should be 1");
                }
                else if (BatCount<3){
                    alertMsg.setVisibility(View.VISIBLE);
                    alertMsg.setText("Batsman Should be 3-5");
                    //ShowToast(context,"Batsman Should be 3-5");
                }
                else if (ArCount<1){
                    alertMsg.setVisibility(View.VISIBLE);
                    alertMsg.setText("All Rounder Should be 1-3");
                    //ShowToast(context,"All Rounder Should be 1-3");
                }
                else if (BowlCount<3){
                    alertMsg.setVisibility(View.VISIBLE);
                    alertMsg.setText("Bowler Should be 3-5");
                    //ShowToast(context,"Bowler Should be 3-5");

                }else if (TeamOneCount>7){
                    alertMsg.setVisibility(View.VISIBLE);
                    alertMsg.setText("You can only select 7 Player from one team");
                    //ShowToast(context,"You can only select 7 Player from one team");

                }else if (TeamTwoCount>7){
                    alertMsg.setVisibility(View.VISIBLE);
                    alertMsg.setText("You can only select 7 Player from one team");
                    //ShowToast(context,"You can only select 7 Player from one team");
                }
                else {
                    Intent i = new Intent(activity, ChooseCandVCActivity.class);
                    i.putExtra("Activity", ActivityValue);
                    startActivity(i);
                    //ShowToast(context,"Please Select 11 Player");
                }

            }
        });


    }

    @SuppressLint("WrongConstant")
    public void initViews() {
         alertMsg=findViewById(R.id.msg);
        im_WKIcon = findViewById(R.id.im_WKIcon);
        im_BATIcon = findViewById(R.id.im_BATIcon);
        im_ARIcon = findViewById(R.id.im_ARIcon);
        im_BOWLIcon = findViewById(R.id.im_BOWLIcon);

        tv_WKCount = findViewById(R.id.tv_WKCount);
        tv_BATCount = findViewById(R.id.tv_BATCount);
        tv_ARCount = findViewById(R.id.tv_ARCount);
        tv_BOWLCount = findViewById(R.id.tv_BOWLCount);


        tv_WK = findViewById(R.id.tv_WK);
        tv_BAT = findViewById(R.id.tv_BAT);
        tv_AR = findViewById(R.id.tv_AR);
        tv_BOWL = findViewById(R.id.tv_BOWL);



        tv_TeamPreview = findViewById(R.id.tv_TeamPreview);
        tv_TeamOneSize = findViewById(R.id.tv_TeamOneSize);
        tv_TeamTwoSize = findViewById(R.id.tv_TeamTwoSize);
        tv_TeamOneName = findViewById(R.id.tv_TeamOneName);
        tv_TeamTwoName = findViewById(R.id.tv_TeamTwoName);



        tv_TotalSelectedPlayer = findViewById(R.id.tv_TotalSelectedPlayer);
        tv_TotalCredit = findViewById(R.id.tv_TotalCredit);
        tv_TeamNext = findViewById(R.id.tv_TeamNext);


        Rv_PlayerList = findViewById(R.id.Rv_PlayerList);

        RecyclerView.LayoutManager mLayoutManager = new LinearLayoutManager(activity);
        //mLayoutManager.setStackFromEnd(true);
        tv_CreateTeamTimer = findViewById(R.id.tv_CreateTeamTimer);
        tv_CreateTeamsName = findViewById(R.id.tv_CreateTeamsName);

        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);

        tv_HeaderName.setText("CREATE YOUR TEAM");
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                onBackPressed();
            }
        });

        db = this.openOrCreateDatabase("TeamData.db", SQLiteDatabase.CREATE_IF_NECESSARY, null);


        try {
            String DropQryQueTable = "DROP TABLE IF EXISTS TeamListTable";
            db.execSQL(DropQryQueTable);

        } catch (Exception e) {
            e.printStackTrace();
        }

        String qr = "create table IF NOT EXISTS TeamListTable(PlayerId INTEGER PRIMARY KEY," +
                "MatchId TEXT,IsSelected TEXT,Role TEXT,PlayerData TEXT)";
        db.execSQL(qr);


    }


    private void callPlayerList(boolean isShowLoader) {
        try {

            apiRequestManager.callAPI(PLAYERLIST,
                    createRequestJson(), context, activity, Constants.PLAYERLISTTYPE,
                    isShowLoader, responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJson() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("matchid", ContestListActivity.IntentMatchId);
            jsonObject.put("designationid", "0");
            jsonObject.put("user_id", sessionManager.getUser(context).getUser_id());

            if (ContestListActivity.MyTeamEditorSave.equals("Clone")||ContestListActivity.MyTeamEditorSave.equals("Edit")){
                jsonObject.put("my_team", "0");
                jsonObject.put("my_team_id", ContestListActivity.JoinMyTeamId);
            }


        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }


    private void callPlayerInfo(boolean isShowLoader) {
        try {

            apiRequestManager.callAPI(PLAYERINFO,
                    createRequestJsonInfo(), context, activity, Constants.PLAYERINFOTYPE,
                    isShowLoader, responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJsonInfo() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("player_id", InfoPlayerId);

        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }


    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {


        if (type.equals(Constants.PLAYERINFOTYPE)) {

            try {
                String total_points = result.getString("total_points");
                String id = result.getString("id");
                String name = result.getString("name");
                String credit_points = result.getString("credit_points");
                String image = result.getString("image");
                String dob = result.getString("dob");
                String nationality = result.getString("nationality");
                String bats = result.getString("bats");
                String bowls = result.getString("bowls");


                dialogPlayerInfo = new BottomSheetDialog(activity);
                dialogPlayerInfo.requestWindowFeature(Window.FEATURE_NO_TITLE);
                dialogPlayerInfo.setContentView(R.layout.dialog_player_info);

                final TextView tv_InfoHeadName = dialogPlayerInfo.findViewById(R.id.tv_InfoHeadName);
                ImageView im_InfoPlayerImage = dialogPlayerInfo.findViewById(R.id.im_InfoPlayerImage);

                final TextView tv_InfoPlayerName = dialogPlayerInfo.findViewById(R.id.tv_InfoPlayerName);


                final TextView tv_DClose = dialogPlayerInfo.findViewById(R.id.tv_DClose);
                final TextView tv_InfoPoints = dialogPlayerInfo.findViewById(R.id.tv_InfoPoints);
                final TextView tv_InfoCredits = dialogPlayerInfo.findViewById(R.id.tv_InfoCredits);

                final TextView tv_Bats = dialogPlayerInfo.findViewById(R.id.tv_Bats);
                final TextView tv_Bowls = dialogPlayerInfo.findViewById(R.id.tv_Bowls);
                final TextView tv_Nationality = dialogPlayerInfo.findViewById(R.id.tv_Nationality);
                final TextView tv_PlayerDob = dialogPlayerInfo.findViewById(R.id.tv_PlayerDob);


                final LinearLayout LL_SeriesPerformanceList = dialogPlayerInfo.findViewById(R.id.LL_SeriesPerformanceList);

                dialogPlayerInfo.show();


                tv_DClose.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View view) {
                        dialogPlayerInfo.cancel();
                    }
                });

                tv_InfoHeadName.setText(name);
                tv_InfoPlayerName.setText(name);
                tv_Bats.setText(bats);
                tv_Bowls.setText(bowls);
                tv_Nationality.setText(nationality);
                tv_PlayerDob.setText(dob);
                tv_InfoCredits.setText(""+credit_points);
                tv_InfoPoints.setText(""+total_points);

                Glide.with(activity).load(InfoPlayerImage)
                        .crossFade()
                        .diskCacheStrategy(DiskCacheStrategy.ALL)
                        .into(im_InfoPlayerImage);


            } catch (Exception e) {

                e.printStackTrace();
            }
        } else {



            try {
                JSONArray jsonArray = result.getJSONArray("data");
                beanPlayerLists = new Gson().fromJson(jsonArray.toString(),
                        new TypeToken<List<BeanPlayerList>>() {
                        }.getType());
                for (int i = 0; i < jsonArray.length(); i++) {
                    JSONObject userData = jsonArray.getJSONObject(i);
                    ContentValues val = new ContentValues();
                    val.put("PlayerId", userData.getString("playerid"));
                    val.put("MatchId", ContestListActivity.IntentMatchId);
                    val.put("IsSelected", userData.getString("is_select"));
                    val.put("Role", userData.getString("short_term"));
                    val.put("PlayerData", userData.toString());
                    db.insert("TeamListTable", null, val);

                    if (userData.getString("is_select").equals("1")) {
                        TotalCount = TotalCount + 1;
                        SetTotalCount(TotalCount);
                    }
                        String role = userData.getString("short_term");

                    if (userData.getString("is_select").equals("1")) {
                        if (ContestListActivity.MyTeamEditorSave.equals("Clone")||ContestListActivity.MyTeamEditorSave.equals("Edit")) {
                            Double DCredit = Double.valueOf(userData.getString("credit_points"));
                            TotalCredit = TotalCredit-DCredit;
                            tv_TotalCredit.setText(TotalCredit+"/100");

                            if (userData.getString("team_number").equals("1")){
                                TeamOneCount = TeamOneCount+1;
                                tv_TeamOneSize.setText(""+TeamOneCount);
                            }
                            else {

                                TeamTwoCount = TeamTwoCount+1;
                                tv_TeamTwoSize.setText(""+TeamTwoCount);
                            }

                            if (role.equals("WK")) {
                                WkCount = WkCount + 1;
                                tv_WKCount.setText("" + WkCount+"/1");
                            } else if (role.equals("BAT")) {
                                BatCount = BatCount + 1;
                                tv_BATCount.setText("" + BatCount+"/5");
                            } else if (role.equals("AR")) {
                                ArCount = ArCount + 1;
                                tv_ARCount.setText("" + ArCount+"/3");
                            } else if (role.equals("BOWL")) {
                                BowlCount = BowlCount + 1;
                                tv_BOWLCount.setText("" + BowlCount+"/5");
                            }
                        }
                    }

                }
                Validations.hideProgress();

                GetTeamData("WK", "");


            } catch (Exception e) {
                e.printStackTrace();
            }
        }
    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    public void SetTotalCount(int totalCount) {

        tv_TotalSelectedPlayer.setText(totalCount + "/11");
    }


    public void GetTeamData(String RoleDes, String Notify) {
        Validations.showProgress(context);

        if (Notify.equals("1")) {
            Log.e("Notify","1");
            Rv_PlayerList.setLayoutFrozen(true);
            //adapterPlayerList.notifyItemRangeInserted();
        }

        try {
            String qry = "select * from TeamListTable"; // where Role="+RoleDes;
            Cursor cur = db.rawQuery(qry, null);
            ArrayList<BeanDBTeam> arr_bea = new ArrayList<>();
            if (cur == null) {
                ShowToast(context, "No Data Found");
            } else

                while (cur.moveToNext()) {

                    String PlayerId = cur.getString(cur.getColumnIndex("PlayerId"));
                    String MatchId = cur.getString(cur.getColumnIndex("MatchId"));
                    String IsSelected = cur.getString(cur.getColumnIndex("IsSelected"));
                    String Role = cur.getString(cur.getColumnIndex("Role"));
                    String PlayerData = cur.getString(cur.getColumnIndex("PlayerData"));

                    if (Role.equals(RoleDes)) {
                        BeanDBTeam ABean = new BeanDBTeam();
                        ABean.setPlayerId(PlayerId);
                        ABean.setMatchId(MatchId);
                        ABean.setIsSelected(IsSelected);
                        ABean.setRole(Role);
                        ABean.setPlayerData(PlayerData);

                        arr_bea.add(ABean);
                        Collections.sort(arr_bea,new MyComparator());

                        adapterPlayerList = new AdapterPlayerList(arr_bea, activity);
                        Rv_PlayerList.setAdapter(adapterPlayerList);

                        //recyclerViewState = Rv_PlayerList.getLayoutManager().onSaveInstanceState();

                        // Restore state
                        //Rv_PlayerList.getLayoutManager().onRestoreInstanceState(recyclerViewState);
                        Validations.hideProgress();
                    }

                }
            if (Notify.equals("1")) {
                //Log.e("Notify","1");
                ///Rv_PlayerList.setLayoutFrozen(true);
                //adapterPlayerList.notifyItemRangeInserted();
            } else {
                adapterPlayerList.notifyDataSetChanged();
                Log.e("Notify","0");
                Validations.hideProgress();
            }

            cur.close();

        } catch (Exception ex) {
            Validations.hideProgress();
            ShowToast(context, "No Data Found.");
        }
    }



    public void UpdateSelection(String RoleDes, String IsSelected, String PlayerId) {
        try {
            ContentValues val = new ContentValues();
            val.put("IsSelected", IsSelected);
            db.update("TeamListTable", val, "PlayerId=" + PlayerId, null);
        } catch (Exception ex) {
            ShowToast(context, "Not Updated");
        }

       //GetTeamData(RoleDes,"1");
    }


    @Override
    public void onError(Context mContext, String type, String message) {
        if (type.equals(Constants.PLAYERINFOTYPE)) {
            ShowToast(context, message);
        } else {
            Validations.hideProgress();
        }

    }


    public class AdapterPlayerList extends RecyclerView.Adapter<AdapterPlayerList.MyViewHolder> {
        private List<BeanDBTeam> mListenerList;
        Context mContext;


        public AdapterPlayerList(List<BeanDBTeam> mListenerList, Context context) {
            mContext = context;
            this.mListenerList = mListenerList;

        }

        public class MyViewHolder extends RecyclerView.ViewHolder {
            TextView tv_PlayerName, tv_PlayerTeamName, tv_PlayerPoints, tv_PlayerCredit,tv_TeamNumber;
            ImageView im_PlayerImage, im_AddPlayer;


            public MyViewHolder(View view) {
                super(view);

                tv_PlayerName = view.findViewById(R.id.tv_PlayerName);
                tv_PlayerTeamName = view.findViewById(R.id.tv_PlayerTeamName);
                tv_PlayerPoints = view.findViewById(R.id.tv_PlayerPoints);
                tv_PlayerCredit = view.findViewById(R.id.tv_PlayerCredit);
                im_PlayerImage = view.findViewById(R.id.im_PlayerImage);
                im_AddPlayer = view.findViewById(R.id.im_AddPlayer);
                tv_TeamNumber = view.findViewById(R.id.tv_TeamNumber);

            }

        }

        @Override
        public int getItemCount() {
            return mListenerList.size();
        }

        @Override
        public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
            View itemView = LayoutInflater.from(parent.getContext())
                    .inflate(R.layout.adapter_player_list, parent, false);

            return new MyViewHolder(itemView);
        }

        @Override
        public void onBindViewHolder(final MyViewHolder holder, final int position) {


            final String id = mListenerList.get(position).getMatchId();

            final String arrayList = (mListenerList.get(position).getPlayerData());
            try {
                JSONObject job = new JSONObject(arrayList);

                final String PlayerName = job.getString("name");
                final String PlayerImage = job.getString("image");
                final String PlayerPoints = job.getString("player_points");
                String PlayerCredit = job.getString("credit_points");
                final String TeamShortName = job.getString("team_short_name");

                String team_number = job.getString("team_number");
                String player_shortname = job.getString("player_shortname");

                holder.tv_TeamNumber.setText(team_number);
                // PlayerTeam= job.getString("short_name");


                holder.tv_PlayerName.setText(PlayerName);
                holder.tv_PlayerCredit.setText(PlayerCredit);
                holder.tv_PlayerPoints.setText(PlayerPoints);
                holder.tv_PlayerTeamName.setText(TeamShortName);


                Glide.with(activity).load(Config.PLAYERIMAGE + PlayerImage)
                        .crossFade()
                        .diskCacheStrategy(DiskCacheStrategy.ALL)
                        .into(holder.im_PlayerImage);


            holder.im_PlayerImage.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {

                    String arrayList = (mListenerList.get(position).getPlayerData());
                    try {
                        JSONObject job = new JSONObject(arrayList);
                        String PlayerImage = job.getString("image");
                        InfoPlayerImage = Config.PLAYERIMAGE + PlayerImage;

                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                    InfoPlayerId = mListenerList.get(position).getPlayerId();

                    callPlayerInfo(true);

                }
            });


            String IsSelected = mListenerList.get(position).getIsSelected();
            String CloneRole= mListenerList.get(position).getRole();
            if (IsSelected.equals("1")) {
                holder.im_AddPlayer.setImageResource(R.drawable.delete_icon);


            } else {
                holder.im_AddPlayer.setImageResource(R.drawable.add_icon);
            }


            holder.im_AddPlayer.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    playpostion=position;
                  // Rv_PlayerList.scrollToPosition(playpostion);
                    //Rv_PlayerList.setLayoutFrozen(false);
                    //Rv_PlayerList.setAnimation(null);
                    //Rv_PlayerList.scrollTo( position, view.getBottom());
                    String IsSelected = mListenerList.get(position).getIsSelected();
                    String Role = mListenerList.get(position).getRole();
                    String PlayerId = mListenerList.get(position).getPlayerId();
                    double PlayerCredit = Double.parseDouble(holder.tv_PlayerCredit.getText().toString());
                    int teamnumber = Integer.parseInt(holder.tv_TeamNumber.getText().toString());
                    if (IsSelected.equals("0")) {
                        if (PlayerCredit <= TotalCredit) {
                            if (TotalCount < 11) {
                                if (ValidCount10(Role, TotalCount)) {
                                    if (MaxLimitValidation(Role, TotalCount)) {
                                if (TeamOneCount>6&&teamnumber==1) {
                                            //ShowToast(context, "You can only select 7 player from one team.");
                                    alertMsg.setVisibility(View.VISIBLE);
                                    alertMsg.setText("You can only select 7 player from one team.");
                                        }
                                        else if (TeamTwoCount>6&&teamnumber==2){
                                            //ShowToast(context, "You can only select 7 player from one team.");
                                    alertMsg.setVisibility(View.VISIBLE);
                                    alertMsg.setText("You can only select 7 player from one team.");
                                        }
                                        else {

                                        if (Role.equals("WK")) {
                                            if (WkCount < 1) {
                                                WkCount = WkCount + 1;
                                                TotalCount = TotalCount + 1;
                                                TeamoneTwoIncreasecount(teamnumber);
                                                SetTotalCount(TotalCount);
                                                tv_WKCount.setText("" + WkCount+"/1");
                                                UpdateSelection(Role, "1", PlayerId);

                                                BeanDBTeam ABean = new BeanDBTeam();
                                                ABean.setIsSelected("1");
                                                ABean.setRole(Role);
                                                ABean.setPlayerId(PlayerId);
                                                ABean.setMatchId(id);
                                                ABean.setPlayerData(arrayList);
                                                mListenerList.set(position,ABean);

                                                holder.im_AddPlayer.setImageResource(R.drawable.delete_icon);
                                                TotalCredit = TotalCredit - PlayerCredit;
                                                tv_TotalCredit.setText(TotalCredit + "/100");
                                               //Rv_PlayerList.setLayoutFrozen(false);
                                                //alertMsg.setVisibility(View.INVISIBLE);
                                            } else {
                                                //ShowToast(context, "Wicket Keeper Should be 1");
                                                alertMsg.setVisibility(View.VISIBLE);
                                                alertMsg.setText("Wicket Keeper Should be 1");
                                            }


                                        } else if (Role.equals("BAT")) {
                                            if (BatCount < 5) {
                                                BatCount = BatCount + 1;
                                                TotalCount = TotalCount + 1;
                                                TeamoneTwoIncreasecount(teamnumber);
                                                SetTotalCount(TotalCount);
                                                tv_BATCount.setText("" + BatCount+"/5");
                                                UpdateSelection(Role, "1", PlayerId);

                                                BeanDBTeam ABean = new BeanDBTeam();
                                                ABean.setIsSelected("1");
                                                ABean.setRole(Role);
                                                ABean.setPlayerId(PlayerId);
                                                ABean.setMatchId(id);
                                                ABean.setPlayerData(arrayList);
                                                mListenerList.set(position,ABean);


                                                holder.im_AddPlayer.setImageResource(R.drawable.delete_icon);
                                                TotalCredit = TotalCredit - PlayerCredit;
                                                tv_TotalCredit.setText(TotalCredit + "/100");
                                                //Rv_PlayerList.setLayoutFrozen(false);
                                               // alertMsg.setVisibility(View.INVISIBLE);


                                           } else {
                                               // ShowToast(context, "Batsman Should be 3-5");
                                                alertMsg.setVisibility(View.VISIBLE);
                                                alertMsg.setText("Batsman Should be 3-5");

                                            }


                                        } else if (Role.equals("AR")) {
                                            if (ArCount < 3) {
                                                ArCount = ArCount + 1;
                                                TotalCount = TotalCount + 1;
                                                TeamoneTwoIncreasecount(teamnumber);
                                                SetTotalCount(TotalCount);
                                                tv_ARCount.setText("" + ArCount+"/3");
                                                UpdateSelection(Role, "1", PlayerId);


                                                BeanDBTeam ABean = new BeanDBTeam();
                                                ABean.setIsSelected("1");
                                                ABean.setRole(Role);
                                                ABean.setPlayerId(PlayerId);
                                                ABean.setPlayerData(arrayList);
                                                ABean.setMatchId(id);
                                                mListenerList.set(position,ABean);

                                                holder.im_AddPlayer.setImageResource(R.drawable.delete_icon);
                                                TotalCredit = TotalCredit - PlayerCredit;
                                                tv_TotalCredit.setText(TotalCredit + "/100");
                                                //Rv_PlayerList.setLayoutFrozen(false);
                                               // alertMsg.setVisibility(View.INVISIBLE);

                                            } else {
                                                //ShowToast(context, "All Rounder Should be 1-3");
                                                alertMsg.setVisibility(View.VISIBLE);
                                                alertMsg.setText("All Rounder Should be 1-3");
                                            }


                                        } else if (Role.equals("BOWL")) {
                                            if (BowlCount < 5) {
                                                BowlCount = BowlCount + 1;
                                                TotalCount = TotalCount + 1;
                                                TeamoneTwoIncreasecount(teamnumber);
                                                SetTotalCount(TotalCount);
                                                tv_BOWLCount.setText("" + BowlCount+"/5");
                                                UpdateSelection(Role, "1", PlayerId);

                                                BeanDBTeam ABean = new BeanDBTeam();
                                                ABean.setIsSelected("1");
                                                ABean.setRole(Role);
                                                ABean.setPlayerId(PlayerId);
                                                ABean.setPlayerData(arrayList);
                                                ABean.setMatchId(id);
                                                mListenerList.set(position,ABean);

                                                holder.im_AddPlayer.setImageResource(R.drawable.delete_icon);
                                                TotalCredit = TotalCredit - PlayerCredit;
                                                tv_TotalCredit.setText(TotalCredit + "/100");
                                               //Rv_PlayerList.setLayoutFrozen(false);
                                                //alertMsg.setVisibility(View.INVISIBLE);


                                            } else {

                                               // ShowToast(context, "Bowler Should be 3-5");
                                                alertMsg.setVisibility(View.VISIBLE);
                                                alertMsg.setText("Bowler Should be 3-5");
                                               // Rv_PlayerList.setLayoutFrozen(false);
                                            }
                                        }


                                    }

                                        //MaxLimit
                                    }


                                    //Valid
                                }

                            } else {
                               // ShowToast(context, "Team Size Exceed.");
                                alertMsg.setVisibility(View.VISIBLE);
                                alertMsg.setText("Team Size Exceed.");
                               // Rv_PlayerList.setLayoutFrozen(false);
                           }


                        }

                        //No Credit Left
                        else {
                            //ShowToast(context, "No Credit");
                            alertMsg.setVisibility(View.VISIBLE);
                            alertMsg.setText("No Credit");
                            //Rv_PlayerList.setLayoutFrozen(false);
                        }
                    } else {
                        Log.e("Role", Role+"\n"+PlayerName+"\n"+
                                PlayerImage +"\n"+PlayerPoints+"\n"+ PlayerCredit+"\n"+ TeamShortName );
                        if (Role.equals("WK") && WkCount != 0 && TotalCount != 0) {
                            WkCount = WkCount - 1;
                            TotalCount = TotalCount - 1;
                            TeamoneTwoDecreasecount(teamnumber);
                            SetTotalCount(TotalCount);
                            tv_WKCount.setText("" + WkCount+"/1");
                            UpdateSelection(Role, "0", PlayerId);

                            BeanDBTeam ABean = new BeanDBTeam();
                            ABean.setIsSelected("0");
                            ABean.setRole(Role);
                            ABean.setPlayerId(PlayerId);
                            ABean.setPlayerData(arrayList);
                            ABean.setMatchId(id);
                            mListenerList.set(position,ABean);

                            holder.im_AddPlayer.setImageResource(R.drawable.add_icon);

                            TotalCredit = TotalCredit + PlayerCredit;
                            tv_TotalCredit.setText(TotalCredit + "/100");
                            //Rv_PlayerList.setLayoutFrozen(false);
                            //alertMsg.setVisibility(View.GONE);

                        } else if (Role.equals("BAT") && BatCount != 0 && TotalCount != 0) {
                            BatCount = BatCount - 1;
                            TotalCount = TotalCount - 1;
                            TeamoneTwoDecreasecount(teamnumber);
                            SetTotalCount(TotalCount);
                            tv_BATCount.setText("" + BatCount+"/5");
                            UpdateSelection(Role, "0", PlayerId);

                            BeanDBTeam ABean = new BeanDBTeam();
                            ABean.setIsSelected("0");
                            ABean.setRole(Role);
                            ABean.setPlayerId(PlayerId);
                            ABean.setPlayerData(arrayList);
                            ABean.setMatchId(id);
                            mListenerList.set(position,ABean);


                            holder.im_AddPlayer.setImageResource(R.drawable.add_icon);

                            TotalCredit = TotalCredit + PlayerCredit;
                            tv_TotalCredit.setText(TotalCredit + "/100");
                           //Rv_PlayerList.setLayoutFrozen(false);
                           // alertMsg.setVisibility(View.GONE);
                        } else if (Role.equals("AR") && ArCount != 0 && TotalCount != 0) {
                            ArCount = ArCount - 1;
                            TotalCount = TotalCount - 1;
                            TeamoneTwoDecreasecount(teamnumber);
                            SetTotalCount(TotalCount);
                            tv_ARCount.setText("" + ArCount+"/3");
                            UpdateSelection(Role, "0", PlayerId);


                            BeanDBTeam ABean = new BeanDBTeam();
                            ABean.setIsSelected("0");
                            ABean.setRole(Role);
                            ABean.setPlayerId(PlayerId);
                            ABean.setPlayerData(arrayList);
                            ABean.setMatchId(id);
                            mListenerList.set(position,ABean);

                            holder.im_AddPlayer.setImageResource(R.drawable.add_icon);

                            TotalCredit = TotalCredit + PlayerCredit;
                            tv_TotalCredit.setText(TotalCredit + "/100");
                            //Rv_PlayerList.setLayoutFrozen(false);
                            //alertMsg.setVisibility(View.GONE);

                        } else if (Role.equals("BOWL") && BowlCount != 0 && TotalCount != 0) {
                            BowlCount = BowlCount - 1;
                            TotalCount = TotalCount - 1;
                            TeamoneTwoDecreasecount(teamnumber);
                            SetTotalCount(TotalCount);
                            tv_BOWLCount.setText("" + BowlCount+"/5");
                            UpdateSelection(Role, "0", PlayerId);

                            BeanDBTeam ABean = new BeanDBTeam();
                            ABean.setIsSelected("0");
                            ABean.setRole(Role);
                            ABean.setPlayerId(PlayerId);
                            ABean.setPlayerData(arrayList);
                            ABean.setMatchId(id);
                            mListenerList.set(position,ABean);

                            holder.im_AddPlayer.setImageResource(R.drawable.add_icon);

                            TotalCredit = TotalCredit + PlayerCredit;
                            tv_TotalCredit.setText(TotalCredit + "/100");
                           // Rv_PlayerList.setLayoutFrozen(false);
                            //alertMsg.setVisibility(View.GONE);
                        }
                    }
                }
            });

            } catch (JSONException e) {
                e.printStackTrace();
            }

        }

    }

    public void TeamoneTwoIncreasecount(int TeamNumber){

        if (TeamNumber==1) {
            TeamOneCount = TeamOneCount + 1;
            tv_TeamOneSize.setText(TeamOneCount+"");

        }
        else {
            TeamTwoCount = TeamTwoCount + 1;
            tv_TeamTwoSize.setText(TeamTwoCount+"");

        }


    }
    public void TeamoneTwoDecreasecount(int TeamNumber){

        if (TeamNumber==1) {
            TeamOneCount = TeamOneCount - 1;
            tv_TeamOneSize.setText(TeamOneCount+"");
        }
        else {
            TeamTwoCount = TeamTwoCount - 1;
            tv_TeamTwoSize.setText(TeamTwoCount+"");
        }


    }


    public boolean MaxLimitValidation(String Role, int TotalCount) {


        if (Role.equals("BAT")) {

            if (BatCount == 4 && BowlCount == 5) {

                if (WkCount < 1) {
                    //ShowToast(context, "Wicket Keeper Should be 1");
                    alertMsg.setVisibility(View.VISIBLE);
                    alertMsg.setText("Wicket Keeper Should be 1");
                    return false;
                } else if (ArCount < 1) {
                    //ShowToast(context, "All Rounder Should be 1-3");
                    alertMsg.setVisibility(View.VISIBLE);
                    alertMsg.setText("All Rounder Should be 1-3");
                    return false;
                }
                else {
                    //alertMsg.setVisibility(View.GONE);
                    return true;
                }

            } else if (BatCount == 4 && ArCount == 3) {

                //ShowToast(context, "Batsman Should be 3-5");
                alertMsg.setVisibility(View.VISIBLE);
                alertMsg.setText("Batsman Should be 3-5");
                return false;

            } else {
                //alertMsg.setVisibility(View.GONE);
                return true;


            }

        }
        else if (Role.equals("BOWL")) {

            if (BatCount == 5 && BowlCount == 4) {
                if (WkCount < 1) {
                    //ShowToast(context, "Wicket Keeper Should be 1");
                    alertMsg.setVisibility(View.VISIBLE);
                    alertMsg.setText("Wicket Keeper Should be 1");
                    return false;
                } else if (ArCount < 1) {
                    //ShowToast(context, "All Rounder Should be 1-3");
                    alertMsg.setVisibility(View.VISIBLE);
                    alertMsg.setText("All Rounder Should be 1-3");
                    return false;
                }
                else {
                    //alertMsg.setVisibility(View.GONE);
                    return true;
                }



            } else if (BowlCount == 4 && ArCount == 3) {
                //ShowToast(context, "Bowler Should be 3-5");
                alertMsg.setVisibility(View.VISIBLE);
                alertMsg.setText("Bowler Should be 3-5");
                return false;
            } else {
                //alertMsg.setVisibility(View.GONE);
                return true;
            }

        } else if (Role.equals("AR")) {
            if (BowlCount == 5 && ArCount == 2) {
                alertMsg.setVisibility(View.VISIBLE);
                alertMsg.setText("Batsman Should be 3-5");
                //ShowToast(context, "Batsman Should be 3-5");
                return false;
            } else if (BatCount == 5 && ArCount == 2) {
                alertMsg.setVisibility(View.VISIBLE);
                alertMsg.setText("Bowler Should be 3-5");
                //ShowToast(context, "Bowler Should be 3-5");

                return false;
            } else

            {
               // alertMsg.setVisibility(View.GONE);
                return true;
            }


        } else {
            return true;
        }

    }



    public boolean ValidCount10(String Role, int TotalCount){
        if (TotalCount==10) {

            if (Role.equals("WK")) {
                if (BatCount < 3&&ArCount < 1&&BowlCount < 3) {

                    if (ArCount<1){
                        //ShowToast(context, "All Rounder Should be 1-3");
                        alertMsg.setVisibility(View.VISIBLE);
                        alertMsg.setText("All Rounder Should be 1-3");
                        return false;
                    }
                    else if (BatCount<3){
                        //ShowToast(context, "Batsman Should be 3-5");
                        alertMsg.setVisibility(View.VISIBLE);
                        alertMsg.setText("Batsman Should be 3-5");
                        return false;
                    }
                    else if (BowlCount<3){
                        //ShowToast(context, "Bowler Should be 3-5");
                        alertMsg.setVisibility(View.VISIBLE);
                        alertMsg.setText("Bowler Should be 3-5");
                        return false;
                    }
                    else {
                        //alertMsg.setVisibility(View.GONE);
                        return true;
                    }

                }else

                {
                    //alertMsg.setVisibility(View.GONE);
                    return true;
                }
            } else if (Role.equals("BAT")) {

                if (ArCount < 1||WkCount < 1||BowlCount <3) {


                    if (ArCount<1){
                        //ShowToast(context, "All Rounder Should be 1-3");
                        alertMsg.setVisibility(View.VISIBLE);
                        alertMsg.setText("All Rounder Should be 1-3");
                        return false;
                    }
                    else if (WkCount<1){
                        //ShowToast(context, "Wicket Keeper Should be 1");
                        alertMsg.setVisibility(View.VISIBLE);
                        alertMsg.setText("Wicket Keeper Should be 1");
                        return false;
                    }
                    else if (BowlCount<3){
                        //ShowToast(context, "Bowler Should be 3-5");
                        alertMsg.setVisibility(View.VISIBLE);
                        alertMsg.setText("Bowler Should be 3-5");
                        return false;
                    }
                    else {
                        //alertMsg.setVisibility(View.GONE);
                        return true;
                    }

                }else

                {
                    //alertMsg.setVisibility(View.GONE);
                    return true;
                }
            } else if (Role.equals("AR")) {
                if (BatCount < 3||WkCount < 1||BowlCount < 3) {

                    if (BatCount<3){
                        //ShowToast(context, "Batsman Should be 3-5");
                        alertMsg.setVisibility(View.VISIBLE);
                        alertMsg.setText("Batsman Should be 3-5");
                        return false;
                    }
                    else if (WkCount<1){
                        //ShowToast(context, "Wicket Keeper Should be 1");
                        alertMsg.setVisibility(View.VISIBLE);
                        alertMsg.setText("Wicket Keeper Should be 1");
                        return false;
                    }
                    else if (BowlCount<3){
                        //ShowToast(context, "Bowler Should be 3-5");
                        alertMsg.setVisibility(View.VISIBLE);
                        alertMsg.setText("Bowler Should be 3-5");
                        return false;
                    }
                    else {
                       // alertMsg.setVisibility(View.GONE);
                        return true;
                    }


                }else

                {
                    //alertMsg.setVisibility(View.GONE);
                    return true;
                }
            } else {
                if (BatCount<3||WkCount<1||ArCount<1) {

                    if (BatCount<3){
                        //ShowToast(context, "Batsman Should be 3-5");
                        alertMsg.setVisibility(View.VISIBLE);
                        alertMsg.setText("Batsman Should be 3-5");
                        return false;
                    }
                    else if (WkCount<1){
                        //ShowToast(context, "Wicket Keeper Should be 1");
                        alertMsg.setVisibility(View.VISIBLE);
                        alertMsg.setText("Wicket Keeper Should be 1");
                        return false;
                    }
                    else if (ArCount<1){
                        //ShowToast(context, "All Rounder Should be 1-3");
                        alertMsg.setVisibility(View.VISIBLE);
                        alertMsg.setText("All Rounder Should be 1-3");
                        return false;
                    }
                    else {
                       // alertMsg.setVisibility(View.GONE);
                        return true;

                    }


                }else {
                    //alertMsg.setVisibility(View.GONE);
                    return true;
                }
            }

        }




        else {
            //alertMsg.setVisibility(View.GONE);
            return true;
        }

    }


}

class MyComparator implements Comparator<BeanDBTeam> {
   public int compare(BeanDBTeam p1, BeanDBTeam p2) {
       double PlayerCredit=0,PlayerCredit1=0;
               String arrayList = p1.getPlayerData();
       try {
           JSONObject job = new JSONObject(arrayList);
           PlayerCredit = Double.parseDouble(job.getString("credit_points"));
       }
       catch (Exception e){
           e.printStackTrace();
       }
       String arrayList1 = p2.getPlayerData();
       try {
           JSONObject job = new JSONObject(arrayList1);
           PlayerCredit1 = Double.parseDouble(job.getString("credit_points"));
       }
       catch (Exception e){
           e.printStackTrace();
       }

       if(PlayerCredit==PlayerCredit1)
           return 0;
       else if(PlayerCredit<PlayerCredit1)
           return 1;
       else
           return -1;


   }
}

/*class AgeComparator implements Comparator<Student>{
    public int compare(Student s1,Student s2){
        if(s1.age==s2.age)
            return 0;
        else if(s1.age>s2.age)
            return 1;
        else
            return -1;
    }*/

