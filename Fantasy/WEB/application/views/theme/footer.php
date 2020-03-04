<div class="footer">
<button type="button" class="btn btn-theme btn-block " data-ng-click=" closeMobileFilters() ">Apply</button>
</div>
</div>
<div class="search-on-mobile" >
<div class="header">
<button type="button" class="btn close-filters" >
<i class="tb-icon tb-arrow-left"></i></button>
<div class="search">
<form class="ng-pristine ng-valid">
<label for="mobile_test_name_search" >
<i class="tb-icon tb-search"></i>
</label>
<input  placeholder="Search by test title" autofocus="">
<span class="clear-search ng-hide" ng-show=" myFilter.testTitle.length != 0 " ><i class="tb-icon tb-clear"></i></span>
</form>
</div>
</div>
<ul class="body" >
<!-- ngRepeat: x in arrayForSuggestions -->
</ul>
</div>
<div class="search-on-mobile">
<div class="header">
<button type="button" class="btn close-filters">
<i class="tb-icon tb-arrow-left"></i></button>
<div class="search">
<form class="ng-pristine ng-valid">
<label for="mobile_test_name_search" >
<i class="tb-icon tb-search"></i>
</label>
<input placeholder="Search by Quiz Name" autofocus="">
<span class="clear-search ng-hide" ><i class="tb-icon tb-clear"></i></span>
</form>
</div>
</div>
<ul class="body ng-hide" >
Interest &amp; Mensuration  Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Linear arrangement Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Phrase Replacement (Grammar) Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Simplification &amp; Average Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Syllogism Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Number Series Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Error Spotting (Grammar) Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Sentence Completion Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Analytical Decision Making Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Data Sufficiency Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Direction and Distance Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Miscellaneous Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Synonyms/Antonyms Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Cloze Test Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Data Sufficiency Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Coding Decoding Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Error Spotting Grammar Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Pie Chart Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Verbal Reasoning Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Line Graph Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Odd Man Out Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Arrangement and Pattern Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Para Completion Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Bar Graph Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Family tree problems Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Tabulation Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Error Spotting Vocabulary Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Probability Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Input Output Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Double lineup Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Phrase Replacement Vocabulary Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Permutation and Combination Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Coded Inequalities Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Mensuration Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Reading Comprehension Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Para Jumbles Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Linear Arrangement Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Time and Work Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Mathematical Inequalities Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Spellings Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Speed Time and Distance Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Fill in the Blanks ( Vocabulary ) Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Interest Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Fill in the blanks (Grammar) Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Scheduling Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Profit and Loss Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Ordering and ranking Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Algebra Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Number System Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Word Association Pair Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Phrase/Idiom Meaning Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Circular Arrangement Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Coding and decoding in fictitious language Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Mixture Problems Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Ratio &amp; Proportion Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Phrase Replacement Grammar Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Syllogism Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Error Spotting Grammar Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Percentage Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Mathematical Inequalities Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Average Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Cloze test Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Blood Relation Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Synonyms/Antonyms Quiz
<span class="ng-binding">in English</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Simplification Quiz
<span class="ng-binding">in Quantitative Aptitude</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Direction and Distance Quiz
<span class="ng-binding">in Logical Reasoning</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Fill in the Blanks Quiz
<span class="ng-binding">in Paused Quizzes</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr --><!-- ngIf: x.isShow --><li ng-repeat="x in allQuizzesNamesArr" ng-mousedown="setQuizTitleForSearch(x.value, false);toggleSearchOnMobile(false, &#39;quiz&#39;)" ng-if="x.isShow" class="ng-binding ng-scope">
Economic Survey 2018
<span class="ng-binding">in Attempted Quizzes</span>
</li><!-- end ngIf: x.isShow --><!-- end ngRepeat: x in allQuizzesNamesArr -->
</ul>
</div>


