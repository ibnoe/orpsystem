<div class="content" style="min-height:650px">
    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Master Data</h1>
        <ol class="breadcrumb">
            <li><a href="#">Master Data</a></li>
            <li class="active">master data supplier</li>
        </ol>

        <!-- Start Page Header Right Div -->
        <div class="right">
            <div class="btn-group" role="group" aria-label="...">
                <a data-toggle="modal" data-target="#myModalAdd" onclick="tambah();" class="btn btn-info btn-xl"><i class="fa fa-plus"></i>Tambah Baru</a>
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
                        List Data Supplier
                    </div><div id="err_message"></div>
                    <div class="panel-body table-responsive">
                        <table id="data_table" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Supplier</th>
                                    <th>Nomor Hp Supplier</th>
                                    <th>Email Supplier</th>
                                    <th>Alamat Supplier</th>
                                    <th>Kota Supplier</th>
                                    <th>Jenis Supplier</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $idsupplier = 1;
                                foreach ($supplier as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $idsupplier ?></td>
                                        <td><?php echo $row['namasupplier'] ?></td>
                                        <td><?php echo $row['nomorhpsupplier'] ?></td>
                                        <td><?php echo $row['emailsupplier'] ?></td>
                                        <td><?php echo $row['alamatsupplier'] ?></td>
                                        <td><?php echo $row['kotasupplier'] ?></td>
                                        <td><?php echo $row['jenissupplier'] ?></td>
                                        <td>  <a href="#" data-toggle="modal" data-target="#myModalAdd" class="btn btn-option5" onclick="details(<?php echo $row['idsupplier'] ?>)"><i class="fa fa-edit"></i></a></td>
                                        <td>  <a href="#" data-toggle="modal" class="btn btn-danger" onclick="deleted(<?php echo $row['idsupplier'] ?>)"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <?php
                                    $idsupplier++;
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
            <form class="form-horizontal" id="formadd" method="post" action="<?php echo base_url() ?>index.php/masterdata/mastersupplier/proses/">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><span id="title_modal"></span></h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">

                            <div class="form-group">
                                <label for="namasupplier" class="col-sm-2 control-label form-label">Nama Supplier</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="namasupplier" id="namasupplier">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nomorhpsupplier" class="col-sm-2 control-label form-label">Nomor HP Supplier</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nomorhpsupplier" id="nomorhpsupplier">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="emailsupplier" class="col-sm-2 control-label form-label">Email Supplier</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="emailsupplier" id="emailsupplier">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alamatsupplier" class="col-sm-2 control-label form-label">Alamat Supplier</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="alamatsupplier" id="alamatsupplier">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="kotasupplier" class="col-sm-2 control-label form-label">Kota Supplier</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kotasupplier" id="kotasupplier">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="jenissupplier" class="col-sm-2 control-label form-label">Jenis Supplier (PT, CV, Toko, Retail, Perseorangan, Lainnya)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="jenissupplier" id="jenissupplier">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="keterangan" class="col-sm-2 control-label form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="keterangan" id="keterangan">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idsupplier" id="idsupplier"/>
                        <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>              
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>
                </div>
            </form> 
        </div>
    </div>
    <!-- Modal Add New -->


    <!-- Delete Data -->


    <!-- FOOTER-->
<?php echo Modules::run('front_templates/front_templates/footer'); ?>
    <!-- FOOTER-->
</div>

<script>
    var loading = '<div align="center" class="loading"><img src="<?php echo base_url() ?>front_assets/img/loading.gif"/></div>';

    function tambah() {
        $('#title_modal').text('Tambah Data Supplier');

        $('#idsupplier').val('');
        $('#namasupplier').val('');
        $('#nomorhpsupplier').val('');
        $('#emailsupplier').val('');
        $('#alamatsupplier').val('');
        $('#kotasupplier').val('');
        $('#jenissupplier').val('');
        $('#keterangan').val('');

    }

    function details(id) {
        $('#title_modal').text('Edit Data Supplier');

        uri = '<?php echo base_url() . 'index.php/masterdata/mastersupplier/edit' ?>';
        $.ajax({
            url: uri,
            type: "POST",
            data: {id: id},
            dataType: "json",
            success: function (data)
            {
                //alert(data.response);
                if (data.response == 'success') {
                    $('#idsupplier').val(data.datas.idsupplier);
                    $('#namasupplier').val(data.datas.namasupplier);
                    $('#nomorhpsupplier').val(data.datas.nomorhpsupplier);
                    $('#emailsupplier').val(data.datas.emailsupplier);
                    $('#alamatsupplier').val(data.datas.alamatsupplier);
                    $('#kotasupplier').val(data.datas.kotasupplier);
                    $('#jenissupplier').val(data.datas.jenissupplier);
                    $('#keterangan').val(data.datas.keterangan);

                }

            }
        });



    }


    function deleted(id) {
        var x;
        if (confirm("Yakin akan dihapus?") == true) {
            uri = '<?php echo base_url() . 'index.php/masterdata/mastersupplier/delete' ?>';
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
            $('#title_modal').text('Tambah Data Supplier');
            $("#formadd").validate({
                rules: {
                    namasupplier: "required",
                    nomorhpsupplier: "required"
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