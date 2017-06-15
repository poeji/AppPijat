
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
                                        <thead>
                                            <tr>
                                            	<th width="5%">No</th>
                                            	<th width="5%">Tanggal Pembelian</th>
                                                <th>Nama Barang</th>
                                                <th width="5%">Jumlah</th>
                                                <th>Harga</th> 
                                                
                                                <th>Supplier</th>
                                                <th>Cabang</th>
                                               <th>Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                               $no = 1;
    										   while($row = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                            <td><?= $no?></td>
                                               <td><?= format_date($row['purchase_date']); ?></td>
                                                <td><?= $row['item_name']?></td>
                                                <td><?= $row['purchase_qty']?></td>
                                                <td><?= $row['purchase_price']?></td>
                                               
                                                <td><?= $row['supplier_name']?></td>
                                                <td><?= $row['branch_name']?></td>
                                              <td style="text-align:center;">

                                                    <a href="purchase.php?page=form&id=<?= $row['purchase_id']?>" class="btn btn-default" >View</a>
                                                    <!--<a href="javascript:void(0)" onclick="confirm_delete(<?= $row['purchase_id']; ?>,'purchase.php?page=delete&id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>-->

                                                </td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <td colspan="9"><a href="<?= $add_button ?>" class="btn btn-danger " >Add</a></td>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->