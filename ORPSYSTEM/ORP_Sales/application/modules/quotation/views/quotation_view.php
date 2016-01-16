<?php echo Modules::run('front_templates/front_templates/header'); ?>
<?php echo Modules::run('front_templates/front_templates/menu'); ?>

<link href="<?php echo base_url() ?>front_assets/library/gb/greybox.css" rel="stylesheet">
<script src="<?php echo base_url() ?>front_assets/library/gb/greybox.js"></script>

<!-- START CONTENT -->
<div class="content" style="min-height:650px">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Quotation</h1>
        <ol class="breadcrumb">
            <li><a href="#">Quotation</a></li>
            <li class="active">Daftar Penawaran Barang</li>
        </ol>

        <!-- Start Page Header Right Div -->
        <div class="right">
            <div class="btn-group" role="group" aria-label="...">
                <a data-toggle="modal" data-target="#myModalAdd" class="btn btn-info btn-xl"><i class="fa fa-plus"></i>Buat Penawaran</a>
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
                    <div class="right" style="text-align: right;">
                        <div class="btn-group" role="group" aria-label="...">
                            <a href="#" class="btn btn-danger" onclick="cetakDaftar('<?php echo $idrefstorex ?>','<?php echo $emailx ?>')"><i class="fa fa-file"></i>Cetak Laporan Daftar Penawaran</a>
                        </div>
                    </div>
                    <div class="panel-title">
                        Data Penawaran
                    </div>
                    <div class="panel-body table-responsive">
                        <table id="data_table" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Penawaran</th>
                                    <th>Tanggal</th>
                                    <th>Pelanggan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Proses Quotation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $idquotation = 1;
                                foreach ($quotationsales as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $idquotation ?></td>
                                        <td><?php echo $row['nomor'] ?></td>
                                        <td><?php echo Tanggal::formatDate($row['tanggal']) ?></td>
                                        <td><?php echo $row->pelanggan['namapelanggan'] ?></td>
                                        <td><?php echo $row->refstatus['status'] ?></td>
                                        <td>
                                            <a onclick="edit(<?php echo $row['idquotationsales'] ?>)" data-toggle="tooltip" data-target="#myModalUpdate" class="btn btn-option5" data-placement="top" data-original-title="Klik Untuk Mengedit Data"><i class="fa fa-edit"></i></a>
                                            <!--<a href="#" class="btn btn-option5" onclick="edit(<?php echo $row['idquotationsales'] ?>)" data-toggle="tooltip" data-placement="top" data-original-title="Klik Untuk Melihat Detil" ><i class="fa fa-edit"></i></a> -->
                                            <a href="<?php echo base_url() ?>index.php/quotation/quotation/delete/<?php echo $row['idquotationsales'] ?>" data-toggle="tooltip" data-placement="top" data-original-title="Klik Untuk Menghapus Data" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data Penawaran ini?')"><i class="fa fa-trash"></i></a> 
                                            <a href="#" onclick="cetak(<?php echo $row['idquotationsales'] ?>)" class="btn btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Klik Untuk Cetak Form Quotation"><i class="fa fa-print"></i></a>
                                        </td>
                                        <td>
                                            <?php if(trim($row['idrefstatus'])==1) { ?>
                                                <a href="<?php echo base_url() ?>index.php/quotation/quotation/batal/<?php echo $row['idquotationsales'] ?>" onclick="return confirm('Anda Yakin Ingin Membatalkan Data Penawaran ini?')"  class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Klik Untuk Membatalkan Proses"><i class="fa fa-close"></i></a>
                                                <a href="<?php echo base_url() ?>index.php/quotation/quotation/proses/<?php echo $row['idquotationsales'] ?>" onclick="return confirm('Anda Yakin Ingin Memproses Data Penawaran ini?')" class="btn btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Klik Untuk Memproses Ke Purchase Order"><i class="fa fa-check"></i></a>
                                            <?php } else { ?>
                                             -
                                            <?php } ?>
                                        </td>

                                    </tr>
                                <?php
                                    $idquotation++;
                                }
                                ?>    
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
        <div class="modal-dialog modal-lg" >
            <div class="modal-content " >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title " >Tambah Data Baru</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-body">
                        <div class="panel-body">
                            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>index.php/quotation/quotation/proses" >

                                <div role="tabpanel">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs tabcolor8-bg" role="tablist">
                                        <li role="presentation" class="active"><a href="#PO1" aria-controls="PO1" role="tab" data-toggle="tab">:::Penawaran:::</a></li>
                                        <li role="presentation"><a href="#PO2" aria-controls="PO2" role="tab" data-toggle="tab">:::Detil Barang:::</a></li>
                                    </ul>
                                    <!-- Nav tabs -->

                                    <!-- Tab panes -->
                                    <div class="tab-content">

                                        <div role="tabpanel" class="tab-pane active" id="PO1">
                                            <div class="form-group">
                                                <label for="nomor" class="col-sm-2 control-label form-label">Nomor Quotation</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nomordo" name="nomor">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal" class="col-sm-2 control-label form-label">Tanggal</label>
                                                <div class="col-sm-10">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="input-prepend input-group">
                                                                <span class="add-on input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" id="date-picker" class="form-control date-picker" name="tanggal" value="<?php echo date('d-m-Y') ?>"/> 
                                                            </div>
                                                            <br/> <sup>)*Tgl-Bln-Thn</sup>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="idpelanggan" class="col-sm-2 control-label form-label">Pelanggan</label>
                                                <div class="col-sm-10">
                                                    <div class="col-xs-12" style="text-align: left">
                                                    <select name="idpelanggan" id="idpelanggan" class="selectpicker" data-live-search="true">
                                                        <?php foreach ($this->orm->pelanggan() as $row) { ?>
                                                            <option value="<?php echo $row['idpelanggan'] ?>"> <?php echo $row['namapelanggan'] ?> </option>
                                                        <?php } ?>    
                                                    </select>
                                                    </div>  
