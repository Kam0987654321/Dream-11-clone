package com.ground11.g11.Bean;



import java.io.Serializable;


public class BeanMyTransList implements Serializable {

    private String amount,type,transaction_status,transection_mode;

    public String getAmount() {
        return amount;
    }

    public void setAmount(String amount) {
        this.amount = amount;
    }

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }

    public String getTransaction_status() {
        return transaction_status;
    }

    public void setTransaction_status(String transaction_status) {
        this.transaction_status = transaction_status;
    }

    public String getTransection_mode() {
        return transection_mode;
    }

    public void setTransection_mode(String transection_mode) {
        this.transection_mode = transection_mode;
    }
}
