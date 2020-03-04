<!doctype html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
    <script type="text/javascript"> var SITE_URL = "<?php echo base_url(); ?>" ;  </script>
    <!-- End Google Tag Manager -->
    <title>Login & Play</title>
    <link rel="canonical" href="cricket.html">


<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo base_url('web_assets/stylesheets/mobile/popup/forgot-passwordc70c.css?v=15.32')?>" /> 

<script type="text/javascript"> var site_url = "<?php echo site_url();?>" </script>
<style type="text/css">
html,
body,
div,
span,
applet,
object,
iframe,
h1,
h2,
h3,
h4,
h5,
h6,
p,
blockquote,
pre,
a,
abbr,
acronym,
address,
big,
cite,
code,
del,
dfn,
em,
img,
ins,
kbd,
q,
s,
samp,
small,
strike,
strong,
sub,
sup,
tt,
var,
b,
u,
i,
center,
dl,
dt,
dd,
ol,
ul,
li,
fieldset,
form,
label,
legend,
table,
caption,
tbody,
tfoot,
thead,
tr,
th,
td,
article,
aside,
canvas,
details,
embed,
figure,
figcaption,
footer,
header,
hgroup,
menu,
nav,
output,
ruby,
section,
summary,
time,
mark,
audio,
video {
    margin: 0;
    padding: 0;
    border: 0;
    vertical-align: baseline
}

article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
menu,
nav,
section {
    display: block
}

ol,
ul {
    list-style: none
}

table {
    border-collapse: collapse;
    border-spacing: 0
}

a {
    text-decoration: none
}

.flotBtn {
    position: absolute;
    bottom: 15%;
    right: 5%
}

.loaderHide {
    display: none
}

label {
    float: left;
    font-size: .95em;
    padding: 0 0 3px;
    width: 100%
}

label.errorLabel,
label.error {
    background: #e13939;
    border-radius: 4px;
    display: none;
    color: #fff;
    float: left;
    margin: 5px 0 0 !important;
    padding: 3px 5px !important;
    width: auto;
    z-index: 0
}

input,
select,
textarea {
    background-color: #ffffff;
    box-sizing: border-box;
    position: relative
}

select,
textarea {
    float: left
}

input:focus,
select:focus,
textarea:focus {
/*    border: 1px solid #4a4a4a !important;
*/    outline: none
}

input.errorInput,
input.error,
select.errorInput,
select.error,
textarea.errorInput,
textarea.error {
    border-color: #f00;
    background: #faeeee
}

button,
input[type="button"],
input[type="reset"],
input[type="submit"] {
    -webkit-appearance: none;
    cursor: pointer;
    border: none !important
}

@media only screen and (min-device-width:375px) and (max-device-width:667px) and (orientation:portrait) and (-webkit-min-device-pixel-ratio:2) {
    body {
        font-size: .875em
    }
}

@media only screen and (min-device-width:414px) and (max-device-width:736px) and (device-width:414px) and (device-height:736px) and (orientation:portrait) and (-webkit-min-device-pixel-ratio:3) and (-webkit-device-pixel-ratio:3) {
    body {
        font-size: .938em
    }
}

body {
    font-family: arial;
    font-size: .75em;
    line-height: 1
}

body{background-image:url("<?php echo base_url('web_assets/public/imgs/desktop-pwa_2.jpg'); ?>");position:fixed;left:0px;right:0;background-size:cover;top:0;bottom:0}

#toast-container,
.message-box,
.message-close {
    display: flex;
    width: 100%
}

.toast {
    border-radius: 4px;
    margin-bottom: 8px;
    letter-spacing: 1px;
    padding: 3% 5%
}

.toast:hover {
    box-shadow: #666 0 0 8px;
    cursor: pointer
}

#toast-container {
    top: 0;
    left: 0;
    flex-direction: column;
    z-index: 9999;
    position: absolute
}

.toast-title {
    font-weight: 700;
    text-transform: uppercase
}

.toast-message {
    line-height: 1.5;
    margin: 2% 0 0
}

.message-box {
    height: 90px;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .2);
    position: fixed;
    top: 0;
    left: 0;
    flex-direction: column;
    max-width: 550px;
}

.message-text {
    font-size: 14px;
    color: #fff;
    flex-grow: 1;
    align-items: center;
    text-align: center;
    line-height: 1.4em;
    padding-top: 1em;
    justify-content: center
}

.message-close {
    align-items: center;
    justify-content: center;
    padding: 0 8px
}

.message-close-button {
    background-color: transparent;
    cursor: pointer;
    padding: 0;
    margin: 0;
    height: 30px;
    width: 40px;
    border: 0
}

.message-close svg {
    width: 16px
}

.message--success {
    background: #24ba38
}

.message--error {
    background: #fc7815;
    color: #fff
}

.message--info {
    background: #24ba38;
    color: #fff
}

.message--warning {
    background: #fc7815;
    color: #fff
}

#colorbox,
#cboxOverlay,
#cboxWrapper {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 9999
}

#cboxOverlay {
    position: fixed;
    width: 100%;
    height: 100%
}

#cboxMiddleLeft,
#cboxBottomLeft {
    clear: both
}

#cboxContent {
    position: relative
}

#cboxLoadedContent {
    -webkit-overflow-scrolling: touch;
    overflow: visible
}

#cboxTitle {
    margin: 0
}

#cboxLoadingOverlay,
#cboxLoadingGraphic {
    display: none;
    position: absolute;
    top: 0;
    left: 0
}

#cboxPrevious,
#cboxNext,
#cboxClose,
#cboxSlideshow {
    cursor: pointer
}

