<?php echo Modules::run('front_templates/front_templates/header'); ?>
<?php echo Modules::run('front_templates/front_templates/menu'); ?>


<!-- START CONTENT -->
<div class="content" style="min-height:650px">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Stock Control</h1>
        <ol class="breadcrumb">
            <li><a href="#">Stock</a></li>
            <li class="active">Stock Control</li>
        </ol>
    </div>
    <!-- End Page Header -->



    <!-- START CONTAINER -->
    <div class="container-padding">
        <!-- Start Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-title">
                        Stock Control
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12"> 

                            <div class="form-group">
                                <div class="col-sm-12 input-group center" style="text-align: center;">
                                    <a class="btn btn-danger" onclick="cetakPDF();" href="#">
                                        <i class="fa fa-file-pdf-o"></i>
                                        Cetak PDF
                                    </a>
                                    <a class="btn btn-success" onclick="cetakExcel();" href="#">
                                        <i class="fa fa-file-excel-o"></i>
                                        Cetak Excel
                                    </a>
                                </div>
                            </div>
                            
                        <h2>Stock Control</h2>
                        <table id="example0" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Jenis Barang</th>
                                    <th>Stock Awal</th>
                                    <th>Stock</th>
                                    <th>Gudang</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php
                                $no = 1;
                                foreach ($this->orm->refbarang->where('idrefstore',$_SESSION['user']['idrefstore'])->order('kodebarang ASC') as $row) {
                                  $refjenisbarang = $this->orm->refjenisbarang->where('idrefjenisbarang',$row['idrefjenisbarang'])->fetch();
                                    ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $row['kodebarang'] ?></td>
                                        <td><?php echo $row['namabarang'] ?></td>
                                        <td><?php echo $refjenisbarang['jenisbarang'] ?></td>
                                        <td><?php echo $row['stockawal'] ?></td>
                                        <td><?php echo $row['stock'] ?></td>
                                        <td><?php echo $row->refgudang['namagudang'] ?></td>
                                       
                                    </tr>
                                    <?php
                                    $no++;
                               } 
                                ?>
                            </tbody>      
                        </table>
                        </div> 
                    </div>
                </div>


                <!-- FOOTER-->
                <?php echo Modules::run('front_templates/front_templates/footer'); ?>
                <!-- FOOTER-->
            </div>
            <!-- END CONTAINER -->
            <!-- End Content -->
            <!-- START SIDEPANEL -->
            <?php echo Modules::run('front_templates/front_templates/notification'); ?>
            <!-- END SIDEPANEL -->
            <!-- END SIDEPANEL -->
<?php echo Modules::run('front_templates/front_templates/js_master'); ?>
            <!-- END SIDEPANEL -->
  <link href="<?php echo base_url() ?>front_assets/css/datepicker.css" rel="stylesheet" type="text/css" />
            <script type="text/javascript" src="<?php echo base_url() ?>front_assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>front_assets/library/gb/greybox.js"></script>
<link type="text/css" href="<?php echo base_url() ?>front_assets/library/gb/greybox.css" rel="stylesheet" />

            <script>

                $(document).ready(function () {
                    $('#example0').DataTable();

                    $('.date-picker').datepicker({
                        autoclose: true
                    });
                });

                function cetakPDF() {
                    GB_show("Cetak Stock Control", '<?php echo base_url() ?>index.php/stock/stockcontrol/cetakPDF/', 500, 1080);
                    $('html, body').animate({
                        scrollTop: 0}, 'slow');
                }
            </script>


          






