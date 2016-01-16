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
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>index.php/masterdata/mastersatuan/proses/<?php echo $refsatuan['idrefsatuan'] ?>">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Master Data Satuan</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            

                            <div class="form-group">
                                <label for="namasatuan" class="col-sm-2 control-label form-label">Nama Satuan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="namasatuan" id="namasatuan" value="<?php echo $refsatuan['namasatuan'] ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="parent" class="col-sm-2 control-label form-label">Satuan Terkecil</label>
                                <div class="col-sm-3">
                                    <select class="selectpicker" data-live-search="true" name="parent">
                                        <option> -- Pilih Satuan Terkecil -- </option>
                                        <?php
                                        foreach ($this->orm->refsatuan->order('idrefsatuan ASC') as $row) {
                                            $strip = "";
                                          for($i=1;$i<=strlen($row['child']);$i++) {
                                              $strip .= "-";
                                          }
                                          $selected = ($row['idrefsatuan']==$refsatuan['child'])?'selected':'';
                                            
                                            ?>  
                                            <option <?php echo $selected ?> value="<?php echo $row['idrefsatuan'] ?>"> 
                                            <?php echo $strip.' '.$row['namasatuan'] ?>  
                                            </option>
                                        <?php } ?>     
                                    </select>
                                </div>
                                <label for="jumlah_perchild" class="col-sm-2 control-label form-label">Jumlah Per-Satuan terkecil</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="jumlah_perchild" id="jumlah_perchild" value="<?php echo $refsatuan['jumlah_perchild'] ?>">
                                </div>
                                 )* Abaikan jika tidak ada satuan terkecil
                            </div>
                            
                       

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white"  onclick="window.parent.GB_hide();">Tutup</button>              
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
    
  
    
    function editItem(idrefsatuan) {
                  GB_show("Edit Items", '<?php echo base_url() ?>index.php/masterdata/mastersatuan/edit/'+idrefsatuan, 600, 980);
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