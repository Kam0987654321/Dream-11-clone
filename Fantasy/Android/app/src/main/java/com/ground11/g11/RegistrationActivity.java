package com.ground11.g11;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.PackageManager;
import android.os.Build;
import android.os.Bundle;
import android.os.Handler;
import android.support.annotation.NonNull;
import android.support.design.widget.TextInputLayout;
import android.support.v4.app.ActivityCompat;
import android.support.v4.content.ContextCompat;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.view.WindowManager;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.ground11.g11.APICallingPackage.Class.APIRequestManager;
import com.ground11.g11.APICallingPackage.Class.Validations;
import com.ground11.g11.APICallingPackage.Interface.ResponseManager;
import com.ground11.g11.Bean.UserDetails;
import com.facebook.AccessToken;
import com.facebook.CallbackManager;
import com.facebook.FacebookCallback;
import com.facebook.FacebookException;
import com.facebook.FacebookSdk;
import com.facebook.GraphRequest;
import com.facebook.GraphResponse;
import com.facebook.login.LoginManager;
import com.facebook.login.LoginResult;
import com.facebook.login.widget.LoginButton;
import com.google.android.gms.auth.api.Auth;
import com.google.android.gms.auth.api.signin.GoogleSignInAccount;
import com.google.android.gms.auth.api.signin.GoogleSignInOptions;
import com.google.android.gms.auth.api.signin.GoogleSignInResult;
import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.SignInButton;
import com.google.android.gms.common.api.GoogleApiClient;
import com.google.android.gms.common.api.ResultCallback;
import com.google.android.gms.common.api.Status;
import com.google.firebase.iid.FirebaseInstanceId;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

import static com.ground11.g11.APICallingPackage.Class.Validations.ShowToast;
import static com.ground11.g11.Config.LOGIN;
import static com.ground11.g11.Config.SIGNUP;
import static com.ground11.g11.Constants.LOGINTYPE;
import static com.ground11.g11.Constants.SIGNUPTYPE;

public class RegistrationActivity extends AppCompatActivity implements ResponseManager, GoogleApiClient.OnConnectionFailedListener  {

    ResponseManager responseManager;
    APIRequestManager apiRequestManager;

    Context context;
    RegistrationActivity activity;


    TextInputLayout input_RegMobNo,input_RegEmail,input_RegPassword,input_RegRefCode;
    EditText et_MobileNo,et_Email,et_Password,et_ReferralCode;
    TextView tv_RegNext,tv_TearmsandConditions,tv_SFacebookLogin,tv_SGoogleLogin,tv_HeaderName;
    LinearLayout LL_EnterCode,LL_Login,LL_RefLogin;
    ImageView im_back;
    RelativeLayout RL_FaceGoogle,RL_BottomLogin;
    String MobileNumber,EmailId,Password,ReferralCode;
    String Reffered;

    LoginButton fb_login_button;
    CallbackManager callbackManager;
    AccessToken accessTokan;


    private final String TAG = "RegistrationActivity";
    private static final int RC_SIGN_IN = 007;
    private GoogleApiClient mGoogleApiClient;
    private SignInButton btnSignIn;
    String LoginType = "Normal";


    //Auto Login
    private SharedPreferences loginPreferences;
    private Boolean saveLogin;
    private SharedPreferences.Editor loginPrefsEditor;

    //SMS Permission
    String[] permissions = new String[]{
            android.Manifest.permission.READ_SMS,
            android.Manifest.permission.RECEIVE_SMS
    };

