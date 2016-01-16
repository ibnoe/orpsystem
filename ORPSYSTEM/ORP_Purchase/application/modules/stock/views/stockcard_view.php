<?php echo Modules::run('front_templates/front_templates/header'); ?>
<?php echo Modules::run('front_templates/front_templates/menu'); ?>


<!-- START CONTENT -->
<div class="content" style="min-height:650px">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Laporan Kartu Stock</h1>
        <ol class="breadcrumb">
            <li><a href="#">Stock Opname</a></li>
            <li class="active">Stock Card</li>
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
                        Kartu Stock
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">              

                            <div class="form-group">
                                <label for="idrefbarang" class="col-sm-3 control-label">Jenis Barang</label>
                                <div class="col-sm-8">
                                    <select name="idrefbarang" id="idrefbarang" class="selectpicker" data-live-search="true" >
                                        <?php foreach ($this->orm->refbarang() as $row) { ?>
                                            <option value="<?php echo $row['idrefbarang'] ?>"> <?php echo $row['namabarang'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-24">
                                    <br/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="tanggal_dari">
                                    Dari Tanggal
                                </label>
                                <div class="col-sm-3 input-group">
                                    <input type="text" name="tanggal_dari" id="tanggal_dari"  data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y') ?>" data-date-viewmode="years" class="form-control  date-picker">  
                                    <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="tanggal_sampai">
                                    Sampai Tanggal
                                </label>
                                <div class="col-sm-3 input-group">
                                    <input type="text" name="tanggal_sampai" id="tanggal_sampai"  data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y') ?>" data-date-viewmode="years" class="form-control date-picker">
                                    <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                                </div>
                            </div>   


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
                    var idrefbarang = $('#idrefbarang').val();
                    var tanggal_dari = $('#tanggal_dari').val();
                    var tanggal_sampai = $('#tanggal_sampai').val();

                    GB_show("Cetak Kartu Stock", '<?php echo base_url() ?>index.php/stock/stockcard/cetakPDF/'+tanggal_dari+'/'+tanggal_sampai+'/'+idrefbarang, 500, 1080);
                    $('html, body').animate({
                        scrollTop: 0}, 'slow');
                }
            </script>


          






