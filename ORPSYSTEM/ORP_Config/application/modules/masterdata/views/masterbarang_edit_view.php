<link href="<?php echo base_url() ?>front_assets/css/root.css" rel="stylesheet">

<link href="<?php echo base_url() ?>front_assets/library/gb/greybox.css" rel="stylesheet">
<script src="<?php echo base_url() ?>front_assets/library/gb/greybox.js"></script>

<!-- Modal Add New -->
<div style="overflow-x: no-display">
    <div class="container-width" >

        <!-- Start Row -->
        <div class="row">

            <!-- Start Panel -->
            <div class="col-lg-12">

                <div class=""  style="min-width: 98%; overflow-x: hidden;">
                    <form class="form-horizontal" method="post" action="<?php echo base_url() ?>index.php/masterdata/masterbarang/proses/<?php echo $refbarang['idrefbarang'] ?>" enctype="multipart/form-data">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Master Data Barang</h4>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">


                                    <div class="form-group">
                                        <label for="kodebarang" class="col-sm-2 control-label form-label">Kode Barang (SKU)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="kodebarang" id="kodebarang" value="<?php echo $refbarang['kodebarang'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="namabarang" class="col-sm-2 control-label form-label">Nama Barang</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="namabarang" id="namabarang" value="<?php echo $refbarang['namabarang'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="idrefjenisbarang" class="col-sm-2 control-label form-label">Jenis Barang</label>
                                        <div class="col-sm-10">
                                            <select name="idrefjenisbarang" id="idrefjenisbarang" class="form-control">
                                                <?php
                                                foreach ($this->orm->refjenisbarang() as $row) {
                                                    $select = ($row['idrefjenisbarang'] == $refbarang['idrefjenisbarang']) ? 'selected' : '';
                                                    ?>
                                                    <option <?php echo $select ?> value="<?php echo $row['idrefjenisbarang'] ?>"> <?php echo $row['jenisbarang'] ?> </option>
<?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="stockawal" class="col-sm-2 control-label form-label">Stock Awal</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="stockawal" value="<?php echo $refbarang['stockawal'] ?>" id="stockawal">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="idrefsatuan" class="col-sm-2 control-label form-label">Satuan</label>
                                        <div class="col-sm-10">
                                            <select name="idrefsatuan" id="idrefsatuan" class="form-control">
                                                <?php
                                                foreach ($this->orm->refsatuan() as $row) {
                                                    $select = ($row['idrefsatuan'] == $refbarang['idrefsatuan']) ? 'selected' : '';
                                                    ?>
                                                    <option <?php echo $select ?> value="<?php echo $row['idrefsatuan'] ?>"> <?php echo $row['namasatuan'] ?> </option>
<?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="idpackaging" class="col-sm-2 control-label form-label">Packaging</label>
                                        <div class="col-sm-10">
                                            <select name="idpackaging" id="idpackaging" class="selectpicker" data-live-search="true">
                                                <?php foreach ($this->orm->packaging() as $row) { 
                                                      $select = ($row['idpackaging'] == $refbarang['idpackaging']) ? 'selected' : '';
                                                    ?>
                                                    <option <?php echo $select ?> value="<?php echo $row['idpackaging'] ?>"> <?php echo $row['nama'] ?> </option>
<?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="idrefgudang" class="col-sm-2 control-label form-label">Lokasi Gudang</label>
                                        <div class="col-sm-10">
                                            <select name="idrefgudang" id="idrefgudang" class="form-control">
                                                <?php
                                                foreach ($this->orm->refgudang() as $row) {
                                                    $select = ($row['idrefgudang'] == $refbarang['idrefgudang']) ? 'selected' : '';
                                                    ?>
                                                    <option <?php echo $select ?> value="<?php echo $row['idrefgudang'] ?>"> <?php echo $row['nomorgudang'] . ' - ' . $row['namagudang'] ?> </option>
<?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10">
<?php if (!empty($refbarang['image_file'])) { ?>
                                                <img src="<?php echo base_url() . PATH_IMAGES_ITEMS . $refbarang['image_file'] ?>" width="200" >
<?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image_file" class="col-sm-2 control-label form-label">Gambar</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="image_file" id="image_file">
                                            )* Jika tidak ingin mengubah file gambar, abaikan saja
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white"  onclick="parent.GB_hide();">Tutup</button>              
                                <input type="submit" class="btn btn-success" value="Simpan Perubahan">
                            </div>
                        </div>
                    </form> 
                </div>
            </div></div></div></div>
<!-- Modal Add New -->


<!-- Delete Data -->



</div>
<!-- END CONTAINER -->
<!-- START SIDEPANEL -->
<?php echo Modules::run('front_templates/front_templates/notification'); ?>
<!-- END SIDEPANEL -->
<?php echo Modules::run('front_templates/front_templates/js_master'); ?>

<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
<script type="text/javascript" src="<?php echo base_url() ?>front_assets/js/plugins.js"></script>

<!-- ================================================
Sweet Alert
================================================ -->
<script src="<?php echo base_url() ?>front_assets/js/sweet-alert/sweet-alert.min.js"></script>

<!-- ================================================
Kode Alert
================================================ -->
<script src="<?php echo base_url() ?>front_assets/js/kode-alert/main.js"></script>

<script>
    $(document).ready(function () {
        $('#example0').DataTable();
    });



    function editItem(idrefbarang) {
        GB_show("Edit Items", '<?php echo base_url() ?>index.php/masterdata/masterbarang/edit/' + idrefbarang, 600, 980);
        $('html, body').animate({scrollTop: 0}, 'slow');
    }
</script>

<script>
    $(document).ready(function () {
        $("#alerttopright").fadeToggle(100);

    });

    function messageOut(id) {
        $("#" + id).fadeOut(100);
    }</script>