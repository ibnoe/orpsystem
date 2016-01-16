<?php echo Modules::run('front_templates/front_templates/header'); ?>
<?php echo Modules::run('front_templates/front_templates/menu'); ?>


<!-- START CONTENT -->
<div class="content" style="min-height:650px">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Sharing</h1>
        <ol class="breadcrumb">
            <li><a href="index.html">Sharing</a></li>
            <li class="active">Sharing</li>
        </ol>

        <!-- Start Page Header Right Div -->
        <div class="right">
            <div class="btn-group" role="group" aria-label="...">
                <a data-toggle="modal" data-target="#myModalAdd" class="btn btn-default btn-xl"><i class="fa fa-plus"></i>Add New</a>
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
                        List Sharing Produk
                    </div>
                    <div class="panel-body table-responsive">
                        <table id="example0" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                     <th>Sharing Ke</th>
                                    <th>Tanggal Kirim</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                   
                                    <th>Jumlah</th>
                                    <th>Konfirmasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($this->orm->sharingproduct->where('idrefstore_pengirim', $_SESSION['user']['idrefstore'])->order('status_konfirmasi DESC') as $row) {
                                    $penerima = $this->orm->refstore->where('idrefstore', $row['idrefstore_penerima'])->fetch();
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                         <td><b><?php echo $penerima['nama'] ?></b></td>
                                        <td><?php echo Tanggal::formatDate($row['tanggal_kirim']) ?></td>
                                        <td><?php echo $row->refbarang['kodebarang'] ?></td>
                                        <td><?php echo $row->refbarang['namabarang'] ?></td>
                                       
                                        <td><?php echo $row['jumlah_barang'] ?></td>
                                        <td> 
                                            <?php
                                            if ($row['status_konfirmasi'] == 'Y') {
                                                echo 'Sudah Dikonfirmasi Pada <br/> <b>' . Tanggal::formatDate($row['tanggal_konfirmasi']) . '</b>';
                                            } else {
                                                ?>
                                                <a href="<?php echo base_url() ?>index.php/sharing/konfirmasi/<?php echo $row['idsharingproduct'] ?>"  class="btn btn-option1"><i class="fa fa-edit"></i>Konfirmasi</a> 
                                                <a href="<?php echo base_url() ?>index.php/sharing/batal/<?php echo $row['idsharingproduct'] ?>"    class="btn btn-danger"><i class="fa fa-times-circle"></i>Batal</a>
                                            <?php } ?>
                                        </td>                                   
                                    </tr>
                                    <?php $no++;
                                } ?>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add New Product Sharing</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="<?php echo base_url() ?>index.php/sharing/proses">
                            <div class="form-group">
                                <label for="input002" class="col-sm-2 control-label form-label">Kode/Nama Barang</label>
                                <div class="col-sm-10">
                                    <select name="idrefbarang" id="idrefbarang" class="selectpicker" data-live-search="true">
                                        <?php
                                        foreach ($this->orm->refbarang->order('idrefjenisbarang ASC,namabarang ASC') as $row) {
                                            $jenisbarang = $this->orm->refjenisbarang->where('idrefjenisbarang', "{$row['idrefjenisbarang']}")->fetch();
                                            ?>
                                            <option value="<?php echo $row['idrefbarang'] ?>"> <?php echo $jenisbarang['jenisbarang'] . ' - ' . '( ' . $row['kodebarang'] . ') ' . $row['namabarang'] ?> </option>
                                        <?php } ?>                            
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input002" class="col-sm-2 control-label form-label">Jumlah Barang</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" id="input002" name="jumlah_barang">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggalpengadaan" class="col-sm-2 control-label form-label">Tanggal Kirim</label>
                                <div class="col-sm-4">
                                    <div class="control-group">
                                        <div class="controls">
                                            <div class="input-prepend input-group">
                                                <span class="add-on input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="text" id="date-picker" class="form-control date-picker" name="tanggal_kirim" value="<?php echo date('d-m-Y') ?>"/> 

                                            </div>
                                            <br/> <sup>)*Tgl-Bln-Thn</sup>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input002" class="col-sm-2 control-label form-label">Sharing Ke</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker" data-style="btn-primary" name="idrefstore_penerima">
                                        <?php foreach ($this->orm->refstore->where('idrefstore != ?', $_SESSION['user']['idrefstore']) as $row) { ?>
                                            <option value="<?php echo $row['idrefstore'] ?>"><?php echo $row['nama'] ?></option>
                                        <?php } ?>                                        
                                    </select>                  
                                </div>
                            </div>
                            
                             <div class="modal-footer">
                     <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>              
                        <input type="submit" class="btn btn-success" value="Proses">
                </div>
                        </form> 
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <!-- Modal Add New -->



    <!-- Modal Add Edit Data -->
    <!-- Modal Add Edit Data -->


    <!-- Delete Data -->
    <div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmation Delete</h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Akan Mendelete Data ini
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
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

<script>
    $(document).ready(function () {
        $('#example0').DataTable();
        $('.date-picker').datepicker({
            autoclose: true
        });
    });
</script>


<link href="<?php echo base_url() ?>front_assets/css/datepicker.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url() ?>front_assets/js/bootstrap-datepicker.js"></script>
