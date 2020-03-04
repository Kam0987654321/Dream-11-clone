package com.indian11.app.MyAccount;

import android.Manifest;
import android.app.DatePickerDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Bitmap;
import android.graphics.drawable.ColorDrawable;
import android.net.Uri;
import android.os.Build;
import android.os.Bundle;
import android.provider.MediaStore;
import android.support.v4.app.ActivityCompat;
import android.support.v4.content.ContextCompat;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.util.Base64;
import android.util.Log;
import android.view.View;
import android.view.WindowManager;
import android.widget.ArrayAdapter;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;

import com.indian11.app.APICallingPackage.Class.APIRequestManager;
import com.indian11.app.APICallingPackage.Interface.ResponseManager;
import com.indian11.app.R;
import com.indian11.app.SessionManager;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.ByteArrayOutputStream;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.List;

import com.indian11.app.APICallingPackage.Class.Validations;
import com.indian11.app.Constants;

import static com.indian11.app.Config.UPLOADDOUCMENT;

public class UploadKYCActivity extends AppCompatActivity implements ResponseManager {

    UploadKYCActivity activity;
    Context context;
    ResponseManager responseManager;
    APIRequestManager apiRequestManager;
    ImageView im_back;
    TextView tv_HeaderName;
    SessionManager sessionManager;

    TextView tv_Upload,tv_EtDocNameBottomText,tv_EtDocNumberBottomText,tv_EtDocDobBottomText,
            tv_EtDocStateBottomText,tv_SubmitForVerification,tv_VerifyHead;
    EditText et_DocName,et_DocNumber,et_DocDob,et_DocState;


    String[] permissions = new String[]{
            Manifest.permission.CAMERA,
            Manifest.permission.WRITE_EXTERNAL_STORAGE,
            Manifest.permission.READ_EXTERNAL_STORAGE
    };
    int PICK_IMAGE_GALLERY  = 100;
    int PICK_IMAGE_CAMERA = 101;
    ImageView im_ImagePreview;
    Bitmap bitmap;

