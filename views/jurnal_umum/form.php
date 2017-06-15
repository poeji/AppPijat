
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
                                            <input type="text" required class="form-control pull-right" id="date_picker1" name="i_journal_date" value="<?= $row->journal_date ?>"/>
                                        </div><!-- /.input group -->
            </div>
                                     
                                        <div class="form-group">
                                            <label>Tipe Jurnal</label>
                                            <select id="basic" name="i_journal_type_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_journal_type = mysql_fetch_array($q_journal_type)){
										   ?>
                                             <option value="<?= $r_journal_type['journal_type_id'] ?>" <?php if($row->journal_type_id == $r_journal_type['journal_type_id']){ ?> selected="selected"<?php } ?>><?= $r_journal_type['journal_type_name']?></option>
                                             <?php
										   }
											 ?>
                                           </select>                                            
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                      	<div class="form-group">
                                            <label>Debit</label>
                                            <input min="0" required type="number" name="i_journal_debit" class="form-control" placeholder="" value="<?= $row->journal_debit ?>"/>
                                        </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                      	<div class="form-group">
                                            <label>Credit</label>
                                            <input min="0" required type="number" name="i_journal_credit" class="form-control" placeholder="" value="<?= $row->journal_credit ?>"/>
                                        </div>
                                        </div>
                                        
                                         <div class="col-md-6">
                                      	<div class="form-group">
                                            <label>Piutang</label>
                                            <input min="0" required type="number" name="i_journal_piutang" class="form-control" placeholder="" value="<?= $row->journal_piutang ?>"/>
                                        </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                      	<div class="form-group">
                                            <label>Hutang</label>
                                            <input min="0" required type="number" name="i_journal_hutang" class="form-control" placeholder="" value="<?= $row->journal_hutang ?>"/>
                                        </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-6">
                                      	<div class="form-group">
                                            <label>Bank</label>
                                          <select id="basic" name="i_bank_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                          <option value="0">-</option>
                                           <?php
                                           while($r_bank = mysql_fetch_array($q_bank)){
										   ?>
                                             <option value="<?= $r_bank['bank_id'] ?>" <?php if($row->bank_id == $r_bank['bank_id']){ ?> selected="selected"<?php } ?>><?= $r_bank['bank_name']?></option>
                                             <?php
										   }
											 ?>
                                           </select>       
                                        </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                      	<div class="form-group">
                                            <label>Cabang</label>
                                          <select id="basic" name="i_branch_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                          
                                           <?php
                                           while($r_branch = mysql_fetch_array($q_branch)){
										   ?>
                                             <option value="<?= $r_branch['branch_id'] ?>" <?php if($row->branch_id == $r_branch['branch_id']){ ?> selected="selected"<?php } ?>><?= $r_branch['branch_name']?></option>
                                             <?php
										   }
											 ?>
                                           </select>      
                                        </div>
                                        </div>
                                       
                                        <div class="col-md-12">
                                      	<div class="form-group">
                                            <label>Keterangan</label>
                                           <textarea name="i_journal_desc" cols="5" rows="5" class="form-control"><?= $row->journal_desc ?></textarea>
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