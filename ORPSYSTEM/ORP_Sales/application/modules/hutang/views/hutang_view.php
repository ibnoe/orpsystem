
<?php echo Modules::run('front_templates/front_templates/header'); ?>
<?php echo Modules::run('front_templates/front_templates/menu'); ?>
	  

<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Hutang</h1>
      <ol class="breadcrumb">
	   <li><a href="index.html">Hutang Piutang</a></li>
        <li class="active">Buku Piutang</li>
      </ol>

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
         Data Buku Hutang Berjalan
        </div>
        <div class="panel-body table-responsive">
            <table id="example0" class="table display">
                <thead>
                    <tr>
						<th>ID Hutang</th>
                        <th>Nomor Hutang</th>
                        <th>Tanggal Hutang</th>
						<th>Jatuh Tempo</th>
						<th>Tanggal Bayar</th>
						<th>Pelanggan</th>
						<th>Status</th>
						<th>Action</th>
					
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>PA-001</td>
                        <td>2011/04/25</td>
						<td>2014/04/25</td>
						<td>2012/04/25</td>
                        <td>PT Bintang Asia</td>
						<td>Lunas</td>
						<td> <a href="#" data-toggle="modal" data-target="#myModalDetail" class="btn btn-option5"><i class="fa fa-edit"></i>Detail</a></td>
					
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


            <!-- Modal Konfirmasi -->
            <div class="modal fade" id="myModalLunas" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Form Konfirmasi</h4>
                  </div>
                  <div class="modal-body">
                    Anda Akan Mengganti Status Hutang ini Menjadi Lunas?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-default">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
			<!-- Modal Konfirmasi -->
			
			<!-- Modal Add Detail Data -->
            <div class="modal fade" id="myModalDetail" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                          <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Detail Proses Hutang</h4>
                  </div>
                  <div class="modal-body">
					<div class="panel-body">
			        <div class="panel-body">
        
                <div role="tabpanel">

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs tabcolor9-bg" role="tablist">
                    <li role="presentation" class="active"><a href="#datainfo" aria-controls="datainfo" role="tab" data-toggle="tab">:::Data Informasi:::</a></li>
                    <li role="presentation"><a href="#datahutang" aria-controls="datahutang" role="tab" data-toggle="tab">:::Data Hutang:::</a></li>
					<li role="presentation"><a href="#databarang" aria-controls="databarang" role="tab" data-toggle="tab">:::Data Barang:::</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="datainfo">
           <form class="form-horizontal">
		
		     <div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">No Po</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"   disabled>
                  </div>
            </div>
		
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">No Reff</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"  disabled>
                  </div>
            </div>
		   <div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Nama Klient</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"  disabled>
                  </div>
            </div>
		   
			 <div class="form-group">
                  <label class="col-sm-2 control-label form-label">Keterangan</label>
                  <div class="col-sm-10">
                      <textarea class="form-control" rows="3" id="textarea1"  disabled></textarea>
                  </div>
             </div>
       </form> 
</div>
        
		<div role="tabpanel" class="tab-pane" id="datahutang">
		 <form class="form-horizontal">
          
			
				<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Nomor Hutang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"  disabled>
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Tanggal Hutang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"   disabled>
                  </div>
            </div>
		   
		   <div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Jatuh Tempo</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"  disabled>
                  </div>
            </div>
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Metode Pembayaran</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002"   disabled>
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
                    <input type="text" class="form-control" id="input002" disabled>
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
                      <textarea class="form-control" rows="3" id="textarea1"  disabled></textarea>
                  </div>
             </div>
			
                    </div>
					<div role="tabpanel" class="tab-pane" id="databarang">
		 <form class="form-horizontal">
            <div class="form-group">
			Combo Box Add View
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