  
	<!-- jQuery 3 -->
	<script src="<?php echo base_url();?>assets/vendor_components/jquery/dist/jquery.js"></script>
	
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url();?>assets/vendor_components/jquery-ui/jquery-ui.js"></script>
	
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	  $.widget.bridge('uibutton', $.ui.button);
	</script>
	<script type="text/javascript"> var BASE_URL = "<?php echo base_url();?>"; </script>
    <script type="text/javascript"> var SITE_URL = "<?php echo site_url(); ?>"; </script>
    
	<!-- popper -->
	<script src="<?php echo base_url();?>assets/vendor_components/popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap v4.0.0-beta -->
	<script src="<?php echo base_url();?>assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>
	
	<!-- Morris.js charts -->
	<script src="<?php echo base_url();?>assets/vendor_components/raphael/raphael.js"></script>
	<script src="<?php echo base_url();?>assets/vendor_components/morris.js/morris.js"></script>
	
	<!-- Sparkline -->
	<script src="<?php echo base_url();?>assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js"></script>
	
	<!-- jvectormap -->
	<script src="<?php echo base_url();?>assets/vendor_plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>	
	<script src="<?php echo base_url();?>assets/vendor_plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	
	<!-- jQuery Knob Chart -->
	<script src="<?php echo base_url();?>assets/vendor_components/jquery-knob/js/jquery.knob.js"></script>
	
	<!-- daterangepicker -->
	<script src="<?php echo base_url();?>assets/vendor_components/moment/min/moment.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<!-- datepicker -->
	<script src="<?php echo base_url();?>assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
	
	<!-- Bootstrap WYSIHTML5 -->
	<script src="<?php echo base_url();?>assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>
	
	<!-- Slimscroll -->
	<script src="<?php echo base_url();?>assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>
	
	<!-- FastClick -->
	<script src="<?php echo base_url();?>assets/vendor_components/fastclick/lib/fastclick.js"></script>
	
	<!-- maximum_admin App -->
	<script src="<?php echo base_url();?>assets/js/template.js"></script>
	
	<!-- maximum_admin dashboard demo (This is only for demo purposes) -->
	<script src="<?php echo base_url();?>assets/js/pages/dashboard.js"></script>
	
	<!-- maximum_admin for demo purposes -->
	<script src="<?php echo base_url();?>assets/js/demo.js"></script>
 <script src="<?php echo base_url('assets/js/plugins/dataTables/jquery.dataTables.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/dataTables/datatables.min.js');?>"></script>

    <script src="<?php echo base_url('assets/js/plugins/dataTables/dataTables.select.js');?>"></script>
    <!-- Alertify -->
    <script src="<?php echo base_url('assets/js/plugins/alertify/alertify.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js');?>"></script>
    <?php if(isset($js_script)){?>
    <script src="<?php echo base_url('assets/js/pages/');?><?=$js_script?>.js"></script>
    <?php } ?>
	<script>
	 $(document).ready(function() {

        $('.dataTables-example').DataTable({
                pageLength: 10,
                lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });
	 });
			</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"></script>
<script type="text/javascript">
      $('#datetimepicker').datetimepicker({
    format:'Y-m-d H:i',
});
    </script>


</body>

</html>

   