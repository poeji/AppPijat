                <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Simpan Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Edit Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 3){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Delete Berhasil
                </div>
           
                </section>
                <?php
                }
                ?>
                <!-- Main content -->
<section class="content">
    <div class="row">          <div class="title_page"> <?= $title ?></div>
        <div class="col-md-12">
             <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">
                  <div class="box box-cokelat">
                    <div class="box-body">
                      <div class="col-md-12">
                      <label>Konversi</label>
                         <select id="satuan" name="satuan" size="1" class="selectpicker show-tick form-control" data-live-search="true">
                        <?php
                        while($r_satuan = mysql_fetch_array($query)){?>
                          <option value="<?= $r_satuan['satuan_id'] ?>"><?= $r_satuan['satuan_name']?> 
                          </option>
                        <?}?>
                          </select>
                    
                      </div>
                  <div style="clear:both;"></div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
          </form>
        </div><!--/.col (right) -->
        </div>
<div class="row">
      <div class="col-md-12">      
        <div class="box"> 
          <div class="box-body2 table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>Satuan Utama</th>
                  <th>Jumlah</th>
                  <th>Satuan</th> 
                  <th>Konversi</th>
                  <th>Config</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $no = 1;
                while($row = mysql_fetch_array($query_konversi)){?>
              <tr>
                <td><?= $no?></td>
                <td><?= $row['satuan_name']; ?></td>
                <td><?= $row['jumlah']?></td>
                <td><?= $row['satuan']?></td>
                <td><?= $row['jumlah_satuan']?></td>
                <td style="text-align:center;"></td>
              </tr>
              <?php
              $no++;
              }?>
              </tbody>
                <tfoot>
               <tr>
                <td><button type="button" class="btn btn-danger" onclick="select_satuan()">Tambah</button></td>
              </tr>                                              
                  
                </tfoot>
           </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
</section><!-- /.content -->
<script type="text/javascript">
function select_satuan(){
  var satuan_id = $('#satuan').val()
    $('#medium_modal').modal();
  var url = 'konversi.php?page=pop_modal_konversi&satuan_id='+satuan_id;
    $('#medium_modal_content').load(url,function(result){});
}
</script>