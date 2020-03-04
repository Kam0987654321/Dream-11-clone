<div class="content-wrapper js-tb-container" style="margin-top: 0px;">
   <div class="tb-landing-banner mocktest-banner"  style="background-image: url(&quot;//testbook.com/assets/img/banner-bg/mocktest-banner-bg-1.jpg&quot;);">
      <div class="top-bg-overlay-fill"></div>
      <div class="banner-stats" id="banner_stats" ng-show="isInit" style="">
         <div class="row bs-inner">
            <div class="each-stat">
               <div class="number ng-binding">619 </div>
               <div class="name">Total Tests</div>
            </div>
            <div class="each-stat">
               <div class="number ng-binding">18175</div>
               <div class="name">Total Questions</div>
            </div>
            <div class="each-stat">
               <div class="number ng-binding">2688517</div>
               <div class="name">TESTS TAKEN</div>
            </div>
         </div>
      </div>

      <div class="lb-content" ng-show="isInit">
         <div class="tab-content mt-banner-content">
            <div role="tabpanel" class="tab-pane fade show-normal-banner active in" id="mt-banner-0">
               <div class="banner-content-container normal-banner">
                  <h1 class="heading mar-t0 ng-binding"> Bank PO </h1>
                  <h5 class="sub-heading ng-binding"> IBPS PO, SBI PO, SBI Associate PO, and other PO/MT Cadre Exams </h5>
                  <a ng-href="/bank-po?loc=articlesAndUpdates" class="btn btn-link-white mar-b8 text-underline" href="https://testbook.com/bank-po?loc=articlesAndUpdates"><span class="text-capitalize">Course Info and Articles</span></a>
                  <!-- ngIf: !isEnrolledInCourse -->
                  <!-- ngIf: isEnrolledInCourse -->
                  <div class="banner-btn-group cta-take-tests" ng-if="isEnrolledInCourse">
                     <button type="button" class="btn btn-success btn-lg state state-1" data-ng-click="scrollGetStartedForFree()">Get Started for Free</button>
                     <button type="button" class="btn btn-success btn-lg state state-2" data-ng-click="scrollPurchaseMoreTests()">Add Tests</button>
                     <button type="button" class="btn btn-success btn-lg state state-3" data-ng-click="scrollTakeTests()">Take Tests</button>
                     <button type="button" class="btn btn-success btn-lg state state-4" data-ng-click="scrollReviewTests()">Review Tests</button>
                     <p class="state state-5">New Tests will be added soon</p>
                    
                  </div>
                  <!-- end ngIf: isEnrolledInCourse -->
               </div>
               <div class="banner-content-container special-banner">
                  <h1 class="heading mar-t0 ng-binding"> Bank PO </h1>
                  <h4 class="sub-heading ng-binding"> IBPS PO, SBI PO, SBI Associate PO, and other PO/MT Cadre Exams </h4>
                  <div class="banner-btn-group">
                  </div>
               </div>
            </div>
          
         </div>
         <ul class="pad-0 banner-slide-nav js-banner-slide-nav active" role="tablist">
            <li role="presentation" class="mar-l4 mar-r2" ng-show="promotionsArr.length"><a href="https://testbook.com/bank-po/mocktest#mt-banner-0" aria-controls="mt-banner-0" role="tab" data-toggle="tab" aria-expanded="false"></a></li>
            <!-- ngRepeat: promotion in promotionsArr -->
            
         </ul>
      </div>
   </div>
