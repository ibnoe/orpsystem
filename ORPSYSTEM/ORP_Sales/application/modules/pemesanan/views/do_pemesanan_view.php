
<?php echo Modules::run('front_templates/front_templates/header'); ?>
<?php echo Modules::run('front_templates/front_templates/menu'); ?>
	 
<!-- START CONTENT -->
<div class="content">
  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Transaksi</h1>
      <ol class="breadcrumb">
	   <li><a href="index.html">Transaksi Pemesanan</a></li>
        <li class="active">Delivery Order Pemesanan</li>
      </ol>
  </div>
  <!-- End Page Header -->

<!-- START CONTAINER -->
<div class="container-padding">
  <!-- Start Row -->
 <div role="tabpanel">

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs nav-line" role="tablist">
                    <li role="presentation" class="active"><a href="#doprogress" aria-controls="home2" role="tab" data-toggle="tab">Do Progress</a></li>
                    <li role="presentation"><a href="#dorejected" aria-controls="profile2" role="tab" data-toggle="tab">Do Rejected</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="doprogress">
                      <!-- Start Row -->
  <div class="row">
    <!-- Start Panel -->
    <div class="col-lg-17">
      <div class="panel panel-default">
        <div class="panel-title">
         Data DO Progress
        </div>
        <div class="panel-body table-resdonsive">
            <table id="example0" class="table display">
                <thead>
                    <tr>
						<th>ID DO</th>
                        <th>Nomor DO</th>
                        <th>Tanggal DO</th>
                        <th>Status</th>
                        <th>Pelanggan</th>
						<th>Action</th>
						<th>Action</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>002</td>
                        <td>PA-001</td>
                        <td>2011/04/25</td>
						<td>On Progress</td>
                        <td>Pa Rony</td>
						<td> <a href="#" data-toggle="modal" data-target="#myModalDetail"   class="btn btn-square btn-warning"><i class="fa fa-edit"></i>Detail</a></td>
						<td> <a href="#" data-toggle="modal" data-target="#myModalPrint"    class="btn btn-square btn-info"><i class="fa fa-print"></i>Print</a></td>
						<td> <a href="#" data-toggle="modal" data-target="#myModalCancel" class="btn btn-square btn-danger"><i class="fa fa-close"></i>Cancel</a></td>
                    </tr>
					 <tr>
                        <td>001</td>
                        <td>PA-001</td>
                        <td>2011/04/25</td>
						<td>Pending</td>
                        <td>Imam Mudzakir</td>
						<td> <a href="#" data-toggle="modal" data-target="#myModalDetail"   class="btn btn-square btn-warning"><i class="fa fa-edit"></i>Detail</a></td>
						<td> <a href="#" data-toggle="modal" data-target="#myModalPrint"    class="btn btn-square btn-info"><i class="fa fa-print"></i>Print</a></td>
						<td> <a href="#" data-toggle="modal" data-target="#myModalCancel" class="btn btn-square btn-danger"><i class="fa fa-close"></i>Cancel</a></td>
                    </tr>
				</tbody>
            </table>
        </div>
      </div>
    </div>
    <!-- End Panel -->
  </div>
  <!-- End Row -->
  </div>
  
  <div role="tabpanel" class="tab-pane" id="dorejected">
  <div class="row">
    <!-- Start Panel -->
    <div class="col-lg-17">
      <div class="panel panel-default">
        <div class="panel-title">
         Data Do Rejected
        </div>
        <div class="panel-body table-resdonsive">
            <table id="example1" class="table display">
                <thead>
                    <tr>
						<th>ID do</th>
                        <th>Nomor do</th>
                        <th>Tanggal do</th>
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
                    </tr>
					<tr>
                        <td>001</td>
                        <td>PA-001</td>
                        <td>2011/04/25</td>
							<td> <a href="#" data-toggle="modal" data-target="#myModalDetail" class="btn btn-square btn-warning"><i class="fa fa-edit"></i>Detail</a>
						</td>
						<td> <a href="#" data-toggle="modal" data-target="#myModalPrint" class="btn btn-square btn-info"><i class="fa fa-print"></i>Print</a>
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
            <div class="modal fade" id="myModalCancel" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Form Konfirmasi</h4>
                  </div>
                  <div class="modal-body">
                    Anda Akan Mencancel Proses DO ini?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-default">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
<!-- Modal Konfirmasi -->


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
                    <h4 class="modal-title">Detail Informasi do</h4>
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
                  <label for="input002" class="col-sm-2 control-label form-label">Nomor do</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"  disabled>
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Tanggal do</label>
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
                  <label for="input002" class="col-sm-2 control-label form-label">Klient</label>
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