<!-- ngInclude: '/views/partials/cart-template.html' --><div class="cart-checkout js-cart-checkout " >
<i class="tb-icon tb-cart-blank"></i>
<div class="tb-tooltip top">
<div class="po-content">
My Cart
</div>
</div>
<span class="cart-items-count ng-binding ng-hide" >0</span>
</div>
<div class="cart-backdrop ng-scope" ></div>
<div class="cart-contents js-cart-contents ng-scope has-zero-tb-money" >
<div class="cart-header">
<div class="row">
<div class="col-xs-2 pad-h0 close-my-cart">
<button type="button" class="btn btn-lg pad-l12 pad-r8" ></i>
</button>
</div>
<div class="col-xs-6 pad-h0 ch-count">
<h4 class="mar-t16 mar-b0">
My Cart
<span class="font-weight-thin ng-binding">[ 0 ]</span>
</h4>
</div>
<div class="col-xs-4 pad-l0 text-right clear-my-cart">
<span class="mar-t16 ng-hide"  >Remove All</span>
</div>
</div>
</div>
<!-- ngIf: includeMobilVerificationBlock && subTotal > 0 -->
<div class="cart-body slim-scrollbar js-cart-body" style="margin-top: 0px;">
<ul class="list-unstyled mar-b0">
<!-- ngRepeat: obj in cartItemsArr -->
</ul>
<div class="empty-bag-content small" ng-show="cartItemsArr.length == 0">
<span></span>
<h2>Oops! Your Cart Is Empty!</h2>
</div>
</div>
<div class="cart-footer">
<div class="cart-subtotal">
<div class="row">
<div class="col-xs-6 text-left">
SUBTOTAL
</div>
<div class="col-xs-6 text-right ng-binding">
<i class="tb-icon tb-rupee font-sm align-inherit"></i>0
</div>
</div>
</div>
<div class="coupon-coins-box">
<div class="row">
<div class="col-xs-12 coupon-box coupon-stage-0" ng-class="{&#39;coupon-stage-0&#39;: couponStage == 0, &#39;coupon-stage-1&#39;: couponStage == 1, &#39;coupon-stage-2&#39;: couponStage == 2}">
<div class="row">
<div class="col-xs-12 state-1">
<button type="button" class="btn-link" ng-click="showCouponInputBox()" id="js-goto-enter-coupon1">I have a Promo Code!</button>
<div class="coupon-error ng-binding ng-hide" ng-show="couponInactiveMessage != &#39;&#39; ">  </div>
</div>
<div class="col-xs-12 state-2">
<div class="enter-code">
<input type="text" placeholder="Enter Coupon Code" ng-model="coupon.code" id="js-enter-coupon-code" class="ng-pristine ng-untouched ng-valid">
</div>
<div class="p-apply">
<button type="button" class="btn btn-primary btn-block text-uppercase" ng-click="applyCoupon(coupon.code)">Apply</button>
</div>
<div class="p-cancel">
<button type="button" class="btn btn-link" ng-click="resetCouponComponent()">✕</button>
</div>
<div class="coupon-error ng-binding ng-hide" ng-show="errorMessageCoupon != &#39;&#39; ">  </div>
</div>
<div class="col-xs-12 state-3">
<div class="promo-code">
<span class="ng-binding">PROMO: </span>
</div>
<div class="amount-remove">
<span class="ng-binding"><small style="margin-right: 10px;">You saved</small> Rs. 0</span>
<button type="button" class="btn btn-xs" id="js-goto-enter-coupon2" ng-click="removeCoupon(0)">Remove</button>
</div>
</div>
</div>
</div>
<div class="col-xs-12 coins-box" ng-click="showCoinsInactiveMessage()">
<div class="coupon-error ng-binding ng-hide" ng-show="coinsInactiveMessage != &#39;&#39; ">  </div>
<div class="text-left">
<label class="tb-checkbox">
<input type="checkbox" ng-disabled="isDisabledCoins || remCost == 0 &amp;&amp; couponCodePrice == 0 &amp;&amp; coinsToUse == 0 || cartItemsArr.length == 0 || mycoins == 0 " ng-model="cartObj.isAddCoinsCHK" ng-change="addCoins(couponCode, cartObj.isAddCoinsCHK)" class="ng-pristine ng-untouched ng-valid" disabled="disabled">
<span>Use TB Money</span>
</label>
</div>
<div class="text-right pull-right">
<span class="total-coins ng-binding"><i class="tb-icon tb-rupee font-sm align-inherit"></i>0</span>
</div>
<!-- ngIf: cartObj.isAddCoinsCHK -->
</div>
</div>
</div>
<div class="cart-payment">
<button class="btn btn-success btn-block text-uppercase pay-state-0" type="submit" ng-click="makePayment(cartObj.isAddCoinsCHK)" ng-disabled="cartItemsArr.length == 0 || (!isMobileVerified &amp;&amp; subTotal &gt; 0) || isLoading " ng-class="getProceedBtnClass()" disabled="disabled">
<span class="free-proceed">Proceed</span>
<!-- ngIf: !isLoading --><span class="paid-proceed ng-binding ng-scope" ng-if="!isLoading">Pay Rs. 0</span><!-- end ngIf: !isLoading -->
<!-- ngIf: isLoading -->