</div>
<div class="container-fluid mocktest-content js-mocktest-content">
   <div class="row">
      <div class="col-xs-12 mocktest-tabs js-mocktest-tabs" style="">
         <div class="wrapper">
            <ul class="tabs list-unstyled">
               <li id="all_test_tab_handler" ng-class="{&#39;active&#39; : currentActiveTab == &#39;all&#39;}" ng-click="manageTabs(&#39;all&#39;)">ALL TESTS</li>
               <li id="my_test_tab_handler" ng-class="{&#39;active&#39; : currentActiveTab == &#39;my&#39;}" ng-click="manageTabs(&#39;my&#39;)" class="active">
                  MY TESTS
                  <span class="badge badge-dark-grey ng-binding"> 3 </span>
               </li>
               <li id="attempted_test_tab_handler" ng-class="{&#39;active&#39; : currentActiveTab == &#39;attempted&#39;}" ng-click="manageTabs(&#39;attempted&#39;)">
                  ATTEMPTED
                  <span class="badge badge-dark-grey ng-binding"> 0 </span>
               </li>
               <li id="daily_quiz_tab_handler" ng-class="{&#39;active&#39; : currentActiveTab == &#39;quiz&#39;}" ng-click="manageTabs(&#39;quiz&#39;)" ng-show="allQuizesArr.length" class="">
                  QUIZZES
                  <span class="badge badge-dark-grey ng-binding"> 68 </span>
               </li>
            </ul>
            <div class="mobile-search-filters-btns">
               <!-- ngIf: currentActiveTab == 'my' && isMyTestsAvailable --><button type="button" class="btn search ng-scope" data-ng-click="toggleSearchOnMobile(true, &#39;my&#39;)" data-ng-if="currentActiveTab == &#39;my&#39; &amp;&amp; isMyTestsAvailable"><i class="tb-icon tb-search"></i></button><!-- end ngIf: currentActiveTab == 'my' && isMyTestsAvailable -->
               <!-- ngIf: currentActiveTab == 'quiz' && isQuizAvailable -->
               <!-- ngIf: currentActiveTab == 'all' && isAllTestsAvailable -->
               <!-- ngIf: currentActiveTab == 'my' && isMyTestsAvailable --><button type="button" class="btn ng-scope" data-ng-click=" openMobileFilters(&#39;my&#39;) " data-ng-if="currentActiveTab == &#39;my&#39; &amp;&amp; isMyTestsAvailable"><i class="tb-icon tb-filter"></i></button><!-- end ngIf: currentActiveTab == 'my' && isMyTestsAvailable -->
               <!-- ngIf: currentActiveTab == 'quiz' -->
            </div>
         </div>
         <div class="row my-tab-open" ng-class="{
            <div class="col-xs-12 mocktest-filters mocktest-filters-my ng-scope" ng-if="myTestsArr.length">
               <div class="wrapper">
                  <div class="row">
                     <div class="col-xs-4 search">
                        <form class="ng-pristine ng-valid">
                           <label><i class="tb-icon tb-search" ng-click="setTestTitleForSearch(myFilter.testTitle, false)"></i></label>
                           <input ng-keypress="setTestTitleByEnter($event, myFilter.testTitle)" class="form-control ng-pristine ng-untouched ng-valid" ng-change="setTestTitleForSearchOnChange(myFilter.testTitle, true)" data-ng-model-options="{ updateOn: &#39;default blur&#39;, debounce: { &#39;default&#39;: 0, &#39;blur&#39;: 100 } }" ng-model="myFilter.testTitle" placeholder="Search by Test Name">
                           <span class="clear-search ng-hide" ng-show=" myFilter.testTitle.length != 0 " ng-click="clearMySearch()"><i class="tb-icon tb-clear"></i></span>
                           <ul class="suggestions" ng-show="isShowSuggestions" style="display: block">
                              <!-- ngRepeat: x in arrayForSuggestions -->
                           </ul>
                        </form>
                     </div>
                     <div class="col-xs-8 filters-on-web">
                        <ul class="filters list-unstyled">
                           <li class="f-title"><i class="tb-icon tb-filter"></i> FILTERS:</li>
                           <li class="filter" ng-disabled="myFilter.specificExams.length &lt; 1">
                              <div class="dropdown">
                                 <a class="dropdown-toggle" ng-class="getFilteredClass(myFilter.specificExams)" id="filter_my_exam" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <span class="name">By Exam</span>
                                 <span class="count ng-binding">(0)</span>
                                 <i class="tb-icon tb-arrow-down-thin"></i>
                                 </a> 
                                 <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="filter_my_exam">
                                    <li class="d-arrow"></li>
                                    <!-- ngRepeat: exam in myFilter.specificExams -->
                                    <li ng-repeat="exam in myFilter.specificExams" class="ng-scope">
                                       <label class="tb-checkbox">
                                          <input type="checkbox" ng-model="exam.selected" ng-change="manageFilters(exam, myFilter.specificExams, &#39;my&#39;)" class="ng-pristine ng-untouched ng-valid">
                                          <span class="ng-binding">Syndicate Bank PO</span>
                                          <!-- ngIf: exam.value != 'All' && myFilter.specificExams.length > 0 --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="exam.value != &#39;All&#39; &amp;&amp; myFilter.specificExams.length &gt; 0 " ng-click="setFltersForSelectOnly(exam, myFilter.specificExams, &#39;my&#39;)">Only</a><!-- end ngIf: exam.value != 'All' && myFilter.specificExams.length > 0 -->
                                       </label>
                                    </li>
                                    <!-- end ngRepeat: exam in myFilter.specificExams -->
                                    <li ng-repeat="exam in myFilter.specificExams" class="ng-scope">
                                       <label class="tb-checkbox">
                                          <input type="checkbox" ng-model="exam.selected" ng-change="manageFilters(exam, myFilter.specificExams, &#39;my&#39;)" class="ng-pristine ng-untouched ng-valid">
                                          <span class="ng-binding">IBPS PO</span>
                                          <!-- ngIf: exam.value != 'All' && myFilter.specificExams.length > 0 --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="exam.value != &#39;All&#39; &amp;&amp; myFilter.specificExams.length &gt; 0 " ng-click="setFltersForSelectOnly(exam, myFilter.specificExams, &#39;my&#39;)">Only</a><!-- end ngIf: exam.value != 'All' && myFilter.specificExams.length > 0 -->
                                       </label>
                                    </li>
                                    <!-- end ngRepeat: exam in myFilter.specificExams -->
                                    <li ng-repeat="exam in myFilter.specificExams" class="ng-scope">
                                       <label class="tb-checkbox">
                                          <input type="checkbox" ng-model="exam.selected" ng-change="manageFilters(exam, myFilter.specificExams, &#39;my&#39;)" class="ng-pristine ng-untouched ng-valid">
                                          <span class="ng-binding">RRB Officer Scale-I</span>
                                          <!-- ngIf: exam.value != 'All' && myFilter.specificExams.length > 0 --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="exam.value != &#39;All&#39; &amp;&amp; myFilter.specificExams.length &gt; 0 " ng-click="setFltersForSelectOnly(exam, myFilter.specificExams, &#39;my&#39;)">Only</a><!-- end ngIf: exam.value != 'All' && myFilter.specificExams.length > 0 -->
                                       </label>
                                    </li>
                                    <!-- end ngRepeat: exam in myFilter.specificExams -->
                                    <li ng-repeat="exam in myFilter.specificExams" class="ng-scope">
                                       <label class="tb-checkbox">
                                          <input type="checkbox" ng-model="exam.selected" ng-change="manageFilters(exam, myFilter.specificExams, &#39;my&#39;)" class="ng-pristine ng-untouched ng-valid">
                                          <span class="ng-binding">Canara Bank PO</span>
                                          <!-- ngIf: exam.value != 'All' && myFilter.specificExams.length > 0 --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="exam.value != &#39;All&#39; &amp;&amp; myFilter.specificExams.length &gt; 0 " ng-click="setFltersForSelectOnly(exam, myFilter.specificExams, &#39;my&#39;)">Only</a><!-- end ngIf: exam.value != 'All' && myFilter.specificExams.length > 0 -->
                                       </label>
                                    </li>
                                    <!-- end ngRepeat: exam in myFilter.specificExams -->
                                 </ul>
                              </div>
                           </li>
                           <li class="filter" ng-disabled="myFilter.testTypes.length &lt; 1">
                              <div class="dropdown">
                                 <a class="dropdown-toggle" ng-class="getFilteredClass(myFilter.testTypes)" id="filter_my_test_type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <span class="name">Test Type</span>
                                 <span class="count ng-binding">(0)</span>
                                 <i class="tb-icon tb-arrow-down-thin"></i>
                                 </a> 
                                 <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="filter_my_test_type">
                                    <li class="d-arrow"></li>
                                    <!-- ngRepeat: type in myFilter.testTypes -->
                                    <li ng-repeat="type in myFilter.testTypes" class="ng-scope">
                                       <label class="tb-checkbox">
                                          <input type="checkbox" ng-model="type.selected" ng-change="manageFilters(type, myFilter.testTypes, &#39;my&#39;)" class="ng-pristine ng-untouched ng-valid">
                                          <span class="ng-binding">Paused Tests</span>
                                          <!-- ngIf: type.value != 'All' && myFilter.testTypes.length > 0 --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="type.value != &#39;All&#39; &amp;&amp; myFilter.testTypes.length &gt; 0 " ng-click="setFltersForSelectOnly(type, myFilter.testTypes, &#39;my&#39;)">Only</a><!-- end ngIf: type.value != 'All' && myFilter.testTypes.length > 0 -->
                                       </label>
                                    </li>
                                    <!-- end ngRepeat: type in myFilter.testTypes -->
                                    <li ng-repeat="type in myFilter.testTypes" class="ng-scope">
                                       <label class="tb-checkbox">
                                          <input type="checkbox" ng-model="type.selected" ng-change="manageFilters(type, myFilter.testTypes, &#39;my&#39;)" class="ng-pristine ng-untouched ng-valid">
                                          <span class="ng-binding">others</span>
                                          <!-- ngIf: type.value != 'All' && myFilter.testTypes.length > 0 --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="type.value != &#39;All&#39; &amp;&amp; myFilter.testTypes.length &gt; 0 " ng-click="setFltersForSelectOnly(type, myFilter.testTypes, &#39;my&#39;)">Only</a><!-- end ngIf: type.value != 'All' && myFilter.testTypes.length > 0 -->
                                       </label>
                                    </li>
                                    <!-- end ngRepeat: type in myFilter.testTypes -->
                                    <li ng-repeat="type in myFilter.testTypes" class="ng-scope">
                                       <label class="tb-checkbox">
                                          <input type="checkbox" ng-model="type.selected" ng-change="manageFilters(type, myFilter.testTypes, &#39;my&#39;)" class="ng-pristine ng-untouched ng-valid">
                                          <span class="ng-binding">Full Test - Prelims</span>
                                          <!-- ngIf: type.value != 'All' && myFilter.testTypes.length > 0 --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="type.value != &#39;All&#39; &amp;&amp; myFilter.testTypes.length &gt; 0 " ng-click="setFltersForSelectOnly(type, myFilter.testTypes, &#39;my&#39;)">Only</a><!-- end ngIf: type.value != 'All' && myFilter.testTypes.length > 0 -->
                                       </label>
                                    </li>
                                    <!-- end ngRepeat: type in myFilter.testTypes -->
                                    <li ng-repeat="type in myFilter.testTypes" class="ng-scope">
                                       <label class="tb-checkbox">
                                          <input type="checkbox" ng-model="type.selected" ng-change="manageFilters(type, myFilter.testTypes, &#39;my&#39;)" class="ng-pristine ng-untouched ng-valid">
                                          <span class="ng-binding">Full Test_Canara Bank PO 2018</span>
                                          <!-- ngIf: type.value != 'All' && myFilter.testTypes.length > 0 --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="type.value != &#39;All&#39; &amp;&amp; myFilter.testTypes.length &gt; 0 " ng-click="setFltersForSelectOnly(type, myFilter.testTypes, &#39;my&#39;)">Only</a><!-- end ngIf: type.value != 'All' && myFilter.testTypes.length > 0 -->
                                       </label>
                                    </li>
                                    <!-- end ngRepeat: type in myFilter.testTypes -->
                                 </ul>
                              </div>
                           </li>
                           <li class="filter">
                              <button type="button" class="btn reset-filter-btn" ng-click="resetFilters(&#39;my&#39;)">RESET</button>
              <?php //print_r($this->session->userdata()); ?>

                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end ngIf: myTestsArr.length -->
            <!-- ngIf: totalQuizes -->
            <div class="col-xs-12 mocktest-filters mocktest-filters-quiz ng-scope" ng-if="totalQuizes">
               <div class="wrapper">
                  <div class="row">
                     <div class="col-xs-4 search">
                        <form class="ng-pristine ng-valid">                           
                        </form>
                     </div>
                     <div class="col-xs-8 filters-on-web">
                        <ul class="filters list-unstyled">
                           <li class="f-title"><i class="tb-icon tb-filter"></i> FILTERS:</li>
                           <li class="filter" ng-disabled="quizFilter.exams.length &lt; 1">
                              <div class="dropdown">
                                 <a class="dropdown-toggle" ng-class="getFilteredClass(quizFilter.exams)" id="filter_my_exam" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <span class="name">By Exam</span>
                                 <span class="count ng-binding">(0)</span>
                                 <i class="tb-icon tb-arrow-down-thin"></i>
                                 </a> 
                                
                                 </ul>
                              </div>
                           </li>
                           <li class="filter" ng-disabled="quizFilter.types.length &lt; 1">
                              <div class="dropdown">
                                 <a class="dropdown-toggle" ng-class="getFilteredClass(quizFilter.types)" id="filter_my_test_type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <span class="name">Status</span>
                                 <span class="count ng-binding">(0)</span>
                                 <i class="tb-icon tb-arrow-down-thin"></i>
                                 </a> 
                                 <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="filter_my_test_type">
                                    <li class="d-arrow"></li>
                                    <!-- ngRepeat: type in quizFilter.types -->
                                    <li ng-repeat="type in quizFilter.types" class="ng-scope">
                                       <label class="tb-checkbox">
                                       <input type="checkbox" ng-model="type.isSelected" ng-change="manageQuizFilters()" class="ng-pristine ng-untouched ng-valid">
                                       <span class="ng-binding">Attempted Quiz</span>
                                       </label>
                                    </li>
                                    <!-- end ngRepeat: type in quizFilter.types -->
                                    <li ng-repeat="type in quizFilter.types" class="ng-scope">
                                       <label class="tb-checkbox">
                                       <input type="checkbox" ng-model="type.isSelected" ng-change="manageQuizFilters()" class="ng-pristine ng-untouched ng-valid">
                                       <span class="ng-binding">Unattempted Quiz</span>
                                       </label>
                                    </li>
                                    <!-- end ngRepeat: type in quizFilter.types -->
                                    <li ng-repeat="type in quizFilter.types" class="ng-scope">
                                       <label class="tb-checkbox">
                                       <input type="checkbox" ng-model="type.isSelected" ng-change="manageQuizFilters()" class="ng-pristine ng-untouched ng-valid">
                                       <span class="ng-binding">Paused Quiz</span>
                                       </label>
                                    </li>
                                    <!-- end ngRepeat: type in quizFilter.types -->
                                 </ul>
                              </div>
                           </li>
                           <li class="filter">
                              <button type="button" class="btn reset-filter-btn" ng-click="resetQuizFilters()">RESET</button>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end ngIf: totalQuizes -->
         </div>
      </div>
      <div class="col-xs-12 tab-holder js-content-holder">
         <div class="tab-content-tb" id="all_test_tab" ng-style="currentActiveTab === &#39;all&#39; ? { &#39;display&#39;:&#39;block&#39;} : { &#39;display&#39;: &#39;none&#39; }" style="display: none;">
            <div class="row">
               <!-- ngIf: allFiltersTagsArr.length -->
               <div class="col-xs-12 all-tests-strip ng-hide" ng-show="isFreeTestsAvailable">
                  <ul class="list js-scroll-element">
                     <!-- ngIf: getFreeTestsCount(allTestsObj.nonProducts) > 1 -->
                     <!-- ngRepeat: test in allTestsObj.nonProducts -->
                  </ul>
                  <button type="button" class="btn scroll-btn left js-scroll-btn" data-scroll="left"><i class="tb-icon tb-arrow-left-thin"></i></button>
                  <button type="button" class="btn scroll-btn right js-scroll-btn" data-scroll="right"><i class="tb-icon tb-arrow-right-thin"></i></button>
               </div>
               <!-- ngIf: allTestsObj.packs.length|| allTestsObj.comboPacks.length -->
               <div class="col-xs-12 tests-packs-container ng-scope" ng-if="allTestsObj.packs.length|| allTestsObj.comboPacks.length">
                  <div class="wrapper">
                     <div class="row">
                        <!-- ngRepeat: categoryObj in allTestsObj.comboPacks -->
                        <div class="col-xs-12 tests-sections ng-scope" ng-repeat="categoryObj in allTestsObj.comboPacks" ng-show="showComboCategory(categoryObj.value, categoryObj.subsArr)">
                           <div class="header">
                              <h5 class="title ng-binding">Combo Pack</h5>
                           </div>
                           <div class="body">
                              <div class="row">
                                 <div class="col-xs-12 packs-container">
                                    <div class="mt-card subscription-pack ng-scope subs-inactive" data-pid="59b2836ae5db553dae23f50d" ng-class="sub.statusClass" ng-style="{&#39;border-color&#39;: sub.colorHex}" ng-repeat="sub in categoryObj.subsArr" ng-if="sub.isShow &amp;&amp; sub.statusClass != &#39;subs-active&#39;" style="border-color: rgb(31, 186, 214);">
                                       <div class="mar-h-auto text-center price-details">
                                          <div class="sparkles" ng-style="{&#39;color&#39;: sub.colorHex}" style="color: rgb(31, 186, 214);">
                                             <span class="plus plus-1"></span>
                                             <span class="plus plus-2"></span>
                                             <span class="circle circle-1"></span>
                                             <span class="circle circle-2"></span>
                                          </div>
                                          <div class="font-weight-semibold font-size-medium-1 text-white tb-gradient-1 price-details-top" ng-style="{&#39;background-color&#39;: sub.colorHex}" style="background-color: rgb(31, 186, 214);">
                                             <div class="visible-subs-inactive visible-subs-expired ng-binding">Save <i class="tb-icon tb-rupee font-sm align-baseline"></i>50</div>
                                             <div class="visible-subs-active">Current Plan</div>
                                          </div>
                                          <div class="price-details-bottom">
                                             <div class="line-height-1 d-inline-block align-middle">
                                                <div class="text-line-through font-size-base-1 text-gray-8 mar-b4 visible-subs-inactive visible-subs-expired ng-binding">
                                                   <i class="tb-icon tb-rupee font-sm align-baseline"></i>199
                                                </div>
                                                <div class="text-gray-5 font-size-large font-weight-bold mar-b4">
                                                   <div class="visible-subs-inactive visible-subs-expired"><i class="tb-icon tb-rupee font-sm align-baseline"></i><span class="pack-selling-price ng-binding">149</span></div>
                                                   <div class="visible-subs-active ng-binding">1 Month</div>
                                                </div>
                                                <div class="text-gray-8 font-size-small hidden-subs-active ng-binding">For 1 Month</div>
                                             </div>
                                          </div>
                                       </div>
                                       <h3 class="mar-t24 pack-title ng-binding">Testbook Pass</h3>
                                       <div class="subs-state">
                                          <p class="visible-subs-inactive ng-binding">1 Month Subscription</p>
                                          <p class="text-success visible-subs-active ng-binding">1 Month Subscription is Active</p>
                                          <p class="text-danger visible-subs-expired ng-binding">1 Month Subscription Expired</p>
                                       </div>
                                       <div class="pack-status">
                                          <button type="button" class="btn btn-sm btn-link pull-right text-underline pad-2 mar-t-4" ng-click="showSubReleasePlan(sub.extraFeatures)">Release Plan</button>
                                          <p class="mar-b0 font-size-base-1 font-weight-semibold visible-subs-active ng-binding">0/661 Tests</p>
                                          <p class="mar-b0 font-size-base-1 font-weight-semibold visible-subs-inactive visible-subs-expired ng-binding">661+ Tests</p>
                                       </div>
                                       <div class="mar-t4 mar-b12 pack-progress visible-subs-active">
                                          <span ng-style="{&#39;width&#39;: sub.attemptedPercent}"></span>
                                       </div>
                                       <hr class="mar-v8">
                                       <!-- ngRepeat: feature in sub.featureArr -->
                                       <div class="font-size-base-1 font-weight-semibold pack-features ng-binding ng-scope" ng-repeat="feature in sub.featureArr">Unlimited Tests for All The Exams</div>
                                       <!-- end ngRepeat: feature in sub.featureArr -->
                                       <div class="font-size-base-1 font-weight-semibold pack-features ng-binding ng-scope" ng-repeat="feature in sub.featureArr">Hindi &amp; English - Bilingual Tests</div>
                                       <!-- end ngRepeat: feature in sub.featureArr -->
                                       <div class="font-size-base-1 font-weight-semibold pack-features ng-binding ng-scope" ng-repeat="feature in sub.featureArr">Detailed Solutions and Analysis</div>
                                       <!-- end ngRepeat: feature in sub.featureArr -->
                                       <hr class="mar-v4">
                                       <!-- ngIf: false -->
                                       <div class="pad-v4">
                                          <button type="button" class="btn btn-link btn-sm pad-v2 pad-h0" data-toggle="modal" data-target="#subscription-helper">How it works?</button>
                                       </div>
                                       <div class="buy-now-btn">
                                          <button type="button" class="btn btn-block" ng-click="addSubsBtnClicked(sub.id);" ng-style="{&#39;background-color&#39;: sub.colorHex}" style="background-color: rgb(31, 186, 214);">
                                          <span class="text-capitalize font-size-large visible-subs-inactive hidden-subs-upgrade">Subscribe Now</span>
                                          <span class="text-capitalize font-size-large visible-subs-upgrade">Upgrade Subscription</span>
                                          <span class="text-capitalize visible-subs-active ng-binding"> to expire</span>
                                          <span class="text-capitalize font-size-small-1 font-weight-semibold mar-t2 visible-subs-active ng-binding">Subscribed on </span>
                                          <span class="text-capitalize visible-subs-expired">Renew Subscription</span>
                                          <span class="text-capitalize font-size-small-1 font-weight-semibold mar-t2 visible-subs-expired ng-binding">Subscription expired on </span>
                                          </button>
                                       </div>
                                    </div>
                                    
                                    <div class="mt-card subscription-pack ng-scope subs-inactive" data-pid="59b2a30ee5db553dae255787" ng-class="sub.statusClass" ng-style="{&#39;border-color&#39;: sub.colorHex}" ng-repeat="sub in categoryObj.subsArr" ng-if="sub.isShow &amp;&amp; sub.statusClass != &#39;subs-active&#39;" style="border-color: rgb(22, 180, 95);">
                                       <div class="mar-h-auto text-center price-details">
                                          <div class="sparkles" ng-style="{&#39;color&#39;: sub.colorHex}" style="color: rgb(22, 180, 95);">
                                             <span class="plus plus-1"></span>
                                             <span class="plus plus-2"></span>
                                             <span class="circle circle-1"></span>
                                             <span class="circle circle-2"></span>
                                          </div>
                                          <div class="font-weight-semibold font-size-medium-1 text-white tb-gradient-1 price-details-top" ng-style="{&#39;background-color&#39;: sub.colorHex}" style="background-color: rgb(22, 180, 95);">
                                             <div class="visible-subs-inactive visible-subs-expired ng-binding">Save <i class="tb-icon tb-rupee font-sm align-baseline"></i>800</div>
                                             <div class="visible-subs-active">Current Plan</div>
                                          </div>
                                          <div class="price-details-bottom">
                                             <div class="line-height-1 d-inline-block align-middle">
                                                <div class="text-line-through font-size-base-1 text-gray-8 mar-b4 visible-subs-inactive visible-subs-expired ng-binding">
                                                   <i class="tb-icon tb-rupee font-sm align-baseline"></i>1799
                                                </div>
                                                <div class="text-gray-5 font-size-large font-weight-bold mar-b4">
                                                   <div class="visible-subs-inactive visible-subs-expired"><i class="tb-icon tb-rupee font-sm align-baseline"></i><span class="pack-selling-price ng-binding">999</span></div>
                                                   <div class="visible-subs-active ng-binding">12 Months</div>
                                                </div>
                                                <div class="text-gray-8 font-size-small hidden-subs-active ng-binding">For 1 Year</div>
                                             </div>
                                          </div>
                                       </div>
                                       <h3 class="mar-t24 pack-title ng-binding">Testbook Pass</h3>
                                       <div class="subs-state">
                                          <p class="visible-subs-inactive ng-binding">12 Months Subscription</p>
                                          <p class="text-success visible-subs-active ng-binding">12 Months Subscription is Active</p>
                                          <p class="text-danger visible-subs-expired ng-binding">12 Months Subscription Expired</p>
                                       </div>
                                       <div class="pack-status">
                                          <button type="button" class="btn btn-sm btn-link pull-right text-underline pad-2 mar-t-4" ng-click="showSubReleasePlan(sub.extraFeatures)">Release Plan</button>
                                          <p class="mar-b0 font-size-base-1 font-weight-semibold visible-subs-active ng-binding">0/661 Tests</p>
                                          <p class="mar-b0 font-size-base-1 font-weight-semibold visible-subs-inactive visible-subs-expired ng-binding">661+ Tests</p>
                                       </div>
                                       <div class="mar-t4 mar-b12 pack-progress visible-subs-active">
                                          <span ng-style="{&#39;width&#39;: sub.attemptedPercent}"></span>
                                       </div>
                                       <hr class="mar-v8">
                                       <!-- ngRepeat: feature in sub.featureArr -->
                                       <div class="font-size-base-1 font-weight-semibold pack-features ng-binding ng-scope" ng-repeat="feature in sub.featureArr">Unlimited Tests for All The Exams</div>
                                       <!-- end ngRepeat: feature in sub.featureArr -->
                                       <div class="font-size-base-1 font-weight-semibold pack-features ng-binding ng-scope" ng-repeat="feature in sub.featureArr">Hindi &amp; English - Bilingual Tests</div>
                                       <!-- end ngRepeat: feature in sub.featureArr -->
                                       <div class="font-size-base-1 font-weight-semibold pack-features ng-binding ng-scope" ng-repeat="feature in sub.featureArr">Detailed Solutions &amp; Analysis</div>
                                       <!-- end ngRepeat: feature in sub.featureArr -->
                                       <hr class="mar-v4">
                                       <!-- ngIf: false -->
                                       <div class="pad-v4">
                                          <button type="button" class="btn btn-link btn-sm pad-v2 pad-h0" data-toggle="modal" data-target="#subscription-helper">How it works?</button>
                                       </div>
                                       <div class="buy-now-btn">
                                          <button type="button" class="btn btn-block" ng-click="addSubsBtnClicked(sub.id);" ng-style="{&#39;background-color&#39;: sub.colorHex}" style="background-color: rgb(22, 180, 95);">
                                          <span class="text-capitalize font-size-large visible-subs-inactive hidden-subs-upgrade">Subscribe Now</span>
                                          <span class="text-capitalize font-size-large visible-subs-upgrade">Upgrade Subscription</span>
                                          <span class="text-capitalize visible-subs-active ng-binding"> to expire</span>
                                          <span class="text-capitalize font-size-small-1 font-weight-semibold mar-t2 visible-subs-active ng-binding">Subscribed on </span>
                                          <span class="text-capitalize visible-subs-expired">Renew Subscription</span>
                                          <span class="text-capitalize font-size-small-1 font-weight-semibold mar-t2 visible-subs-expired ng-binding">Subscription expired on </span>
                                          </button>
                                       </div>
                                    </div>
                                   
                                    <div class="mt-card subscription-pack ng-scope subs-inactive" data-pid="5a4f856696846c2c6ae95a7b" ng-class="sub.statusClass" ng-style="{&#39;border-color&#39;: sub.colorHex}" ng-repeat="sub in categoryObj.subsArr" ng-if="sub.isShow &amp;&amp; sub.statusClass != &#39;subs-active&#39;" style="border-color: rgb(242, 70, 76);">
                                       <div class="mar-h-auto text-center price-details">
                                          <div class="sparkles" ng-style="{&#39;color&#39;: sub.colorHex}" style="color: rgb(242, 70, 76);">
                                             <span class="plus plus-1"></span>
                                             <span class="plus plus-2"></span>
                                             <span class="circle circle-1"></span>
                                             <span class="circle circle-2"></span>
                                          </div>
                                          <div class="font-weight-semibold font-size-medium-1 text-white tb-gradient-1 price-details-top" ng-style="{&#39;background-color&#39;: sub.colorHex}" style="background-color: rgb(242, 70, 76);">
                                             <div class="visible-subs-inactive visible-subs-expired ng-binding">Save <i class="tb-icon tb-rupee font-sm align-baseline"></i>400</div>
                                             <div class="visible-subs-active">Current Plan</div>
                                          </div>
                                          <div class="price-details-bottom">
                                             <div class="line-height-1 d-inline-block align-middle">
                                                <div class="text-line-through font-size-base-1 text-gray-8 mar-b4 visible-subs-inactive visible-subs-expired ng-binding">
                                                   <i class="tb-icon tb-rupee font-sm align-baseline"></i>799
                                                </div>
                                                <div class="text-gray-5 font-size-large font-weight-bold mar-b4">
                                                   <div class="visible-subs-inactive visible-subs-expired"><i class="tb-icon tb-rupee font-sm align-baseline"></i><span class="pack-selling-price ng-binding">399</span></div>
                                                   <div class="visible-subs-active ng-binding">4 Months</div>
                                                </div>
                                                <div class="text-gray-8 font-size-small hidden-subs-active ng-binding">For 4 Months</div>
                                             </div>
                                          </div>
                                       </div>
                                       <h3 class="mar-t24 pack-title ng-binding">Testbook Pass</h3>
                                       <div class="subs-state">
                                          <p class="visible-subs-inactive ng-binding">4 Months Subscription</p>
                                          <p class="text-success visible-subs-active ng-binding">4 Months Subscription is Active</p>
                                          <p class="text-danger visible-subs-expired ng-binding">4 Months Subscription Expired</p>
                                       </div>
                                       <div class="pack-status">
                                          <button type="button" class="btn btn-sm btn-link pull-right text-underline pad-2 mar-t-4" ng-click="showSubReleasePlan(sub.extraFeatures)">Release Plan</button>
                                          <p class="mar-b0 font-size-base-1 font-weight-semibold visible-subs-active ng-binding">0/661 Tests</p>
                                          <p class="mar-b0 font-size-base-1 font-weight-semibold visible-subs-inactive visible-subs-expired ng-binding">661+ Tests</p>
                                       </div>
                                       <div class="mar-t4 mar-b12 pack-progress visible-subs-active">
                                          <span ng-style="{&#39;width&#39;: sub.attemptedPercent}"></span>
                                       </div>
                                       <hr class="mar-v8">
                                       <!-- ngRepeat: feature in sub.featureArr -->
                                       <div class="font-size-base-1 font-weight-semibold pack-features ng-binding ng-scope" ng-repeat="feature in sub.featureArr">Unlimited Tests for All The Exams</div>
                                       <!-- end ngRepeat: feature in sub.featureArr -->
                                       <div class="font-size-base-1 font-weight-semibold pack-features ng-binding ng-scope" ng-repeat="feature in sub.featureArr">Hindi &amp; English - Bilingual Tests</div>
                                       <!-- end ngRepeat: feature in sub.featureArr -->
                                       <div class="font-size-base-1 font-weight-semibold pack-features ng-binding ng-scope" ng-repeat="feature in sub.featureArr">Detailed Solutions and Analysis</div>
                                       <!-- end ngRepeat: feature in sub.featureArr -->
                                       <hr class="mar-v4">
                                       <!-- ngIf: false -->
                                       <div class="pad-v4">
                                          <button type="button" class="btn btn-link btn-sm pad-v2 pad-h0" data-toggle="modal" data-target="#subscription-helper">How it works?</button>
                                       </div>
                                       <div class="buy-now-btn">
                                          <button type="button" class="btn btn-block" ng-click="addSubsBtnClicked(sub.id);" ng-style="{&#39;background-color&#39;: sub.colorHex}" style="background-color: rgb(242, 70, 76);">
                                          <span class="text-capitalize font-size-large visible-subs-inactive hidden-subs-upgrade">Subscribe Now</span>
                                          <span class="text-capitalize font-size-large visible-subs-upgrade">Upgrade Subscription</span>
                                          <span class="text-capitalize visible-subs-active ng-binding"> to expire</span>
                                          <span class="text-capitalize font-size-small-1 font-weight-semibold mar-t2 visible-subs-active ng-binding">Subscribed on </span>
                                          <span class="text-capitalize visible-subs-expired">Renew Subscription</span>
                                          <span class="text-capitalize font-size-small-1 font-weight-semibold mar-t2 visible-subs-expired ng-binding">Subscription expired on </span>
                                          </button>
                                       </div>
                                    </div>
                                    
                                    <div class="mt-card combo-pack ng-scope has-old-price has-offer has-tags" data-pid="58d653960328215d7c9be737" ng-class="test.cardClass" ng-repeat="test in categoryObj.value" ng-if="filterTest(test, &#39;allTests&#39;)">
                                       <span class="offer-tag ng-binding">SAVE RS. 1200</span>
                                       <div class="mrp-price-tag">
                                          <!-- ngIf: test.oldCost > test.cost --><span class="mrp ng-binding ng-scope" ng-if="test.oldCost &gt; test.cost"><i class="tb-icon tb-rupee"></i>1747</span><!-- end ngIf: test.oldCost > test.cost --><span class="price ng-binding"><i class="tb-icon tb-rupee"></i>547</span>
                                       </div>
                                       <div class="row">
                                          <div class="col-xs-12">
                                             <div class="card-logo">
                                                <img ng-src="//storage.googleapis.com/testbook/products/2018/January/4/__w-200-400-600__/IBPS%20PO.png" src="./Bank PO Tests _ Testbook.com_files/IBPS PO.png">
                                             </div>
                                             <div class="title">
                                                <h4 title="IBPS PO" class="ng-binding">IBPS PO<i class="tb-icon tb-verified"></i></h4>
                                             </div>
                                             <div class="pack-details">
                                                <h5 class="ng-binding">
                                                   <!-- ngIf: test.comboPackDetails.alreadyPurchasedTestsCount > 0 -->
                                                   70 TOTAL TESTS
                                                </h5>
                                                <button type="button" class="btn btn-sm btn-link" ng-click="showPackInfo(test)">Release Plan &gt;</button>
                                                <ul>
                                                   <!-- ngRepeat: x in test.comboPackDetails.testsArr -->
                                                   <li ng-repeat="x in test.comboPackDetails.testsArr" class="ng-scope">
                                                      <p class="ng-binding">
                                                         <!-- ngIf: x.alreadyPurchasedTestCount != 0 -->
                                                         20
                                                         Full Test - Prelims
                                                      </p>
                                                   </li>
                                                   <!-- end ngRepeat: x in test.comboPackDetails.testsArr -->
                                                   <li ng-repeat="x in test.comboPackDetails.testsArr" class="ng-scope">
                                                      <p class="ng-binding">
                                                         <!-- ngIf: x.alreadyPurchasedTestCount != 0 -->
                                                         5
                                                         Advanced Test - Prelims
                                                      </p>
                                                   </li>
                                                   <!-- end ngRepeat: x in test.comboPackDetails.testsArr -->
                                                   <li ng-repeat="x in test.comboPackDetails.testsArr" class="ng-scope">
                                                      <p class="ng-binding">
                                                         <!-- ngIf: x.alreadyPurchasedTestCount != 0 -->
                                                         15
                                                         Full Test - Mains
                                                      </p>
                                                   </li>
                                                   <!-- end ngRepeat: x in test.comboPackDetails.testsArr -->
                                                   <li ng-repeat="x in test.comboPackDetails.testsArr" class="ng-scope">
                                                      <p class="ng-binding">
                                                         <!-- ngIf: x.alreadyPurchasedTestCount != 0 -->
                                                         30
                                                         Sectional Test
                                                      </p>
                                                   </li>
                                                   <!-- end ngRepeat: x in test.comboPackDetails.testsArr -->
                                                </ul>
                                                <ul>
                                                   <!-- ngRepeat: f in test.features -->
                                                   <li ng-repeat="f in test.features" class="ng-scope">
                                                      <p class="ng-binding">Also available in Hindi</p>
                                                   </li>
                                                   <!-- end ngRepeat: f in test.features -->
                                                   <li ng-repeat="f in test.features" class="ng-scope">
                                                      <p class="ng-binding">Available in App too</p>
                                                   </li>
                                                   <!-- end ngRepeat: f in test.features -->
                                                   <li ng-repeat="f in test.features" class="ng-scope">
                                                      <p class="ng-binding">Based On Latest Pattern</p>
                                                   </li>
                                                   <!-- end ngRepeat: f in test.features -->
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="buy-now-btn">
                                          <!-- ngIf: !test.isPartialPurchasedProduct --><button type="button" class="btn btn-block hidden-subs-active ng-scope" ng-if="!test.isPartialPurchasedProduct" ng-click="addToCart([test], true, mycoins, false)">Buy Now</button><!-- end ngIf: !test.isPartialPurchasedProduct -->
                                          <!-- ngIf: test.isPartialPurchasedProduct -->
                                          <button type="button" class="btn btn-block visible-subs-active" ng-click="addPacksToMyTestsViaSubscription(test, categoryObj.value)">
                                          <span class="text-capitalize">Add to My Tests</span>
                                          </button>
                                          <div class="tb-tooltip top subset-added-tooltip">
                                             <div class="po-content">
                                                Combo/Pack with some same tests <br> is already added to the Cart
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- end ngIf: filterTest(test, 'allTests') --><!-- end ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'allTests') --><!-- end ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'allTests') -->
                                    <div class="mt-card combo-pack ng-scope has-old-price has-offer complete-pack has-tags" data-pid="5a450bfc191b020be10770e3" ng-class="test.cardClass" ng-repeat="test in categoryObj.value" ng-if="filterTest(test, &#39;allTests&#39;)">
                                       <span class="offer-tag ng-binding">SAVE RS. 1138</span>
                                       <div class="mrp-price-tag">
                                          <!-- ngIf: test.oldCost > test.cost --><span class="mrp ng-binding ng-scope" ng-if="test.oldCost &gt; test.cost"><i class="tb-icon tb-rupee"></i>1637</span><!-- end ngIf: test.oldCost > test.cost --><span class="price ng-binding"><i class="tb-icon tb-rupee"></i>499</span>
                                       </div>
                                       <div class="row">
                                          <div class="col-xs-12">
                                             <div class="card-logo">
                                                <img ng-src="//storage.googleapis.com/testbook/products/2018/January/9/__w-200-400-600__/Freshers%20Pack.png" src="./Bank PO Tests _ Testbook.com_files/Freshers Pack.png">
                                             </div>
                                             <div class="title">
                                                <h4 title="Freshers&#39; Pack - Banking &amp; Insurance" class="ng-binding">Freshers' Pack - Banking &amp; Insurance<i class="tb-icon tb-verified"></i></h4>
                                             </div>
                                             <div class="pack-details">
                                                <h5 class="ng-binding">
                                                   <!-- ngIf: test.comboPackDetails.alreadyPurchasedTestsCount > 0 -->
                                                   453 TOTAL TESTS
                                                </h5>
                                                <button type="button" class="btn btn-sm btn-link" ng-click="showPackInfo(test)">Release Plan &gt;</button>
                                                <ul>
                                                   <!-- ngRepeat: x in test.comboPackDetails.testsArr -->
                                                   <li ng-repeat="x in test.comboPackDetails.testsArr" class="ng-scope">
                                                      <p class="ng-binding">
                                                         <!-- ngIf: x.alreadyPurchasedTestCount != 0 -->
                                                         412
                                                         Chapter Test
                                                      </p>
                                                   </li>
                                                   <!-- end ngRepeat: x in test.comboPackDetails.testsArr -->
                                                   <li ng-repeat="x in test.comboPackDetails.testsArr" class="ng-scope">
                                                      <p class="ng-binding">
                                                         <!-- ngIf: x.alreadyPurchasedTestCount != 0 -->
                                                         11
                                                         Full Test - Prelims
                                                      </p>
                                                   </li>
                                                   <!-- end ngRepeat: x in test.comboPackDetails.testsArr -->
                                                   <li ng-repeat="x in test.comboPackDetails.testsArr" class="ng-scope">
                                                      <p class="ng-binding">
                                                         <!-- ngIf: x.alreadyPurchasedTestCount != 0 -->
                                                         30
                                                         Sectional Test
                                                      </p>
                                                   </li>
                                                   <!-- end ngRepeat: x in test.comboPackDetails.testsArr -->
                                                </ul>
                                                <ul>
                                                   <!-- ngRepeat: f in test.features -->
                                                   <li ng-repeat="f in test.features" class="ng-scope">
                                                      <p class="ng-binding">Also available in Hindi</p>
                                                   </li>
                                                   <!-- end ngRepeat: f in test.features -->
                                                   <li ng-repeat="f in test.features" class="ng-scope">
                                                      <p class="ng-binding">Available in App too</p>
                                                   </li>
                                                   <!-- end ngRepeat: f in test.features -->
                                                   <li ng-repeat="f in test.features" class="ng-scope">
                                                      <p class="ng-binding">Get All India Rank</p>
                                                   </li>
                                                   <!-- end ngRepeat: f in test.features -->
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="buy-now-btn">
                                          <!-- ngIf: !test.isPartialPurchasedProduct --><button type="button" class="btn btn-block hidden-subs-active ng-scope" ng-if="!test.isPartialPurchasedProduct" ng-click="addToCart([test], true, mycoins, false)">Buy Now</button><!-- end ngIf: !test.isPartialPurchasedProduct -->
                                          <!-- ngIf: test.isPartialPurchasedProduct -->
                                          <button type="button" class="btn btn-block visible-subs-active" ng-click="addPacksToMyTestsViaSubscription(test, categoryObj.value)">
                                          <span class="text-capitalize">Add to My Tests</span>
                                          </button>
                                          <div class="tb-tooltip top subset-added-tooltip">
                                             <div class="po-content">
                                                Combo/Pack with some same tests <br> is already added to the Cart
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- end ngIf: filterTest(test, 'allTests') --><!-- end ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'allTests') -->
                                    <div class="mt-card combo-pack ng-scope has-old-price has-offer complete-pack has-tags" data-pid="5a465dd05761fa2e1118501b" ng-class="test.cardClass" ng-repeat="test in categoryObj.value" ng-if="filterTest(test, &#39;allTests&#39;)">
                                       <span class="offer-tag ng-binding">SAVE RS. 448</span>
                                       <div class="mrp-price-tag">
                                          <!-- ngIf: test.oldCost > test.cost --><span class="mrp ng-binding ng-scope" ng-if="test.oldCost &gt; test.cost"><i class="tb-icon tb-rupee"></i>659</span><!-- end ngIf: test.oldCost > test.cost --><span class="price ng-binding"><i class="tb-icon tb-rupee"></i>211</span>
                                       </div>
                                       <div class="row">
                                          <div class="col-xs-12">
                                             <div class="card-logo">
                                                <img ng-src="//storage.googleapis.com/testbook/products/2018/January/4/__w-200-400-600__/syndicate-bank-logo.jpg" src="./Bank PO Tests _ Testbook.com_files/syndicate-bank-logo.jpg">
                                             </div>
                                             <div class="title">
                                                <h4 title="Syndicate Bank PO" class="ng-binding">Syndicate Bank PO<i class="tb-icon tb-verified"></i></h4>
                                             </div>
                                             <div class="pack-details">
                                                <h5 class="ng-binding">
                                                   <!-- ngIf: test.comboPackDetails.alreadyPurchasedTestsCount > 0 -->
                                                   10 TOTAL TESTS
                                                </h5>
                                                <button type="button" class="btn btn-sm btn-link" ng-click="showPackInfo(test)">Release Plan &gt;</button>
                                                <ul>
                                                   <!-- ngRepeat: x in test.comboPackDetails.testsArr -->
                                                   <li ng-repeat="x in test.comboPackDetails.testsArr" class="ng-scope">
                                                      <p class="ng-binding">
                                                         <!-- ngIf: x.alreadyPurchasedTestCount != 0 -->
                                                         10
                                                         Full Test
                                                      </p>
                                                   </li>
                                                   <!-- end ngRepeat: x in test.comboPackDetails.testsArr -->
                                                </ul>
                                                <ul>
                                                   <!-- ngRepeat: f in test.features -->
                                                   <li ng-repeat="f in test.features" class="ng-scope">
                                                      <p class="ng-binding">Also available in Hindi</p>
                                                   </li>
                                                   <!-- end ngRepeat: f in test.features -->
                                                   <li ng-repeat="f in test.features" class="ng-scope">
                                                      <p class="ng-binding">Available in App too</p>
                                                   </li>
                                                   <!-- end ngRepeat: f in test.features -->
                                                   <li ng-repeat="f in test.features" class="ng-scope">
                                                      <p class="ng-binding">Based On Latest Pattern</p>
                                                   </li>
                                                   <!-- end ngRepeat: f in test.features -->
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="buy-now-btn">
                                          <!-- ngIf: !test.isPartialPurchasedProduct --><button type="button" class="btn btn-block hidden-subs-active ng-scope" ng-if="!test.isPartialPurchasedProduct" ng-click="addToCart([test], true, mycoins, false)">Buy Now</button><!-- end ngIf: !test.isPartialPurchasedProduct -->
                                          <!-- ngIf: test.isPartialPurchasedProduct -->
                                          <button type="button" class="btn btn-block visible-subs-active" ng-click="addPacksToMyTestsViaSubscription(test, categoryObj.value)">
                                          <span class="text-capitalize">Add to My Tests</span>
                                          </button>
                                          <div class="tb-tooltip top subset-added-tooltip">
                                             <div class="po-content">
                                                Combo/Pack with some same tests <br> is already added to the Cart
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- end ngIf: filterTest(test, 'allTests') --><!-- end ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'allTests') -->
                                    <div class="mt-card combo-pack ng-scope has-old-price has-offer has-tags" data-pid="5a4e271d5e37ed0f6c1ca7cb" ng-class="test.cardClass" ng-repeat="test in categoryObj.value" ng-if="filterTest(test, &#39;allTests&#39;)">
                                       <span class="offer-tag ng-binding">SAVE RS. 324</span>
                                       <div class="mrp-price-tag">
                                          <!-- ngIf: test.oldCost > test.cost --><span class="mrp ng-binding ng-scope" ng-if="test.oldCost &gt; test.cost"><i class="tb-icon tb-rupee"></i>521</span><!-- end ngIf: test.oldCost > test.cost --><span class="price ng-binding"><i class="tb-icon tb-rupee"></i>197</span>
                                       </div>
                                       <div class="row">
                                          <div class="col-xs-12">
                                             <div class="card-logo">
                                                <img ng-src="//storage.googleapis.com/testbook/products/2018/January/4/__w-200-400-600__/IBPS%20PO.png" src="./Bank PO Tests _ Testbook.com_files/IBPS PO.png">
                                             </div>
                                             <div class="title">
                                                <h4 title="RRB Officers - Mains" class="ng-binding">RRB Officers - Mains<i class="tb-icon tb-verified"></i></h4>
                                             </div>
                                             <div class="pack-details">
                                                <h5 class="ng-binding">
                                                   <!-- ngIf: test.comboPackDetails.alreadyPurchasedTestsCount > 0 -->
                                                   10 TOTAL TESTS
                                                </h5>
                                                <button type="button" class="btn btn-sm btn-link" ng-click="showPackInfo(test)">Release Plan &gt;</button>
                                                <ul>
                                                   <!-- ngRepeat: x in test.comboPackDetails.testsArr -->
                                                   <li ng-repeat="x in test.comboPackDetails.testsArr" class="ng-scope">
                                                      <p class="ng-binding">
                                                         <!-- ngIf: x.alreadyPurchasedTestCount != 0 -->
                                                         10
                                                         Full Test - Mains
                                                      </p>
                                                   </li>
                                                   <!-- end ngRepeat: x in test.comboPackDetails.testsArr -->
                                                </ul>
                                                <ul>
                                                   <!-- ngRepeat: f in test.features -->
                                                   <li ng-repeat="f in test.features" class="ng-scope">
                                                      <p class="ng-binding">Also available in Hindi</p>
                                                   </li>
                                                   <!-- end ngRepeat: f in test.features -->
                                                   <li ng-repeat="f in test.features" class="ng-scope">
                                                      <p class="ng-binding">Available in App too</p>
                                                   </li>
                                                   <!-- end ngRepeat: f in test.features -->
                                                   <li ng-repeat="f in test.features" class="ng-scope">
                                                      <p class="ng-binding">Get All India Rank</p>
                                                   </li>
                                                   <!-- end ngRepeat: f in test.features -->
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="buy-now-btn">
                                          <!-- ngIf: !test.isPartialPurchasedProduct --><button type="button" class="btn btn-block hidden-subs-active ng-scope" ng-if="!test.isPartialPurchasedProduct" ng-click="addToCart([test], true, mycoins, false)">Buy Now</button><!-- end ngIf: !test.isPartialPurchasedProduct -->
                                          <!-- ngIf: test.isPartialPurchasedProduct -->
                                          <button type="button" class="btn btn-block visible-subs-active" ng-click="addPacksToMyTestsViaSubscription(test, categoryObj.value)">
                                          <span class="text-capitalize">Add to My Tests</span>
                                          </button>
                                          <div class="tb-tooltip top subset-added-tooltip">
                                             <div class="po-content">
                                                Combo/Pack with some same tests <br> is already added to the Cart
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- end ngIf: filterTest(test, 'allTests') --><!-- end ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'allTests') -->
                                    <div class="mt-card combo-pack ng-scope has-old-price has-offer complete-pack has-tags" data-pid="5a5772ec32dce50f8ec5e413" ng-class="test.cardClass" ng-repeat="test in categoryObj.value" ng-if="filterTest(test, &#39;allTests&#39;)">
                                       <span class="offer-tag ng-binding">SAVE RS. 408</span>
                                       <div class="mrp-price-tag">
                                          <!-- ngIf: test.oldCost > test.cost --><span class="mrp ng-binding ng-scope" ng-if="test.oldCost &gt; test.cost"><i class="tb-icon tb-rupee"></i>571</span><!-- end ngIf: test.oldCost > test.cost --><span class="price ng-binding"><i class="tb-icon tb-rupee"></i>163</span>
                                       </div>
                                       <div class="row">
                                          <div class="col-xs-12">
                                             <div class="card-logo">
                                                <img ng-src="//storage.googleapis.com/testbook/products/2018/January/11/__w-200-400-600__/Canara-banks.png" src="./Bank PO Tests _ Testbook.com_files/Canara-banks.png">
                                             </div>
                                             <div class="title">
                                                <h4 title="Canara Bank PO 2018" class="ng-binding">Canara Bank PO 2018<i class="tb-icon tb-verified"></i></h4>
                                             </div>
                                             <div class="pack-details">
                                                <h5 class="ng-binding">
                                                   <!-- ngIf: test.comboPackDetails.alreadyPurchasedTestsCount > 0 -->
                                                   5 TOTAL TESTS
                                                </h5>
                                                <button type="button" class="btn btn-sm btn-link" ng-click="showPackInfo(test)">Release Plan &gt;</button>
                                                <ul>
                                                   <!-- ngRepeat: x in test.comboPackDetails.testsArr -->
                                                   <li ng-repeat="x in test.comboPackDetails.testsArr" class="ng-scope">
                                                      <p class="ng-binding">
                                                         <!-- ngIf: x.alreadyPurchasedTestCount != 0 -->
                                                         5
                                                         Full Test
                                                      </p>
                                                   </li>
                                                   <!-- end ngRepeat: x in test.comboPackDetails.testsArr -->
                                                </ul>
                                                <ul>
                                                   <!-- ngRepeat: f in test.features -->
                                                   <li ng-repeat="f in test.features" class="ng-scope">
                                                      <p class="ng-binding">Also available in Hindi</p>
                                                   </li>
                                                   <!-- end ngRepeat: f in test.features -->
                                                   <li ng-repeat="f in test.features" class="ng-scope">
                                                      <p class="ng-binding">Available in App too</p>
                                                   </li>
                                                   <!-- end ngRepeat: f in test.features -->
                                                   <li ng-repeat="f in test.features" class="ng-scope">
                                                      <p class="ng-binding">Based On Latest Pattern</p>
                                                   </li>
                                                   <!-- end ngRepeat: f in test.features -->
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="buy-now-btn">
                                          <!-- ngIf: !test.isPartialPurchasedProduct --><button type="button" class="btn btn-block hidden-subs-active ng-scope" ng-if="!test.isPartialPurchasedProduct" ng-click="addToCart([test], true, mycoins, false)">Buy Now</button><!-- end ngIf: !test.isPartialPurchasedProduct -->
                                          <!-- ngIf: test.isPartialPurchasedProduct -->
                                          <button type="button" class="btn btn-block visible-subs-active" ng-click="addPacksToMyTestsViaSubscription(test, categoryObj.value)">
                                          <span class="text-capitalize">Add to My Tests</span>
                                          </button>
                                          <div class="tb-tooltip top subset-added-tooltip">
                                             <div class="po-content">
                                                Combo/Pack with some same tests <br> is already added to the Cart
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- end ngIf: filterTest(test, 'allTests') --><!-- end ngRepeat: test in categoryObj.value -->
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end ngRepeat: categoryObj in allTestsObj.comboPacks -->
                        <!-- ngRepeat: categoryObj in allTestsObj.packs -->
                        <div class="col-xs-12 tests-sections ng-scope ng-hide" ng-repeat="categoryObj in allTestsObj.packs" ng-show="showCategory(categoryObj.value)">
                           <div class="header">
                              <h5 class="title ng-binding">Combo Pack</h5>
                           </div>
                           <div class="body">
                              <div class="row">
                                 <div class="col-xs-12 packs-container">
                                    <!-- ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'allTests') && !test.isPurchased --><!-- end ngRepeat: test in categoryObj.value -->
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end ngRepeat: categoryObj in allTestsObj.packs -->
                        <div class="col-xs-12 tests-sections ng-scope ng-hide" ng-repeat="categoryObj in allTestsObj.packs" ng-show="showCategory(categoryObj.value)">
                           <div class="header">
                              <h5 class="title ng-binding">Test Pack</h5>
                           </div>
                           <div class="body">
                              <div class="row">
                                 <div class="col-xs-12 packs-container">
                                    <!-- ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'allTests') && !test.isPurchased --><!-- end ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'allTests') && !test.isPurchased --><!-- end ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'allTests') && !test.isPurchased --><!-- end ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'allTests') && !test.isPurchased --><!-- end ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'allTests') && !test.isPurchased --><!-- end ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'allTests') && !test.isPurchased --><!-- end ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'allTests') && !test.isPurchased --><!-- end ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'allTests') && !test.isPurchased --><!-- end ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'allTests') && !test.isPurchased --><!-- end ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'allTests') && !test.isPurchased --><!-- end ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'allTests') && !test.isPurchased --><!-- end ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'allTests') && !test.isPurchased --><!-- end ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'allTests') && !test.isPurchased --><!-- end ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'allTests') && !test.isPurchased --><!-- end ngRepeat: test in categoryObj.value -->
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end ngRepeat: categoryObj in allTestsObj.packs -->
                     </div>
                  </div>
               </div>
               <!-- end ngIf: allTestsObj.packs.length|| allTestsObj.comboPacks.length -->
               <!-- ngIf: !filterResultExistsForAll && isAllTestsAvailable -->
               <!-- ngIf: !isTestsAvailable -->
               <!-- ngIf: !isAllTestsAvailable && (isMyTestsAvailable || isAttemptedTestsAvailable) -->
               <!-- ngIf: isFreeTestsAvailable && !isPaidTestsAvailable && (currentCourseId != GK_CURRENT_AFFAIRS_COURSE_ID) -->
               <!-- ngIf: currentCourseId == GK_CURRENT_AFFAIRS_COURSE_ID -->
            </div>
         </div>
         <div class="tab-content-tb" id="my_test_tab" ng-style="currentActiveTab === &#39;my&#39; ? { &#39;display&#39;:&#39;block&#39;} : { &#39;display&#39;: &#39;none&#39; }" style="display: block;">
            <div class="row">
              
               <div class="col-xs-12 tests-packs-container ng-scope" ng-if="myTestsArr &amp;&amp; myTestsArr.length">
                  <div class="wrapper">
                     <div class="row">
                        <!-- ngRepeat: categoryObj in myTestsArr -->
                        <div class="col-xs-12 tests-sections ng-scope" ng-repeat="categoryObj in myTestsArr" ng-show="showCategoryForMyTests(categoryObj.value)">
                           <div class="header">
                              <h5 class="title ng-binding">Tests Series</h5>
                           </div>
                           <div class="body">
                              <div class="row">
                              	 <div class="col-xs-12 packs-container">
                                 <?php if(isset($student_testpapers))
                              	{ 
                                   // print_r($student_testpapers);
                              		foreach($student_testpapers as $student)
                                    {		

                                       $StudentId=$this->session->userdata('StudentId');
                                       $duration=date('i',strtotime($student->ExamTestDurartion));
                                     // echo  $TestId=$student->TestseriesId;
                                     //  $testseries_count=$this->testseries_model->testseries_paper_count($TestId,$StudentId);

                              	 ?>
                                
                                    <!-- ngRepeat: test in categoryObj.value --><!-- ngIf: filterTest(test, 'myTests') -->
                                    <div class="mt-card my-test-card ng-scope fst-test-card nt-default-state has-syll-info has-tags test-resumable" data-tid="5a464d1282b5d90f7816579b" ng-class="test.myCardClass" ng-repeat="test in categoryObj.value" ng-if="filterTest(test, &#39;myTests&#39;)">
                                       <div class="title">
                                          <h4 title="Syndicate Bank PO Full Test" class="ng-binding"><?php echo $student->ExamTestTitle ; ?></h4>
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: x in test.specificExams track by $index --><span ng-repeat="x in test.specificExams track by $index" class="ng-binding ng-scope"><?php echo $student->ExamTestDesc ; ?></span><!-- end ngRepeat: x in test.specificExams track by $index -->
                                       </div>
                                       <div class="hidden-subs-expired">
                                          <div class="date-time valid-till">
                                             Duration : <span class="ng-binding"><?php echo $duration.' Minutes'; ?></span>
                                          </div>
                                        
                                       </div>
                                       <div class="mar-t8 visible-subs-expired">
                                          <p class="mar-b0 text-danger font-size-small ng-binding"></p>
                                       </div>
                                       <div class="syll-info" data-toggle="tb-popover">
                                          <span class="font-sm">Syllabus Info</span>
                                          <div class="tb-popover top">
                                             <div class="po-content ng-binding">
                                                Test For Syndicate Bank PO Based On Latest Pattern
                                             </div>
                                          </div>
                                       </div>
                                       <div class="details">

                                          <ul class="list-unstyled">
                                             <li><span class="ng-binding"><?php //echo $testseries_count; ?></span> Papers</li>
                                             <li><span class="ng-binding">200</span> Questions</li>
                                             <li><span class="ng-binding"><?php echo $student->TotalMarks; ?></span> Marks</li>
                                             
                                          </ul>
                                       </div>
                                       <div class="start-test">
                                          <a href="<?php echo site_url('Exam/conduct_exam/'.$student->id); ?>" class="btn btn-block btn-theme"  >Start Test</a>
                                          <span class="before-test ng-binding"></span>
                                          
                                       </div>
                                    </div>
                                    <!-- end ngIf: filterTest(test, 'myTests') --><!-- end ngRepeat: test in categoryObj.value -->
                                
                                 <?php } } ?>
                                  </div>
                                 <div class="col-xs-12 view-more-less js-view-more-less">
                                    <button type="button" class="btn view-more js-view-more">View More <i class="tb-icon tb-arrow-down-thin"></i></button>
                                    <button type="button" class="btn view-less js-view-less">View Less <i class="tb-icon tb-arrow-up-thin"></i></button>
                                 </div>
                              </div>
                           </div>
                        </div>       
                        
                     </div>
                  </div>
               </div>
               <!-- end ngIf: myTestsArr && myTestsArr.length -->
               <!-- ngIf: !isTestsAvailable -->
               <!-- ngIf: isAllTestsAvailable && !isMyTestsAvailable -->
               <!-- ngIf: !isAllTestsAvailable && !isMyTestsAvailable && isAttemptedTestsAvailable -->
               <!-- ngIf: !filterResultExistsForMy && (myTestsArr.length) -->
            </div>
         </div>
         <div class="tab-content-tb" id="daily_quiz_tab" ng-style="currentActiveTab === &#39;quiz&#39; ? { &#39;display&#39;:&#39;block&#39;} : { &#39;display&#39;: &#39;none&#39; }" style="display: none;">
            <div class="row">
               <!-- ngIf: quizFilter.selectedFilters.length || quizFilter.selectedQuizForSuggestion -->
               <div class="col-xs-12 tests-packs-container">
                  <div class="wrapper">
                     <div class="row">
                        <!-- ngIf: !quizFilter.selectedCount && quizFilter.selectedFilters.length -->
                        <!-- ngIf: todaysQuizArr && todaysQuizArr.length && isShowTodaysCategory -->
                        <!-- ngRepeat: subjectCat in previousQuizArr --><!-- ngIf: subjectCat.isShow -->
                        <div class="col-xs-12 tests-sections ng-scope" ng-repeat="subjectCat in previousQuizArr" ng-if="subjectCat.isShow">
                           <div class="header">
                              <h5 class="title ng-binding">Quantitative Aptitude</h5>
                           </div>
                           <div class="body">
                              <div class="row">
                                 <div class="col-xs-12 packs-container">
                                    <!-- ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59e20aa85e937109cdbeefc6" data-serve-on-date="1508025600000">
                                       <div class="card-title ng-binding">
                                          Interest &amp; Mensuration  Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59df5e73a4ac5209881b79de" data-serve-on-date="1507852800000">
                                       <div class="card-title ng-binding">
                                          Simplification &amp; Average Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59db07f0be8e791e80962f5c" data-serve-on-date="1507766400000">
                                       <div class="card-title ng-binding">
                                          Number Series Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59db03c0be8e791e8095e808" data-serve-on-date="1507593600000">
                                       <div class="card-title ng-binding">
                                          Data Sufficiency Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59db02f65e93710e4a1a9073" data-serve-on-date="1507507200000">
                                       <div class="card-title ng-binding">
                                          Miscellaneous Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59d4883f96b8f30e582ea2c9" data-serve-on-date="1507248000000">
                                       <div class="card-title ng-binding">
                                          Pie Chart Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59d48793be8e791e8025b9f9" data-serve-on-date="1507161600000">
                                       <div class="card-title ng-binding">
                                          Line Graph Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59d31f875ea8ff0d27bc3ced" data-serve-on-date="1506988800000">
                                       <div class="card-title ng-binding">
                                          Bar Graph Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59d31f2b5ea8ff0d27bc37d2" data-serve-on-date="1506902400000">
                                       <div class="card-title ng-binding">
                                          Tabulation Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59cfae3abe8e791e80dfcd93" data-serve-on-date="1506816000000">
                                       <div class="card-title ng-binding">
                                          Probability Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59cb95ba76a2cf2698f9bc02" data-serve-on-date="1506623400000">
                                       <div class="card-title ng-binding">
                                          Permutation and Combination Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59cb90eb76a2cf2698f96f7c" data-serve-on-date="1506537000000">
                                       <div class="card-title ng-binding">
                                          Mensuration Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59c735dbda444b796026d521" data-serve-on-date="1506364200000">
                                       <div class="card-title ng-binding">
                                          Time and Work Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59c669e99391ca60340ec27a" data-serve-on-date="1506297600000">
                                       <div class="card-title ng-binding">
                                          Speed Time and Distance Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59c63b2bbe8e796cf157a831" data-serve-on-date="1506211200000">
                                       <div class="card-title ng-binding">
                                          Interest Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59c3a652da444b7960ffa574" data-serve-on-date="1506038400000">
                                       <div class="card-title ng-binding">
                                          Profit and Loss Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59bcf1cfda444b416cc1d3a2" data-serve-on-date="1506038400000">
                                       <div class="card-title ng-binding">
                                          Algebra Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59bcf1aef7bd4c4eb58c8335" data-serve-on-date="1505952000000">
                                       <div class="card-title ng-binding">
                                          Number System Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59bcf18e9391ca2d9aadfdb7" data-serve-on-date="1505779200000">
                                       <div class="card-title ng-binding">
                                          Mixture Problems Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59bcf147da444b416cc1d0fc" data-serve-on-date="1505692800000">
                                       <div class="card-title ng-binding">
                                          Ratio &amp; Proportion Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59bbbba49391ca2d9aa5d2f8" data-serve-on-date="1505520000000">
                                       <div class="card-title ng-binding">
                                          Percentage Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59bb74f2f7bd4c4eb581a033" data-serve-on-date="1505433600000">
                                       <div class="card-title ng-binding">
                                          Average Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59b7f62af7bd4c0d3af81356" data-serve-on-date="1505260800000">
                                       <div class="card-title ng-binding">
                                          Simplification Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value -->
                                 </div>
                                 <div class="col-xs-12 view-more-less js-view-more-less">
                                    <button type="button" class="btn view-more js-view-more">View More <i class="tb-icon tb-arrow-down-thin"></i></button>
                                    <button type="button" class="btn view-less js-view-less">View Less <i class="tb-icon tb-arrow-up-thin"></i></button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end ngIf: subjectCat.isShow --><!-- end ngRepeat: subjectCat in previousQuizArr --><!-- ngIf: subjectCat.isShow -->
                        <div class="col-xs-12 tests-sections ng-scope" ng-repeat="subjectCat in previousQuizArr" ng-if="subjectCat.isShow">
                           <div class="header">
                              <h5 class="title ng-binding">Business &amp; Economy</h5>
                           </div>
                           <div class="body">
                              <div class="row">
                                 <div class="col-xs-12 packs-container">
                                    <!-- ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free attempted-quiz" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="5a70815b2157cd0fa0e577a1" data-serve-on-date="1517270400000">
                                       <div class="card-title ng-binding">
                                          Economic Survey 2018
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">20</span></li>
                                          <li>Total Time <span class="count ng-binding">20mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">4/20</span></li>
                                          <li>Time Taken <span class="count ng-binding">0:29mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value -->
                                 </div>
                                 <div class="col-xs-12 view-more-less js-view-more-less">
                                    <button type="button" class="btn view-more js-view-more">View More <i class="tb-icon tb-arrow-down-thin"></i></button>
                                    <button type="button" class="btn view-less js-view-less">View Less <i class="tb-icon tb-arrow-up-thin"></i></button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end ngIf: subjectCat.isShow --><!-- end ngRepeat: subjectCat in previousQuizArr --><!-- ngIf: subjectCat.isShow -->
                        <div class="col-xs-12 tests-sections ng-scope" ng-repeat="subjectCat in previousQuizArr" ng-if="subjectCat.isShow">
                           <div class="header">
                              <h5 class="title ng-binding">Logical Reasoning</h5>
                           </div>
                           <div class="body">
                              <div class="row">
                                 <div class="col-xs-12 packs-container">
                                    <!-- ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59e0b9f0a4ac5209882ac31e" data-serve-on-date="1507920120000">
                                       <div class="card-title ng-binding">
                                          Linear arrangement Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59e03bf3c882bc098bf0f5db" data-serve-on-date="1507833720000">
                                       <div class="card-title ng-binding">
                                          Syllogism Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59dcdd0b5e93710e4a3abbd1" data-serve-on-date="1507660920000">
                                       <div class="card-title ng-binding">
                                          Analytical Decision Making Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59db9aeb5e93710e4a262dad" data-serve-on-date="1507574520000">
                                       <div class="card-title ng-binding">
                                          Direction and Distance Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59d8ee81a4ac520e3221436a" data-serve-on-date="1507401720000">
                                       <div class="card-title ng-binding">
                                          Data Sufficiency Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59d71ee896b8f30e585a72df" data-serve-on-date="1507315320000">
                                       <div class="card-title ng-binding">
                                          Coding Decoding Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59d4f2aca4ac520e32db4922" data-serve-on-date="1507228920000">
                                       <div class="card-title ng-binding">
                                          Verbal Reasoning Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59d39df4170e900d2f55b6bb" data-serve-on-date="1507056120000">
                                       <div class="card-title ng-binding">
                                          Arrangement and Pattern Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59ce260576a2cf6d8a20ad89" data-serve-on-date="1506988800000">
                                       <div class="card-title ng-binding">
                                          Family tree problems Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59ce1d7cbe8e795eb4a307be" data-serve-on-date="1506816000000">
                                       <div class="card-title ng-binding">
                                          Input Output Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59ce1be89391ca594819c17c" data-serve-on-date="1506729600000">
                                       <div class="card-title ng-binding">
                                          Double lineup Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59cd07f99391ca14f305f167" data-serve-on-date="1506643200000">
                                       <div class="card-title ng-binding">
                                          Coded Inequalities Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59ca9592be8e790a26d1debe" data-serve-on-date="1506470400000">
                                       <div class="card-title ng-binding">
                                          Linear Arrangement Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59c9489776a2cf0d26f7921e" data-serve-on-date="1506384000000">
                                       <div class="card-title ng-binding">
                                          Mathematical Inequalities Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59bd38b5da444b416cc46a31" data-serve-on-date="1506124800000">
                                       <div class="card-title ng-binding">
                                          Scheduling Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59bd386ef7bd4c4eb58f189a" data-serve-on-date="1506038400000">
                                       <div class="card-title ng-binding">
                                          Ordering and ranking Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59bd38449391ca2d9ab0a038" data-serve-on-date="1505865600000">
                                       <div class="card-title ng-binding">
                                          Circular Arrangement Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59bd37e3da444b416cc462f0" data-serve-on-date="1505779200000">
                                       <div class="card-title ng-binding">
                                          Coding and decoding in fictitious language Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59bbddbaf7bd4c4eb585ac65" data-serve-on-date="1505606400000">
                                       <div class="card-title ng-binding">
                                          Syllogism Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59bbdced9391ca2d9aa70a19" data-serve-on-date="1505520000000">
                                       <div class="card-title ng-binding">
                                          Mathematical Inequalities Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59b946519391ca2d9a931ea7" data-serve-on-date="1505347200000">
                                       <div class="card-title ng-binding">
                                          Blood Relation Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59b7f2dd0497c40cd51e43d3" data-serve-on-date="1505260800000">
                                       <div class="card-title ng-binding">
                                          Direction and Distance Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value -->
                                 </div>
                                 <div class="col-xs-12 view-more-less js-view-more-less">
                                    <button type="button" class="btn view-more js-view-more">View More <i class="tb-icon tb-arrow-down-thin"></i></button>
                                    <button type="button" class="btn view-less js-view-less">View Less <i class="tb-icon tb-arrow-up-thin"></i></button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end ngIf: subjectCat.isShow --><!-- end ngRepeat: subjectCat in previousQuizArr --><!-- ngIf: subjectCat.isShow -->
                        <div class="col-xs-12 tests-sections ng-scope" ng-repeat="subjectCat in previousQuizArr" ng-if="subjectCat.isShow">
                           <div class="header">
                              <h5 class="title ng-binding">English</h5>
                           </div>
                           <div class="body">
                              <div class="row">
                                 <div class="col-xs-12 packs-container">
                                    <!-- ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags resumable-quiz" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59e21826c882bc098b0793a5" data-serve-on-date="1508025600000">
                                       <div class="card-title ng-binding">
                                          Fill in the Blanks Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59e0e4d65e937109cdb33564" data-serve-on-date="1507939200000">
                                       <div class="card-title ng-binding">
                                          Phrase Replacement (Grammar) Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59de5535c882bc098bdae404" data-serve-on-date="1507766400000">
                                       <div class="card-title ng-binding">
                                          Error Spotting (Grammar) Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59db473ac882bc0e87314a12" data-serve-on-date="1507680000000">
                                       <div class="card-title ng-binding">
                                          Sentence Completion Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59d8ccf5a4ac520e321db387" data-serve-on-date="1507507200000">
                                       <div class="card-title ng-binding">
                                          Synonyms/Antonyms Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59d8bdd25e93710e4af41c54" data-serve-on-date="1507420800000">
                                       <div class="card-title ng-binding">
                                          Cloze Test Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59d7602096b8f30e58603afb" data-serve-on-date="1507334400000">
                                       <div class="card-title ng-binding">
                                          Error Spotting Grammar Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59d33a75be8e791e800ed29f" data-serve-on-date="1507161600000">
                                       <div class="card-title ng-binding">
                                          Odd Man Out Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59d3356f5ea8ff0d27be354c" data-serve-on-date="1507075200000">
                                       <div class="card-title ng-binding">
                                          Para Completion Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59cfa5789391ca1a1a2273c9" data-serve-on-date="1506902400000">
                                       <div class="card-title ng-binding">
                                          Error Spotting Vocabulary Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59cb5beb9391ca0d7b0c552d" data-serve-on-date="1506729600000">
                                       <div class="card-title ng-binding">
                                          Phrase Replacement Vocabulary Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59ca04c876a2cf0d26fd7f94" data-serve-on-date="1506556800000">
                                       <div class="card-title ng-binding">
                                          Reading Comprehension Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59ca00b176a2cf0d26fd4d8b" data-serve-on-date="1506470400000">
                                       <div class="card-title ng-binding">
                                          Para Jumbles Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59c669b0be8e796cf159d931" data-serve-on-date="1506297600000">
                                       <div class="card-title ng-binding">
                                          Spellings Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59c66927da444b79601fb7df" data-serve-on-date="1506211200000">
                                       <div class="card-title ng-binding">
                                          Fill in the Blanks ( Vocabulary ) Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59c0b383da444b416cd94b5e" data-serve-on-date="1506124800000">
                                       <div class="card-title ng-binding">
                                          Fill in the blanks (Grammar) Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59bcf02ada444b416cc1c5df" data-serve-on-date="1505952000000">
                                       <div class="card-title ng-binding">
                                          Word Association Pair Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59bcf003f7bd4c4eb58c7772" data-serve-on-date="1505865600000">
                                       <div class="card-title ng-binding">
                                          Phrase/Idiom Meaning Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59bcefc29391ca2d9aadf061" data-serve-on-date="1505692800000">
                                       <div class="card-title ng-binding">
                                          Phrase Replacement Grammar Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59bbb59cda444b416cb99afc" data-serve-on-date="1505606400000">
                                       <div class="card-title ng-binding">
                                          Error Spotting Grammar Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59b7fb4bda444b0cfc39b7e8" data-serve-on-date="1505433600000">
                                       <div class="card-title ng-binding">
                                          Cloze test Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value --><!-- ngIf: quiz.isShow -->
                                    <div class="mt-card daily-quiz-card ng-scope is-free has-tags" ng-class="quiz.cardClass" ng-repeat="quiz in subjectCat.value" ng-if="quiz.isShow" data-tid="59b7f75c0497c40cd51e6a80" data-serve-on-date="1505347200000">
                                       <div class="card-title ng-binding">
                                          Synonyms/Antonyms Quiz
                                       </div>
                                       <div class="tags">
                                          <!-- ngRepeat: item in quiz.specificExams --><span ng-repeat="item in quiz.specificExams" class="ng-binding ng-scope">IBPS PO</span><!-- end ngRepeat: item in quiz.specificExams -->
                                       </div>
                                       <ul class="card-details hidden-on-attempted">
                                          <li>Questions <span class="count ng-binding">10</span></li>
                                          <li>Total Time <span class="count ng-binding">10mins</span></li>
                                       </ul>
                                       <ul class="card-details visible-on-attempted">
                                          <li>Correct <span class="count ng-binding">/10</span></li>
                                          <li>Time Taken <span class="count ng-binding">mins</span></li>
                                       </ul>
                                       <div class="card-actions">
                                          <button type="button" class="btn btn-block btn-theme hidden-on-attempted start-resume-btn" ng-click="storeCurrQuizInfoInLS(quiz, quiz.startURLQuiz)"></button>
                                          <button type="button" class="btn btn-block btn-gray-1 visible-on-attempted" ng-click="storeCurrQuizInfoInLS(quiz, quiz.analysisURLQuiz)">View Quiz</button>
                                       </div>
                                    </div>
                                    <!-- end ngIf: quiz.isShow --><!-- end ngRepeat: quiz in subjectCat.value -->
                                 </div>
                                 <div class="col-xs-12 view-more-less js-view-more-less">
                                    <button type="button" class="btn view-more js-view-more">View More <i class="tb-icon tb-arrow-down-thin"></i></button>
                                    <button type="button" class="btn view-less js-view-less">View Less <i class="tb-icon tb-arrow-up-thin"></i></button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end ngIf: subjectCat.isShow --><!-- end ngRepeat: subjectCat in previousQuizArr -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="tab-content-tb" id="attempted_test_tab" ng-style="currentActiveTab === &#39;attempted&#39; ? { &#39;display&#39;:&#39;block&#39;} : { &#39;display&#39;: &#39;none&#39; }" style="display: none;">
            <div class="row">
               <!-- ngIf: attemptedCategorizedArr.length > 0 -->
               <div class="col-xs-12 tests-packs-container ng-scope" ng-if="attemptedCategorizedArr.length &gt; 0">
                  <div class="wrapper">
                     <div class="row">
                        <!-- ngRepeat: categoryObj in attemptedCategorizedArr -->
                        <div class="col-xs-12 tests-sections ng-scope ng-hide" ng-repeat="categoryObj in attemptedCategorizedArr" ng-show="showCategory(categoryObj.value)">
                           <div class="header">
                              <h5 class="title ng-binding">Business &amp; Economy</h5>
                           </div>
                           <div class="body">
                              <div class="row">
                                 <div class="col-xs-12 packs-container">
                                    <!-- ngRepeat: test in categoryObj.value -->
                                 </div>
                                 <div class="col-xs-12 view-more-less js-view-more-less">
                                    <button type="button" class="btn view-more js-view-more">View More <i class="tb-icon tb-arrow-down-thin"></i></button>
                                    <button type="button" class="btn view-less js-view-less">View Less <i class="tb-icon tb-arrow-up-thin"></i></button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end ngRepeat: categoryObj in attemptedCategorizedArr -->
                     </div>
                  </div>
               </div>
               <!-- end ngIf: attemptedCategorizedArr.length > 0 -->
               <!-- ngIf: !isTestsAvailable -->
               <!-- ngIf: isMyTestsAvailable && !isAttemptedTestsAvailable -->
               <div class="col-xs-12 when-everything-empty ng-scope" ng-if="isMyTestsAvailable &amp;&amp; !isAttemptedTestsAvailable">
                  <div class="mar-v32">
                     <img class="img-responsive" src="./Bank PO Tests _ Testbook.com_files/my-test-empty.svg">
                     <h3 class="text-gray-9">You haven't attempted any of us yet!</h3>
                     <button type="button" class="btn btn-sm btn-primary" ng-click="manageTabs(&#39;my&#39;)">Go to My Tests</button>
                  </div>
               </div>
               <!-- end ngIf: isMyTestsAvailable && !isAttemptedTestsAvailable -->
               <!-- ngIf: isAllTestsAvailable && !isMyTestsAvailable && !isAttemptedTestsAvailable -->
            </div>
         </div>
      </div>
   </div>