.cboxPhoto {
    float: left;
    margin: auto;
    border: none;
    display: block;
    max-width: none
}

.cboxIframe {
    width: 100%;
    height: 100%;
    border: none;
    display: block
}

#colorbox,
#cboxContent,
#cboxLoadedContent {
    box-sizing: content-box;
    -moz-box-sizing: content-box;
    -webkit-box-sizing: content-box
}

#cboxOverlay {
    background: rgba(0, 0, 0, 0.8)
}

#colorbox {
    outline: 0
}

#cboxContent {
    border-radius: 4px;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px
}

.cboxIframe {
    background: #fff
}

#cboxError {
    padding: 50px;
    border: #ccc solid 1px
}

#cboxTitle {
    position: absolute;
    bottom: 4px;
    left: 0;
    text-align: center;
    width: 100%;
    color: #949494
}

#cboxCurrent {
    position: absolute;
    bottom: 4px;
    left: 58px;
    color: #949494
}

#cboxPrevious,
#cboxNext,
#cboxSlideshow {
    border: none;
    padding: 0;
    margin: 0;
    overflow: visible;
    width: auto;
    background: none
}

#cboxPrevious:active,
#cboxNext:active,
#cboxSlideshow:active,
#cboxClose:active {
    outline: 0
}

.cboxIE #cboxTopLeft,
.cboxIE #cboxTopCenter,
.cboxIE #cboxTopRight,
.cboxIE #cboxBottomLeft,
.cboxIE #cboxBottomCenter,
.cboxIE #cboxBottomRight,
.cboxIE #cboxMiddleLeft,
.cboxIE #cboxMiddleRight {
    background: #fff;
    background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #fff), color-stop(1, #fff));
    background: -ms-linear-gradient(bottom, #fff, #fff);
    background: -moz-linear-gradient(center bottom, #fff 0, #fff 100%);
    background: -o-linear-gradient(#fff, #fff);
    filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ffffff', GradientType=0)
}

#cboxLoadedContent {
    border-radius: 4px
}

.infoPopup {
    float: left;
    padding: 6% 0 0;
    position: relative
}

.infoPopup .popupClose {
    
    background-size: contain;
    cursor: pointer;
    float: right;
    height: 1.667em;
    position: absolute;
    right: 5%;
    text-indent: -9999px;
    top: 5%;
    width: 1.667em
}

.genericPopup {
    float: left
}

.genericPopup .popupClose {
    background: url("https://d13ir53smqqeyp.cloudfront.net/d11-static-pages/images/close.svg") no-repeat left top;
    background-size: contain;
    cursor: pointer;
    float: right;
    height: 1.667em;
    position: absolute;
    right: 5%;
    text-indent: -9999px;
    top: 20%;
    width: 1.667em
}

.genericPopup .popupTitle {
/*    background: #c51d23;*/
    box-sizing: border-box;
    font-family: Montserrat;
      font-size: 16px;
      font-weight: normal;
      font-style: normal;
      font-stretch: normal;
      line-height: 1.5;
      letter-spacing: normal;
      text-align: left;
      color: #2a2a2a;
    position: relative;
    padding: 4.645%;
    width: 100%
}

.genericPopup .popupInner {
    float: left;
    padding: 5%;
    line-height: 1.3;
    width: 90%
}

.genericPopup .popupInner h4 {
    float: left;
    text-align: center;
    margin: 0 0 10px;
    width: 100%
}

.genericPopup .popupInner p {
    font-family: Montserrat;
    font-size: 12px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.33;
    letter-spacing: normal;
    text-align: left;
    color: #7b7a7a;
    margin: 0 0 10%;
    width: 100%
}

.transparentPopup {
    float: left;
    padding: 6% 0 0;
    position: relative
}

.transparentPopup .popupClose {
    background-size: contain;
    cursor: pointer;
    float: right;
    height: 1.667em;
    position: absolute;
    right: 5%;
    text-indent: -9999px;
    top: 3%;
    width: 1.667em
}

a {
    color: #fff;
    outline: none
}

#login_left_wrapper{ background: #fafafa;}

.loginSignup {
    /*background: #b4181d;*/
    float: left;
    position: relative;
    width: 100%;
    z-index: 1
}

.loginSignup>header {
    float: left;
    position: relative;
    text-align: center;
    width: 100%
}

.loginSignup>header .logo {
    margin: 6% 0 2% 0;
    width: 58%
}

.loginSignup>header .tagLine {
    color: #fff;
    letter-spacing: .5px
}

.loginSignup>section {
    float: left;
    width: 100%;
    margin: 0;
    position: relative
}

.loginSignup>section .title {
    font-size: 1.333em;
    color: #fff;
    text-align: center;
    margin: 5% 0 0 0;
    font-weight: bold
}

.loginSignup>section .selectTitle {
    color: #fff;
    text-align: center;
    margin: 8.333em 0 0 0;
    font-weight: bold;
    line-height: 1.3em
}

.loginSignup>section .selectBox {
    width: 80%;
    float: left;
    margin: 7% 10% 0 10%
}

.loginSignup>section .selectBox a {
    text-decoration: none
}

.loginSignup>section .selectBox .cricket {
    float: left;
    background-image: url("")
}

.loginSignup>section .selectBox .football {
    float: right;
    background-image: url("")
}

.loginSignup>section .selectBox .cricket,
.loginSignup>section .selectBox .football {
    width: 48%;
    background-color: rgba(255, 255, 255, 0.1);
    background-repeat: no-repeat;
    background-position: center 25%;
    border: solid 1px rgba(255, 255, 255, 0.3);
    border-radius: 4px;
    padding: 3%;
    box-sizing: border-box
}

.loginSignup>section .selectBox .cricket:active,
.loginSignup>section .selectBox .football:active {
    border: solid 1px rgba(255, 255, 255, 0.9)
}

.loginSignup>section a {
    text-decoration: none
}

.loginSignup>section .howToPlayMain {
    width: 100%;
    float: left;
    margin: 0
}

.loginSignup>section .howToPlay {
    text-align: center;
    color: #fff;
    font-size: 1.167em
}

.loginSignup>section .howToPlay .navArw {
    background: url("") no-repeat center top;
    width: 16px;
    height: 12px;
    text-indent: -9999em;
    margin: 3% auto
}

.loginSignup .loginSignupCont {
    width: 100%;
    float: left
}

.loginSignup .loginSignupCont .testimonial {
    background: #fafafa;
    width: 100%;
    float: left;
    padding: 7% 3%;
    box-sizing: border-box
}

.loginSignup .loginSignupCont .testimonial h3.age_group {
    color: #000;
    font-size: 1.35em;
    font-weight: bold;
    line-height: 1.3;
    margin: 0 5%;
    text-align: center;
    width: 90%
}

.loginSignup .loginSignupCont .testimonial .carousel {
    float: left;
    box-sizing: border-box;
    overflow: hidden;
    position: relative;
    padding: 2.78% 0;
    width: 100%
}

.loginSignup .loginSignupCont .testimonial .carousel .jcarousel {
    margin: 0 auto;
    width: 100%
}

.loginSignup .loginSignupCont .testimonial .carousel .jcarousel>ul {
    float: left;
    box-sizing: border-box;
    position: relative;
    width: 15000em
}

.loginSignup .loginSignupCont .testimonial .carousel .jcarousel>ul>li {
    float: left;
    width: 100%
}

.loginSignup .loginSignupCont .testimonial .carousel .jcarouCtrlBtn {
    color: #000;
    left: -500%;
    font-size: 2em;
    position: absolute;
    top: 45%;
    z-index: 1
}

.loginSignup .loginSignupCont .testimonial .carousel .jcarousel-pagination {
    float: left;
    padding: 10% 0 0;
    text-align: center;
    width: 100%
}

.loginSignup .loginSignupCont .testimonial .carousel .jcarousel-pagination>a {
    background: #dedede;
    border-radius: 50%;
    display: inline-block;
    height: 8px;
    margin: 0 3px;
    text-indent: -9999px;
    width: 8px
}

.loginSignup .loginSignupCont .testimonial .carousel .jcarousel-pagination>a.active {
    background: #c61d22
}

.loginSignup .loginSignupCont .testimonial h3 {
    color: #c61d22;
    font-size: 1.2em;
    float: left;
    font-weight: 700;
    margin: 0 0 5%;
    text-align: center;
    width: 100%
}

.loginSignup .loginSignupCont .testimonial>h3.age_group>span {
    color: #c61d22
}

.loginSignup .loginSignupCont .testimonial .image {
    float: left;
    margin: 0 0 15px;
    text-align: center;
    width: 100%
}

.loginSignup .loginSignupCont .testimonial .image>img {
    width: 36%
}

.loginSignup .loginSignupCont .testimonial .image.vdthumb img {
    width: 100%
}

.loginSignup .loginSignupCont .testimonial .tesText {
    float: left;
    line-height: 1.4;
    margin: 0 15%;
    position: relative;
    text-align: center;
    width: 70%
}

.loginSignup .loginSignupCont .testimonial .quote {
    float: left;
    left: -12%;
    position: absolute;
    top: -13%;
    width: 10%
}

.loginSignup .loginSignupCont .testimonial .quote>img {
    width: 100%
}

.loginSignup .loginSignupCont .alsoPlay {
    background: #fff;
    width: 100%;
    float: left;
    padding: 7% 3%;
    box-sizing: border-box
}

.loginSignup .loginSignupCont .alsoPlay h3 {
    font-size: 1.333em;
    font-weight: bold;
    color: #4a4a4a;
    text-align: center;
    margin: 5% 0 0 0
}

.loginSignup .loginSignupCont .alsoPlay .logos {
    width: 100%;
    float: left;
    margin: 10% 0;
    text-align: center
}

.loginSignup>section .slides:after {
    content: "";
    width: 20%;
    margin: 10% 40%;
    height: 2px;
    background: #fff;
    opacity: .4;
    float: left
}

.loginSignup>section .slides.last:after {
    content: "";
    margin: 5% 40%;
    height: 0 !important;
    float: left
}

.loginSignup>section .slides {
    color: #fff;
    text-align: center;
    width: 100%;
    float: left
}

.loginSignup>section .slides>.image {
    float: left;
    margin: 1em 0;
    text-align: center;
    width: 100%
}

.loginSignup>section .slides>h2 {
    float: left;
    font-size: 1.25em;
    margin: 2.3% 0;
    width: 100%
}

.loginSignup>section .slides>p {
    float: left;
    font-size: 1.167em;
    line-height: 1.3em;
    margin: 0 5%;
    width: 90%
}

.loginSignup>section .slides>a {
    display: inline-block;
    font-size: 1.1em;
    position: relative;
    padding: 12px 42px
}

.loginSignup>section .slides>a span {
    border: 1px solid #fff;
    border-radius: 40px;
    display: block;
    height: 36px;
    position: relative;
    margin: 1em auto;
    width: 36px
}

.loginSignup>section .slides>.pdTop3 {
    padding: 3% 0 0 0
}

.loginSignup .loginSignupCont .tabs {
    background: #e8e8e8;
    border-radius: 4px 4px 0 0;
    color: #3759a5;
    font-weight: bold;
    float: left;
    margin: 5% 6.252% 0;
    overflow: hidden;
    padding: 0 0;
    width: 87.496%
}

.loginSignup .loginSignupCont .tabs p {
    float: left;
    font-size: .9em;
    padding: 3.93% 0;
    text-align: center;
    width: 50%
}

.loginSignup .loginSignupCont .tabs p:last-child {
    float: right
}

.loginSignup .loginSignupCont .tabs p.sel {
    background: #fff;
    color: #c51d23;
    font-weight: bold
}

.loginSignup .loginSignupCont .form {
    background: #fff;
    border-radius: 4px;
    box-sizing: border-box;
    float: left;
    margin: 0 4% 16px;
    padding: 16px 12px;
    width: 92%;
    box-shadow: 0 0px 10px 0 rgba(0, 0, 0, 0.2);
}

.loginSignup .socLogin {
    float: left;
    margin: 0 0 10px 0;
    width: 100%
}

.loginSignup .socLogin a {
    border-radius: 4px;
    float: left;
    margin: 0 0 0 0;
    padding: 14px 0;
    text-align: center;
    width: 48%;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2);
}

