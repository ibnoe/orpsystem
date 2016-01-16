<?php echo Modules::run('front_templates/front_templates/header'); ?>
<?php echo Modules::run('front_templates/front_templates/menu'); ?>

<link href="<?php echo base_url() ?>front_assets/library/gb/greybox.css" rel="stylesheet">
<script src="<?php echo base_url() ?>front_assets/library/gb/greybox.js"></script>

<!-- START CONTENT -->
<div class="content" style="min-height:650px">


    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Master Data</h1>
        <ol class="breadcrumb">
            <li><a href="#">Master Data</a></li>
            <li class="active">Master Data Package</li>
        </ol>

        <!-- Start Page Header Right Div -->
        <div class="right">
            <div class="btn-group" role="group" aria-label="...">
                <a data-toggle="modal" data-target="#myModalAdd" class="btn btn-info btn-xl"><i class="fa fa-plus"></i>Tambah Data Package</a>
            </div>
        </div>
        <!-- End Page Header Right Div -->

    </div>
    <!-- End Page Header -->



    <!-- START CONTAINER -->
    <div class="container-width auto" >

        <!-- Start Row -->
        <div class="row">

            <!-- Start Panel -->
            <div class="col-lg-17">
                <div class="panel panel-widget">
                    <div class="panel-title">
                        List Data Package
                    </div>
                    <div class="panel-body table-responsive">
                        <table id="example0" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name Package</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($this->orm->package->where('idrefstore', $_SESSION['user']['idrefstore'])->order('namapackage ASC') as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $row['namapackage'] ?></td>
                                        <td><?php echo $row['keterangan'] ?></td>
                                        <td>  
                                            <a href="#" class="btn btn-option5" onclick="editItem(<?php echo $row['idpackage'] ?>)"><i class="fa fa-edit"></i>Detail</a> 
                                            <a href="<?php echo base_url() ?>package/master_package/delete/<?php echo $row['idpackage'] ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data Pengadaan ini?')"><i class="fa fa-trash"></i>Hapus</a>                                        
                                        </td>
                                    </tr>
                                    <?php
                                    $no++;
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
    <div class="modal fade" id="myModalAdd" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>index.php/package/master_package/proses/">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah Data Package</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">

                            <div class="form-group">
                                <label for="namapackage" class="col-sm-2 control-label form-label">Nama Package</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="namapackage" id="namapackage">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="col-sm-2 control-label form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="keterangan" id="keterangan">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <h2>Daftar Barang</h2>
                                      <a href="#" class="btn btn-option5" onclick="javascript:addRow('pemesanan_barang');" ><i class="fa fa-plus"></i>Tambah</a>
                                                        <a href="#" class="btn btn-danger" onclick="javascript:deleteRow('pemesanan_barang');" ><i class="fa fa-minus"></i>Hapus</a> 
                                                        <br/>
                                    <table id="pemesanan_barang" width="100%">
                                        <tr bgcolor="white" >
                                            <td width="25px"><b>|#|</b></td>
                                            <td width="35px"><b>|No|</b></td>
                                            <td width="300px"><b>Nama Barang</b></td>
                                            <td width="150px"><b>Jumlah Barang</b></td>
                                            <td width="450px"><b>Keterangan</b></td>
                                        </tr>
                                        <?php
                                        echo "<tr>
                                                    <td width=\"25px\"><input type=\"checkbox\" size=\"1\" name=\"chk\"/></td>
                                                    <td width=\"40px\"><input class=\"form-control\" type=\"text\" size=\"3\"  name=\"urutan_jenis_barang[]\" value=\"1\" \"/></td>
										   <td width=\"150px\">";
                                        echo "<select  id=\"idrefbarang\"  name=\"idrefbarang[]\"  class=\"form-control\">";
                                        echo "<option value=\"0\"> --- Pilih Barang ---</option>";
                                        foreach ($this->orm->refbarang->order('idrefjenisbarang ASC') as $row) {
                                            echo "<option value=\"{$row['idrefbarang']}\">{$row['namabarang']} - {$row['alias']} </option>";
                                        }
                                        echo "</select></td>
							   <td width=\"150px\">"
                                        . "<input class=\"form-control\" type=\"number\" id=\"jumlahbarang\"name=\"jumlahbarang[]\" /></td>"
                                        . "<td width=\"150px\">"
                                        . "<input class=\"form-control\" type=\"text\" id=\"keterangan_1\"name=\"keterangan_barang[]\" /></td>";
                                        ?>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>              
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>
                </div>
            </form> 
        </div>
    </div>
    <!-- Modal Add New -->


    <!-- Delete Data -->


    <!-- FOOTER-->
<?php echo Modules::run('front_templates/front_templates/footer'); ?>
    <!-- FOOTER-->
</div>
<!-- END CONTAINER -->
<!-- START SIDEPANEL -->
<?php echo Modules::run('front_templates/front_templates/notification'); ?>
<!-- END SIDEPANEL -->
<?php echo Modules::run('front_templates/front_templates/js_master'); ?>
 <script src="<?php echo base_url() ?>front_assets/js/grid/standard.js"></script>
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
                                            $(document).ready(function () {
                                                $('#example0').DataTable();
                                            });



                                            function editItem(idpackage) {
                                                GB_show("Edit Items", '<?php echo base_url() ?>index.php/package/master_package/edit/' + idpackage, 600, 1080);
                                                $('html, body').animate({scrollTop: 0}, 'slow');
                                            }
</script>

<script>
    $(document).ready(function () {
        $("#alerttopright").fadeToggle(100);

    });

    function messageOut(id) {
        $("#" + id).fadeOut(100);
    }</script>