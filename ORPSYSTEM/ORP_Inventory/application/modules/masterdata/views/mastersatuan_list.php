<!-- START CONTENT -->
<div class="content" style="min-height:650px">
    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Master Data</h1>
        <ol class="breadcrumb">
            <li><a href="#">Master Data</a></li>
            <li class="active">Master Data Satuan</li>
        </ol>

        <!-- Start Page Header Right Div -->
        <div class="right">
            <div class="btn-group" role="group" aria-label="...">
                <a data-toggle="modal" onclick="tambah();" data-target="#myModalAdd" class="btn btn-info btn-xl"><i class="fa fa-plus"></i>Tambah Baru</a>
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
                        List Data Satuan
                    </div><div id="err_message"></div>
                    <div class="panel-body table-responsive">
                        <table id="data_table" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Satuan</th>
                                    <th>Satuan Terkecil</th>
                                    <th>Jumlah Satuan Terkecil</th>
                                    <th>Detail</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($refsatuan as $row) {
                                     $terkecil = $this->orm->refsatuan->where('idrefsatuan',$row['child'])->fetch();
                                    ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $row['namasatuan'] ?></td>
                                        <td><?php echo $terkecil['namasatuan'] ?></td>
                                        <td><?php echo $row['jumlah_perchild'] ?></td>
                                        <td>  <a data-toggle="modal" data-target="#myModalAdd" href="#" class="btn btn-option5" onclick="details(<?php echo $row['idrefsatuan'] ?>)"><i class="fa fa-edit"></i></a></td>
                                        <td>  <a data-toggle="modal" class="btn btn-danger" role="button" id="btndelete" onclick="deleted('<?php echo $row['idrefsatuan']	?>')"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <?php $no++;
                                }
                                ?>        

                        </table>
                    </div>
                </div>
            </div>
            <!-- End Panel -->
        </div>
        <!-- End Row -->
	
    <!-- END CONTAINER -->



    <!-- Modal Add New -->
    <div class="modal fade" id="myModalAdd" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg"><div id="message"></div>
            <form class="form-horizontal" method="post" id="formadd" action="<?php echo base_url() ?>index.php/masterdata/mastersatuan/proses/">

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
                                    <input type="text" class="form-control" name="namasatuan" id="namasatuan">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="parent" class="col-sm-2 control-label form-label">Satuan Terkecil</label>
                                <div class="col-sm-3">
                                    <select class="selectpicker" data-live-search="true" name="child" id="child">
                                        <option> -- Pilih Satuan Terkecil -- </option>
                                        <?php
                                        foreach ($this->orm->refsatuan->order('idrefsatuan ASC') as $row) {
                                            $strip = "";
                                          for($i=1;$i<=strlen($row['child']);$i++) {
                                              $strip .= "-";
                                          }
                                            
                                            ?>  
                                            <option value="<?php echo $row['idrefsatuan'] ?>"> 
                                            <?php echo $strip.' '.$row['namasatuan'] ?>  
                                            </option>
                                        <?php } ?>     
                                    </select>
                                </div>
                                <label for="jumlah_perchild" class="col-sm-2 control-label form-label">Jumlah Per-Satuan terkecil</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="jumlah_perchild" id="jumlah_perchild">
                                </div>
                                 )* Abaikan jika tidak ada satuan terkecil
                            </div>





                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idrefsatuan" id="idrefsatuan"/>
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>              
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </div>
            </form> 
        </div>
    </div>
	
    <!-- FOOTER-->
<?php echo Modules::run('front_templates/front_templates/footer'); ?>
    <!-- FOOTER-->
	</div>
	
	<!--end confirm=-->

	