.loginSignup .socLogin a span {
    
    font-family: Montserrat;
    font-size: 12px;
    padding: 2px 0 2px 15%;
    text-align: right
}

.loginSignup .socLogin a.fb span {
    background: url("<?php echo base_url('web_assets/image/facebook-ico-login.png');?>") no-repeat 0;
    background-size: 21%;
    color: #4460a0;
}

.loginSignup .socLogin a.go {
    /*background: #dc472e;*/
    float: right
}

.loginSignup .socLogin a.go span {
    background: url("<?php echo base_url('web_assets/image/google-ico-login.png');?>") no-repeat 0;
    background-size: 24%;
    color: #7b7a7a;
}

.loginSignup .loginSignupCont .form .or {
    float: left;
    text-align: center;
    width: 100%;
    font-family: Montserrat;
    font-size: 12px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.33;
    letter-spacing: normal;
    text-align: center;
    color: #9b9b9b;
}

.loginSignup .txtField {
    float: left;
    margin: 20px 0 0;
    position: relative;
    width: 100%
}

.loginSignup .txtField label {
    float: left;
    font-size: 12px;
    padding: 0 0 3px;
    width: 100%
}

.loginSignup .loginSignupCont .form .loginForm,
.loginSignup .loginSignupCont .form .signupForm {
    float: left;
    width: 100%
}

