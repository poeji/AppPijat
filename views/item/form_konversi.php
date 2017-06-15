
<div class="row">
  <div class="col-md-12">      
    <div class="box"> 
      <div class="box-body2 table-responsive">
        <div class="col-md-12">
          <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>Item</th>
                  <th>Satuan Utama</th>
                  <th>QTY Utama</th> 
                  <th>Konversi</th>
                  <th>QTY Konversi</th>
                  <th style="text-align : center;">Config</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $no = 1;
                while($row = mysql_fetch_array($q_tabel_konversi)){?>
              <tr>
                <td><?= $no?></td>
                <td><?= $row['item_name']; ?></td>
                <td><?= $row['satuan_name']?></td>
                <td><?= $row['jumlah']?></td>
                <td><?= $row['konversi']?></td>
                <td>
                  <?= $row['jumlah_satuan_konversi']?>
                  <!-- <input type="" id="konversi_id" name="konversi_id" value="<?= $row['konversi_id']?>"/> -->
                </td>
                <td style="text-align:center;">
                      <a onclick="edit_konversi(<?= $row['konversi_id']?>)" class="btn btn-default" >
                    <i class="fa fa-pencil"></i>
                  </a>
                 <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['konversi_id']; ?>,'item.php?page=delete_konversi&item_id=<?= $id?>&id=')"
                    class="btn btn-danger" ><i class="fa fa-trash-o"></i>
                  </a>
                </td>
              </tr>
              <?php
              $no++;
              }?>
              </tbody>
                <tfoot>
               <tr>
                <td colspan="7"><button type="button" class="btn btn-danger" onclick="select_satuan()">Tambah</button></td>
              </tr>                                              
                  
                </tfoot>
           </table>
        </div>
    </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>

<script type="text/javascript">
function select_satuan(){
  var id = '<?= $id;?>';
    $('#medium_modal').modal();
  var url = 'item.php?page=pop_modal_konversi&id='+id;
    $('#medium_modal_content').load(url,function(result){});
}
function edit_konversi(konversi_id){
  var id = $('#item_id').val()
    $('#medium_modal').modal();
  var url = 'item.php?page=pop_modal_konversi&id='+id+'&konversi_id='+konversi_id;
    $('#medium_modal_content').load(url,function(result){});
}
</script>