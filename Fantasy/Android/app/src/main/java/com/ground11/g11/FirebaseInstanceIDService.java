package com.ground11.g11;

import android.util.Log;

import com.google.firebase.iid.FirebaseInstanceId;
import com.google.firebase.iid.FirebaseInstanceIdService;

public class FirebaseInstanceIDService extends FirebaseInstanceIdService {
    private static final String TAG = FirebaseInstanceIDService.class.getSimpleName();
    @Override
    public void onTokenRefresh() {
        String refreshedToken = FirebaseInstanceId.getInstance().getToken();
        Log.d(TAG, "Token Value: " + refreshedToken);


    }
}