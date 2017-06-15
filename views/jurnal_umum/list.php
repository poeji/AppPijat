
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
                                                <th>Tanggal</th>
                                                <th>Tipe Jurnal</th>
                                                <th>Keterangan</th>
                                                <th>Cabang</th>
                                                <th>Debit</th>
                                                <th>Kredit</th>
                                                <th>Piutang</th>
                                                <th>Hutang</th>
                                                <th>Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
										   while($row = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                           <td><?= $no ?></td>
												<td><?= format_date($row['journal_date']); ?></td>
                                                <td><?= $row['journal_type_name'] ?></td>
                                              	<td><?= $row['journal_desc']; ?></td>
                                                <td><?= $row['branch_name']; ?></td>
                                                <td><?= tool_format_number($row['journal_debit'])?></td>
                                                <td><?= tool_format_number($row['journal_credit'])?></td>
                                             	<td><?= tool_format_number($row['journal_piutang'])?></td>
                                                <td><?= tool_format_number($row['journal_hutang'])?></td>
                                              	
                                              <td style="text-align:center;">

                                                    <a href="jurnal_umum.php?page=form&id=<?= $row['journal_id']?>" class="btn btn-default" ><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['journal_id']; ?>,'jurnal_umum.php?page=delete&id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>

                                                </td> 
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <td colspan="10"><a href="<?= $add_button ?>" class="btn btn-danger " >Add</a></td>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->