<link rel="stylesheet" href="<?php echo base_url() ?>front_assets/css/css.css">
<!-- START CONTENT -->
<div class="content" style="min-height:650px">
    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Master Data</h1>
        <ol class="breadcrumb">
            <li><a href="#">Master Data</a></li>
            <li class="active">Master Data Barang</li>
        </ol>


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
                        List Data Barang
                    </div> <div id="err_message"></div>
                    <div class="panel-body table-responsive">
                        <table id="data_table" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Jenis Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Stock Awal</th>
                                    <th>Stock Saat Ini</th>
                                    <th>Satuan</th>
                                    <th>Detail</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($refbarang as $row) {
                                    $jenisbarang = $this->orm->refjenisbarang->where('idrefjenisbarang', "{$row['idrefjenisbarang']}")->fetch();
                                    ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $row['kodebarang'] ?></td>
                                        <td><?php echo $jenisbarang['jenisbarang'] ?></td>
                                        <td><?php echo $row['namabarang'] ?></td>
                                        <td><?php echo $row['stockawal'] ?></td>
                                        <td><?php echo $row['stock'] ?></td>
                                        <td><?php echo $row->refsatuan['namasatuan'] ?></td>
                                        <td>  <a href="#" data-toggle="modal" data-target="#myModalAdd" class="btn btn-option5" onclick="details(<?php echo $row['idrefbarang'] ?>)"><i class="fa fa-edit"></i></a></td>
                                        <td>  <a href="#" data-toggle="modal" class="btn btn-danger" onclick="deleted(<?php echo $row['idrefbarang'] ?>)"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <?php
                                    $no++;
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
            <form class="form-horizontal" id="formadd" method="post" action="<?php echo base_url() ?>index.php/masterdata/masterbarang/proses/" enctype="multipart/form-data">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><span id="title_modal"></span></h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">


                            <div class="form-group">
                                <label for="kodebarang" class="col-sm-2 control-label form-label">Kode Barang (SKU)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kodebarang" id="kodebarang">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="namabarang" class="col-sm-2 control-label form-label">Nama Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="namabarang" id="namabarang">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="idrefjenisbarang" class="col-sm-2 control-label form-label">Jenis Barang</label>
                                <div class="col-sm-10">
                                    <select name="idrefjenisbarang" id="idrefjenisbarang" class="selectpicker show-menu-arrow" data-live-search="true">
                                        <?php
                                        foreach ($this->orm->refjenisbarang->order('idrefjenisbarang ASC') as $row) {
                                            $strip = "";
                                            for ($i = 1; $i <= strlen($row['parent']); $i++) {
                                                $strip .= "-";
                                            }
                                            ?>
                                            <option value="<?php echo $row['idrefjenisbarang'] ?>"> <?php echo $strip . ' ' . $row['jenisbarang'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stockawal" class="col-sm-2 control-label form-label">Stock Awal</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="stockawal" id="stockawal">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="idrefsatuan" class="col-sm-2 control-label form-label">Satuan</label>
                                <div class="col-sm-10">
                                    <select name="idrefsatuan" id="idrefsatuan" class="selectpicker show-menu-arrow" data-live-search="true">
                                        <?php
                                        foreach ($this->orm->refsatuan->order('idrefsatuan ASC') as $row) {
                                            $strip = "";
                                            for ($i = 1; $i <= strlen($row['child']); $i++) {
                                                $strip .= "-";
                                            }
                                            ?>
                                            <option value="<?php echo $row['idrefsatuan'] ?>"> <?php echo $strip . ' ' . $row['namasatuan'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="idpackaging" class="col-sm-2 control-label form-label">Packaging</label>
                                <div class="col-sm-10">
                                    <select name="idpackaging" id="idpackaging" class="selectpicker show-menu-arrow" data-live-search="true" data-width="340px" >
                                        <?php foreach ($this->orm->packaging() as $row) { ?>
                                            <option value="<?php echo $row['idpackaging'] ?>"> <?php echo $row['nama'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="idrefgudang" class="col-sm-2 control-label form-label">Lokasi Gudang</label>
                                <div class="col-sm-10">
                                    <select name="idrefgudang" id="idrefgudang" class="selectpicker show-menu-arrow" data-live-search="true">
                                        <?php foreach ($this->orm->refgudang() as $row) { ?>
                                            <option value="<?php echo $row['idrefgudang'] ?>"> <?php echo $row['nomorgudang'] . ' - ' . $row['namagudang'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                         
                            <div class="form-group">
                                <label for="image_file" class="col-sm-2 control-label form-label">Gambar</label>
                                <div class="col-sm-10">
                                    
                                    <input type="file" class="form-control" name="image_file" id="image_file">
                                     <br/>
                                     <div id="div_image_file"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idrefbarang" id="idrefbarang"/>
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
        $('#title_modal').text('Tambah Data Barang');

        $('#idrefbarang').val('');
        $('#kodebarang').val('');
        $('#namabarang').val('');
        $('#idrefjenisbarang').val('');
        $('#stockawal').val('');
        $('#idrefsatuan').val('');
        $('#idpackaging').val('');
        $('#idrefgudang').val('');
        $('#image_file').val('');

    }

    function details(id) {
        $('#title_modal').text('Edit Data Barang');

        uri = '<?php echo base_url() . 'index.php/masterdata/masterbarang/edit' ?>';
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
            uri = '<?php echo base_url() . 'index.php/masterdata/masterbarang/delete' ?>';
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
                    kodebarang: "required",
                    namabarang: "required",
                    idrefjenisbarang: "required",
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