</button>
</div>
</div>
</div>
<!-- ngInclude: '/views/partials/paytm-seamless.html' --><div ng-controller="paymentCtrl" ng-include="&#39;/views/partials/paytm-seamless.html&#39;" class="ng-scope"><div class="modal seamless-paytm ng-scope" id="seamlessPaytm" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="overlay showable" ng-class="{&#39;drishy&#39; : isOpenPaytmErrorBox}"></div>
<div class="error-message showable" ng-class="{&#39;drishy&#39; : isOpenPaytmErrorBox}">
<div class="fd-t">Payment failed</div>
<div class="spin"><div></div></div>
<div class="spin spin2"><div></div></div>
<span class="link">Go to payment</span>
<button class="btn fd-hide" ng-click="hidePaytmShowRazorpay()">Retry</button>
</div>
<div class="modal-header">
<div class="close" ng-click="closePayTMModal()">×</div>
<div class="logo">
<img src="./Bank PO Tests _ Testbook.com_files/logo-small.png" alt="Testbook logo">
</div>
<div class="merchant">
<div class="merchant-name ng-binding">Testbook</div>
<div class="merchant-desc ng-binding"></div>
<div class="amount ng-binding">&nbsp;₹ NaN</div>
</div>
</div>
<div class="modal-body">
<div class="topbar">
<div class="top-right">
<div class="user ng-binding">


<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="232 -304.3 654.3 654.3" style="enable-background:new 232 -304.3 654.3 654.3;" xml:space="preserve">
<g>
<g id="user">
<g>
<path style="fill:#757575;" d="M698.1,97.2c52.3-41.2,86-104.9,86-176.7c0-124.2-100.7-224.9-224.9-224.9S334.2-203.6,334.2-79.4
                            c0,71.7,33.7,135.5,86,176.7C326.5,145,260.5,239.4,253.2,350h41C302,246.5,369.4,159.7,462,123.2c29.4,14.1,62.3,22.3,97.2,22.3
                            c34.9,0,67.7-8.2,97.2-22.3c92.7,36.5,160,123.2,167.9,226.8h41C857.9,239.4,791.9,145,698.1,97.2z M559.2,104.6
                            c-101.6,0-184-82.4-184-184c0-101.6,82.4-184,184-184s184,82.4,184,184C743.2,22.2,660.8,104.6,559.2,104.6z"></path>
</g>
</g>
</g>
</svg>

