<?php echo Modules::run('front_templates/front_templates/header'); ?>
<?php echo Modules::run('front_templates/front_templates/menu'); ?>
	  

<!-- START CONTENT -->
<div class="content" style="min-height:650px">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Stock Report</h1>
      <ol class="breadcrumb">
          <li><a href="#">Report</a></li>
        <li class="active">Report Form</li>
      </ol>
  </div>
  <!-- End Page Header -->



<!-- START CONTAINER -->
<div class="container-padding">

  <!-- Start Row -->
  <div class="row">
           <div class="col-lg-12">
				<div class="panel panel-default">
        <div class="panel-title">
          Report Sample
        </div>
            <div class="panel-body">
             <!-- Start Chart -->
    <div class="col-lg-12 col-md-2">
      <div class="panel panel-default">
        <div class="panel-title">
          Sample Report
        </div>
            <div class="panel-body">
              <div id="chartist-line" class="ct-chart ct-perfect-fourth"></div>
            </div>
      </div>
    </div>
    <!-- End Chart -->
		</div>
     

<!-- FOOTER-->
<?php echo Modules::run('front_templates/front_templates/footer'); ?>
<!-- FOOTER-->
</div>
<!-- END CONTAINER -->
<!-- START SIDEPANEL -->
<?php echo Modules::run('front_templates/front_templates/notification'); ?>
<!-- END SIDEPANEL -->



<!-- ================================================
jQuery Library
================================================ -->
<script type="text/javascript" src="<?php echo base_url()?>front_assets/js/jquery.min.js"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="<?php echo base_url()?>front_assets/js/bootstrap/bootstrap.min.js"></script>

<!-- ================================================
Plugin.js/ - Some Specific js/ codes for Plugin Settings
================================================ -->
<script type="text/javascript"src="<?php echo base_url()?>front_assets/js/plugins.js"></script>

<!-- ================================================
Flot Chart
================================================ -->
<!-- main file -->
<script type="text/javascript"src="<?php echo base_url()?>front_assets/js/flot-chart/flot-chart.js"></script>
<!-- time.js/ -->
<script type="text/javascript"src="<?php echo base_url()?>front_assets/js/flot-chart/flot-chart-time.js"></script>
<!-- stack.js/ -->
<script type="text/javascript"src="<?php echo base_url()?>front_assets/js/flot-chart/flot-chart-stack.js"></script>
<!-- pie.js/ -->
<script type="text/javascript"src="<?php echo base_url()?>front_assets/js/flot-chart/flot-chart-pie.js"></script>
<!-- demo codes -->
<script type="text/javascript"src="<?php echo base_url()?>front_assets/js/flot-chart/flot-chart-plugin.js"></script>

<!-- ================================================
Chartist
================================================ -->
<!-- main file -->
<script type="text/javascript"src="<?php echo base_url()?>front_assets/js/chartist/chartist.js"></script>
<!-- demo codes -->
<script type="text/javascript"src="<?php echo base_url()?>front_assets/js/chartist/chartist-plugin.js"></script>

<!-- ================================================
Easy Pie Chart
================================================ -->
<!-- main file -->
<script type="text/javascript"src="<?php echo base_url()?>front_assets/js/easypiechart/easypiechart.js"></script>
<!-- demo codes -->
<script type="text/javascript"src="<?php echo base_url()?>front_assets/js/easypiechart/easypiechart-plugin.js"></script>

<!-- ================================================
Sparkline
================================================ -->
<!-- main file -->
<script type="text/javascript"src="<?php echo base_url()?>front_assets/js/sparkline/sparkline.js"></script>
<!-- demo codes -->
<script type="text/javascript"src="<?php echo base_url()?>front_assets/js/sparkline/sparkline-plugin.js"></script>

<!-- ================================================
Rickshaw
================================================ -->
<!-- d3 -->
<script src="<?php echo base_url()?>front_assets/js/rickshaw/d3.v3.js"></script>
<!-- main file -->
<script src="<?php echo base_url()?>front_assets/js/rickshaw/rickshaw.js"></script>
<!-- demo codes -->
<script src="<?php echo base_url()?>front_assets/js/rickshaw/rickshaw-plugin.js"></script>











