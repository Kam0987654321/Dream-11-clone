package com.indian11.app.TrakNPayPackage;

import com.indian11.app.Config;

public class TrakConstant {
    //API_KEY is given by the Payment Gateway. Please Copy Paste Here.
    //public static final String PG_API_KEY = "";
    public static final String PG_API_KEY = "";
    //URL to Accept Payment Response After Payment. This needs to be done at the client's web server.
    public static final String PG_RETURN_URL = Config.VERIFYHASH;

    //Enter the Mode of Payment Here . Allowed Values are "LIVE" or "TEST".
    public static final String PG_MODE = "TEST";

    //PG_CURRENCY is given by the Payment Gateway. Only "INR" Allowed.
    public static final String PG_CURRENCY = "INR";

    //PG_COUNTRY is given by the Payment Gateway. Only "IND" Allowed.
    public static final String PG_COUNTRY = "IND";

    public static String PG_ORDER_ID = "";
    public static final String PG_DESCRIPTION = "test";
    public static final String PG_ADD_1 = "NA";
    public static final String PG_ADD_2 = "NA";
    public static final String PG_UDF1 = "udf1";
    public static final String PG_UDF2 = "udf2";
    public static final String PG_UDF3 = "udf3";
    public static final String PG_UDF4 = "udf4";
    public static final String PG_UDF5 = "udf5";

}
