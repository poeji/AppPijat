<!-- Content Header (Page header) -->
              
                
                 <?php
                if(isset($_GET['err']) && $_GET['err'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-danger alert-dismissable">
                <i class="fa fa-warning"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan gagal !</b>
               Data Item masih kosong
                </div>
           
                </section>
                <?php
                }
				?>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                           <div class="title_page"> <?= $title ?></div>

                             <form role="form" action="<?= $action?>" method="post">

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                    	<div class="col-md-12">
                                          <div class="form-group">
                                        <label>Date</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="reservation" name="i_date" value="<?= $date_default?>"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                       
                                     
                                        
                                        

                                          </div>
                                   
                                              
                                              <div style="clear:both;"></div>
                                      
                                   
                                </div><!-- /.box-body -->
                             
                    
                    <div class="box-footer">
                                <input class="btn btn-danger" type="submit" value="Preview"/>
                             
                                </div>
                            
                            </div><!-- /.box -->
                             
                            
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
              