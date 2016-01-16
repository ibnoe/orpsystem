<?php echo Modules::run('front_templates/front_templates/header'); ?>
<?php echo Modules::run('front_templates/front_templates/menu'); ?>
    <!-- Delete Data -->

<div id="list_data"></div>
    
   
<!-- END CONTAINER -->
<!-- START SIDEPANEL -->
<?php echo Modules::run('front_templates/front_templates/notification'); ?>
<!-- END SIDEPANEL -->
<?php echo Modules::run('front_templates/front_templates/js_master'); ?>

<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
<script type="text/javascript" src="<?php echo base_url() ?>front_assets/js/plugins.js"></script>

<!-- ================================================
Sweet Alert
================================================ -->
<script src="<?php echo base_url() ?>front_assets/js/sweet-alert/sweet-alert.min.js"></script>

<!-- ================================================
Kode Alert
================================================ -->
<script src="<?php echo base_url() ?>front_assets/js/kode-alert/main.js"></script>


<script>
	var loading ='<div align="center" class="loading"><img src="<?php echo base_url()?>front_assets/img/loading.gif"/></div>';
	
	$( document ).ready(function() {
		//alert(loading);
		//$('#list_data').html(loading);
		reloadlist();
	});	
	
	function reloadlist(){
		$.post("<?php echo $link?>",function(data) 
		{
			$('#list_data').html(data);
			$('#data_table').dataTable({
				oLanguage: {
					sLoadingRecords: '<img src="<?php echo base_url()?>front_assets/img/loading.gif">'
				}					
			});
		});
	}
</script>