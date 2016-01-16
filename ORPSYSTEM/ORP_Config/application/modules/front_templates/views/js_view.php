<!-- ================================================
jQuery Library
================================================ -->
<script type="text/javascript" src="<?php echo base_url()?>front_assets/js/jquery.min.js"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="<?php echo base_url()?>front_assets/js/bootstrap/bootstrap.min.js"></script>

<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
<script type="text/javascript" src="<?php echo base_url()?>front_assets/js/plugins.js"></script>

<!-- ================================================
Bootstrap Select
================================================ -->
<script type="text/javascript" src="<?php echo base_url()?>front_assets/js/bootstrap-select/bootstrap-select.js"></script>

<!-- ================================================
Bootstrap Toggle
================================================ -->
<script type="text/javascript" src="<?php echo base_url()?>front_assets/js/bootstrap-toggle/bootstrap-toggle.min.js"></script>



<!-- ================================================
Easy Pie Chart
================================================ -->
<!-- main file -->
<script type="text/javascript" src="<?php echo base_url()?>front_assets/js/easypiechart/easypiechart.js"></script>
<!-- demo codes -->
<script type="text/javascript" src="<?php echo base_url()?>front_assets/js/easypiechart/easypiechart-plugin.js"></script>


<!-- ================================================
Moment.js
================================================ -->
<script type="text/javascript" src="<?php echo base_url()?>front_assets/js/moment/moment.min.js"></script>


<script type="text/javascript" src="<?php echo base_url()?>front_assets/js/date-range-picker/daterangepicker.js"></script>

<!-- Basic Date Range Picker -->
<script type="text/javascript">
$(document).ready(function() {
  $('#date-range-picker').daterangepicker(null, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
});
</script>


