package com.ground11.g11.Bean;

import java.io.Serializable;

public class BeanPlayerList implements Serializable {

    private String id,matchid,teamid,playerid,team_name,team_image,short_name,player_name,
            credit_points,player_image,player_desigination,player_points;


    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getMatchid() {
        return matchid;
    }

    public void setMatchid(String matchid) {
        this.matchid = matchid;
    }

    public String getTeamid() {
        return teamid;
    }

    public void setTeamid(String teamid) {
        this.teamid = teamid;
    }

    public String getPlayerid() {
        return playerid;
    }

    public void setPlayerid(String playerid) {
        this.playerid = playerid;
    }

    public String getTeam_name() {
        return team_name;
    }

    public void setTeam_name(String team_name) {
        this.team_name = team_name;
    }

    public String getTeam_image() {
        return team_image;
    }

    public void setTeam_image(String team_image) {
        this.team_image = team_image;
    }

    public String getShort_name() {
        return short_name;
    }

    public void setShort_name(String short_name) {
        this.short_name = short_name;
    }

    public String getPlayer_name() {
        return player_name;
    }

    public void setPlayer_name(String player_name) {
        this.player_name = player_name;
    }

    public String getCredit_points() {
        return credit_points;
    }

    public void setCredit_points(String credit_points) {
        this.credit_points = credit_points;
    }

    public String getPlayer_image() {
        return player_image;
    }

    public void setPlayer_image(String player_image) {
        this.player_image = player_image;
    }

    public String getPlayer_desigination() {
        return player_desigination;
    }

    public void setPlayer_desigination(String player_desigination) {
        this.player_desigination = player_desigination;
    }

    public String getPlayer_points() {
        return player_points;
    }

    public void setPlayer_points(String player_points) {
        this.player_points = player_points;
    }
}
