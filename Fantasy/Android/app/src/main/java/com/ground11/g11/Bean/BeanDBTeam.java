package com.indian11.app.Bean;



public class BeanDBTeam {

    private String PlayerId,MatchId,IsSelected,Role,PlayerData;
    private boolean isSelected;
    private boolean isSelected2;


    int checkType;
    int checkType2;


    public int getCheckType() {
        return checkType;
    }

    public void setCheckType(int checkType) {
        this.checkType = checkType;
    }

    public int getCheckType2() {
        return checkType2;
    }

    public void setCheckType2(int checkType2) {
        this.checkType2 = checkType2;
    }

    public String getPlayerId() {
        return PlayerId;
    }

    public void setPlayerId(String playerId) {
        PlayerId = playerId;
    }

    public String getMatchId() {
        return MatchId;
    }

    public void setMatchId(String matchId) {
        MatchId = matchId;
    }

    public String getIsSelected() {
        return IsSelected;
    }

    public void setIsSelected(String isSelected) {
        IsSelected = isSelected;
    }

    public String getRole() {
        return Role;
    }

    public void setRole(String role) {
        Role = role;
    }

    public String getPlayerData() {
        return PlayerData;
    }

    public void setPlayerData(String playerData) {
        PlayerData = playerData;
    }

    public boolean isSelected() {
        return isSelected;
    }

    public void setSelected(boolean selected) {
        isSelected = selected;
    }

    public boolean isSelected2() {
        return isSelected2;
    }

    public void setSelected2(boolean selected2) {
        isSelected2 = selected2;
    }
}
