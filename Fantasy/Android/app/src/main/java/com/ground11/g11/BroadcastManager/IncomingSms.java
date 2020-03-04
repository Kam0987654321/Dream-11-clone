package com.indian11.app.BroadcastManager;


import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v4.content.LocalBroadcastManager;
import android.telephony.SmsMessage;

public class IncomingSms extends BroadcastReceiver {

    public static String otp;
    @Override
    public void onReceive(Context context, Intent intent) {
        Bundle data  = intent.getExtras();
        Object[] pdus = (Object[]) data.get("pdus");
        for(int i=0;i<pdus.length;i++){
            SmsMessage smsMessage = SmsMessage.createFromPdu((byte[]) pdus[i]);
            String sender = smsMessage.getDisplayOriginatingAddress();
            //You must check here if the sender is your provider and not another one with same text.
            String messageBody = smsMessage.getMessageBody();
                otp=messageBody.replaceAll("[^0-9]","");
                //Check here sender is yours
                Intent smsIntent = new Intent("otp");
                smsIntent.putExtra("message", otp);
                LocalBroadcastManager.getInstance(context).sendBroadcast(smsIntent);

            }
        }
    }
