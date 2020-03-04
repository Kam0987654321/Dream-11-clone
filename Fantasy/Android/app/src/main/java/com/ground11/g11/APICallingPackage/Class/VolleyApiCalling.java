package com.indian11.app.APICallingPackage.Class;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.util.Log;

import com.android.volley.AuthFailureError;
import com.android.volley.DefaultRetryPolicy;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.indian11.app.APICallingPackage.Interface.ServerResponseListner;
import com.indian11.app.APICallingPackage.Interface.VolleyRestClient;

import org.json.JSONArray;
import org.json.JSONObject;

import java.io.File;
import java.util.HashMap;
import java.util.Map;

import static com.indian11.app.Config.Authentication;


public class VolleyApiCalling extends Activity implements VolleyRestClient {


    String status,message,errorcode;
    JSONObject jsonObject;


    @Override
    public void callGetRestApi(String url, Context mContext,
                               Activity activity, final String type,
                               final ServerResponseListner serverResponseListner, boolean isShowProgress) {

    }



    @Override
    public void callRestApi(String url, final JSONObject jsonObject, final Context mContext,
                            final Activity activity, final String type,
                            final ServerResponseListner serverResponseListner,
                            final boolean isShowProgress) {

        Log.e(String.valueOf(activity),"URL:>>>> "+url );
        Log.e(String.valueOf(activity),"Request:>>>> "+jsonObject);


        if (Validations.isNetworkAvailable(mContext)) {

            if (isShowProgress)
                Validations.showProgress(mContext);
            final StringRequest stringRequest = new StringRequest(Request.Method.POST,
                    url,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String result) {

                            if (isShowProgress)
                            Validations.hideProgress();

                            Log.e(String.valueOf(activity), "Result:>>>"+result);
                            try {


                                if (null != result) {

                                    JSONObject obj = new JSONObject(result);
                                    if (obj.has("responsecode")) {
                                        errorcode = obj.optString("responsecode");
                                    }

                                    if (obj.has("message")) {
                                        message = obj.optString("message");
                                    }
                                    if (obj.has("status")) {
                                        status = obj.optString("status");
                                    }
                                if (status.equals("success")){
                                    if (obj.has("data")){

                                        Object isjson = obj.get("data");

                                        if (isjson instanceof JSONObject) {
                                            JSONObject dataobject = obj.getJSONObject("data");
                                            serverResponseListner.onSucess(dataobject, type, message);

                                        } else if (isjson instanceof JSONArray) {
                                            JSONArray dataobject = obj.getJSONArray("data");
                                            serverResponseListner.onSucess(obj, type, message);
                                            /*if (dataobject.length() != 0) {
                                               *//* JSONObject jObject = new JSONObject();
                                                jObject.put("Message", message);*//*
                                                serverResponseListner.onSucess(obj, type, message);
                                            } else {

                                                serverResponseListner.onError(message, type);

                                            }*/


                                        }else if (isjson instanceof String){
                                            JSONObject jsonObject1 = new JSONObject();
                                            jsonObject1.put("data",isjson);
                                            serverResponseListner.onSucess(jsonObject1, type, message);
                                        }
                                    } else {

                                        serverResponseListner.onError(message, type);
                                    }
                                }
                                else {
                                    serverResponseListner.onError(message,type);
                                }


                                   // serverResponseListner.onSucess(obj, type, "Success");
                                }
                            } catch (Exception e) {
                                e.printStackTrace();
                                serverResponseListner.onError(e.toString(), type);
                                Log.e(String.valueOf(activity), e.toString());
                            }
                        }
                    },
                    new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {
                            error.printStackTrace();
                            if (isShowProgress)
                            Validations.hideProgress();
                            serverResponseListner.onError(error.toString(), type);
                            Log.e(String.valueOf(activity), error.toString());

                        }
                    }) {
                @Override
                public byte[] getBody() throws com.android.volley.AuthFailureError {
                    String str = String.valueOf(jsonObject);
                    return str.getBytes();
                }

                public String getBodyContentType() {
                    return "application/json; charset=utf-8";
                }

                @Override
                public Map<String, String> getHeaders() throws AuthFailureError {
                    Map<String, String> headers = new HashMap<String, String>();
                    headers.put("Authentication", Authentication);
                    return headers;
                }

            };
            RequestQueue requestQueue = Volley.newRequestQueue(mContext);
            stringRequest.setRetryPolicy(new DefaultRetryPolicy(20000,
                    DefaultRetryPolicy.DEFAULT_MAX_RETRIES,
                    DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
            stringRequest.setShouldCache(true);
            requestQueue.add(stringRequest);

        }
        else {
            serverResponseListner.onError("Please Check Network Connection", type);
            //ShowToast(mContext, "Please Check Network Connection");
        }


    }

    @Override
    public void calluploadImageApi(Context mContext, String url, File imagefile, String sessionKey, String section, String entityGuid, String caption, String type, ServerResponseListner serverResponseListner) {

    }

    @Override
    public void callBackmanager(int requestcode, int resultcode, Intent data) {

    }

    @Override
    public void onPointerCaptureChanged(boolean hasCapture) {

    }
}
