package com.ground11.g11.Bean;



import java.io.Serializable;


public class BeanContestList implements Serializable {

    private String contest_id,contest_name,contest_tag,winners,prize_pool,total_team,join_team,
            entry,contest_description,contest_note1,contest_note2,match_id,type,remaining_team;

    public String getContest_id() {
        return contest_id;
    }

    public void setContest_id(String contest_id) {
        this.contest_id = contest_id;
    }

    public String getContest_name() {
        return contest_name;
    }

    public void setContest_name(String contest_name) {
        this.contest_name = contest_name;
    }

    public String getContest_tag() {
        return contest_tag;
    }

    public void setContest_tag(String contest_tag) {
        this.contest_tag = contest_tag;
    }

    public String getWinners() {
        return winners;
    }

    public void setWinners(String winners) {
        this.winners = winners;
    }

    public String getPrize_pool() {
        return prize_pool;
    }

    public void setPrize_pool(String prize_pool) {
        this.prize_pool = prize_pool;
    }

    public String getTotal_team() {
        return total_team;
    }

    public void setTotal_team(String total_team) {
        this.total_team = total_team;
    }

    public String getJoin_team() {
        return join_team;
    }

    public void setJoin_team(String join_team) {
        this.join_team = join_team;
    }

    public String getEntry() {
        return entry;
    }

    public void setEntry(String entry) {
        this.entry = entry;
    }

    public String getContest_description() {
        return contest_description;
    }

    public void setContest_description(String contest_description) {
        this.contest_description = contest_description;
    }

    public String getContest_note1() {
        return contest_note1;
    }

    public void setContest_note1(String contest_note1) {
        this.contest_note1 = contest_note1;
    }

    public String getContest_note2() {
        return contest_note2;
    }

    public void setContest_note2(String contest_note2) {
        this.contest_note2 = contest_note2;
    }

    public String getMatch_id() {
        return match_id;
    }

    public void setMatch_id(String match_id) {
        this.match_id = match_id;
    }

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }

    public String getRemaining_team() {
        return remaining_team;
    }

    public void setRemaining_team(String remaining_team) {
        this.remaining_team = remaining_team;
    }
}
