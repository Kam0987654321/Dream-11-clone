package com.ground11.g11;

import android.Manifest;
import android.app.AlertDialog;
import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.PackageManager;
import android.graphics.Typeface;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Build;
import android.os.Bundle;
import android.os.Environment;
import android.os.StrictMode;
import android.support.annotation.NonNull;
import android.support.design.widget.TabLayout;
import android.support.v4.app.ActivityCompat;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.content.ContextCompat;
import android.support.v4.content.FileProvider;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.view.Window;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.ground11.g11.APICallingPackage.Class.APIRequestManager;
import com.ground11.g11.APICallingPackage.Interface.ResponseManager;

import com.ground11.g11.FragmentBottomMenu.HomeFragment;
import com.ground11.g11.FragmentBottomMenu.MoreFragment;
import com.ground11.g11.FragmentBottomMenu.MyContestFragment;
import com.ground11.g11.FragmentBottomMenu.ProfileFragment;
import com.facebook.login.LoginManager;
import com.google.android.gms.auth.api.Auth;
import com.google.android.gms.auth.api.signin.GoogleSignInOptions;
import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.api.GoogleApiClient;
import com.google.android.gms.common.api.ResultCallback;
import com.google.android.gms.common.api.Status;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedInputStream;
import java.io.File;
import java.io.FileOutputStream;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.URL;
import java.net.URLConnection;
import java.util.ArrayList;
import java.util.List;

import static com.ground11.g11.APICallingPackage.Class.Validations.ShowToast;
import static com.ground11.g11.Config.UPDATEAPP;
import static com.ground11.g11.Constants.UPDATEAPPTYPE;

public class HomeActivity extends AppCompatActivity implements  GoogleApiClient.OnConnectionFailedListener,ResponseManager {

    private TabLayout tabLayout;
    private int[] tabIcons = {
            R.drawable.home_icon,
            R.drawable.my_contect_icon,
            R.drawable.profile_icon,
            R.drawable.more_icon
    };
    Context context;
    HomeActivity activity;
    private LinearLayout container;
    ResponseManager responseManager;
    APIRequestManager apiRequestManager;
    //Auto Login
    private SharedPreferences loginPreferences;
    private Boolean saveLogin;
    private SharedPreferences.Editor loginPrefsEditor;
    public static GoogleApiClient mGoogleApiClient;
    private TextView tv_HeaderName;
    RelativeLayout head;
    Typeface LatoBold,LatoRegular,Ravenscroft;
    public static SessionManager sessionManager;
    ImageView im_Notification,im_AppIcon;
    int progressStatus = 0;

    public static final int DIALOG_DOWNLOAD_PROGRESS = 0;
    private ProgressDialog pDialog;

    String[] permissions = new String[]{
            Manifest.permission.WRITE_EXTERNAL_STORAGE,
            Manifest.permission.READ_EXTERNAL_STORAGE
    };