</div>
</div>
<div class="clearfix top-left" ng-click="hidePaytmShowRazorpay()">
<i class="tb-icon tb-arrow-left-thin back"></i>
<div class="tab-title">
<img src="./Bank PO Tests _ Testbook.com_files/paytm.png" height="18">
</div>
</div>
</div>
<form method="POST" novalidate="" autocomplete="off" onsubmit="return false" ng-class="{ &#39;otp-sent&#39; : isEnterOtpView }" class="ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength"> 
<div class="form-fields">
<div class="tab-content form-otp" ng-class="{&#39;loading&#39; : isLoading &amp;&amp; !isFailedAttempt, &#39;failed-attempt&#39; : isFailedAttempt}">
<div class="otp-prompt ng-binding"></div>
<div class="add-funds">
<div class="text-center" style="margin-top: 20px;">
<a class="link" ng-click="hidePaytmShowRazorpay()">Try different payment method</a>
</div>
</div>
<div class="otp-section">
<div class="otp-action btn">Retry</div>
<div class="otp-elem" ng-class="{&#39;focused&#39;: otpInputFocused, &#39;filled&#39;: otpInputFilled}">
<div class="help">Please enter the OTP</div>
<input type="tel" class="input otp ng-pristine ng-untouched ng-invalid ng-invalid-required ng-valid-maxlength" name="otp" maxlength="6" autocomplete="off" required="" ng-model="paytmObj.otp" ng-change="validateOtpLength()" ng-focus="otpInputFocused = true" ng-blur="otpInputFocused = false">
</div>
</div>
<div class="spin"><div></div></div>
<div class="spin spin2"><div></div></div>
<div class="otp-sec-outer">
<a class="link otp-resend" ng-click="genOtpForPaytm()">Resend OTP</a>
</div>
</div>
</div>
<button type="submit" ng-click="verifyOtpForPaytm()" class="submit-button">
<span class="otp-btn">Verify</span>
</button>
</form>
</div>
</div>
</div>
</div></div>
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
<!-- ngInclude: '/views/partials/mocktest/renew-subscription.html' --><div class="modal-hero-content ng-scope" ng-include="&#39;/views/partials/mocktest/renew-subscription.html&#39;"><div class="wrapper pad-h0 hero-content-inner ng-scope">
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
</div></div>
</div>
</div>
<div class="modal-hero js-pack-release-plan ng-scope" ng-class="statusClass" ng-controller="releasePlanCtrl" tabindex="-1">
<div class="modal-hero-backdrop" ng-click="hideReleasePlan()"></div>
<div class="modal-hero-dialog">
<button type="button" ng-click="hideReleasePlan()" class="btn modal-hero-close"><span class="tb-icon tb-clear"></span>Close</button>
<!-- ngInclude: '/views/partials/mocktest/pack-release-plan.html' --><div class="modal-hero-content ng-scope" ng-include="&#39;/views/partials/mocktest/pack-release-plan.html&#39;"><div class="hero-content-inner ng-scope">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="alert alert-warning">
<ul>
<!-- ngRepeat: text in notificationTextArr --><li ng-repeat="text in notificationTextArr" class="ng-binding ng-scope">Check the test release and expiry date by clicking on the Test Release Plan link for all exams.</li><!-- end ngRepeat: text in notificationTextArr -->
</ul>
</div>
<!-- ngRepeat: (index, category) in extraFeatures track by $index -->
</div>
</div>
</div></div>
</div>
</div>
<div class="modal-hero js-test-release-plan ng-scope" ng-class="statusClass" ng-controller="testPackCtrl" tabindex="-1">
<div class="modal-hero-backdrop" ng-click="hideTestPack()"></div>
<div class="modal-hero-dialog">
<button type="button" ng-click="hideTestPack()" class="btn modal-hero-close"><span class="tb-icon tb-clear"></span>Close</button>
<!-- ngInclude: '/views/partials/mocktest/test-release-plan.html' --><div class="modal-hero-content ng-scope" ng-include="&#39;/views/partials/mocktest/test-release-plan.html&#39;"><div class="text-center ng-scope ng-hide" ng-show="testDetailsLoading">
<img style="height: 90px;" src="./Bank PO Tests _ Testbook.com_files/loader.gif">
<h4>Loading Details. Please Wait.</h4>
</div>
<div class="wrapper pad-h0 hero-content-inner no-delay ng-scope" ng-show="!testDetailsLoading">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<!-- ngRepeat: (pid, pObj) in  releasePackDetails -->
</div>
</div>
</div></div>
</div>
</div>
<div class="modal-hero js-calculate-savings ng-scope" ng-class="statusClass" tabindex="-1" ng-controller="calculateSavingsCtrl">
<div class="modal-hero-backdrop" ng-click="hideCalcSavings()"></div>
<div class="modal-hero-dialog">
<button type="button" ng-click="hideCalcSavings()" class="btn modal-hero-close"><span class="tb-icon tb-clear"></span>Close</button>
<!-- ngInclude: '/views/partials/mocktest/calculate-savings.html' --><div class="modal-hero-content ng-scope" ng-include="&#39;/views/partials/mocktest/calculate-savings.html&#39;"><div class="wrapper pad-h0 hero-content-inner ng-scope">
<div class="row">
<!-- ngIf: !isShowCalc --><div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 ng-scope" ng-if="!isShowCalc">
<h4>Calculate your Savings</h4>
<h3>Select all the exams you are appearing for</h3>
<!-- ngRepeat: course in chooseCourseUIDS -->
<!-- ngIf: isCalcBtnDisabled --><p class="text-center ng-scope" ng-if="isCalcBtnDisabled">Please select at least one exam to begin.</p><!-- end ngIf: isCalcBtnDisabled -->
<button type="button" class="btn btn-success btn-lg btn-block" ng-click="calculateSavingBtnClicked()" ng-disabled="isCalcBtnDisabled" disabled="disabled">Calculate my Savings</button>
</div><!-- end ngIf: !isShowCalc -->
<!-- ngIf: isShowCalc -->
</div>
</div></div>
</div>
</div>
<div class="modal-hero js-bundle-details" tabindex="-1">
<div class="modal-hero-backdrop" ng-click="hideBundleDetails()"></div>
<div class="modal-hero-dialog">
<button type="button" ng-click="hideBundleDetails()" class="btn modal-hero-close"><span class="tb-icon tb-clear"></span>Close</button>
<!-- ngInclude: '/views/partials/mocktest/bundleDetails.html' --><div class="modal-hero-content ng-scope" ng-include="&#39;/views/partials/mocktest/bundleDetails.html&#39;"><div class="wrapper pad-h0 hero-content-inner ng-scope">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel-group" id="accordion-bundle-details" role="tablist" aria-multiselectable="true">
<!-- ngRepeat: catObj in packToShowInfo.categorizedSortedPackTests -->
</div>
</div>
</div>
</div></div>
</div>
</div>
<div ng-controller="SubscriptionHIW" class="ng-scope">
<!-- ngInclude: '/views/partials/mocktest/subscription-helper.html' --><div class="modal fade ng-scope" id="subscription-helper" tabindex="-1" role="dialog" ng-include="&#39;/views/partials/mocktest/subscription-helper.html&#39;"><div class="modal-dialog ng-scope" role="document">
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
</div></div>
</div>
<!-- ngIf: pushInfoToAfiliates -->
<input id="curCourseURL" type="hidden" value="bank-po">
<input id="cur-course-title" type="hidden" value="Bank PO">
<input id="cur-course-id" type="hidden" value="557569e82a39650f6f395648">
<input id="mobile" type="hidden" value="">
<input id="mobile-verification-status" type="hidden" value="">
<input id="hasPractice" type="hidden" value="1">
<footer class="container-fluid">
<div class="row">
<sub-footer class="ng-isolate-scope"><!-- ngIf: isSubFooterPresent -->
</sub-footer>
<div class="col-xs-12 tb-footer">
<div class="row">
<div class="col-xs-12 tb-footer-content">
<div class="left-box">
<div class="row">
<div class="col-sm-12 fl-logo">
<img class="js-lazy-load-img" data-src="//testbook.com/assets/img/brand/logo-full-medium.png" alt="Testbook Logo">
</div>
<div class="col-sm-12 mar-t32">
<ul class="our-address">
<li>
<i class="tb-icon tb-plane" style="margin-top: 4px;"></i>
#803-805, The Landmark Building,<br>(Above Croma),
Sector 7,<br>Kharghar, Navi Mumbai - 410210
</li>
<li>
 <i class="tb-icon tb-email"></i>
