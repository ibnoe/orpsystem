<?php echo Modules::run('front_templates/front_templates/header'); ?>
<?php echo Modules::run('front_templates/front_templates/menu'); ?>
	  

<!-- START CONTENT -->
<div class="content" style="min-height:650px">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Stock Report</h1>
      <ol class="breadcrumb">
          <li><a href="#">Stock</a></li>
        <li class="active">Stock Report</li>
      </ol>
  </div>
  <!-- End Page Header -->



<!-- START CONTAINER -->
<div class="container-padding">

  <!-- Start Row -->
  <div class="row">
           <div class="col-md-12">
				<div class="panel panel-default">
        <div class="panel-title">
          Report Stock
        </div>
            <div class="panel-body">
              <form class="form-horizontal">
				<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
				</div>
				<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Kode Barang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
				</div>
                <div class="form-group">
                  <label class="col-sm-2 control-label form-label">Kategori</label>
				   <div class="col-sm-10">
                    <select class="selectpicker" data-style="btn-primary">
                        <option>Kategori</option>
                        <option>Kategori</option>
                        <option>Kategori</option>
                      </select> 
					</div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label form-label">Date Range</label>
				   <div class="col-sm-10">
                   <fieldset>
                    <div class="control-group">
                      <div class="controls">
                       <div class="input-prepend input-group">
                         <span class="add-on input-group-addon"><i class="fa fa-calendar"></i></span>
                         <input type="text" id="date-range-picker" class="form-control" value="03/18/2015 - 03/23/2015" /> 
                       </div>
                      </div>
                    </div>
                   </fieldset>
                </div>  
			</div>
			<div class="bottom-links" align="center">
				<a href="index.html" class="btn btn-light">Reset</a>
				<a href="index.html" class="btn btn-info">Search</a>
				</div>
				</div>
			</form>
		</div>
     

<!-- FOOTER-->
<?php echo Modules::run('front_templates/front_templates/footer'); ?>
<!-- FOOTER-->
</div>
<!-- END CONTAINER -->
<!-- End Content -->
<!-- START SIDEPANEL -->
<?php echo Modules::run('front_templates/front_templates/notification'); ?>
<!-- END SIDEPANEL -->
<!-- START SIDEPANEL -->
<?php echo Modules::run('front_templates/front_templates/js'); ?>
<!-- END SIDEPANEL -->