    SessionManager sessionManager;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        callbackManager = CallbackManager.Factory.create();
        setContentView(R.layout.activity_regitration);
        this.getWindow().setSoftInputMode(WindowManager.LayoutParams.SOFT_INPUT_STATE_ALWAYS_HIDDEN);
        context = activity = this;
        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);
        initViews();
        sessionManager = new SessionManager();

        loginPreferences = getSharedPreferences("loginPrefs", MODE_PRIVATE);
        loginPrefsEditor = loginPreferences.edit();
        saveLogin = loginPreferences.getBoolean("saveLogin", false);

        Reffered = getIntent().getStringExtra("Reffered");


        if (Reffered.equals("Yes")){
            input_RegRefCode.setVisibility(View.VISIBLE);
            RL_FaceGoogle.setVisibility(View.GONE);
            RL_BottomLogin.setVisibility(View.GONE);
            LL_RefLogin.setVisibility(View.VISIBLE);

        }
        else {
            input_RegRefCode.setVisibility(View.GONE);
            RL_FaceGoogle.setVisibility(View.VISIBLE);
            RL_BottomLogin.setVisibility(View.VISIBLE);
            LL_RefLogin.setVisibility(View.GONE);
        }

        tv_RegNext.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                MobileNumber = et_MobileNo.getText().toString();
                EmailId = et_Email.getText().toString();
                Password = et_Password.getText().toString();
                if (Reffered.equals("Yes")){
                    ReferralCode = et_ReferralCode.getText().toString();
                }
                else {
                    ReferralCode = "";
                }

                if (MobileNumber.equals("")){
                    ShowToast(context,"Enter Mobile Number");
                    et_MobileNo.requestFocus();
                }
                else if (!MobileNumber.matches(Validations.MobilePattern)){
                   et_MobileNo.requestFocus();
                    ShowToast(context,"Enter Valid Mobile Number");
                }
                else if (EmailId.equals("")){
                    et_Email.requestFocus();
                    ShowToast(context,"Enter Email Id");

                } else if(!Validations.isValidEmail(EmailId)){
                    et_Email.requestFocus();
                    ShowToast(context,"Enter Valid Email Id");
                }
                else if (Password.equals("")){
                    et_Password.requestFocus();
                    ShowToast(context,"Enter Password");
                }
                else if (Password.length()<8&& !Validations.isValidPassword(Password)){

                    ShowToast(context,"Password Pattern Not Macthed");
                }
                else {
                        LoginType = "Normal";

                    if (Build.VERSION.SDK_INT >= 23) {
                        checkPermissions();
                    } else {
                        callSignupApi(true);
                    }

                }

            }
        });

        tv_SFacebookLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //fb_login_button.performClick();
                initFbObject(activity);
                LoginType = "Email";
            }
        });

        tv_SGoogleLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                LoginType = "Email";
                Intent signInIntent = Auth.GoogleSignInApi.getSignInIntent(mGoogleApiClient);
                startActivityForResult(signInIntent, RC_SIGN_IN);
            }
        });

        LL_EnterCode.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(activity,RegistrationActivity.class);
                i.putExtra("Reffered","Yes");
                startActivity(i);
            }
        });

        LL_Login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(activity,LoginActivity.class);
                startActivity(i);
            }
        });
        LL_RefLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(activity,LoginActivity.class);
                startActivity(i);
            }
        });


        fb_login_button.setReadPermissions("email");
        fb_login_button.setReadPermissions("public_profile");
        fb_login_button.setReadPermissions("user_birthday");
        fb_login_button.setReadPermissions("user_friends");

        /*if (AccessToken.getCurrentAccessToken() != null) {
            RequestData();
        }
        fb_login_button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                if (AccessToken.getCurrentAccessToken() != null) {

                }
            }
        });
        fb_login_button.registerCallback(callbackManager, new FacebookCallback<LoginResult>() {
            @Override
            public void onSuccess(LoginResult loginResult) {

                if (AccessToken.getCurrentAccessToken() != null) {
                    RequestData();
                   Validations.showProgress(context);
                    final Handler handler = new Handler();
                    handler.postDelayed(new Runnable() {
                        @Override
                        public void run() {
                            Validations.hideProgress();
                        }
                    }, 5000);


                }
            }

            @Override
            public void onCancel() {

            }

            @Override
            public void onError(FacebookException exception) {
            }
        });*/


        //G+

        GoogleSignInOptions gso = new GoogleSignInOptions.Builder(GoogleSignInOptions.DEFAULT_SIGN_IN)
                .requestEmail()
                .build();

        mGoogleApiClient = new GoogleApiClient.Builder(this)
                .enableAutoManage(this, this)
                .addApi(Auth.GOOGLE_SIGN_IN_API, gso)
                .build();

        // Customizing G+ button
        btnSignIn.setSize(SignInButton.SIZE_STANDARD);
        btnSignIn.setScopes(gso.getScopeArray());



        btnSignIn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent signInIntent = Auth.GoogleSignInApi.getSignInIntent(mGoogleApiClient);
                startActivityForResult(signInIntent, RC_SIGN_IN);
            }
        });


        tv_TearmsandConditions.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent i = new Intent(activity, WebviewAcitivity.class);
                i.putExtra("Heading","TERMS & CONDITIONS");
                i.putExtra("URL",Config.TERMSANDCONDITIONSURL);
                startActivity(i);
            }
        });


    }

    public void initViews(){

        input_RegMobNo = findViewById(R.id.input_RegMobNo);
        input_RegEmail = findViewById(R.id.input_RegEmail);
        input_RegPassword = findViewById(R.id.input_RegPassword);
        input_RegRefCode = findViewById(R.id.input_RegRefCode);


        et_MobileNo = findViewById(R.id.et_MobileNo);
        et_Email = findViewById(R.id.et_Email);
        et_Password = findViewById(R.id.et_Password);
        et_ReferralCode = findViewById(R.id.et_ReferralCode);


        tv_RegNext = findViewById(R.id.tv_RegNext);
        tv_TearmsandConditions = findViewById(R.id.tv_TearmsandConditions);
        tv_SFacebookLogin = findViewById(R.id.tv_SFacebookLogin);
        tv_SGoogleLogin = findViewById(R.id.tv_SGoogleLogin);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);

        LL_EnterCode = findViewById(R.id.LL_EnterCode);
        LL_Login = findViewById(R.id.LL_Login);
        im_back = findViewById(R.id.im_back);
        RL_FaceGoogle = findViewById(R.id.RL_FaceGoogle);
        RL_BottomLogin = findViewById(R.id.RL_BottomLogin);
        LL_RefLogin = findViewById(R.id.LL_RefLogin);
        fb_login_button = findViewById(R.id.fb_login_button);
        btnSignIn =  findViewById(R.id.btn_sign_in);


        tv_HeaderName.setText("REGISTER & PLAY");
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                onBackPressed();
            }
        });

    }



    private void callSignupApi(boolean isShowLoader) {
        try {

            apiRequestManager.callAPI(SIGNUP,
                    createRequestJson(), context, activity, SIGNUPTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJson() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("mobile", MobileNumber);
            jsonObject.put("email", EmailId);
            jsonObject.put("password", Password);
            jsonObject.put("code", ReferralCode);
            jsonObject.put("type", LoginType);


        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }

    private void callLoginApi(boolean isShowLoader) {
        try {

            apiRequestManager.callAPI(LOGIN,
                    createRequestJsonLogin(), context, activity, LOGINTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJsonLogin() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("mobile", EmailId);
            jsonObject.put("password", Password);
            jsonObject.put("type", LoginType);
            jsonObject.put("token", FirebaseInstanceId.getInstance().getToken());


        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }




    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {
        Validations.showProgress(context);
        if (type.equals(SIGNUPTYPE)) {
            Log.e("RegistrationActivity>>", "getResult: >>>" + result + "\n" + type);

            try {
                String UserId = result.getString("user_id");
                String mobile = result.getString("mobile");
                String email = result.getString("email");
                String LoginType = result.getString("type");

                if (LoginType.equals("Normal")) {
                    Validations.hideProgress();
                    Intent i = new Intent(activity, VerifyOTPActivity.class);
                    i.putExtra("Number", mobile);
                    i.putExtra("Activity", "Registration");
                    i.putExtra("UserId", UserId);
                    i.putExtra("Password", Password);
                    startActivity(i);
                } else {
                    Validations.hideProgress();
                    callLoginApi(true);
                }

            } catch (JSONException e) {
                e.printStackTrace();
            }

        } else if (type.equals(LOGINTYPE)) {
            Validations.hideProgress();
            loginPrefsEditor.putBoolean("saveLogin", true);
            loginPrefsEditor.commit();

            try {
                UserDetails userDetails = new UserDetails();
                userDetails.setUser_id(result.getString("user_id"));
                userDetails.setName(result.getString("name"));
                userDetails.setMobile(result.getString("mobile"));
                userDetails.setEmail(result.getString("email"));
                userDetails.setType(result.getString("type"));
                userDetails.setVerify(result.getString("verify"));
                userDetails.setReferral_code(result.getString("referral_code"));
                userDetails.setImage(result.getString("image"));

                sessionManager.setUser(context, userDetails);
                Intent i = new Intent(activity, HomeActivity.class);
                startActivity(i);
            } catch (Exception e) {
                e.printStackTrace();
            }
        } else {
            Validations.hideProgress();
        }
    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    @Override
    public void onError(Context mContext, String type, String message) {

        if (type.equals(SIGNUPTYPE)) {
            //ShowToast(context, "Something went wrong. Please Login with our other options or try again with "+LoginType);
            //callLoginApi(true);
            revokeAccess();
            ShowToast(context,""+message);
        }
        else if (type.equals(LOGINTYPE)){
            ShowToast(context,"Some Error Occured While Login. Please Try Again");
        }

    }

    public void RequestData() {
        GraphRequest request = GraphRequest.newMeRequest(AccessToken.getCurrentAccessToken(),
                new GraphRequest.GraphJSONObjectCallback() {
                    @Override
                    public void onCompleted(JSONObject object, GraphResponse response) {

                        JSONObject json = response.getJSONObject();
                        try {
                            if (json != null) {

                                String FBName = json.getString("name");
                                String ProfileUrl = object.getJSONObject("picture").getJSONObject("data").getString("url");
                                String Id = json.getString("id");
                                //  String gender = json.getString("gender");
                                String Fname = json.getString("first_name");
                                String Lname = json.getString("last_name");
                                String FBEmail = json.getString("email");

                                MobileNumber = "";
                                EmailId = FBEmail;
                                Password = Id;

                                callSignupApi(true);

                                Log.e("RegistrationActivity>",json.toString());
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            LoginManager.getInstance().logOut();
                            final AlertDialog.Builder ab = new AlertDialog.Builder(activity);
                            ab.setMessage("Due to your facebook privacy settings," +
                                    "Facebook is denied to provide enough data for " +
                                    "login process.You can use our other Signup process");
                            ab.setPositiveButton("SignUp", new DialogInterface.OnClickListener() {
                                public void onClick(DialogInterface dialog, int id) {
                                    Intent i = new Intent(activity,MainActivity.class);
                                    startActivity(i);
                                }
                            });
                            ab.setNegativeButton("Cancel", new DialogInterface.OnClickListener() {
                                public void onClick(DialogInterface dialog, int id) {
                                    dialog.dismiss();
                                }
                            });
                            ab.setCancelable(false);
                            AlertDialog alert = ab.create();
                            alert.show();


                        }
                    }
                });
        Bundle parameters = new Bundle();
        parameters.putString("fields", "id,name,link,email,picture,gender,first_name,last_name,birthday");
        request.setParameters(parameters);
        request.executeAsync();
    }

    private void revokeAccess() {

        try {
            Auth.GoogleSignInApi.revokeAccess(mGoogleApiClient).setResultCallback(
                    new ResultCallback<Status>() {
                        @Override
                        public void onResult(Status status) {
                            // updateUI(false);
                        }
                    });
        }
        catch (Exception e){
            e.printStackTrace();
        }
    }


    private void handleSignInResult(GoogleSignInResult result) {
        Log.d(TAG, "handleSignInResult:" + result.isSuccess());
        if (result.isSuccess()) {
            // Signed in successfully, show authenticated UI.
            GoogleSignInAccount acct = result.getSignInAccount();

            Log.e(TAG, "display name: " + acct.getDisplayName());

            String personName = acct.getDisplayName();
            // String personPhotoUrl = acct.getPhotoUrl().toString();
            String email = acct.getEmail();
            String Id = acct.getId();

            MobileNumber = "";
            EmailId = email;
            Password = Id;
            callSignupApi(true);

            Log.e(TAG, "Name: " + personName + ", email: " + email
                    + ", Image: " /*personPhotoUrl*/);

            //updateUI(true);
        } else {
            Log.d(TAG, "handleSignInElse:" + result.isSuccess());
            // Signed out, show unauthenticated UI.
            //updateUI(false);
        }
    }


    @Override
    public void onStart() {
        super.onStart();

       /* OptionalPendingResult<GoogleSignInResult> opr = Auth.GoogleSignInApi.silentSignIn(mGoogleApiClient);
        if (opr.isDone()) {
            // If the user's cached credentials are valid, the OptionalPendingResult will be "done"
            // and the GoogleSignInResult will be available instantly.
            Log.d(TAG, "Got cached sign-in");
            GoogleSignInResult result = opr.get();
            handleSignInResult(result);
        } else {
            // If the user has not previously signed in on this device or the sign-in has expired,
            // this asynchronous branch will attempt to sign in the user silently.  Cross-device
            // single sign-on will occur in this branch.

            opr.setResultCallback(new ResultCallback<GoogleSignInResult>() {
                @Override
                public void onResult(GoogleSignInResult googleSignInResult) {
                    //  hideProgressDialog();
                    handleSignInResult(googleSignInResult);
                }
            });
        }*/
    }

    @Override
    public void onConnectionFailed(@NonNull ConnectionResult connectionResult) {
        // An unresolvable error has occurred and Google APIs (including Sign-In) will not
        // be available.
        Log.d(TAG, "onConnectionFailed:" + connectionResult);
    }


    @Override
    protected void onActivityResult ( int requestCode, int resultCode, Intent data){
        super.onActivityResult(requestCode, resultCode, data);

        // Result returned from launching the Intent from GoogleSignInApi.getSignInIntent(...);
        if (requestCode == RC_SIGN_IN) {
            GoogleSignInResult result = Auth.GoogleSignInApi.getSignInResultFromIntent(data);
            handleSignInResult(result);
        }
        else {
            callbackManager.onActivityResult(requestCode, resultCode, data);
            Validations.showProgress(context);
            final Handler handler = new Handler();
            handler.postDelayed(new Runnable() {
                @Override
                public void run() {
                    Validations.hideProgress();
                }
            }, 5000);
        }

    }


    private boolean checkPermissions() {
        int result;
        List<String> listPermissionsNeeded = new ArrayList<>();
        for (String p : permissions) {
            result = ContextCompat.checkSelfPermission(this, p);
            if (result != PackageManager.PERMISSION_GRANTED) {
                listPermissionsNeeded.add(p);
            }
        }
        if (!listPermissionsNeeded.isEmpty()) {
            ActivityCompat.requestPermissions(this, listPermissionsNeeded.toArray(new String[listPermissionsNeeded.size()]), 100);
            return false;
        }
        else {
            callSignupApi(true);
        }
        return true;
    }
    @Override
    public void onRequestPermissionsResult(int requestCode, String permissions[], int[] grantResults) {
        if (requestCode == 100) {
            if (grantResults.length > 0
                    && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                 callSignupApi(true);
            }
            else {
                callSignupApi(true);
            }
            return;
        }
    }

    private void initFbObject(final Context mContext) {
        //initilaize facebbok sdk
        FacebookSdk.sdkInitialize(mContext);
        FacebookSdk.setApplicationId(mContext.getResources().getString(R.string.facebook_app_id));

        callbackManager = CallbackManager.Factory.create();

        LoginManager.getInstance().logInWithReadPermissions((Activity)
                mContext, Arrays.asList("public_profile", "email"));
        //Facebook
        LoginManager.getInstance().registerCallback(callbackManager, new FacebookCallback<LoginResult>() {
            @Override
            public void onSuccess(LoginResult loginResult) {
                //showProgressDialog();

              //  et_Email.setText(""+loginResult);

                String userId = loginResult.getAccessToken().getUserId();
                accessTokan = loginResult.getAccessToken();

                try {
                    GraphRequest request = GraphRequest.newMeRequest(loginResult.getAccessToken(), new GraphRequest.GraphJSONObjectCallback() {
                        @Override
                        public void onCompleted(final JSONObject object, GraphResponse response) {
                            Log.i("LoginActivity", response.toString());
                            // Get facebook data from login

                            getFacebookData(object);

                            LoginManager.getInstance().logOut();

                        }
                    });
                    Bundle parameters = new Bundle();
                    parameters.putString("fields", "id,name,email,link,picture");
                    request.setParameters(parameters);
                    request.executeAsync();
                } catch (Exception e) {
                    Log.e(getClass().getName(), e.toString());
                  //  et_Email.setText("Exception "+e);
                }

            }

            @Override
            public void onCancel() {

               // et_Email.setText("onCancel");

            }

            @Override
            public void onError(FacebookException error) {
                Log.e("FacebookError", "" + error);
                //et_Email.setText("FB Error "+error);
            }
        });
    }




    /*get facebook data*/
    private String getFacebookData(JSONObject object) {
        try {
            if (object != null) {
                Log.e("fb_response", object.toString());

                String user_fullname = object.optString("name");
                String user_fb_id = object.optString("id");
                String user_email = object.optString("email");
                JSONObject jsonObject = object.optJSONObject("picture");
                JSONObject jobj = jsonObject.optJSONObject("data");
                String user_profile_pic = jobj.optString("url");


                MobileNumber = "";
                EmailId = user_email;
                Password = user_fb_id;

                callSignupApi(true);

                Log.e("RegistrationActivity>",object.toString());
                LoginManager.getInstance().logOut();
            }

        } catch (Exception e) {
            e.printStackTrace();
            //et_Email.setText("Exception getFBData "+e);

        }
        return "";
    }

}
