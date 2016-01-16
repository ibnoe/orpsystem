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
            <li class="active">Master Data Jenis Barang</li>
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
                        List Data Jenis Barang
                    </div>
                    <div class="panel-body table-responsive">
                        <table id="example0" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Induk</th>
                                    <th>Nama Jenis Barang</th>
                                    <th>Detail</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($refjenisbarang as $row) {
                                    $parent = $this->orm->refjenisbarang->where('idrefjenisbarang',$row['parent'])->fetch();
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $parent['jenisbarang']  ?></td>
                                        <td><?php echo $row['jenisbarang'] ?></td>
                                        <td>  <a href="#" class="btn btn-option5" onclick="editItem(<?php echo $row['idrefjenisbarang'] ?>)"><i class="fa fa-edit"></i></a></td>
                                        <td>  <a href="<?php echo base_url() ?>index.php/masterdata/masterjenisbarang/delete/<?php echo $row['idrefjenisbarang'] ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data Jenis Barang ini?')"><i class="fa fa-trash"></i></a></td>
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
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>index.php/masterdata/masterjenisbarang/proses/">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah Jenis Data Barang</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">

                            <div class="form-group">
                                <label for="jenisbarang" class="col-sm-2 control-label form-label">Induk</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker" data-live-search="true" name="parent">
                                        <option> -- Pilih Induk -- </option>
                                      <?php 
                                      foreach($this->orm->refjenisbarang->order('idrefjenisbarang ASC') as $row) { 
                                          $strip = "";
                                          for($i=1;$i<=strlen($row['parent']);$i++) {
                                              $strip .= "-";
                                          }
                                          
                                          ?>  
                                        <option value="<?php echo $row['idrefjenisbarang'] ?>"> 
                                            <?php echo $strip.' '.$row['jenisbarang'] ?>  
                                        </option>
                                      <?php } ?>     
                                    </select>
                                    )* Abaikan jika tanpa induk

                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="jenisbarang" class="col-sm-2 control-label form-label">Nama Jenis Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="jenisbarang" id="jenisbarang">
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



                                        function editItem(idrefjenisbarang) {
                                            GB_show("Edit Items", '<?php echo base_url() ?>index.php/masterdata/masterjenisbarang/edit/' + idrefjenisbarang, 500, 1080);
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