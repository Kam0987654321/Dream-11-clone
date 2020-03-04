package com.indian11.app.FragmentBottomMenu;


import android.Manifest;
import android.app.Activity;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.PackageManager;
import android.graphics.Bitmap;
import android.net.Uri;
import android.os.Build;
import android.os.Bundle;
import android.provider.MediaStore;
import android.support.v4.app.ActivityCompat;
import android.support.v4.app.Fragment;
import android.support.v4.content.ContextCompat;
import android.support.v7.app.AlertDialog;
import android.text.TextUtils;
import android.util.Base64;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.indian11.app.APICallingPackage.Class.APIRequestManager;
import com.indian11.app.APICallingPackage.Interface.ResponseManager;
import com.indian11.app.AddCashActivity;
import com.indian11.app.Bean.UserDetails;
import com.indian11.app.Config;
import com.indian11.app.EditProfileActivity;
import com.indian11.app.ForgotPasswordPackage.NewPasswordActivity;
import com.indian11.app.GlobalRankActivity;
import com.indian11.app.HomeActivity;
import com.indian11.app.InviteFriendsActivity;
import com.indian11.app.InvitedFriendListActivity;
import com.indian11.app.MainActivity;
import com.indian11.app.MyAccount.MyAccountActivity;
import com.indian11.app.MyAccount.WithdrawAmountActivity;
import com.indian11.app.R;
import com.indian11.app.SessionManager;
import com.bumptech.glide.Glide;
import com.facebook.login.LoginManager;
import com.google.android.gms.auth.api.Auth;
import com.google.android.gms.common.api.ResultCallback;
import com.google.android.gms.common.api.Status;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.ByteArrayOutputStream;
import java.util.ArrayList;
import java.util.List;

import de.hdodenhof.circleimageview.CircleImageView;

import static android.app.Activity.RESULT_OK;
import static android.content.Context.MODE_PRIVATE;
import static com.indian11.app.APICallingPackage.Class.Validations.ShowToast;
import static com.indian11.app.Config.MYACCOUNT;
import static com.indian11.app.Config.MYPLAYINGHISTORY;
import static com.indian11.app.Config.UpdateUserProfileImage;
import static com.indian11.app.Constants.MYACCOUNTTYPE;
import static com.indian11.app.Constants.MYPLAYINGHISTORYTYPE;
import static com.indian11.app.Constants.UpdateProfileImage;


public class ProfileFragment extends Fragment implements ResponseManager {


    TextView tv_ProfileChangePassword,tv_ProfileLogout,tv_ProfileYourMail,tv_ProfileAccount
            ,tv_ProfileAddBalance,tv_ProfileView,tv_ProfileDeposited,tv_ProfileWinning,
            tv_ProfileBonus,tv_ProfileUserName,tv_ProfileWithdrawl;
    SessionManager sessionManager;
    private SharedPreferences loginPreferences;
    private Boolean saveLogin;
    private SharedPreferences.Editor loginPrefsEditor;
    CircleImageView circleImageView;

    ResponseManager responseManager;
    APIRequestManager apiRequestManager;

    HomeActivity activity;
    Context context;
    String Deposited,Winnings,Bonus;

    TextView tv_JoinedContest,tv_JoinedMatches,tv_JoinedSeries,tv_Wins;
    TextView tv_InviteFriends,tv_MyFriendsList;
    LinearLayout LL_GlobalRanking;
    int PICK_IMAGE_GALLERY  = 100;
    int PICK_IMAGE_CAMERA = 101;
    CircleImageView im_ImagePreview;
    Bitmap bitmap;

