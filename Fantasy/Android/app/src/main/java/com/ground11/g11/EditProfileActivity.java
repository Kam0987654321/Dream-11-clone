package com.ground11.g11;

import android.app.DatePickerDialog;
import android.content.Context;
import android.content.SharedPreferences;
import android.graphics.drawable.ColorDrawable;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.view.WindowManager;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;

import com.ground11.g11.APICallingPackage.Class.APIRequestManager;
import com.ground11.g11.APICallingPackage.Interface.ResponseManager;
import com.ground11.g11.Bean.UserDetails;

import org.json.JSONException;
import org.json.JSONObject;

import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;

import com.ground11.g11.APICallingPackage.Class.Validations;

import static com.ground11.g11.Config.EDITPROFILE;
import static com.ground11.g11.Config.VIEWPROFILE;

public class EditProfileActivity extends AppCompatActivity implements ResponseManager {

    ResponseManager responseManager;
    APIRequestManager apiRequestManager;

    Context context;
    EditProfileActivity activity;
    ImageView im_back;
    TextView tv_HeaderName;
    SessionManager sessionManager;

    EditText et_EditName,et_EditEmail,et_EditMobile,et_EditDob
            ,et_EditAddress,et_EditCity,et_EditPincode,et_EditState
            ,et_EditCountry,et_EditFavouriteTeam;
    TextView tv_EditMale,tv_EditFeMale,tv_EditUpdateProfile;

