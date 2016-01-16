
<!-- START SIDEBAR -->
<div class="sidebar clearfix">

<ul class="sidebar-panel nav">
  <li class="sidetitle">MAIN MENU</li>
  <li><a href="<?php echo base_url()?>home"><span class="icon color5"><i class="fa fa-home"></i></span>Home</a></li>
  <li><a href="#"><span class="icon color7"><i class="fa fa-database"></i></span>Master Data<span class="caret"></span></a>
    <ul>
      <li><a href="<?php echo base_url();?>masterdata/masterbarang">Master Data Barang</a></li>
      <li><a href="<?php echo base_url();?>masterdata/mastergudang">Master Data Gudang</a></li>
	  <li><a href="<?php echo base_url();?>masterdata/masterpelanggan">Master Data Pelanggan</a></li>
	  <li><a href="<?php echo base_url();?>masterdata/mastersupplier">Master Data Supplier</a></li>
    </ul>
  </li>
  <li><a href="#"><span class="icon color7"><i class="fa fa-external-link-square"></i></span>Transaksi Pemesanan<span class="caret"></span></a>
    <ul>
      <li><a href="<?php echo base_url();?>pemesanan/po_pemesanan">Purchase Order</a></li>
      <li><a href="<?php echo base_url();?>pemesanan/do_pemesanan">Delivery Order</a></li>
    </ul>
  </li>
<li><a href="#"><span class="icon color7"><i class="fa fa-pencil"></i></span>Transaksi Pembelian<span class="caret"></span></a>
    <ul>
      <li><a href="<?php echo base_url();?>pembelian/pengadaan">Pengadaan</a></li>
     
    </ul>
  </li>
  <li><a href="#"><span class="icon color7"><i class="fa fa-external-link"></i></span>Transaksi Penjualan<span class="caret"></span></a>
    <ul>
         <li><a href="<?php echo base_url();?>pembelian/invoice">Invoice</a></li>
      <li><a href="<?php echo base_url()?>penjualan/po_penjualan">Purchase Order</a></li>
      <li><a href="<?php echo base_url()?>penjualan/do_penjualan">Delivery Order</a></li>
	  <li><a href="<?php echo base_url()?>penjualan/retur_penjualan">Retur Penjualan</a></li>
    </ul>
  </li>
   <li><a href="#"><span class="icon color7"><i class="fa fa-dollar"></i></span>Hutang Piutang<span class="caret"></span></a>
   <ul>
      <li><a href="<?php echo base_url()?>hutang/buku_hutang">Buku Hutang</a></li>
      <li><a href="<?php echo base_url()?>hutang/proses_hutang">Proses Hutang</a></li>
    </ul>
   </li>
   
   
   <li class="sidetitle"></li>
		        <li class="sidetitle"><hr/></li>
				<li><a href="<?php echo PARENT_URL; ?>">
				<span class="icon color7"><i class="fa fa-dashboard"></i></span>Kembali Ke Dashboard</a></li>
    </ul>
</ul>

<!---<ul class="sidebar-panel nav">
  <li class="sidetitle">Report</li>
  <li><a href="#"><span class="icon color7"><i class="fa fa-bar-chart-o"></i></span>Report<span class="caret"></span></a>
    <ul>
      <li><a href="<?php echo base_url()?>report">Report Sample</a></li>
    </ul>
  </li>
</ul>-->
</div>
<!-- END SIDEBAR -->