</div>
<div class="mt-notifications ng-hide" ng-show="showFreeTestAddedStatus()">
   <div class="each-notification">
      <div class="pull-right mar-r-8 mar-t-4">
         <button type="button" class="btn btn-sm btn-link" ng-click="manageTabs(&#39;my&#39;)">My Tests</button>
         <button type="button" class="btn btn-sm mar-t-4 close-it" ng-click="closeFreeTestAdded()"><i class="tb-icon tb-clear"></i></button>
      </div>
      <!-- ngIf: freeTestsCountAdded > 1 -->
      <!-- ngIf: freeTestsCountAdded == 1 -->
   </div>
</div>
<div class="modal fade" id="langSelectForPacks" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog" role="document">
      <div class="modal-content pack-lang-select">
         <!-- ngIf: hindiTestsScope.stage == 1 -->
         <div class="modal-body mar-v24 text-center ng-scope" ng-if="hindiTestsScope.stage == 1">
            <span class="d-inline-block icon">!</span>
            <h4 class="mar-v16">Select your language section for mains tests</h4>
            <p class="mar-b24 ng-binding">Which section you want to appear for in your  - Mains Tests ?</p>
            <div>
               <button type="button" class="btn btn-theme mar-h4" ng-click="hindiTestsScope.setLanguage(false)"><span class="text-capitalize">English</span></button>
               <button type="button" class="btn btn-theme mar-h4" ng-click="hindiTestsScope.setLanguage(true)"><span class="text-capitalize">Hindi</span></button>
            </div>
         </div>
         <!-- end ngIf: hindiTestsScope.stage == 1 -->
         <!-- ngIf: hindiTestsScope.stage == 2 -->
      </div>
   </div>
