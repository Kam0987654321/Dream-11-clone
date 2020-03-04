package com.indian11.app.APICallingPackage.Interface;

import android.content.Context;

import org.json.JSONObject;


public interface ResponseManager {

    public void getResult(Context mContext, String type, String message, JSONObject result);
    public void getResult2(Context mContext, String type, String message, JSONObject result);
    public void onError(Context mContext, String type, String message);

}
