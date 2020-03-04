package com.indian11.app.PayUMoneyPackage;



public enum AppEnvironment {

    SANDBOX {
        @Override
        public String merchant_Key() {
            return "49wZXRkY";
        }

        @Override
        public String merchant_ID() {
            return "6559931";
        }

        @Override
        public String furl() {
            return "https://www.payumoney.com/mobileapp/payumoney/failure.php";
        }

        @Override
        public String surl() {
            return "https://www.payumoney.com/mobileapp/payumoney/success.php";
        }

        @Override
        public String salt() {
            return "zqVc6Vugjn";
        }

        @Override
        public boolean debug() {
            return true;
        }

    },




    PRODUCTION {
        @Override
        public String merchant_Key() {
            return "";
        }  //

        @Override
        public String merchant_ID() {
            return "";
        }   //

        @Override
        public String furl() {
            return "https://www.payumoney.com/mobileapp/payumoney/failure.php";
        }

        @Override
        public String surl() {
            return "https://www.payumoney.com/mobileapp/payumoney/success.php";
        }

        @Override
        public String salt() {
            return "";
        }     //

        @Override
        public boolean debug() {
            return false;
        }
    };

    public abstract String merchant_Key();

    public abstract String merchant_ID();

    public abstract String furl();

    public abstract String surl();

    public abstract String salt();

    public abstract boolean debug();


}
