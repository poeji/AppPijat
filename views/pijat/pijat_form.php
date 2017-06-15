<style type="text/css">
  label{
    color: #000;
  }
</style>
<!-- Content Header (Page header) -->

                 <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">

                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan gagal !</b>
               Password dan confirm password tidak sama
                </div>

                </section>
                <?php
                }
                ?>

<!-- Main content -->
<section class="content" id="staticParent">
  <div class="row">
      <!-- right column -->
      <div class="col-md-12">
      <!-- general form elements disabled -->
        <div class="title_page"> <?= $title ?></div>
          <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">
            <div class="box box-cokelat">
              <div class="box-body">
                <div class="col-md-10 col-md-offset-1">
                  <div class="form-group">
                    <label>Nama Pijat</label>
                    <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama paket ..." value="<?= $row->pijat_name ?>"/>
                  </div>
                  <div class="bootstrap-timepicker">
                      <div class="form-group">
                          <label>Durasi</label>
                          <div class="input-group">                                            
                              <input type="text" name="i_waktu" class="form-control timepicker" placeholder="Masukkan menit ..."
                              value="<?= $row->pijat_waktu ?>"/>
                              <div class="input-group-addon">
                                  <i class="fa fa-clock-o"></i>
                              </div>
                          </div><!-- /.input group -->
                      </div><!-- /.form group -->
                  </div>
                  <!-- <div class="form-group">
                    <label>Waktu</label>
                    <input required type="text" name="i_waktu" class="form-control" placeholder="Masukkan waktu ..." value="<?= $row->pijat_waktu ?>"/>
                  </div> -->
                  <div class="form-group">
                    <label>Harga </label>
                    <input required type="textarea" name="i_harga_currency" id="i_harga_currency"
                    class="form-control number_only" placeholder="Masukkan harga ..." onkeyup="number_currency(this);"
                    value="<?= format_rupiah($row->pijat_harga) ?>"/>
                    <input type="hidden" name="i_harga" id="i_harga" class="form-control" placeholder="Masukkan harga ..." value="<?= $row->pijat_harga ?>"/>
                  </div>
                  <div class="form-group">
                    <label for="">Infrastruktur</label>
                    <select class="selectpicker form-control" id="i_infrastruktur" name="i_infrastruktur">
                      <option value="0"></option>
                      <?php while ($row_infrastruktur = mysql_fetch_array($q_infrastruktur)) {?>
                        <option value="<?= $row_infrastruktur['infrastruktur_id']?>"
                          <?php if ($row->infrastruktur==$row_infrastruktur['infrastruktur_id']){echo "selected";}?>
                          ><?= $row_infrastruktur['infrastruktur_name']?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div style="clear:both;"></div>
              </div><!-- /.box-body -->
              <div class="box-footer">
                <input class="btn btn-danger" type="submit" value="Save"/>
                <a href="<?= $close_button?>" class="btn btn-default" >Close</a>
              </div>
            </div><!-- /.box -->
          </form>
      </div><!--/.col (right) -->
  </div>   <!-- /.row -->
  <?php if ($id) { include 'add_item_infrastruktur.php';}?>
</section><!-- /.content -->

  <script type="text/javascript">

    // function number_currency(elem){
    //     var elem_id = '#'+elem.id;
    //     var elem_val    = $(elem_id).val();
    //     var elem_no_cur = elem_id.replace(/_currency/g,'');

    //     var str = elem_val.toString(), parts = false, output = [], i = 1, formatted = null;

    //     parts = str.split(".");
    //     var gabung = '';
    //     for (var i = 0; i < parts.length; i++) {
    //       var gabung = gabung+parts[i];
    //     }

    //     str = gabung.split("").reverse();
    //     var i = 1;
    //     for(var j = 0, len = gabung.length; j < len; j++) {
    //       if(str[j] != ".") {
    //         output.push(str[j]);
    //         if(i%3 == 0 && j < (len - 1)) {
    //           output.push(".");
    //         }
    //         i++;
    //       }
    //     }

    //     formatted = output.reverse().join("");
    //     $(elem_id).val(formatted);
    //     $(elem_no_cur).val(gabung);
    //   }

    $(document).ready(function(){
      $('#datetimepicker3').datetimepicker({
       showMeridian: false
      });
    });    
      

  </script>
