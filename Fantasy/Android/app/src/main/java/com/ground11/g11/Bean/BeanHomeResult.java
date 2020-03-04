package com.indian11.app.Bean;



import java.io.Serializable;



public class BeanHomeResult implements Serializable {

    private String match_id,teamid1,match_status,type,teamid2,team_name1,team_image1,
            team_short_name1,team_name2,team_image2,team_short_name2,team1Score,team2Score,team1Over,team2Over,match_status_note;

    private int time;

    public String getMatch_id() {
        return match_id;
    }

    public void setMatch_id(String match_id) {
        this.match_id = match_id;
    }

    public String getTeamid1() {
        return teamid1;
    }

    public void setTeamid1(String teamid1) {
        this.teamid1 = teamid1;
    }

    public String getTeamid2() {
        return teamid2;
    }

    public void setTeamid2(String teamid2) {
        this.teamid2 = teamid2;
    }

    public String getMatch_status() {
        return match_status;
    }

    public void setMatch_status(String match_status) {
        this.match_status = match_status;
    }

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }

    public int getTime() {
        return time;
    }

    public void setTime(int time) {
        this.time = time;
    }

    public String getTeam_name1() {
        return team_name1;
    }

    public void setTeam_name1(String team_name1) {
        this.team_name1 = team_name1;
    }

    public String getTeam_image1() {
        return team_image1;
    }

    public void setTeam_image1(String team_image1) {
        this.team_image1 = team_image1;
    }

    public String getTeam_short_name1() {
        return team_short_name1;
    }

    public void setTeam_short_name1(String team_short_name1) {
        this.team_short_name1 = team_short_name1;
    }

    public String getTeam_name2() {
        return team_name2;
    }

    public void setTeam_name2(String team_name2) {
        this.team_name2 = team_name2;
    }

    public String getTeam_image2() {
        return team_image2;
    }

    public void setTeam_image2(String team_image2) {
        this.team_image2 = team_image2;
    }

    public String getTeam_short_name2() {
        return team_short_name2;
    }

    public void setTeam_short_name2(String team_short_name2) {
        this.team_short_name2 = team_short_name2;
    }
    public String getTeam1Score() {
        return team1Score;
    }

    public void setTeam1Score(String team1Score) {
        this.team1Score = team1Score;
    }

    public String getTeam2Score() {
        return team2Score;
    }

    public void setTeam2Score(String team2Score) {
        this.team2Score = team2Score;
    }

    public String getTeam1Over() {
        return team1Over;
    }

    public void setTeam1Over(String team1Over) {
        this.team1Over = team1Over;
    }

    public String getTeam2Over() {
        return team2Over;
    }

    public void setTeam2Over(String team2Over) {
        this.team2Over = team2Over;
    }
    public String getMatch_status_note() {
        return match_status_note;
    }

    public void setMatch_status_note(String match_status_note) {
        this.match_status_note = match_status_note;
    }
}
