<div class="main-panel js-tb-container" style="margin-top: 0px;">
   <div class="wrapper">
      <div class="mar-v16 settings-container">
         <ul class="nav nav-tabs" role="tablist" id="settings-nav">
            <li class="active" role="presentation"><a href="#profile" data-toggle="tab" aria-expanded="true"><i class="fa fa-setting"></i>Account Settings</a></li>
           
         </ul>
         <div class="tab-content">
            <div class="tab-pane active" id="profile">
               <button type="button" class="btn btn-link pull-right" style="margin: -38px 10px 0 0;" ng-click="toggleEditableInput()">
               <i class="tb-icon tb-edit"></i>
               <a onclick="edit();" class="text-capitalize">Edit</a>
               </button>
               <form  id="update_student_profile" action="javascript:;" class="form-horizontal settings-form ng-pristine ng-valid-pattern ng-valid-minlength ng-valid-maxlength ng-valid ng-valid-required" name="updateUserInfo">
                  <div class="form-group">
                     <label class="col-sm-5 control-label profile-picture-label">Profile Picture</label>
                     <div class="col-sm-7">
                        <div class="show-edit-profile-pic">
                           <div class="img ng-pristine ng-untouched ng-valid" ng-model="files">
                              
                           	<img height="100" width="100" id="user_image" name="user_image" src="<?php echo base_url('uploads/student_images/default.jpg'); ?>"></img>
                           </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-link click-to-edit-img" id="js-edit-img" onclick="document.getElementById('selectedFile').click();" ><span class="text-capitalize">Change</span></button>
                        <input type="file" id="selectedFile" onchange="readURL(this);" style="display: none;" />

                     </div>
                  </div>
                   <div class="form-group">
                     <label class="col-sm-5 control-label">Email</label>
                     <div class="col-sm-7">
                        <div class="form-control-static ng-binding">aayushri.shah@gmail.com</div>
                     </div>
                  </div>
                   <div class="form-group js-edit-hide">
                     <label class="col-sm-5 control-label">Mobile</label>
                     <div class="col-sm-7">
                        <div class="bg-gray-1" ng-show="includeMobilVerificationBlock">
                           <verify-mobile template="1" otp-sent="false" mobile="" title="Verify your number" class="ng-isolate-scope">                              
                                 <div class="font-size-base-1 mar-b8 ng-binding ng-scope" ng-if="!isOTPSent"> Verify your number </div>
                                
                                 <div class="input-group mar-b8 ng-scope" ng-if="!isOTPSent">
                                    <input class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required ng-valid-pattern ng-valid-minlength ng-valid-maxlength" name="mobile" type="text" placeholder="10 Digit Mobile Number" minlength="10" maxlength="10" required="" ng-model="student.mobile" ng-pattern="/^[0-9]+$/">
                                    <span class="input-group-btn">
                                       <button type="button" class="btn btn-primary disabled" ng-class="{&#39;disabled&#39;: formMobileVerification.mobile.$invalid}" ng-click="sendOTP(false)">
                                          Send OTP
                                          <!-- ngIf: activeLoader == loader.resentOTP -->
                                       </button>
                                    </span>
                                 </div>
                                
                           </verify-mobile>
                        </div>

                      <!--  <div class="form-control-static ng-binding ng-hide" ng-show="!includeMobilVerificationBlock">
                           <button type="button" class="btn btn-link mar-t-4 pad-4 pull-right ng-hide" ng-show="isMobileVerified" ng-click="editMobile()">
                           <i class="tb-icon tb-edit"></i>
                           </button>
                           <span class="text-success ng-hide" ng-show="isMobileVerified">Verified</span>
                           <span class="label label-danger" ng-show="!isMobileVerified">Unverified</span>
                        </div>-->
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="userFullName" class="col-sm-5 control-label">Full Name</label>
                     <div class="col-sm-7">
                        <div class="js-edit-show" style="display: block;">
                          
                              <input type="text" class="form-control ng-pristine ng-untouched ng-valid ng-valid-required" name="StudentFullName" placeholder="Full Name" required="">                           
                        </div>
                        <div class="form-control-static js-edit-hide text-capitalize ng-binding" style="display: none;">
                           
                        </div>
                     </div>
                  </div>
               
                  <div class="form-group">
                     <label class="col-sm-5 control-label">Education</label>
                     <div class="col-sm-7">
                        <div class="js-edit-show" style="display: block;">
                           <div class="dropdown collect-info-fg js-collect-info-fg">
                              	<select class="form-control bg-white" name="StudentEducation">
                              		<option value="General">BCA</option>
                              		<option value="OBC">MSC</option>
                              		<option value="SC">MCA</option>
                              		<option value="ST">ST</option>
                              	</select>
                          </div>
                        </div>
                        
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="col-sm-5 control-label">Category</label>
                     <div class="col-sm-7">
                        <div class="js-edit-show" style="display: block;">
                           <div class=" ">
                             
                              	<select class="form-control bg-white" name="StudentCategory">
                              		<option value="General">General</option>
                              		<option value="OBC">OBC</option>
                              		<option value="SC">SC</option>
                              		<option value="ST">ST</option>
                              	</select>
                          </div>
                        </div>                        
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="col-sm-5 control-label">State</label>
                     <div class="col-sm-7">
                        <div class="js-edit-show" style="display: block;">
                           <div class=" ">
                             
                              	<select class="form-control bg-white" name="StudentState">
                              		<option value="General">General</option>
                              		<option value="OBC">OBC</option>
                              		<option value="SC">SC</option>
                              		<option value="ST">ST</option>
                              	</select>
                          </div>
                        </div>                        
                     </div>
                  </div>


                  <div class="form-group">
                     <label class="col-sm-5 control-label">City</label>
                     <div class="col-sm-7">
                        <div class="js-edit-show" style="display: block;">
                           <div class=" ">                             
                              	<select class="form-control bg-white" name="StudentCity">
                              		<option value="General">General</option>
                              		<option value="OBC">OBC</option>
                              		<option value="SC">SC</option>
                              		<option value="ST">ST</option>
                              	</select>
                          </div>
                        </div>                        
                     </div>
                  </div>

                  <div class="form-group">
                     <label for="userLocation" class="col-sm-5 control-label">Address</label>
                     <div class="col-sm-7">
                        <div class="js-edit-show" style="display: block;">                          
                              <textarea type="text" class="form-control ng-pristine ng-valid-pattern ng-valid-minlength ng-valid-maxlength ng-valid ng-valid-required ng-touched" id="userLocation" placeholder="Complete Address"  name="StudentAddress" required=""></textarea>
                              <!-- ngIf: updateUserInfo.pin.$invalid && updateUserInfo.pin.$dirty && updateUserInfo.pin.$touched -->
                           
                        </div>
                        <div class="form-control-static js-edit-hide" style="display: none;">
                           <!-- ngIf: user.location.length > 0 --><span ng-if="user.location.length &gt; 0" class="ng-binding ng-scope">Indore, Madhya pradesh</span><!-- end ngIf: user.location.length > 0 -->
                           <!-- ngIf: user.location.length == 0 -->
                        </div>
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="col-sm-5 control-label">Date of Birth</label>
                     <div class="col-sm-7">
                        <div class="js-edit-show collect-info-fg" style="display: block;">
                           <div class="input-group date" id="dob-picker">
                              <input type="text" name="StudentDob" style="width:100%" class="form-control bg-white mydatepicker" placeholder="Date of Birth dd/mm/yyyy" readonly="">
                              
                           </div>
                        </div>
                        <div class="form-control-static js-edit-hide" style="display: none;">
                          <button type="button" class="btn btn-sm btn-link mar-t-2 pad-v4 pad-h0 ng-scope" ng-if="user.dob.length == 0" ng-click="toggleEditableInput()">
                           <span class="text-capitalize">Add Date of Birth</span>
                           </button><!-- end ngIf: user.dob.length == 0 -->
                        </div>
                     </div>
                  </div>
                 
                  
                 
                <!--  <div class="form-group">
                     <label class="col-sm-5 control-label">Default Language</label>
                     <div class="col-sm-7">
                        <div class="js-edit-show" style="display: block;">
                           <label class="tb-radio">
                           <input type="radio" name="default-lang-english" ng-model="user.tblang" value="en" class="ng-pristine ng-untouched ng-valid">
                           <span>English</span>
                           </label>
                           <label class="tb-radio mar-b8">
                           <input type="radio" name="default-lang-hindi" ng-model="user.tblang" value="hn" class="ng-pristine ng-untouched ng-valid">
                           <span>Hindi</span>
                           </label>
                        </div>
                        <div class="form-control-static js-edit-hide ng-binding" style="display: none;">
                           English
                        </div>
                     </div>
                  </div>-->

                  <div class="form-group js-edit-show" style="display: block;">
                     <div class="col-sm-7 col-sm-offset-5">
                        <button type="button" class="btn btn-theme" ng-click="saveProfile(user)" ng-disabled="updateUserInfo.$invalid || interestedExamsNames.length == 0 || user.degrees.length == 0 || user.dob.length == 0" disabled="disabled">
                        Save Profile
                        </button>
                         <button type="button" class="btn btn-sm btn-danger" ng-click="deactivateAccount()">Deactivate Account</button>
                     </div>
                  </div>
               </form>
            </div>
            <div class="tab-pane" id="account">
               <div class="form-horizontal settings-form" name="updateAccountInfo">
                  <div class="form-group">
                     <label class="col-sm-5 control-label">Email</label>
                     <div class="col-sm-7">
                        <div class="form-control-static ng-binding">aayushri.shah@gmail.com</div>
                     </div>
                  </div>
                  <div class="form-group js-edit-hide">
                     <label class="col-sm-5 control-label">Mobile</label>
                     <div class="col-sm-7">
                        <div class="bg-gray-1" ng-show="includeMobilVerificationBlock">
                           <verify-mobile template="1" otp-sent="false" mobile="" title="Verify your number" class="ng-isolate-scope">
                              <!-- ngIf: template == '1' -->
                              <form name="formMobileVerification" class="pad-16 mobile-verification-box ng-pristine ng-scope ng-invalid ng-invalid-required ng-valid-pattern ng-valid-minlength ng-valid-maxlength" ng-if="template == &#39;1&#39;">
                                 <!-- ngIf: !isOTPSent -->
                                 <div class="font-size-base-1 mar-b8 ng-binding ng-scope" ng-if="!isOTPSent"> Verify your number </div>
                                 <!-- end ngIf: !isOTPSent -->
                                 <!-- ngIf: isOTPSent -->
                                 <!-- ngIf: !isOTPSent -->
                                 <div class="input-group mar-b8 ng-scope" ng-if="!isOTPSent">
                                    <input class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required ng-valid-pattern ng-valid-minlength ng-valid-maxlength" name="mobile" type="text" placeholder="10 Digit Mobile Number" minlength="10" maxlength="10" required="" ng-model="student.mobile" ng-pattern="/^[0-9]+$/">
                                    <span class="input-group-btn">
                                       <button type="button" class="btn btn-primary disabled" ng-class="{&#39;disabled&#39;: formMobileVerification.mobile.$invalid}" ng-click="sendOTP(false)">
                                          Send OTP
                                          <!-- ngIf: activeLoader == loader.resentOTP -->
                                       </button>
                                    </span>
                                 </div>
                                 <!-- end ngIf: !isOTPSent -->
                                 <!-- ngIf: isOTPSent -->
                                 <!-- ngIf: isOTPSent -->
                              </form>
                              <!-- end ngIf: template == '1' -->
                              <!-- ngIf: template == '2' -->
                           </verify-mobile>
                        </div>
                        <div class="form-control-static ng-binding ng-hide" ng-show="!includeMobilVerificationBlock">
                           <button type="button" class="btn btn-link mar-t-4 pad-4 pull-right ng-hide" ng-show="isMobileVerified" ng-click="editMobile()">
                           <i class="tb-icon tb-edit"></i>
                           </button>
                           <span class="text-success ng-hide" ng-show="isMobileVerified">Verified</span>
                           <span class="label label-danger" ng-show="!isMobileVerified">Unverified</span>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="username" class="col-sm-5 control-label">Username</label>
                     <div class="col-sm-7">
                        <div class="js-edit-show input-state" ng-class="{&#39;error&#39;: hasError(user, &#39;userName&#39;)}" data-error="Username not available">
                           <input class="form-control ng-pristine ng-untouched ng-valid" ng-model="user.userName" name="userName" type="text" placeholder="Username" ng-blur="onBlur(updateUserInfo, user, &#39;userName&#39;)" ng-focus="onFocus(user, &#39;userName&#39;)" disabled="">
                        </div>
                        <div class="form-control-static js-edit-hide ng-binding">aayushrishah</div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-5 control-label">Password</label>
                     <div class="col-sm-7">
                        <button type="button" class="btn btn-sm btn-link mar-t2 pad-4 pull-right" ng-click="openUpdatePasswordModal()">
                        <span class="text-capitalize">Update</span>
                        </button>
                        <div class="form-control-static">********</div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-5 control-label">Subscription Plan</label>
                     <div class="col-sm-7">
                        <!-- ngRepeat: sub in user.subsArr -->
                        <!-- ngIf: user.subsArr.length == 0 -->
                        <div class="form-control-static ng-scope" ng-if="user.subsArr.length == 0">
                           <a href="https://testbook.com/plans" class="btn btn-sm btn-link pull-right mar-t-4"><span class="text-capitalize">Subscription Plans</span></a>
                           Not subscribed to any plans
                        </div>
                        <!-- end ngIf: user.subsArr.length == 0 -->
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-5 control-label">Enrolled Courses</label>
                     <div class="col-sm-7">
                        <ul class="list-unstyled enrolled-courses-list">
                           <!-- ngRepeat: enrollment in user.enrollments -->
                           <li class="clearfix ng-scope" ng-repeat="enrollment in user.enrollments">
                              <!-- ngIf: user.currentCourse.id != enrollment.course.id && user.enrollments.length > 1 -->
                              <a ng-href="bank-po" class="font-size-h5 d-inline-block mar-v8 font-weight-semibold ng-binding text-theme" ng-class="!(user.currentCourse.id != enrollment.course.id &amp;&amp; user.enrollments.length &gt; 1) ? &#39;text-theme&#39;: &#39;text-gray-5&#39;" href="https://testbook.com/bank-po">Bank PO</a>
                           </li>
                           <!-- end ngRepeat: enrollment in user.enrollments -->
                           <li class="clearfix ng-scope" ng-repeat="enrollment in user.enrollments">
                              <!-- ngIf: user.currentCourse.id != enrollment.course.id && user.enrollments.length > 1 --><button type="button" class="btn btn-sm btn-link pull-right mar-t2 ng-scope" ng-if="user.currentCourse.id != enrollment.course.id &amp;&amp; user.enrollments.length &gt; 1" ng-click="unEnrollAndReEnroll(enrollment.course, !(enrollment.course.hasOwnProperty(&#39;isInactive&#39;) &amp;&amp; enrollment.course.isInactive))">
                              <span class="text-capitalize">Un-Enroll</span>
                              </button><!-- end ngIf: user.currentCourse.id != enrollment.course.id && user.enrollments.length > 1 -->
                              <a ng-href="ssc" class="font-size-h5 d-inline-block mar-v8 font-weight-semibold ng-binding text-gray-5" ng-class="!(user.currentCourse.id != enrollment.course.id &amp;&amp; user.enrollments.length &gt; 1) ? &#39;text-theme&#39;: &#39;text-gray-5&#39;" href="https://testbook.com/ssc">SSC</a>
                           </li>
                           <!-- end ngRepeat: enrollment in user.enrollments -->
                           <li class="clearfix ng-scope" ng-repeat="enrollment in user.enrollments">
                              <!-- ngIf: user.currentCourse.id != enrollment.course.id && user.enrollments.length > 1 --><button type="button" class="btn btn-sm btn-link pull-right mar-t2 ng-scope" ng-if="user.currentCourse.id != enrollment.course.id &amp;&amp; user.enrollments.length &gt; 1" ng-click="unEnrollAndReEnroll(enrollment.course, !(enrollment.course.hasOwnProperty(&#39;isInactive&#39;) &amp;&amp; enrollment.course.isInactive))">
                              <span class="text-capitalize">Un-Enroll</span>
                              </button><!-- end ngIf: user.currentCourse.id != enrollment.course.id && user.enrollments.length > 1 -->
                              <a ng-href="pspcl" class="font-size-h5 d-inline-block mar-v8 font-weight-semibold ng-binding text-gray-5" ng-class="!(user.currentCourse.id != enrollment.course.id &amp;&amp; user.enrollments.length &gt; 1) ? &#39;text-theme&#39;: &#39;text-gray-5&#39;" href="https://testbook.com/pspcl">PSPCL</a>
                           </li>
                           <!-- end ngRepeat: enrollment in user.enrollments -->
                        </ul>
                        <!-- ngIf: isShowAddMoreCoursesCTA --><a href="https://testbook.com/enrollment?modal=true&amp;fromMoreCourses=true" class="btn btn-link pad-h0 js-tb-extra-anchor ng-scope" data-redirect-url="/settings" ng-if="isShowAddMoreCoursesCTA">
                        <span class="text-capitalize">Add more Courses</span>
                        </a><!-- end ngIf: isShowAddMoreCoursesCTA -->
                     </div>
                     <label class="col-sm-5 control-label">Un-Enrolled Courses</label>
                     <div class="col-sm-7">
                        <ul class="list-unstyled enrolled-courses-list">
                           <!-- ngRepeat: deEnrollment in user.deEnrollments -->
                           <!-- ngIf: user.deEnrollments && !user.deEnrollments.length -->
                           <li ng-if="user.deEnrollments &amp;&amp; !user.deEnrollments.length" class="mar-v8 ng-scope">None</li>
                           <!-- end ngIf: user.deEnrollments && !user.deEnrollments.length -->
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="text-right pad-16">
                  <button type="button" class="btn btn-sm btn-danger" ng-click="deactivateAccount()">Deactivate Account</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>