<a href="mailto:support@testbook.com">support@testbook.com</a>
</li>
<li>
<i class="tb-icon tb-phone"></i>
<a href="tel:918080433233">+91-8080-433-233</a>
</li>
<li>
Office hours: 10 AM to 8 PM (Sunday Closed)
</li>
</ul>
</div>
</div>
</div>
<div class="right-box">
<div class="row">
<div class="col-xs-12 col-md-2 each-box">
<div class="fl-title">Company</div>
<div class="fl-content">
<ul class="clearfix">
<li><a href="https://testbook.com/about-us" target="_blank" rel="noopener">About Us</a></li>
<li><a href="https://testbook.com/careers" target="_blank" rel="noopener">Careers</a></li>
<li><a href="https://testbook.com/vyaktitva-testbook-leadership-initiative" target="_blank" rel="noopener">Vyaktitva</a></li>
<li><a href="https://testbook.com/partners" target="_blank" rel="noopener">Partners</a></li>
<li><a href="https://testbook.com/blog/" target="_blank" rel="noopener">Blog</a></li>
<li><a href="https://testbook.com/news" target="_blank" rel="noopener">Media</a></li>
<li><a href="https://testbook.com/sitemap" target="_blank" rel="noopener">Sitemap</a></li>
</ul>
</div>
</div>
<div class="col-xs-12 col-md-3 each-box">
<div class="fl-title">Exams</div>
<div class="fl-content">
<ul class="clearfix">
<li><a href="https://testbook.com/ibps-clerk" target="_self">IBPS Clerk</a></li>
<li><a href="https://testbook.com/ssc-chsl" target="_self">SSC CHSL</a></li>
<li><a href="https://testbook.com/ibps-po" target="_self">IBPS PO</a></li>
<li><a href="https://testbook.com/ssc-cgl" target="_self">SSC CGL</a></li>
<li><a href="https://testbook.com/scientific-assistant-imd" target="_self">Scientific Assistant (IMD)</a></li>
<li><a href="https://testbook.com/uiic-assistant" target="_self">UIIC Assistant</a></li>
<li><a href="https://testbook.com/rrb-office-assistant" target="_self">RRB Office Assistant</a></li>
<li><a href="https://testbook.com/ssc-stenographer" target="_self">SSC Stenographer</a></li>
</ul>
</div>
</div>
<div class="col-xs-12 col-md-4 each-box">
<div class="fl-title">Courses</div>
<div class="fl-content">
<ul class="f-course-list">
<li><a href="https://testbook.com/bank-po" target="_self">Bank PO</a></li>
<li><a href="https://testbook.com/bank-so" target="_self">Bank SO</a></li>
<li><a href="https://testbook.com/bank-clerk" target="_self">Bank Clerk</a></li>
<li><a href="https://testbook.com/ssc" target="_self">SSC</a></li>
 <li><a href="https://testbook.com/railways-rrb" target="_self">Railways RRB</a></li>
