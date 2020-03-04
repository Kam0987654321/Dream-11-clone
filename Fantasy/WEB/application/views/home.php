<?php //include("header.php");?>
<!-- Page Content-->
 
<style>
       #map {
        height: 800px;
        width: 120%;
       }
	   .menu>ul>li>ul {
    position: absolute;
    background-color: #555;
    width: 100%;
    left: 0;
    top: 100%;
    z-index: 1;
}
#plans,#plans ul,#plans ul li {
	margin: 0;
	padding: 0;
	list-style: none;
}

#pricePlans:after {
	content: '';
	display: table;
	clear: both;
}

#pricePlans {
	
	zoom: 1;
}

#pricePlans {

	max-width: 89em;
	
}

#pricePlans #plans .plan {
	background: #fff;
	float: left;
	width: 100%;
	text-align: center;
	border-radius: 5px;
	margin: 0 0 20px 0;

	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.1);
	box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

.planContainer .title h4 {
	font-size: 1.225em;
	font-weight: 400;
	color: #3e4f6a;
	margin: 0;
	padding: .6em 0;
}

.planContainer .title h4.bestPlanTitle {
	background: #3e4f6a;

	background: -webkit-linear-gradient(top, #475975, #364761);
	background: -moz-linear-gradient(top, #475975, #364761);
	background: -o-linear-gradient(top, #475975, #364761);
	background: -ms-linear-gradient(top, #475975, #364761);
	background: linear-gradient(top, #475975, #364761);
	color: #fff;
	border-radius: 5px 5px 0 0;
}


.planContainer .price p {
	background: #3e4f6a;

	background: -webkit-linear-gradient(top, #475975, #364761);
	background: -moz-linear-gradient(top, #475975, #364761);
	background: -o-linear-gradient(top, #475975, #364761);
	background: -ms-linear-gradient(top, #475975, #364761);
	background: linear-gradient(top, #475975, #364761);
	color: #fff;
	font-size: 1.2em;
	font-weight: 700;
	height: 2.6em;
	line-height: 3.6em;
	margin: 0 0 1em;
}

.planContainer .price p.bestPlanPrice {
	background: #f7814d;
}

.planContainer .price p span {
	color: #8394ae;
}

.planContainer .options {
	margin-top: 10em;
}

.planContainer .options li {
	font-weight: 700;
	color: #364762;
	line-height: 2.5;
}

.planContainer .options li span {
	font-weight: 400;
	color: #979797;
}

.planContainer .button a {
	text-transform: uppercase;
	text-decoration: none;
	color: #3e4f6a;
	font-weight: 700;
	letter-spacing: 3px;
	line-height: 2.8em;
	border: 2px solid #3e4f6a;
	display: inline-block;
	width: 80%;
	height: 2.8em;
	border-radius: 4px;
	margin: 1.5em 0 1.8em;
}

.planContainer .button a.bestPlanButton {
	color: #fff;
	background: #f7814d;
	border: 2px solid #f7814d;
}

#credits {
	text-align: center;
	font-size: .8em;
	font-style: italic;
	color: #777;
}

#credits a {
	color: #333;
}

#credits a:hover {
	text-decoration: none;
}

@media screen and (min-width: 481px) and (max-width: 900px) {

#pricePlans #plans .plan {
	width: 49%;
	margin: 0 2% 20px 0;
}

#pricePlans #plans > li:nth-child(2n) {
	margin-right: 0;
}

}

@media screen and (min-width: 769px) and (max-width: 1200px) {

#pricePlans #plans .plan {
	width: 49%;
	margin: 0 2% 20px 0;
}

#pricePlans #plans > li:nth-child(2n) {
	margin-right: 0;
}

}

@media screen and (min-width: 1200px) {

#pricePlans {
	margin: 2em auto;
}

#pricePlans #plans .plan {
	width: 20%;
	margin: 0 1.33% 20px 0;

	-webkit-transition: all .25s;
	   -moz-transition: all .25s;
	    -ms-transition: all .25s;
	     -o-transition: all .25s;
	        transition: all .25s;
}

#pricePlans #plans > li:last-child {
	margin-right: 0;
}

#pricePlans #plans .plan:hover {
	-webkit-transform: scale(1.04);
	   -moz-transform: scale(1.04);
	    -ms-transform: scale(1.04);
	     -o-transform: scale(1.04);
	        transform: scale(1.04);
}

.planContainer .button a {
	-webkit-transition: all .25s;
	   -moz-transition: all .25s;
	    -ms-transition: all .25s;
	     -o-transition: all .25s;
	        transition: all .25s;
}

.planContainer .button a:hover {
	background: #3e4f6a;
	color: #fff;
}

