
    <div class="pad-t52 js-tb-container" style="margin-top: 0px;">
        <div class="container-fluid dashboard-container">
            <div class="row">
                <div class="col-xs-12 mar-t24 collect-info-alert-open" >
                    <div class="board-group">
                        <a href="<?php echo site_url('Coaching/edit_profile'); ?>" class="panel board bg-theme text-white collect-info-alert" >
                            <div class="panel-body">
                                <i class="tb-icon tb-arrow-right-thin pull-right"></i>
                                <h5 class="mar-t0 ng-binding">Complete your profile (0/5)</h5>
                                <div class="profile-completion-status">
                                    <span style="width: 0%;"></span>
                                </div>
                            </div>
                        </a>
                        <div class="panel panel-default board">
                            <div class="panel-heading">
                                <h3 class="panel-title">Current Course</h3>
                            </div>
                            <div class="panel-body">
                                <div class="recent-course">
                                    <div class="box-left align-middle text-center">
                                        <div class="d-inline-block align-middle text-center">
                                            <span class="d-block text-white mar-h-auto icon" style="background-color: rgb(31, 186, 214);">
                                                <i class="tb-icon tb-aptitude"></i>
                                            </span>
                                            <?php
                            $active='';
                            $alternate='';
                            $count=count($student_exams);
                            $i=0;
                             foreach($student_exams as $exam ){
                                $i++;
                                if($exam->StudentActivityOn==1)
                                {
                                    $active=$exam->ExamTitle;
                                    $activeId=$exam->ExamMasterId;
                                }
                                if($i==$count){
                                    $alternate=$exam->ExamTitle;
                                    $alternateId=$exam->ExamMasterId;
                                }

                            }
                             ?>
                                            <h4 class="mar-b0 text-ellipsis title">
                                                <a title="Aptitude" class="text-gray-11 ng-binding" href="#"><?php if($active!=''){echo $active; }else{ echo $alternate; } ?></a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="box-right align-middle">
                                        <!-- ngIf: (latestCourseObj.testData.allCount + latestCourseObj.testData.addedCount + latestCourseObj.testData.attemptedCount) != 0 --><div class="pad-v16 details ng-scope" >
                                            <div class="row">
                                                <!-- ngIf: (latestCourseObj.testData.addedCount + latestCourseObj.testData.attemptedCount) != 0 --><div class="col-xs-6 col-lg-6 ng-scope" >
                                                    <p class="text-gray-11 mar-b0">
                                                        <span class="font-size-large ng-binding">3</span>
                                                        <span class="font-size-base-1 ng-binding">/ 7</span>
                                                    </p>
                                                    <p class="text-gray-8 font-size-small mar-b0">Tests Attempted</p>
                                                </div><!-- end ngIf: (latestCourseObj.testData.addedCount + latestCourseObj.testData.attemptedCount) != 0 -->
                                                <!-- ngIf: (latestCourseObj.testData.addedCount + latestCourseObj.testData.attemptedCount) == 0 -->
                                                <div class="col-xs-6 col-lg-4 col-lg-offset-2 actions">
                                                    <!-- ngIf: (latestCourseObj.testData.allCount + latestCourseObj.testData.addedCount + latestCourseObj.testData.attemptedCount) != 0 --><div  class="ng-scope">
                                                        <!-- ngIf: setActiveTestButton(latestCourseObj) == 1 -->
                                                        <!-- ngIf: setActiveTestButton(latestCourseObj) == 2 --><a class="btn btn-theme btn-block ng-scope" href="<?php echo site_url('Coaching/mytestseries'); ?>"><span class="text-capitalize">Take Tests</span></a><!-- end ngIf: setActiveTestButton(latestCourseObj) == 2 -->
                                                        <!-- ngIf: setActiveTestButton(latestCourseObj) == 3 -->
                                                    </div><!-- end ngIf: (latestCourseObj.testData.allCount + latestCourseObj.testData.addedCount + latestCourseObj.testData.attemptedCount) != 0 -->
                                                </div>
                                            </div>
                                        </div><!-- end ngIf: (latestCourseObj.testData.allCount + latestCourseObj.testData.addedCount + latestCourseObj.testData.attemptedCount) != 0 -->
                                        <!-- ngIf: latestCourseObj.hasPractice --><div class="pad-v16 details ng-scope" >
                                            <div class="row">
                                               <!-- <div class="col-xs-6 col-lg-6">
                                                    <p class="text-gray-11 mar-b0">
                                                        <span class="font-size-large ng-binding">0</span>
                                                        <span class="font-size-base-1 ng-binding">/ 33</span>
                                                    </p>
                                                    <p class="text-gray-8 font-size-small mar-b0">Chapters Completed</p>
                                                </div>-->
                                                <div class="col-xs-12 col-lg-12 actions">
                                                    Study And Give Exams
                                                    <!--<a class="btn btn-success btn-block" href="https://testbook.com/aptitude-practice">
                                                        <!-- ngIf: setActivePracticeButton(latestCourseObj) == 1 <span class="text-capitalize ng-scope"> Start Practice </span> end ngIf: setActivePracticeButton(latestCourseObj) == 1 -->
                                                        <!-- ngIf: setActivePracticeButton(latestCourseObj) == 2 
                                                    </a>-->
                                                </div>
                                            </div>
                                        </div><!-- end ngIf: latestCourseObj.hasPractice -->
                                        <!-- ngIf: !latestCourseObj.hasPractice && ((latestCourseObj.testData.allCount + latestCourseObj.testData.addedCount + latestCourseObj.testData.attemptedCount) == 0) -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ngIf: quizArr && quizArr.length -->
                        <!-- ngIf: myOrSuggestedCoursesInfoArr.length != 0 && !hideSuggestedCourses --><div class="panel panel-default board ng-scope" >
                            <div class="panel-heading">
                                <!-- ngIf: myOrSuggestedCoursesInfoArr.length > 2 --><button type="button" class="btn btn-sm text-gray-3 mar-t-4 pad-v2 pull-right ng-scope" >
                                    <!-- ngIf: myOrSuggestedCoursesInfoArr.length > 2 && ExpandCollapseMyOrSuggComp --><span class="text-capitalize ng-scope" >View All</span><!-- end ngIf: myOrSuggestedCoursesInfoArr.length > 2 && ExpandCollapseMyOrSuggComp -->
                                    <!-- ngIf: myOrSuggestedCoursesInfoArr.length > 2 && !ExpandCollapseMyOrSuggComp -->
                                </button><!-- end ngIf: myOrSuggestedCoursesInfoArr.length > 2 -->
                                <h3 class="panel-title ng-binding">My Courses</h3>
                            </div>
                            <div class="panel-body pad-v12 other-courses">
                                <!-- ngRepeat: course in myOrSuggestedCoursesInfoArr | limitTo : coursesInMyOrSuggComp --><div class="pad-t24 pad-b16 course ng-scope enrolled" ng-repeat="course in myOrSuggestedCoursesInfoArr | limitTo : coursesInMyOrSuggComp" ng-class="{'enrolled' : course.isEnrolled}">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-7 col-md-5 col-lg-3 pad-r4">
                                            <div class="pull-left text-white text-center font-size-medium mar-r16 icon"  style="background-color: rgb(31, 186, 214);">
                                                <i class="tb-icon tb-gate-ec" ></i>
                                            </div>
                                            <div class="font-weight-semibold mar-t8 pad-t2 text-ellipsis">
                                                <a title="GATE EC" class="text-gray-11 ng-binding" href="https://testbook.com/gate-ec">GATE EC</a>
                                            </div>
                                        </div>
                                        <div class="col-xs-8 col-sm-5 col-md-7 col-lg-9 pad-l4">
                                            <div class="row">
                                                <div class="col-xs-12 col-lg-6 pull-right">
                                                    <div class="row">
                                                        <div class="col-xs-6 col-xs-offset-6 pad-l2 text-nowrap hide-enrolled">
                                                            <button type="button" class="btn btn-sm btn-default btn-block" >
                                                                <span class="text-capitalize">Enroll</span>
                                                                <!-- ngIf: activeLoader == loader.loaderArrForEnrollInSuggCourses[$index] -->
                                                            </button>
                                                        </div>
                                                        <div class="col-xs-12 text-nowrap show-enrolled">
                                                            <div class="row mar-h-2">
                                                                <!-- ngIf: course.hasPractice --><div class="col-xs-6 pad-h2 pull-right ng-scope" >
                                                                    <a class="btn btn-sm btn-default btn-block" href="#">
                                                                        <!-- ngIf: setActivePracticeButton(course) == 1 --><span class="text-capitalize ng-scope"> Start Practice </span><!-- end ngIf: setActivePracticeButton(course) == 1 -->
                                                                        <!-- ngIf: setActivePracticeButton(course) == 2 -->
                                                                    </a>
                                                                </div><!-- end ngIf: course.hasPractice -->
                                                                <div class="col-xs-6 pad-h2 pull-right">
                                                                    <!-- ngIf: setActiveTestButton(course) == 1 && ((course.testData.allCount + course.testData.addedCount + course.testData.attemptedCount) != 0) --><a class="btn btn-default btn-sm btn-block ng-scope" href="#"><span class="text-capitalize">Add Tests</span></a><!-- end ngIf: setActiveTestButton(course) == 1 && ((course.testData.allCount + course.testData.addedCount + course.testData.attemptedCount) != 0) -->
                                                                    <!-- ngIf: setActiveTestButton(course) == 2 && ((course.testData.allCount + course.testData.addedCount + course.testData.attemptedCount) != 0) -->
                                                                    <!-- ngIf: setActiveTestButton(course) == 3 && ((course.testData.allCount + course.testData.addedCount + course.testData.attemptedCount) != 0) -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ngIf: course.hasPractice || ((course.testData.allCount + course.testData.addedCount + course.testData.attemptedCount) != 0) --><div class="col-xs-12 col-lg-6 pull-right visible-lg ng-scope">
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            <!-- ngIf: (course.testData.allCount + course.testData.addedCount + course.testData.attemptedCount) != 0 --><div class="ng-scope">
                                                                <p class="mar-b2 text-gray-11 font-size-small font-weight-semibold hide-enrolled ng-binding">4</p>
                                                                <p class="mar-b2 text-gray-11 font-size-small font-weight-semibold show-enrolled">
                                                                    <!-- ngIf: (course.testData.addedCount + course.testData.attemptedCount) != 0 -->
                                                                    <!-- ngIf: ((course.testData.addedCount + course.testData.attemptedCount) == 0) && (course.testData.freeCount != 0) --><span class="ng-binding ng-scope">4</span><!-- end ngIf: ((course.testData.addedCount + course.testData.attemptedCount) == 0) && (course.testData.freeCount != 0) -->
                                                                    <!-- ngIf: ((course.testData.addedCount + course.testData.attemptedCount) == 0) && (course.testData.freeCount == 0) -->
                                                                </p>
                                                                <p class="mar-0 text-gray-8 font-size-small text-nowrap">
                                                                    <span class="hide-enrolled">Tests Available</span>
                                                                    <span class="show-enrolled">
                                                                        <!-- ngIf: (course.testData.addedCount + course.testData.attemptedCount) != 0 -->
                                                                        <!-- ngIf: ((course.testData.addedCount + course.testData.attemptedCount) == 0) && (course.testData.freeCount != 0) --><span class="ng-scope">Free Tests Available</span><!-- end ngIf: ((course.testData.addedCount + course.testData.attemptedCount) == 0) && (course.testData.freeCount != 0) -->
                                                                        <!-- ngIf: ((course.testData.addedCount + course.testData.attemptedCount) == 0) && (course.testData.freeCount == 0) -->
                                                                    </span>
                                                                </p>
                                                            </div><!-- end ngIf: (course.testData.allCount + course.testData.addedCount + course.testData.attemptedCount) != 0 -->
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <!-- ngIf: course.hasPractice --><div class="ng-scope">
                                                                <p class="mar-b2 text-gray-11 font-size-small font-weight-semibold hide-enrolled ng-binding">11</p>
                                                                <p class="mar-b2 text-gray-11 font-size-small font-weight-semibold show-enrolled ng-binding">0/11</p>
                                                                <p class="mar-0 text-gray-8 font-size-small text-nowrap">
                                                                    <span class="hide-enrolled">Chapters to Practice</span>
                                                                    <span class="show-enrolled">Chapters Completed</span>
                                                                </p>
                                                            </div><!-- end ngIf: course.hasPractice -->
                                                        </div>
                                                    </div>
                                                </div><!-- end ngIf: course.hasPractice || ((course.testData.allCount + course.testData.addedCount + course.testData.attemptedCount) != 0) -->
                                                <!-- ngIf: !course.hasPractice && ((course.testData.allCount + course.testData.addedCount + course.testData.attemptedCount) == 0) -->
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end ngRepeat: course in myOrSuggestedCoursesInfoArr | limitTo : coursesInMyOrSuggComp --><div class="pad-t24 pad-b16 course ng-scope enrolled">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-7 col-md-5 col-lg-3 pad-r4">
                                            <div class="pull-left text-white text-center font-size-medium mar-r16 icon"  style="background-color: rgb(31, 186, 214);">
                                                <i class="tb-icon tb-bsnl-tta" ></i>
                                            </div>
                                            <div class="font-weight-semibold mar-t8 pad-t2 text-ellipsis">
                                                <a title="BSNL TTA" class="text-gray-11 ng-binding" href="#">BSNL TTA</a>
                                            </div>
                                        </div>
                                        <div class="col-xs-8 col-sm-5 col-md-7 col-lg-9 pad-l4">
                                            <div class="row">
                                                <div class="col-xs-12 col-lg-6 pull-right">
                                                    <div class="row">
                                                        <div class="col-xs-6 col-xs-offset-6 pad-l2 text-nowrap hide-enrolled">
                                                            <button type="button" class="btn btn-sm btn-default btn-block">
                                                                <span class="text-capitalize">Enroll</span>
                                                                <!-- ngIf: activeLoader == loader.loaderArrForEnrollInSuggCourses[$index] -->
                                                            </button>
                                                        </div>
                                                        <div class="col-xs-12 text-nowrap show-enrolled">
                                                            <div class="row mar-h-2">
                                                                <!-- ngIf: course.hasPractice -->
                                                                <div class="col-xs-6 pad-h2 pull-right">
                                                                    <!-- ngIf: setActiveTestButton(course) == 1 && ((course.testData.allCount + course.testData.addedCount + course.testData.attemptedCount) != 0) -->
                                                                    <!-- ngIf: setActiveTestButton(course) == 2 && ((course.testData.allCount + course.testData.addedCount + course.testData.attemptedCount) != 0) -->
                                                                    <!-- ngIf: setActiveTestButton(course) == 3 && ((course.testData.allCount + course.testData.addedCount + course.testData.attemptedCount) != 0) -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ngIf: course.hasPractice || ((course.testData.allCount + course.testData.addedCount + course.testData.attemptedCount) != 0) -->
                                                <!-- ngIf: !course.hasPractice && ((course.testData.allCount + course.testData.addedCount + course.testData.attemptedCount) == 0) --><div class="col-lg-12 show-enrolled ng-scope">
                                                    <p class="text-gray-8 mar-t8 mar-b0 pad-t2 font-size-base-1"> New Tests will be added soon!</p>
                                                </div><!-- end ngIf: !course.hasPractice && ((course.testData.allCount + course.testData.addedCount + course.testData.attemptedCount) == 0) -->
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end ngRepeat: course in myOrSuggestedCoursesInfoArr | limitTo : coursesInMyOrSuggComp -->
                            </div>
                        </div><!-- end ngIf: myOrSuggestedCoursesInfoArr.length != 0 && !hideSuggestedCourses -->
                    </div>
                    <div class="side-board-group">
                        <div class="panel panel-default board board-profile js-profile">
                            <div class="panel-body">
                                <!-- ngIf: activeBox == profileBoxUI.profileDispBoxOpen --><form class="media pad-b48 ng-pristine ng-scope ng-valid-minlength ng-valid-maxlength ng-valid ng-valid-required" name="userInputs">

                                    <div class="media-left pad-r16">                                        
                                        <span class="media-object user-img" style="background-image: url(<?php echo base_url('uploads/student_images/'.$student_info[0]->StudentImage); ?>"></span>
                                    </div>

                                    <div class="media-body">
                                        <div class="profile-detail">
                                            <h4 class="media-heading hide-on-edit ng-binding">
                                                <span class="pull-right cursor-pointer text-gray-7 mar-t-2">
                                                    <i class="tb-icon tb-edit"></i>
                                                </span>
                                                <?php echo $student_info[0]->StudentFullName; ?>
                                            </h4>
                                            <div class="form-group mar-b8 show-on-edit" data-error="Name cannot be empty">
                                                <input class="form-control input-sm ng-pristine ng-untouched ng-valid ng-valid-required" name="username" placeholder="Name" required="" value="Sujeet Malvi" type="text">
                                            </div>
                                        </div>
                                        <div class="profile-detail">
                                            <p class="mar-b4 text-gray-3 ng-binding" title="smdelhi2020@gmail.com">
                                                <?php echo $student_info[0]->StudentEmail; ?> <!-- ngIf: !isEmailVerified -->
                                            </p>
                                        </div>
                                        <div class="profile-detail">
                                            <p class="mar-b4 text-gray-3 hide-on-edit">
                                                <!-- ngIf: verifiedNumber != '' --><span class="ng-binding ng-scope">
                                                   <?php echo $student_info[0]->StudentMobileNo; ?><!-- ngIf: verifiedNumber == '' -->
                                                </span><!-- end ngIf: verifiedNumber != '' -->
                                                <!-- ngIf: user.mobile && (user.mobile != '') && (verifiedNumber == '') -->
                                                <!-- ngIf: !(user.mobile) -->
                                                <span class="pull-right cursor-pointer text-gray-7 mar-t-2" >
                                                    <i class="tb-icon tb-edit"></i>
                                                </span>
                                            </p>
                                            <div class="form-group show-on-edit">
                                                <input minlength="10" maxlength="10" class="form-control input-sm ng-pristine ng-untouched ng-valid-minlength ng-valid-maxlength ng-valid ng-valid-required" placeholder="Mobile Number" name="usermobile" required="" value="9425656459" type="tel">
                                            </div>
                                        </div>
                                        <!-- ngIf: (!isMobileEditable && !isNameEditable) --><div class="profile-detail ng-scope" >
                                            <p class="mar-b4 text-gray-3">
                                                <!-- ngIf: user.location != '' -->
                                                <!-- ngIf: user.location == '' --><a href="#" class="d-inline-block mar-b4 text-gray-3 ng-scope">
                                                    Add Location
                                                </a><!-- end ngIf: user.location == '' -->
                                                <span class="pull-right cursor-pointer text-gray-7 mar-t-2">
                                                    <i class="tb-icon tb-edit"></i>
                                                </span>
                                            </p>
                                        </div><!-- end ngIf: (!isMobileEditable && !isNameEditable) -->
                                    </div>
                                </form>
                                <div class="text-right action-buttons ng-scope">

                                    <a href="<?php echo site_url('Coaching/edit_profile'); ?>" class="btn btn-sm btn-default ng-scope">
                                        <span class="text-capitalize">Settings</span>
                                        <i class="tb-icon tb-setting"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                     <!--   <div class="panel board board-quick-links js-quick-links">
                            <div class="panel-heading pad-0">
                                <h3 class="panel-title d-inline-block pad-b4 text-gray-11">Quick Links</h3>
                            </div>
                            <div class="panel-body pad-h0 pad-v8">
                                <ul class="list-unstyled links-list">
                                    <li>
                                        <a href="https://testbook.com/saved-questions" class="d-block pad-v8 text-gray-11">
                                            Saved Questions
                                            <i class="tb-icon tb-arrow-right-thin pull-right"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://testbook.com/reported-questions" class="d-block pad-v8 text-gray-11">
                                            Reported Questions
                                            <i class="tb-icon tb-arrow-right-thin pull-right"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="https://testbook.com/blog/category/current-affairs/" class="d-block pad-v8 text-gray-11" target="_blank">
                                            Daily Current Affairs
                                            <i class="tb-icon tb-arrow-right-thin pull-right"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://testbook.com/blog/category/current-affairs-quiz/" class="d-block pad-v8 text-gray-11" target="_blank">
                                            Daily Current Affairs Quiz
                                            <i class="tb-icon tb-arrow-right-thin pull-right"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://testbook.com/blog/category/notifications/" class="d-block pad-v8 text-gray-11" target="_blank">
                                            Exam Notifications
                                            <i class="tb-icon tb-arrow-right-thin pull-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-notifications" >
        <div class="each-notification">
            <div class="pull-right mar-r-8 mar-t-4">
                <button type="button" class="btn btn-sm mar-t-4 close-it">
                    <i class="tb-icon tb-clear font-sm"></i>
                </button>
            </div>
            <span class="ng-binding">Enrolled in </span>
        </div>
    </div>
    <input id="curCourseURL" value="aptitude" type="hidden">
   