
<?php echo Modules::run('front_templates/front_templates/header'); ?>
<?php echo Modules::run('front_templates/front_templates/menu'); ?>
	  

<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Transaksi</h1>
      <ol class="breadcrumb">
	   <li><a href="#">Transaksi</a></li>
        <li class="active">Quotation</li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a data-toggle="modal" data-target="#myModalAdd" class="btn btn-default btn-xl"><i class="fa fa-plus"></i>Tambah</a>
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->



<!-- START CONTAINER -->
<div class="container-padding">
  <!-- Start Row -->
  <div class="row">
    <!-- Start Panel -->
    <div class="col-lg-17">
      <div class="panel panel-default">
        <div class="panel-title">
         Data Quotation
        </div>
        <div class="panel-body table-responsive">
            <table id="example0" class="table display">
                <thead>
                    <tr>
						<th>ID Quotation</th>
                        <th>Nomor Quotation</th>
                        <th>Tanggal Quotation</th>
						<th>Pelanggan</th>
						<th>Action</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                                $idquotationsales = 1;
                                foreach ($quotationsales as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $idquotationsales ?></td>
                                        <td><?php echo $row['nomor'] ?></td>
                                        <td><?php echo $row['tanggal'] ?></td>
                                        <td><?php echo $row['idpelanggan'] ?></td>
                                        <td>  <a href="#" data-toggle="modal" data-target="#myModalAdd" class="btn btn-option5" onclick="details(<?php echo $row['idquotationsales'] ?>)"><i class="fa fa-edit"></i></a></td>
                                        <td>  <a href="#" data-toggle="modal" class="btn btn-danger" onclick="deleted(<?php echo $row['idquotationsales'] ?>)"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <?php
                                    $idquotationsales++;
                                }
                                ?>        

									
            </table>
        </div>
      </div>
    </div>
    <!-- End Panel -->
  </div>
  <!-- End Row -->
</div>
<!-- END CONTAINER -->



    <!-- Modal Add New -->
    <div class="modal fade" id="myModalAdd" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg"> <div id="message"></div>
            <form class="form-horizontal" id="formadd" method="post" action="<?php echo base_url() ?>index.php/quotation/proses/" enctype="multipart/form-data">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><span id="title_modal"></span></h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">


                            <div class="form-group">
                                <label for="idquotationsales" class="col-sm-2 control-label form-label">Id Quotation Sales</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="idquotationsales" id="idquotationsales">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nomor" class="col-sm-2 control-label form-label">Nomor</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nomor" id="nomor">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="col-sm-2 control-label form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="tanggal" id="tanggal">
                                </div>
                            </div>
                         
                             <div class="form-group">
                                <label for="nopelanggan" class="col-sm-2 control-label form-label">No Pelanggan</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="nopelanggan" id="nopelanggan">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idquotationsales" id="idquotationsales"/>
                        <button type="button" id="btnsave" class="btn btn-white" data-dismiss="modal">Tutup</button>              
                        <input type="submit"  class="btn btn-success" value="Simpan">
                    </div>
                </div>
            </form> 
        </div>
    </div>
    <!-- Modal Add New -->

    <!-- FOOTER-->
    <?php echo Modules::run('front_templates/front_templates/footer'); ?>
    <link href="<?php echo base_url() ?>front_assets/css/datepicker.css" rel="stylesheet" type="text/css" />
 <script src="<?php echo base_url() ?>front_assets/js/grid/standard.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>front_assets/js/bootstrap-datepicker.js"></script>
    <!-- FOOTER-->
</div>



