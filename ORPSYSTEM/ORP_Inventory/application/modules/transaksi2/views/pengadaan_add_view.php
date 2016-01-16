 <link href="<?php echo base_url() ?>front_assets/css/root.css" rel="stylesheet">
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS ?>assets/plugins/select2/select2.css" />
    <link rel="stylesheet" href="<?php echo PATH_ASSETS ?>assets/plugins/select2/select2.css">
    <script type="text/javascript" src="<?php echo PATH_ASSETS ?>assets/library/gb/greybox.js"></script>
    <link type="text/css" href="<?php echo PATH_ASSETS ?>assets/library/gb/greybox.css" rel="stylesheet" />
<!-- end: HEAD -->
<!-- start: BODY -->

<body>
    <!-- start: HEADER -->

    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    <!-- end: HEADER -->
    <!-- start: MAIN CONTAINER -->

    <div style="background-color: #ffffff">



        <div class="modal-footer">

            <button type="button" class="btn btn-blue" onclick="processSubmitForm();">
                Proses
            </button>
        </div>


        <div class="tabbable">
            <ul id="myTab4" class="nav nav-tabs tab-padding tab-space-3 tab-blue">
                <li class="active">
                    <a href="#tab1" data-toggle="tab">
                        Delivery Order
                    </a>
                </li> 
                <li>
                    <a href="#tab2" data-toggle="tab">
                        Pemesanan Barang
                    </a>

                </li> 

            </ul>
            <form role="form" action="<?php echo site_url('/') ?>transaksi/deliveryorder/add_proccess" id="form_entry" name="form_entry" class="form-horizontal" method="POST"  enctype="multipart/form-data">

                <div class="tab-content">
                    <div class="tab-pane in active" id="tab1">



                        <div class="row">
                            <div class="col-md-12">


                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="nomorDO">
                                        Nomor DO
                                    </label>
                                    <div class="col-sm-3">
                                        <input type="hidden" name="nomorDO" placeholder="Nomor DO" value=""   class="form-control">
                                        <strong></strong>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="tanggalDO">
                                        Tanggal DO
                                    </label>
                                    <div class="col-sm-5 input-group">
                                        <input type="text" name="tanggalDO"   data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y") ?>" data-date-viewmode="years" class="form-control date-picker">
                                        <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="nomorPO">
                                        Nomor PO
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="nomorPO" placeholder="Nomor PO" id="nomorPO"  class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="nomorSO">
                                        Lampiran
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="nomorSO" placeholder="Lampiran" id="nomorSO"  class="form-control">
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="idPelanggan">
                                        Pelanggan
                                    </label>
                                    <div class="col-sm-6">

                                        <input type="text" list="dataPelanggan" name="idPelanggan" class="form-control" />
                                        <datalist id="dataPelanggan">
                                            <?php foreach ($pelanggan as $row) { ?>
                                                 <option value="<?php echo $row['namaPelanggan'] ?>"><?php echo $row['namaPelanggan'] ?></option>
                                             <?php } ?>

                                        </datalist>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="nomorSO">
                                        Disetujui Oleh
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="disetujui" placeholder="Disetujui Oleh" id="disetujui"  class="form-control">
                                    </div>
                                </div>

                            </div> 
                        </div>


                    </div>  
                    <div class="tab-pane" id="tab2"> 


                        <table>
                            <tr>
                                <td id="title">
                                    <hr/>
                                    <input onclick="javascript:addRow('pemesanan_barang');" type="button" value="tambah" class='ui-button ui-state-default ui-corner-all' />  &nbsp; &nbsp;  <input onclick="javascript:deleteRow('pemesanan_barang');" type="button" value="hapus" class='ui-button ui-state-default ui-corner-all' />
                                    <hr/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table id="pemesanan_barang" width="150%">
                                        <tr bgcolor="#dddddd" >
                                            <td width="25px"><b>|#|</b> &nbsp; </td>
                                            <td width="40px"><b>| No |</b> &nbsp; </td>
                                            <td width="350px"><b>| Jenis Barang |</b> &nbsp; </td>
                                            <td width="150px"><b>| Ukuran |</b> &nbsp; </td>
                                            <td width="150px"><b>| Jenis |</b> &nbsp; </td>
                                            <td width="90px"><b>| Jumlah |</b> &nbsp; </td>
                                            <td width="90px"><b>| Sisa Stock |</b> &nbsp; </td>
                                            <td width="190px"><b>| Keterangan |</b> &nbsp; </td>
                                        </tr>
                                        <?php
                                         echo "<tr>
                                                    <td width=\"25px\"><input type=\"checkbox\" size=\"1\" name=\"chk\"/></td>
                                                    <td width=\"40px\"><input class=\"form-control\" type=\"text\" size=\"3\"  name=\"urutan_jenis_barang[]\" value=\"1\" \"/></td>
                                                    <td width=\"350px\">";

                                         echo "<select  id=\"idRefBarang_1\"  name=\"idRefBarang[]\" onChange=\"getUkuran(this.id,this.value)\" class=\"form-control\">";
                                         echo "<option value=\"0\"> --- Pilih Jenis Barang ---</option>";
                                         foreach ($barang as $row) {
                                             echo "<option value=\"{$row['idRefBarang']}\">{$row['namaBarang']} - {$row['jenisBarang']} ({$row['ukuran']})</option>";
                                         }
                                         echo "</select></td><td width=\"90px\">"
                                         . "<input class=\"form-control\" type=\"text\" id=\"ukuranDetail_1\"   name=\"ukuranDetail[]\" /></td>"
                                                 . "<td width=\"90px\"><input class=\"form-control\" type=\"text\" id=\"jenisBarangDetail_1\"   name=\"jenisBarangDetail[]\" /></td>"
                                                 . "<td width=\"90px\"><input class=\"form-control\" type=\"number\"   name=\"jumlahBarang[]\" style=\"font-weight: bolder; text-align: right;\" value=\"1\" \"/></td>"
                                                 . "<td width=\"90px\"><input class=\"form-control\" type=\"number\" id=\"stock_1\" disabled=\"disabled\" style=\"background-color : #d1d1ff; font-weight: bolder; text-align: right;\"   name=\"stock[]\" value=\"\" \"/></td>"
                                                 . "<td width=\"190px\"><input class=\"form-control\" type=\"text\"  name=\"keterangan[]\" \"/></td>";
                                        ?>
                                    </table>
                                    <br/>                                                 
                                </td>
                            </tr> 
                        </table>


                    </div>
                </div>
            </form>
            <!-- start: MAIN JAVASCRIPTS -->
        
