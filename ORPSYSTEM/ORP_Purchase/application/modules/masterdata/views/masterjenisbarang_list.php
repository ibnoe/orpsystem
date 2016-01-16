<?php $title="Tambah"?>
<link rel="stylesheet" href="<?php echo base_url() ?>front_assets/css/css.css">
<!-- START CONTENT -->
<div class="content" style="min-height: 650px;">
    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Master Data</h1>
        <ol class="breadcrumb">
            <li><a href="#">Master Data</a></li>
            <li class="active">Master Data Jenis Barang</li>
        </ol>

        <!-- Start Page Header Right Div -->
        <div class="right">
            <div class="btn-group" role="group" aria-label="...">
                <a data-toggle="modal" data-target="#myModalAdd" class="btn btn-info btn-xl"><i class="fa fa-plus"></i>Tambah Baru</a>
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
                        List Data Gudang
                    </div>
					<div id="err_message"></div>
                    <div class="">
					
					
					
                        <table class="tree">
                           
                                  <tr class="treegrid">
                                    <th>Jenis Barang</th>
                                    <th>Edit</th>
                                    <th>Hapus</th>
                                </tr>
                                <?php
                                $no = 1;
                                foreach ($refjenisbarang as $parent) {
                                   $child = $this->orm->refjenisbarang->where('parent',$parent['idrefjenisbarang']);
                                    //$this->orm->refjenisbarang->where('parent', null);
                                    ?>
                                    <tr class="treegrid-<?=$no?>">
                                        <td id="jenisbarang<?=$parent['idrefjenisbarang']?>"><?=$parent['jenisbarang'] ?></td>
										<td><a data-toggle="modal" data-target="#myModalAdd" class="btn btn-option5" onclick="details(<?= $parent['idrefjenisbarang']; ?>,'')"><i class="fa fa-edit"></i></a></td>
                                        <td><a data-toggle="modal" class="btn btn-danger" role="button" id="btndelete" onclick="deleted('<?=$parent['idrefjenisbarang']	?>')"><i class="fa fa-trash"></i></a></td>
								   </tr>

								<?php 
								if($child){
									$no2=$no;
									$no =$no+1;
									 foreach ($child as $row) {
									?>	 
										  <tr class="treegrid-<?=$no?> treegrid-parent-<?=$no2?>">
											<td id="jenisbarang<?=$row['idrefjenisbarang']?>"><?=$row['jenisbarang'] ?></td>
											<td><a data-toggle="modal" data-target="#myModalAdd" class="btn btn-option5" onclick="details(<?= $row['idrefjenisbarang']; ?>,<?= $parent['idrefjenisbarang']; ?>)"><i class="fa fa-edit"></i></a></td>
											<td><a data-toggle="modal" class="btn btn-danger" role="button" id="btndelete" onclick="deleted('<?=$row['idrefjenisbarang']	?>')"><i class="fa fa-trash"></i></a></td>
										 </tr> 
									<?php	
										$child2 = $this->orm->refjenisbarang->where('parent',$row['idrefjenisbarang']); 
										if($child2){
											$no3=$no;
											$no =$no+1;
											 foreach ($child2 as $row2) {
											?>	 
												  <tr class="treegrid-<?=$no?> treegrid-parent-<?=$no3?>">
													<td id="jenisbarang<?=$row2['idrefjenisbarang']?>"><?=$row2['jenisbarang'] ?></td>
													<td><a data-toggle="modal" data-target="#myModalAdd" class="btn btn-option5" onclick="details(<?= $row2['idrefjenisbarang']; ?>,<?=$row['idrefjenisbarang']?>)"><i class="fa fa-edit"></i></a></td>
													<td><a data-toggle="modal" class="btn btn-danger" role="button" id="btndelete" onclick="deleted('<?=$row2['idrefjenisbarang']	?>')"><i class="fa fa-trash"></i></a></td>
												 </tr> 
											<?php	
												$child3 = $this->orm->refjenisbarang->where('parent',$row2['idrefjenisbarang']); 
												if($child3){
													$no4=$no;
													$no =$no+1;
													 foreach ($child3 as $row3) {
													?>	 
														  <tr class="treegrid-<?=$no?> treegrid-parent-<?=$no4?>">
															<td id="jenisbarang<?=$row3['idrefjenisbarang']?>"><?=$row3['jenisbarang'] ?></td>
															<td><a data-toggle="modal" data-target="#myModalAdd" class="btn btn-option5" onclick="details(<?= $row3['idrefjenisbarang']; ?>,<?= $row2['idrefjenisbarang']?>)"><i class="fa fa-edit"></i></a></td>
															<td><a data-toggle="modal" class="btn btn-danger" role="button" id="btndelete" onclick="deleted('<?=$row3['idrefjenisbarang']	?>')"><i class="fa fa-trash"></i></a></td>
														 </tr> 
													<?php	
														$child4 = $this->orm->refjenisbarang->where('parent',$row3['idrefjenisbarang']); 
														if($child3){
															$no5=$no;
															$no =$no+1;
															 foreach ($child4 as $row4) {
															?>	 
																  <tr class="treegrid-<?=$no?> treegrid-parent-<?=$no5?>">
																	<td id="jenisbarang<?=$row4['idrefjenisbarang']?>"><?=$row4['jenisbarang'] ?></td>
																	<td><a data-toggle="modal" data-target="#myModalAdd" class="btn btn-option5" onclick="details(<?= $row4['idrefjenisbarang']; ?>,<?=$row3['idrefjenisbarang']?>)"><i class="fa fa-edit"></i></a></td>
																	<td><a data-toggle="modal" class="btn btn-danger" role="button" id="btndelete" onclick="deleted('<?=$row4['idrefjenisbarang']	?>')"><i class="fa fa-trash"></i></a></td>
																 </tr> 
															<?php	
																$child5 = $this->orm->refjenisbarang->where('parent',$row4['idrefjenisbarang']); 
																if($child5){
																	$no6=$no;
																	$no =$no+1;
																	 foreach ($child5 as $row5) {
																	?>	 
																		  <tr class="treegrid-<?=$no?> treegrid-parent-<?=$no6?>">
																			<td id="jenisbarang<?=$row5['idrefjenisbarang']?>"><?=$row5['jenisbarang'] ?></td>
																			<td><a data-toggle="modal" data-target="#myModalAdd" class="btn btn-option5" onclick="details(<?= $row5['idrefjenisbarang']; ?>,<?=$row4['idrefjenisbarang']?>)"><i class="fa fa-edit"></i></a></td>
																			<td><a data-toggle="modal" class="btn btn-danger" role="button" id="btndelete" onclick="deleted('<?=$row5['idrefjenisbarang']	?>')"><i class="fa fa-trash"></i></a></td>
																		 </tr> 
																	<?php	
																		
																		$no++;
																	 }
																}
																$no++;
															 }
														}
														$no++;
													 }
												}
												$no++;
											 }
										} 
										$no++;
									 }
									 
		
								}
								 
								$no++;
							} ?>   						
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Panel -->
        </div>
        <!-- End Row -->
	
    <!-- END CONTAINER -->



    <!-- Modal Add New -->
    <div class="modal fade" id="myModalAdd" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg-19">
			<div id="message"></div>
            <form class="form-horizontal" id="formadd" method="post" action="<?php echo base_url() ?>index.php/masterdata/masterjenisbarang/proses/">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><span id="title_modal"></span></h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="jenisbarang" class="col-sm-2 control-label form-label">Induk</label>
                                <div class="col-sm-10">
                                     <select class="selectpicker" data-live-search="true" name="parent" id="parent">
                                        <option value=""> -- Pilih Induk -- </option>
                                      <?php 
                                      foreach($this->orm->refjenisbarang->order('idrefjenisbarang ASC') as $row) { 
                                          $strip = "";
                                          for($i=1;$i<=strlen($row['parent']);$i++) {
                                              $strip .= "-";
                                          }
                                          
                                          ?>  
                                        <option value="<?php echo $row['idrefjenisbarang'] ?>"> 
                                            <?php echo $strip.' '.$row['jenisbarang'] ?>  
                                        </option>
                                      <?php } ?>     
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jenisbarang" class="col-sm-2 control-label form-label">Jenis Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="jenisbarang" id="jenisbarang">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
						<input type="hidden" name="idrefjenisbarang" id="idrefjenisbarang"/>
                        <button type="button" id="btnsave" class="btn btn-white" data-dismiss="modal">Tutup</button>              
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>
                </div>
            </form> 
        </div>
    </div>
	
    <!-- FOOTER-->
