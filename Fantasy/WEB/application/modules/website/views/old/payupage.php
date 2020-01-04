<head>

   <meta charset="utf-8">

   <title>Add amount</title>
   <style>:root{COMMENT:// DEPRECATED: Use jssVariables instead;--color:#323232;--primary-bg-color:#c51d23;--primary-fg-color:#FFF;--primary-selected-bg-color:#ab1a1f;--secondary-fg-color:#888;--button-height:48px;--icon-color:var(--color);--primary-btn-color:#3759a5;--secondary-btn-color:#3759a5;--box-shadow-light:0px 1px 4px 0px rgba(0, 0, 0, 0.2);--box-shadow-dark:0 1px 2px 0 rgba(0, 0, 0, 0.3);--large-button-height:50px;--icon-size:24px;--font-x-small:10px;--font-small:12px;--font-medium:14px;--font-large:24px;--currency-font-color:inherit}</style>

   <style id="app-style">.appContainer_6475d{max-width:550px;height:100%}.appBgImage_fd065{background-image:url('../web_assets/public/imgs/desktop-pwa_2.jpg');position:fixed;left:550px;right:0;background-size:cover;top:0;bottom:0}.loaderContainer_d2930{display:flex;height:100%;align-items:center}.blockLoader_580b6{margin:12px auto}.loaderCircular_00f73{animation:loader-rotate 2s linear infinite}.loaderPath_00e5f{animation:loader-stroke 1.5s ease-in-out infinite;stroke-dasharray:1, 162;stroke-dashoffset:0;stroke-linecap:round;stroke-width:6}.black_7fbc4{stroke:rgba(0, 0, 0, 0.5)}.fadeIn_73e97{animation:fade-in .25s linear}.appHeaderSpacing_cdb56{height:48px}.appToolbar_1ea26{max-width:550px;left:0;top:0;width:100%;position:fixed;box-shadow:0px 1px 4px 0px rgba(0, 0, 0, 0.3);z-index:2}.header_fc30e{height:48px;display:flex;text-align:center;width:100%;justify-content:space-between;align-items:center}.iconButton_fe158{background:none;border:0;cursor:pointer;margin:0;text-decoration:none;text-align:center;font-family:inherit;display:flex;justify-content:center;align-items:center;color:inherit;font-weight:500;font-size:14px;height:48px;padding:0 8px;width:48px}.materialIcon_10a4f{font-family:Material Icons;font-weight:normal;font-style:normal;display:inline-block;line-height:1;text-transform:none;letter-spacing:normal;word-wrap:normal;white-space:nowrap;direction:ltr}.empty_eefde{width:48px}.footer_d9dd6{max-width:550px}.padding_b8f9b{padding:8px}.formField_4712e{margin-top:8px}</style>

 

   <!-- iPhone shortcut icon -->

   <link rel="apple-touch-icon" href="<?php echo base_url('web_assets/public/imgs/pwa-v3-144.png')?>">

   <link rel="manifest" href="<?php echo base_url('web_assets/public/manifest.json')?>">

   <!--PRELOAD-->

   <link rel="preload" as="style" href="<?php echo base_url('web_assets/public/fonts/montserrat-400%2C500%2C600-v2.css')?>">

   <link rel="preload" as="font" href="<?php echo base_url('web_assets/public/MaterialIcons-Regular.woff2')?>">

   <link rel="preload" as="script" href="<?php echo base_url('web_assets/public/vendors_main-8d24e3a6bc8c08ce4fbd-chunktemp.js')?>">

   <link rel="preload" as="script" href="<?php echo base_url('web_assets/public/main-17329e71f6ca75b7a6c5-chunktemp.js')?>">

   <link rel="preload" as="image" href="<?php echo base_url('web_assets/public/imgs/dream11_logo-3.svg')?>">

   <link rel="stylesheet" href="<?php echo base_url('web_assets/public/main-a8b785397d101c0a6002-chunktemp.css')?>">

   <link href="<?php echo base_url('web_assets/public/fonts/montserrat-400%2C500%2C600-v2.css')?>" rel="stylesheet">


   <style type="text/css">.fb_hidden{position:absolute;top:-10000px;z-index:10001}.fb_reposition{overflow:hidden;position:relative}.fb_invisible{display:none}.fb_reset{background:none;border:0;border-spacing:0;color:#000;cursor:auto;direction:ltr;font-family:"lucida grande", tahoma, verdana, arial, sans-serif;font-size:11px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:1;margin:0;overflow:visible;padding:0;text-align:left;text-decoration:none;text-indent:0;text-shadow:none;text-transform:none;visibility:visible;white-space:normal;word-spacing:normal}.fb_reset>div{overflow:hidden}@keyframes fb_transform{from{opacity:0;transform:scale(.95)}to{opacity:1;transform:scale(1)}}.fb_animate{animation:fb_transform .3s forwards}

      .fb_dialog{background:rgba(82, 82, 82, .7);position:absolute;top:-10000px;z-index:10001}.fb_dialog_advanced{border-radius:8px;padding:10px}.fb_dialog_content{background:#fff;color:#373737}.fb_dialog_close_icon{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;cursor:pointer;display:block;height:15px;position:absolute;right:18px;top:17px;width:15px}.fb_dialog_mobile .fb_dialog_close_icon{left:5px;right:auto;top:5px}.fb_dialog_padding{background-color:transparent;position:absolute;width:1px;z-index:-1}.fb_dialog_close_icon:hover{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent}.fb_dialog_close_icon:active{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent}.fb_dialog_iframe{line-height:0}.fb_dialog_content .dialog_title{background:#6d84b4;border:1px solid #365899;color:#fff;font-size:14px;font-weight:bold;margin:0}.fb_dialog_content .dialog_title>span{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;float:left;padding:5px 0 7px 26px}body.fb_hidden{height:100%;left:0;margin:0;overflow:visible;position:absolute;top:-10000px;transform:none;width:100%}.fb_dialog.fb_dialog_mobile.loading{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;min-height:100%;min-width:100%;overflow:hidden;position:absolute;top:0;z-index:10001}.fb_dialog.fb_dialog_mobile.loading.centered{background:none;height:auto;min-height:initial;min-width:initial;width:auto}.fb_dialog.fb_dialog_mobile.loading.centered #fb_dialog_loader_spinner{width:100%}.fb_dialog.fb_dialog_mobile.loading.centered .fb_dialog_content{background:none}.loading.centered #fb_dialog_loader_close{clear:both;color:#fff;display:block;font-size:18px;padding-top:20px}#fb-root #fb_dialog_ipad_overlay{background:rgba(0, 0, 0, .4);bottom:0;left:0;min-height:100%;position:absolute;right:0;top:0;width:100%;z-index:10000}#fb-root #fb_dialog_ipad_overlay.hidden{display:none}.fb_dialog.fb_dialog_mobile.loading iframe{visibility:hidden}.fb_dialog_mobile .fb_dialog_iframe{position:sticky;top:0}.fb_dialog_content .dialog_header{background:linear-gradient(from(#738aba), to(#2c4987));border-bottom:1px solid;border-color:#1d3c78;box-shadow:white 0 1px 1px -1px inset;color:#fff;font:bold 14px Helvetica, sans-serif;text-overflow:ellipsis;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0;vertical-align:middle;white-space:nowrap}.fb_dialog_content .dialog_header table{height:43px;width:100%}.fb_dialog_content .dialog_header td.header_left{font-size:12px;padding-left:5px;vertical-align:middle;width:60px}.fb_dialog_content .dialog_header td.header_right{font-size:12px;padding-right:5px;vertical-align:middle;width:60px}.fb_dialog_content .touchable_button{background:linear-gradient(from(#4267B2), to(#2a4887));background-clip:padding-box;border:1px solid #29487d;border-radius:3px;display:inline-block;line-height:18px;margin-top:3px;max-width:85px;padding:4px 12px;position:relative}.fb_dialog_content .dialog_header .touchable_button input{background:none;border:none;color:#fff;font:bold 12px Helvetica, sans-serif;margin:2px -12px;padding:2px 6px 3px 6px;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog_content .dialog_header .header_center{color:#fff;font-size:16px;font-weight:bold;line-height:18px;text-align:center;vertical-align:middle}.fb_dialog_content .dialog_content{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;border:1px solid #4a4a4a;border-bottom:0;border-top:0;height:150px}.fb_dialog_content .dialog_footer{background:#f5f6f7;border:1px solid #4a4a4a;border-top-color:#ccc;height:40px}#fb_dialog_loader_close{float:left}.fb_dialog.fb_dialog_mobile .fb_dialog_close_button{text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog.fb_dialog_mobile .fb_dialog_close_icon{visibility:hidden}#fb_dialog_loader_spinner{animation:rotateSpinner 1.2s linear infinite;background-color:transparent;background-image:url(https://static.xx.fbcdn.net/rsrc.php/v3/yD/r/t-wz8gw1xG1.png);background-position:50% 50%;background-repeat:no-repeat;height:24px;width:24px}@keyframes rotateSpinner{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}

      .fb_iframe_widget{display:inline-block;position:relative}.fb_iframe_widget span{display:inline-block;position:relative;text-align:justify}.fb_iframe_widget iframe{position:absolute}.fb_iframe_widget_fluid_desktop,.fb_iframe_widget_fluid_desktop span,.fb_iframe_widget_fluid_desktop iframe{max-width:100%}.fb_iframe_widget_fluid_desktop iframe{min-width:220px;position:relative}.fb_iframe_widget_lift{z-index:1}.fb_iframe_widget_fluid{display:inline}.fb_iframe_widget_fluid span{width:100%}

      .fb_customer_chat_bounce_in_v2{animation-duration:300ms;animation-name:fb_bounce_in_v2;transition-timing-function:ease-in}.fb_customer_chat_bounce_out_v2{animation-duration:300ms;animation-name:fb_bounce_out_v2;transition-timing-function:ease-in}.fb_customer_chat_bounce_in_v2_mobile_chat_started{animation-duration:300ms;animation-name:fb_bounce_in_v2_mobile_chat_started;transition-timing-function:ease-in}.fb_customer_chat_bounce_out_v2_mobile_chat_started{animation-duration:300ms;animation-name:fb_bounce_out_v2_mobile_chat_started;transition-timing-function:ease-in}.fb_customer_chat_bubble_pop_in{animation-duration:250ms;animation-name:fb_customer_chat_bubble_bounce_in_animation}.fb_customer_chat_bubble_animated_no_badge{box-shadow:0 3px 12px rgba(0, 0, 0, .15);transition:box-shadow 150ms linear}.fb_customer_chat_bubble_animated_no_badge:hover{box-shadow:0 5px 24px rgba(0, 0, 0, .3)}.fb_customer_chat_bubble_animated_with_badge{box-shadow:-5px 4px 14px rgba(0, 0, 0, .15);transition:box-shadow 150ms linear}.fb_customer_chat_bubble_animated_with_badge:hover{box-shadow:-5px 8px 24px rgba(0, 0, 0, .2)}.fb_invisible_flow{display:inherit;height:0;overflow-x:hidden;width:0}.fb_mobile_overlay_active{background-color:#fff;height:100%;overflow:hidden;position:fixed;visibility:hidden;width:100%}@keyframes fb_bounce_in_v2{0%{opacity:0;transform:scale(0, 0);transform-origin:bottom right}50%{transform:scale(1.03, 1.03);transform-origin:bottom right}100%{opacity:1;transform:scale(1, 1);transform-origin:bottom right}}@keyframes fb_bounce_in_v2_mobile_chat_started{0%{opacity:0;top:20px}100%{opacity:1;top:0}}@keyframes fb_bounce_out_v2{0%{opacity:1;transform:scale(1, 1);transform-origin:bottom right}100%{opacity:0;transform:scale(0, 0);transform-origin:bottom right}}@keyframes fb_bounce_out_v2_mobile_chat_started{0%{opacity:1;top:0}100%{opacity:0;top:20px}}@keyframes fb_customer_chat_bubble_bounce_in_animation{0%{bottom:6pt;opacity:0;transform:scale(0, 0);transform-origin:center}70%{bottom:18pt;opacity:1;transform:scale(1.2, 1.2)}100%{transform:scale(1, 1)}}

   </style>

   

   <style type="text/css" id="qual_style-mzj"></style>

   <style type="text/css" id="qual_style-meu"></style>

   <style type="text/css" id="qual_style-mzj"></style>

   <style type="text/css" id="qual_style-meu"></style>

   <style type="text/css" id="qual_style-mzj"></style>

   <style type="text/css" id="qual_style-meu"></style>

</head>

<body cz-shortcut-listen="true" class="">

   <div>

      <div class="app-container appContainer_6475d">

         <div class="appBgImage_fd065"></div>

         <div class="lazy-container-my-profile">

            <div class="lazy-my-profile">

               <div class="my-profile">

                  <div>

                     <div class="appHeaderSpacing_cdb56"></div>

                     <div class="app-toolbar appToolbar_1ea26">

                        <div class="js--app-header header_fc30e">

                           <div class="js--app-header-back"></div>

                           <div class="toolbar-title">Please Wait</div>

                           <div class="empty_eefde"></div>

                        </div>

                     </div>
                     <div id="resp_message"></div>

                  </div>
                  <?php 
                 $transactionId=substr(hash('sha256', mt_rand() . microtime()), 0, 20);
                $MERCHANT_KEY ="49wZXRkY";//"LLKwG0";
        
        $SALT ="zqVc6Vugjn";//"qauKbEAJ";           
        
        $PAYU_BASE_URL = "https://sandboxsecure.payu.in"; //"https://test.payu.in";
        
        
        $action = '';
        $posted = array('key'=>'49wZXRkY','txnid'=>$transactionId,'amount'=> $details['amount'],'firstname'=> $details['name'],'email'=> $details['email'],'phone'=> $details['number'],'productinfo'=>'product','surl'=>base_url('website/success_transaction'),'furl'=>base_url('website/failure_transaction'),'service_provider'=>'payu_paisa','udf1'=>$details['user_id']);
         $formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|||||||||";

if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
      || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else 
  {   
  $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';  
   
  foreach($hashVarsSeq as $hash_var) 
  {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }
  
    $hash_string .= $SALT;  
  //print_r($hash_string);
    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
                ?>
                <img height="100px" width="100px;" src="<?php echo base_url('uploads/reload_png.png'); ?>">

                  <form style="display: none;" id="request" method="post" action="<?php echo $PAYU_BASE_URL . '/_payment'; ?>" >
                  <div class="my-profile__container">
                     <div>
                        <input type="text" name="name" value="<?php echo $details['name']; ?>">
                        <input type="text" name="amount" value="<?php echo $details['amount']; ?>">
                        <input type="text" name="email" value="<?php echo $details['email']; ?>">
                        <input type="text" name="key" value="<?php echo $posted['key']; ?>">
                        <input type="text" name="firstname" value="<?php echo $posted['firstname']; ?>">
                        <input type="text" name="txnid" value="<?php echo $posted['txnid']; ?>">
                        <input type="text" name="phone" value="<?php echo $posted['phone']; ?>">
                        <input type="text" name="productinfo" value="<?php echo $posted['productinfo']; ?>">
                        <input type="text" name="surl" value="<?php echo $posted['surl']; ?>">
                        <input type="text" name="furl" value="<?php echo $posted['furl']; ?>">
                        <input type="text" name="service_provider" value="<?php echo $posted['service_provider']; ?>">
                       <input type="text" name="hash" value="<?php echo $hash ?>"/>
                       <input type="text" name="udf1" value="<?php echo $posted['udf1']  ?>"/>
                       
                     </div>

                     <div>
                       
                     </div>
                  </div>
                  <div class="my-profile__footer js--my-profile__footer footer_d9dd6">
                     <div class="align-center">
                  <input id="send_request" class="btn btn--raised btn--white" type="submit" value="Save"> 

                     </div>

                  </div>
                  </form>

               </div>

            </div>

         </div>

      </div>

   </div>

  
</body>

<script type="text/javascript"> var SITE_URL = "<?php echo base_url(); ?>" ;  </script>
<script type="text/javascript" src="<?php echo base_url('web_assets/js/jquery-3.2.1.js'); ?>"> </script>

<script type="text/javascript">
   $(document).ready(function(){
    $("#send_request").trigger("click");
});
</script>
 
</html>