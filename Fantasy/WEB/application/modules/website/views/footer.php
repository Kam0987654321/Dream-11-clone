 
  <script src="<?php echo base_url('design/lib/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('design/lib/bootstrap/js/bootstrap.min.js'); ?> "></script>   
  <script src="<?php echo base_url('design/lib/bootstrap/js/popper.min.js'); ?> "></script>
  <script>
  </script>
  <script src="<?php echo base_url('design/js/main.js'); ?>"></script>
</body>

</html>

<script type="text/javascript">
	  function openCity(evt, cityName) {
      //	cityName.addClass("tabItemSelected_765ac");
      	alert(cityName);   
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabs_match");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none"; 
        }
        tablinks = document.getElementsByClassName("siteTabText_ce5fe");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace("active", "");
          tablinks[i].className = tablinks[i].className.replace("tabItemSelected_765ac", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active tabItemSelected_765ac siteTabText_ce5fe";
      }
</script>
