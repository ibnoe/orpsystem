<?php echo Modules::run('front_templates/front_templates/header'); ?>
<?php echo Modules::run('front_templates/front_templates/menu'); ?>
<link href="<?php echo base_url() ?>front_assets/library/gb/greybox.css" rel="stylesheet">
<script src="<?php echo base_url() ?>front_assets/library/gb/greybox.js"></script>
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
                <li role="presentation"><a href="#poapproved" aria-controls="poapproved" role="tab" data-toggle="tab">PO Approved</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="ponoapprove">
                    <!-- Start Row -->
                    <div class="row">
                        <!-- Start Panel -->
                        <div class="col-lg-17">
                            <div class="panel panel-default">
                                <div class="panel-title">Data PO Belum Diapproved</div>
                                <div class="panel-body table-responsive">
                                    <table id="poTableNonApproved" class="table display">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nomor PO</th>
                                                <th>Tanggal</th>
                                                <th>Pelanggan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                <th>Proses PO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $ids=1;
                                        foreach ($quotationsalesdisapproved as $row) {
                                        ?>
                                            <tr>
                                                <td><?php echo $ids ?></td>
                                                <td><?php echo $row['nomor'] ?></td>
                                                <td><?php echo Tanggal::formatDate($row['tanggal']) ?></td>
                                                <td><?php echo $row->pelanggan['namapelanggan'] ?></td>
                                                <td><?php echo $row->refstatus['status'] ?></td>
                                                <td>
                                                    <a onclick="edit(<?php echo $row['idquotationsales'] ?>)" data-toggle="tooltip" data-target="#myModalUpdate" class="btn btn-option5" data-placement="top" data-original-title="Klik Untuk Melihat Detil"><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo base_url() ?>index.php/pemesanan/po_pemesanan/delete/<?php echo $row['idquotationsales'] ?>" data-toggle="tooltip" data-placement="top" data-original-title="Klik Untuk Menghapus Data" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data Penawaran ini?')"><i class="fa fa-trash"></i></a> 
                                                    <a href="#" onclick="cetak(<?php echo $row['idquotationsales'] ?>)" class="btn btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Klik Untuk Cetak"><i class="fa fa-print"></i></a>
                                                </td>
                                                <td>
                                                    <?php if(trim($row['idrefstatus'])==2) { ?>
                                                    <a href="<?php echo base_url() ?>index.php/pemesanan/po_pemesanan/batal/<?php echo $row['idquotationsales'] ?>" onclick="return confirm('Anda Yakin Ingin Membatalkan Data PO ini?')"  class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Klik Untuk Membatalkan PO"><i class="fa fa-close"></i></a>
                                                    <a href="<?php echo base_url() ?>index.php/pemesanan/po_pemesanan/proses/<?php echo $row['idquotationsales'] ?>" onclick="return confirm('Anda Yakin Ingin Memproses Data PO ini?')" class="btn btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Klik Untuk Menyetujui PO"><i class="fa fa-check"></i></a>
                                                    <?php } else { ?>
                                                    -
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php
                                            $ids++;
                                        }
                                        ?>
                                        </tbody>
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
                                <div class="panel-title">Data PO Sudah Diapproved</div>
                                <div class="panel-body table-responsive">
                                    <table id="poTableApproved" class="table display">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nomor PO</th>
                                                <th>Tanggal</th>
                                                <th>Pelanggan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                <th>Proses PO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $ids=1;
                                        foreach ($quotationsalesapproved as $row) {
                                        ?>
                                            <tr>
                                                <td><?php echo $ids ?></td>
                                                <td><?php echo $row['nomor'] ?></td>
                                                <td><?php echo Tanggal::formatDate($row['tanggal']) ?></td>
                                                <td><?php echo $row->pelanggan['namapelanggan'] ?></td>
                                                <td><?php echo $row->refstatus['status'] ?></td>
                                                <td width="25%">
                                                    <a onclick="edit(<?php echo $row['idquotationsales'] ?>)" data-toggle="tooltip" data-target="#myModalUpdate" class="btn btn-option5" data-placement="top" data-original-title="Klik Untuk Melihat Detil"><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo base_url() ?>index.php/pemesanan/po_pemesanan/delete/<?php echo $row['idquotationsales'] ?>" data-toggle="tooltip" data-placement="top" data-original-title="Klik Untuk Menghapus Data" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data Penawaran ini?')"><i class="fa fa-trash"></i></a> 
                                                    <a href="#" onclick="cetak(<?php echo $row['idquotationsales'] ?>)" class="btn btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Klik Untuk Cetak"><i class="fa fa-print"></i></a>
                                                </td>
                                                <td width="22%">
                                                    <?php if(trim($row['idrefstatus'])==4) { ?>
                                                    <a href="<?php echo base_url() ?>index.php/pemesanan/po_pemesanan/rollback/<?php echo $row['idquotationsales'] ?>" onclick="return confirm('Anda Yakin Ingin Rollback Data PO ini?')"  class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Klik Untuk Rollback PO"><i class="fa fa-rotate-left"></i></a>
                                                    <a href="<?php echo base_url() ?>index.php/pemesanan/po_pemesanan/batalapproved/<?php echo $row['idquotationsales'] ?>" onclick="return confirm('Anda Yakin Ingin Membatalkan Data PO ini?')"  class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Klik Untuk Tidak Menyetujui PO"><i class="fa fa-close"></i></a>
                                                    <a href="<?php echo base_url() ?>index.php/pemesanan/po_pemesanan/prosesapproved/<?php echo $row['idquotationsales'] ?>" onclick="return confirm('Anda Yakin Ingin Memproses Data PO ini?')" class="btn btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Klik Untuk Melanjutkan PO"><i class="fa fa-check"></i></a>
                                                    <?php } else { ?>
                                                    -
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php
                                            $ids++;
                                        }
                                        ?>
                                        </tbody>    
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

<!-- Modal Add Update -->
    <div class="modal fade" id="myModalUpdate" tabindex="-1" role="dialog" aria-hidden="true">
        <input type="hidden" id="hididquotationsales" />
        <div class="modal-dialog modal-lg">
            <div class="modal-content " >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Detil Data</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-body">
                        <div class="panel-body">
                            <form id="formUpdate" class="form-horizontal" method="post" action="<?php echo base_url() ?>index.php/quotation/quotation/update">

                                <div role="tabpanel">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs tabcolor8-bg" role="tablist">
                                        <li role="presentation" class="active"><a href="#PO1Update" aria-controls="PO1Update" role="tab" data-toggle="tab">:::Penawaran:::</a></li>
                                        <li role="presentation"><a href="#PO2Update" aria-controls="PO2Update" role="tab" data-toggle="tab">:::Detil Barang:::</a></li>
                                    </ul>
                                    <!-- Nav tabs -->

                                    <!-- Tab panes -->
                                    <div class="tab-content">

                                        <div role="tabpanel" class="tab-pane active" id="PO1Update">
                                            <div class="form-group">
                                                <label for="nomor" class="col-sm-2 control-label form-label">Nomor Quotation</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nomordoupdate" name="nomor" disabled="true">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal" class="col-sm-2 control-label form-label">Tanggal</label>
                                                <div class="col-sm-10">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="input-prepend input-group">
                                                                <span class="add-on input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" id="date-picker-update" class="form-control date-picker" name="tanggal" value="<?php echo date('d-m-Y') ?>" disabled="true"/> 
                                                            </div>
                                                            <br/> <sup>)*Tgl-Bln-Thn</sup>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="idpelangganupdate" class="col-sm-2 control-label form-label">Pelanggan</label>
                                                <div class="col-sm-10">
                                                    <div class="col-xs-12" style="text-align: left">
                                                    <select name="idpelanggan" id="idpelangganupdate" class="selectpicker" data-live-search="true" disabled="true">
                                                        <?php foreach ($this->orm->pelanggan() as $row) { ?>
                                                            <option value="<?php echo $row['idpelanggan'] ?>"> <?php echo $row['namapelanggan'] ?> </option>
                                                        <?php } ?>    
                                                    </select>
                                                    </div>  
<!--                                                    <div class="col-xs-6" style="text-align: left"><a href="#" onclick="tambahPelanggan()" class="btn btn-primary btn-xs" >Tambah Data Pelanggan</a></div>-->
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="idrefjenispembayaranupdate" class="col-sm-2 control-label form-label">Jenis Pembayaran</label>
                                                <div class="col-sm-10">
                                                    <div class="col-xs-12" style="text-align: left">
                                                    <select name="idrefjenispembayaran" id="idrefjenispembayaranupdate" class="selectpicker" data-live-search="true" disabled="true">
                                                        <?php foreach ($this->orm->refjenispembayaran() as $row) { ?>
                                                            <option value="<?php echo $row['idrefjenispembayaran'] ?>"> <?php echo $row['jenispembayaran'] ?> </option>
                                                        <?php } ?>    
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="dibuat_oleh_update" class="col-sm-2 control-label form-label">Dibuat Oleh</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="dibuat_oleh_update" value="<?php echo $_SESSION['user']['namalengkap'] ?>" name="dibuat_oleh" disabled="true">
                                                </div>
                                            </div>

                                        </div>

                                        <div role="tabpanel" class="tab-pane" id="PO2Update">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <hr/>
                                                        <table id="pemesanan_barang_update" width="100%">
                                                            <tr bgcolor="white">
                                                                <td width="25px"><b>|#|</b></td>
                                                                <td width="35px"><b>|No|</b></td>
                                                                <td width="330px"><b>Nama Barang</b></td>
                                                                <td width="150px"><b>Jumlah Barang</b></td>
                                                                <td width="150px"><b>Harga Jual Satuan</b></td>
                                                                <td width="350px"><b>Keterangan</b></td>
                                                            </tr>
                                                        </table>
                                                        <br/>                                                 
                                                    </td>
                                                </tr> 
                                            </table>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal" onclick="removeTrTag();">Tutup</button>
                                            <!-- <button type="submit" class="btn btn-success">Simpan</button> -->
                                        </div>

                                    </div>

                                </div>   
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Add Update -->

<?php echo Modules::run('front_templates/front_templates/footer'); ?>
</div>
<?php echo Modules::run('front_templates/front_templates/notification'); ?>
<?php echo Modules::run('front_templates/front_templates/js_master'); ?>
<script src="<?php echo base_url() ?>front_assets/js/grid/standard.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>front_assets/js/date-range-picker/daterangepicker.js"></script>
<script>
    $(document).ready(function(){
        $("#poTableNonApproved,#poTableApproved").DataTable();
    });

    function cetak(idquotationsales) {
        GB_show("Cetak Items", '<?php echo base_url() ?>index.php/pemesanan/po_pemesanan/cetak/' + idquotationsales, 500, 1080);
        $('html, body').animate({scrollTop: 0}, 'slow');
    }

    function cetakDaftar() {
        GB_show("Cetak Daftar Quotation", '<?php echo base_url() ?>index.php/pemesanan/po_pemesanan/cetakDaftar/', 500, 1080);
        $('html, body').animate({scrollTop: 0}, 'slow');
    }

    function edit(idquotation) {
        var url = "<?php echo base_url() ?>index.php/pemesanan/po_pemesanan/ajaxEdit/"+idquotation;
        $.ajax({
            type: "json",
            url: url,
        }).success(function(data) {
            $("#formUpdate").attr("action", "<?php echo base_url() ?>index.php/quotation/quotation/update/"+idquotation);
            $("#nomordoupdate").val(data.content.sales[0].nomor);
            $("#date-picker-update").val(data.content.sales[0].tanggal);
            $("#idrefjenispembayaranupdate [value='"+data.content.sales[0].idrefjenispembayaran+"']").prop("selected", true);
            $("#idpelangganupdate [value='"+data.content.sales[0].idpelanggan+"']").prop("selected", true);
            $("#dibuat_oleh_update").val(data.content.sales[0].dibuat_oleh);
                                                                    
            var obj = data.content.salesdetail;
            $.each(obj, function(i, val) {                                                                       
                $("#pemesanan_barang_update").append("<tr class='willremove'>"+
                    "<td width='25px'><input type='checkbox' size='1' name='chk' disabled='true' /></td>"+
                    "<td width='40px'><input class='form-control' type='text' size='3' id='urutan_jenis_barang_1' name='urutan_jenis_barang[]'' value='"+(i+1)+"' disabled='true' /></td>"+
                    "<td width='350px'>"+
                        "<select id='idrefbarang' name='idrefbarang[]' class='form-control' disabled='true'>"+
                            "<?php"+
                            "foreach ($this->orm->refbarang->order('idrefjenisbarang ASC') as $row) {"+
                              "echo '<option value='"+val.idrefbarang+"'>"+val.namabarangtext+"</option>';"+
                            "}"+
                            "?>"+
                        "</select>"+
                    "</td>"+
                    "<td width='150px'><input class='form-control' type='number' id='jumlahbarang' name='jumlahbarang[]' value='"+val.jumlahbarang+"' disabled='true' /></td>"+
                    "<td width='150px'><input class='form-control' type='number' id='hargasatuan' name='hargasatuan[]' value='"+val.hargasatuan+"' disabled='true' /></td>"+
                    "<td width='150px'><input class='form-control' type='text' id='keterangan_1' name='keterangan[]' value='"+val.keterangan+"' disabled='true' /></td>"+
                    "<input class='form-control' type='hidden' id='idquotationsalesdetail"+(i+1)+"' name='idquotationsalesdetail[]' value='"+val.idquotationsalesdetail+"' />"+
                    "</tr>");
            });
            $("#myModalUpdate").modal("show");
        });
    }

    function removeTrTag() {
        $("tr.willremove").remove();
    }
</script>
<link href="<?php echo base_url() ?>front_assets/css/datepicker.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url() ?>front_assets/js/bootstrap-datepicker.js"></script>