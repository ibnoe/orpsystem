<link rel="stylesheet" href="<?php echo base_url() ?>front_assets/css/css.css">

<!-- START CONTENT -->
<div class="content">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Transaksi</h1>
        <ol class="breadcrumb">
            <li><a href="index.html">Transaksi</a></li>
            <li class="active">Transaksi Delivery Order</li>
        </ol>

        <!-- Start Page Header Right Div -->
        <div class="right">
            <div class="btn-group" role="group" aria-label="...">
				<a href="#" data-toggle="modal" data-target="#myModalAdd" class="btn btn-info btn-xl" id="newData"><i class="fa fa-plus"></i>Tambah Baru</a>
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
                    <div class="right" style="text-align: right;">
                        <div class="btn-group" role="group" aria-label="...">
                            <a href="#" class="btn btn-danger" onclick="cetakDaftar()"><i class="fa fa-file"></i>Cetak Daftar Delivery Order</a>
					   </div>
                    </div>
                    <div class="panel-title">
                        Data Delivery Order
                    </div>
					<div id="message"></div>
                    <div class="panel-body table-responsive">
                        <table id="example0" class="table display">
                            <thead>
                                <tr>
                                    <th>ID DO</th>
                                    <th>Nomor DO</th>
                                    <th>Tanggal DO</th>
                                    <th>Pelanggan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $iddeliveryorder = 1;
                                foreach ($deliveryorder as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $iddeliveryorder ?></td>
                                        <td><?php echo $row['nomordo'] ?></td>
                                        <td><?php echo $row['tanggaldo'] ?></td>
                                        <td><?php echo $row->pelanggan['namapelanggan'] ?></td>
                                        <td><?php echo $row['status'] ?></td>
                                        <td>
											<a data-toggle="modal" data-target="#myModalEdit" class="btn btn-option5" onclick="details('<?php echo  $row['iddeliveryorder']; ?>')"><i class="fa fa-edit"></i>Detail</a>
                                            <a href="#" onclick="deleted('<?php echo $row['iddeliveryorder']?>')" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</a> 
                                            <a href="#" onclick="cetak(<?php echo $row['iddeliveryorder'] ?>)" class="btn btn-primary"><i class="fa fa-print"></i>Print</a>
                                        </td>

                                    </tr>
                                    <?php
                                    $iddeliveryorder++;
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
    <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content " >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title " >Tambah Data Baru</h4>
                </div>
				<div id="data_add"></div>
            </div>
        </div>
    </div>
	<!--end modal add-->
	<!-- Modal Add edit -->
    <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content " >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title " >Edit DO</h4>
                </div>
				
                <div id="data_edit"></div>
            </div>
        </div>
    </div>
	<!--end modal edit-->
    <!-- FOOTER-->
<?php echo Modules::run('front_templates/front_templates/footer'); ?>
<link href="<?php echo base_url() ?>front_assets/css/datepicker.css" rel="stylesheet" type="text/css" />
 <script src="<?php echo base_url() ?>front_assets/js/grid/standard.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>front_assets/js/bootstrap-datepicker.js"></script>
    <!-- FOOTER-->
	</div>
	
	<!--end confirm=-->

<script>
	var loading ='<div align="center" class="loading"><img src="<?php echo base_url()?>front_assets/img/loading.gif"/></div>';
	$(function(){
	function deleted(id){
		var x;
		if (confirm("Yakin akan dihapus?") == true) {
			uri = '<?php echo site_url('/') . 'transaksi/deliveryorder/delete'?>';
			$.ajax({
					url : uri,
					type: "POST",
					data : {id:id},
					dataType: "json",
					success:function(data) 
					{
						//alert(data.response);
						if(data.response == 'success'){
							var msg='<div class="alert alert-success alert-dismissable">'+data.msg+'</div>';
							$("#message").html(msg);
							$('#message').fadeTo(3000, 500).slideUp(500, function(){
								$('#message').hide();
								reloadlist();
							});
							
						}else if(data.response == 'failed'){
							var msg='<div class="alert alert-success alert-dismissable">'+data.msg+'</div>';
							$("#message").html(msg);
							$('#message').alert();
								$('#message').fadeTo(2000, 500).slideUp(500, function(){
								$('#message').hide();
							});
						}
						
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						var msg='<div class="alert alert-error alert-dismissable">'+errorThrown+'</div>';
						$("#message").html(msg);
						$('#message').alert();
							$('#message').fadeTo(2000, 500).slideUp(500, function(){
							$('#message').hide();
							
						});
						reloadlist();
					}
				});
		} 	
	}
	
	$("#newData").click(function(){

		var loading ='<div align="center" class="loading"><img src="<?php echo base_url()?>front_assets/img/loading.gif"/></div>';
		uri = '<?php echo site_url('/') . "transaksi/deliveryorder/add"?>';
		$("#data_add").html(loading);
		$.post(uri,{ajax:true},function(data) {
			$("#data_add").html(data);
		});	
	});
	
	});
	function details(id){
		//alert(id);

		
		uri = '<?php echo site_url('/') . "transaksi/deliveryorder/edit"?>';
		$("#data_edit").html(loading);
		$.post(uri,{ajax:true,id:id},function(data) {
			$("#data_edit").html(data);
		});
		
	}

	//var loading ='<div align="center" class="loading"><img src="<?php echo base_url()?>front_assets/img/loading.gif"/></div>';


	function reloadlist(){
		$('#list_data').html(loading);
		$.post("<?php echo $link?>",function(data) 
		{
			$('#list_data').html(data);
			$('#data_table').dataTable({
				oLanguage: {
					sLoadingRecords: '<img src="<?php echo base_url()?>front_assets/img/loading.gif">'
				}					
			});
		});
	}

</script>
