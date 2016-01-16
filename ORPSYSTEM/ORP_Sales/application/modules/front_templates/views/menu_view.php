
<!-- START SIDEBAR -->
<div class="sidebar clearfix">

<ul class="sidebar-panel nav">
  <li class="sidetitle">MAIN MENU</li>
  <li><a href="#"><span class="icon color5"><i class="fa fa-home"></i></span>Home</a></li>
  <li><a href="#"><span class="icon color7"><i class="fa fa-database"></i></span>Master Data<span class="caret"></span></a>
    <ul>
      <li><a href="<?php echo base_url();?>index.php/masterdata/masterbarang">Master Data Barang</a></li>
      <li><a href="<?php echo base_url();?>index.php/masterdata/mastergudang">Master Data Gudang</a></li>
	  <li><a href="<?php echo base_url();?>index.php/masterdata/masterpelanggan">Master Data Pelanggan</a></li>
    </ul>
  </li>
  <li><a href="<?php echo base_url();?>index.php/quotation/quotation"><span class="icon color7"><i class="fa fa-clipboard"></i></span>Quotation</a></li>
  <li><a href="#"><span class="icon color7"><i class="fa fa-external-link"></i></span>Transaksi Pemesanan<span class="caret"></span></a>
    <ul>
      <li><a href="<?php echo base_url();?>index.php/pemesanan/po_pemesanan">Purchase Order</a></li>
	  <li><a href="<?php echo base_url();?>index.php/pemesanan/do_pemesanan">Delivery Order</a></li>
    </ul>
  </li>
  <li><a href="#"><span class="icon color7"><i class="fa fa-external-link-square"></i></span>Transaksi Penjualan<span class="caret"></span></a>
    <ul>
      <li><a href="<?php echo base_url();?>index.php/penjualan/po_penjualan">Purchase Order</a></li>
      <li><a href="<?php echo base_url();?>index.php/penjualan/do_penjualan">Surat Jalan</a></li>
	  <li><a href="<?php echo base_url();?>index.php/penjualan/do_penjualan">Verifikasi</a></li>
	  <li><a href="<?php echo base_url();?>index.php/penjualan/retur_penjualan">Retur Barang</a></li>
    </ul>
  </li>
  <li><a href="<?php echo base_url();?>index.php/hutang/hutang_piutang"><span class="icon color7"><i class="fa fa-dollar"></i></span>Hutang Piutang</a></li>

<li class="sidetitle"></li>
            <li class="sidetitle"><hr/></li>
        <li><a href="<?php echo PARENT_URL; ?>">
        <span class="icon color7"><i class="fa fa-dashboard"></i></span>Kembali Ke Dashboard</a></li>
</ul>

<ul class="sidebar-panel nav">
  <li class="sidetitle">Report</li>
  <li><a href="#"><span class="icon color7"><i class="fa fa-bar-chart-o"></i></span>Report<span class="caret"></span></a>
    <ul>
      <li><a href="report.html">Report 1</a></li>
      <li><a href="report.html">Report 2</a></li>
	  <li><a href="report.html">Report 3</a></li>
	  <li><a href="report.html">Report 4</a></li>
	  <li><a href="report.html">Report 5</a></li>
    </ul>
  </li>
</ul>
</div>
<!-- END SIDEBAR -->