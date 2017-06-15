                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                             <div class="title_page"> <?= $title2 ?></div>
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="examples" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Sub Menu Name</th>
                                                <th>Nama Kategori</th> 
                                                 <th>Config</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query_2)){
                                            ?>
                                            <tr>
                                            <td><?= $no?></td>
                                                <td><?= $row['menu_type_name']?></td>
                                               <td><?= $row['kategori_utama_name']?></td>
                                               <td style="text-align:center;">

                                                    <a href="kategori_menu.php?page=form_sub&id=<?= $row['menu_type_id']?>" class="btn btn-default" ><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['menu_type_id']; ?>,'kategori_menu.php?page=delete_sub&id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>

                                                </td> 
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <td colspan="6"><a href="<?= $add_button_sub ?>" class="btn btn-danger " >Add</a></td>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->