
<?php echo Modules::run('front_templates/front_templates/header'); ?>
<?php echo Modules::run('front_templates/front_templates/menu'); ?>
	 
<!-- START CONTENT -->
<div class="content">
  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Transaksi</h1>
      <ol class="breadcrumb">
	   <li><a href="index.html">Transaksi Pemesanan</a></li>
        <li class="active">Purchase Order Pemesanan</li>
      </ol>
  </div>
  <!-- End Page Header -->

<!-- START CONTAINER -->
<div class="container-padding">
  <!-- Start Row -->
 <div role="tabpanel">

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs nav-line" role="tablist">
                    <li role="presentation" class="active"><a href="#ponoapprove" aria-controls="ponoapprove" role="tab" data-toggle="tab">PO Non Approved</a></li>
                    <li role="presentation"><a href="#poapproved" aria-controls="poapproved" role="tab" data-toggle="tab">Po Approved</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="ponoapprove">
                      <!-- Start Row -->
  <div class="row">
    <!-- Start Panel -->
    <div class="col-lg-17">
      <div class="panel panel-default">
        <div class="panel-title">
         Data PO Belum Diapproved
        </div>
        <div class="panel-body table-responsive">
            <table id="example0" class="table display">
                <thead>
                    <tr>
						<th>ID PO</th>
                        <th>Nomor PO</th>
                        <th>Tanggal PO</th>
                        <th>Nomor Reff</th>
                        <th>Pelanggan</th>
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
						<td>Reff -8897</td>
                        <td>Pa Rony</td>
						<td> <a href="#" data-toggle="modal" data-target="#myModalDetail"   class="btn btn-square btn-warning"><i class="fa fa-edit"></i>Detail</a></td>
						<td> <a href="#" data-toggle="modal" data-target="#myModalPrint"    class="btn btn-square btn-info"><i class="fa fa-print"></i>Print</a></td>
						<td> <a href="#" data-toggle="modal" data-target="#myModalApproved" class="btn btn-square btn-success"><i class="fa fa-check"></i>Approved</a></td>
                    </tr>
            </table>
        </div>
      </div>
    </div>
    <!-- End Panel -->
  </div>
  <!-- End Row -->
  </div>
  
  <div role="tabpanel" class="tab-pane" id="poapproved">
  <div class="row">
    <!-- Start Panel -->
    <div class="col-lg-17">
      <div class="panel panel-default">
        <div class="panel-title">
         Data PO Sudah Diapproved
        </div>
        <div class="panel-body table-responsive">
            <table id="example1" class="table display">
                <thead>
                    <tr>
						<th>ID PO</th>
                        <th>Nomor PO</th>
                        <th>Tanggal PO</th>
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
						<td> <a href="#" data-toggle="modal" data-target="#myModalDetail" class="btn btn-square btn-warning"><i class="fa fa-edit"></i>Detail</a>
						</td>
						<td> <a href="#" data-toggle="modal" data-target="#myModalPrint" class="btn btn-square btn-info"><i class="fa fa-print"></i>Print</a>
						</td>
						<td> <a href="#" data-toggle="modal" data-target="#myModalRollback" class="btn btn-square btn-danger"><i class="fa fa-rotate-left"></i>Rollback</a>
						</td>
                    </tr>
					<tr>
                        <td>001</td>
                        <td>PA-001</td>
                        <td>2011/04/25</td>
							<td> <a href="#" data-toggle="modal" data-target="#myModalDetail" class="btn btn-square btn-warning"><i class="fa fa-edit"></i>Detail</a>
						</td>
						<td> <a href="#" data-toggle="modal" data-target="#myModalPrint" class="btn btn-square btn-info"><i class="fa fa-print"></i>Print</a>
						</td>
						<td> <a href="#" data-toggle="modal" data-target="#myModalRollback" class="btn btn-square btn-danger"><i class="fa fa-rotate-left"></i>Rollback</a>
						</td>
						</td>
                    </tr>
            </table>
        </div>
      </div>
    </div>
    <!-- End Panel -->
  </div>
  <!-- End Row -->
                    </div>
                  </div>
                </div>  
  <!-- End Row -->
</div>
<!-- END CONTAINER -->

 <!-- Modal Konfirmasi -->
            <div class="modal fade" id="myModalApproved" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Form Konfirmasi</h4>
                  </div>
                  <div class="modal-body">
                    Anda Akan Mengaproved Dokument PO ini?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-default">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
<!-- Modal Konfirmasi -->

<!-- Modal Konfirmasi RollBack-->
            <div class="modal fade" id="myModalRollback" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Form Konfirmasi</h4>
                  </div>
                  <div class="modal-body">
                    Anda Akan Merollback Document ini?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-default">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
<!-- Modal Konfirmasi RollBack-->

<!-- Modal Konfirmasi Print -->
            <div class="modal fade" id="myModalPrint" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Konfirmasi Print</h4>
                  </div>
                  <div class="modal-body">
                    Apakah Anda Akan Mengeprint Document ini?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-info">Print</button>
                  </div>
                </div>
              </div>
            </div>
<!-- Modal Konfirmasi Print -->

<!-- Modal Add Detail Data -->
            <div class="modal fade" id="myModalDetail" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Detail Informasi PO</h4>
                  </div>
                  <div class="modal-body">
					<div class="panel-body">
			        <div class="panel-body">
        
					<div role="tabpanel">

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs tabcolor9-bg" role="tablist">
                    <li role="presentation" class="active">
					<a href="#datautama" aria-controls="datautama" role="tab" data-toggle="tab">:::Data Utama:::</a></li>
                    <li role="presentation"><a href="#datadetail" aria-controls="datadetail" role="tab" data-toggle="tab">:::Data Barang Detail:::</a></li>
                  </ul>

           <!-- Tab panes -->
           <div class="tab-content">
           <div role="tabpanel" class="tab-pane active" id="datautama">
           <form class="form-horizontal">
		   
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Nomor Po</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"  disabled>
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Tanggal Po</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"  disabled>
                  </div>
            </div>
		   
		   
		   <div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Nomor Reff</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002" disabled>
                  </div>
            </div>
		   
		   	<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Pelanggan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"  disabled>
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Metode Pembayaran</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"  disabled>
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Dari Rekening</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"  disabled>
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">No Rekening</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"  disabled>
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Asal Bank</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"   disabled>
                  </div>
            </div>
			
			<div class="form-group">
                  <label class="col-sm-2 control-label form-label">Keterangan</label>
                  <div class="col-sm-10">
                      <textarea class="form-control" rows="3" id="textarea1"disabled></textarea>
                  </div>
            </div>
       </form> 
</div>
        
		<div role="tabpanel" class="tab-pane" id="datadetail">
		 <form class="form-horizontal">
            Data Barang Add Row
			
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
<script>
$(document).ready(function() {
    $('#example1').DataTable();
} );
</script>