<!--                                                    <div class="col-xs-6" style="text-align: left"><a href="#" onclick="tambahPelanggan()" class="btn btn-primary btn-xs" >Tambah Data Pelanggan</a></div>-->
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="idrefjenispembayaran" class="col-sm-2 control-label form-label">Jenis Pembayaran</label>
                                                <div class="col-sm-10">
                                                    <div class="col-xs-12" style="text-align: left">
                                                    <select name="idrefjenispembayaran" id="idrefjenispembayaran" class="selectpicker" data-live-search="true">
                                                        <?php foreach ($this->orm->refjenispembayaran() as $row) { ?>
                                                            <option value="<?php echo $row['idrefjenispembayaran'] ?>"> <?php echo $row['jenispembayaran'] ?> </option>
                                                        <?php } ?>    
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="dibuat_oleh" class="col-sm-2 control-label form-label">Dibuat Oleh</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="dibuat_oleh" value="<?php echo $_SESSION['user']['namalengkap'] ?>" name="dibuat_oleh">
                                                </div>
                                            </div>

                                        </div>

                                        <div role="tabpanel" class="tab-pane" id="PO2">
                                            <table>
                                                <tr>
                                                    <td id="title">
                                                        <a href="#" class="btn btn-option5" onclick="javascript:addRow('pemesanan_barang');" ><i class="fa fa-plus"></i>Tambah</a>
                                                        <a href="#" class="btn btn-danger" onclick="javascript:deleteRow('pemesanan_barang');" ><i class="fa fa-minus"></i>Hapus</a> 
                                                    </td>
                                                </tr>
                                                <hr/>
                                                <tr>
                                                    <td>
                                                        <hr/>
                                                        <table id="pemesanan_barang" width="100%">
                                                            <tr bgcolor="white" >
                                                                <td width="25px"><b>|#|</b></td>
                                                                <td width="35px"><b>|No|</b></td>
                                                                <td width="330px"><b>Nama Barang</b></td>
                                                                <td width="150px"><b>Jumlah Barang</b></td>
                                                                <td width="150px"><b>Harga Jual Satuan</b></td>
                                                                <td width="350px"><b>Keterangan</b></td>
                                                            </tr>
                                                            <?php
                                                            echo "<tr>
                                                    <td width=\"25px\"><input type=\"checkbox\" size=\"1\" name=\"chk\"/></td>
                                                    <td width=\"40px\"><input  type=\"text\" size=\"3\" id=\"urutan_jenis_barang_1\"  name=\"urutan_jenis_barang[]\" value=\"1\" \"/></td><td width=\"350px\">";
                                                            echo "<select  id=\"idrefbarang\"  name=\"idrefbarang[]\"  class=\"form-control\">";
                                                            echo "<option value=\"0\"> --- Pilih Barang ---</option>";
                                                            foreach ($this->orm->refbarang->order('idrefjenisbarang ASC') as $row) {
                                                                echo "<option value=\"{$row['idrefbarang']}\">{$row['namabarang']} - {$row['alias']} <sup>Range Harga : {$row['harga_min']} - {$row['harga_min']}</sup> </option>";
                                                            }
                                                            echo "</select></td>
							   <td width=\"150px\">"
                                                            . "<input class=\"form-control\" type=\"number\" id=\"jumlahbarang\"name=\"jumlahbarang[]\" /></td>"
                                                            ." <td width=\"150px\">"
                                                            . "<input class=\"form-control\" type=\"number\" id=\"hargasatuan\"name=\"hargasatuan[]\" /></td>"
                                                            . "";
                                                            echo " "
                                                            . "<td width=\"150px\">"
                                                            . "<input class=\"form-control\" type=\"text\" id=\"keterangan_1\"name=\"keterangan[]\" /></td>"                                                         
                                                            . "</tr>";
                                                            ?>
                                                        </table>
                                                        <br/>                                                 
                                                    </td>
                                                </tr> 
                                            </table>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-success">Simpan</button>
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
    <!-- Modal Add New -->

    <!-- Modal Add Update -->
    <div class="modal fade" id="myModalUpdate" tabindex="-1" role="dialog" aria-hidden="true">
        <input type="hidden" id="hididquotationsales" />
        <div class="modal-dialog modal-lg">
            <div class="modal-content " >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title " >Edit Data</h4>
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
                                                    <input type="text" class="form-control" id="nomordoupdate" name="nomor">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal" class="col-sm-2 control-label form-label">Tanggal</label>
                                                <div class="col-sm-10">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="input-prepend input-group">
                                                                <span class="add-on input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" id="date-picker-update" class="form-control date-picker" name="tanggal" value="<?php echo date('d-m-Y') ?>"/> 
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
                                                    <select name="idpelanggan" id="idpelangganupdate" class="selectpicker" data-live-search="true">
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
                                                    <select name="idrefjenispembayaran" id="idrefjenispembayaranupdate" class="selectpicker" data-live-search="true">
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
                                                    <input type="text" class="form-control" id="dibuat_oleh_update" value="<?php echo $_SESSION['user']['namalengkap'] ?>" name="dibuat_oleh">
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
                                            <button type="submit" class="btn btn-success">Simpan</button>
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

    <!-- FOOTER-->
    <?php echo Modules::run('front_templates/front_templates/footer'); ?>
    <!-- FOOTER-->


    <?php echo Modules::run('front_templates/front_templates/js_master'); ?>
    <script src="<?php echo base_url() ?>front_assets/js/grid/standard.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>front_assets/js/date-range-picker/daterangepicker.js"></script>
    <script>
                                                            function cetak(idquotationsales) {
                                                                GB_show("Cetak Items", '<?php echo base_url() ?>index.php/quotation/quotation/cetak/' + idquotationsales, 500, 1080);
                                                                $('html, body').animate({scrollTop: 0}, 'slow');
                                                            }

                                                            function cetakDaftar(idrefstore, email) {
                                                                GB_show("Cetak Daftar Quotation", '<?php echo base_url() ?>index.php/quotation/quotation/cetakDaftar/'+idrefstore, 500, 1080);
                                                                $('html, body').animate({scrollTop: 0}, 'slow');
                                                            }

                                                            function edit(idquotation) {
                                                                var url = "<?php echo base_url() ?>index.php/quotation/quotation/ajaxEdit/"+idquotation;
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
                                                                                "<td width='25px'><input type='checkbox' size='1' name='chk'/></td>"+
                                                                                "<td width='40px'><input type='text' size='3' id='urutan_jenis_barang_1' name='urutan_jenis_barang[]'' value='"+(i+1)+"'/></td>"+
                                                                                "<td width='350px'>"+
                                                                                    "<select id='idrefbarang' name='idrefbarang[]' class='form-control' readonly='readonly'>"+
                                                                                        "<?php"+
                                                                                            "foreach ($this->orm->refbarang->order('idrefjenisbarang ASC') as $row) {"+
                                                                                                "echo '<option value='"+val.idrefbarang+"'>"+val.namabarangtext+"</option>';"+
                                                                                            "}"+
                                                                                        "?>"+
                                                                                    "</select>"+
                                                                                "</td>"+
                                                                                "<td width='150px'><input class='form-control' type='number' id='jumlahbarang' name='jumlahbarang[]' value='"+val.jumlahbarang+"' /></td>"+
                                                                                "<td width='150px'><input class='form-control' type='number' id='hargasatuan' name='hargasatuan[]' value='"+val.hargasatuan+"' /></td>"+
                                                                                "<td width='150px'><input class='form-control' type='text' id='keterangan_1' name='keterangan[]' value='"+val.keterangan+"' /></td>"+
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

    <script>
        $(document).ready(function () {
            $('#data_table').DataTable();
            <?php if($cetak) { echo 'window.open("'.base_url().'index.php/quotation/quotation/cetak/'.$idquotationsales.'", "_blank");';
                echo "window.location.replace('".base_url()."index.php/quotation/quotation/')";
            
            } ?>
        });
        
         $(document).ready(function () {
            $('.date-picker').datepicker({
                autoclose: true
            });


        });

        function addItem() {
            GB_show("Quotation", '<?php echo base_url(); ?>index.php/quotation/quotation/add', 700, 1180);
            $('html, body').animate({scrollTop: 0}, 'slow');
        }

        function editItem(idquotation) {
            GB_show("Edit Items", '<?php echo base_url() ?>index.php/index.php/quotation/quotation/edit' + idquotation, 500, 900);
            $('html, body').animate({scrollTop: 0}, 'slow');
        }

        $(document).ready(function () {
            $("#alerttopright").fadeToggle(100);

        });

        

      
        
    
   
    
    </script>                   

<link href="<?php echo base_url() ?>front_assets/css/datepicker.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url() ?>front_assets/js/bootstrap-datepicker.js"></script>
