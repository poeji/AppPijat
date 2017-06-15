<!-- Content Header (Page header) -->
<script type="text/javascript">    
$('#time').timepicker({
    incremnet.Hour
  });
</script>
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
                                        
                                        <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <label>Jam</label>
                                            <div class="input-group">                                            
                                                <input type="text" name="i_hours" class="form-control timepicker" id="time" value="<?= $row->order_time; ?>"/>
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                    </div>
                      
                                      <div class="form-group">
                                            <label>Keterangan</label>
                                            <input required type="text" name="keterangan" class="form-control" placeholder="Masukkan kota..." value="<?= $row->ket; ?>"/>
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