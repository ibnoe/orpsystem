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
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>index.php/package/master_package/proses/<?php echo $package['idpackage'] ?>">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Master Data Package</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">

                            <div class="form-group">
                                <label for="namapackage" class="col-sm-2 control-label form-label">Nama Package</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="namapackage" value="<?php echo $package['namapackage'] ?>" id="namapackage">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="col-sm-2 control-label form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $package['keterangan'] ?>" name="keterangan" id="keterangan">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <h2>Daftar Barang</h2>
                                      <a href="#" class="btn btn-option5" onclick="javascript:addRow('pemesanan_barang');" ><i class="fa fa-plus"></i>Tambah</a>
                                                        <a href="#" class="btn btn-danger" onclick="javascript:deleteRow('pemesanan_barang');" ><i class="fa fa-minus"></i>Hapus</a> 
                                                        <br/>
                                    <table id="pemesanan_barang" width="100%">
                                        <tr bgcolor="white" >
                                            <td width="25px"><b>|#|</b></td>
                                            <td width="35px"><b>|No|</b></td>
                                            <td width="300px"><b>Nama Barang</b></td>
                                            <td width="150px"><b>Jumlah Barang</b></td>
                                            <td width="450px"><b>Keterangan</b></td>
                                        </tr>
                                        <?php
                                        $no = 1;
                                        foreach($package->packagedetail() as $packagedetail) {
                                        echo "<tr>
                                                    <td width=\"25px\"><input type=\"checkbox\" size=\"1\" name=\"chk\"/></td>
                                                    <td width=\"40px\"><input class=\"form-control\" type=\"text\" size=\"3\"  name=\"urutan_jenis_barang[]\" value=\"$no\" \"/></td>
										   <td width=\"150px\">";
                                        echo "<select  id=\"idrefbarang_$no\"  name=\"idrefbarang[]\"  class=\"form-control\">";
                                        echo "<option value=\"0\"> --- Pilih Barang ---</option>";
                                        foreach ($this->orm->refbarang->order('idrefjenisbarang ASC') as $row) {
                                            $selected = ($row['idrefbarang']==$packagedetail['idrefbarang'])?'selected':'';
                                            echo "<option $selected value=\"{$row['idrefbarang']}\">{$row['namabarang']} - {$row['alias']} </option>";
                                        }
                                        echo "</select></td>
							   <td width=\"150px\">"
                                        . "<input class=\"form-control\" type=\"number\" value=\"{$packagedetail['jumlahbarang']}\" id=\"jumlahbarang_$no\" name=\"jumlahbarang[]\" /></td>"
                                        . "<td width=\"150px\">"
                                        . "<input class=\"form-control\" type=\"text\" value=\"{$packagedetail['keterangan']}\" id=\"keterangan_$no\" name=\"keterangan_barang[]\" /></td>";
                                        
                                        $no++;
                                        }
                                        ?>
                                    </table>
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
    
  
    
    function editItem(idpackage) {
                  GB_show("Edit Items", '<?php echo base_url() ?>index.php/package/master_package/edit/'+idpackage, 600, 980);
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