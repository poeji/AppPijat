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
                                            <label>Nama Ruang</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama ruang..." value="<?= $row->list_transaction_name ?>"/>
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