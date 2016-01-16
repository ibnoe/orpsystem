<div class="modal-body">
	<div id="err_message2"></div>
	<div class="panel-body">
		<div class="panel-body">
			<form class="form-horizontal" id="formedit">

				<div role="tabpanel">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs tabcolor8-bg" role="tablist">
						<li role="presentation" class="active"><a href="#PO11" aria-controls="PO11" role="tab" data-toggle="tab">:::Data Utama:::</a></li>
						<li role="presentation"><a href="#PO22" aria-controls="PO22" role="tab" data-toggle="tab">:::DO Barang:::</a></li>
						<li role="presentation"><a href="#PO33" aria-controls="PO33" role="tab" data-toggle="tab">:::DO Paket:::</a></li>
					</ul>
					<!-- Nav tabs -->

					<!-- Tab panes -->
					<div class="tab-content">

						<div role="tabpanel" class="tab-pane active" id="PO11">

							<input type="hidden" name="iddeliveryorder" value="<?php echo $deliveryorder['iddeliveryorder']?>"/>
							<div class="form-group">
								<label for="nomordo" class="col-sm-2 control-label form-label">Nomor DO</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="nomordo" name="nomordo" value="<?php echo $deliveryorder['nomordo']?>">
								</div>
							</div>

							<div class="form-group">
								<label for="tanggalpengadaan" class="col-sm-2 control-label form-label">Tanggal DO</label>
								<div class="col-sm-10">
									<div class="control-group">
										<div class="controls">
											<div class="input-prepend input-group">
												<span class="add-on input-group-addon"><i class="fa fa-calendar"></i></span>
												<input type="text" id="date-picker" class="form-control date-picker" name="tanggaldo" value="<?php echo $deliveryorder['tanggaldo']?>"/> 
											</div>
											<br/> <sup>)*Tgl-Bln-Thn</sup>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="nomorreff" class="col-sm-2 control-label form-label">Pelanggan</label>
								<div class="col-sm-10">
									<select name="idpelanggan" id="idpelanggan" class="selectpicker" data-live-search="true">
										<?php foreach ($this->orm->pelanggan() as $row) { ?>
											<option value="<?php echo $row['idpelanggan'] ?>" <?php echo $row['idpelanggan']==$deliveryorder['tanggaldo'] ? 'selected' : ''?>> <?php echo $row['namapelanggan'] ?> </option>
										<?php } ?>    
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="disetujui" class="col-sm-2 control-label form-label">Disetujui Oleh</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="disetujui" name="disetujui" value="<?php echo $deliveryorder['disetujui']?>">
								</div>
							</div>

						</div>

						<div role="tabpanel" class="tab-pane" id="PO22">
							<table>
								<tr>
									<td id="title">
										<a href="#" class="btn btn-option5" id="addRowPO22"><i class="fa fa-plus"></i>Tambah</a>
										<a href="#" class="btn btn-danger" id="deleteRowPO22"><i class="fa fa-minus"></i>Hapus</a> 
									</td>
								</tr>
								<hr/>
								<tr>
									<td>
										<hr/>
										<table id="pemesanan_barang2" width="100%">
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
											<tbody id="div_function_edit">
											<?php 
												$i =1;
												foreach ($deliveryorder_detail as $row2) {?>
											<tr id="ed_tr_<?php echo $i?>">
												<td width="25px">
													<input type="checkbox" size="1" name="edchk" value="<?php echo $i?>">
												</td>
												<td width="35px"><input  type="text" size="3" id="urutan_jenis_barang_1"  name="urutan_jenis_barang[]" value="<?php echo $i?>"></td>
												<td width="250px">
													<select id="edidrefbarang_<?php echo $i?>" name="idrefbarang[]" class="selectpicker show-menu-arrow" data-live-search="true" data-width="340px">
														<option value="">Pilih Barang</option>
														<?php
														foreach ($this->orm->refbarang->order('idrefjenisbarang ASC') as $row) {?>
															<option value="<?php echo $row['idrefbarang']?>" <?php echo $row2['idrefbarang'] == $row['idrefbarang'] ? 'selected' : '';?>><?php echo $row['namabarang'].' - '.$row['alias']?></option>
														<?php }?>
													</select>
												</td>
												<td width="150px">
													<input class="form-control" type="number" id="jumlahbarang" name="jumlahbarang[]" value="<?php echo $row2['jumlahbarang']?>">
												</td>
												<td width="270px">
													<input class="form-control" type="text" id="keterangan_1" name="keterangan[]" value="<?php echo $row2['keterangan']?>"/>
												</td>
												<td width="100px">
													<select  id="edidpackaging_<?php echo $i?>"  name="idpackaging[]" class="selectpicker show-menu-arrow" data-live-search="true" data-width="150px">
														<option value="0">Pilih</option>
														<?php
														foreach ($this->orm->packaging2->order('idpackaging ASC') as $row) {?>
															<option value="<?php echo $row['idpackaging']?>" <?php echo $row2['idpackaging'] == $row['idpackaging'] ? 'selected' : '';?>><?php echo $row['nama']?></option>																		}
														<?php }?>	
													</select>
												</td>
												<td width="100px">
													<input class="form-control date-picker" type="date" id="expired_date_1" name="expired_date[]" value="<?php echo $row2['expired_date']?>"/>
												</td>
											</tr>
											<script>
												
												$("#edidrefbarang_<?php echo $i?>").selectpicker ({});   
												$("#edidpackaging_<?php echo $i?>").selectpicker ({}); 		
											</script>
											<?php
												$i++;
												}?>
											</tbody>
										</table>
										<br/>                                                 
									</td>
								</tr> 
							</table>
						</div>
						
						<div role="tabpanel" class="tab-pane" id="PO33">
							<table width="400px">
								<tr>
									<td id="title">
										  <a href="#" class="btn btn-option5" id="addRowPO33"><i class="fa fa-plus"></i>Tambah</a>
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
							<a href="#" onclick="updated()" class="btn btn-success">Simpan</a>
						</div>

					</div>

				</div>   
			</form>
		</div>
	</div>