.loginSignup .txtField input {
    background-color: #ffffff;
    border: 0px;
    box-sizing: border-box;
    float: left;
    font-size: 2em;
    height: 24px;
    position: relative;
    padding: 1% 0%;
    width: 100%;
    z-index: 1;
    line-height: 24px;
    border-bottom: 1px solid #d5d5d5;
}

.loginSignup .txtField .errorInput {
    border-color: #f00;
    /*background: #faeeee;*/
    color: #c51d23
}

.loginSignup .txtField .errorLabel {
    clear: both;
    background: none;
    border-radius: 4px;
    display: block;
    color: #de4d3b;
    float: left;
    margin: 0px;
    padding: 0px !important;
    width: auto;
    z-index: 0;
    top: 37px;
    font-family: Montserrat;
  font-size: 10px;
}

.loginSignup .actBtn {
    float: left;
    margin: 25px 0 0;
    position: relative;
    width: 100%
}

.loginSignup .blueBtn {
    background: #28baff;
    color: #fff;
    border-radius: 4px;
    text-align: center;
    padding: 11px 5%;
    width: 90%;
    font-family: Montserrat;
    font-size: 14px;
    text-transform: uppercase;
    font-weight: 500;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    text-align: center;
    display: inline-block;
}

.loginSignup .blueBtn#regUser {
    background: #28baff;
}

.loginSignup .agree {
    float: left;
    margin: 6% 0 0;
    position: relative;
    width: 100%
}

.loginSignup .agree .chkbox {
    border: solid 1px #ccc;
    border-radius: 75%;
    width: 20px;
    height: 20px;
    float: left;
    margin: 0 5px 0 0
}

.loginSignup .agree .chkbox input {
    visibility: hidden
}

.loginSignup .agree .chkbox.checked {
    background: url("") center no-repeat #25ba38;
    border: solid 1px #25ba38;
    background-size: 60%
}

.loginSignup .agree .chkbox.sel {
    background: url("") center no-repeat #25ba38;
    border: solid 1px #25ba38;
    background-size: 60%
}

.loginSignup .agree span {
    float: left;
    margin: 4px 0 0
}

.loginSignup .agree span a {
    color: #4a90e2
}

.loginSignup .agree .errorLabel {
    background: #e13939;
    border-radius: 4px;
    display: none;
    color: #fff;
    float: left;
    margin: 5px 0 0;
    padding: 3px 5px;
    width: auto;
    z-index: 0
}

.loginSignup .forgotPass {
    padding: 20px 0 5px 0;
    width: 100%;
    text-align: center;
    clear: both
}

.loginSignup .forgotLink {
    font-family: Montserrat;
    font-size: 12px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    text-align: left;
    color: #3759a5;
}

.loginSignup .watchVideo {
    border-radius: 4px;
    background-color: rgba(255, 255, 255, 0.2);
    border: solid 1px #ffffff;
    box-sizing: border-box;
    color: #fff;
    float: left;
    font-size: 1.2em;
    margin: 0 6.252% 5%;
    padding: 4% 3.126%;
    text-align: center;
    width: 87.496%
}

