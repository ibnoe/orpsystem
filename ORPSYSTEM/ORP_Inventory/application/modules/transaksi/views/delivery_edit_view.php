
<?php echo Modules::run('front_templates/front_templates/header'); ?>
<?php echo Modules::run('front_templates/front_templates/menu'); ?>
	  

<!-- START CONTENT -->
<div class="content" style="min-height:650px">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Transaksi</h1>
      <ol class="breadcrumb">
	   <li><a href="index.html">Transaksi</a></li>
        <li class="active">Transaksi Delivery Order</li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a data-toggle="modal" data-target="#myModalAdd" class="btn btn-default btn-xl"><i class="fa fa-plus"></i>Add New</a>
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
         Data Delivery Order
        </div>
        <div class="panel-body table-responsive">
            <table id="example0" class="table display">
                <thead>
                    <tr>
						<th>ID DO</th>
                        <th>Nomor DO</th>
                        <th>Tanggal DO</th>
                        <th>Nomor PO</th>
                        <th>Nomor SO</th>
						<th>Disetujui</th>
						<th>Pelanggan</th>
						<th>Insert By</th>
						<th>Insert Date</th>
						<th>Status</th>
						<th>Action</th>
						<th>Action</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>PA-001</td>
                        <td>2011/04/25</td>
						<td>DO-8897</td>
						<td>SO-8897</td>
						<td>Ya</td>
						<td>Imam Mudzakir</td>
						<td>Sidiq Permana</td>
						<td>2011/04/25</td>
						<td>Terkirim</td>
						<td> <a href="#" data-toggle="modal" data-target="#myModalEdit" class="btn btn-option3"><i class="fa fa-edit"></i>Edit</a></td>
						<td> <a href="#" id="button6" data-toggle="modal" data-target="#myModalDelete" class="btn btn-danger"><i class="fa fa-times-circle"></i>Delete</a></td>
						<td> <a href="#" id="button6" data-toggle="modal" data-target="#myModalPrint" class="btn btn-info"><i class="fa fa-print"></i>Print</a></td>
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
                  <ul class="nav nav-tabs tabcolor5-bg" role="tablist">
                    <li role="presentation" class="active"><a href="#PO1" aria-controls="PO1" role="tab" data-toggle="tab">:::Data Utama:::</a></li>
                    <li role="presentation"><a href="#PO2" aria-controls="PO2" role="tab" data-toggle="tab">:::Data Barang Detail:::</a></li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="PO1">
           <form class="form-horizontal">
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">ID DO</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Tanggal DO</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
		   
		   
		   <div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Nomor PO</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Nomor SO</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Pelanggan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
       </form> 
</div>
        
		<div role="tabpanel" class="tab-pane" id="PO2">
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
                     <textarea class="form-control" rows="3" id="textarea1" placeholder=""></textarea>
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
                    <button type="button" class="btn btn-white"  onclick="parent.GB_hide();">Tutup</button>              
                                <input type="submit" class="btn btn-success" value="Simpan Perubahan">
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
                  <ul class="nav nav-tabs tabcolor5-bg" role="tablist">
                    <li role="presentation" class="active"><a href="#PO3" aria-controls="PO3" role="tab" data-toggle="tab">:::Data Utama:::</a></li>
                    <li role="presentation"><a href="#PO4" aria-controls="PO4" role="tab" data-toggle="tab">:::Data Barang Detail:::</a></li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="PO3">
           <form class="form-horizontal">
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">ID DO</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"disabled>
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Tanggal DO</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"disabled>
                  </div>
            </div>
		   
		   
		   <div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Nomor PO</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002" disabled>
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Nomor SO</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002" disabled>
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Pelanggan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002" disabled>
                  </div>
            </div>
       </form> 
</div>
        
		<div role="tabpanel" class="tab-pane" id="PO4">
		 <form class="form-horizontal">
            <div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Nama Barang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002" disabled>
                  </div>
            </div>

			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Jumlah Barang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"disabled>
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Gudang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"disabled>
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Ukuran</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"disabled>
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3" id="textarea1" placeholder="" disabled></textarea>
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
 </form>
            </div>
                  </div>
               
<!-- Modal Add Detail Data -->


<!-- Print Data -->
            <div class="modal fade" id="myModalPrint" tabindex="-1" role="dialog" aria-hidden="true">
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


<!-- Delete Data -->
            <div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmation Delete</h4>
                  </div>
                  <div class="modal-body">
                    Are You Sure To Delete This Data
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger">Delete</button>
                  </div>
                </div>
              </div>
            </div>
<!-- Delete Data -->


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