</div>
<div class="filters-on-mobile" ng-class="{ &#39;f-all-tests&#39;: showFiltersAllTests , &#39;f-my-tests&#39;: showFiltersMyTests, &#39;f-quiz&#39;: showFiltersQuiz }">
   <div class="header">
      <button type="button" class="btn close-filters" ng-click=" closeMobileFilters() "><i class="tb-icon tb-arrow-left"></i></button>
      <p class="title text-uppercase">Filters</p>
      <button type="button" class="btn  reset-filters pull-right for-all-tests" ng-click="resetFilters(&#39;all&#39;)">Reset</button>
      <button type="button" class="btn  reset-filters pull-right for-my-tests" ng-click="resetFilters(&#39;my&#39;)">Reset</button>
   </div>
   <div class="body">
      <!-- ngIf: isAllTestsAvailable -->
      <div class="row for-all-tests ng-scope" ng-if="isAllTestsAvailable">
         <div class="col-xs-12" ng-disabled="filter.specificExams.length &lt; 1">
            <div class="filter-title" ng-class="getFilteredClass(filter.specificExams)">By Exam <span class="count ng-binding">(0)</span></div>
            <div class="filters">
               <!-- ngRepeat: exam in filter.specificExams -->
               <div class="filter ng-scope" ng-repeat="exam in filter.specificExams">
                  <label class="tb-checkbox">
                     <input type="checkbox" ng-model="exam.selected" ng-change="manageFilters(exam, filter.specificExams, &#39;all&#39;)" class="ng-pristine ng-untouched ng-valid">
                     <span class="ng-binding">IBPS PO</span>
                     <!-- ngIf: exam.value != 'All' && filter.specificExams.length > 0 --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="exam.value != &#39;All&#39; &amp;&amp; filter.specificExams.length &gt; 0 " ng-click="setFltersForSelectOnly(exam, filter.specificExams, &#39;all&#39;)">Only</a><!-- end ngIf: exam.value != 'All' && filter.specificExams.length > 0 -->
                  </label>
               </div>
               <!-- end ngRepeat: exam in filter.specificExams -->
               <div class="filter ng-scope" ng-repeat="exam in filter.specificExams">
                  <label class="tb-checkbox">
                     <input type="checkbox" ng-model="exam.selected" ng-change="manageFilters(exam, filter.specificExams, &#39;all&#39;)" class="ng-pristine ng-untouched ng-valid">
                     <span class="ng-binding">Banking &amp; Insurance</span>
                     <!-- ngIf: exam.value != 'All' && filter.specificExams.length > 0 --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="exam.value != &#39;All&#39; &amp;&amp; filter.specificExams.length &gt; 0 " ng-click="setFltersForSelectOnly(exam, filter.specificExams, &#39;all&#39;)">Only</a><!-- end ngIf: exam.value != 'All' && filter.specificExams.length > 0 -->
                  </label>
               </div>
               <!-- end ngRepeat: exam in filter.specificExams -->
               <div class="filter ng-scope" ng-repeat="exam in filter.specificExams">
                  <label class="tb-checkbox">
                     <input type="checkbox" ng-model="exam.selected" ng-change="manageFilters(exam, filter.specificExams, &#39;all&#39;)" class="ng-pristine ng-untouched ng-valid">
                     <span class="ng-binding">Syndicate Bank PO</span>
                     <!-- ngIf: exam.value != 'All' && filter.specificExams.length > 0 --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="exam.value != &#39;All&#39; &amp;&amp; filter.specificExams.length &gt; 0 " ng-click="setFltersForSelectOnly(exam, filter.specificExams, &#39;all&#39;)">Only</a><!-- end ngIf: exam.value != 'All' && filter.specificExams.length > 0 -->
                  </label>
               </div>
               <!-- end ngRepeat: exam in filter.specificExams -->
               <div class="filter ng-scope" ng-repeat="exam in filter.specificExams">
                  <label class="tb-checkbox">
                     <input type="checkbox" ng-model="exam.selected" ng-change="manageFilters(exam, filter.specificExams, &#39;all&#39;)" class="ng-pristine ng-untouched ng-valid">
                     <span class="ng-binding">RRB Officer Scale-I</span>
                     <!-- ngIf: exam.value != 'All' && filter.specificExams.length > 0 --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="exam.value != &#39;All&#39; &amp;&amp; filter.specificExams.length &gt; 0 " ng-click="setFltersForSelectOnly(exam, filter.specificExams, &#39;all&#39;)">Only</a><!-- end ngIf: exam.value != 'All' && filter.specificExams.length > 0 -->
                  </label>
               </div>
               <!-- end ngRepeat: exam in filter.specificExams -->
               <div class="filter ng-scope" ng-repeat="exam in filter.specificExams">
                  <label class="tb-checkbox">
                     <input type="checkbox" ng-model="exam.selected" ng-change="manageFilters(exam, filter.specificExams, &#39;all&#39;)" class="ng-pristine ng-untouched ng-valid">
                     <span class="ng-binding">Canara Bank PO</span>
                     <!-- ngIf: exam.value != 'All' && filter.specificExams.length > 0 --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="exam.value != &#39;All&#39; &amp;&amp; filter.specificExams.length &gt; 0 " ng-click="setFltersForSelectOnly(exam, filter.specificExams, &#39;all&#39;)">Only</a><!-- end ngIf: exam.value != 'All' && filter.specificExams.length > 0 -->
                  </label>
               </div>
               <!-- end ngRepeat: exam in filter.specificExams -->
            </div>
         </div>
         <div class="col-xs-12" ng-disabled="filter.packTypes.length &lt; 1">
            <div class="filter-title" ng-class="getFilteredClass(filter.packTypes)">Pack Type <span class="count ng-binding">(0)</span></div>
            <div class="filters">
               <!-- ngRepeat: type in filter.packTypes -->
               <div class="filter ng-scope" ng-repeat="type in filter.packTypes">
                  <label class="tb-checkbox">
                     <input type="checkbox" ng-model="type.selected" ng-change="manageFilters(type, filter.packTypes, &#39;all&#39;)" class="ng-pristine ng-untouched ng-valid">
                     <span class="ng-binding">others</span>
                     <!-- ngIf: type.value != 'All' && filter.packTypes.length > 0 --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="type.value != &#39;All&#39; &amp;&amp; filter.packTypes.length &gt; 0 " ng-click="setFltersForSelectOnly(type, filter.packTypes, &#39;all&#39;)">Only</a><!-- end ngIf: type.value != 'All' && filter.packTypes.length > 0 -->
                  </label>
               </div>
               <!-- end ngRepeat: type in filter.packTypes -->
               <div class="filter ng-scope" ng-repeat="type in filter.packTypes">
                  <label class="tb-checkbox">
                     <input type="checkbox" ng-model="type.selected" ng-change="manageFilters(type, filter.packTypes, &#39;all&#39;)" class="ng-pristine ng-untouched ng-valid">
                     <span class="ng-binding">Combo Pack</span>
                     <!-- ngIf: type.value != 'All' && filter.packTypes.length > 0 --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="type.value != &#39;All&#39; &amp;&amp; filter.packTypes.length &gt; 0 " ng-click="setFltersForSelectOnly(type, filter.packTypes, &#39;all&#39;)">Only</a><!-- end ngIf: type.value != 'All' && filter.packTypes.length > 0 -->
                  </label>
               </div>
               <!-- end ngRepeat: type in filter.packTypes -->
            </div>
         </div>
         <div class="col-xs-12" ng-disabled="minPriceValue == maxPriceValue">
            <div class="filter-title" ng-class="getFilteredClass(filter.priceFilter, true)">
               <span class="name">Price</span>
               <!-- ngIf: minPriceValue != minPriceValueSelected || maxPriceValue != maxPriceValueSelected -->
            </div>
            <div class="filters">
               <div class="filter filter-slider" ng-click="manageFilters({value : &#39;price_2&#39;}, [], &#39;all&#39;)">
                  <input type="text" name="mocktestFilterSlider2" data-provide="slider" data-slider-min="0" data-slider-max="887" data-slider-step="5" data-slider-value="0" data-slider-tooltip="show" id="mocktestPriceSlider_2">
               </div>
            </div>
         </div>
      </div>
      <!-- end ngIf: isAllTestsAvailable -->
      <!-- ngIf: quizFilter.exams.length -->
      <div class="row for-my-tests ng-scope" ng-if="quizFilter.exams.length">
         <div class="col-xs-12" ng-disabled="myFilter.specificExams.length &lt; 1">
            <div class="filter-title" ng-class="getFilteredClass(myFilter.specificExams)">By Exam <span class="count ng-binding">(0)</span></div>
            <div class="filters">
               <!-- ngRepeat: exam in myFilter.specificExams -->
               <div class="filter ng-scope" ng-repeat="exam in myFilter.specificExams">
                  <label class="tb-checkbox">
                     <input type="checkbox" ng-model="exam.selected" ng-change="manageFilters(exam, myFilter.specificExams, &#39;my&#39;)" class="ng-pristine ng-untouched ng-valid">
                     <span class="ng-binding">Syndicate Bank PO</span>
                     <!-- ngIf: exam.value != 'All' && myFilter.specificExams.length > 0 --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="exam.value != &#39;All&#39; &amp;&amp; myFilter.specificExams.length &gt; 0 " ng-click="setFltersForSelectOnly(exam, myFilter.specificExams, &#39;my&#39;)">Only</a><!-- end ngIf: exam.value != 'All' && myFilter.specificExams.length > 0 -->
                  </label>
               </div>
               <!-- end ngRepeat: exam in myFilter.specificExams -->
               <div class="filter ng-scope" ng-repeat="exam in myFilter.specificExams">
                  <label class="tb-checkbox">
                     <input type="checkbox" ng-model="exam.selected" ng-change="manageFilters(exam, myFilter.specificExams, &#39;my&#39;)" class="ng-pristine ng-untouched ng-valid">
                     <span class="ng-binding">IBPS PO</span>
                     <!-- ngIf: exam.value != 'All' && myFilter.specificExams.length > 0 --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="exam.value != &#39;All&#39; &amp;&amp; myFilter.specificExams.length &gt; 0 " ng-click="setFltersForSelectOnly(exam, myFilter.specificExams, &#39;my&#39;)">Only</a><!-- end ngIf: exam.value != 'All' && myFilter.specificExams.length > 0 -->
                  </label>
               </div>
               <!-- end ngRepeat: exam in myFilter.specificExams -->
               <div class="filter ng-scope" ng-repeat="exam in myFilter.specificExams">
                  <label class="tb-checkbox">
                     <input type="checkbox" ng-model="exam.selected" ng-change="manageFilters(exam, myFilter.specificExams, &#39;my&#39;)" class="ng-pristine ng-untouched ng-valid">
                     <span class="ng-binding">RRB Officer Scale-I</span>
                     <!-- ngIf: exam.value != 'All' && myFilter.specificExams.length > 0 --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="exam.value != &#39;All&#39; &amp;&amp; myFilter.specificExams.length &gt; 0 " ng-click="setFltersForSelectOnly(exam, myFilter.specificExams, &#39;my&#39;)">Only</a><!-- end ngIf: exam.value != 'All' && myFilter.specificExams.length > 0 -->
                  </label>
               </div>
               <!-- end ngRepeat: exam in myFilter.specificExams -->
               <div class="filter ng-scope" ng-repeat="exam in myFilter.specificExams">
                  <label class="tb-checkbox">
                     <input type="checkbox" ng-model="exam.selected" ng-change="manageFilters(exam, myFilter.specificExams, &#39;my&#39;)" class="ng-pristine ng-untouched ng-valid">
                     <span class="ng-binding">Canara Bank PO</span>
                     <!-- ngIf: exam.value != 'All' && myFilter.specificExams.length > 0 --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="exam.value != &#39;All&#39; &amp;&amp; myFilter.specificExams.length &gt; 0 " ng-click="setFltersForSelectOnly(exam, myFilter.specificExams, &#39;my&#39;)">Only</a><!-- end ngIf: exam.value != 'All' && myFilter.specificExams.length > 0 -->
                  </label>
               </div>
               <!-- end ngRepeat: exam in myFilter.specificExams -->
            </div>
         </div>
         <div class="col-xs-12" ng-disabled="myFilter.testTypes.length &lt; 1">
            <div class="filter-title" ng-class="getFilteredClass(myFilter.testTypes)">Test Type <span class="count ng-binding">(0)</span></div>
            <div class="filters">
               <!-- ngRepeat: type in myFilter.testTypes -->
               <div class="filter ng-scope" ng-repeat="type in myFilter.testTypes">
                  <label class="tb-checkbox">
                     <input type="checkbox" ng-model="type.selected" ng-change="manageFilters(type, myFilter.testTypes, &#39;my&#39;)" class="ng-pristine ng-untouched ng-valid">
                     <span class="ng-binding">Paused Tests</span>
                     <!-- ngIf: myFilter.testTypes.length > 0 && testTypes.value != 'All' --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="myFilter.testTypes.length &gt; 0 &amp;&amp; testTypes.value != &#39;All&#39; " ng-click="setFltersForSelectOnly(type, myFilter.testTypes, &#39;my&#39;)">Only</a><!-- end ngIf: myFilter.testTypes.length > 0 && testTypes.value != 'All' -->
                  </label>
               </div>
               <!-- end ngRepeat: type in myFilter.testTypes -->
               <div class="filter ng-scope" ng-repeat="type in myFilter.testTypes">
                  <label class="tb-checkbox">
                     <input type="checkbox" ng-model="type.selected" ng-change="manageFilters(type, myFilter.testTypes, &#39;my&#39;)" class="ng-pristine ng-untouched ng-valid">
                     <span class="ng-binding">others</span>
                     <!-- ngIf: myFilter.testTypes.length > 0 && testTypes.value != 'All' --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="myFilter.testTypes.length &gt; 0 &amp;&amp; testTypes.value != &#39;All&#39; " ng-click="setFltersForSelectOnly(type, myFilter.testTypes, &#39;my&#39;)">Only</a><!-- end ngIf: myFilter.testTypes.length > 0 && testTypes.value != 'All' -->
                  </label>
               </div>
               <!-- end ngRepeat: type in myFilter.testTypes -->
               <div class="filter ng-scope" ng-repeat="type in myFilter.testTypes">
                  <label class="tb-checkbox">
                     <input type="checkbox" ng-model="type.selected" ng-change="manageFilters(type, myFilter.testTypes, &#39;my&#39;)" class="ng-pristine ng-untouched ng-valid">
                     <span class="ng-binding">Full Test - Prelims</span>
                     <!-- ngIf: myFilter.testTypes.length > 0 && testTypes.value != 'All' --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="myFilter.testTypes.length &gt; 0 &amp;&amp; testTypes.value != &#39;All&#39; " ng-click="setFltersForSelectOnly(type, myFilter.testTypes, &#39;my&#39;)">Only</a><!-- end ngIf: myFilter.testTypes.length > 0 && testTypes.value != 'All' -->
                  </label>
               </div>
               <!-- end ngRepeat: type in myFilter.testTypes -->
               <div class="filter ng-scope" ng-repeat="type in myFilter.testTypes">
                  <label class="tb-checkbox">
                     <input type="checkbox" ng-model="type.selected" ng-change="manageFilters(type, myFilter.testTypes, &#39;my&#39;)" class="ng-pristine ng-untouched ng-valid">
                     <span class="ng-binding">Full Test_Canara Bank PO 2018</span>
                     <!-- ngIf: myFilter.testTypes.length > 0 && testTypes.value != 'All' --><a href="javascript:void(0)" class="show-only ng-scope" ng-if="myFilter.testTypes.length &gt; 0 &amp;&amp; testTypes.value != &#39;All&#39; " ng-click="setFltersForSelectOnly(type, myFilter.testTypes, &#39;my&#39;)">Only</a><!-- end ngIf: myFilter.testTypes.length > 0 && testTypes.value != 'All' -->
                  </label>
               </div>
               <!-- end ngRepeat: type in myFilter.testTypes -->
            </div>
         </div>
      </div>
      <!-- end ngIf: quizFilter.exams.length -->
      <!-- ngIf: quizFilter.exams.length -->
      <div class="row for-quiz ng-scope" ng-if="quizFilter.exams.length">
         <div class="col-xs-12" ng-disabled="quizFilter.exams.length &lt; 1">
            <div class="filter-title" ng-class="getFilteredClass(quizFilter.exams)">By Exam <span class="count ng-binding">(0)</span></div>
            <div class="filters">
               <!-- ngRepeat: exam in quizFilter.exams -->
               <div class="filter ng-scope" ng-repeat="exam in quizFilter.exams">
                  <label class="tb-checkbox">
                  <input type="checkbox" ng-model="exam.isSelected" ng-change="manageQuizFilters()" class="ng-pristine ng-untouched ng-valid">
                  <span class="ng-binding">IBPS PO</span>
                  </label>
               </div>
               <!-- end ngRepeat: exam in quizFilter.exams -->
            </div>
         </div>
         <div class="col-xs-12" ng-disabled="quizFilter.types.length &lt; 1">
            <div class="filter-title" ng-class="getFilteredClass(quizFilter.types)"> Status <span class="count ng-binding">(0)</span></div>
            <div class="filters">
               <!-- ngRepeat: type in quizFilter.types -->
               <div class="filter ng-scope" ng-repeat="type in quizFilter.types">
                  <label class="tb-checkbox">
                  <input type="checkbox" ng-model="type.isSelected" ng-change="manageQuizFilters()" class="ng-pristine ng-untouched ng-valid">
                  <span class="ng-binding">Attempted Quiz</span>
                  </label>
               </div>
               <!-- end ngRepeat: type in quizFilter.types -->
               <div class="filter ng-scope" ng-repeat="type in quizFilter.types">
                  <label class="tb-checkbox">
                  <input type="checkbox" ng-model="type.isSelected" ng-change="manageQuizFilters()" class="ng-pristine ng-untouched ng-valid">
                  <span class="ng-binding">Unattempted Quiz</span>
                  </label>
               </div>
               <!-- end ngRepeat: type in quizFilter.types -->
               <div class="filter ng-scope" ng-repeat="type in quizFilter.types">
                  <label class="tb-checkbox">
                  <input type="checkbox" ng-model="type.isSelected" ng-change="manageQuizFilters()" class="ng-pristine ng-untouched ng-valid">
                  <span class="ng-binding">Paused Quiz</span>
                  </label>
               </div>
               <!-- end ngRepeat: type in quizFilter.types -->
            </div>
         </div>
      </div>
      <!-- end ngIf: quizFilter.exams.length -->
   </div>
   <div class="footer">
      <button type="button" class="btn btn-theme btn-block " data-ng-click=" closeMobileFilters() ">Apply</button>
   </div>
