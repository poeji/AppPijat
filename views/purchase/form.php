<script type="text/javascript">
function grand_total()
{

var harga = parseFloat(document.getElementById("i_harga").value);
var qty = parseFloat(document.getElementById("i_qty").value);


var	total = harga * qty;

//alert('total='+total+'|harga:'+harga+'|qty:'+qty);

document.getElementById("i_total").value = total;

}

</script>
<style type="text/css">
    label{
      color: rgb(107, 52, 106);
    }
</style>
<!-- MEMBER -->
<?php if(isset($_GET['did']) && $_GET['did'] == 1){ ?>
  <section class="content_new">
    <div class="alert alert-info alert-dismissable">
      <i class="fa fa-check"></i>
      <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
      <b>Sukses !</b>
      Transaksi telah tersimpan
    </div>
  </section>
<?php }else if(isset($_GET['did']) && $_GET['did'] == 2){ ?>
  <section class="content_new">
    <div class="alert alert-info alert-dismissable">
      <i class="fa fa-check"></i>
      <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
      <b>Sukses !</b>
      Edit Berhasil
    </div>
  </section>
<?php }else if(isset($_GET['did']) && $_GET['did'] == 3){ ?>
  <section class="content_new">
    <div class="alert alert-info alert-dismissable">
      <i class="fa fa-check"></i>
      <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
      <b>Sukses !</b>
      Delete Berhasil
    </div>
  </section>
<?php } ?>
<!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
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
                                <label>Tanggal</label>
                                <div class="input-group">   
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" required class="form-control pull-right" id="date_picker1" name="i_date" value="<?= $row->purchase_date ?>"/>
                                </div><!-- /.input group -->
                              </div>  

                              <div class="form-group">
                                <label>Nama Barang</label>
                                <?php /*
                                <select id="i_item_id" name="i_item_id" size="1" class="form-control" onchange="set_item_satuan()" />
                                */ ?>
                                <select id="i_item_id" name="i_item_id" size="1" class="form-control" />
                                <option value="0"></option>
                                <?php
                                  while($r_item = mysql_fetch_array($query_item)){
                                ?>
                                <option value="<?= $r_item['item_id'] ?>" <?php if($row->item_id == $r_item['item_id']){ ?> selected="selected"<?php } ?>><?= $r_item['item_name']?></option>
                                <?php
                                  }
                                ?>
                                </select>                                            
                              </div>
                              <!-- <div class="form-group">
                                <label>Harga</label>
                                <input required type="number" name="i_harga" id="i_harga" class="form-control" placeholder="Masukkan harga..." value="<?= $row->purchase_price ?>" min="0"/>
                              </div> -->
                              <div class="form-group">
                                <label>Harga Beli :</label>
                                <input required type="textarea" name="i_harga_currency" id="i_harga_currency"
                                class="form-control number_only" placeholder="Masukkan harga ..." onkeyup="number_currency(this);"
                                value="<?= format_rupiah($row->purchase_price) ?>"/>
                                <input required type="hidden" id="i_harga" name="i_harga" class="form-control" placeholder="Masukkan harga ..." value="<?= $row->purchase_price ?>"/>
                              </div>
                              <div class="form-group">
                                <label>QTY</label>
                                <input required type="number" name="i_qty" id="i_qty" class="form-control" placeholder="Masukkan jumlah..." value="<?= $row->purchase_qty ?>" onChange="grand_total()" min="0"/>
                              </div>
                              <?php /*
                              <div class="form-group">
                                <label>Satuan</label>
                                <select id="i_satuan_id" name="i_satuan_id" size="1" class="form-control" ></select>
                              </div>
                              */ ?>
                              <div class="form-group">
                                <label>Satuan</label>
                                <select id="basic" name="i_satuan_id" size="1" class="form-control" />
                                <option value="0"></option>
                                <?php
                                $query_satuan = mysql_query("select * from satuan where satuan_id = 5");
                                  while($r_satuan = mysql_fetch_array($query_satuan)){
                                ?>
                                <option value="<?= $r_supplier['satuan_id'] ?>"><?= $r_satuan['satuan_name']?></option>
                                <?php
                                  }
                                ?>
                                </select>                                    
                              </div>
                              <div class="form-group">
                              <label>Total Harga</label>
                              <input required type="text" readonly name="i_total" id="i_total" class="form-control"  value="<?= $row->purchase_total ?>"/>
                              </div>
                              
                              <div class="form-group">
                                <label>Supplier</label>
                                <select id="basic" name="i_supplier" size="1" class="form-control" />
                                <option value="0"></option>
                                <?php
                                  while($r_supplier = mysql_fetch_array($query_supplier)){
                                ?>
                                <option value="<?= $r_supplier['supplier_id'] ?>" <?php if($row->supplier_id == $r_supplier['supplier_id']){ ?> selected="selected"<?php } ?>><?= $r_supplier['supplier_name']?></option>
                                <?php
                                  }
                                ?>
                                </select>                                    
                              </div>

                              <div class="form-group">
                                <label>Cabang</label>
                                <select id="basic" name="i_branch_id" size="1" class="form-control"/>
                                <option value="0"></option>
                                <?php
                                  while($r_branch = mysql_fetch_array($query_branch)){
                                ?>
                                <option value="<?= $r_branch['branch_id'] ?>" <?php if($row->branch_id == $r_branch['branch_id']){ ?> selected="selected"<?php } ?>><?= $r_branch['branch_name']?></option>
                                <?php
                                  }
                                ?>
                                </select>                                            
                              </div>

                        </div>

                          <div style="clear:both;"></div>

                          </div><!-- /.box-body -->

                          <div class="box-footer">
                            <?php
                            if(!$id){
                            ?>
                            <input class="btn btn-danger" type="submit" value="Save"/>
                            <?php
                            }
                            ?>
                            <a href="<?= $close_button?>" class="btn btn-default" >Close</a>

                          </div>

                      </div><!-- /.box -->
                  </form>
              </div><!--/.col (right) -->
          </div>   <!-- /.row -->
      </section><!-- /.content -->
      <script type="text/javascript">
        function set_item_satuan()
        {
          var item_id = $('#i_item_id').val();
          // alert(item_id);
          $.ajax({
            type        : "post",
            url         : "purchase.php?page=get_satuan_id",
            data        : {item_id:item_id},
            dataType    : "json",
            success: function(data){
              $('#i_satuan_id').empty();
              $('#i_satuan_id').append('<option value="0"></option>');

              for (var i = 0; i < data.length; i++) {
                $('#i_satuan_id').append('<option value="'+data[i].item_satuan+'">'+data[i].satuan_name+'</option>');
              }

            },
            error: function(data)
            {
              alert("error");
            }
          });
        }
      </script>