    String UserName, DocNumber, DateofBirth, State;
    String PanOrAadhaar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_upload_kyc);
        this.getWindow().setSoftInputMode(WindowManager.LayoutParams.SOFT_INPUT_STATE_ALWAYS_HIDDEN);
        context = activity = this;
        initViews();
        sessionManager = new SessionManager();
        responseManager = this;
        apiRequestManager = new APIRequestManager(activity);

        PanOrAadhaar = getIntent().getStringExtra("DocType");



        if (PanOrAadhaar.equals("Pan")){
            tv_EtDocNameBottomText.setText("As on pan card");
            tv_VerifyHead.setText("VERIFY YOUR PAN");
            et_DocNumber.setHint("PAN Number");
            tv_EtDocNumberBottomText.setText("10 Digit pan no.");

        }
        else {
            tv_EtDocNameBottomText.setText("As on aadhaar card");
            tv_VerifyHead.setText("VERIFY YOUR AADHAAR");
            et_DocNumber.setHint("Aadhaar Number");
            tv_EtDocNumberBottomText.setText("10 Digit aadhaar no.");
        }


        tv_Upload.setOnClickListener(new View.OnClickListener() {
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

        et_DocDob.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                final Calendar calendar = Calendar.getInstance();
                int year = calendar.get(Calendar.YEAR);
                int month = calendar.get(Calendar.MONTH);
                int day = calendar.get(Calendar.DAY_OF_MONTH);

                DatePickerDialog dialog = new DatePickerDialog(activity,
                        android.R.style.Theme_Holo_Light_Dialog_NoActionBar,
                        new mdateListner(), year, month, day);
                dialog.getWindow().setBackgroundDrawable(new ColorDrawable(getResources()
                        .getColor(android.R.color.transparent)));
                dialog.show();
            }
        });






        tv_SubmitForVerification.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                UserName = et_DocName.getText().toString();
                DocNumber = et_DocNumber.getText().toString();
                DateofBirth = et_DocDob.getText().toString();
                State = et_DocState.getText().toString();
                if (bitmap==null){
                    Validations.ShowToast(activity,"Please select image");
                }
                else if (UserName.equals("")){
                    Validations.ShowToast(activity,"Please Enter Name");
                }
                else if (DocNumber.equals("")){
                    Validations.ShowToast(activity,"Please Enter Document Number");
                }
                else if (DateofBirth.equals("")){
                    Validations.ShowToast(activity,"Please Enter Document Number");
                }
                else if (State.equals("")){
                    Validations.ShowToast(activity,"Please Enter State Name");
                }
                else {
                    callUploadDoc(true);
                }

            }
        });

    }

    public void initViews() {
        tv_Upload = findViewById(R.id.tv_Upload);
        im_ImagePreview = findViewById(R.id.im_ImagePreview);

        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);

        tv_HeaderName.setText("UPLOAD DOCUMENT");
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                onBackPressed();
            }
        });

        tv_EtDocNameBottomText = findViewById(R.id.tv_EtDocNameBottomText);
        tv_EtDocNumberBottomText = findViewById(R.id.tv_EtDocNumberBottomText);
        tv_EtDocDobBottomText = findViewById(R.id.tv_EtDocDobBottomText);
        tv_EtDocStateBottomText = findViewById(R.id.tv_EtDocStateBottomText);
        tv_SubmitForVerification = findViewById(R.id.tv_SubmitForVerification);
        tv_VerifyHead = findViewById(R.id.tv_VerifyHead);

        et_DocName = findViewById(R.id.et_DocName);
        et_DocNumber = findViewById(R.id.et_DocNumber);
        et_DocDob = findViewById(R.id.et_DocDob);
        et_DocState = findViewById(R.id.et_DocState);

    }

    private void callUploadDoc(boolean isShowLoader) {
        try {
            apiRequestManager.callAPI(UPLOADDOUCMENT,
                    createRequestJson(), context, activity, Constants.UPLOADDOCUMENTTYPE,
                    isShowLoader, responseManager);
        } catch (JSONException e) {
            e.printStackTrace();
        }
    }
    JSONObject createRequestJson() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("user_id", sessionManager.getUser(context).getUser_id());
            jsonObject.put("name", UserName);
            jsonObject.put("document_number", DocNumber);
            jsonObject.put("state", DateofBirth);
            jsonObject.put("dob", State);
            jsonObject.put("type", PanOrAadhaar);
            jsonObject.put("document", getStringImage(bitmap));
        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }



    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {
        Validations.ShowToast(activity,""+message);
        Intent i  = new Intent(activity,MyAccountActivity.class);
        startActivity(i);
        finish();
    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    @Override
    public void onError(Context mContext, String type, String message) {
        Validations.ShowToast(activity,""+message);
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
            result = ContextCompat.checkSelfPermission(this, p);
            if (result != PackageManager.PERMISSION_GRANTED) {
                listPermissionsNeeded.add(p);
            }
        }
        if (!listPermissionsNeeded.isEmpty()) {
            ActivityCompat.requestPermissions(this,
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

    class mdateListner implements DatePickerDialog.OnDateSetListener {
        @Override
        public void onDateSet(DatePicker view, int year, int month, int dayOfMonth) {
            {int actualMonth = month+1;
                Date d = new Date(year, actualMonth,dayOfMonth);
                Calendar cal = Calendar.getInstance();
                cal.setTimeInMillis(0);
                cal.set(year, month, dayOfMonth, 0, 0, 0);
                Date chosenDate = cal.getTime();
                SimpleDateFormat dateFormat = new SimpleDateFormat("dd-MM-yyyy");
                String df_medium_us_str = dateFormat.format(chosenDate);
                SimpleDateFormat simpledateformat = new SimpleDateFormat("EEEE");
                Date date = new Date(year, month, dayOfMonth-1);
                String dayOfWeek = simpledateformat.format(date);
                et_DocDob.setText(df_medium_us_str );}
        }
    }
}