</div>
<div class="search-on-mobile" data-ng-class=" {&#39;active&#39;: showSearchOnMobile.my} ">
   <div class="header">
      <button type="button" class="btn close-filters" ng-click="toggleSearchOnMobile(false, &#39;my&#39;); setTestTitleForSearch(myFilter.testTitle, false)">
      <i class="tb-icon tb-arrow-left"></i></button>
      <div class="search">
         <form class="ng-pristine ng-valid">
            <label data-ng-click="toggleSearchOnMobile(false, &#39;my&#39;);setTestTitleForSearch(myFilter.testTitle, false)" for="mobile_test_name_search" ng-blur="setTestTitleForSearch(myFilter.testTitle, false)">
            <i class="tb-icon tb-search"></i>
            </label>
            <input ng-keypress="setTestTitleByEnter($event, myFilter.testTitle)" class="form-control ng-pristine ng-untouched ng-valid" ng-change="setTestTitleForSearchOnChange(myFilter.testTitle, true)" data-ng-model-options="{ updateOn: &#39;default blur&#39;, debounce: { &#39;default&#39;: 0, &#39;blur&#39;: 100 } }" ng-model="myFilter.testTitle" placeholder="Search by test title" autofocus="">
            <span class="clear-search ng-hide" ng-show=" myFilter.testTitle.length != 0 " ng-click="clearMySearch()"><i class="tb-icon tb-clear"></i></span>
         </form>
      </div>
   </div>
   <ul class="body" ng-show="isShowSuggestions" style="display : block">
      <!-- ngRepeat: x in arrayForSuggestions -->
   </ul>