.loginSignup .watchVideo strong {
    background: url("") 0 no-repeat;
    background-size: 19%;
    padding: 3% 0 3% 11%
}

.loginSignup .nextMatch {
    background: #fff;
    padding: 3.126%;
    float: left;
    width: 93.748%
}

.loginSignup .nextMatch .clock-icon {
    background: url("") 0 no-repeat;
    background-size: contain;
    height: 54px;
    margin: 3% auto;
    width: 44px
}

.loginSignup .tourMatches {
    background: #fff;
    border: 1px solid #e8e8e8;
    border-radius: 5px;
    float: left;
    margin: 3% 3% 0;
    padding: 0;
    text-align: center;
    width: 94%
}

.loginSignup .tourMatches:last-child {
    margin: 3% 3%
}

.loginSignup .match {
    float: left;
    padding: 4%;
    text-align: center;
    width: 92%
}

.loginSignup .mtType {
    color: #9b9b9b;
    float: left;
    margin: 0 0 5%;
    width: 100%
}

.loginSignup .team {
    float: left;
    margin: 0 0 5%;
    width: 46%
}

.loginSignup .team.secTm span:first-child {
    margin: 0 0 0 6%
}

.loginSignup .team span:first-child {
    float: left;
    margin: 0 6% 0 0
}

.loginSignup .team.secTm span {
    float: right
}

.loginSignup .tmName {
    float: left;
    margin: 1.8% 0
}

.loginSignup .vs {
    float: left;
    font-size: .95em;
    padding: 1% 0;
    width: 8%
}

.loginSignup .mtdetail {
    float: left;
    width: 100%
}

.loginSignup .timeDiv {
    color: #e13939;
    display: inline-block;
    font-weight: bold;
    font-size: 2.3em;
    padding: 0
}

.loginSignup .rndclosed .timeDiv {
    background: none;
    padding: 0
}

.loginSignup .timeDiv i {
    font-size: .9em;
    font-style: normal;
    font-weight: normal
}

.loginSignup .createTeam {
    float: left;
    margin: 4% 0 2%;
    text-align: center;
    width: 100%
}

.loginSignup .btn {
    border-radius: 4px;
    background-color: #f5a623;
    display: inline-block;
    padding: 5%
}

.loginSignup .btn span {
    background: url("") 100% center no-repeat;
    background-size: 20%;
    font-size: 1.2em;
    padding: 0 45px 0 0
}

.loginSignup>header .topLinkContainer {
    width: 98%;
    float: left;
    margin: 0 2% 0 0;
    text-align: right
}

.loginSignup>header .topLink {
    font-size: .75em;
    color: #eee;
    margin: 2% 0 0;
    padding: 1.5% 1% .7%;
    border: 1px solid rgba(255, 255, 255, 0.3);
    display: inline-block;
    border-radius: 2px
}

#cboxClose {
    background: url("") no-repeat left top;
    background-size: contain;
    cursor: pointer;
    float: right;
    height: 1.667em;
    position: fixed;
    right: 5%;
    text-indent: -9999px;
    top: 3%;
    width: 1.667em
}

.loaderHide {
    display: none;
}

.loginSignup .loginSignupCont .refTab p {
    width: 100%
}

.refForm .socLogin {
    background: #e8e8e8;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 3% 7%;
    margin: 4% 0 4%;
    width: 86%
}

.refForm .socLogin a {
    width: 45%
}

.refForm .socLogin a span {
    padding: 4% 0 4% 18%
}

.refForm .socLogin a.fb span {
    background-size: 16% auto
}

.refForm .socLogin .promoTxt {
    font-weight: bold;
    text-align: left;
    margin-bottom: 8px;
    width: 100%
}

.refForm .socLogin .smText {
    color: #9b9b9b;
    clear: both;
    float: left;
    font-size: .833em;
    margin-top: 8px;
    width: 100%
}

.refForm .loginText {
    clear: both;
    float: left;
    text-align: center;
    margin: 15px 0 5px;
    width: 100%
}

.refForm .loginText a {
    color: #4a90e2
}

.loginSignup .inviteFrLink {
    clear: both;
    float: left;
    text-align: left;
    margin: 0px;
    width: 100%;
}



.cplLogo {
    width: 100%;
}

.cplLogo img {
    width: 100%;
    display: block;
}

#socialReminderPop {
    width: 300px;
}

