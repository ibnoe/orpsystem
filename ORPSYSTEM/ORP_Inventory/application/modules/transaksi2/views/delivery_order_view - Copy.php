
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
            <li><a href="index.html">Transaksi</a></li>
            <li class="active">Transaksi Delivery Order</li>
        </ol>

        <!-- Start Page Header Right Div -->
        <div class="right">
            <div class="btn-group" role="group" aria-label="...">
                <a data-toggle="modal" data-target="#myModalAdd" class="btn btn-info btn-xl"><i class="fa fa-plus"></i>Tambah Baru</a>
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
                            <a href="#" class="btn btn-danger" onclick="cetakDaftar()"><i class="fa fa-file"></i>Cetak Daftar Delivery Order</a>
                        </div>
                    </div>
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
                                    <th>Pelanggan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $iddeliveryorder = 1;
                                foreach ($deliveryorder as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $iddeliveryorder ?></td>
                                        <td><?php echo $row['nomordo'] ?></td>
                                        <td><?php echo Tanggal::formatDate($row['tanggaldo']) ?></td>
                                        <td><?php echo $row->pelanggan['namapelanggan'] ?></td>
                                        <td><?php echo $row['status'] ?></td>
                                        <td>
                                            <a href="#" class="btn btn-option5" onclick="edit(<?php echo $row['iddeliveryorder'] ?>)"><i class="fa fa-edit"></i>Detil</a> 
                                            <a href="<?php echo base_url() ?>index.php/transaksi/deliveryorder/delete/<?php echo $row['iddeliveryorder'] ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data Pengadaan ini?')"><i class="fa fa-trash"></i>Hapus</a> 
                                            <a href="#" onclick="cetak(<?php echo $row['iddeliveryorder'] ?>)" class="btn btn-primary"><i class="fa fa-print"></i>Print</a>
                                        </td>

                                    </tr>
                                    <?php
                                    $iddeliveryorder++;
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
                            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>index.php/transaksi/deliveryorder/proses" >

                                <div role="tabpanel">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs tabcolor8-bg" role="tablist">
                                        <li role="presentation" class="active"><a href="#PO1" aria-controls="PO1" role="tab" data-toggle="tab">:::Data Utama:::</a></li>
                                        <li role="presentation"><a href="#PO2" aria-controls="PO2" role="tab" data-toggle="tab">:::DO Barang:::</a></li>
                                        <li role="presentation"><a href="#PO3" aria-controls="PO3" role="tab" data-toggle="tab">:::DO Paket:::</a></li>
                                    </ul>
                                    <!-- Nav tabs -->

                                    <!-- Tab panes -->
                                    <div class="tab-content">

                                        <div role="tabpanel" class="tab-pane active" id="PO1">


                                            <div class="form-group">
                                                <label for="nomordo" class="col-sm-2 control-label form-label">Nomor DO</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nomordo" name="nomordo">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="tanggalpengadaan" class="col-sm-2 control-label form-label">Tanggal DO</label>
                                                <div class="col-sm-10">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="input-prepend input-group">
                                                                <span class="add-on input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" id="date-picker" class="form-control date-picker" name="tanggaldo" value="<?php echo date('d-m-Y') ?>"/> 
                                                            </div>
                                                            <br/> <sup>)*Tgl-Bln-Thn</sup>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="nomorreff" class="col-sm-2 control-label form-label">Pelanggan</label>
                                                <div class="col-sm-10">
                                                    <select name="idpelanggan" id="idpelanggan" class="selectpicker" data-live-search="true">
                                                        <?php foreach ($this->orm->pelanggan() as $row) { ?>
                                                            <option value="<?php echo $row['idpelanggan'] ?>"> <?php echo $row['namapelanggan'] ?> </option>
                                                        <?php } ?>    
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="disetujui" class="col-sm-2 control-label form-label">Disetujui Oleh</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="disetujui" name="disetujui">
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
                                                                <td width="300px"><b>Nama Barang</b></td>
                                                                <td width="150px"><b>Jumlah Barang</b></td>
                                                                <td width="350px"><b>Keterangan</b></td>
                                                                <td width="100px"><b>Packaging</b></td>
                                                                <td width="100px"><b>Expired Date</b></td>
                                                            </tr>
                                                            <?php
                                                            echo "<tr>
                                                    <td width=\"25px\"><input type=\"checkbox\" size=\"1\" name=\"chk\"/></td>
                                                    <td width=\"40px\"><input  type=\"text\" size=\"3\" id=\"urutan_jenis_barang_1\"  name=\"urutan_jenis_barang[]\" value=\"1\" \"/></td><td width=\"150px\">";
                                                            echo "<select  id=\"idrefbarang\"  name=\"idrefbarang[]\"  class=\"form-control\">";
                                                            echo "<option value=\"0\"> --- Pilih Barang ---</option>";
                                                            foreach ($this->orm->refbarang->order('idrefjenisbarang ASC') as $row) {
                                                                echo "<option value=\"{$row['idrefbarang']}\">{$row['namabarang']} - {$row['alias']} </option>";
                                                            }
                                                            echo "</select></td>
							   <td width=\"150px\">"
                                                            . "<input class=\"form-control\" type=\"number\" id=\"jumlahbarang\"name=\"jumlahbarang[]\" /></td>"
                                                            . "";
                                                            echo " "
                                                            . "<td width=\"150px\">"
                                                            . "<input class=\"form-control\" type=\"text\" id=\"keterangan_1\"name=\"keterangan[]\" /></td>"
                                                            . "<td>";
                                                                    echo "<select  id=\"idpackaging\"  name=\"idpackaging[]\"  class=\"form-control\">";
                                                            echo "<option value=\"0\"> --- Pilih Packaging ---</option>";
                                                            foreach ($this->orm->packaging->order('idpackaging ASC') as $row) {
                                                                echo "<option value=\"{$row['idpackaging']}\">{$row['nama']} </option>";
                                                            }
                                                            echo "</select></td>"
                                                            . "<td>"
                                                            . "<input class=\"form-control date-picker\" type=\"date\" id=\"expired_date_1\"name=\"expired_date[]\" value=\"".date('d-m-Y')."\" /></td>"
                                                                    . "</tr>";
                                                            ?>
                                                        </table>
                                                        <br/>                                                 
                                                    </td>
                                                </tr> 
                                            </table>
                                        </div>
                                        
                                        <div role="tabpanel" class="tab-pane" id="PO3">
                                            <table>
                                                <tr>
                                                    <td id="title">
                                                        <a href="#" class="btn btn-option5" onclick="javascript:addRow('pemesanan_paket');" ><i class="fa fa-plus"></i>Tambah</a>
                                                        <a href="#" class="btn btn-danger" onclick="javascript:deleteRow('pemesanan_paket');" ><i class="fa fa-minus"></i>Hapus</a> 
                                                    </td>
                                                </tr>
                                                <hr/>
                                                <tr>
                                                    <td>
                                                        <hr/>
                                                        <table id="pemesanan_paket" width="100%">
                                                            <tr bgcolor="white" >
                                                                <td width="25px"><b>|#|</b></td>
                                                                <td width="35px"><b>|No|</b></td>
                                                                <td width="300px"><b>Paket</b></td>
                                                            </tr>
                                                            <?php
                                                            echo "<tr>
                                                    <td width=\"25px\"><input type=\"checkbox\" size=\"1\" name=\"chk\"/></td>
                                                    <td width=\"40px\"><input  type=\"text\" size=\"3\" id=\"urutan_jenis_barang_1\"  name=\"urutan_jenis_barang[]\" value=\"1\" \"/></td><td width=\"150px\">";
                                                            echo "<select  id=\"idpackage\"  name=\"idpackage[]\"  class=\"form-control\">";
                                                            echo "<option value=\"0\"> --- Pilih Paket ---</option>";
                                                            foreach ($this->orm->package->order('idpackage ASC') as $row) {
                                                                echo "<option value=\"{$row['idpackage']}\">{$row['namapackage']}  </option>";
                                                            }
                                                            echo "</select></td>"
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

    <!-- FOOTER-->
    <?php echo Modules::run('front_templates/front_templates/footer'); ?>
    <!-- FOOTER-->


    <?php echo Modules::run('front_templates/front_templates/js_master'); ?>
    <script src="<?php echo base_url() ?>front_assets/js/grid/standard.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>front_assets/js/date-range-picker/daterangepicker.js"></script>
    <script>
                                                            function cetak(iddeliveriorder) {
                                                                GB_show("Cetak Items", '<?php echo base_url() ?>index.php/transaksi/deliveryorder/cetak/' + iddeliveriorder, 500, 1080);
                                                                $('html, body').animate({scrollTop: 0}, 'slow');
                                                            }

                                                            function cetakDaftar() {
                                                                GB_show("Cetak Daftar Delivery Order", '<?php echo base_url() ?>index.php/transaksi/deliveryorder/cetakDaftar/', 500, 1080);
                                                                $('html, body').animate({scrollTop: 0}, 'slow');
                                                            }

                                                            function edit(iddeliveriorder) {
                                                                GB_show("Cetak Items", '<?php echo base_url() ?>index.php/transaksi/deliveryorder/cetak/' + iddeliveriorder, 500, 1080);
                                                                $('html, body').animate({scrollTop: 0}, 'slow');
                                                            }
    </script>

    <script>
        $(document).ready(function () {
            $('#example0').DataTable();
        });
        
         $(document).ready(function () {
            $('.date-picker').datepicker({
                autoclose: true
            });


        });

        function addItem() {
            GB_show("Delivery Order", '<?php echo base_url(); ?>index.php/transaksi/pengadaan/add', 700, 1180);
            $('html, body').animate({scrollTop: 0}, 'slow');
        }

        function editItem(idpengadaan) {
            GB_show("Edit Items", '<?php echo base_url() ?>index.php/transaksi/pengadaan/edit/' + idpengadaan, 500, 900);
            $('html, body').animate({scrollTop: 0}, 'slow');
        }

        $(document).ready(function () {
            $("#alerttopright").fadeToggle(100);

        });

        function messageOut(id) {
            $("#" + id).fadeOut(100);


            function print() {
                GB_show("Pengadaan", '<?php echo base_url(); ?>index.php/transaksi/pengadaan/print', 700, 1180);
                $('html, body').animate({scrollTop: 0}, 'slow');
            }

        }
        jQuery(document).ready(function () {
            Main.init();
            FormElements.init();
        });

        var url = '<?php echo base_url() ?>index.php/ajax/combobox/getJenisBarang';
        $.post(url,
                {
                    id: id,
                    idRefBarang: value
                },
        function (data, status) {
            if (data.result) {
                $('#jenisBarangDetail_' + data.id + '').val(data.jenisBarang);
            }
        }, "json");
        
    
   
    
    </script>                   

<link href="<?php echo base_url() ?>front_assets/css/datepicker.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url() ?>front_assets/js/bootstrap-datepicker.js"></script>