</div>
<div class="search-on-mobile" data-ng-class=" {&#39;active&#39;: showSearchOnMobile.quiz} ">
   <div class="header">
      <button type="button" class="btn close-filters" ng-click="toggleSearchOnMobile(false, &#39;quiz&#39;); setTestTitleForSearch(myFilter.testTitle, false)">
      <i class="tb-icon tb-arrow-left"></i></button>
      <div class="search">
         <form class="ng-pristine ng-valid">
            <label data-ng-click="toggleSearchOnMobile(false, &#39;quiz&#39;);setQuizTitleForSearch(quizFilter.selectedQuizForSuggestion)" for="mobile_test_name_search" ng-blur="setTestTitleForSearch(myFilter.testTitle, false)">
            <i class="tb-icon tb-search"></i>
            </label>
            <input ng-keypress="setTestTitleByEnter($event, myFilter.testTitle)" class="form-control ng-pristine ng-untouched ng-valid" ng-focus="showQuizSuggestions(true)" ng-blur="showQuizSuggestions(false)" ng-change="setQuizTitleForSearchOnChange(quizFilter.selectedQuizForSuggestion, true)" data-ng-model-options="{ updateOn: &#39;default blur&#39;, debounce: { &#39;default&#39;: 0, &#39;blur&#39;: 100 } }" ng-model="quizFilter.selectedQuizForSuggestion" placeholder="Search by Quiz Name" autofocus="">
            <span class="clear-search ng-hide" ng-show="quizFilter.selectedQuizForSuggestion" ng-click="quizFilter.removeSearchText()"><i class="tb-icon tb-clear"></i></span>
         </form>
      </div>
   </div>
   <ul class="body ng-hide" ng-show="isShowQuizSuggestions" style="display: block">
      <!-- ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Interest &amp; Mensuration  Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Linear arrangement Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Phrase Replacement (Grammar) Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Simplification &amp; Average Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Syllogism Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Number Series Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Error Spotting (Grammar) Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Sentence Completion Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Analytical Decision Making Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Data Sufficiency Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Direction and Distance Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Miscellaneous Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Synonyms/Antonyms Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Cloze Test Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Data Sufficiency Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Coding Decoding Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Error Spotting Grammar Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Pie Chart Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Verbal Reasoning Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Line Graph Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Odd Man Out Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Arrangement and Pattern Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Para Completion Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Bar Graph Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Family tree problems Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Tabulation Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Error Spotting Vocabulary Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Probability Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Input Output Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Double lineup Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Phrase Replacement Vocabulary Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Permutation and Combination Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Coded Inequalities Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Mensuration Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Reading Comprehension Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Para Jumbles Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Linear Arrangement Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Time and Work Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Mathematical Inequalities Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Spellings Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Speed Time and Distance Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Fill in the Blanks ( Vocabulary ) Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Interest Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Fill in the blanks (Grammar) Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Scheduling Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Profit and Loss Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Ordering and ranking Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Algebra Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Number System Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Word Association Pair Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Phrase/Idiom Meaning Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Circular Arrangement Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Coding and decoding in fictitious language Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Mixture Problems Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Ratio &amp; Proportion Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Phrase Replacement Grammar Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Syllogism Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Error Spotting Grammar Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Percentage Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Mathematical Inequalities Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Average Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Cloze test Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Blood Relation Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Synonyms/Antonyms Quiz
         <span class="ng-binding">in English</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Simplification Quiz
         <span class="ng-binding">in Quantitative Aptitude</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Direction and Distance Quiz
         <span class="ng-binding">in Logical Reasoning</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Fill in the Blanks Quiz
         <span class="ng-binding">in Paused Quizzes</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow -->
      <li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
         Economic Survey 2018
         <span class="ng-binding">in Attempted Quizzes</span>
      </li>
      <!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr -->
   </ul>
