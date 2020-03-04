package com.indian11.app.Bean;



import java.io.Serializable;


public class BeanNotification implements Serializable {

    private String id,match_id,contest_id,title,contest_name,contest_description;

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getMatch_id() {
        return match_id;
    }

    public void setMatch_id(String match_id) {
        this.match_id = match_id;
    }

    public String getContest_id() {
        return contest_id;
    }

    public void setContest_id(String contest_id) {
        this.contest_id = contest_id;
    }


    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getContest_name() {
        return contest_name;
    }

    public void setContest_name(String contest_name) {
        this.contest_name = contest_name;
    }

    public String getContest_description() {
        return contest_description;
    }

    public void setContest_description(String contest_description) {
        this.contest_description = contest_description;
    }
}
