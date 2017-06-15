<script type="text/javascript">
function grand_total(){
	var harga = parseFloat(document.getElementById("i_harga").value);
	var qty = parseFloat(document.getElementById("i_qty").value);
	var	total = harga * qty;
	document.getElementById("i_total").value = total;
}
</script>
<?php if(isset($_GET['did']) && $_GET['did'] == 1){ ?>
<section class="content_new">
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-check"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Sukses !</b>
		Simpan Berhasil
	</div>
</section>
<?php }else if(isset($_GET['did']) && $_GET['did'] == 2){ ?>
<section class="content_new">
<div class="alert alert-info alert-dismissable">
<i class="fa fa-check"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
<b>Sukses !</b>
Edit Berhasil
</div>
</section>
<?php
} else if(isset($_GET['did']) && $_GET['did'] == 3){ ?>
	<section class="content_new">
		<div class="alert alert-info alert-dismissable">
			<i class="fa fa-check"></i>
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			<b>Sukses !</b>
			Delete Berhasil
		</div>
	</section>
<?php } ?>
<section class="content">
	<div class="row">
	<!-- right column -->
		<div class="col-md-12">
		<!-- general form elements disabled -->
			<div class="title_page"> <?= $title ?></div>
			<form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form" novalidate>
				<div class="box box-cokelat">
					<div class="box-body">
						<div class="col-md-12">
							<div class="form-group">
								<label>Nama Perusahaan</label>
								<input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama perusahaan..."
								value="<?= $row->office_name?>"/>
							</div>
							<div class="form-group">
								<label>No Telp</label>
								<input required type="text" name="i_telp" id="i_telp" class="form-control" placeholder="Masukkan nomor telepon..."
								value="<?= $row->office_phone?>"/>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input required type="email" name="i_email" id="i_email" class="form-control" placeholder="Masukkan email..."
								value="<?= $row->office_email?>"/>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea name="i_alamat" id="i_alamat" cols="45" rows="5" class="form-control">
									<?= $row->office_address?>
								</textarea>
							</div>
               <div class="form-group">
                  <label>Kota</label>
                  <input required type="text" name="i_city" class="form-control" placeholder="Masukkan kota..."
									value="<?= $row->office_city ?>"/>
              </div>
								<div id="" class="form-group col-md-3">
									<label>Cabang :</label>
									<select name="i_cabang_id" id="i_cabang_id" class="selectpicker show-tick form-control" data-live-search="true" value="1">
										<?php
										$qotype = mysql_query("select branch_id from transactions_tmp where transaction_id = '".$transaction_id."'");
										$typ = mysql_fetch_array($qotype);
										$type = "";
										if(count($typ)>0){
											$type= $typ['branch_id'];}

										if ($_SESSION['branch_id']) {
											$type = $_SESSION['branch_id'];}

										$query=mysql_query("select * from branches");
										while($row_member=mysql_fetch_array($query)){
											?><option value="<?= $row_member['branch_id']?>"<?php if($type == $row_member['branch_id']){echo "Selected";} ?>>
												<?= $row_member['branch_name']; ?>
											</option>
										<?php } ?>
									</select>
								</div>
								<div style="clear:both;"></div>
               <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea name="i_desc" class="form-control" rows="5"><?= $row->office_desc ?></textarea>
              </div>
                <div class="form-group">
									<div style="width:250px;width: 250px;left: 0px;top: 30px;">
										<label>Gambar</label>
	                  <?php if($id){
	                  $gambar = ($row->office_img) ? $row->office_img : "default.jpg"; ?>
	                  <img src="<?= "../img/office/".$gambar ?>" id="output_1" style="width:200px;"/>
	                  <?php } ?>
										<img id="output" style="width:200px;">
										<input type="file" name="i_img" id="i_img" accept="image/*"  onchange="loadFile(event)"/>
									</div>
                </div>
								<div class="form-group">
									<label>Nama Pemilik</label>
									<input required type="text" name="i_name_owner" class="form-control" placeholder="Masukkan nama pemilik..."
									value="<?= $row->office_owner?>"/>
								</div>
								<div class="form-group">
									<label>Telepon Pemilik</label>
									<input required type="text" name="i_phone_owner" class="form-control" placeholder="Masukkan telepon pemilik..."
									value="<?= $row->office_owner_phone?>"/>
								</div>
								<div class="form-group">
									<label>Alamat Pemilik</label>
									<input required type="text" name="i_alamat_pemilik" class="form-control" placeholder="Masukkan alamat pemilik..."
									value="<?= $row->office_owner_address?>"/>
								</div>
								<div class="form-group">
									<label>Email Pemilik</label>
									<input required type="text" name="i_email_pemilik" class="form-control" placeholder="Masukkan nama perusahaan..."
									value="<?= $row->office_owner_email?>"/>
								</div>
						</div>
						<div style="clear:both;"></div>
					</div><!-- /.box-body -->
					<div class="box-footer">
						<?php if (strpos($permit, 'c') !== false || strpos($permit, 'u') !== false): ?>
							<input class="btn btn-danger" type="submit" value="Simpan"/>
							<a href="<?= $close_button?>" class="btn btn-default" >Keluar</a>
						<?php endif; ?>
					</div>
				</div><!-- /.box -->
			</form>
		</div><!--/.col (right) -->
	</div>   <!-- /.row -->
</section><!-- /.content -->
<script type="text/javascript">
var loadFile = function(event) {
	var reader = new FileReader();
	$('#output_1').removeAttr('src');
	$('#output_1').empty();
	reader.onload = function(){
		var output = document.getElementById('output');
		output.src = reader.result;
	};
	reader.readAsDataURL(event.target.files[0]);
};
</script>
