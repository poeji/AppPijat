<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?= $title?> 
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><?= $title?> </a></li>
                        
                        <li class="active">Form</li>
                    </ol>
                </section>
                
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

                          
                          

                             <form role="form" action="<?= $action?>" method="post">

                            <div class="box box-danger">
                                
                               
                                <div class="box-body">
                                    	
                                          <div class="form-group">
                                        <label>Date</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="reservation" name="i_date" value="<?= $date_default?>"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                       
                                     

                                       
                                      
                                   
                                </div><!-- /.box-body -->
                             
                    
                    <div class="box-footer">
                                <input class="btn btn-danger" type="submit" value="Preview"/>
                               <?php
							   if(isset($_GET['preview'])){
							   ?>
							   <a href="report_event_summary.php?page=download_summary&date=<?= $_GET['date']?>" class="btn btn-danger" >Download</a>
								<?php
								}
								?>
                                </div>
                            
                            </div><!-- /.box -->
                             
                            
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
              