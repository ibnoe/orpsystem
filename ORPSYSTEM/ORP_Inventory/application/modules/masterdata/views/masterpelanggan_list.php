<div class="content" style="min-height:650px">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Master Data</h1>
        <ol class="breadcrumb">
            <li><a href="index.html">Master Data</a></li>
            <li class="active">Master Data Pelanggan</li>
        </ol>

        <!-- Start Page Header Right Div -->
        <div class="right">
            <div class="btn-group" role="group" aria-label="...">
                <a data-toggle="modal" data-target="#myModalAdd" class="btn btn-info btn-xl" onclick="tambah();"><i class="fa fa-plus"></i>Tambah Baru</a>
            </div>
        </div>
        <!-- End Page Header Right Div -->

    </div>
    <!-- End Page Header -->



    <!-- START CONTAINER -->
    <div class="container-width auto" >

        <!-- Start Row -->
        <div class="row">

            <!-- Start Panel -->
            <div class="col-lg-17">
                <div class="panel panel-widget">
                    <div class="panel-title">
                        Master Data Pelanggan
                    </div> <div id="err_message"></div>
                    <div class="panel-body table-responsive">
                        <table id="data_table" class="table display">
                            <thead>
                                <tr>
                                    <th>ID Pelanggan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Nomor HP Pelanggan</th>
                                    <th>Email Pelanggan</th>
                                    <th>Kota Pelanggan</th>
                                    <th>Alamat Pelanggan</th>
                                    <th>Jenis Pelanggan</th>
                                    <th>EDIT</th>
                                    <th>HAPUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $idpelanggan = 1;
                                foreach ($pelanggan as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $idpelanggan ?></td>
                                        <td><?php echo $row['namapelanggan'] ?></td>
                                        <td><?php echo $row['nomorhppelanggan'] ?></td>
                                        <td><?php echo $row['emailpelanggan'] ?></td>
                                        <td><?php echo $row['kotapelanggan'] ?></td>
                                        <td><?php echo $row['alamatpelanggan'] ?></td>
                                        <td><?php echo $row['jenispelanggan'] ?></td>
                                        <td>  <a href="#" data-toggle="modal" data-target="#myModalAdd" class="btn btn-option5" onclick="details(<?php echo $row['idpelanggan'] ?>)"><i class="fa fa-edit"></i></a></td>
                                        <td>  <a href="#" data-toggle="modal" class="btn btn-danger" onclick="deleted(<?php echo $row['idpelanggan'] ?>)"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <?php
                                    $idpelanggan++;
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
    <div class="modal fade" id="myModalAdd" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg"> <div id="message"></div>
            <form class="form-horizontal" id="formadd" method="post" action="<?php echo base_url() ?>index.php/masterdata/masterpelanggan/proses/">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><span id="title_modal"></span></h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="namapelanggan" class="col-sm-2 control-label form-label">Nama Pelanggan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="namapelanggan" id="namapelanggan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nomorhppelanggan" class="col-sm-2 control-label form-label">Nomor Hape Pelanggan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nomorhppelanggan" id="nomorhppelanggan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emailpelanggan" class="col-sm-2 control-label form-label">Email Pelanggan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="emailpelanggan" id="emailpelanggan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kotapelanggan" class="col-sm-2 control-label form-label">Kota Pelanggan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kotapelanggan" id="kotapelanggan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamatpelanggan" class="col-sm-2 control-label form-label">Alamat Pelanggan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="alamatpelanggan" id="alamatpelanggan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jenispelanggan" class="col-sm-2 control-label form-label">Jenis Pelanggan (PT, CV, Toko, Retail, Perseorangan, Lainnya)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="jenispelanggan" id="jenispelanggan">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Keterangan" class="col-sm-2 control-label form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="Keterangan" id="Keterangan">
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idpelanggan" id="idpelanggan"/>
                        <button type="button" id="btnsave" class="btn btn-white" data-dismiss="modal">Tutup</button>              
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>
                </div>
            </form> 
        </div>
    </div>
    <!-- Modal Add New -->

    <!-- FOOTER-->
    <?php echo Modules::run('front_templates/front_templates/footer'); ?>
    <!-- FOOTER-->
</div>


<script>
    var loading = '<div align="center" class="loading"><img src="<?php echo base_url() ?>front_assets/img/loading.gif"/></div>';

    function tambah() {
        $('#title_modal').text('Tambah Data Pelanggan');

        $('#idpelanggan').val('');
        $('#namapelanggan').val('');
        $('#nomorhppelanggan').val('');
        $('#emailpelanggan').val('');
        $('#alamatpelanggan').val('');
        $('#kotapelanggan').val('');
        $('#jenispelanggan').val('');
        $('#keterangan').val('');

    }

    function details(id) {
        $('#title_modal').text('Edit Data Pelanggan');

        uri = '<?php echo base_url() . 'index.php/masterdata/masterpelanggan/edit' ?>';
        $.ajax({
            url: uri,
            type: "POST",
            data: {id: id},
            dataType: "json",
            success: function (data)
            {
                //alert(data.response);
                if (data.response == 'success') {
                    $('#idpelanggan').val(data.datas.idpelanggan);
                    $('#namapelanggan').val(data.datas.namapelanggan);
                    $('#nomorhppelanggan').val(data.datas.nomorhppelanggan);
                    $('#emailpelanggan').val(data.datas.emailpelanggan);
                    $('#alamatpelanggan').val(data.datas.alamatpelanggan);
                    $('#kotapelanggan').val(data.datas.kotapelanggan);
                    $('#jenispelanggan').val(data.datas.jenispelanggan);
                    $('#keterangan').val(data.datas.keterangan);
                }

            }
        });



    }


    function deleted(id) {
        var x;
        if (confirm("Yakin akan dihapus?") == true) {
            uri = '<?php echo base_url() . 'index.php/masterdata/masterpelanggan/delete' ?>';
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
            $('#title_modal').text('Tambah Data Barang');
            $("#formadd").validate({
                rules: {
                    namapelanggan: "required",
                    emailpelanggan: "required",
                    stockawal: {
                        required: true,
                        number: true
                    }
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