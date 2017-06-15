	<section class="content" id="staticParent">
		<div class="row">
		<!-- right column -->
			<div class="col-md-12">
			<!-- general form elements disabled -->
				<div class="title_page"> <?= $title ?></div>
				<form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">
					<div class="box box-cokelat">
						<div class="box-body">
							<div class="col-md-12">
								<div class="form-group">
									<label>Nama Item :</label>
									<input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama item..." value="<?= $row->item_name ?>"/>
								</div>
								<div class="form-group">
									<label>HPP :</label>
									<input required type="textarea" name="i_hpp_currency" id="i_hpp_currency"
									class="form-control number_only" placeholder="Masukkan harga ..." onkeyup="number_currency(this);"
									value="<?= format_rupiah($row->item_hpp) ?>"/>
									<input required type="hidden" id="i_hpp" name="i_hpp" class="form-control" placeholder="Masukkan HPP..." value="<?= $row->item_hpp ?>"/>
								</div>
								<div class="form-group">
									<label>Margin :</label>
									<input required type="textarea" name="i_margin_currency" id="i_margin_currency"
									class="form-control number_only" placeholder="Masukkan harga ..." onkeyup="number_currency(this);"
									value="<?= format_rupiah($row->item_margin) ?>"/>
									<input required type="hidden" id="i_margin" name="i_margin" class="form-control" placeholder="Masukkan margin..." value="<?= $row->item_margin ?>"/>
								</div>
								<div class="form-group">
									<label>Harga Jual :</label>
									<input required type="textarea" name="i_jual_currency" id="i_jual_currency"
									class="form-control number_only" placeholder="Masukkan harga ..." onkeyup="number_currency(this);"
									value="<?= format_rupiah($row->item_margin) ?>"/>
									<input required type="hidden" id="i_jual" name="i_jual" class="form-control" placeholder="Masukkan harga jual..." value="<?= $row->item_harga_jual ?>"/>
								</div>
								<div class="form-group">
									<label>Limit :</label>
									<input required type="textarea" name="i_limit_currency" id="i_limit_currency"
									class="form-control number_only" placeholder="Masukkan limit ..." onkeyup="number_currency(this);"
									value="<?= format_rupiah($row->item_limit) ?>"/>
									<input required type="hidden" id="i_limit" name="i_limit" class="form-control" placeholder="Masukkan harga jual..." value="<?= $row->item_limit ?>"/>
								</div>
								<div class="form-group">
							      <label for="">Satuan Utama : </label>
							      <input type="hidden" id="item_id" name="pijat_id" value="<?= $id?>">
							      <select id="i_satuan" name="i_satuan" class="selectpicker show-tick form-control" data-live-search="true">
							        <option value="0"></option>
							        <?php 
							        while ($r_satuan = mysql_fetch_array($q_satuan)) {?>
							        <option <?php if($row->item_satuan == $r_satuan['satuan_id']){ ?> 
							        selected="selected" <?php } ?> value="<?= $r_satuan['satuan_id'] ?>"> <?= $r_satuan['satuan_name'] ?>
							        </option>
							        <?php } ?>
							      </select>
							    </div>
							</div>
							<div style="clear:both;"></div>
						</div><!-- /.box-body -->
						<div class="box-footer">
			             <input class="btn btn-danger" type="submit" value="Save"/>
							<a href="<?= $close_button?>" class="btn btn-default" >Close</a>
					</div><!-- /.box -->
				</form>
			</div><!--/.col (right) -->
		</div>   <!-- /.row -->
		 <?php if($id){include '../views/item/form_konversi.php';}?>
	</section><!-- /.content -->
