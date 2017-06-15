                <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">

                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Simpan Berhasil
                </div>

                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 2){
                ?>
                <section class="content_new">

                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Edit Berhasil
                </div>

                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 3){
                ?>
                <section class="content_new">

                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Delete Berhasil
                </div>

                </section>
                <?php
                }
                ?>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">

                             <div class="title_page"> <?= $title ?></div>

                            <div class="box">

                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead style="background-color: #9975a1; color: #fff;">
                                            <tr>
                                            	<th width="5%">No</th>

                                                <th>Nama</th>
                                                <th>Satuan</th>
                                                <th>Limit</th>
                                                <th>Stock</th>
                                              	<th>Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                           while($row = mysql_fetch_array($query)){?>
                                            <tr>
                                                <td><?= $no?></td>
                                                <td><?= $row['item_name']?></td>
                                                <td><?= $row['unit_name']?></td>
                                                <td><?= $row['item_limit']?></td>
                                                <?php
                                                $count_branch = 0;
                                                $row_limit = 0;
                                                $q_branch2 = mysql_query("select * from branches $where_branch order by branch_id");
                                               	while($r_branch2 = mysql_fetch_array($q_branch2)){ ?>
                                                <td  
                                                    <?php 
                                                        if(get_stock($row['item_id'], $r_branch2['branch_id']) == $row_limit){ ?> 
                                                            bgcolor="#fb7b7b" style="color:#fff;"
                                                    <?php }elseif(get_stock($row['item_id'], $r_branch2['branch_id']) <= $row['item_limit']){
                                                    ?>  bgcolor="#D82827" style="color:#fff;"
                                                    <?php } ?>>
                                                  <?= get_stock($row['item_id'], $r_branch2['branch_id'])?>
                                                </td>
                                              	
                                                <?php $count_branch++;} ?>
                                               
                                                
                                                <td style="text-align:center;">
                                                    <a href="stock.php?page=form&id=<?= $row['item_id']?>" class="btn btn-default" >
                                                      <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['item_id']; ?>,'stock.php?page=delete&id=')"
                                                      class="btn btn-default" >
                                                      <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;
                                                }
                                            ?>



                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <td colspan="<?php $col = $count_branch + 5; echo $col; ?>"><a href="<?= $add_button ?>" class="btn btn-danger " >Add</a></td>

                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
