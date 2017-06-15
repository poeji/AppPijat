<style media="screen">
  .modal-backdrop {
    z-index: 2;
  }
</style>
  <div class="col-md-12">
    <div class="box">
      <div class="box-body table-responsive" style="background-color: #fff;">
        <div class="col-md-12">
          <table id="example1" class="table table-bordered table-striped">
            <thead style="background-color: #9975a1; color: #fff;">
                <tr>
                    <th width="5%"  style="text-align:center;">No</th>
                    <th  style="text-align:center;">Nama Item</th>
                    <th style=" text-align: center;">Satuan</th>
                    <th style="text-align:center;">Qty</th>
                    <th style="text-align:center;">Config</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              while ($r_pijat_details = mysql_fetch_array($q_pijat_details)) { 

                $dsat = mysql_fetch_array(mysql_query("select * from satuan where satuan_id = '$r_pijat_details[satuan]'"));

                ?>
                <tr style="color: #000;">
                  <td style="text-align:center;"><?=$no;?></td>
                  <td><?= $r_pijat_details['item_name']?></td>
                  <td style="text-align:right;"><?= $dsat['satuan_name']?></td>
                  <td style="text-align:right;"><?= $r_pijat_details['item_qty']?></td>
                  <td style="text-align:center;">
                    <button type="button" name="button" class="btn btn-default" onclick="edit_item(<?= $r_pijat_details['pijat_detail_id']?>,'pijat.php?page=edit_pijat_item&pijat_detail_id=$pijat_detail_id')">
                      <i class="fa fa-pencil"></i>
                    </button>
                    <button type="button" name="button" class="btn btn-default" onclick="confirm_delete(<?= $r_pijat_details['pijat_detail_id']?>,'pijat.php?page=delete_pijat_item&pijat_id=<?= $id?>&id=')">
                      <i class="fa fa-trash-o"></i>
                    </button>
                  </td>
                </tr>
              <?php $no++;} ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="5" style="border-right-style: hidden;">
                  <button type="button" name="button" class="btn btn-danger" onclick="add_item(<?= $id?>)">
                    Add
                  </button>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
  function add_item(id){
    $('#medium_modal').modal();
   var url = 'pijat.php?page=add_new_item&id='+id;
     $('#medium_modal_content').load(url,function(result){});
  }

  function edit_item(id){
    // alert(id);
    var pijat_id = <?= $id?>;
    $('#medium_modal').modal();
   var url = 'pijat.php?page=add_new_item&id='+pijat_id+'&pijat_detail_id='+id;
     $('#medium_modal_content').load(url,function(result){});
  }

</script>
