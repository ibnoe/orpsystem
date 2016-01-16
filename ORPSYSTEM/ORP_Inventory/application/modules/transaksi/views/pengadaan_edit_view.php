 <link href="<?php echo base_url() ?>front_assets/css/root.css" rel="stylesheet">
 
<link href="<?php echo base_url() ?>front_assets/library/gb/greybox.css" rel="stylesheet">
<script src="<?php echo base_url()?>front_assets/library/gb/greybox.js"></script>



    <!-- Modal Add New -->
    <div style="overflow-x: no-display">
    <div class="container-width" >

        <!-- Start Row -->
        <div class="row">

            <!-- Start Panel -->
            <div class="col-lg-12">
        
                <div class=""  style="min-width: 98%; overflow-x: hidden;">
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>index.php/transaksi/pengadaan/proses/<?php echo $pengadaan['idpengadaan'] ?>">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Pengadaan</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="nomorpengadaan" class="col-sm-2 control-label form-label">Nomor Pengadaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nomorpengadaan" id="nomorpengadaan" value="<?php echo $pengadaan['nomorpengadaan'] ?>">
                                </div>
                            </div>
							<div class="form-group">
                                <label for="tanggalpengadaan" class="col-sm-2 control-label form-label">Tanggal Pengadan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tanggalpengadaan" id="tanggalpengadaan" value="<?php echo $pengadaan['tanggalpengadaan'] ?>">
                                </div>
                            </div>
							<div class="form-group">
                                <label for="nomorreff" class="col-sm-2 control-label form-label">Nomor Referensi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nomorreff" id="nomorreff" value="<?php echo $pengadaan['nomorreff'] ?>">
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
    
  
    
    function editItem(idpengadaan) {
                  GB_show("Edit Items", '<?php echo base_url() ?>index.php/transaksi/pengadaan/edit/'+idpengadaan, 5100, 480);
                  $('html, body').animate({scrollTop: 0}, 'slow');
              }
</script>

<script> 
          $(document).ready(function () {
            $("#alerttopright").fadeToggle(100);
        
              });
    
    function messageOut(id) {
         $("#"+id).fadeOut(100);
    } </script>