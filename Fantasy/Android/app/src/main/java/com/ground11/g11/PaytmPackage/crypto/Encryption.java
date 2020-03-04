package com.indian11.app.PaytmPackage.crypto;

/**
 * Created by Sameer Jani on 29/1/18.
 */
public interface Encryption {
    String encrypt(String var1, String var2) throws Exception;

    String decrypt(String var1, String var2) throws Exception;
}
