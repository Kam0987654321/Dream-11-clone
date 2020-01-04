package com.ground11.g11;

import android.content.Context;
import android.content.SharedPreferences;

import com.ground11.g11.Bean.UserDetails;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import java.lang.reflect.Type;

/**
 * Created by telasol1 on 23-Oct-18.
 */

public class SessionManager {

    static String User = "User";
    static String Answer = "Answer";
    static String session = "session";
    static String image="image";
    private static SharedPreferences.Editor prefsEditor;


    public UserDetails getUser(Context mContext) {
        SharedPreferences pref = mContext.getSharedPreferences(User, Context.MODE_PRIVATE);
        String userJSONString = pref.getString("users", "");
        if (userJSONString == null)
            return null;
        Type type = new TypeToken<UserDetails>() {
        }.getType();
        UserDetails user = new Gson().fromJson(userJSONString, type);
        return user;
    }

    public void setUser(Context mContext, UserDetails user) {
        SharedPreferences pref = mContext.getSharedPreferences(User, Context.MODE_PRIVATE);
        prefsEditor = pref.edit();
        if (user == null)
            prefsEditor.putString("users", null);
        else {
            String userJSONString = new Gson().toJson(user);
            prefsEditor.putString("users", userJSONString);
        }
        prefsEditor.commit();
    }

    public void setImage(Context mContext, String user) {
        SharedPreferences pref = mContext.getSharedPreferences(image, Context.MODE_PRIVATE);
        prefsEditor = pref.edit();
        if (image == null)
            prefsEditor.putString("image", null);
        else {

            prefsEditor.putString("image", user);
        }
        prefsEditor.commit();
    }



}