    String name,mobile,email,image,teamName,favriteTeam,dob,gender
            ,address,city,pincode,state,country;
    private SharedPreferences loginPreferences;
    private Boolean saveLogin;
    private SharedPreferences.Editor loginPrefsEditor;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit_profile);
        context = activity = this;
        initViews();
        sessionManager = new SessionManager();
        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);
        loginPreferences = getSharedPreferences("loginPrefs", MODE_PRIVATE);
        loginPrefsEditor = loginPreferences.edit();
        this.getWindow().setSoftInputMode(WindowManager.LayoutParams.SOFT_INPUT_STATE_ALWAYS_HIDDEN);

        callViewProfile(true);

        et_EditDob.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                final Calendar calendar = Calendar.getInstance();
                int year = calendar.get(Calendar.YEAR);
                int month = calendar.get(Calendar.MONTH);
                int day = calendar.get(Calendar.DAY_OF_MONTH);

                DatePickerDialog dialog = new DatePickerDialog(activity,
                        android.R.style.Theme_Holo_Light_Dialog_NoActionBar,
                        new mdateListner(), year, month, day);
                dialog.getWindow().setBackgroundDrawable(new ColorDrawable(getResources().getColor(android.R.color.transparent)));
                dialog.show();
            }
        });

        tv_EditMale.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                gender = "male";
                tv_EditMale.setBackgroundResource(R.drawable.dark_rectangle);
                tv_EditFeMale.setBackgroundResource(R.drawable.white_rectangle);
            }
        });
        tv_EditFeMale.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                gender = "female";
                tv_EditFeMale.setBackgroundResource(R.drawable.dark_rectangle);
                tv_EditMale.setBackgroundResource(R.drawable.white_rectangle);
            }
        });

        tv_EditUpdateProfile.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                callEditProfile(true);
            }
        });
    }
    public void initViews() {

        et_EditName = findViewById(R.id.et_EditName);
        et_EditEmail = findViewById(R.id.et_EditEmail);
        et_EditMobile = findViewById(R.id.et_EditMobile);
        et_EditDob = findViewById(R.id.et_EditDob);
        et_EditAddress = findViewById(R.id.et_EditAddress);
        et_EditCity = findViewById(R.id.et_EditCity);
        et_EditPincode = findViewById(R.id.et_EditPincode);
        et_EditState = findViewById(R.id.et_EditState);
        et_EditCountry = findViewById(R.id.et_EditCountry);
        tv_EditMale = findViewById(R.id.tv_EditMale);
        tv_EditFeMale = findViewById(R.id.tv_EditFeMale);
        et_EditFavouriteTeam = findViewById(R.id.et_EditFavouriteTeam);
        tv_EditUpdateProfile = findViewById(R.id.tv_EditUpdateProfile);

        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);

        tv_HeaderName.setText("PERSONAL DETAILS");
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                onBackPressed();
            }
        });


        et_EditCountry.setText("India");
        et_EditCountry.setEnabled(false);
        et_EditCountry.setFocusable(false);

    }

    private void callViewProfile(boolean isShowLoader) {
        try {

            apiRequestManager.callAPI(VIEWPROFILE,
                    createRequestJson(), context, activity, Constants.VIEWPROFILETYPE,
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

    private void callEditProfile(boolean isShowLoader) {
        try {

            apiRequestManager.callAPI(EDITPROFILE,
                    createEditProfileJson(), context, activity, Constants.EDITPROFILETYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createEditProfileJson() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("user_id", sessionManager.getUser(context).getUser_id());
            jsonObject.put("name", et_EditName.getText().toString());
            jsonObject.put("mobile", et_EditMobile.getText().toString());
            jsonObject.put("favriteTeam", et_EditFavouriteTeam.getText().toString());
            jsonObject.put("dob", et_EditDob.getText().toString());
            jsonObject.put("gender", gender);
            jsonObject.put("address", et_EditAddress.getText().toString());
            jsonObject.put("city", et_EditCity.getText().toString());
            jsonObject.put("state", et_EditState.getText().toString());
            jsonObject.put("country", et_EditCountry.getText().toString());
            jsonObject.put("pincode", et_EditPincode.getText().toString());

        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }


    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {

        if (type.equals(Constants.EDITPROFILETYPE)){

            Validations.ShowToast(context,message);
            loginPrefsEditor.putBoolean("saveLogin", true);
            loginPrefsEditor.commit();
            UserDetails userDetails = new UserDetails();
            userDetails.setUser_id(sessionManager.getUser(context).getUser_id());
            userDetails.setName(et_EditName.getText().toString());
            userDetails.setMobile(et_EditMobile.getText().toString());
            userDetails.setEmail(sessionManager.getUser(context).getEmail());
            userDetails.setType(sessionManager.getUser(context).getType());
            userDetails.setReferral_code(sessionManager.getUser(context).getReferral_code());
            userDetails.setImage(sessionManager.getUser(context).getImage());
            userDetails.setAddress(et_EditAddress.getText().toString());
            userDetails.setCity(et_EditCity.getText().toString());
            userDetails.setPincode(et_EditPincode.getText().toString());
            userDetails.setState(et_EditState.getText().toString());
            userDetails.setVerify("1");
            sessionManager.setUser(context, userDetails);
            onBackPressed();
            finish();
        }
        else {
            try {
                name = result.getString("name");
                mobile = result.getString("mobile");
                email = result.getString("email");
                image = result.getString("image");
                teamName = result.getString("teamName");
                favriteTeam = result.getString("favriteTeam");
                dob = result.getString("dob");
                gender = result.getString("gender");
                address = result.getString("address");
                city = result.getString("city");
                pincode = result.getString("pincode");
                state = result.getString("state");
                country = result.getString("country");




                if (name.equals("")) {

                } else {
                    et_EditName.setText(name);
                }
                et_EditEmail.setText(email);
                et_EditMobile.setText(mobile);
                et_EditFavouriteTeam.setText(favriteTeam);
                et_EditDob.setText(dob);
                et_EditAddress.setText(address);
                et_EditCity.setText(city);
                et_EditState.setText(state);
                et_EditPincode.setText(pincode);

                if (gender.equals("male")) {
                    tv_EditMale.setBackgroundResource(R.drawable.dark_rectangle);
                    tv_EditFeMale.setBackgroundResource(R.drawable.white_rectangle);
                } else if (gender.equals("female")) {
                    tv_EditFeMale.setBackgroundResource(R.drawable.dark_rectangle);
                    tv_EditMale.setBackgroundResource(R.drawable.white_rectangle);
                }

                if (!email.equals("")) {
                    et_EditEmail.setEnabled(false);
                    et_EditEmail.setFocusable(false);
                }
                if (!mobile.equals("")) {
                    et_EditMobile.setEnabled(false);
                    et_EditMobile.setFocusable(false);
                }


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

    }



    class mdateListner implements DatePickerDialog.OnDateSetListener {

        @Override
        public void onDateSet(DatePicker view, int year, int month, int dayOfMonth) {

            {

                int actualMonth = month+1;
                Date d = new Date(year, actualMonth,dayOfMonth);
                Calendar cal = Calendar.getInstance();
                cal.setTimeInMillis(0);
                cal.set(year, month, dayOfMonth, 0, 0, 0);
                Date chosenDate = cal.getTime();
                SimpleDateFormat dateFormat = new SimpleDateFormat("dd-MM-yyyy");
                String df_medium_us_str = dateFormat.format(chosenDate);

                //Str_date=etDOB.getText().toString();
                SimpleDateFormat simpledateformat = new SimpleDateFormat("EEEE");
                Date date = new Date(year, month, dayOfMonth-1);
                String dayOfWeek = simpledateformat.format(date);
                et_EditDob.setText(df_medium_us_str );
            }

        }
    }
}