    String APP_BACKUP_FOLDER = Environment.getExternalStorageDirectory()
            + File.separator + "Perfect11" + File.separator + "App";
     Dialog dialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);
        context = activity = this;
        sessionManager = new SessionManager();

        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);


        StrictMode.VmPolicy.Builder builder = new StrictMode.VmPolicy.Builder();
        StrictMode.setVmPolicy(builder.build());


        head = findViewById(R.id.head);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);
        im_Notification = findViewById(R.id.im_Notification);
        im_AppIcon=findViewById(R.id.im_AppIcon);

        Animation shake = AnimationUtils.loadAnimation(activity, R.anim.shake);
        im_Notification.startAnimation(shake);


        im_Notification.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(activity,NotificationActivity.class);
                startActivity(i);
            }
        });
        im_AppIcon.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(activity,AddCashActivity.class);
                startActivity(i);
            }
        });

        //tv_HeaderName.setText("");
        Ravenscroft = Typeface.createFromAsset(this.getAssets(),"Ravenscroft.ttf");
        //tv_HeaderName.setTypeface(Ravenscroft);
        String Name = sessionManager.getUser(context).getName();

        GoogleSignInOptions gso = new GoogleSignInOptions.Builder(GoogleSignInOptions.DEFAULT_SIGN_IN)
                .requestEmail()
                .build();

        mGoogleApiClient = new GoogleApiClient.Builder(this)
                .enableAutoManage(this, this)
                .addApi(Auth.GOOGLE_SIGN_IN_API, gso)
                .build();


        loginPreferences = getSharedPreferences("loginPrefs", MODE_PRIVATE);
        loginPrefsEditor = loginPreferences.edit();
        saveLogin = loginPreferences.getBoolean("saveLogin", false);


        tabLayout = findViewById(R.id.tabs);
        container = findViewById(R.id.fragment_container);
        setupTabIcons1();

        replaceFragment(new HomeFragment());

        tabLayout.setOnTabSelectedListener(
                new TabLayout.OnTabSelectedListener() {

                    @Override
                    public void onTabSelected(TabLayout.Tab tab) {
                        /*int tabIconColor = ContextCompat.getColor(activity, R.color.tabtextunselectednew);
                        tab.getIcon().setColorFilter(tabIconColor, PorterDuff.Mode.SRC_IN);*/

                        if (tab.getPosition() == 0) {
                            replaceFragment(new HomeFragment());
                            head.setVisibility(View.VISIBLE);
                        } else if (tab.getPosition() == 1) {
                            replaceFragment(new MyContestFragment());
                            head.setVisibility(View.VISIBLE);
                        } else if (tab.getPosition() == 2) {
                            replaceFragment(new ProfileFragment());
                            head.setVisibility(View.GONE);
                        } else {
                            replaceFragment(new MoreFragment());
                            head.setVisibility(View.VISIBLE);
                        }
                    }

                    @Override
                    public void onTabUnselected(TabLayout.Tab tab) {

                        /*int tabIconColor = ContextCompat.getColor(activity, R.color.tabtextunselected);
                        tab.getIcon().setColorFilter(tabIconColor, PorterDuff.Mode.SRC_IN);*/
                    }

                    @Override
                    public void onTabReselected(TabLayout.Tab tab) {

                    }
                }
        );

       callCheckUpdateVersion(true);

    }

    private void callCheckUpdateVersion(boolean isShowLoader) {
        try {
            apiRequestManager.callAPI(UPDATEAPP,
                    createRequestJson(), context, activity, UPDATEAPPTYPE,
                    isShowLoader, responseManager);
        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJson() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("user_id", "");

        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }
    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {
        if (type.equals(UPDATEAPPTYPE)){
            try {
                String Note = result.getString("note");
                String OldV = result.getString("old_version");
                String NewV = result.getString("new_version");
                String MobileVName = BuildConfig.VERSION_NAME;

                    if (!MobileVName.equals(NewV)){
                        Dialog(Note,"Update","What's new");
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
        String mes = message;
    }


    @Override
    protected Dialog onCreateDialog(int id) {
        switch (id) {
            case DIALOG_DOWNLOAD_PROGRESS:
                pDialog = new ProgressDialog(this);
                pDialog.setMessage("Downloading file..");
                pDialog.setProgressStyle(ProgressDialog.STYLE_HORIZONTAL);
                pDialog.setCancelable(false);
                pDialog.show();
                return pDialog;
            default:
                return null;
        }
    }


    public void Dialog(String UpdateNote, String UpdateorInstall, String WhatsnewHead){
        dialog = new Dialog(activity);
        dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);
        dialog.setContentView(R.layout.dialog_update);

        final TextView tv_DClose = dialog.findViewById(R.id.tv_DClose);
        final TextView tv_UpdateNote = dialog.findViewById(R.id.tv_UpdateNote);
        final TextView tv_UpdateApp = dialog.findViewById(R.id.tv_UpdateApp);
        final TextView tv_WhatsNewHead = dialog.findViewById(R.id.tv_WhatsNewHead);
        dialog.setCanceledOnTouchOutside(false);
        dialog.show();

        tv_UpdateNote.setText(UpdateNote);
        tv_UpdateApp.setText(UpdateorInstall);
        tv_WhatsNewHead.setText(WhatsnewHead);

        tv_DClose.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                dialog.dismiss();
            }
        });

        tv_UpdateApp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
           if (tv_UpdateApp.getText().toString().equals("Update")) {
               if (Build.VERSION.SDK_INT >= 23) {
                   int result;
                   List<String> listPermissionsNeeded = new ArrayList<>();
                   for (String p : permissions) {
                       result = ContextCompat.checkSelfPermission(activity, p);
                       if (result != PackageManager.PERMISSION_GRANTED) {
                           listPermissionsNeeded.add(p);
                       }
                   }
                   if (!listPermissionsNeeded.isEmpty()) {
                       ActivityCompat.requestPermissions(activity,
                               listPermissionsNeeded.toArray(
                                       new String[listPermissionsNeeded.size()]), 100);

                   } else {
                       new DownloadFileFromURL().execute("https://www.perfectteam11.com/perfect11/apk/apk.apk");
                   }
               } else {
                   new DownloadFileFromURL().execute("https://www.perfectteam11.com/perfect11/apk/apk.apk");
               }
           }
           else {
               File apk = new File(Environment.getExternalStorageDirectory().toString()
                       + "/Perfect11.apk");

               try {
                   Intent intent = new Intent(Intent.ACTION_VIEW);
                   intent.setFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP | Intent.FLAG_ACTIVITY_NEW_TASK);
                   if (Build.VERSION.SDK_INT >= 23) {
                       Uri photoURI = FileProvider.getUriForFile(activity,
                               activity.getApplicationContext().getPackageName()
                                       + ".provider", apk);

                       intent.setDataAndType(photoURI,
                               "application/vnd.android.package-archive");
                       intent.addFlags(Intent.FLAG_GRANT_READ_URI_PERMISSION);
                   } else {
                       intent.setDataAndType(Uri.fromFile(apk),
                               "application/vnd.android.package-archive");
                   }

                   startActivity(intent);
               } catch (Exception e) {
                   e.printStackTrace();
                   Toast.makeText(activity, "" + e.getMessage(), Toast.LENGTH_LONG).show();
               }
           }


            }
        });
    }

    private void setupTabIcons1() {

      /*  tabLayout.addTab(tabLayout.newTab().setText("HOME") );
        tabLayout.addTab(tabLayout.newTab().setText("MY CONTEST")  );
        tabLayout.addTab(tabLayout.newTab().setText("PROFILE")  );
        tabLayout.addTab(tabLayout.newTab().setText("MORE")  );*/

      /*  View headerView = ((LayoutInflater) getSystemService(Context.LAYOUT_INFLATER_SERVICE))
                .inflate(R.layout.custom_tab_layout, null, false);

        LinearLayout linearLayoutOne = (LinearLayout) headerView.findViewById(R.id.ll);
        LinearLayout linearLayout2 = (LinearLayout) headerView.findViewById(R.id.ll2);
        LinearLayout linearLayout3 = (LinearLayout) headerView.findViewById(R.id.ll3);
        LinearLayout linearLayout4 = (LinearLayout) headerView.findViewById(R.id.ll4);
        tabLayout.getTabAt(0).setCustomView(linearLayoutOne);
        tabLayout.getTabAt(1).setCustomView(linearLayout2);
        tabLayout.getTabAt(2).setCustomView(linearLayout3);
        tabLayout.getTabAt(3).setCustomView(linearLayout4);*/

        /*tabLayout.getTabAt(0).getIcon().setColorFilter(Color.parseColor("#ffff0000"), PorterDuff.Mode.SRC_IN);
        tabLayout.getTabAt(1).getIcon().setColorFilter(Color.parseColor("#626262"), PorterDuff.Mode.SRC_IN);
        tabLayout.getTabAt(2).getIcon().setColorFilter(Color.parseColor("#626262"), PorterDuff.Mode.SRC_IN);
        tabLayout.getTabAt(3).getIcon().setColorFilter(Color.parseColor("#626262"), PorterDuff.Mode.SRC_IN);*/
    }


    private void replaceFragment(Fragment fragment) {
        FragmentManager fragmentManager = getSupportFragmentManager();
        android.support.v4.app.FragmentTransaction transaction = fragmentManager.beginTransaction();
        transaction.replace(R.id.fragment_container, fragment);
        transaction.commit();
    }


    @Override
    public void onBackPressed() {
        AlertDialog.Builder ab = new AlertDialog.Builder(activity);
        ab.setPositiveButton("Exit", new DialogInterface.OnClickListener() {
            public void onClick(DialogInterface dialog, int id) {

                Intent intent = new Intent(Intent.ACTION_MAIN);
                intent.addCategory(Intent.CATEGORY_HOME);
                intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                startActivity(intent);
            }
        });
        ab.setNeutralButton("Logout", new DialogInterface.OnClickListener() {
            public void onClick(DialogInterface dialog, int id) {
                Logout();

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

    public void Logout(){

        LoginManager.getInstance().logOut();
        loginPrefsEditor.clear();
        loginPrefsEditor.commit();
        Auth.GoogleSignInApi.revokeAccess(mGoogleApiClient).setResultCallback(
                new ResultCallback<Status>() {
                    @Override
                    public void onResult(Status status) {

                    }
                });

        Intent i = new Intent(activity, MainActivity.class);
        startActivity(i);

    }


    @Override
    public void onConnectionFailed(@NonNull ConnectionResult connectionResult) {

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

        }
        return true;
    }
    @Override
    public void onRequestPermissionsResult(int requestCode, String permissions[], int[] grantResults) {
        if (requestCode == 100) {
            if (grantResults.length > 0
                    && grantResults[0] == PackageManager.PERMISSION_GRANTED) {

            }
            else {

            }
            return;
        }
    }



    class DownloadFileFromURL extends AsyncTask<String, String, String> {
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            dialog.dismiss();
            showDialog(DIALOG_DOWNLOAD_PROGRESS);
        }
        @Override
        protected String doInBackground(String... f_url) {
            int count;
            try {
                URL url = new URL(f_url[0]);
                URLConnection conection = url.openConnection();
                conection.connect();
                int lenghtOfFile = conection.getContentLength();
                InputStream input = new BufferedInputStream(url.openStream(), 8192);
                OutputStream output = new FileOutputStream(
                        Environment.getExternalStorageDirectory().toString()+"/Perfect11.apk");
                byte data[] = new byte[1024];
                long total = 0;
                while ((count = input.read(data)) != -1) {
                    total += count;
                    publishProgress(""+(int)((total*100)/lenghtOfFile));
                    output.write(data, 0, count);
                }
                output.flush();
                output.close();
                input.close();

            } catch (Exception e) {
                Log.e("Error: ", e.getMessage());
            }

            return null;
        }
        protected void onProgressUpdate(String... progress) {
            pDialog.setProgress(Integer.parseInt(progress[0]));
        }
        @Override
        protected void onPostExecute(String file_url) {
            dismissDialog(DIALOG_DOWNLOAD_PROGRESS);
            String imagePath = Environment.getExternalStorageDirectory().toString()+"/Perfect.apk";
            ShowToast(activity,""+imagePath);
            Dialog("Your Update is ready to install","Install","Install App");
        }

    }
}


