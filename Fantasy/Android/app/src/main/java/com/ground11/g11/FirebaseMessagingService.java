package com.indian11.app;


import android.app.NotificationChannel;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import android.media.RingtoneManager;
import android.net.Uri;
import android.os.Build;
import android.support.v4.app.NotificationCompat;

import com.google.firebase.messaging.RemoteMessage;

import java.util.Map;

public class FirebaseMessagingService extends com.google.firebase.messaging.FirebaseMessagingService {
    private static final String TAG = FirebaseMessagingService.class.getSimpleName();
    @Override
    public void onMessageReceived(RemoteMessage remoteMessage) {
        if (remoteMessage.getData().size() >0) {
            Map<String, String> params = remoteMessage.getData();


                sendNotification(params.get("title"), params.get("message"));

        }
    }

    private void sendNotification(String title, String message) {

        Intent intent = null;
        if (title != null && !title.isEmpty()) {
            intent = new Intent(this, SplashScreen.class);
            intent.putExtra("Title", title);
            intent.putExtra("Message", message);

        }

        if(intent != null) {
            intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
            PendingIntent pendingIntent = PendingIntent.getActivity(this, 0,
                    intent, PendingIntent.FLAG_ONE_SHOT);

            String CHANNEL_ID = "noti01";

            Uri defaultSoundUri = RingtoneManager.getDefaultUri(RingtoneManager.TYPE_NOTIFICATION);
            NotificationCompat.Builder notificationBuilder = new NotificationCompat.Builder(this, CHANNEL_ID)
                    .setSmallIcon(R.drawable.ground11)
                    .setContentTitle(title)
                    .setContentText(message)
                    .setAutoCancel(true)
                    .setChannelId(CHANNEL_ID)
                    .setVibrate(new long[]{1000, 1000})
                    .setSound(defaultSoundUri)
                    .setContentIntent(pendingIntent);

            NotificationManager notificationManager = (NotificationManager) getSystemService(Context.NOTIFICATION_SERVICE);

            if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.O) {
                NotificationChannel mChannel = new NotificationChannel(CHANNEL_ID,
                        getString(R.string.app_name), NotificationManager.IMPORTANCE_HIGH);
                if (notificationManager != null) {
                    notificationManager.createNotificationChannel(mChannel);
                }
            }

            if (notificationManager != null) {
                notificationManager.notify(0, notificationBuilder.build());
            }
        }
    }
}