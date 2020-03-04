package com.indian11.app.Bean;



import java.io.Serializable;



public class BeanWiningInfoList implements Serializable {

    private String winning_info_id,contest_id,rank,price;

    public String getWinning_info_id() {
        return winning_info_id;
    }

    public void setWinning_info_id(String winning_info_id) {
        this.winning_info_id = winning_info_id;
    }

    public String getContest_id() {
        return contest_id;
    }

    public void setContest_id(String contest_id) {
        this.contest_id = contest_id;
    }

    public String getRank() {
        return rank;
    }

    public void setRank(String rank) {
        this.rank = rank;
    }

    public String getPrice() {
        return price;
    }

    public void setPrice(String price) {
        this.price = price;
    }
}
