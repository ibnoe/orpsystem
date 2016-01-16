
<!-- START SIDEBAR -->
<div class="sidebar clearfix">

<ul class="sidebar-panel nav">
  <li class="sidetitle">MAIN MENU</li>
  <li><a href="<?php echo base_url()?>index.php/home"><span class="icon color5"><i class="fa fa-home"></i></span>Home</a></li>
  <li><a href="#"><span class="icon color7"><i class="fa fa-database"></i></span>Master Data<span class="caret"></span></a>
    <ul>
      <li class="active"><a href="<?php echo base_url();?>index.php/masterdata/mastergudang">Master Data Gudang</a></li>
	 <li><a href="<?php echo base_url();?>index.php/masterdata/masterjenisbarang">Master Jenis Barang</a></li>
	 <li><a href="<?php echo base_url();?>index.php/masterdata/mastersatuan">Master Satuan Barang</a></li>
<li><a href="<?php echo base_url();?>index.php/masterdata/masterpackaging">Master Pengemasan</a></li>
	
      <li><a href="<?php echo base_url();?>index.php/masterdata/masterbarang">Master Data Barang</a></li>
       <li><a href="<?php echo base_url();?>index.php/masterdata/masterpelanggan">Master Data Pelanggan</a></li>
       <li><a href="<?php echo base_url();?>index.php/masterdata/mastersupplier">Master Data Supplier</a></li>
    </ul>
  </li>
  <li><a href="#"><span class="icon color7"><i class="fa fa-pencil-square-o"></i></span>Transaksi<span class="caret"></span></a>
    <ul>
      <li><a href="<?php echo base_url();?>index.php/transaksi/pengadaan">Pengadaan</a></li>
      <li><a href="<?php echo base_url();?>index.php/transaksi/deliveryorder">Delivery Order</a></li>
    </ul>
  </li>
  <li><a href="#"><span class="icon color7"><i class="fa fa-refresh"></i></span>Stock Opname<span class="caret"></span></a>
    <ul>
      <li><a href="<?php echo base_url();?>index.php/stock/transfer_in">Stock Transfer In</a></li>
      <li><a href="<?php echo base_url();?>index.php/stock/transfer_out">Stock Transfer out</a></li>
	  <li><a href="<?php echo base_url();?>index.php/stock/mutasistock">Mutasi Stock</a></li>
	  <li><a href="<?php echo base_url();?>index.php/stock/stockcard">Stock Card</a></li>
	  <li><a href="<?php echo base_url();?>index.php/stock/stockcontrol">Stock Control</a></li>
    </ul>
    
  </li>
  <li><a href="#"><span class="icon color7"><i class="fa fa-square-o"></i></span>Package Produk<span class="caret"></span></a>
    <ul>
      <li><a href="<?php echo base_url()?>index.php/package/master_package">Master Data Package</a></li>
<!--      <li><a href="<?php echo base_url()?>index.php/package/report_package">Report Package</a></li>-->
    </ul>
  </li>
  <li><a href="<?php echo base_url()?>index.php/sharing"><span class="icon color7"><i class="fa fa-users"></i></span>Sharing Produk</a></li>


<li class="sidetitle"></li>
            <li class="sidetitle"><hr/></li>
        <li><a href="<?php echo PARENT_URL; ?>">
        <span class="icon color7"><i class="fa fa-dashboard"></i></span>Kembali Ke Dashboard</a></li>
    </ul>

</ul>

<!--<ul class="sidebar-panel nav">
  <li class="sidetitle">Report</li>
  <li><a href="#"><span class="icon color7"><i class="fa fa-bar-chart-o"></i></span>Report<span class="caret"></span></a>
    <ul>
      <li><a href="<?php echo base_url()?>index.php/report">Report Sample</a></li>
    </ul>
  </li>
</ul>-->
</div>
<!-- END SIDEBAR -->