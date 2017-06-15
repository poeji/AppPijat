<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 style="color: #000;"><?= $ruangan_name?></h4>
</div>
<form class="" action="<?= $action?>" method="post">
  <div class="modal-body">
    <div class="modal-body">
      <label for="" style="font-size:12px;color:#000;font-family:arial;">Infrastruktur</label>
      <input type="hidden" id="ruangan_id" name="ruangan_id" value="<?= $ruangan_id?>">
      <select class="selectpicker form-control" id="infrastruktur_id" name="infrastruktur_id" onchange="get_img_infrastruktur()">
        <option value="0"></option>
        <?php while ($r_infrastruktur = mysql_fetch_array($q_infrastruktur)) {?>
          <option value="<?= $r_infrastruktur['ruangan_infrastruktur_id']?>"><?= $r_infrastruktur['infrastruktur_name']?></option>
        <? } ?>
      </select>
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" name="button" class="btn btn-warning" onclick="add_infrastruktur()">Hapus</button>
    <button type="button" name="button" class="btn btn-warning"  data-dismiss="modal">Keluar</button>
  </div>
</form>
<script type="text/javascript">
  $(document).ready(function(){
    $('.selectpicker').selectpicker('refresh');
  });
</script>