<script>
	var loading ='<div align="center" class="loading"><img src="<?php echo base_url()?>front_assets/img/loading.gif"/></div>';
	
        function tambah(){
		$('#title_modal').text('Tambah Data Satuan');
		
		$('#idrefsatuan').val('');
		$('#namasatuan').val('');
		$('#child').val('');
		$('#jumlah_perchild').val('');
		
	}
        
        function details(id) {
        $('#title_modal').text('Edit Data Satuan');

        uri = '<?php echo base_url() . 'index.php/masterdata/mastersatuan/edit' ?>';
        $.ajax({
            url: uri,
            type: "POST",
            data: {id: id},
            dataType: "json",
            success: function (data)
            {
                //alert(data.response);
                if (data.response == 'success') {
                    $('#idpackaging').val(data.datas.idpackaging);
                    $('#idrefsatuan').val(data.datas.idrefsatuan);
                    $('#namasatuan').val(data.datas.namasatuan);
                    $('#child').val(data.datas.child);
                    $('#jumlah_perchild').val(data.datas.jumlah_perchild);
           
                }

            }
        });
    }
    
       
	function deleted(id){
		var x;
		if (confirm("Yakin akan dihapus?") == true) {
			uri = '<?php echo site_url('/') . 'masterdata/mastersatuan/delete'?>';
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
							$("#err_message").html(msg);
							$('#err_message').fadeTo(3000, 500).slideUp(500, function(){
								$('#err_message').hide();
								reloadlist();
							});
							
						}else if(data.response == 'error'){
							var msg='<div class="alert alert-success alert-dismissable">'+data.msg+'</div>';
							$("#err_message").html(msg);
							$('#err_message').alert();
								$('#err_message').fadeTo(2000, 500).slideUp(500, function(){
								$('#err_message').hide();
							});
						}
						
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						var msg='<div class="alert alert-error alert-dismissable">'+errorThrown+'</div>';
						$("#err_message").html(msg);
						$('#err_message').alert();
							$('#err_message').fadeTo(2000, 500).slideUp(500, function(){
							$('#err_message').hide();
							
						});
						reloadlist();
					}
				});
		} 	
	}

	var Script = function () {

    $.validator.setDefaults({
        submitHandler: function() {	
				//$("#message").html("<img src='loading.gif'/>");
				var postData = $('#formadd').serializeArray();
				var formURL = $('#formadd').attr("action");
				var btn = $('#btnsave');
				var css =  btn.attr("class");
				var text = btn.html();
				var loading ='<div align="center" class="loading"><img src="<?php echo base_url()?>front_assets/img/loading.gif"></div>';
				btn.html("Please wait..");
				btn.attr("class","btn btn-primary disabled");
				
				$.ajax({
					url : formURL,
					type: "POST",
					data : postData,
					dataType: "json",
					success:function(data) 
					{
						//alert(data.response);
						if(data.response == 'success'){
							var msg='<div class="alert alert-success alert-dismissable">'+data.msg+'</div>';
							$("#err_message").html(msg);
							
								btn.html("Success...");
								$('#myModalAdd').find(".close").click();
								$('#err_message').fadeTo(3000, 500).slideUp(500, function(){
									$('#err_message').hide();
									$('#myModalAdd').find(".close").click();
									//	$('#list_data').html(loading);
									$.post("<?php echo $link?>",function(data) 
										{
											$('#list_data').html(data);
											$('#data_table').dataTable({
												oLanguage: {
													sLoadingRecords: '<img src="<?php echo base_url()?>front_assets/img/loading.gif">'
												}					
											});
										});
								});
							
						}else if(data.response == 'error'){
							var msg='<div class="alert alert-error alert-dismissable">'+data.msg+'</div>';
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
    });

    $().ready(function() {
		$('#title_modal').text('Tambah Data Satuan');
        $("#formadd").validate({
            rules: {
				namasatuan: "required",
				
				 jumlah_perchild:{
						required:true,
						number:true
					  }
            },
			highlight: function(element) {
				$(element).closest('.form-group').addClass('has-error');
			},
			unhighlight: function(element) {
				$(element).closest('.form-group').removeClass('has-error');
			},
			errorElement: 'span',
			errorClass: 'help-block',
			errorPlacement: function(error, element) {
				if(element.parent('.input-group').length) {
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
*/
</script>
