<div class="modal-body">
	<div id="err_message"></div>
	<div class="panel-body">
		<div class="panel-body">
			<form class="form-horizontal" id="formadd">

				<div role="tabpanel">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs tabcolor8-bg" role="tablist">
						<li role="presentation" class="active"><a href="#PO1" aria-controls="PO1" role="tab" data-toggle="tab">:::Data Utama:::</a></li>
						<li role="presentation"><a href="#PO2" aria-controls="PO2" role="tab" data-toggle="tab">:::DO Barang:::</a></li>
						<li role="presentation"><a href="#PO3" aria-controls="PO3" role="tab" data-toggle="tab">:::DO Paket:::</a></li>
					</ul>
					<!-- Nav tabs -->

					<!-- Tab panes -->
					<div class="tab-content">

						<div role="tabpanel" class="tab-pane active" id="PO1">


							<div class="form-group">
								<label for="nomordo" class="col-sm-2 control-label form-label">Nomor DO</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="nomordo" name="nomordo">
								</div>
							</div>

							<div class="form-group">
								<label for="tanggalpengadaan" class="col-sm-2 control-label form-label">Tanggal DO</label>
								<div class="col-sm-10">
									<div class="control-group">
										<div class="controls">
											<div class="input-prepend input-group">
												<span class="add-on input-group-addon"><i class="fa fa-calendar"></i></span>
												<input type="text" id="date-picker" class="form-control date-picker" name="tanggaldo" value="<?php echo date('Y-m-d') ?>"/> 
											</div>
											<br/> <sup>)*Thn-Bln-Tgl</sup>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="nomorreff" class="col-sm-2 control-label form-label">Pelanggan</label>
								<div class="col-sm-10">
									<select name="idpelanggan" id="idpelanggan" class="selectpicker" data-live-search="true">
										<?php foreach ($this->orm->pelanggan() as $row) { ?>
											<option value="<?php echo $row['idpelanggan'] ?>"> <?php echo $row['namapelanggan'] ?> </option>
										<?php } ?>    
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="disetujui" class="col-sm-2 control-label form-label">Disetujui Oleh</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="disetujui" name="disetujui">
								</div>
							</div>

						</div>

						<div role="tabpanel" class="tab-pane" id="PO2">
							<table>
								<tr>
									<td id="title">
										<a href="#" class="btn btn-option5" id="addRowPo2"><i class="fa fa-plus"></i>Tambah</a>
										<a href="#" class="btn btn-danger" onclick="javascript:deleteRow('pemesanan_barang');" ><i class="fa fa-minus"></i>Hapus</a> 
									</td>
								</tr>
								<hr/>
								<tr>
									<td>
										<hr/>
										<table id="pemesanan_barang" width="100%">
											<thead>
											<tr bgcolor="white" >
												<td width="25px"><b>|#|</b></td>
												<td width="35px"><b>|No|</b></td>
												<td width="250px"><b>Nama Barang</b></td>
												<td width="150px"><b>Jumlah Barang</b></td>
												<td width="200px"><b>Keterangan</b></td>
												<td width="150px"><b>Packaging</b></td>
												<td width="150px"><b>Expired Date</b></td>
											</tr>
											</thead>
											<tbody id="div_function">
											<tr id="p_tr">
												<td width="25px">
													<input type="checkbox" size="1" name="chk">
												</td>
												<td width="35px"><input  type="text" size="3" id="urutan_jenis_barang_1"  name="urutan_jenis_barang[]" value="1"></td>
												<td width="250px">
													<select id="idrefbarang_1" name="idrefbarang[]" class="selectpicker show-menu-arrow" data-live-search="true" data-width="340px">
														<option value="">Pilih Barang</option>
														<?php
														foreach ($this->orm->refbarang->order('idrefjenisbarang ASC') as $row) {?>
															<option value="<?php echo $row['idrefbarang']?>"><?php echo $row['namabarang'].' - '.$row['alias']?></option>
														<?php }?>
													</select>
												</td>
												<td width="150px">
													<input class="form-control" type="number" id="jumlahbarang" name="jumlahbarang[]">
												</td>
												<td width="270px">
													<input class="form-control" type="text" id="keterangan_1" name="keterangan[]"/></td>
												<td width="100px">
													<select  id="idpackaging_1"  name="idpackaging[]" class="selectpicker show-menu-arrow" data-live-search="true" data-width="150px">
														<option value="0">Pilih</option>
														<?php
														foreach ($this->orm->packaging2->order('idpackaging ASC') as $row) {?>
															<option value="<?php echo $row['idpackaging']?>"><?php echo $row['nama']?></option>																		}
														<?php }?>	
													</select>
												</td>
												<td width="100px">
													<input class="form-control date-picker" type="date" id="expired_date_1" name="expired_date[]" value="<?php echo date('Y-m-d')?>"/>
												</td>
											</tr>
											
											</tbody>
										</table>
										<br/>                                                 
									</td>
								</tr> 
							</table>
						</div>
						
						<div role="tabpanel" class="tab-pane" id="PO3">
							<table width="400px">
								<tr>
									<td id="title">
										  <a href="#" class="btn btn-option5" id="addRowPo3"><i class="fa fa-plus"></i>Tambah</a>
										<a href="#" class="btn btn-danger" onclick="javascript:deleteRow('pemesanan_paket');" ><i class="fa fa-minus"></i>Hapus</a> 
									</td>
								</tr>
								<hr/>
								<tr width="">
									<td>
										<hr/>
										<table id="pemesanan_paket" width="">
											<thead>
											<tr bgcolor="white" width="200px">
												<td width=""><b>|#|</b></td>
												<td width=""><b>|No|</b></td>
												<td width=""><b>Paket</b></td>
											</tr>
											</thead>
											<tbody id="div_function2">
											<tr>
												<td width="25px">
													<input type="checkbox" size="1" name="chk">
												</td>
												<td width="40px">
													<input  type="text" size="3" id="pemesanan_paket_1"  name="pemesanan_paket[]" value="1"/>
												</td>
												<td width="150px">
													<select  id="idpackage_1"  name="idpackage[]"  class="selectpicker show-menu-arrow" data-live-search="true" data-width="450px">
														<option value="0">Pilih Paket</option>;
														<?php
														foreach ($this->orm->package->order('idpackage ASC') as $row) {?>
															<option value="<?php echo $row['idpackage']?>"><?php echo $row['namepackage']?></option>
														<?php }?>
													</select>
												</td>
											</tr>
											</tbody>
										</table>
										<br/>                                                 
									</td>
								</tr> 
								
							</table>
						</div>
						
						<div class="modal-footer">
							<button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
							<a href="#" onclick="saved()" class="btn btn-success">Simpan</a>
						</div>

					</div>

				</div>   
			</form>
		</div>
	</div>