</div>

<script>
	$(function(){
	var i = <?php echo $i?>;
	var j =2;		
	$('#example0').DataTable();
	$('.date-picker').datepicker({
		format: 'yyyy-mm-dd',

		autoclose: true
	});
	
	$("#addRowPO22").click(function(){
			htm = '<tr id="ed_tr_'+i+'">'+
						'<td width="25px">'+
							'<input type="checkbox" size="1" name="edchk" value="'+i+'">'+
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

				$('#div_function_edit').append(htm);	

				$("#idrefbarang_"+i).selectpicker ({});  
				$("#idpackaging_"+i).selectpicker ({}); 
				
				$('.date-picker').datepicker({
					format: 'yyyy-mm-dd',

					autoclose: true
				});
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
		$("#deleteRowPO22").click(function(){
			//alert('s');
		var selectedid = new Array();
			$('input[name="edchk"]:checked').each(function() {
				selectedid.push(this.value);
			});
			
			for ( var i = 0, l = selectedid.length; i < l; i++ ) {
				$('#ed_tr_'+selectedid[ i ]).remove();
			}
		});
		
	});
	


	
	function updated(){
		uri = '<?php echo site_url('/') . 'transaksi/deliveryorder/update'?>';
			var postData = $('#formedit').serializeArray();
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
							$("#err_message2").html(msg);
							$('#err_message2').fadeTo(3000, 500).slideUp(500, function(){
								$('#err_message2').hide();
								reloadlist();
							});
							
						}else if(data.response == 'failed'){
							var msg='<div class="alert alert-success alert-dismissable">'+data.msg+'</div>';
							$("#err_message2").html(msg);
							$('#err_message2').alert();
								$('#err_message2').fadeTo(2000, 500).slideUp(500, function(){
								$('#err_message2').hide();
							});
						}
						
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						var msg='<div class="alert alert-error alert-dismissable">'+errorThrown+'</div>';
						$("#err_message2").html(msg);
						$('#err_message2').alert();
							$('#err_message2').fadeTo(2000, 500).slideUp(500, function(){
							$('#err_message2').hide();
							
						});
						//reloadlist();
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
</script>