.planContainer .button a.bestPlanButton:hover {
	background: #ff9c70;
	border: 2px solid #ff9c70;
}

}

#outer{
    width: 100%;

    /* Firefox */
    display: -moz-box;
    -moz-box-pack: center;
    -moz-box-align: center;

    /* Safari and Chrome */
    display: -webkit-box;
    -webkit-box-pack: center;
    -webkit-box-align: center;

    /* W3C */
    display: box;
    box-pack: center;
    box-align: center;
}


    </style>
<main class="page-content">
	<section>
		<!-- Swiper-->
		<div data-height="35.179%" data-loop="true" data-dragable="false" data-min-height="480px" data-slide-effect="true" class="swiper-container swiper-slider swiper-container-horizontal swiper-container-true" style="height: 395.871px;">
			<div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-1263px, 0px, 0px);">
				<div data-slide-bg="<?php echo base_url(); ?>/institute_assets/images/banner_3.jpg" style="background-position: 80% center; background-image: url(&quot;./assets/images/banner-3.jpg&quot;); background-size: cover; width: 1263px;" class="swiper-slide swiper-slide-active" data-swiper-slide-index="0">
					<div class="swiper-slide-caption">
						<div class="container">
							<div class="range range-xs-center">
								<div class="cell-md-9 text-center cell-xs-10">
									<div data-caption-animate="fadeInUp" data-caption-delay="100" class="fadeInUp animated">
										<h1 class="text-bold">Welcome to <?php echo $institute_data['InstituteFullName']; ?></h1>
									</div>
									<div data-caption-animate="fadeInUp" data-caption-delay="150" class="offset-top-20 offset-xs-top-40 offset-xl-top-60 inset-lg-right-100 fadeInUp animated">
										<h5>PRACTICE, ANALYZE AND IMPROVE!</h5>
									</div>
								<!--	<div data-caption-animate="fadeInUp" data-caption-delay="400" class="offset-top-20 offset-xl-top-40 fadeInUp animated"><a href="<?php echo site_url('website/login'); ?>" class="btn btn-primary">Sign Up</a>
										<div class="inset-xs-left-30 reveal-lg-inline-block"><a href="academic.html" class="btn btn-default veil reveal-lg-inline-block">Learn More</a></div>
									</div>-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Swiper Pagination-->
			<div class="swiper-pagination swiper-pagination-clickable"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
		</div>
	</section>
	<section class="section-70">
		<div class="container">
			<div class="row">
				<h2 class="text-bold">Categories</h2>
				<hr class="divider bg-madison">
				<div align="center">
					
              <?php //echo json_encode($data['examcategory']);
			  $i=0;
              foreach ($data['examcategory'] as $key => $examcategory) {
				  if($i==4 || $i>4){
					 continue;
				  }
              	?>    
				
              	<button type="button" class="btn btn-default filter-button" data-filter="<?php echo $examcategory['id'] ?>"><?php echo $examcategory['ExamCategoryTitle']?></button>              
              	<?php  $i++; } ?> 
				<button class="btn btn-default filter-button" data-filter="all">All</button>
				<div class="dropdown">
				<button class="btn btn-primary dropdown-toggle" type="button" style="border-radius: 30px; background-color: #337ab7; border-color:#337ab7;" data-toggle="dropdown">Other
				
				<span class="caret"></span></button>
  <ul class="dropdown-menu menu">
		<?php for($j=4;$j<count($data['examcategory']);$j++){?>
    <li><a data-filter="<?php echo $data['examcategory'][$j]['id'] ?>" class="filter-button" style="border : 0;cursor:pointer;order-style : none; background-color:#fff"><?php echo $data['examcategory'][$j]['ExamCategoryTitle']?></a></li>
		<?php } ?>
   
  </ul>
  </div>
              </div>
              <br/>
              <?php 
           //echo json_encode($data['examcategory']);
              $i=0;
            //print_r($data['exam']);
              foreach ($data['exam'] as $key => $exam) {
              	$i++;              
              	?>
              	<div class="col-lg-2 col-sm-3 col-md-4 filter <?php echo $exam['ExamCategoryId'] ?>" style="height: 200px; width:19%">
              		<!-- Counter type 1-->
              		<div class="counter-type-1 examcategories" style="height: 190px;"><span class="icon icon-sm text-madison mdi mdi-school"></span>
              			<div class="offset-top-10">
              				<h6 class="text-black font-accent"><?php echo $exam['ExamTitle']?></h6>
              			</div>
              		</div>
              	</div>
              	<?php }  ?>
              </div>
          </div>
      </section>
	  
	  <div class="container">
	  <section id="pricePlans" class="text-center" id="outer">
	  <h2 class="text-bold">Our Testseries</h2>
      			<hr class="divider bg-madison">
		<ul id="plans" class="text-center">
			
			      			<?php       			
      				foreach($testseries as $series) 
      				{ 
      					$questions_count=0;
						$total_marks=0;
      					$test_ids=explode(',',$series->test_ids);
      					$testpaper_count=count($test_ids);
      					for($i=0;$i<count($test_ids);$i++)
      					{  
      					 	$result=$this->coaching_model->get_questions_count($test_ids[$i]);
							$questions_count= $questions_count + $result->TotalQuestions;
							$total_marks=$total_marks+$result->TotalMarks;
      					}
      				?> 
			<li class="plan">
				<ul class="planContainer">
					<li class="title" style="height:70px;"><h4
					class="bestPlanTitle" style="height:70px;"><?php echo ucfirst($series->TestseriesTitle); ?></h4></li>
					<li class="price"><p class="bestPlanPrice"><i class="fa fa-inr">
      						</i><?php echo ' '.$series->TestseriesPrice; ?></p></li>
					<li>
						<ul class="options">
							<li><?php echo $questions_count; ?> <span>questions</span></li>
							<li><?php echo $testpaper_count; ?> <span>testpapers</span></li>
							<li>Unlimited <span>attempts</span></li>
							<li>Unlimited <span>practice</span></li>
							<li><?php echo $total_marks; ?><span>Marks </span></li>
						</ul>
					</li>
					<li class="button"><a style="cursor:pointer;" onclick="buynow(<?php echo $series->id.',';?><?php echo $series->ExamMasterId; ?>)" class="bestPlanButton" href="#">Purchase</a></li>
				</ul>
			</li>
			<?php } ?>

			
		</ul> <!-- End ul#plans -->
		
	</section>
	</div>
      
   <!--   <section class="">
	  
      	<div class="container">
      		<div class="row">
      			<h2 class="text-bold">Our Testseries</h2>
      			<hr class="divider bg-madison">

      			<div class="col-lg-3 col-sm-3 col-md-4">
      				<!-- Counter type 1
      				<div class="examtestseries" >
      					<div class="row">
      						<div class="col-xs-12">
      							<div class="title">
      								<h4 title="<?php echo $series->TestseriesTitle; ?>" class=""></h4>
      							</div>
								<hr style="width:50%;background-color:black;">
      							<div class="tags">
      								<button class="price-tag"><?php echo ucfirst($series->TestseriesTags); ?></button>
      							</div>
      							<div class="validity"><b>
      								Attempts : </b><span class=""> No Limit</span>
      							</div>
      						</div>
      					</div>
      					<div class="" style="height:150px;">
      						<ul class="list-marked list offset-top-10">
      							<li><?php echo $questions_count; ?> Questions</li>
      							<li><?php echo $testpaper_count; ?> Testpapers</li>
      							
      						</ul>
      						<div class="list-inline">      						
      						<h5 class="" ><i class="fa fa-inr">
      						</i><?php echo $series->TestseriesPrice; ?></h5></div>
      					</div>
      					<div class="row">
      						<div class="col-xs-12 pad-h16 buy">
      							<a style="cursor:pointer;" onclick="buynow(<?php echo $series->id.',';?><?php echo $series->ExamMasterId; ?>)" class="btn btn-primary btn-block hidden-subs-active" >Buy Now</a>
      						</div>
      					</div>
      				</div>
      			</div>
      			
      		</div>
      	</div>
      </section>-->
      <!-- Testimonials-->
      <section class="bg-madison context-dark text-sm-left" style="padding:20px 0px 20px 0px; margin-top:20px; margin-bottom:20px; background:#ffffff;">
      	<div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
      		<div class="testimonial4_header">
      			<h4>what our Students are saying</h4>
      		</div>
      		<ol class="carousel-indicators">
      			<li data-target="#testimonial4" data-slide-to="0" class="active"></li>
      			<li data-target="#testimonial4" data-slide-to="1"></li>
      			<li data-target="#testimonial4" data-slide-to="2"></li>
      		</ol>

      		<div class="carousel-inner" role="listbox">

            <?php if(isset($testimonials)){
              $i=0;
              foreach($testimonials as $test){
                $i++;
             ?>
      			<div class="item <?php if($i==1){ echo "active" ;} ?>">
      				<div class="testimonial4_slide">
      					<img src="<?php echo base_url('uploads/default.jpg'); ?>" class="img-circle img-responsive" />
      					<p><?php echo $test->StudentMessage; ?></p>
      					<h4><?php echo $test->StudentName; ?></h4>
                <h5><?php echo $test->ShortDescription; ?></h5>
      				</div>
      			</div>

            <?php }} ?>
      			
      		</div>
      		<a class="left carousel-control" href="#testimonial4" role="button" data-slide="prev">
      			<span class="fa fa-chevron-left"></span>
      		</a>
      		<a class="right carousel-control" href="#testimonial4" role="button" data-slide="next">
      			<span class="fa fa-chevron-right"></span>
      		</a>
      	</div>
      </section>
      <!-- Google map-->
      <section class="section-image-aside section-image-aside-left text-sm-left">
      	<div class="shell">
      		<div class="range range-xs-center range-lg-right offset-top-0">
      			<div class="cell-xs-12 cell-lg-8">
              <div class="col-lg-8">
        <div class="google-map" id="map"></div>
        

      </div>
      			</div>         
      			<div class="cell-xs-12 cell-lg-4">
      				<div style="padding-top:0px" class="section-image-aside-body section-70 section-md-114 section-md-bottom-100">
      					<div class="range">
      						<div class="cell-sm-6 cell-lg-12">
      							<h6 class="text-bold">Contact us</h6>
      							<div class="text-subline"></div>
      							<div class="offset-top-30">
      								<ul class="list-unstyled contact-info list">
      									<li>
      										<div class="unit unit-horizontal unit-middle unit-spacing-xs">
      											<div class="unit-left"><span class="icon mdi mdi-phone text-middle icon-xs text-madison"></span></div>
      											<div class="unit-body"><a href="callto:#" class="text-dark"><?php echo $institute_data['InstituteMobileNo']; ?></a> 
      											</div>
      										</div>
      									</li>
      									<li class="offset-top-15">
      										<div class="unit unit-horizontal unit-middle unit-spacing-xs">
      											<div class="unit-left"><span class="icon mdi mdi-map-marker text-middle icon-xs text-madison"></span><?php echo $institute_data['InstituteAddress']; ?></div>
      											<div class="unit-body text-left"><a href="#" class="text-dark"></a></div>
      										</div>
      									</li>
      									<li class="offset-top-15">
      										<div class="unit unit-horizontal unit-middle unit-spacing-xs">
      											<div class="unit-left"><span class="icon mdi mdi-email-open text-middle icon-xs text-madison"></span></div>
      											<div class="unit-body"><a href="mailto:#"><?php echo $institute_data['InstituteEmail']; ?></a></div>
      										</div>
      									</li>
      								</ul>
      							</div>
                  
                </div>
                <div class="cell-sm-6 cell-lg-12">
                	<h6 class="text-bold offset-top-30 offset-sm-top-0 offset-lg-top-50">Enquire Counter</h6>
                	<div class="text-subline"></div>
                	<div class="offset-top-30 text-left">
                		<p>Enter your contact details to get in touch with us.</p>
                	</div>
                	<div class="offset-top-10">
                		<div class="offset-md-top-50 offset-top-40">
                			<form action="javascript:;" class="form" id="send_enquiry_form" method="post">
                				<div class="range">
                					<div class="cell-lg-12">
                						<div class="form-group">
                							<label for="contact-us-first-name" class="form-label form-label-outside rd-input-label">First name</label>
                							<input id="contact-us-first-name" type="text" name="Name" data-constraints="@Required" class="form-control form-validation-inside required form-control-has-validation form-control-last-child"><span class="form-validation"></span>
                						</div>
                					</div>
                					<div class="cell-lg-12 offset-top-12">
                						<div class="form-group">
                							<label for="contact-us-email" class="form-label form-label-outside rd-input-label">E-mail</label>
                							<input id="contact-us-email" type="email" name="Email" data-constraints="@Required @Email" class="form-control form-validation-inside required form-control-has-validation form-control-last-child"><span class="form-validation"></span>
                						</div>
                					</div>
                					<div class="cell-lg-12 offset-top-12">
                						<div class="form-group">
                							<label for="contact-us-phone" class="form-label form-label-outside rd-input-label">Phone</label>
                							<input id="contact-us-phone" type="text" name="Phone" data-constraints="@IsNumeric" class="form-control required form-validation-inside form-control-has-validation form-control-last-child"><span class="form-validation"></span>
                						</div>
                					</div>
                					<div class="cell-lg-12 offset-top-12">
                						<div class="form-group">
                							<label for="contact-us-message" class="form-label form-label-outside rd-input-label">Message</label>
                							<textarea id="contact-us-message" name="Message" data-constraints="@Required" class="form-control required form-validation-inside form-control-has-validation form-control-last-child"></textarea><span class="form-validation"></span>
                						</div>
                					</div>
                				</div>
                				<div class="offset-top-20 text-center text-sm-left">
                					<button type="submit" class="btn btn-primary">Send Message</button>
                				</div>
                			</form>
                		</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</section>
</main>




<?php //include("footer.php");?>