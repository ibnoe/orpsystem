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
            <li class="active">Master Data Satuan</li>
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
                        List Data Satuan
                    </div>
                    <div class="panel-body table-responsive">
                        <table id="example0" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Satuan</th>
                                    <th>Satuan Terkecil</th>
                                    <th>Jumlah Satuan Terkecil</th>
                                    <th>Detail</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($refsatuan as $row) {
                                     $terkecil = $this->orm->refsatuan->where('idrefsatuan',$row['child'])->fetch();
                                    ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $row['namasatuan'] ?></td>
                                        <td><?php echo $terkecil['namasatuan'] ?></td>
                                        <td><?php echo $row['jumlah_perchild'] ?></td>
                                        <td>  <a href="#" class="btn btn-option5" onclick="editItem(<?php echo $row['idrefsatuan'] ?>)"><i class="fa fa-edit"></i></a></td>
                                        <td>  <a href="<?php echo base_url() ?>masterdata/mastersatuan/delete/<?php echo $row['idrefsatuan'] ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data Satuan Barang ini?')"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <?php $no++;
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
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>index.php/masterdata/mastersatuan/proses/">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Master Data Satuan</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            
                            <div class="form-group">
                                <label for="namasatuan" class="col-sm-2 control-label form-label">Nama Satuan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="namasatuan" id="namasatuan">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="parent" class="col-sm-2 control-label form-label">Satuan Terkecil</label>
                                <div class="col-sm-3">
                                    <select class="selectpicker" data-live-search="true" name="parent">
                                        <option> -- Pilih Satuan Terkecil -- </option>
                                        <?php
                                        foreach ($this->orm->refsatuan->order('idrefsatuan ASC') as $row) {
                                            $strip = "";
                                          for($i=1;$i<=strlen($row['child']);$i++) {
                                              $strip .= "-";
                                          }
                                            
                                            ?>  
                                            <option value="<?php echo $row['idrefsatuan'] ?>"> 
                                            <?php echo $strip.' '.$row['namasatuan'] ?>  
                                            </option>
                                        <?php } ?>     
                                    </select>
                                </div>
                                <label for="jumlah_perchild" class="col-sm-2 control-label form-label">Jumlah Per-Satuan terkecil</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="jumlah_perchild" id="jumlah_perchild">
                                </div>
                                 )* Abaikan jika tidak ada satuan terkecil
                            </div>





                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>              
                        <input type="submit" class="btn btn-success" value="Save">
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



                                        function editItem(idrefsatuan) {
                                            GB_show("Edit Items", '<?php echo base_url() ?>index.php/masterdata/mastersatuan/edit/' + idrefsatuan, 600, 1080);
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