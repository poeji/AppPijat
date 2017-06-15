<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title" style="text-align: center;">Konversi : <?=$item_name?></h4>
</div>
<form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form" novalidate>
<div class="modal-body">
    <div class="col-md-12">
        <input type="hidden" name="item_id" value="<?=$id?>">
        <input type="hidden" name="satuan" id="satuan" value="<?=$satuan?>">
      <div class="form-group">
        <label>Jumlah Satuan Utama</label>
        <input required type="text" name="qty_utama" id="qty_utama" class="form-control"
        placeholder="Masukkan jumlah satuan utama..." value="<?= $row->jumlah ?>"/>
      </div>
      <div class="form-group">
        <label>Satuan Konversi</label>
        <select id="satuan_konversi" name="satuan_konversi" size="1" class="selectpicker show-tick form-control" data-live-search="true">
        <option value="0"></option>
        <?php
         while($r_satuan = mysql_fetch_array($q_konversi)){?>
        <option value="<?= $r_satuan['satuan_id'] ?>"
                      <?php if($row->satuan_konversi == $r_satuan['satuan_id']){ ?> selected="selected"<?php } ?>>
                      <?= $r_satuan['satuan_name'] ?> 
                      </option>
                    <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label>Jumlah Satuan Konversi</label>
        <input required type="number" name="qty_konversi" id="qty_konversi" class="form-control"
        placeholder="Masukkan jumlah..." value="<?= $row->jumlah_satuan_konversi ?>"/>
      </div>
</div>
<div class="modal-footer">
  <?php if (strpos($permit, 'c') !== false || strpos($permit, 'u') !== false){ ?>
    <!-- <input class="btn btn-primary" type="submit" value="Simpan"/> -->
    <button type="submit" name="button" class="btn btn-danger">Simpan</button>
  <?php } ?>
  <a href="<?= $close_button?>" class="btn btn-default" >Close</a>
</div>
</form>