.login_reg_header{
    height: 54px;
    line-height: 63px;
    /*background: #00bcac;*/
    background: linear-gradient(63deg, #00255c 42%,#00bcac 72%) !important;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.3);
    font-family: Montserrat;
    font-size: 14px;
    font-weight: 500;
    font-style: normal;
    font-stretch: normal;
    letter-spacing: normal;
    color: #ffffff;
    margin-bottom: 16px;
}

.register_header, .login_header{
    font-family: Montserrat;
    font-size: 14px;
    font-weight: 500;
    font-style: normal;
    font-stretch: normal;
    letter-spacing: normal;
    color: #323232;
    text-align: center;
}
.form_title{clear: both; margin-bottom: 16px;}


/* form starting stylings ------------------------------- */
.group            { 
  position:relative; 
  margin-bottom:45px; 
}
input               {
  font-size:18px;
  padding:10px 10px 10px 5px;
  display:block;
  width:300px;
  border:none;
  border-bottom:1px solid #757575;
}
input:focus         { outline:none; }

/* LABEL ======================================= */
label                {
    color:#323232; 
    font-family: Montserrat;
      font-size: 12px;
      font-weight: 500;
    position:absolute;
    pointer-events:none;
    left:0px;
    top:6px;
    transition:0.2s ease all; 
    -moz-transition:0.2s ease all; 
    -webkit-transition:0.2s ease all;
    z-index: 1;
}

/* active state */
input:focus ~ label, input:valid ~ label, input:-webkit-autofill ~ label{
  top:-12px;
  font-size:10px !important;
  color:#5264AE;
}

/* BOTTOM BARS ================================= */
.bar    { /*position:relative;*/ display:block; width:300px; }
.bar:before, .bar:after     {
  content:'';
  height:2px; 
  width:0;
  bottom:15px; 
  position:absolute;
  background:#5264AE; 
  transition:0.2s ease all; 
  -moz-transition:0.2s ease all; 
  -webkit-transition:0.2s ease all;
  z-index: 2
}
.bar:before {
  left:50%;
}
.bar:after {
  right:50%; 
}

/* active state */
input:focus ~ .bar:before, input:focus ~ .bar:after {
  width:50%;
}

/* HIGHLIGHTER ================================== */
.highlight {
  position:absolute;
  height:60%; 
  width:100px; 
  top:25%; 
  left:0;
  pointer-events:none;
  opacity:0.5;
}

/* active state */
input:focus ~ .highlight {
  -webkit-animation:inputHighlighter 0.3s ease;
  -moz-animation:inputHighlighter 0.3s ease;
  animation:inputHighlighter 0.3s ease;
}

/* ANIMATIONS ================ */
@-webkit-keyframes inputHighlighter {
    from { background:#5264AE; }
  to    { width:0; background:transparent; }
}
@-moz-keyframes inputHighlighter {
    from { background:#5264AE; }
  to    { width:0; background:transparent; }
}
@keyframes inputHighlighter {
    from { background:#5264AE; }
  to    { width:0; background:transparent; }
}

.input_description{
    font-family: Montserrat;
    font-size: 10px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    text-align: left;
    color: #7b7a7a;
    clear: both;
    margin-top: 27px;

}

.tnc_agreed{
    font-family: Montserrat;
    font-size: 12px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #7b7a7a;
    text-align: center;
    clear: both;
    padding-top: 20px;
    padding-bottom: 4px;
}
.tnc_agreed a{
    color: #3759a5;
}

.login_invite{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-template-rows: auto;
    clear: both;
    margin: 0 4%;}

.title_box{
    font-family: Montserrat;
    font-size: 12px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #7b7a7a;}
.link_box{
    font-family: Montserrat;
    font-size: 12px;
    font-weight: 500;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    text-align: left;
    color: #3759a5;
}

.login_link_box{text-align: right;}
.loginSignup #LoginForm .txtField .errorLabel{
    top: 24px;
}

.forgotPassword .group{
    margin-bottom: 16px;
}

#forgotPasswordPopup .bar:before, #forgotPasswordPopup .bar:after{
    bottom: 13px;
}
</style>
<h2 class="loaderHide" style="text-align:center; margin:10% 0;">Loading...</h2>
</head>
<body>
    <div class="left_site_content" id="login_left_wrapper">
        <div class="loginSignup">
          <header class="login_reg_header">
            UAB League
          </header>
            <div class="form_title">
                <div class="login_header" >LOG IN & PLAY</div>
            </div>
          <section>
            <div class="loginSignupCont">
                <div class="loginForm formdiv">
                    <div class="form">
                        <div id="error_login_emailorPass"></div>
                        <div class="socLogin"><a href="#" class="fb" id="loginform_facebook"><span>Facebook</span></a> <a href="<?php echo $goolge_login_url; ?>" class="go" id="loginform_google"><span>Google</span></a> </div>
                        <div class="or">or</div>
                        <form id="LoginForm" method="POST">
                        <div class="loginFrm">
                            <div class="txtField group">
                                <input type="email/text" id="otp" name="otp" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Otp ( First Time Required )</label>
                                <div class="input_description">&nbsp;</div>
                                <label for="LoginFormEmail" generated="true" id="loginotpError" style="display: none" class="errorLabel"></label>
                            </div>
                            <div class="txtField group">
                                <input type="email/text" id="LoginFormEmail" name="email" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Email or Mobile </label>
                                <div class="input_description">&nbsp;</div>
                                <label for="LoginFormEmail" generated="true" id="loginotpError" style="display: none" class="errorLabel"></label>
                            </div>
                            <div class="txtField group">
                                <input type="password" id="LoginFormPassword" name="password" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Password</label>
                                <div class="input_description" >&nbsp;</div>
                                <label for="LoginFormPassword" id="loginPassErr" generated="true" style="display: none" class="errorLabel"></label>
                            </div>
                            <div class="actBtn"> <a id="LoginFormSubmit" onclick="login()" name="loginsubmit" href="javascript:;" class="blueBtn" href="">Log In</a> </div>
                            <p class="forgotPass"><a href="#container" id="myBtn" data-reveal-id="exampleModal" class="forgotLink" >Forgot Password?</a></p>
                            
                        </div>
                        </form>
                    </div>

                    <div class="login_invite">
                        <div class="invite">
                        </div>
                        <div class="login_link_box">
                            <div class="title_box">New user?</div>
                            <a class="link_box" id="register_jump" href="<?php echo base_url('website/registration'); ?>">Register</a>
                        </div>
                    </div>
                </div>
                </div>
          </section>
        </div>
    </div>
<style>
    body{overflow: hidden;}
    .left_site_content {
        display: inline-block;
        width: 100% ;
         max-width:550px;
        left: 0;
        top: 0;
        background: #fff;
        z-index: 1;
        position: relative;
        height: 100vh;
        overflow-y: scroll;
    }
    .right_banner{position: fixed; right: 0px; top: 0px; width: 62%; height: 100%; background: url('web_assets/image/right_banner_desktop.jpg) no-repeat; background-size: cover;height: 100vh;')}
    .right_banner img{width: 100%;}
    .left_mobile_box{
        max-width: 550px;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0px;
    }

    @media (min-width: 1440px){
        .left_site_content{
            width: 38%;
            max-width: 38%;
        }
    }

    @media (max-width: 1280px){
        .right_banner{
            width: 57%;
        }
    }

    @media (max-width: 1024px){
        .left_site_content{
            width: 100%;
             max-width:100% !important;
        }
    }

    @media only screen and (max-width: 768px) {
        .left_site_content {
            width: 100%;
            max-width: 100%;
        }

        .right_banner{display:none;}
        .footerInd{
            padding: 3% 0;
        }
    }

    @media only screen and (max-width: 550px) {
        .left_site_content {
            width: 100%;
            max-width: 100%;
        }
    }

    
</style>
<div id="overlayLoader" class="loader" style='display:none;'><div class="loader-inner"><div class="ball-spin-fade-loader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div></div><style type="text/css">.loader{background:rgba(0,0,0,0.7);border-radius:5px;float:left;height:100%;left:0;margin:0 10px 0 0;position:fixed;top:0;width:100%;z-index:20000}.loader-inner{background:#fff;border-radius:5px;height:100px;left:50%;margin:-50px;position:absolute;top:50%;width:100px}.loader-inner:after{content:'Loading...';bottom:8%;left:0;position:absolute;text-align:center;width:100%}.ie9 .loader-inner > div{display:none}.ie9 .loader-inner:after{bottom:43%}@keyframes ball-spin-fade-loader{50%{opacity:.3;-webkit-transform:scale(0.4);transform:scale(0.4)}100%{opacity:1;-webkit-transform:scale(1);transform:scale(1)}}.ball-spin-fade-loader{position:relative;top:28%;left:40%}.ball-spin-fade-loader > div:nth-child(1){top:25px;left:0;-webkit-animation:ball-spin-fade-loader 1s -.96s infinite linear;animation:ball-spin-fade-loader 1s -.96s infinite linear}.ball-spin-fade-loader > div:nth-child(2){top:17.04545px;left:17.04545px;-webkit-animation:ball-spin-fade-loader 1s -.84s infinite linear;animation:ball-spin-fade-loader 1s -.84s infinite linear}.ball-spin-fade-loader > div:nth-child(3){top:0;left:25px;-webkit-animation:ball-spin-fade-loader 1s -.72s infinite linear;animation:ball-spin-fade-loader 1s -.72s infinite linear}.ball-spin-fade-loader > div:nth-child(4){top:-17.04545px;left:17.04545px;-webkit-animation:ball-spin-fade-loader 1s -.6s infinite linear;animation:ball-spin-fade-loader 1s -.6s infinite linear}.ball-spin-fade-loader > div:nth-child(5){top:-25px;left:0;-webkit-animation:ball-spin-fade-loader 1s -.48s infinite linear;animation:ball-spin-fade-loader 1s -.48s infinite linear}.ball-spin-fade-loader > div:nth-child(6){top:-17.04545px;left:-17.04545px;-webkit-animation:ball-spin-fade-loader 1s -.36s infinite linear;animation:ball-spin-fade-loader 1s -.36s infinite linear}.ball-spin-fade-loader > div:nth-child(7){top:0;left:-25px;-webkit-animation:ball-spin-fade-loader 1s -.24s infinite linear;animation:ball-spin-fade-loader 1s -.24s infinite linear}.ball-spin-fade-loader > div:nth-child(8){top:17.04545px;left:-17.04545px;-webkit-animation:ball-spin-fade-loader 1s -.12s infinite linear;animation:ball-spin-fade-loader 1s -.12s infinite linear}.ball-spin-fade-loader > div{background-color:#c61d23;width:15px;height:15px;border-radius:100%;margin:2px;-webkit-animation-fill-mode:both;animation-fill-mode:both;position:absolute}</style>

<link type="text/css" rel="stylesheet" href="<?php echo base_url('web_assets/stylesheets/mobile/popup/errorboxc70c.css?v=15.32')?>" /> 
<style type="text/css">


.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 20%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
    #orentationChangedcboxOverlay {
        background: rgba(0, 0, 0, 0.8);
        display: none;
        opacity: 0.9;
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: 9999;
        top: 0px
    }

    .orentationChanged {
        background: #fff;
        border-radius: 4px;
        display: none;
        float: left;
        left: 50%;
        margin: -10% -40%;
        padding: 15px;
        position: fixed;
        top: 50%;
        text-align: center;
        width: 80%;
        z-index: 10000;
    }

    .orentationChanged .popupTitle {
        color: #c51d23;
        font-weight: bold;
        font-size: 1.2em;
        margin: 0 0 10px;
    }

    .orentationChanged p.desc {
        float: left;
        width: 100%;
    }
    #container {
    width: 100%;
    height: 100%;
    position: absolute;
    visibility:hidden;
    display:none;
    background-color: rgba(22,22,22,0.5);
}

#container:target {
    visibility: visible;
    display: block;
}
.reveal-modal {
    background:#e1e1e1; 
    margin: 0 auto;
    width:300px; 
    position:relative; 
    border-radius: 5px;
    height: 26vh;
    z-index:41;
    top: 25%;
    padding:5px 30px; 
    -webkit-box-shadow:0 0 10px rgba(0,0,0,0.4);
    -moz-box-shadow:0 0 10px rgba(0,0,0,0.4); 
    box-shadow:0 0 10px rgba(0,0,0,0.4);
}
.reveal-modal .blueBtn {
    background: #3759a5;
    color: #fff;
    border-radius: 4px;
    font-size: 1.15em;
    font-weight: 700;
    float: left;
    text-align: center;
    padding: 11px 0;
    width: 100%;
}

