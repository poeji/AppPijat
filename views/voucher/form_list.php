<!-- Content Header (Page header) -->
        

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          <div class="title_page"> <?= $title3 ?></div>

                             <form action="<?= $actions;?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                    
                                    
                                        <div class="col-md-12">
                                        
                                        <div hidden="" class="form-group">
                                            <label hidden="">Nama Voucher</label>
                                            <select hidden="" id="basic" name="i_type_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" style="min-height:100px;" />
                                           <?php
                                                    $q_bank = mysql_query("select * from voucher_types order by voucher_type_id");
                                           while($r_bank = mysql_fetch_array($q_bank)){
                                            ?>
                                            <option hidden="" value="<?= $r_bank['voucher_type_id'] ?>" <?php if($row->voucher_type_id == $r_bank['voucher_type_id']){ ?>selected="selected"<?php } ?>><?= $r_bank['voucher_type_name']?></option>
                                             <?php
                                             }
                                             ?>
                                           </select>      
                                        </div>
                                        <div hidden="" class="form-group">
                                            <label>Voucher ID</label>
                                            <input  required type="text" name="i_id" class="form-control" placeholder="Masukkan kode id..." value="<?= $row->voucher_id ?>" readonly=""/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Kode Voucher</label>
                                            <input  required type="text" name="i_code" class="form-control" placeholder="Masukkan kode voucher..." value="<?= $row->voucher_code ?>" readonly=""/>
                                        </div>
                                        
                                        <label>Expired</label>
                                            <br>
                                            
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="" name="i_date" value="<?= $row->voucher_date ?>" readonly=""/>
                                        </div><!-- /.input group -->
                                        </br>
                                        <div class="form-group">
                                            <label>Jumlah Voucher Keluar</label>
                                            <input required type="number" name="i_voucher" class="form-control" placeholder="Jumlah voucher..." value=""/>
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