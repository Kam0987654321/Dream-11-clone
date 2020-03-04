<!doctype html>

<html>


<head>

<title>Invite Friends</title>

<link rel="canonical" href="invite-all-to-play.html" />

<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900" rel="stylesheet">







<style>

section, section.main-bg { width: 100%; height: 100%; }

:focus, img { outline: 0 }

a, abbr, acronym, address, applet, big, blockquote, body, caption, cite, code, dd, del, dfn, div, dl, dt, em, fieldset, font, form, h1, h2, h3, h4, h5, h6, html, iframe, img, ins, kbd, label, legend, li, object, ol, p, pre, q, s, samp, small, span, strike, strong, sub, sup, table, tbody, td, tfoot, th, thead, tr, tt, ul, var { margin: 0; padding: 0; border: 0; outline: 0; font-style: inherit; font-size: 100%; font-family: inherit; vertical-align: baseline }

body { line-height: 1; color: #000; font-family: Helvetica;}

.btn a, h1, h2, p { color: #fff }

h3, h4 { color: #000 }

ol, ul { list-style: none }

img { display: block }

.btn, .otherPltfrmBtn { display: inline-block }

h1, h2, h3, h4 { font-family: 'Montserrat', sans-serif; line-height: 1.2 }

section.main-bg { background: url(../web_assets/image/app_desktop_bg.png) center top no-repeat; background-size: cover; height: 639px; position: relative;}

.container { max-width: 1000px; width: 100%; margin: 0 auto; padding: 0 15px; box-sizing: border-box;}

.steps-container { max-width: 1000px; width: 100%; margin: 0 auto; padding: 0px 15px 80px; box-sizing: border-box;}

header { width: 100%; height: 80px; background-color: #c51d23 }

header .logo { width: 970px; margin: 0 auto; padding: 21px 15px 0 }

header .logo img{    width: 180px;}

.secLeft { float: left; width: 54% }

.secRight { float: right; width: 45%; padding: 80px 0 0 }

h2 { font-size: 50px }

h3 {font-family: Montserrat;font-size: 18px;font-weight: bold;font-style: normal;font-stretch: normal;line-height: normal;letter-spacing: normal;text-align: left;color: #282828;}

h4 { font-size: 24px; padding: 18px 0 }

p { font-family: Asap, sans-serif; line-height: 1.5; font-size: 20px; margin:30px 0 20px 0}

.btn p, p.otherPltfrm { font-size: 16px }

.btnsMain { margin: 20px 0 60px }

.btn { padding: 20px 0 0 }

.btn p { clear: both; padding: 10px 0 0; margin: 0!important; width:100%;}

.btn a { float: left; margin: 0 15px 0 0; text-decoration: none }

.btn a img { width: 226px; }

.btn .smText {font-size:13px !important;}

.otherPltfrmBtn { border-radius: 4px; background-color: #fff; padding: 2px 8px; color: #c51d23; margin: 0 0 0 5px }

p.footer { font-size: 12px; margin: 60px 0 30px }

.clear { clear: both }

.bold { font-weight: 700 }

.link a { text-decoration: underline; color: #fff }

.phoneOuter img { width: 432px; margin: 0 auto }

.screenshots { margin: 30px 0 0; text-align: center }

.screen:first-child { margin: 0!important }

.screen { width: 182px; float: left; margin-left: 12px; text-align: center!important }

.screen img { width: 182px; margin: 0 auto; float: none }

p.steps { color: #000; line-height: 1.2; font-size: 13px; text-align: center; padding: 0; margin: 0 0 15px }

.txtField { float: left; position: relative; width: 262px; }

.txtField span { border-right: 1px solid #d5d5d5; color: #d5d5d5; font-family: Asap, sans-serif; font-size: 20px; left: 0; position: absolute; text-align: center; top: 8px; width: 50px; line-height: 33px;  z-index: 2; }

.txtField label { color: #fff; float: left; font-family: Asap, sans-serif; font-size: .90em; padding: 5px 0 0; width: 100%; }

.txtField .errorLabel { clear: both; background: #e13939; border-radius: 4px; display: none; color: #fff; float: left; font-size: .95em; margin: 5px 0 0; padding: 3px 5px; width: auto; z-index: 0; }

.txtField input { border-radius: 4px; background-color: #fff; border: 1px solid #e8e8e8; box-sizing: border-box; font-family: Helvetica; font-size: 18px; color: #d5d5d5; font-weight: normal; float: left; font-size: 20px; height: 50px; position: relative; padding: 4% 5% 4% 22%; width: 100%; z-index: 1; line-height: 1.3; }

.txtField input::-webkit-input-placeholder{color: #d5d5d5;}

.getAppBtn { border-radius: 5px; background-color: #c61d23;  color: #ffffff; float: left; font-family: Montserrat; height: 50px; line-height: 50px; margin: 0 0 0 31px; text-align: center; text-decoration: none;font-size: 18px; font-weight: bold; padding: 0 24px;}

.getAppBtn.active { background-color: #25ba38;}



.smsWrapper {float:left; clear:both; width:100%;}

.smsWrapper p {margin:10px 0 20px 0;}

.callWrapper {float:left; clear:both; width:100%; font-family: Asap, sans-serif; padding-bottom:10px;}

.callWrapper .innerTxt {font-family: Helvetica;font-size: 22px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: normal;letter-spacing: normal;text-align: left;color: #ffffff; margin-top: 17px;}

.callWrapper .innerTxt span {font-size:34px; font-weight:bold; padding-left:5px;}

.callWrapper .innerTxt label {color: #fff; float:left; font-size:.60em; padding: 5px 0 0; width: 100%;}

.cplLogo {padding-top: 20px;}

.cplLogo img {width: 60%;}

#popup{ max-width: 300px; width: 80%; height: 200px;  background: #fff; position: absolute; top: 0px; right: 0px; left: 0px; bottom: 0px; margin: auto; z-index: 3; padding: 10px; box-sizing: border-box; color: #000; line-height: 21px; font-size: 15px; font-family: Asap, sans-serif; }

#overlay{ background: rgba(0, 0, 0, 0.4); width: 100%; height: 100%; z-index: 2; display: block; top: 0; position: fixed;}

.popup_close{cursor: pointer; position: absolute; top: -10px; right: -10px; z-index: 1; font-size: 16px; font-family: arial; text-decoration: none; width: 20px; height: 20px; text-align: center; -webkit-appearance: none; line-height: 21px; background: #000; border: #fff 1px solid; border-radius: 100%; box-shadow: #777 2px 2px 2px; color: #fff;}

.main_title{

  font-size: 36px;

  font-weight: bold;

  letter-spacing: 2px;

  margin-bottom: 3px;

}

.logo{margin-top: 84px; margin-bottom: 126px;}

.g_policies{font-family: Montserrat;font-size: 12px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: normal;letter-spacing: normal;text-align: left;color: #d5d5d5; clear: both; margin-top: 74px; display: inline-block;}

.phoneOuter{ position: absolute; bottom: -190px;}

.user_rating{display: grid; grid-template-columns: 1fr 1fr 1fr; grid-template-rows: auto; width: 60%;}

.numbers{font-family: Montserrat;font-size: 70px; font-weight: 600;font-style: normal;font-stretch: normal;line-height: 1.02;letter-spacing: normal;text-align: left;color: #c61d23;}

.num_bottom_description{font-family: Montserrat;font-size: 24px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: normal;letter-spacing: normal;text-align: left;color: #9b9b9b;}

.num_description{font-family: Montserrat;font-size: 24px;font-weight: bold;font-style: normal;font-stretch: normal;line-height: normal;letter-spacing: normal;text-align: left;color: #c61d23; min-height: 29px;}

.middle_box{padding-left: 29px;}

.user_rating{margin-top: 46px; margin-bottom: 73px;}

.step_box_inner{display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));grid-template-rows: auto;}

.step_bg{background: #fafafa; padding: 12px 0;}

.step_number{background-image: linear-gradient(to left, #fafafa, #c61d23);font-family: Montserrat;font-size: 24px;font-weight: bold;font-style: normal;font-stretch: normal;line-height: normal;letter-spacing: normal;text-align: left;color: #ffffff; height: 60px; line-height: 60px; padding-left: 10px;}

.step{position: relative;margin-bottom: 120px;}

.step img{position: relative; z-index: 1;}

.step_info{width: 180px;position: absolute;left: 299px;top: 50px;z-index: 0;}

.step_information{font-family: Helvetica;font-size: 18px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: normal;letter-spacing: normal;text-align: left;color: #323232; padding-left: 10px;margin-top: 20px;}

.app_call_to_action{text-align: center; padding-top: 81px;}

.app_call_to_action h3{text-align: center;}

.app_call_to_action ul li{float: left; margin-right: 20px;}

.app_call_to_action ul li:last-child{margin-right: 0px;}

.app_call_to_action ul{display: inline-block; margin-top: 24px; margin-bottom: 80px; padding-left: 0px;}

.show_steps{position: relative;}

.show_steps:after{content: ""; width: 14px; height: 24px;  display: inline-block; background: url(../../d13ir53smqqeyp.cloudfront.net/d11-static-pages/images/acc_arrow.png) no-repeat; position: absolute; right: 0px; background-size: 100%;top: -1px;}

.show_steps.open:after{-moz-transform: rotate(90deg);

-webkit-transform: rotate(90deg);

-o-transform: rotate(90deg);

transform: rotate(90deg);}

.referral{font-family: Montserrat; font-size: 19px; font-weight: 600; font-style: normal; font-stretch: normal; line-height: normal; letter-spacing: normal; text-align: left; color: #ffffff; margin-bottom: 24px;}





/* footer css starts here */

.footer_top{background: #373737; color: #fff; padding-top: 62px;}

.footer_inner{display: grid; grid-template-columns: 1.5fr 1fr; grid-template-rows: auto;}

.footer_social ul{margin-top: 12px; margin-bottom: 0px; padding-left: 0px; display: inline-block;}

.footer_social ul li{float: left; list-style: none;margin-right: 16px;}

.footer_social ul li:last-child{margin-right: 0px;}

.col2{display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); grid-template-rows: auto;}

.col1{display: grid; grid-template-columns: repeat(auto-fit, minmax(230px, 1fr)); grid-template-rows: auto; border-right: 1px solid #828282;}

.right_col1{display: grid; grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); grid-template-rows: auto;}

.left_link_list ul, .right_link_list ul{padding-left: 0px; list-style: none; margin-top: 0px; margin-bottom: 0px; display: inline-block;}

.left_link_list ul li a, .right_link_list ul li a{font-size: 14px; font-weight: 600; font-family: Montserrat; font-style: normal; font-stretch: normal; letter-spacing: normal; text-align: left; color: #ffffff; text-decoration: none;margin-bottom: 25px; display: inline-block;}

.membership{padding-left: 20px;}

.membership ul{list-style: none; margin-top: 0px; margin-bottom: 0px; padding-left: 0px; display: inline-block;}

.membership ul li{float: left; margin-right: 17px;}

.membership ul li:last-child{margin-right: 0px;}

.membership h3, .our_apps h3,  .sports_partners h3{font-family: Montserrat; font-size: 14px; font-weight: 600; font-style: normal; font-stretch: normal; line-height: normal; letter-spacing: normal; color: #ffffff; margin-top: 0px; margin-bottom: 27px;}

.office_address h3{font-family: Montserrat; font-size: 14px; font-weight: 600; font-style: normal; font-stretch: normal; line-height: normal; letter-spacing: normal; color: #ffffff; margin-top: 0px; text-align: center;}

.app_list { text-align: left; padding-left: 0; margin: 0; list-style: none;}

.app_list li {margin-bottom: 10px;}

.app_list li a {font-size: 16px;color: #fff;font-family: Arial; text-decoration: none;}

.ios a:before { width: 13px; background: url(../../d13ir53smqqeyp.cloudfront.net/d11-static-pages/images/apple-icon.png) no-repeat; background-size: 100%;}

.android a:before { width: 14px; background: url(../../d13ir53smqqeyp.cloudfront.net/d11-static-pages/images/android-icon.png) no-repeat; background-size: 100%;}

.android a:before, .ios a:before { margin-right: 8px; float: left; content: ""; height: 16px; display: inline-block;}

.footer_inner{padding-bottom: 29px;border-bottom: 1px solid #828282}

.our_apps{ padding-left: 30px;}

.office_address{padding-top: 16px; text-align: center; padding-bottom: 15px;}

.office_address h3{margin-bottom: 8px;}

.address{ font-family: Helvetica;font-size: 14px; font-weight: normal; font-style: normal; font-stretch: normal; line-height: 1.57; letter-spacing: normal; color: #ffffff;    padding: 0 10px;}

.footer_bottom{ background: #282828; padding-top: 25px; padding-bottom: 25px; text-align: center;}

.footer_bottom ul {margin-top: 0px; margin-bottom: 0px; display: inline-block; list-style: none; padding-left: 0px; display: inline-block;}

.footer_bottom ul li{float: left;}

.footer_bottom ul li a{text-decoration: none;font-size: 16px; font-weight: normal; font-style: normal; font-stretch: normal; line-height: normal; letter-spacing: normal; text-align: center; color: #ffffff; padding-right: 40px; margin-right: 40px; border-right: 1px solid #828282;}

.footer_bottom ul li:last-child a{ margin-right: 0px; padding-right: 0px; border-right: 0px;}

.sports_partners{padding-left: 10px;}

.sports_partners ul{display: inline-block;}

.sports_partners ul li{float: left; margin-right: 20px; text-align: center;}

.sports_partners ul li img{display: block;}

.sports_partners ul li span{display: inline-block;vertical-align: middle;margin-right: 23px;}

.sports_partners ul li:last-child{margin-right: 0px}

.sports_partners ul li span:last-child{margin-right: 0px;}

.step_inner_wrapper{margin-top: 30px;}

.more_link{display: none;}

.footer_container{max-width: 1000px; width: 100%; margin: 0 auto;}

.sports_partners ul{margin: 0px; padding: 0px; list-style: none;}

.disclaimer_box {padding-bottom: 15px;}

.disclaimer_box h3 { text-align: center; margin-bottom: 4px; font-size: 10px; color: #929292; font-weight: normal; font-family: Montserrat; margin-top: 0px;}

.disclaimer { font-size: 10px; max-width: 540px; width: 90%; margin: 0 auto; color: #929292; text-align: center; font-family: Helvetica;}

.right_link_list {padding-left: 20px;}

/* footer css ends here */



@media (max-width:900px){

  .col1{padding-left: 15px;}

  .left_col1{margin-bottom: 40px}

  .sports_partners ul li span{margin-right: 10px;}

}



@media (max-width:768px){

  /*footer css*/

  .footer_inner {grid-template-columns: 2fr 1fr;}

  .col2{text-align: center;}

  .membership h3, .our_apps h3, .sports_partners h3{text-align: center;}

  .membership, .sports_partners{padding-left: 0px;}

  /*footer css*/

}



@media (max-width:766px){

  /*mobile_footer*/

  .footer_inner{grid-template-columns: 1fr;padding-bottom: 0px;}

  .footer_top{padding-top: 20px;}

  .footer_logo img{margin: 0 auto;}

  .col1{border-right: 0px;}

  .footer_social{text-align: center;}

  .left_col1{border-bottom: 1px solid #828282; padding-bottom: 23px; margin-bottom: 13px; text-align: center;}

  .right_col1{text-align: center;}

  

  .membership h3, .our_apps h3, .sports_partners h3{text-align: center; margin-bottom: 14px;}

  .membership,  .sports_partners{margin-bottom: 40px;}

  .sports_partners ul{display: inline-block;}

  .sports_partners{padding-left: 0px;}

  .our_apps{text-align: center; padding-left: 0px;}

  .app_list li{text-align: center; float: left; margin-right: 10px; }

  .app_list li:last-child{margin-right: 0px;}

  .app_list{display: inline-block;}

  .footer_bottom ul{display: inline-block;}

  .footer_bottom{text-align: center;}

  .footer_bottom ul li a{padding-right: 10px; margin-right: 10px;}

  .footer_bottom ul li:nth-child(2) a {padding-right: 0px;border-right: 0px;margin-right: 0px;}

  .footer_bottom ul li:last-child { clear: both; width: 100%; margin-top: 20px;}

  .more_link{display: block;}

  .col2{grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));}

  .membership{padding-left: 0px;}

  .col1{padding-left: 0px;}

  /*mobile footer*/

}





/*carousel css*/

.sliderBox{margin-top: 24px;}

.contentBox .jcarousel-wrapper {

  margin:0 auto;

  position: relative;

  box-sizing:border-box;

/*  padding:0 22px;*/

}



/** Carousel **/

.contentBox .jcarousel {

  position: relative;

  overflow: hidden;

  width: 100%;

}



.contentBox .jcarousel ul {

  width: 20000em;

  position: relative;

  list-style: none;

  margin: 0;

  padding: 0;

}



.contentBox .jcarousel li {

  /*width: 228px !important;*/

  float: left;

  box-sizing: border-box;

  text-align:center;

}



.contentBox .jcarousel img {

  display: inline-block;

  max-width: 94%;

  height: auto !important;

  float: left;

}



/** Carousel Controls **/

.contentBox .jcarousel-control-prev,

.contentBox .jcarousel-control-next {

  position: absolute;

  top: 50%;

  margin-top: -15px;

  width: 30px;

  height: 36px;

  font-size:30px;

  text-align: center;

  background: #fff;

  color: #4a4a4a;

  text-decoration: none;

}



.contentBox .jcarousel-control-prev {

  border-radius:0 4px 4px 0;

  box-shadow:1px 0px 2px #4a4a4a;

  left: 0;

}



.contentBox .jcarousel-control-next {

  border-radius:4px 0 0 4px;

  box-shadow:-1px 0px 2px #4a4a4a;

  right: 0;

}



.jcarousel-control-prev.inactive,

.jcarousel-control-next.inactive {

  opacity: .4;

  cursor: default;

}

/*carousel css*/



@media (min-width:769px){

  .mobile_wrapper{display: none;}

  .mobile_logo{display: none;}

  .desktop_logo{display: block;}

}



@media (max-width:1000px) {

  .phoneOuter{position: static;}

  .phoneOuter img{width: 100%}

  .logo{margin-top: 50px; margin-bottom: 50px;}

  .user_rating{width: 100%;}

  .step{margin-bottom: 60px;}

  .step img{width: 250px;}

  .step_info{left: 197px; top: 27px;}

  .step_number{font-size: 20px; height: 50px; line-height: 50px;}

  .step_information{padding-left: 10px; font-size: 14px;margin-top: 12px;}

  .step_box_inner:last-child{margin-bottom: 0px;}

  .main_title{font-size: 28px;}

  .callWrapper .innerTxt{font-size: 19px;}

  .g_policies{font-size: 11px;}

}



@media (max-width:768px){

  .callWrapper .innerTxt{display: none;}

  .smsWrapper{display: none}

  .mobile_dhoni{display: none;}

  .downloadapp{color: #c61d23; background: #fff; border-radius: 4px; height: 40px; line-height: 40px; font-family: Montserrat; font-size: 14px; font-weight: 600; font-style: normal; font-stretch: normal;letter-spacing: normal; text-align: center; display: inline-block; text-decoration: none; padding: 0 60px;}

  .mobile_logo{display: none;}



}



@media (max-width:766px){

  .secRight{display: none;}

  .secLeft{width: 100%;}

  .desktop_logo{display: none;}

  .mobile_logo{display: block; margin: 0 auto;}

  .secLeft{text-align: center;}

  .main_title{font-size: 12px;font-weight: bold;font-style: normal;font-stretch: normal;line-height: normal;letter-spacing: normal;text-align: center;color: #ffffff;}

  .mobile_dhoni{display: block;margin: 0 auto;}

  .downloadapp{width: 90%; box-sizing: border-box;}

  section.main-bg{height: auto;}

  .g_policies { font-size: 8px; margin-top: 18px; margin-bottom: 5px;}

  .logo{margin: 16px 0px;}

  .mobile_title{font-family: Montserrat; font-size: 12px; font-weight: bold; font-style: normal; font-stretch: normal; line-height: normal; letter-spacing: normal; text-align: center; color: #ffffff;}

  .mobile_sec_title{font-family: Montserrat; font-size: 10px; font-weight: 600; font-style: normal; font-stretch: normal; line-height: normal; letter-spacing: normal; text-align: center; color: #ffffff;}

  .numbers{font-size: 36px;}

  .num_description{font-size: 12px; min-height: 15px;}

  .num_bottom_description{font-size: 12px;}

  .num_description img{width: 63px;}

  .middle_box {padding-left: 16px;}

  .user_rating{margin: 20px 0px;}

  .steps-container{padding-left: 0px; padding-right: 0px; padding-bottom: 30px;}

  .step img{width: 182px;}

  .step_number {font-size: 14px;height: 36px;line-height: 36px;}

  .step_info{left: 143px; width: 154px;}

  .step_information{font-size: 10px; margin-top: 8px;}

  h3{font-size: 14px; font-weight: 600;}

  .show_steps{padding-right: 20px}

  .show_steps:after{top: 7px; width: 7px; height: 12px;}

  .app_call_to_action{padding-top: 40px;}

  .app_call_to_action ul{margin-bottom: 40px;}

  .app_call_to_action ul li img{width: 135px;}

  .downloadapp:before {content: "";background: url(../../d13ir53smqqeyp.cloudfront.net/d11-static-pages/images/downloadApp.png) no-repeat;width: 21px;height: 21px;display: inline-block;background-size: 100%;vertical-align: middle;margin-right: 11px;}

  .referral{font-size: 10px; text-align: center; margin-bottom: 17px;}

  .steps-container h3{padding-left: 15px;}

}





</style>

 

</head>



<body>



  <section class="main-bg">

    <div class="container">

      <div class="secLeft">

        <div class="logo">

          <img src="../../d13ir53smqqeyp.cloudfront.net/d11-static-pages/images/desktop_logo.png" alt="" class="desktop_logo" width="108">

          <img src="../../d13ir53smqqeyp.cloudfront.net/d11-static-pages/images/mobile_logo.png" alt="" class="mobile_logo" width="135">

        </div>

        <h1 class="main_title">GET RS.100 CASH BONUS</h1>

        <div class="referral">Download the app & register using the referral code</div>

       <!--  <h5 class="mobile_title" >GET RS.100 CASH BONUS</h5>

        <div class="mobile_sec_title">Download the app & register using your invite code</div> -->

        <!-- <div class="cplLogo"><img src="https://d13ir53smqqeyp.cloudfront.net/contain/site-banners/CPL-Dream11-Logo.png" alt="Hero CPL T20" /></div> -->

        <!-- <p>Download the <strong>Dream11 app,</strong> play in our cash contests & win daily!</p> -->

      

        <div class="smsWrapper">

          <!-- <p>Get the app link via SMS</p> -->

            <div class="smsLink">

                <div class="txtField"> <span>+91</span>

                  <input type="email" placeholder="mobile number" id="regEmail" name="regEmail">

                  <!--<label>(It can take up to 5 minutes to receive the SMS)</label>-->

                  <label id="errorMob" class="errorLabel">Please enter a valid 10 digit mobile number.</label>

                </div>

                

                <script>

                  function sendlink(){

                    if(document.getElementById('regUser').classList.toString().indexOf('active') != -1) return;

                    var mobileNum = document.getElementById('regEmail').value;

                    mobileNum = parseInt(mobileNum);

                    if(isNaN(mobileNum) || (''+mobileNum).length < 10){

                      showError();

                      return;

                    } 

                    hideError();

                    document.getElementById('regUser').setAttribute("class", "getAppBtn active");

                    document.getElementById('regUser').text = 'App Link Sent';

                

                    var smsReq = new XMLHttpRequest();

                        smsReq.open("GET.html", location.protocol+ "//"+location.host+"/in/getlinkinsms?mobileNum="+mobileNum+"&appType=android&ran="+(Math.random()*10).toFixed(2), true);

                        smsReq.send();

                  }

                  function showError(){

                    document.getElementById('errorMob').style.display = 'block';

                  }

                  function hideError(){

                    document.getElementById('errorMob').style.display = 'none';

                  }

                </script>

              <a id="regUser" name="loginsubmit" class="getAppBtn" onclick="sendlink()" href="javascript:;">Get App Link</a> 

            </div>

        </div> 

    

        <div class="callWrapper" style="display: none;">

          <!-- <p>OR</p> -->

          <div class="innerTxt">

            or Give us a missed call on 1800-3000-9976

              <!-- <label>(It can take up to 5 minutes to receive the SMS)</label> -->

          </div>

        </div>

          

        <!-- <div class="btnsMain">

          <div class="btn"> 

            <p>Click to Download ( V 3.15.0 )</p>

            <a id="proAppLink"><img src="/images/appmarketing/direct-down-load-button-new.png" alt="DREAM11 ANDROID APP" /></a>

              <p>(Free &amp; Cash Contests)</p>

              <p class="smText">Last Updated: 2nd Apr, 2018</p>

          </div>

        </div> -->

        <!-- <p class="otherPltfrm">Also available on <span class="bold link"><a id="iosAppLink" target="_blank">iOS App Store</a></span></p> -->

        <!-- <p class="otherPltfrm">Practice Contests version available on <span class="bold link"><a id="androidAppLink" href="https://play.google.com/store/apps/details?id=com.app.dream11&utm_campaign=androidpage&utm_content=androidfull&utm_medium=androidpage" target="_blank">Google Play Store</a></span></p> -->



        <div class="mobile_wrapper">
        </div>

        <div class="g_policies">*Google’s policy doesn’t allow Apps offering cash contests on the Play Store. </div>

      </div>

      <div class="secRight">

        <div class="phoneOuter">  </div>

      </div>

      <div class="clear"></div>

    </div>

  </section>

  <section>

    <div class="container">

      <div class="user_rating">

        <div class="user_box">

          <div class="numbers">4.2</div>

          <div class="num_description"></div>

          <div class="num_bottom_description">App Rating</div>

        </div>

        <div class="user_box middle_box">

          <div class="numbers">4</div>

          <div class="num_description">Crore+</div>

          <div class="num_bottom_description">Users</div>

        </div>

        <div class="user_box">

          <div class="numbers">1.4</div>

          <div class="num_description">Crore+</div>

          <div class="num_bottom_description">Downloads</div>

        </div>

      </div>

    </div>

  </section>

  <section>

    <div class="steps-container contentBox">

      <h3>SCREENSHOTS</h3>



      <!--sliderBox start-->

      <div class="sliderBox">

        <div class="jcarousel-wrapper">

          <div class="jcarousel">

           

          </div>



          <a href="#" class="jcarousel-control-prev">&lsaquo;</a>

          <a href="#" class="jcarousel-control-next">&rsaquo;</a>

        </div>

      </div>

      <!--sliderBox end-->

    

    </div>

  </section>

  <section class="step_box">

    <div class="step_bg">

      <div class="container">

        <h3 class="show_steps">STEPS TO DOWNLOAD ANDROID APP ON YOUR PHONE</h3>

        

        <div class="step_inner_wrapper" style="display: none;">

          <div class="step_box_inner" >

            <div class="step">

           

              <div class="step_info">

                <div class="step_number">Step-1</div>

                <div class="step_information">Tap ‘INSTALL NOW’</div>

              </div>

            </div>

            <div class="step">

              <div class="step_info">

                <div class="step_number">Step-2</div>

                <div class="step_information">Tap 'OK' when prompted</div>

              </div>

            </div>

          </div>

          <div class="step_box_inner">

            <div class="step">

              <img src="../../d13ir53smqqeyp.cloudfront.net/d11-static-pages/images/step-3.png" alt="" width="380">

              <div class="step_info">

                <div class="step_number">Step-3</div>

                <div class="step_information">Go to 'Settings' and then tap on 'Security'</div>

              </div>

            </div>

            <div class="step">

              <img src="../../d13ir53smqqeyp.cloudfront.net/d11-static-pages/images/step-4_1.png" alt="" width="380">

              <div class="step_info">

                <div class="step_number">Step-4</div>

                <div class="step_information">Enable 'Unknown Sources' to allow installation</div>

              </div>

            </div>

          </div>

          <div class="step_box_inner">

            <div class="step">

              <img src="../../d13ir53smqqeyp.cloudfront.net/d11-static-pages/images/step-5.png" alt="" width="380">

              <div class="step_info">

                <div class="step_number">Step-5</div>

                <div class="step_information">Tap ‘OK’ when asked for confirmation</div>

              </div>

            </div>

            <div class="step">

              <img src="../../d13ir53smqqeyp.cloudfront.net/d11-static-pages/images/step-6.png" alt="" width="380">

              <div class="step_info">

                <div class="step_number">Step-6</div>

                <div class="step_information">Tap 'INSTALL'. That's it! Ready to win?</div>

              </div>

            </div>

          </div>

        </div>

      </div> 

    </div>

  </section>



  <section class="app_call_to_action">

    <div class="container">

      <h3>DOWNLOAD THE DREAM11 APP NOW</h3>


    </div>

  </section>





  




  <script>

    /*-- script for responsive carousel --*/

    (function($) {

      $(function() {

        var jcarousel = $('.jcarousel');



        jcarousel

          .on('jcarousel:reload jcarousel:create', function () {

            var carousel = $(this),

              width = carousel.innerWidth();



            if (width >= 900) {

              width = width / 5;

              $('.jcarousel-control-prev, .jcarousel-control-next').hide();

            } else if (width <= 766){

              width = width / 2;

            }



            carousel.jcarousel('items').css('width', Math.ceil(width) + 'px');

          })

          .jcarousel();



        $('.jcarousel-control-prev')

          .on('jcarouselcontrol:active', function() {

            $(this).removeClass('inactive');

          })

          .on('jcarouselcontrol:inactive', function() {

            $(this).addClass('inactive');

          })

          .jcarouselControl({

            target: '-=1'

          });



        $('.jcarousel-control-next')

          .on('jcarouselcontrol:active', function() {

            $(this).removeClass('inactive');

          })

          .on('jcarouselcontrol:inactive', function() {

            $(this).addClass('inactive');

          })

          .jcarouselControl({

            target: '+=1'

          });

      });

    })(jQuery);





  $(document).ready(function() {

    $('.show_steps').click(function() {

      $('.step_inner_wrapper').slideToggle("slow");

      $(this).toggleClass("open");

    });



  });



  (function(i, s, o, g, r, a, m) {

      i['GoogleAnalyticsObject'] = r;

      i[r] = i[r] || function() {

          (i[r].q = i[r].q || []).push(arguments)

      }, i[r].l = 1 * new Date();

      a = s.createElement(o),

          m = s.getElementsByTagName(o)[0];

      a.async = 1;

      a.src = g;

      m.parentNode.insertBefore(a, m)

  })(window, document, 'script', '../../www.google-analytics.com/analytics.js', 'ga');



  ga('create', 'UA-7674646-4', 'auto');

  ga('require', 'GTM-TX3HC37');

  ga('send', 'pageview');

  document.getElementById("regUser").addEventListener("click", function(){

    ga('send', {

      hitType: 'event',

      eventCategory: 'Invite All Landing Page',

      eventAction: 'button click',

      eventLabel: 'get app link clicked referral desktop page'

    });

  });



  document.getElementById("referral_ios").addEventListener("click", function(){

    ga('send', {

      hitType: 'event',

      eventCategory: 'Invite All Landing Page',

      eventAction: 'button click',

      eventLabel: 'appstore button referral desktop page'

    });

  });



  document.getElementById("referral_android").addEventListener("click", function(){

    ga('send', {

      hitType: 'event',

      eventCategory: 'Invite All Landing Page',

      eventAction: 'button click',

      eventLabel: 'android button referral desktop page'

    });

  });



  document.getElementById("download_referral_apk").addEventListener("click", function(){

    ga('send', {

      hitType: 'event',

      eventCategory: 'Invite All Landing Page',

      eventAction: 'button click',

      eventLabel: 'download app referral mobile page'

    });

  });



  </script>

</body>



<!-- Mirrored from www.dream11.com/games/invite-all-to-play by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Dec 2018 06:49:19 GMT -->

</html>

