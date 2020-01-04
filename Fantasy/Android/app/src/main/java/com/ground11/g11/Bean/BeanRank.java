package com.ground11.g11.Bean;

import java.io.Serializable;


public class BeanRank implements Serializable {

    String rank,id,from_rank,to_rank,price,poolprice,team_size,percent_destribution;

    public String getPercent_destribution() {
        return percent_destribution;
    }

    public void setPercent_destribution(String percent_destribution) {
        percent_destribution = percent_destribution;
    }

    public String getRank() {
        return rank;
    }

    public void setRank(String rank) {
        this.rank = rank;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getFrom_rank() {
        return from_rank;
    }

    public void setFrom_rank(String from_rank) {
        this.from_rank = from_rank;
    }

    public String getTo_rank() {
        return to_rank;
    }

    public void setTo_rank(String to_rank) {
        this.to_rank = to_rank;
    }

    public String getPrice() {
        return price;
    }

    public void setPrice(String price) {
        this.price = price;
    }

    public String getPoolprice() {
        return poolprice;
    }

    public void setPoolprice(String poolprice) {
        this.poolprice = poolprice;
    }

    public String getTeam_size() {
        return team_size;
    }

    public void setTeam_size(String team_size) {
        this.team_size = team_size;
    }
}
