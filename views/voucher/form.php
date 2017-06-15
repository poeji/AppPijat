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
                                            <label>Nama Voucher</label>
                                             <select id="basic" name="i_type_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" style="min-height:100px;" />
                                           <?php
                       $q_bank = mysql_query("select * from voucher_types order by voucher_type_id");
                                           while($r_bank = mysql_fetch_array($q_bank)){
                                            ?>
                                             <option value="<?= $r_bank['voucher_type_id'] ?>" <?php if($row->voucher_type_id == $r_bank['voucher_type_id']){ ?>selected="selected"<?php } ?>><?= $r_bank['voucher_type_name']?></option>
                                             <?php
                                             }
                                             ?>
                                           </select>      
                                        </div>
                                      
                                        
                                        <div class="form-group">
                                            <label>Kode Voucher</label>
                                            <input required type="text" name="i_code" class="form-control" placeholder="Masukkan kode voucher..." value="<?= $row->voucher_code ?>"/>
                                        </div>
            

                                         <div class="form-group">
                                            <label>Nominal Voucher</label>
                                            <input required type="number" name="i_value" class="form-control" placeholder="Masukkan nominal voucher..." value="<?= $row->voucher_value ?>"/>
                                        </div>
                                          
                                         <label>Expired</label>
                                            <br>
                                            
                                         <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="date_picker1" name="i_date" value="<?= $row->voucher_date ?>"/>
                                        </div><!-- /.input group -->
            
                                                    
                                        
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