<li><a href="https://testbook.com/insurance" target="_self">Insurance</a></li>
<li><a href="https://testbook.com/rbi" target="_self">RBI</a></li>
<li><a href="https://testbook.com/ecil" target="_self">ECIL</a></li>
<li><a href="https://testbook.com/pspcl" target="_self">PSPCL</a></li>
<li><a href="https://testbook.com/isro" target="_self">ISRO</a></li>
</ul>
<ul class="f-course-list">
<li><a href="https://testbook.com/aptitude" target="_self">Aptitude</a></li>
<li><a href="https://testbook.com/gk-and-current-affairs" target="_self">GK &amp; CURRENT AFFAIRS</a></li>
<li><a href="https://testbook.com/bsnl-tta" target="_self">BSNL TTA</a></li>
<li><a href="https://testbook.com/delhi-police" target="_self">Delhi Police</a></li>
<li><a href="https://testbook.com/gate" target="_self">GATE</a></li>
<li><a href="https://testbook.com/ssc-je" target="_self">SSC JE</a></li>
<li><a href="https://testbook.com/cil" target="_self">CIL</a></li>
<li><a href="https://testbook.com/pnrd-assam" target="_self">PNRD ASSAM</a></li>
<li><a href="https://testbook.com/dmrc" target="_self">DMRC</a></li>
</ul>
</div>
</div>
<div class="col-xs-12 col-md-3 each-box">
<div class="row">
<div class="col-xs-12 col-sm-6 col-md-12">
<div class="fl-title">Mobile</div>
<div class="fl-content">
<a href="https://bit.ly/2ny4F0b" target="_blank" rel="noopener">
<img class="app-store-icon js-lazy-load-img" data-src="//testbook.com/assets/img/utility/google-play.png" alt="Testbook App on Google Playstore">
</a>
</div>
</div>
<div class="col-xs-12 col-sm-6 col-md-12">
<div class="fl-social-pages">
<div class="fl-title">follow us</div>
<div class="fl-content">
<ul class="fl-social">
<li><a href="https://www.facebook.com/testbookdotcom" target="_blank" rel="noopener" class="tb-fb"><i class="tb-icon tb-facebook"></i>Facebook Page</a></li>
<li><a href="https://twitter.com/testbookdotcom" target="_blank" rel="noopener" class="tb-tw"><i class="tb-icon tb-twitter"></i>Twitter Page</a></li>
<li><a href="https://plus.google.com/+Testbookdotcom/posts" target="_blank" rel="noopener" class="tb-gp"><i class="tb-icon tb-google-plus"></i>Google Plus Page</a></li>
<li><a href="https://www.linkedin.com/company/testbook-com" target="_blank" rel="noopener" class="tb-li"><i class="tb-icon tb-linkedin"></i>Linkedin Page</a></li>
<li><a href="https://www.instagram.com/testbookdotcom/" target="_blank" rel="noopener" class="tb-ig"><i class="tb-icon tb-instagram"></i>Instagram Page</a></li>
<li><a href="https://www.youtube.com/c/Testbookdotcom" target="_blank" rel="noopener" class="tb-yt"><i class="tb-icon tb-youtube"></i>Youtube Page</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="clearfix bottom-box">
<div class="text-gray-14 pull-left">© Testbook</div>
<ul class="list-inline pull-right">
<li><a href="https://testbook.com/privacy-policy" class="text-gray-9" target="_blank" rel="noopener">Privacy</a></li>
<li><a href="https://testbook.com/terms-of-service" class="text-gray-9" target="_blank" rel="noopener">Terms</a></li>
<li><a href="https://testbook.com/acceptable-use-policy" class="text-gray-9" target="_blank" rel="noopener">User Policy</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</footer>
<script defer="" src="<?php echo base_url('institute_assets/theme1/lazyload.min.js');?>"></script>

