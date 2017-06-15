<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title"><?= $pijat_name?></h4>
</div>
<form class="" action="<?= $action?>" method="post">
  <div class="modal-body">
    <div class="form-group">
      <label for="">Nama Item : </label>
      <input type="hidden" name="pijat_id" value="<?= $id?>">
      <select class="selectpicker form-control" id="" name="item_id">
        <option value="0"></option>
        <?php while ($r_item = mysql_fetch_array($q_item)) {?>
          <option value="<?= $r_item['item_id']?>"
            <?php if ($row->item == $r_item['item_id']){echo "selected";} ?>><?= $r_item['item_name']?></option>
        <?php } ?>
      </select>
    </div>
     <div class="form-group">
      <label for="">Nama satuan : </label>
      <input type="hidden" name="pijat_id" value="<?= $id?>">
      <select class="selectpicker form-control" id="" name="satuan_id">
        <option value="0"></option>
        <?php 
        $qpjt = mysql_query("select * from satuan where satuan_id = 5");
        while ($r_satuan = mysql_fetch_array($qpjt)) {?>
          <option value="<?= $r_satuan['satuan_id']?>"
            <?php if ($row->satuan == $r_satuan['satuan_id']){echo "selected";} ?>><?= $r_satuan['satuan_name']?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="">Jumlah : </label>
      <input required type="textarea" name="item_jml_currency" id="item_jml_currency"
      class="form-control number_only" placeholder="Masukkan harga ..." onkeyup="number_currency(this);"
      value="<?= number_format($row->item_qty) ?>"/>
      <input type="hidden" id="item_jml" name="item_jml" class="form-control" value="">
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" name="button" class="btn btn-danger">Simpan</button>
    <button type="button" data-dismiss="modal" class="btn btn-default" >Close</a>
  </div>
</form>
<script type="text/javascript">
  $(document).ready(function(){
    $('.selectpicker').selectpicker('refresh');
  });
</script>
