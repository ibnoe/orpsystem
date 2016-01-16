<!DOCTYPE html>
<?php echo Modules::run('front_templates/front_templates/header'); ?>
<?php echo Modules::run('front_templates/front_templates/menu'); ?>
<?php echo Modules::run('front_templates/front_templates/js'); ?>
<script src="<?php echo base_url() ?>front_assets/library/hightlightchart/js/highcharts.js"></script>
<script src="<?php echo base_url() ?>front_assets/library/hightlightchart/js/modules/exporting.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>front_assets/css/jquery.treegrid.css">


<!-- START CONTENT -->
<div class="content" style="min-height:650px">

    <!-- Start Page Header -->
    <div class="page-header">
        <?php
        $store = $this->orm->refstore->where('idrefstore', $_SESSION['user']['idrefstore'])->fetch();
        ?>
        <h1 class="title">BIZON - <?php echo $store['nama'] ?></h1>
        <ol class="breadcrumb">
            <li class="active">Applikasi Inventory</li>
        </ol>

        

    </div>
    <!-- End Page Header -->
    <!-- START CONTAINER -->
    <div class="container-no-padding">

        <!-- Start Social Profile -->
        <div class="social-profile">

            <!-- Start Top -->
            <div class="social-top">

                <div class="profile-left">
                    <img src="<?php echo base_url() ?>front_assets/img/profileimg.png" alt="img" class="profile-img">
                    <h1 class="name"><?php echo $store['nama'] ?></h1>
                    <p><?php echo $store['keterangan'] ?></p>
                </div>


            </div>
            <!-- End Top -->


        </div>

    </div>




    <div class="col-md-12">
        <div class="panel panel-transparent">

            <div class="panel-body">

                <div role="tabpanel">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-line" role="tablist">
                        <li role="presentation" class="active"><a href="#tab0" aria-controls="tab0" role="tab" data-toggle="tab"> <h6>Transaksi Masuk/Keluar</h6> </a></li>
                        <li role="presentation" ><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"> <h6>Info Barang Akan Habis</h6> </a></li>
                        <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"><h6>Top 10 Transaction</h6></a></li>
                        <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"><h6>Statistik Barang Keluar</h6></a></li>
                        <li role="presentation"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"><h6>Statistik Barang Masuk</h6></a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane active" id="tab0">
                            <div role="tabpanel">
                                <div id="chart1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                <br/>
                                <hr/>
                                <hr/>
                                <div id="chart2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="tab1">
                            <h2>
                                Stock Control (Barang Yang Akan Habis)
                            </h2>  
                            <table id="example0" class="table display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jenis Barang</th>
                                        <th>Stock</th>
                                        <th>Gudang</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php
                                    $no = 1;
                                    foreach ($this->orm->refbarang->where('idrefstore', $_SESSION['user']['idrefstore'])->order('stock ASC')->limit(5) as $row) {
                                        $refjenisbarang = $this->orm->refjenisbarang->where('idrefjenisbarang', $row['idrefjenisbarang'])->fetch();
                                        ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $row['kodebarang'] ?></td>
                                            <td><?php echo $row['namabarang'] ?></td>
                                            <td><?php echo $refjenisbarang['jenisbarang'] ?></td>
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


                        <div role="tabpanel" class="tab-pane" id="tab2">

                            <table id="example0" class="table display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Transaksi</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Barang</th>
                                        <th>Banyaknya Transaksi</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php
                                    $no = 1;
                                    foreach ($top10 as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $row['transaksi'] ?></td>
                                            <td><?php echo $row['kodebarangmasuk'] . $row['kodebarangkeluar'] ?></td>
                                            <td><?php echo $row['namabarangmasuk'] . $row['namabarangkeluar'] ?></td>
                                            <td><?php echo $row['jumlahbarangmasuk'] . $row['jumlahbarangkeluar'] . ' ' . $row['namasatuanmasuk'] . ' ' . $row['namasatuankeluar'] ?></td>
                                            <td><?php echo $row['jumlahtransaksimasuk'] . $row['jumlahtransaksikeluar'] ?> kali</td>


                                        </tr>
                                        <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>      
                            </table>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="tab3">

                            <div id="chart3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                        </div>

                        <div role="tabpanel" class="tab-pane" id="tab4">

                            <div id="chart4" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                        </div>

                    </div>

                </div>              

            </div>

        </div>



        <!-- End Top Stats -->
    </div>

    <script type="text/javascript">
        $(function () {
            $('#chart1').highcharts({
                chart: {
                    type: 'area'
                },
                title: {
                    text: 'Bulan <?php echo Tanggal::getBulan(date("m")) . ' ' . date("Y"); ?>'
                },
                subtitle: {
                    text: 'Transaksi Jumlah Barang Masuk/Keluar Harian'
                },
                xAxis: {
                    allowDecimals: false,
                    labels: {
                        formatter: function () {
                            return this.value; // clean, unformatted number for year
                        }
                    }
                },
                yAxis: {
                    title: {
                        text: 'Jumlah Barang'
                    },
                    labels: {
                        formatter: function () {
                            return this.value;
                        }
                    }
                },
                tooltip: {
                    pointFormat: '{series.name} sebanyak <b>{point.y:,.0f}</b><br/>Pada tanggal {point.x} <?php echo Tanggal::getBulan(date("m")) . ' ' . date("Y"); ?>'
                },
                plotOptions: {
                    area: {
                        pointStart: 1,
                        marker: {
                            enabled: false,
                            symbol: 'circle',
                            radius: 3,
                            states: {
                                hover: {
                                    enabled: true
                                }
                            }
                        }
                    }
                },
                series: [{
                        name: 'Transaksi masuk',
                        data: [
<?php
for ($i = 0; $i <= 31; $i++) {

    $transaksi = $this->stock_model->_loadInperMountDay(date('m'), $i);
    if ($transaksi != null) {
        echo $transaksi['jumlahbarang'] . ',';
    } else {
        echo '0,';
    }
}
?>
                        ]

                    }, {
                        name: 'Transaksi Keluar',
                        data: [
<?php
for ($i = 0; $i <= 31; $i++) {

    $transaksi = $this->stock_model->_loadOutperMountDay(date('m'), $i);
    if ($transaksi != null) {
        echo $transaksi['jumlahbarang'] . ',';
    } else {
        echo '0,';
    }
}
?>
                        ]
                    }]
            });
        });
    </script>


    <script type="text/javascript">
        $(function () {
            $('#chart2').highcharts({
                chart: {
                    type: 'area'
                },
                title: {
                    text: 'Tahun <?php echo date("Y"); ?>'
                },
                subtitle: {
                    text: 'Transaksi Jumlah Barang Masuk/Keluar Bulanan'
                },
                xAxis: {
                    categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
                },
                yAxis: {
                    title: {
                        text: 'Jumlah Barang'
                    },
                    labels: {
                        formatter: function () {
                            return this.value;
                        }
                    }
                },
                tooltip: {
                    pointFormat: '{series.name} sebanyak <b>{point.y:,.0f}</b>'
                },
                series: [{
                        name: 'Transaksi masuk',
                        data: [
<?php
for ($i = 1; $i <= 12; $i++) {

    $transaksi = $this->stock_model->_loadInperMount($i);
    if ($transaksi != null) {
        echo $transaksi['jumlahbarang'] . ',';
    } else {
        echo '0,';
    }
}
?>
                        ]

                    }, {
                        name: 'Transaksi Keluar',
                        data: [
<?php
for ($i = 1; $i <= 12; $i++) {

    $transaksi = $this->stock_model->_loadOutperMount($i);
    if ($transaksi != null) {
        echo $transaksi['jumlahbarang'] . ',';
    } else {
        echo '0,';
    }
}
?>
                        ]
                    }]
            });
        });
    </script>


    <script type="text/javascript">

        $(function () {
            $('#chart3').highcharts({
                title: {
                    text: 'Tahun <?php echo date("Y"); ?>',
                    x: -20 //center
                },
                subtitle: {
                    text: 'Statistik Barang Keluar',
                    x: -20
                },
                xAxis: {
                    categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
                },
                yAxis: {
                    title: {
                        text: 'Pcs'
                    },
                    plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                },
                tooltip: {
                    valueSuffix: 'pcs'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [
<?php
$refbarang = $this->orm->refbarang();
foreach ($refbarang as $rowbarang) {
    ?>
                        {
                            name: '<?php echo $rowbarang['namabarang'] ?>',
                            data: [
    <?php
    for ($i = 1; $i <= 12; $i++) {

        $transaksi = $this->stock_model->_loadOutItems($i,$rowbarang['idrefbarang']);
        if ($transaksi != null) {
            echo $transaksi['jumlahbarang'] . ',';
        } else {
            echo '0,';
        }
    }
    ?>
                            ]
                        },
<?php } ?>
                ]
            });
        });
    </script>
    
    <script type="text/javascript">

        $(function () {
            $('#chart4').highcharts({
                title: {
                    text: 'Tahun <?php echo date("Y"); ?>',
                    x: -20 //center
                },
                subtitle: {
                    text: 'Statistik Barang Masuk',
                    x: -20
                },
                xAxis: {
                    categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
                },
                yAxis: {
                    title: {
                        text: 'Pcs'
                    },
                    plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                },
                tooltip: {
                    valueSuffix: 'pcs'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [
<?php
$refbarang = $this->orm->refbarang();
foreach ($refbarang as $rowbarang) {
    ?>
                        {
                            name: '<?php echo $rowbarang['namabarang'] ?>',
                            data: [
    <?php
    for ($i = 1; $i <= 12; $i++) {

        $transaksi = $this->stock_model->_loadInItems($i,$rowbarang['idrefbarang']);
        if ($transaksi != null) {
            echo $transaksi['jumlahbarang'] . ',';
        } else {
            echo '0,';
        }
    }
    ?>
                            ]
                        },
<?php } ?>
                ]
            });
        });
    </script>


    <!-- End Row -->
    <!-- End Row -->
    <!-- END CONTAINER -->
    <!-- FOOTER-->
    <?php echo Modules::run('front_templates/front_templates/footer'); ?>
    <!-- FOOTER-->
</div>
<!-- End Content -->
<!-- START SIDEPANEL -->
<?php echo Modules::run('front_templates/front_templates/notification'); ?>
<!-- END SIDEPANEL -->
</body>
</html>


