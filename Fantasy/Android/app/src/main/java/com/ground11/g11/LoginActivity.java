package com.indian11.app;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.os.Handler;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.view.WindowManager;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.google.firebase.iid.FirebaseInstanceId;
import com.indian11.app.APICallingPackage.Class.APIRequestManager;
import com.indian11.app.APICallingPackage.Class.Validations;
import com.indian11.app.APICallingPackage.Interface.ResponseManager;
import com.indian11.app.Bean.UserDetails;
import com.indian11.app.ForgotPasswordPackage.ForgotVerifyOTPActivity;
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


import org.json.JSONException;
import org.json.JSONObject;

import java.util.Arrays;

import static com.indian11.app.APICallingPackage.Class.Validations.ShowToast;
import static com.indian11.app.Config.LOGIN;
import static com.indian11.app.Config.SIGNUP;
import static com.indian11.app.Constants.LOGINTYPE;
import static com.indian11.app.Constants.SIGNUPTYPE;

public class LoginActivity extends AppCompatActivity implements ResponseManager, GoogleApiClient.OnConnectionFailedListener {

    ResponseManager responseManager;
    APIRequestManager apiRequestManager;

    Context context;
    LoginActivity activity;

    EditText et_EmailMobile,et_Password;
    TextView tv_LoginNext,tv_Login,tv_UserEmailMob,tv_HeaderName,tv_LFacebookLogin,tv_LGoogleLogin
            ,tv_ForgotPassword;
    LinearLayout LL_LRegister;
    RelativeLayout RL_EnterEmail,RL_EnterPassword;
    String EmailorMobile,Password;

    ImageView im_back;

    LoginButton fb_login_button;
    CallbackManager callbackManager;
    AccessToken accessTokan;

    private final String TAG = "RegistrationActivity";
    private static final int RC_SIGN_IN = 007;
    private GoogleApiClient mGoogleApiClient;
    private SignInButton btnSignIn;

    String SEmailId,SPassword,SLoginType;

//Auto Login
    private SharedPreferences loginPreferences;
    private Boolean saveLogin;
    private SharedPreferences.Editor loginPrefsEditor;


    String Back = "0";
    SessionManager sessionManager;

