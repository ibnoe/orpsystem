
<?php echo Modules::run('front_templates/front_templates/header'); ?>
<?php echo Modules::run('front_templates/front_templates/menu'); ?>
	  

<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Transaksi</h1>
      <ol class="breadcrumb">
	   <li><a href="index.html">Transaksi</a></li>
        <li class="active">Transaksi Pengadaan</li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a data-toggle="modal" data-target="#myModalAdd" class="btn btn-option1 btn-xl"><i class="fa fa-plus"></i>Add New</a>
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->



<!-- START CONTAINER -->
<div class="container-padding">
  <!-- Start Row -->
  <div class="row">
    <!-- Start Panel -->
    <div class="col-lg-17">
      <div class="panel panel-default">
        <div class="panel-title">
         Data Pengadaan
        </div>
        <div class="panel-body table-responsive">
            <table id="example0" class="table display">
                <thead>
                    <tr>
						<th>ID Pengadaan</th>
                        <th>Nomor Pengadaan</th>
                        <th>Tanggal Pengadaan</th>
                        <th>Nomor Reff</th>
                        <th>Supplier</th>
						<th>Action</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>PA-001</td>
                        <td>2011/04/25</td>
						<td>Reff -8897</td>
                        <td>Supplier PT Bintang Asia</td>
						<td> <a href="#" data-toggle="modal" data-target="#myModalEdit" class="btn btn-option5"><i class="fa fa-edit"></i>Detail</a></td>
						<td> <a href="#" id="button6" data-toggle="modal" data-target="#myModalDelete" class="btn btn-info"><i class="fa fa-print"></i>Print</a></td>
                    </tr>
            </table>
        </div>
      </div>
    </div>
    <!-- End Panel -->
  </div>
  <!-- End Row -->
</div>
<!-- END CONTAINER -->



<!-- Modal Add New -->
            <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add New Data</h4>
                  </div>
                  <div class="modal-body">
            <div class="panel-body">
			        <div class="panel-body">
        
                <div role="tabpanel">

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs tabcolor6-bg" role="tablist">
                    <li role="presentation" class="active"><a href="#home10" aria-controls="home10" role="tab" data-toggle="tab">:::Data Utama:::</a></li>
                    <li role="presentation"><a href="#profile10" aria-controls="profile10" role="tab" data-toggle="tab">:::Data Barang Detail:::</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home10">
           <form class="form-horizontal">
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Nomor Pengadaan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Tanggal Pengadaan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
		   
		   
		   <div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Nomor Reff</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
		   
		   		   <div class="form-group">
                    <label for="input4" class="col-sm-2 control-label form-label">Supplier</label>
                  <div class="col-sm-10">
                    <select class="selectpicker" data-style="btn-primary">
                        <option>ID 001</option>
                        <option>ID 002</option>
                        <option>ID 003</option>
                      </select>                  
                  </div>
            </div>
       </form> 
</div>
        
		<div role="tabpanel" class="tab-pane" id="profile10">
		 <form class="form-horizontal">
            <div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Nama Barang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>

			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Jumlah Barang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Gudang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Ukuran</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="textarea" class="form-control" id="input002">
                  </div>
            </div>
			
                    </div>
                  </div>

                </div>              

            </div>
 </form>
            </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
<!-- Modal Add New -->



<!-- Modal Add Detail Data -->
            <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Detail</h4>
                  </div>
                  <div class="modal-body">
            <div class="panel-body">
			        <div class="panel-body">
        
                <div role="tabpanel">

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs tabcolor6-bg" role="tablist">
                    <li role="presentation" class="active"><a href="#datapengadaan" aria-controls="home10" role="tab" data-toggle="tab">:::Data Utama:::</a></li>
                    <li role="presentation"><a href="#databarang" aria-controls="profile10" role="tab" data-toggle="tab">:::Data Barang Detail:::</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="datapengadaan">
           <form class="form-horizontal">
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Nomor Pengadaan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"  placeholder="Disable Input" disabled>
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Tanggal Pengadaan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"  placeholder="Disable Input" disabled>
                  </div>
            </div>
		   
		   
		   <div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Nomor Reff</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"  placeholder="Disable Input" disabled>
                  </div>
            </div>
		   
		   		    <div class="form-group">
                    <label for="input4" class="col-sm-2 control-label form-label">Supplier</label>
                  <div class="col-sm-10">
                    <select class="selectpicker" data-style="btn-primary">
                        <option>ID 001</option>
                        <option>ID 002</option>
                        <option>ID 003</option>
                      </select>                  
                  </div>
            </div>
       </form> 
</div>
        
		<div role="tabpanel" class="tab-pane" id="databarang">
		 <form class="form-horizontal">
            <div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Nama Barang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"  placeholder="Disable Input" disabled>
                  </div>
            </div>

			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Jumlah Barang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"  placeholder="Disable Input" disabled>
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Gudang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"  placeholder="Disable Input" disabled>
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Ukuran</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"  placeholder="Disable Input" disabled>
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="textarea" class="form-control" id="input002"  placeholder="Disable Input" disabled>
                  </div>
            </div>
			
                    </div>
                  </div>

                </div>              

            </div>
 </form>
            </div>
                  </div>
                </div>
              </div>
            </div>
<!-- Modal Add Detail Data -->


<!-- Print Data -->
            <div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmation Print</h4>
                  </div>
                  <div class="modal-body">
                    Are You Sure To Print This Item
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-info">Print</button>
                  </div>
                </div>
              </div>
            </div>
<!-- Print Data -->

<!-- FOOTER-->
<?php echo Modules::run('front_templates/front_templates/footer'); ?>
<!-- FOOTER-->
</div>
<!-- END CONTAINER -->
<!-- End Content -->
<!-- START SIDEPANEL -->
<?php echo Modules::run('front_templates/front_templates/notification'); ?>
<!-- END SIDEPANEL -->
<?php echo Modules::run('front_templates/front_templates/js_master'); ?>

<script>
$(document).ready(function() {
    $('#example0').DataTable();
} );
</script>