    String[] permissions = new String[]{
            Manifest.permission.CAMERA,
            Manifest.permission.WRITE_EXTERNAL_STORAGE,
            Manifest.permission.READ_EXTERNAL_STORAGE
    };
    @Override
    public View onCreateView(LayoutInflater inflater, final ViewGroup container,
                             Bundle savedInstanceState) {
        View v = inflater.inflate(R.layout.fragment_profile, container, false);

        context = activity = (HomeActivity)getActivity();

        initViews(v);
        loginPreferences = getActivity().getSharedPreferences("loginPrefs", MODE_PRIVATE);
        loginPrefsEditor = loginPreferences.edit();
        saveLogin = loginPreferences.getBoolean("saveLogin", false);

        responseManager = this;
        apiRequestManager = new APIRequestManager(getActivity());


        tv_ProfileChangePassword.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(getActivity(), NewPasswordActivity.class);
                i.putExtra("UserId", HomeActivity.sessionManager.getUser(getContext()).getUser_id());
                i.putExtra("IntentActivity", "ChangePassword");
                startActivity(i);
            }
        });

        tv_ProfileLogout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Logout();
            }
        });
        tv_ProfileYourMail.setText(HomeActivity.sessionManager.getUser(getContext()).getEmail()+"");
        String UserEmail= HomeActivity.sessionManager.getUser(getContext()).getEmail();
        String Imageurl=HomeActivity.sessionManager.getUser(getContext()).getImage();
        Log.e("Imageurl",Config.ProfileIMAGEBASEURL+Imageurl);
        if(TextUtils.isEmpty(Imageurl)||Imageurl.equals(""))
        {

        }
        else
            {

                Glide.with(getActivity()).load(Config.ProfileIMAGEBASEURL+Imageurl)
                        //.crossFade()
                        //.diskCacheStrategy(DiskCacheStrategy.ALL)
                        .into(im_ImagePreview);
            }
        if (UserEmail.equals("")){
            tv_ProfileUserName.setText("Username");
        }
        else {
            tv_ProfileUserName.setText(UserEmail);
        }


        tv_ProfileAccount.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent i = new Intent(getActivity(), MyAccountActivity.class);
                startActivity(i);
            }
        });

        tv_ProfileAddBalance.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(getActivity(), AddCashActivity.class);
                startActivity(i);
            }
        });
        tv_ProfileView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(getActivity(), EditProfileActivity.class);
                startActivity(i);
            }
        });
        tv_InviteFriends.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(getActivity(), InviteFriendsActivity.class);
                startActivity(i);
            }
        });
        tv_MyFriendsList.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(getActivity(), InvitedFriendListActivity.class);
                startActivity(i);
            }
        });
        LL_GlobalRanking.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(getActivity(), GlobalRankActivity.class);
                startActivity(i);
            }
        });
        im_ImagePreview.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (Build.VERSION.SDK_INT >= 23) {
                    checkPermissions();
                }
                else {
                    ChooseImageDialog();
                }
            }
        });

        tv_ProfileWithdrawl.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                double Amount = Double.parseDouble(activity.getString(R.string.MinimumWithdrawAmountLimit));
                if (Double.parseDouble(Winnings)>=Amount) {
                    Intent i = new Intent(getActivity(), WithdrawAmountActivity.class);
                    i.putExtra("AvailableBalance", Winnings);
                    startActivity(i);
                }
                else {
                    ShowToast(context,"Not Enough Amount for Withdraw Request.");
                }
            }
        });



        callMyAccountDetails(true);
        callMyHistory(true);


        return v;
    }

    public void initViews(View v){

        tv_ProfileChangePassword = v.findViewById(R.id.tv_ProfileChangePassword);
        tv_ProfileLogout= v.findViewById(R.id.tv_ProfileLogout);
        tv_ProfileYourMail= v.findViewById(R.id.tv_ProfileYourMail);
        tv_ProfileAccount= v.findViewById(R.id.tv_ProfileAccount);
        tv_ProfileAddBalance= v.findViewById(R.id.tv_ProfileAddBalance);
        tv_ProfileView= v.findViewById(R.id.tv_ProfileView);

        tv_ProfileBonus= v.findViewById(R.id.tv_ProfileBonus);
        tv_ProfileDeposited= v.findViewById(R.id.tv_ProfileDeposited);
        tv_ProfileWinning= v.findViewById(R.id.tv_ProfileWinning);
        tv_ProfileUserName= v.findViewById(R.id.tv_ProfileUserName);

        tv_JoinedContest= v.findViewById(R.id.tv_JoinedContest);
        tv_JoinedMatches= v.findViewById(R.id.tv_JoinedMatches);
        tv_JoinedSeries= v.findViewById(R.id.tv_JoinedSeries);
        tv_Wins= v.findViewById(R.id.tv_Wins);

        tv_InviteFriends= v.findViewById(R.id.tv_InviteFriends);
        tv_MyFriendsList= v.findViewById(R.id.tv_MyFriendsList);

        tv_ProfileWithdrawl= v.findViewById(R.id.tv_ProfileWithdrawl);
        LL_GlobalRanking= v.findViewById(R.id.LL_GlobalRanking);

        im_ImagePreview = v.findViewById(R.id.im_profilepic);



    }
    public void ChooseImageDialog(){
        AlertDialog.Builder builderSingle = new AlertDialog.Builder(activity);
        builderSingle.setTitle("Choose Image");
        final ArrayAdapter<String> arrayAdapter =
                new ArrayAdapter<String>(activity,
                        android.R.layout.simple_list_item_1);
        arrayAdapter.add("Camera");
        arrayAdapter.add("Gallery");

        builderSingle.setAdapter(arrayAdapter, new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                String strName = arrayAdapter.getItem(which);
                dialog.dismiss();
                if (strName.equals("Gallery")){
                    bitmap = null;
                    im_ImagePreview.setVisibility(View.GONE);
                    Intent intent = new Intent();
                    intent.setType("image/*");
                    intent.setAction(Intent.ACTION_GET_CONTENT);
                    startActivityForResult(Intent.createChooser(intent, "Select Picture"), PICK_IMAGE_GALLERY);
                }
                else{
                    bitmap = null;
                    im_ImagePreview.setVisibility(View.GONE);
                    Intent cameraIntent = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
                    startActivityForResult(cameraIntent, PICK_IMAGE_CAMERA);
                }
            }
        });
        builderSingle.show();

    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data)
    {
        if (requestCode == PICK_IMAGE_GALLERY &&
                resultCode == RESULT_OK && data != null && data.getData() != null) {
            Uri filePath = data.getData();
            try {
                bitmap = MediaStore.Images.Media.
                        getBitmap(activity.getContentResolver(), filePath);
                im_ImagePreview.setVisibility(View.VISIBLE);
                im_ImagePreview.setImageBitmap(bitmap);
                callUploadDoc(true);
                Log.e("Image Path", "onActivityResult: "+filePath );
            } catch (Exception e) {
                bitmap = null;
                e.printStackTrace();
            }
        }
        if (requestCode == PICK_IMAGE_CAMERA&&resultCode == RESULT_OK ) {
            try {
                bitmap = (Bitmap) data.getExtras().get("data");
                im_ImagePreview.setVisibility(View.VISIBLE);
                im_ImagePreview.setImageBitmap(bitmap);

                Log.e("Image Path", "onActivityResult: " );
            } catch (Exception e) {
                bitmap = null;
                e.printStackTrace();
            }
        }

    }

    public String getStringImage(Bitmap bmp){
        ByteArrayOutputStream baos = new ByteArrayOutputStream();
        bmp.compress(Bitmap.CompressFormat.JPEG, 100, baos);
        byte[] imageBytes = baos.toByteArray();
        String encodedImage = Base64.encodeToString(imageBytes, Base64.DEFAULT);
        return encodedImage;
    }


    private boolean checkPermissions() {
        int result;
        List<String> listPermissionsNeeded = new ArrayList<>();
        for (String p : permissions) {
            result = ContextCompat.checkSelfPermission(context = activity = (HomeActivity)getActivity(), p);
            if (result != PackageManager.PERMISSION_GRANTED) {
                listPermissionsNeeded.add(p);
            }
        }
        if (!listPermissionsNeeded.isEmpty()) {
            ActivityCompat.requestPermissions((Activity) (context = activity = (HomeActivity)getActivity()),
                    listPermissionsNeeded.toArray(new
                            String[listPermissionsNeeded.size()]), 100);
            return false;
        }
        else {
            ChooseImageDialog();
        }
        return true;
    }
    @Override
    public void onRequestPermissionsResult(int requestCode, String permissions[], int[] grantResults) {
        if (requestCode == 100) {
            if (grantResults.length > 0
                    && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                ChooseImageDialog();
            }
            else {

            }
            return;
        }
    }

    private void callMyAccountDetails(boolean isShowLoader) {
        try {
            apiRequestManager.callAPI(MYACCOUNT,
                    createRequestJsonWin(), context, activity, MYACCOUNTTYPE,
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
 private void callMyHistory(boolean isShowLoader) {
        try {
            apiRequestManager.callAPI(MYPLAYINGHISTORY,
                    createRequestJsonHistory(), context, activity, MYPLAYINGHISTORYTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJsonHistory() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("user_id", HomeActivity.sessionManager.getUser(context).getUser_id());

        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }

    private void callUploadDoc(boolean isShowLoader) {
        try {
            apiRequestManager.callAPI(UpdateUserProfileImage,
                    createRequestJson(), context, activity, UpdateProfileImage,
                    isShowLoader, responseManager);
        } catch (JSONException e) {
            e.printStackTrace();
        }
    }
    JSONObject createRequestJson() {
        JSONObject jsonObject = new JSONObject();
        try {
            sessionManager = new SessionManager();
            jsonObject.put("user_id", sessionManager.getUser(context).getUser_id());

            jsonObject.put("profile_image", getStringImage(bitmap));
        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }


    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {

        if (type.equals(MYPLAYINGHISTORYTYPE)){
            try {
               String wins = result.getString("wins");
                String series = result.getString("series");
                String contest = result.getString("contest");
                String matchs = result.getString("matchs");
                tv_JoinedContest.setText(contest);
                tv_JoinedMatches.setText(matchs);
                tv_JoinedSeries.setText(series);
                tv_Wins.setText(wins);

            } catch (JSONException e) {
                e.printStackTrace();
            }
        }
        else if(type.equals(UpdateProfileImage))
        {

            try {
               //String picmsg = result.getString("status");
                String imageurl=result.getString("data");
               // ShowToast(mContext,picmsg.toString());
                loginPrefsEditor.putBoolean("saveLogin", true);
                loginPrefsEditor.commit();
                UserDetails userDetails = new UserDetails();
                userDetails.setUser_id(HomeActivity.sessionManager.getUser(getContext()).getUser_id());
                userDetails.setName(HomeActivity.sessionManager.getUser(getContext()).getName());
                userDetails.setMobile(HomeActivity.sessionManager.getUser(getContext()).getMobile());
                userDetails.setEmail(HomeActivity.sessionManager.getUser(getContext()).getEmail());
                userDetails.setType(HomeActivity.sessionManager.getUser(getContext()).getType());
                userDetails.setReferral_code(HomeActivity.sessionManager.getUser(getContext()).getReferral_code());
                userDetails.setImage(imageurl);

                userDetails.setVerify(HomeActivity.sessionManager.getUser(getContext()).getVerify());
                sessionManager.setUser(context, userDetails);
                Log.e("picmgs",imageurl);
                Log.e("result",result.toString());
            } catch (JSONException e) {
                e.printStackTrace();
            }
        }

        else {
            try {
                Deposited = result.getString("credit_amount");
                Winnings = result.getString("winning_amount");
                Bonus = result.getString("bonous_amount");
                tv_ProfileDeposited.setText("₹ " + Deposited);
                tv_ProfileWinning.setText("₹ " + Winnings);
                tv_ProfileBonus.setText("₹ " + Bonus);


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

    }

    public void Logout(){

        LoginManager.getInstance().logOut();
        loginPrefsEditor.clear();
        loginPrefsEditor.commit();
        Auth.GoogleSignInApi.revokeAccess(HomeActivity.mGoogleApiClient).setResultCallback(
                new ResultCallback<Status>() {
                    @Override
                    public void onResult(Status status) {

                    }
                });

        Intent i = new Intent(getActivity(), MainActivity.class);
        startActivity(i);

    }
}
