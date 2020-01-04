
			<section class="common_content_box">
				<div class="container">
					<div class="TermsCondtns">
						<div class="TermsCondtnsBox">
							<p class="alCtr strong">Last updated: 24 December, 2018</p>
							<dl class="termsContent ftFx13">
								<dt>1. UAB League</dt>

								<div class="container" >

				

		<div class="row">

			<div class="col-lg-12">

				<h1 class="page-head text-center" style="color: #00bcac" >Point System</h1>

			</div>

		</div>	

		 

		

		<div class="row" >

		

			<div class="col-sm-12">

			<div class="about-box-content">

				

				 <p>Here’s how your team earns points:</p>

				 <br>

				<h4 style="color: #00255c">General Point</h4>

				<div class="table-responsive">
                  <div class="pointsystem">
					<table border="1" class="table table-striped">  

						<tbody>

							<tr class="bg-light-green">

							<th>Type of Points</th>

							<th>T20</th>

							<th>ODI</th>

							<th>Test</th>

						</tr>  

						</tbody>      

						<?php foreach($points as $point) { ?>

						 <?php if($point->title == 'General') {?> 

						<tr>

							<td><?php echo $point->description?></td>

							<td><?php echo $point->t20score?></td>

							<td><?php echo $point->odiscore?></td>

							<td><?php echo $point->testscore?></td>

						</tr>

                         <?php }?> 

						<?php }?>

					</table>

				</div>

				<br>

				<h4 style="color: #00255c">Bonus Point</h4>
                <div class="pointsystem">
				<table border="1" class="table table-striped">  

						<tbody>

							<tr class="bg-light-green">

						

							<th>Type of Points</th>

							<th>T20</th>

							<th>ODI</th>

							<th>Test</th>

						</tr> 

						</tbody>       

					<?php foreach($points as $point) { ?>

						 <?php if($point->title == 'Bonus Points') {?> 

						<tr>

							<td><?php echo $point->description?></td>

							<td><?php echo $point->t20score?></td>

							<td><?php echo $point->odiscore?></td>

							<td><?php echo $point->testscore?></td>

						</tr>

                         <?php }?> 

						<?php }?>

					</table>
                 </div>
			

				<br>

				

				<h4 style="color: #00255c">Economy Rate</h4>
                <div class="pointsystem">
				<table border="1" class="table table-striped">  

						<tbody>

							<tr class="bg-light-green">

							<th>Type of Points</th>

							<th>T20</th>

							<th>ODI</th>

							<th>Test</th>

						</tr>  

						</tbody>      

					

						<?php foreach($points as $point) { ?>

						 <?php if($point->title == 'Economy Rate') {?> 

						<tr>

							<td><?php echo $point->description?></td>

							<td><?php echo $point->t20score?></td>

							<td><?php echo $point->odiscore?></td>

							<td><?php echo $point->testscore?></td>

						</tr>

                         <?php }?> 

						<?php }?>

					</table>

				</div>

				

				<br>

				<h4 style="color: #00255c">Strike Rate</h4>
                <div class="pointsystem">
				<table border="1" class="table table-striped">  

						<tbody>

							<tr class="bg-light-green">

							<th>Type of Points</th>

							<th>T20</th>

							<th>ODI</th>

							<th>Test</th>

						</tr>        

					</tbody>

				        <?php foreach($points as $point) { ?>

						 <?php if($point->title == 'Strike Rate') {?> 

						<tr>

							<td><?php echo $point->description?></td>

							<td><?php echo $point->t20score?></td>

							<td><?php echo $point->odiscore?></td>

							<td><?php echo $point->testscore?></td>

						</tr>

                         <?php }?> 

						<?php }?>

						

					

					</table>
                   </div>
				</div>



			</div>

			</div>

		

		</div>		

		

		

	</div>
								
							




							</dl>
						</div>
					</div>
				</div>
			</section>
			<div class="clr"></div>
		