<!-- FOOTER-->
<?php echo Modules::run('front_templates/front_templates/footer'); ?>
<!-- FOOTER-->
<!-- END CONTAINER -->
<!-- End Content -->
<?php echo Modules::run('front_templates/front_templates/js_master'); ?>

            <script>
                                          jQuery(document).ready(function() {
                                              Main.init();
                                              FormElements.init();
                                          });

                                          function processSubmitForm() {
                                              document.form_entry.submit();

                                          }

                                          function getUkuran(id, value) {


                                              var url = '<?php echo site_url('/') ?>ajax/combobox/getUkuranBarang';

                                              $.post(url,
                                                      {
                                                          id: id,
                                                          idRefBarang: value

                                                      },
                                              function(data, status) {

                                                  if (data.result) {

                                                      $('#ukuranDetail_' + data.id + '').val(data.ukuran);
                                                      $('#stock_' + data.id + '').val(data.stock);
                                                  }


                                              }, "json");
                                              
                                              
                                           
                                           var url = '<?php echo site_url('/') ?>ajax/combobox/getJenisBarang';

                                              $.post(url,
                                                      {
                                                          id: id,
                                                          idRefBarang: value

                                                      },
                                              function(data, status) {

                                                  if (data.result) {

                                                      $('#jenisBarangDetail_' + data.id + '').val(data.jenisBarang);
                                                  }


                                              }, "json");
                                          }
                                          
                                          

            </script>                   
          <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
            <script src="<?php echo PATH_ASSETS ?>assets/plugins/select2/select2.min.js"></script>
            <script src="<?php echo PATH_ASSETS ?>assets/plugins/select2/select2.min.js"></script>
            <script src="<?php echo PATH_ASSETS ?>assets/js/form-elements.js"></script>
            <script src="<?php echo PATH_ASSETS ?>assets/pages/penerimaan/form-validation.js"></script>
            <script src="<?php echo PATH_ASSETS ?>assets/plugins/grid/standard.js"></script>
            </body>
            <!-- end: BODY -->
            </html>