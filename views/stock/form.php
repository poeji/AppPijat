
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
                         
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama barang..." value="<?= $row->item_name ?>"/>
                                </div>
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <select id="basic" name="i_unit_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                   <?php
                                   while($r_unit = mysql_fetch_array($query_unit)){ ?>
                                     <option value="<?= $r_unit['unit_id'] ?>" <?php if($row->unit_id == $r_unit['unit_id']){ ?> selected="selected"<?php } ?>><?= $r_unit['unit_name']?></option>
                                     <?php } ?>
                                   </select>                                            
                                </div>
                              <div class="form-group">
                                    <label>Limit</label>
                                    <input min="0" required type="number" name="i_item_limit" class="form-control" placeholder="Masukkan limit stok..." value="<?= $row->item_limit ?>"/>
                              </div>
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
</section><!-- /.content -->