<script type="application/ld+json">
    {
    "@context": "http://schema.org",
    "@type": "Organization",
    "name" : "Testbook",
    "url": "https://testbook.com",
     "sameAs" : [
    "https://www.facebook.com/testbookdotcom",
    "https://www.twitter.com/testbookdotcom",
    "https://plus.google.com/+Testbookdotcom/posts",
    "https://www.linkedin.com/company/testbook-com",
    "https://www.instagram.com/testbookdotcom/"
    ]
    }
</script>
<script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Corporation",
      "name" : "Testbook",
      "url": "https://testbook.com",
      "logo": "https://storage.googleapis.com/testbook/static/assets/assets/img/brand/logo-full-medium.png",
      "description": "Boost your exam preparation with Testbook to crack the most popular competitive exams in India.",
  "telephone": "+918286086667",
"address": {
    "@type": "PostalAddress",
    "addressCountry":"IN",
    "addressLocality": "Kharghar, Navi Mumbai",
    "addressRegion": "Maharashtra",
    "postalCode" : "410210",
    "streetAddress": "#803-805, The Landmark Building, (Above Croma), Sector 7"
  }
  }
</script>


<script src="<?php echo base_url('institute_assets/theme1/jquery.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('institute_assets/theme1/angular.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('institute_assets/theme1/bootbox.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('institute_assets/theme1/bootstrap.min.js');?>"></script>

<?php if(isset($js_script)){?>
    <script src="<?php echo base_url('assets/js/pages/');?><?=$js_script?>.js"></script>
    <?php } ?>

<script src="<?php echo base_url('institute_assets/theme1/checkout.js');?>"></script>
<div class="razorpay-container" style="z-index: 1000000000; position: fixed; top: 0px; display: none; left: 0px; height: 100%; width: 100%; backface-visibility: hidden; overflow-y: visible;"><style>@keyframes rzp-rot{to{transform: rotate(360deg);}}@-webkit-keyframes rzp-rot{to{-webkit-transform: rotate(360deg);}}</style><div class="razorpay-backdrop" style="min-height: 100%; transition: 0.3s ease-out; position: fixed; top: 0px; left: 0px; width: 100%; height: 100%;"><span style="text-decoration: none; background: rgb(214, 68, 68); border: 1px dashed white; padding: 3px; opacity: 0; transform: rotate(45deg); transition: opacity 0.3s ease-in; font-family: lato, ubuntu, helvetica, sans-serif; color: white; position: absolute; width: 200px; text-align: center; right: -50px; top: 50px;">Test Mode</span></div><iframe style="opacity: 1; height: 100%; position: relative; background: none; display: block; border: 0 none transparent; margin: 0px; padding: 0px;" allowtransparency="true" width="100%" height="100%" src="./Bank PO Tests _ Testbook.com_files/public.html" class="razorpay-checkout-frame"></iframe></div>


<!--<script src="<?php echo base_url('institute_assets/theme1/mocktest-concat.a094e2e2edfe6e8abd0803386984a781.js')?>"></script>-->

<script src="<?php echo base_url('institute_assets/theme1/tb-sdk.59ff4676295250001bc818f3c1bffab0.js');?>"></script>

</body></html>