    //redefining it solutions beyond your imagination


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        callbackManager = CallbackManager.Factory.create();
        setContentView(R.layout.activity_login);
        this.getWindow().setSoftInputMode(WindowManager.LayoutParams.SOFT_INPUT_STATE_ALWAYS_HIDDEN);
        context = activity = this;
        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);
        sessionManager = new SessionManager();
        initViews();


        loginPreferences = getSharedPreferences("loginPrefs", MODE_PRIVATE);
        loginPrefsEditor = loginPreferences.edit();
        saveLogin = loginPreferences.getBoolean("saveLogin", false);


        tv_LoginNext.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                EmailorMobile = et_EmailMobile.getText().toString();

                if (EmailorMobile.equals("")){
                    ShowToast(context,"Enter Email or Mobile");
                }else if (EmailorMobile.contains("@")) {
                        if (!Validations.isValidEmail(EmailorMobile)) {
                            et_EmailMobile.requestFocus();
                            ShowToast(context, "Enter Valid Email Id");
                        } else {
                            Back = "1";
                            RL_EnterEmail.setVisibility(View.GONE);
                            RL_EnterPassword.setVisibility(View.VISIBLE);
                            tv_UserEmailMob.setText(EmailorMobile);
                        }
                    } else if (TextUtils.isDigitsOnly(EmailorMobile)) {
                        if (!EmailorMobile.matches(Validations.MobilePattern)) {
                            et_EmailMobile.requestFocus();
                            ShowToast(context, "Enter Valid Mobile Number");
                        }
                        else {
                            Back = "1";
                            RL_EnterEmail.setVisibility(View.GONE);
                            RL_EnterPassword.setVisibility(View.VISIBLE);
                            tv_UserEmailMob.setText(EmailorMobile);
                        }
                    }
                    else {
                        et_EmailMobile.requestFocus();
                        ShowToast(context, "Enter Valid Mobile Number or Email");
                    }
            }
        });


        tv_Login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Password = et_Password.getText().toString();

                if (Password.equals("")){

                    ShowToast(context,"Enter Password");
                }
                else if (Password.length()<8&& !Validations.isValidPassword(Password)){

                    ShowToast(context,"Password Pattern Not Macthed");
                }
                else {
                    SLoginType = "Normal";
                    callLoginApi(true);

                }
            }
        });

        tv_ForgotPassword.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                EmailorMobile = et_EmailMobile.getText().toString();
                String type= "";
                if (EmailorMobile.contains("@")) {
                   type = "Email";
                        }
                 else if (TextUtils.isDigitsOnly(EmailorMobile)) {
                    type = "Number";
                }
                Intent i = new Intent(activity, ForgotVerifyOTPActivity.class);
                i.putExtra("type",type);
                i.putExtra("EmailorMobile",EmailorMobile);
                startActivity(i);
            }
        });

        LL_LRegister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(activity,RegistrationActivity.class);
                i.putExtra("Reffered","No");
                startActivity(i);
            }
        });
        tv_LFacebookLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                SLoginType = "Email";
                //fb_login_button.performClick();
                initFbObject(context);
            }
        });

        tv_LGoogleLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                SLoginType = "Email";
                Intent signInIntent = Auth.GoogleSignInApi.getSignInIntent(mGoogleApiClient);
                startActivityForResult(signInIntent, RC_SIGN_IN);
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


    }

    public void initViews(){

        et_EmailMobile = findViewById(R.id.et_EmailMobile);
        et_Password =  findViewById(R.id.et_Password);;
        tv_LoginNext =  findViewById(R.id.tv_LoginNext);;
        tv_Login =  findViewById(R.id.tv_Login);

        RL_EnterEmail = findViewById(R.id.RL_EnterEmail);
        RL_EnterPassword = findViewById(R.id.RL_EnterPassword);
        tv_UserEmailMob = findViewById(R.id.tv_UserEmailMob);
        LL_LRegister = findViewById(R.id.LL_LRegister);
        tv_LGoogleLogin = findViewById(R.id.tv_LGoogleLogin);
        tv_LFacebookLogin = findViewById(R.id.tv_LFacebookLogin);
        tv_ForgotPassword = findViewById(R.id.tv_ForgotPassword);
        fb_login_button = findViewById(R.id.fb_login_button);
        btnSignIn =  findViewById(R.id.btn_sign_in);

        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);
        tv_HeaderName.setText("LOG IN");
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                onBackPressed();
            }
        });

    }


    private void callLoginApi(boolean isShowLoader) {
        try {

            apiRequestManager.callAPI(LOGIN,
                    createRequestJson(), context, activity, LOGINTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJson() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("mobile", EmailorMobile);
            jsonObject.put("password", Password);
            jsonObject.put("type",SLoginType );
            jsonObject.put("token", FirebaseInstanceId.getInstance().getToken());

        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }



    private void callSignupApi(boolean isShowLoader) {
        try {
            apiRequestManager.callAPI(SIGNUP,
                    createRequestJsonSignUp(), context, activity, SIGNUPTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJsonSignUp() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("mobile", "");
            jsonObject.put("email", SEmailId);
            jsonObject.put("password", SPassword);
            jsonObject.put("code", "");
            jsonObject.put("type", SLoginType);
        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }



    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {
            Validations.showProgress(context);
        if (type.equals(LOGINTYPE)){
            String Verify = "0";
            String MobNumber = "";
            String UserId = "";

            Log.e("MainActivity>>", "getResult: >>>"+ result+"\n"+type);
            //ShowToast(context,message);

            try {
                Verify = result.getString("verify");
                MobNumber = result.getString("mobile");
                UserId = result.getString("user_id");

                if (Verify.equals("0")){
                    Validations.hideProgress();
                    et_EmailMobile.setText("");
                    et_Password.setText("");
                    Intent i = new Intent(activity, VerifyOTPActivity.class);
                    i.putExtra("Number", MobNumber);
                    i.putExtra("Activity", "Login");
                    i.putExtra("UserId", UserId);
                    i.putExtra("Password", Password);
                    startActivity(i);

                }
                else {
                    Validations.hideProgress();
                    loginPrefsEditor.putBoolean("saveLogin", true);
                    loginPrefsEditor.commit();

                    UserDetails userDetails = new UserDetails();
                    userDetails.setUser_id(UserId);
                    userDetails.setName(result.getString("name"));
                    userDetails.setMobile(result.getString("mobile"));
                    userDetails.setEmail(result.getString("email"));
                    userDetails.setType(result.getString("type"));
                    userDetails.setReferral_code(result.getString("referral_code"));
                    userDetails.setImage(result.getString("image"));
                    userDetails.setAddress(result.getString("address"));
                    userDetails.setCity(result.getString("city"));
                    userDetails.setPincode(result.getString("pincode"));
                    userDetails.setState(result.getString("state"));
                    userDetails.setVerify(Verify);
                    sessionManager.setUser(context, userDetails);
                    et_EmailMobile.setText("");
                    et_Password.setText("");
                    Intent i = new Intent(activity, HomeActivity.class);
                    startActivity(i);
                }
            }
            catch (Exception e){
                e.printStackTrace();
            }

        }
    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    @Override
    public void onError(Context mContext, String type, String message) {
        if (type.equals(LOGINTYPE)){
            ShowToast(context,message);
            try {
                LoginManager.getInstance().logOut();
            }
            catch (Exception e){
                e.printStackTrace();
            }
            try {
                revokeAccess();
            }
            catch (Exception e){
                e.printStackTrace();
            }
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
                                String ProfileUrl = object.getJSONObject("picture").
                                        getJSONObject("data").getString("url");
                                String Id = json.getString("id");
                                //  String gender = json.getString("gender");
                                String Fname = json.getString("first_name");
                                String Lname = json.getString("last_name");
                                String FBEmail = json.getString("email");

                                EmailorMobile = FBEmail;
                                Password = Id;

                                callLoginApi(true);
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
        Auth.GoogleSignInApi.revokeAccess(mGoogleApiClient).setResultCallback(
                new ResultCallback<Status>() {
                    @Override
                    public void onResult(Status status) {
                        // updateUI(false);
                    }
                });
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

            EmailorMobile = email;
            Password = Id;
            callLoginApi(true);
            Log.e(TAG, "Name: " + personName + ", email: " + email
                    + ", Image: " /*personPhotoUrl*/);

            //updateUI(true);
        } else {
            // Signed out, show unauthenticated UI.
            //updateUI(false);
        }
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


        callbackManager.onActivityResult(requestCode, resultCode, data);
        Validations.showProgress(context);
        final Handler handler = new Handler();
        handler.postDelayed(new Runnable() {
            @Override
            public void run() {
                Validations.hideProgress();
            }
        }, 6000);

    }

    @Override
    public void onBackPressed() {
        if (Back.equals("1")){
            Back = "0";
            RL_EnterEmail.setVisibility(View.VISIBLE);
            RL_EnterPassword.setVisibility(View.GONE);
        }
        else {
            super.onBackPressed();
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
                String userId = loginResult.getAccessToken().getUserId();
                accessTokan = loginResult.getAccessToken();

                try {
                    GraphRequest request = GraphRequest.newMeRequest(loginResult
                            .getAccessToken(), new GraphRequest.GraphJSONObjectCallback() {
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
                }

            }

            @Override
            public void onCancel() {

            }

            @Override
            public void onError(FacebookException error) {
                Log.e("FacebookError", "" + error);
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


                EmailorMobile = user_email;
                Password = user_fb_id;

                callLoginApi(true);
                Log.e("RegistrationActivity>",object.toString());
                LoginManager.getInstance().logOut();
            }

        } catch (Exception e) {
            e.printStackTrace();

        }
        return "";
    }


}