</style>

<!-- <div id="container" class="abc">

<div id="exampleModal" class="reveal-modal">
   <h1>Forget Password <a href="#" style="float : right; color: black;" class="close-reveal-modal">×</a></h1>
   <form action="" id="forgetpassword" method="post">
       <div style="margin-top: 25px;">
           <input type="text" name="email" placeholder="Email">
       </div>
       <div style="margin-top: 25px;">
           <button type="submit" class="blueBtn">Send Reset Link</button>
       </div>
   </form>
    
</div>
</div> -->

<div id="myModal"  role="dialog" class="modal fade">
<div class="modal-dialog">
  <!-- Modal content -->
  <div class="modal-content" style="width:40%;">
  <div class="modal-header">
         <span id="for_close" class="close">&times;</span>
       <h1>Forget Password</h1>
      </div>
   
     <center>       
   <form action="" id="forgetpassword"  method="post">
       <div style="margin-top: 25px; " class="form-group">
           <input class="form-control" id="email" type="text" name="email" placeholder="Email">
       </div>
        <span id="for_email_success" style="color: red; float: left; margin-left: 75px; padding: 12px;"></span>
       <span id="for_email_error" style="color: red; float: left; margin-left: 75px; padding: 12px;"></span>
        <div class="modal-footer">
       <div style="margin-top: 25px;" class="form-group">
           <button id="send_forgot" type="button" style="background: #28baff;  color: #fff;    border-radius: 4px;    text-align: center;
    padding: 11px 5%;
    width: 75%;
    font-family: Montserrat;
    font-size: 14px;
    text-transform: uppercase;
    font-weight: 500;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    text-align: center;
    display: inline-block;" class="blueBtn">Send Reset Link</button>
       </div>
       </div>
   </form>
   <center>
  </div>
  </div>

