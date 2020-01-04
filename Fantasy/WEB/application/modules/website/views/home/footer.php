<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h3>About</h3>
        <p>We strive to deliver a level of service that exceeds the expectations of our customers. <br />
          <br />
          If you have any questions about our products or services, please do not hesitate to contact us. We have friendly, knowledgeable representatives available seven days a week to assist you.</p>
      </div>
      <div class="col-md-3">
        <!--<h3>Tweets</h3>-->
        <!--<p><span>Tweet</span> <a href="#">@You</a><br />-->
        <!--  Etiam egestas, ipsum posuere accumsan sollicitudin, nulla mauris volutpat sem, sit amet rutrum risus. </p>-->
        <!--<p><span>Tweet</span> <a href="#">@You</a><br />-->
        <!--  Quisque porta tellus vitae adipiscing molestie. Mauris et lacus blandit, malesuada.</p>-->
      </div>
      <div class="col-md-3">
        <h3>Mailing list</h3>
        <p>Subscribe to our mailing list for offers, news updates and more!</p>
        <br />
        <form action="#" method="post" class="form-inline" role="form">
          <div class="form-group">
            <label class="sr-only" for="exampleInputEmail2">your email</label>
            <input type="email" class="form-control form-control-lg" id="exampleInputEmail2" placeholder="your email">
          </div>
          <button type="submit" class="btn btn-primary btn-md">subscribe</button>
        </form>
      </div>
      <div class="col-md-3">
        <h3>Gmail</h3>
        <p>cricaddaonline@gmail.com<br />
          <br />
          <!--Phone: (888) 123-4567<br />-->
         
          <br />
        </p>
        <div class="social__icons"> <a href="#" class="socialicon socialicon-twitter"></a> <a href="#" class="socialicon socialicon-facebook"></a> <a href="#" class="socialicon socialicon-google"></a> <a href="#" class="socialicon socialicon-mail"></a> </div>
      </div>
    </div>
  </div>
</footer>
<p class="text-center copyright">&copy; Copyright CRICADDA Company. All Rights Reserved.</p>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script type="text/javascript" src="<?php echo base_url('home_assets/js/jquery.min.js'); ?>"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?php echo base_url('home_assets/js/bootstrap.min.js'); ?>"></script> 
<script type="text/javascript">
$('.carousel').carousel({
  interval: 3500, // in milliseconds
  pause: 'none' // set to 'true' to pause slider on mouse hover
})
</script>


<script type="text/javascript">
$( "a.submenu" ).click(function() {
$( ".menuBar" ).slideToggle( "normal", function() {
// Animation complete.
});
});
$( "ul li.dropdown a" ).click(function() {
$( "ul li.dropdown ul" ).slideToggle( "normal", function() {
// Animation complete.
});
$('ul li.dropdown').toggleClass('current');
});
</script>
</body>
</html>