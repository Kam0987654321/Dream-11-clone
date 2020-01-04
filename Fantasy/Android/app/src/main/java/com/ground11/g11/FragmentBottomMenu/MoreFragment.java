package com.ground11.g11.FragmentBottomMenu;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.RelativeLayout;

import com.ground11.g11.Config;
import com.ground11.g11.HomeActivity;
import com.ground11.g11.InviteFriendsActivity;
import com.ground11.g11.R;
import com.ground11.g11.WebviewAcitivity;


public class MoreFragment extends Fragment {

    RelativeLayout RL_MoreInviteFriend,RL_FantasyPointSystem,
            RL_MoreHowToPlay,RL_MoreAboutUs,RL_MoreHelpDesk;

    HomeActivity activity;
    Context context;


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View v = inflater.inflate(R.layout.fragment_more, container, false);

        context = activity = (HomeActivity)getActivity();

        initViews(v);


        RL_MoreInviteFriend.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(activity, InviteFriendsActivity.class);
                startActivity(i);
            }
        });

        RL_FantasyPointSystem.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(activity, WebviewAcitivity.class);
                i.putExtra("Heading","FANTASY POINT SYSTEM");
                i.putExtra("URL", Config.FANTASYPOINTSYSTEMURL);
                startActivity(i);
            }
        });
        RL_MoreHowToPlay.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(activity, WebviewAcitivity.class);
                i.putExtra("Heading","HOW TO PLAY");
                i.putExtra("URL",Config.HOWTOPLAYURL);
                startActivity(i);
            }
        });
        RL_MoreAboutUs.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(activity, WebviewAcitivity.class);
                i.putExtra("Heading","ABOUT US");
                i.putExtra("URL",Config.ABOUTUSURL);
                startActivity(i);
            }
        });
        RL_MoreHelpDesk.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(activity, WebviewAcitivity.class);
                i.putExtra("Heading","HELP DESK");
                i.putExtra("URL",Config.HELPDESKURL);
                startActivity(i);
            }
        });

        return v;
    }

    public void initViews(View v){

        RL_MoreInviteFriend = v.findViewById(R.id.RL_MoreInviteFriend);
        RL_FantasyPointSystem = v.findViewById(R.id.RL_FantasyPointSystem);
        RL_MoreHowToPlay = v.findViewById(R.id.RL_MoreHowToPlay);
        RL_MoreAboutUs = v.findViewById(R.id.RL_MoreAboutUs);
        RL_MoreHelpDesk = v.findViewById(R.id.RL_MoreHelpDesk);

    }



}