<?php echo Modules::run('front_templates/front_templates/footer'); ?>
    <!-- FOOTER-->
    </div> </div>
	
	<!--end confirm=-->

	
<script>
	var loading ='<div align="center" class="loading"><img src="<?=base_url()?>front_assets/img/loading.gif"/></div>';
	 $(document).ready(function() {
        $('.tree').treegrid({
          'initialState': 'collapsed'
        });
      });
	function details(id,parent){
		//alert(id+'asdad'+parent)
		$('#title_modal').text('Edit Data Barang');
		var jenisbarang = $('#jenisbarang'+id).text();
		$('#jenisbarang').val(jenisbarang);
		$('#parent').val(parent);
		$('#idrefjenisbarang').val(id);
		
	}
	function deleted(id){
		var x;
		if (confirm("Yakin akan dihapus?") == true) {
			uri = '<?=site_url() . '/masterdata/masterjenisbarang/delete'?>';
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
							
						}else if(data.response == 'failed'){
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
				var loading ='<div align="center" class="loading"><img src="<?=base_url()?>front_assets/img/loading.gif"></div>';
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
									$.post("<?=$link?>",function(data) 
										{
											$('#list_data').html(data);
											$('#data_table').dataTable({
												oLanguage: {
													sLoadingRecords: '<img src="<?=base_url()?>front_assets/img/loading.gif">'
												}					
											});
										});
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
    });

    $().ready(function() {
		
		$('#title_modal').text('Tambah Data Barang');
        $("#formadd").validate({
            rules: {
                jenisbarang: "required",
				jenisbarang: "required",
				
				 kapasitas:{
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
		$.post("<?=$link?>",function(data) 
		{
			$('#list_data').html(data);
			$('#data_table').dataTable({
				oLanguage: {
					sLoadingRecords: '<img src="<?=base_url()?>front_assets/img/loading.gif">'
				}					
			});
		});
	}
*/
</script>
