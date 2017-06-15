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
                                       
                                     
                                         <div class="form-group">
                                         <?php
                                         if($_SESSION['user_type_id'] == 1 || $_SESSION['user_type_id'] == 2){
										 ?>
                                            <label>Cabang</label>
                                            <select id="basic" name="i_branch_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                            <option value="0">Semua</option>
                                           <?php
                                           while($r_branch = mysql_fetch_array($query_branch)){
										   ?>
                                           
                                             <option value="<?= $r_branch['branch_id'] ?>" <?php if($branch_id == $r_branch['branch_id']){ ?> selected="selected"<?php } ?>><?= $r_branch['branch_name']?></option>
                                             <?php
										   }
											 ?>
                                           </select>
                                           <?php
										 }else{
										   ?>  
                                            <label>Cabang</label>
                                            <select id="basic" name="i_branch_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_branch = mysql_fetch_array($query_branch)){
										   ?>
                                          
                                             <option value="<?= $r_branch['branch_id'] ?>" <?php if($branch_id == $r_branch['branch_id']){ ?> selected="selected"<?php } ?>><?= $r_branch['branch_name']?></option>
                                             <?php
										   }
											 ?>
                                           </select>
                                           <?php
										 }
										   ?>                                          
                                        </div>

                                        <div class="form-group">
                                            <label>Type Journal</label>
                                            <select id="basic" name="i_journal_type" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                            <option value="0">Semua</option>
                                           <?php
                                           while($r_journal = mysql_fetch_array($query_type_journal)){
                       ?>
                                           
                                             <option value="<?= $r_journal['journal_type_id'] ?>" <?php if($journal_type_id == $r_journal['journal_type_id']){ ?> selected="selected"<?php } ?>><?= $r_journal['journal_type_name']?></option>
                                             <?php
                       }
                       ?>
                                           
                                           </select>
                                                                
                                        </div>
                                        

                                          </div>
                                   
                                              
                                              <div style="clear:both;"></div>
                                      
                                   
                                </div><!-- /.box-body -->
                             
                    
                    <div class="box-footer">
                                <input class="btn btn-danger" type="submit" value="Preview"/>
                                          
                             	 <?php 
 
/*if(isset($_GET['preview'])){ ?><a href="report_detail.php?page=download&date=<?= $_GET['date']?>&owner=<?= $_GET['owner']?>" class="btn btn-primary" >Download Excel</a>
								 <a href="report_detail.php?page=download_pdf&date=<?= $_GET['date']?>&owner=<?= $_GET['owner']?>" class="btn btn-primary" >Download PDF</a>
                              
								 <?php }*/  ?>
                                </div>
                            
                            </div><!-- /.box -->
                             
                            
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
              