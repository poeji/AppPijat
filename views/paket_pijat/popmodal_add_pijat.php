<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<form action="<?= $action?>" method="post">
  <div class="modal-body">
    <div class="form-group">
      <input type="hidden" name="paket_pijat_id" id="paket_pijat_id" value="<?= $paket_pijat_id ?>">
      <input type="hidden" name="paket_pijat_detail_id" id="paket_pijat_detail_id" value="<?= $paket_pijat_detail_id ?>">
      <label>Pijat</label>
      <select class="selectpicker form-control" name="pijat_id" id="pijat_id">
        <option value="0"></option>
        <?php
        while ($r_pijat = mysql_fetch_array($q_pijat)) {?>
          <option value="<?= $r_pijat['pijat_id'] ?>"
          <?php if ($row->pijat == $r_pijat['pijat_id']){ echo "selected"; } ?>>
            <?= $r_pijat['pijat_name']?>
          </option>
        <?php }?>
      </select>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
    <input type="submit" class="btn btn-primary" value="Simpan">
  </div>
</form>
<script type="text/javascript">
  function number_currency_(elem){
  var elem_id = '#'+elem.id;
  var elem_val   = $(elem_id).val();
  var elem_no_cur = elem_id.replace(/_currency/g,'');

  var str = elem_val.toString(), parts = false, output = [], i = 1, formatted = null;

  parts = str.split(".");
  var gabung = '';
  for (var i = 0; i < parts.length; i++) {
   var gabung = gabung+parts[i];
  }

  str = gabung.split("").reverse();
  var i = 1;
  for(var j = 0, len = gabung.length; j < len; j++) {
   if(str[j] != ".") {
     output.push(str[j]);
     if(i%3 == 0 && j < (len - 1)) {
       output.push(".");
     }
     i++;
   }
  }

  formatted = output.reverse().join("");
  $(elem_id).val(formatted);
  $(elem_no_cur).val(gabung);
}

$(document).ready(function(){
  $('.selectpicker').selectpicker('refresh');
});
</script>
