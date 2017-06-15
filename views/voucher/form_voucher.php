<!-- Content Header (Page header) -->
        

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          <div class="title_page"> <?= $title2 ?></div>

                             <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                    
                                    
                                        <div class="col-md-12">
                                        
                                       <div class="form-group">
                                            <label>ID Voucher Detail</label>
                                            <input readonly="" required type="text" name="i_code" class="form-control" placeholder="Masukkan kode voucher..." value="<?= $row->id_voucher_detail ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Voucher Type</label>
                                            <input readonly="" required type="text" name="i_code" class="form-control" placeholder="Masukkan kode voucher..." value="<?= $row->voucher_type_name ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Voucher Group</label>
                                            <input readonly="" required type="text" name="i_code" class="form-control" placeholder="Masukkan kode voucher..." value="<?= $row->voucher_code ?>"/>
                                        </div>
                                         <div class="form-group">
                                            <label>Voucher No</label>
                                            <input readonly="" required type="text" name="i_value" class="form-control" placeholder="Masukkan nominal voucher..." value="<?= $row->no_voucher ?>"/>
                                        </div>

                                        <label>Tanggal Keluar Voucher</label>
                                            
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input readonly="" type="text" required class="form-control pull-right" id="" name="i_date" value="<?= $row->voucher_date_issued ?>"/>
                                        </div><!-- /.input group -->
                                        </br>
                                        <label>Tanggal Expired Voucher</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input readonly="" type="text" required class="form-control pull-right" id="" name="i_date" value="<?= $row->voucher_exp_date ?>"/>
                                        </div><!-- /.input group -->
                                        </br>
                                         <div class="form-group">
                                            <label>Voucher Status</label>
                                            <input readonly="" required type="text" name="i_value" class="form-control" placeholder="Masukkan nominal voucher..." value="<?php if($row->status_voucher==0){
                                                                                                                                                                    echo "Not Used";}
                                                                                                                                                                 else{
                                                                                                                                                                    echo "Used";} ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Voucher Use By</label>
                                            <input readonly="" required type="text" name="i_code" class="form-control" placeholder="Masukkan kode voucher..." value="<?= $row->voucher_use ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Branch</label>
                                            <input readonly="" required type="text" name="i_code" class="form-control" placeholder="Masukkan kode voucher..." value="<?= $row->id_branch ?>"/>
                                        </div>
                                         <div class="form-group">
                                            <label>Nominal Voucher</label>
                                            <input readonly="" required type="text" name="i_value" class="form-control" placeholder="Masukkan nominal voucher..." value="<?= $row->voucher_value ?>"/>
                                        </div>
                     
                                        </div>
                                       
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                  <div class="box-footer">
                               
                                <a href="<?= $close_button?>" class="btn btn-default" >Close</a>
                             
                             </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->