</div>

<script>
	$(function(){
	var i =2;
	var j =2;

	$("#idrefbarang_1").selectpicker ({});   
	$("#idpackaging_1").selectpicker ({}); 
	$("#idpackage_1").selectpicker ({});  		
	$('#example0').DataTable();
	$('.date-picker').datepicker({
		format: 'yyyy-mm-dd',
		autoclose: true
	});
	
	$("#addRowPo2").click(function(){
			htm = '<tr>'+
						'<td width="25px">'+
							'<input type="checkbox" size="1" name="chk">'+
						'</td>'+
						'<td width="40px"><input  type="text" size="3" id="urutan_jenis_barang_1"  name="urutan_jenis_barang[]" value="'+i+'"></td>'+
						'<td width="150px">'+
							'<select id="idrefbarang_'+i+'"  name="idrefbarang[]" class="selectpicker show-menu-arrow" data-live-search="true" data-width="340px">'+
								'<option value="">Pilih Barang</option>'+
								<?php
								foreach ($this->orm->refbarang->order('idrefjenisbarang ASC') as $row) {?>
									'<option value="<?php echo $row['idrefbarang']?>"><?php echo $row['namabarang'].' - '.$row['alias']?></option>'+
								<?php }?>
							'</select>'+
						'</td>'+
						'<td width="150px">'+
							'<input class="form-control" type="number" id="jumlahbarang" name="jumlahbarang[]">'+
						'</td>'+
						'<td width="150px">'+
							'<input class="form-control" type="text" id="keterangan_1" name="keterangan[]"/></td>'+
						'<td>'+
							'<select  id="idpackaging_'+i+'"  name="idpackaging[]" class="selectpicker show-menu-arrow" data-live-search="true" data-width="150px">'+
								'<option value="">Pilih</option>'+
								<?php
								foreach ($this->orm->packaging2->order('idpackaging ASC') as $row) {?>
									'<option value="<?php echo $row['idpackaging']?>"><?php echo $row['nama']?></option>'+
								<?php }?>
							'</select>'+
						'</td>'+
						'<td>'+
							'<input class="form-control date-picker" type="date" id="expired_date_1" name="expired_date[]" value="<?php echo date('Y-m-d')?>"/>'+
						'</td>'+
					'</tr>';

				$('#div_function').append(htm);	

				$("#idrefbarang_"+i).selectpicker ({});  
				$("#idpackaging_"+i).selectpicker ({}); 				

				i++;
		});	
	//});
	
	$("#addRowPo3").click(function(){
			htm = '<tr>'+
						'<td width="25px">'+
							'<input type="checkbox" size="1" name="chk">'+
						'</td>'+
						'<td width="40px">'+
							'<input  type="text" size="3" id="pemesanan_paket_'+j+'"  name="pemesanan_paket[]" value="'+j+'"/>'+
						'</td>'+
						'<td width="150px">'+
							'<select  id="idpackage_'+j+'"  name="idpackage[]"  class="selectpicker show-menu-arrow" data-live-search="true" data-width="450px">'+
								'<option value="0">Pilih Paket</option>'+
								<?php
								foreach ($this->orm->package->order('idpackage ASC') as $row) {?>
									'<option value="<?php echo $row['idpackage']?>"><?php echo $row['namepackage']?></option>'+
								<?php }?>
							'</select>'+
						'</td>'+
					'</tr>';

				$('#div_function2').append(htm);	

				$("#idpackage_"+j).selectpicker ({});  				

				j++;
			});	
	});
	
	function saved(){
		uri = '<?php echo site_url('/') . 'transaksi/deliveryorder/save'?>';
			var postData = $('#formadd').serializeArray();
			$.ajax({
					url : uri,
					type: "POST",
					data : postData,
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
	
	function details(id){
		//alert(id);

		var loading ='<div align="center" class="loading"><img src="<?php echo base_url()?>front_assets/img/loading.gif"/></div>';
		uri = '<?php echo site_url('/') . "transaksi/deliveryorder/edit"?>';
		$("#data_edit").html(loading);
		$.post(uri,{ajax:true,id:id},function(data) {
			$("#data_edit").html(data);
		});
		
	}
	function details(id){
		//alert(id);

		var loading ='<div align="center" class="loading"><img src="<?php echo base_url()?>front_assets/img/loading.gif"/></div>';
		uri = '<?php echo site_url('/') . "transaksi/deliveryorder/add"?>';
		$("#data_edit").html(loading);
		$.post(uri,{ajax:true,id:id},function(data) {
			$("#data_add").html(data);
		});
		
	}
</script>
	
<script>
	var loading ='<div align="center" class="loading"><img src="<?php echo base_url()?>front_assets/img/loading.gif"/></div>';


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