<script>
    var loading = '<div align="center" class="loading"><img src="<?php echo base_url() ?>front_assets/img/loading.gif"/></div>';

    function tambah() {
        $('#title_modal').text('Tambah Data Quotation');
        $('#idquotationsales').val('');
        $('#nomor').val('');
        $('#tanggal').val('');
        $('#idpelanggan').val('');

    }

    function details(id) {
        $('#title_modal').text('Edit Data Quotation');

        uri = '<?php echo base_url() . 'index.php/quotation/edit' ?>';
        $.ajax({
            url: uri,
            type: "POST",
            data: {id: id},
            dataType: "json",
            success: function (data)
            {
                //alert(data.response);
                if (data.response == 'success') {
                    $('#idrefbarang').val(data.datas.idrefbarang);
                    $('#kodebarang').val(data.datas.kodebarang);
                    $('#namabarang').val(data.datas.namabarang);
                    $('#idrefjenisbarang').val(data.datas.idrefjenisbarang);
                    $('#stockawal').val(data.datas.stockawal);
                    $('#idrefsatuan').val(data.datas.idrefsatuan);
                    $('#idpackaging').val(data.datas.idpackaging);
                    $('#idrefgudang').val(data.datas.idrefgudang);
                    
                    $('#div_image_file').html('<img src="<?php echo base_url() ?>uploads/items/'+data.datas.image_file+'" width="150">');

                }

            }
        });



    }


    function deleted(id) {
        var x;
        if (confirm("Yakin akan dihapus?") == true) {
            uri = '<?php echo base_url() . 'index.php/quotation/delete' ?>';
            $.ajax({
                url: uri,
                type: "POST",
                data: {id: id},
                dataType: "json",
                success: function (data)
                {
                    //alert(data.response);
                    if (data.response == 'success') {
                        var msg = '<div class="alert alert-success alert-dismissable">' + data.msg + '</div>';
                        $("#err_message").html(msg);
                        $('#err_message').fadeTo(3000, 500).slideUp(500, function () {
                            $('#err_message').hide();
                            reloadlist();
                        });

                    } else if (data.response == 'error') {
                        var msg = '<div class="alert alert-success alert-dismissable">' + data.msg + '</div>';
                        $("#err_message").html(msg);
                        $('#err_message').alert();
                        $('#err_message').fadeTo(2000, 500).slideUp(500, function () {
                            $('#err_message').hide();
                        });
                    }

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    var msg = '<div class="alert alert-error alert-dismissable">' + errorThrown + '</div>';
                    $("#err_message").html(msg);
                    $('#err_message').alert();
                    $('#err_message').fadeTo(2000, 500).slideUp(500, function () {
                        $('#err_message').hide();

                    });
                    reloadlist();
                }
            });
        }
    }

    var Script = function () {

        $.validator.setDefaults({
            submitHandler: function () {
                //$("#message").html("<img src='loading.gif'/>");
                var postData = new FormData($('#formadd')[0]);
                var formURL = $('#formadd').attr("action");
                var btn = $('#btnsave');
                var css = btn.attr("class");
                var text = btn.html();
                var loading = '<div align="center" class="loading"><img src="<?php echo base_url() ?>front_assets/img/loading.gif"></div>';
                btn.html("Please wait..");
                btn.attr("class", "btn btn-primary disabled");

                $.ajax({
                    url: formURL,
                    type: "POST",
                    data: postData,
                    dataType: "json",
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data)
                    {
                        //alert(data.response);
                        if (data.response == 'success') {
                            var msg = '<div class="alert alert-success alert-dismissable">' + data.msg + '</div>';
                            $("#err_message").html(msg);

                            btn.html("Success...");
                            $('#myModalAdd').find(".close").click();
                            $('#err_message').fadeTo(3000, 500).slideUp(500, function () {
                                $('#err_message').hide();
                                $('#myModalAdd').find(".close").click();
                                //	$('#list_data').html(loading);
                                $.post("<?php echo $link ?>", function (data)
                                {
                                    $('#list_data').html(data);
                                    $('#data_table').dataTable({
                                        oLanguage: {
                                            sLoadingRecords: '<img src="<?php echo base_url() ?>front_assets/img/loading.gif">'
                                        }
                                    });
                                });
                            });

                        } else if (data.response == 'error') {
                            var msg = '<div class="alert alert-success alert-dismissable">' + data.msg + '</div>';
                            $("#message").html(msg);
                            $('#message').alert();
                            $('#message').fadeTo(2000, 500).slideUp(500, function () {
                                $('#message').hide();
                            });
                        }

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        var msg = '<div class="alert alert-error alert-dismissable">' + errorThrown + '</div>';
                        $("#message").html(msg);
                        $('#message').alert();
                        $('#message').fadeTo(2000, 500).slideUp(500, function () {
                            $('#message').hide();

                        });
                        reloadlist();
                    }
                });
            }
        });

        $().ready(function () {
            $('#title_modal').text('Tambah Data Quotation');
            $("#formadd").validate({
                rules: {
                    kodebarang: "required",
                    namabarang: "required"
                },
                highlight: function (element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function (element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                errorElement: 'span',
                errorClass: 'help-block',
                errorPlacement: function (error, element) {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
        });
    }();
    /*
     function reloadlist(){
     $('#list_data').html(loading);
     $.post("<?php echo $link ?>",function(data) 
     {
     $('#list_data').html(data);
     $('#data_table').dataTable({
     oLanguage: {
     sLoadingRecords: '<img src="<?php echo base_url() ?>front_assets/img/loading.gif">'
     }					
     });
     });
     }
     */
</script>