</div>
<div class="modal fade has-close-btn-outside" id="mtDetailsModal" tabindex="-1" role="dialog">
   <div class="modal-dialog">
      <!-- ngIf: modalToShow == MODAL_ENUM.TEST_ADDED -->
      <!-- ngIf: modalToShow == MODAL_ENUM.ADMIT_CARD -->
   </div>
</div>
<div class="modal-hero js-renew-subscription ng-scope" ng-class="statusClass" tabindex="-1" ng-controller="renewPlanCtrl">
   <div class="modal-hero-backdrop" ng-click="hideRenewPlanModal(false)"></div>
   <div class="modal-hero-dialog">
      <button type="button" ng-click="hideRenewPlanModal()" class="btn modal-hero-close"><span class="tb-icon tb-clear"></span>Close</button>
      <!-- ngInclude: '/views/partials/mocktest/renew-subscription.html' -->
      <div class="modal-hero-content ng-scope" ng-include="&#39;/views/partials/mocktest/renew-subscription.html&#39;">
         <div class="wrapper pad-h0 hero-content-inner ng-scope">
            <div class="row">
               <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 mar-t32">
                  <p class="mar-l16">Select our subscription plan</p>
                  <div class="row">
                     <div class="col-xs-12 packs-container">
                        <!-- ngRepeat: sub in filteredRenewItems -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal-hero js-pack-release-plan ng-scope" ng-class="statusClass" ng-controller="releasePlanCtrl" tabindex="-1">
   <div class="modal-hero-backdrop" ng-click="hideReleasePlan()"></div>
   <div class="modal-hero-dialog">
      <button type="button" ng-click="hideReleasePlan()" class="btn modal-hero-close"><span class="tb-icon tb-clear"></span>Close</button>
      <!-- ngInclude: '/views/partials/mocktest/pack-release-plan.html' -->
      <div class="modal-hero-content ng-scope" ng-include="&#39;/views/partials/mocktest/pack-release-plan.html&#39;">
         <div class="hero-content-inner ng-scope">
            <div class="row">
               <div class="col-md-10 col-md-offset-1">
                  <div class="alert alert-warning">
                     <ul>
                        <!-- ngRepeat: text in notificationTextArr -->
                        <li ng-repeat="text in notificationTextArr" class="ng-binding ng-scope">Check the test release and expiry date by clicking on the Test Release Plan link for all exams.</li>
                        <!-- end ngRepeat: text in notificationTextArr -->
                     </ul>
                  </div>
                  <!-- ngRepeat: (index, category) in extraFeatures track by $index -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal-hero js-test-release-plan ng-scope" ng-class="statusClass" ng-controller="testPackCtrl" tabindex="-1">
   <div class="modal-hero-backdrop" ng-click="hideTestPack()"></div>
   <div class="modal-hero-dialog">
      <button type="button" ng-click="hideTestPack()" class="btn modal-hero-close"><span class="tb-icon tb-clear"></span>Close</button>
      <!-- ngInclude: '/views/partials/mocktest/test-release-plan.html' -->
      <div class="modal-hero-content ng-scope" ng-include="&#39;/views/partials/mocktest/test-release-plan.html&#39;">
         <div class="text-center ng-scope ng-hide" ng-show="testDetailsLoading">
            <img style="height: 90px;" src="./Bank PO Tests _ Testbook.com_files/loader.gif">
            <h4>Loading Details. Please Wait.</h4>
         </div>
         <div class="wrapper pad-h0 hero-content-inner no-delay ng-scope" ng-show="!testDetailsLoading">
            <div class="row">
               <div class="col-md-10 col-md-offset-1">
                  <!-- ngRepeat: (pid, pObj) in  releasePackDetails -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal-hero js-calculate-savings ng-scope" ng-class="statusClass" tabindex="-1" ng-controller="calculateSavingsCtrl">
   <div class="modal-hero-backdrop" ng-click="hideCalcSavings()"></div>
   <div class="modal-hero-dialog">
      <button type="button" ng-click="hideCalcSavings()" class="btn modal-hero-close"><span class="tb-icon tb-clear"></span>Close</button>
      <!-- ngInclude: '/views/partials/mocktest/calculate-savings.html' -->
      <div class="modal-hero-content ng-scope" ng-include="&#39;/views/partials/mocktest/calculate-savings.html&#39;">
         <div class="wrapper pad-h0 hero-content-inner ng-scope">
            <div class="row">
               <!-- ngIf: !isShowCalc -->
               <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 ng-scope" ng-if="!isShowCalc">
                  <h4>Calculate your Savings</h4>
                  <h3>Select all the exams you are appearing for</h3>
                  <!-- ngRepeat: course in chooseCourseUIDS -->
                  <!-- ngIf: isCalcBtnDisabled -->
                  <p class="text-center ng-scope" ng-if="isCalcBtnDisabled">Please select at least one exam to begin.</p>
                  <!-- end ngIf: isCalcBtnDisabled -->
                  <button type="button" class="btn btn-success btn-lg btn-block" ng-click="calculateSavingBtnClicked()" ng-disabled="isCalcBtnDisabled" disabled="disabled">Calculate my Savings</button>
               </div>
               <!-- end ngIf: !isShowCalc -->
               <!-- ngIf: isShowCalc -->
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal-hero js-bundle-details" tabindex="-1">
   <div class="modal-hero-backdrop" ng-click="hideBundleDetails()"></div>
   <div class="modal-hero-dialog">
      <button type="button" ng-click="hideBundleDetails()" class="btn modal-hero-close"><span class="tb-icon tb-clear"></span>Close</button>
      <!-- ngInclude: '/views/partials/mocktest/bundleDetails.html' -->
      <div class="modal-hero-content ng-scope" ng-include="&#39;/views/partials/mocktest/bundleDetails.html&#39;">
         <div class="wrapper pad-h0 hero-content-inner ng-scope">
            <div class="row">
               <div class="col-md-10 col-md-offset-1">
                  <div class="panel-group" id="accordion-bundle-details" role="tablist" aria-multiselectable="true">
                     <!-- ngRepeat: catObj in packToShowInfo.categorizedSortedPackTests -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div ng-controller="SubscriptionHIW" class="ng-scope">
   <!-- ngInclude: '/views/partials/mocktest/subscription-helper.html' -->
   <div class="modal fade ng-scope" id="subscription-helper" tabindex="-1" role="dialog" ng-include="&#39;/views/partials/mocktest/subscription-helper.html&#39;">
      <div class="modal-dialog ng-scope" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="tb-icon tb-clear" aria-hidden="true"></span></button>
               <h4 class="modal-title">How it Works?</h4>
            </div>
            <div class="modal-body pad-h0 pad-t0">
               <div id="subscriptionVideoPlayer"></div>
               <div class="row how-it-works">
                  <div class="col-xs-12 mar-t16 mar-b32">
                     <div class="icon-img step-one mar-b24" style="background-image: url(&#39;/assets/img/utility/plans-how-it-works.svg&#39;)"></div>
                     <div class="font-size-h4 mar-v8 font-weight-semibold text-center">1. Choose A Plan</div>
                     <p class="font-semibold text-gray-9 text-center">Choose a subscription plan best suited for your exam preparation</p>
                  </div>
                  <div class="col-xs-12 mar-t16 mar-b32">
                     <div class="icon-img step-two mar-b24" style="background-image: url(&#39;/assets/img/utility/plans-how-it-works.svg&#39;)"></div>
                     <div class="font-size-h4 mar-v8 font-weight-semibold text-center">2. Add Tests</div>
                     <p class="font-semibold text-gray-9 text-center">Simply add any test pack of any course/exam from all tests</p>
                  </div>
                  <div class="col-xs-12 mar-t16 mar-b32">
                     <div class="icon-img step-three mar-b24" style="background-image: url(&#39;/assets/img/utility/plans-how-it-works.svg&#39;)"></div>
                     <div class="font-size-h4 mar-v8 font-weight-semibold text-center">3. Take Tests</div>
                     <p class="font-semibold text-gray-9 text-center">Take any number of tests till your subscription lasts!</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

