
<?php echo Modules::run('front_templates/front_templates/header'); ?>
<?php echo Modules::run('front_templates/front_templates/menu'); ?>


<!-- START CONTENT -->
<div class="content" style="min-height:650px">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Stock</h1>
        <ol class="breadcrumb">
            <li><a href="#">Stock</a></li>
            <li class="active">Stock Transfer out</li>
        </ol>
    </div>
    <!-- End Page Header -->



    <!-- START CONTAINER -->
    <div class="container-padding">

        <!-- Start Row -->
        <div class="row">

            <!-- Start Panel -->
            <div class="col-lg-17">
                <div class="panel panel-widget">
                    <div class="panel-title">
                        Cetak Laporan Delivery Order
                    </div>
                    <div class="panel-body table-responsive">

                        <div class="col-md-12">                 
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="tanggal_dari">
                                    Dari Tanggal
                                </label>
                                <div class="col-sm-3 input-group">
                                    <input type="text" name="tangal_dari" id="tanggal_dari"  data-date-format="dd-mm-yyyy" value="05-07-2015" data-date-viewmode="years" class="form-control  date-picker">  
                                    <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="tanggal_sampai">
                                    Sampai Tanggal
                                </label>
                                <div class="col-sm-3 input-group">
                                    <input type="text" name="tangal_sampai" id="tanggal_sampai"  data-date-format="dd-mm-yyyy" value="05-07-2015" data-date-viewmode="years" class="form-control date-picker">
                                    <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                                </div>
                            </div>   
                            <div class="form-group">

                                <div class="col-sm-12 input-group center" style="text-align: center;">
                                    <a class="btn btn-danger" onclick="cetakPDF();">
                                        <i class="fa fa-file-pdf-o"></i>
                                        Cetak PDF
                                    </a>
                                    <a class="btn btn-success" onclick="cetakExcel();">
                                        <i class="fa fa-file-excel-o"></i>
                                        Cetak Excel
                                    </a>
                                </div>
                            </div>    
                        </div> 

                        <hr/>
                        <h2>Daftar Barang Keluar</h2>

                        <table id="example0" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor DO</th>
                                    <th>Tanggal DO</th>
                                    <th width="100">Pelanggan</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody> 

                                <?php
                                $no = 1;
                                foreach ($deliveryorderdetail as $row) {
                                    $pelanggan = $this->orm->pelanggan->where('idpelanggan', $row->deliveryorder['idpelanggan'])->fetch();
                                    ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $row->deliveryorder['nomordo'] ?></td>
                                        <td><?php echo Tanggal::formatDate($row->deliveryorder['tanggaldo']) ?></td>
                                        <td><?php echo $pelanggan['namapelanggan'] ?></td>
                                        <td><?php echo $row->refbarang['namabarang'] ?></td>
                                        <td><?php echo $row['jumlahbarang'] ?></td>                                       
                                        <td><?php echo $row->deliveryorder['status'] ?></td>                                       
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
            <!-- End Panel -->


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
<?php echo Modules::run('front_templates/front_templates/js_master'); ?>

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
        var tanggal_dari = $('#tanggal_dari').val();
        var tanggal_sampai = $('#tanggal_sampai').val();


        GB_show("Cetak Daftar Barang Keluar", '<?php echo base_url() ?>index.php/transaksi/deliveryorder/cetakDaftar/', 500, 1080);
        $('html, body').animate({scrollTop: 0}, 'slow');
    }
</script>

<link href="<?php echo base_url() ?>front_assets/css/datepicker.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url() ?>front_assets/js/bootstrap-datepicker.js"></script>
