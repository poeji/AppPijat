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
                                                <label>Nama Sub Kategori Menu</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-cutlery"></i>
                                                    </div>
                                                <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama sub menu..." value="<?= $row->menu_type_name ?>"/>
                                                </div>
                                        </div>
                                         <div class="form-group">
                                            <label>Nama Kategori Menu</label>
                                            <select class="selectpicker show-tick form-control" name="i_status" id="i_status">
                                              <?php while($r_type = mysql_fetch_array($query_kategori_type)){ ?>
                                                <option <?php if($row->id_kategori_utama == $r_type['id_kategori_utama']){ ?> selected="selected"<?php } ?> value="<?= $r_type['id_kategori_utama'] ?>"><?= $r_type['kategori_utama_name']?></option>
                                              <?php } 
                                              ?>
                                            </select>
                                            <!-- <input required type="number" name="i_out_time" class="form-control" placeholder="" value="<? $row->dapur_id ?>"/> -->
                                        </div>
                                        
                                    </div>
                                     
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