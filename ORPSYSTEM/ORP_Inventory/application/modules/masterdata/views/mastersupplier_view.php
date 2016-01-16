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
            <li class="active">master data supplier</li>
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
    <div class="container-width auto" >

        <!-- Start Row -->
        <div class="row">

            <!-- Start Panel -->
            <div class="col-lg-17">
                <div class="panel panel-widget">
                    <div class="panel-title">
                        List Data Supplier
                    </div>
                    <div class="panel-body table-responsive">
                        <table id="example0" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Supplier</th>
                                    <th>Nomor Hp Supplier</th>
                                    <th>Email Supplier</th>
                                    <th>Alamat Supplier</th>
                                    <th>Kota Supplier</th>
                                    <th>Jenis Supplier</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $idsupplier = 1;
                                foreach ($supplier as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $idsupplier ?></td>
                                        <td><?php echo $row['namasupplier'] ?></td>
                                        <td><?php echo $row['nomorhpsupplier'] ?></td>
                                        <td><?php echo $row['emailsupplier'] ?></td>
                                        <td><?php echo $row['alamatsupplier'] ?></td>
                                        <td><?php echo $row['kotasupplier'] ?></td>
                                        <td><?php echo $row['jenissupplier'] ?></td>
                                        <td>  <a href="#" class="btn btn-option5" onclick="editItem(<?php echo $row['idsupplier'] ?>)"><i class="fa fa-edit"></i></a></td>
                                        <td>  <a href="<?php echo base_url() ?>masterdata/mastersupplier/delete/<?php echo $row['idsupplier'] ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data Suplier ini?')"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <?php $idsupplier++;
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
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>index.php/masterdata/mastersupplier/proses/">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Data Supplier</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">

                            <div class="form-group">
                                <label for="namasupplier" class="col-sm-2 control-label form-label">Nama Supplier</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="namasupplier" id="namasupplier">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nomorhpsupplier" class="col-sm-2 control-label form-label">Nomor HP Supplier</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nomorhpsupplier" id="nomorhpsupplier">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="emailsupplier" class="col-sm-2 control-label form-label">Email Supplier</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="emailsupplier" id="emailsupplier">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alamatsupplier" class="col-sm-2 control-label form-label">Alamat Supplier</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="alamatsupplier" id="alamatsupplier">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="kotasupplier" class="col-sm-2 control-label form-label">Kota Supplier</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kotasupplier" id="kotasupplier">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="jenissupplier" class="col-sm-2 control-label form-label">Jenis Supplier (PT, CV, Toko, Retail, Perseorangan, Lainnya)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="jenissupplier" id="jenissupplier">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="keterangan" class="col-sm-2 control-label form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="keterangan" id="keterangan">
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



                                        function editItem(idsupplier) {
                                            GB_show("Edit Items", '<?php echo base_url() ?>index.php/masterdata/mastersupplier/edit/' + idsupplier, 600, 1080);
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