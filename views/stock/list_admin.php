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
                                    <div class="col-xs-12">
                                        <table id="example1" class="table table-bordered table-striped">
                                        <thead style="background-color: #9975a1; color: #fff;">
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Nama</th>
                                                <th>Satuan</th>
                                                <th>Limit</th>
                                                <?php
                                                while($r_branch = mysql_fetch_array($q_branch)){ ?>
                                                <th><?= $r_branch['branch_name']?></th>
                                                <?php } ?>
                                                <!-- <th>Config</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                           while($row = mysql_fetch_array($query)){?>
                                            <tr>
                                                <td><?= $no?></td>
                                                <td><?= $row['item_name']?></td>
                                                <td><?= $row['satuan_name']?></td>
                                                <td><?= $row['item_limit']?></td>

                                                <?php
                                                  $q_branch_ = select_config('branches', '');
                                                  while ($r_branch_ = mysql_fetch_array($q_branch_)) {?>
                                                <td style="text-align: right
                                                  <?php
                                                  $i_id=$row['item_id'];
                                                  if( get_stock($i_id, $r_branch_['branch_id']) <= $row['item_limit'])
                                                    {
                                                     echo "color:#fff;background-color: #d46ce0 !important;"; 
                                                     } ?>">
                                                  <?= get_stock($row['item_id'],$r_branch_['branch_id'])?>
                                                </td>         
                                                  <?php } ?>    
                                                
                                               <!--  <td style="text-align:center;">
                                                    <a href="stock.php?page=form&id=<?= $row['item_id']?>" class="btn btn-default" >
                                                      <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['item_id']; ?>,'stock.php?page=delete&id=')"
                                                      class="btn btn-default" >
                                                      <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td> -->
                                            </tr>
                                            <?php $no++; } ?>



                                        </tbody>
                                          <!-- <tfoot>
                                            <tr>
                                                <td colspan="8"><a href="<?= $add_button ?>" class="btn btn-danger " >Add</a></td>
                                            </tr>
                                        </tfoot> -->
                                    </table>
                                    </div>
                                
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->