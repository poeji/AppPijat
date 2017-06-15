  <div class="row">
    <div class="col-xs-12">
      <div class="title_page"></div>
      <div class="box">
        <div class="box-body2 table-responsive">
          <div class="col-md-12">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="5%">No</th>
                  <th style="text-align: center;">Pijat</th>
                  <th style="text-align: center;">Config</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $no = 1;
              while($r_paket_pijat_details = mysql_fetch_array($q_paket_pijat_details)){
              ?>
                    <tr>
                      <td><?= $no?></td>
                      <td><?= $r_paket_pijat_details['pijat_name']?></td>
                      <td style="text-align:center;">
                        <a class="btn btn-default" onclick="edit_pijat(<?= $r_paket_pijat_details['paket_pijat_detail_id'] ?>)">
                          <i class="fa fa-pencil"></i>
                        </a>
                        <a href="javascript:void(0)" onclick="confirm_delete(<?= $r_paket_pijat_details['paket_pijat_detail_id'] ?>,
                        'paket_pijat.php?page=delete_paket_pijat_detail&paket_pijat_id=<?= $paket_pijat_id?>&paket_pijat_detail_id=')"
                        class="btn btn-default" >
                          <i class="fa fa-trash-o"></i>
                        </a>
                      </td>
                    </tr>
              <?php
              $no++; } ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="3">
                    <a href="javascript:void(0)" class="btn btn-danger"
                    onclick="add_pijat()">Add
                  </a>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>
<script type="text/javascript">
function add_pijat(){
  var paket_pijat = <?= $paket_pijat_id?>;
  $('#medium_modal').modal();
  var url = 'paket_pijat.php?page=popmodal_add_pijat&paket_pijat_id='+paket_pijat;
  $('#medium_modal_content').load(url,function(result){
    });
}

function edit_pijat(id){
  var paket_pijat = <?= $paket_pijat_id?>;
  $('#medium_modal').modal();
  var url = 'paket_pijat.php?page=popmodal_add_pijat&paket_pijat_id='+paket_pijat+'&paket_pijat_detail_id='+id;
  $('#medium_modal_content').load(url,function(result){
    });
}
</script>
