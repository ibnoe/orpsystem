<?php
$dashboard = new dashboard_model();
$this->load->view('header_view');
?>
<div role="main" class=container_12 id=content-wrapper>
    <?php $this->load->view('menu_view'); ?>                
    <div id=main_content>
        <h2 class=grid_12>Dashboard</h2>
        <div class=clean></div>
        <div class=clear></div>
        <div class=grid_14>
            <div id=shortcuts-steps class="box tabbed">
                <div class=header>
                    <h3>
                        Menu Utama
                    </h3>
                </div>
                <div class=content>
                    <ul id=shortcuts class="shortcuts tab-content">
                        <li>
                            <div class=shortcut-icon>
                                <img src="<?php echo base_url() ?>front_assets/img/inventory.png" width=25 height=25>
                                <div class=divider>
                                </div>
                            </div>
                            <a class=shortcut-description href="<?php echo base_url('ORP_Inventory/index.php/'); ?>">
                                <strong>
                                    Inventory
                                </strong>
                                <span>
                                    Buka Applikasi
                                </span>
                            </a>
                        </li>
                        <li>
                            <div class=shortcut-icon>
                                <img src="<?php echo base_url() ?>front_assets/img/purchase.png" width=25 height=25>
                                <div class=divider>
                                </div>
                            </div>
                            <a class=shortcut-description href="<?php echo base_url('ORP_Purchase/index.php/'); ?>">
                                <strong>
                                    Purchase
                                </strong>
                                <span>
                                    Buka Applikasi
                                </span>
                            </a>
                        </li>
                        <li>
                            <div class=shortcut-icon>
                                <img src="<?php echo base_url() ?>front_assets/img/sales.png" width=25 height=25>
                                <div class=divider>
                                </div>
                            </div>
                            <a class=shortcut-description href="<?php echo base_url('ORP_Sales/index.php/'); ?>">
                                <strong>
                                    Sales
                                </strong>
                                <span>
                                    Buka Applikasi
                                </span>
                            </a>
                        </li>
                        <li>
                            <div class=shortcut-icon>
                                <img src="<?php echo base_url() ?>front_assets/img/accounting.png" width=25 height=25>
                                <div class=divider>
                                </div>
                            </div>
<!--                                        <a class=shortcut-description href="<?php echo base_url('ORP_Accounting/index.php/'); ?>">-->
                            <a class=shortcut-description href="#">
                                <strong>
                                    Akunting <span style='color: red;'>ON DEVELOPMENT</span>
                                </strong>
                                <span>
                                    Buka Applikasi
                                </span>
                            </a>
                        </li>

                        <li>
                            <div class=shortcut-icon>
                                <img src="<?php echo base_url() ?>front_assets/dashboard/img/icons/25x25/blue/phone-hook.png" width=25 height=25>
                                <div class=divider>
                                </div>
                            </div>
                            <a class=shortcut-description href="<?php echo base_url('ORP_Config/index.php/masterdata/masterpelanggan/'); ?>">
                                <strong>
                                    Daftar Supplier & Pelanggan
                                </strong>
                            </a>
                        </li>
                        <li>
                            <div class=shortcut-icon>
                                <img src="<?php echo base_url() ?>front_assets/dashboard/img/icons/25x25/blue/phone-hook.png" width=25 height=25>
                                <div class=divider>
                                </div>
                            </div>
                            <a class=shortcut-description href="<?php echo base_url('ORP_Config/index.php/masterdata/mastergudang/'); ?>">
                                <strong>
                                    Master Data
                                </strong>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class=grid_5>
            <div class=box>
                <div class=header>
                    <img src="<?php echo base_url() ?>front_assets/dashboard/img/icons/16x16/list.png" alt="" width=16 height=16>
                    <h3>
                        Statistik
                    </h3>
                    <span>
                    </span>
                </div>
                <div class=content>
                    <ul class=stats-list>
                        <li>
                            <a href="#">
                                Total Pelanggan
                                <span>
                                    <?php echo $dashboard->_getTotalPelanggan(); ?>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Total Supplier
                                <span>
                                    <?php echo $dashboard->_getTotalSupplier(); ?>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Total Transaksi Penjualan
                                <span>
                                    <?php echo $dashboard->_getTotalPenjualan(); ?>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Total Transaksi Pengadaan
                                <span>
                                    <?php echo $dashboard->_getTotalPengadaan(); ?>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Total Jenis Barang
                                <span>
                                    <?php echo $dashboard->_getTotalJenisBarang(); ?>
                                </span>
                            </a>
                        </li>

                    </ul>

                    <div class=clear>
                    </div>
                </div>


            </div>
        </div>
        <div class=grid_7>
            <div class=box>
                <div class=header>
                    <img src="<?php echo base_url() ?>front_assets/dashboard/img/icons/16x16/list.png" alt="" width=16 height=16>
                    <h3>
                        Logs History
                    </h3>
                    <span>
                    </span>
                </div>


                <div class=actions>

                    <?php foreach ($logs as $row) { ?>  
                        <div class="activity fixed medium">
                            <div class=description>
                                <span>
                                </span>
                                <a>
                                    <?php echo $row['namalengkap'] ?>
                                </a>

                                <?php echo $row->refjenislogs['jenis'] ?> pada <?php echo Tanggal::formatDateTime($row['logstime']) ?>

                            </div>
                        </div>
                    <?php } ?>    

                </div>
            </div>
        </div>
    </div>

    <div class="push clear"></div>
</div>

<?php $this->load->view('footer_view'); ?>    