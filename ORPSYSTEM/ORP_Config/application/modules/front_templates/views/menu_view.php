
<!-- START SIDEBAR -->
<div class="sidebar clearfix">

    <ul class="sidebar-panel nav">
        <li class="sidetitle">MAIN MENU</li>
    
	
		<?php if(isset($_SESSION['config_menu'])) { 
			
			if($_SESSION['config_menu']=='master_data') {
		?>
		
		<li><a href="<?php echo base_url(); ?>index.php/masterdata/mastergudang">
                <span class="icon color7"><i class="fa fa-database"></i></span>Master Data Gudang</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/masterdata/masterjenisbarang">
                <span class="icon color7"><i class="fa fa-database"></i></span>Master Jenis Barang</a></li>
						<li><a href="<?php echo base_url(); ?>index.php/masterdata/mastersatuan">
                <span class="icon color7"><i class="fa fa-database"></i></span>Master Satuan</a></li>
								<li><a href="<?php echo base_url(); ?>index.php/masterdata/masterpackaging">
                <span class="icon color7"><i class="fa fa-database"></i></span>Master Pengemasan</a></li>
										<li><a href="<?php echo base_url(); ?>index.php/masterdata/masterbarang">
                <span class="icon color7"><i class="fa fa-database"></i></span>Master Data Barang</a></li>
		
			<?php }  
			
			if($_SESSION['config_menu']=='pelanggan_supplier') {
			?>
        <li><a href="<?php echo base_url(); ?>index.php/masterdata/masterpelanggan">
                <span class="icon color7"><i class="fa fa-database"></i></span>Data Pelanggan</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/masterdata/mastersupplier">
				<span class="icon color7"><i class="fa fa-database"></i></span>Data Supplier</a></li>

		<?php 
			}
		} ?>
		
		        <li class="sidetitle"></li>
		        <li class="sidetitle"><hr/></li>
				<li><a href="<?php echo PARENT_URL; ?>">
				<span class="icon color7"><i class="fa fa-dashboard"></i></span>Kembali Ke Dashboard</a></li>
    </ul>

    <!--<ul class="sidebar-panel nav">
      <li class="sidetitle">Report</li>
      <li><span class="icon color7"><i class="fa fa-bar-chart-o"></i></span>Report</a>
        <ul>
          <li><a href="<?php echo base_url() ?>index.php/report">Report Sample</a></li>
        </ul>
      </li>
    </ul>-->
</div>
<!-- END SIDEBAR -->