</div>


<!-- <div>
    <div class="genericPopup" id='socialReminderPop'>
        <div class="popupTitle" id="ayushi">Forgot Password?<span class="popupClose d_closePopup">X</span>
        </div>
        <div class="popupInner">
            <p id="d_socialLoginMsg">You had registered through FB/Google login. We recommend you to try with FB/Google to keep it simple and easy!</p>
            <div class="loginSignup">
                <div class="socLogin">
                    <a href="javascript:;" class="fb"><span>Facebook</span></a> 
                    <a href="javascript:;" class="go"><span>Google</span></a>
                    <a href="javascript:;" class="blueBtn closeBtn">OK</a>
                </div>
            </div>
            <a href="javascript:;" id='confirmResetPwd'>Reset password anyway</a>
        </div>
    </div>
</div> -->
</body>

<!-- Mirrored from www.dream11.com/tf/cricket by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Dec 2018 06:49:32 GMT -->
</html>
<script type="text/javascript" src="<?php echo base_url('web_assets/js/jquery-3.2.1.js'); ?>"> </script>

<script type="text/javascript">
    function login() {         
      
    var email = $('#LoginFormEmail').val(); 
    var otp = $('#otp').val(); 
    // var email_ckeck = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if(email == "")
    {
       $("#loginemailError").css("display", "block");
       $("#loginemailError").html('Please enter email or mobile number.');
       return false;
    }

    // else if(!email_ckeck.test( email ))
    // {
    //    $("#loginemailError").css("display", "block");
    //    $("#loginemailError").html('That s not a valid Email ID. ');
    //     return false;
    // }
    
    var password = $('#LoginFormPassword').val();   

    if(password == "")
    {
       $("#loginPassErr").css("display", "block");
       $("#loginPassErr").html('Enter a password.');
        return false;
    }

    else
    {
        /*$.ajax({
            type : 'post',       
            url: SITE_URL+'website/login_post',
            data : { email : email, password : password },
            success : function(data) {
                var response = JSON.parse(data);
                if(response.status == '1')
                {
                    window.location.href = SITE_URL+"website/leagues";
                }
                else if(response.status == '2')
                {
                    $('#error_login_emailorPass').html('Invalid Email or Password').css("color", "#de4d3b"); 
                }      
            }
        });*/
         $.ajax({
            type : 'post',       
            url: SITE_URL+'website/login_post',
            data : { email : email, password : password,otp : otp },
            success : function(data) {
                var response = JSON.parse(data);
                if(response.status == '1')
                {
                    window.location.href = SITE_URL+"website/leagues";
                }
                else if(response.status == '2')
                {
                    $('#error_login_emailorPass').html('Invalid Email or Password').css("color", "#de4d3b"); 
                }

                else if(response.status == '3')
                {
                    $('#error_login_emailorPass').html('Please verify your otp').css("color", "#de4d3b"); 
                }

                else if(response.status == '4')
                {
                    $('#error_login_emailorPass').html('Invalid otp').css("color", "#de4d3b"); 
                }      
            }
        });
    }    

    
};
</script>

<script>
    $("#forgotLink").on('click',function(){
       $('.abc').css("display","block");
       $(".abc").show();
    });
    
    $('.close-reveal-modal').click(function(){
        $('#abc').hide();
    });

</script> 


<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>



<script type="text/javascript" src="<?php echo base_url('web_assets/javascripts/forgetpassword.js')?>"></script>
    