
             
                    <div class="row">
                        <div class="col-xs-12">
                            
                           
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                 <div class="box-header" style="cursor: move;">
<h3 class="box-title"><strong>List Transaksi</strong></h3>
</div>
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            	<th width="5%">No</th>
                                                <th>Tanggal</th>
                                                   <th>Meja</th>
                                                   <th>Total</th>
                                                   <th>Bayar</th>
                                                   <th>Kembali</th>
                                                   <th>Config</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no_tr = 1;
										   while($row_tr = mysql_fetch_array($query_tr)){
                                            ?>
                                            <tr>
                                            <td><?= $no_tr?></td>
                                               <td><?= $row_tr['transaction_date']?></td>
                                               <td><?php
											   $building = ($row_tr['table_id']!=0) ? " (".$row_tr['building_name'].")" : ""; 
											   echo $row_tr['table_name'].$building; ?></td>
                                               <td><?= tool_format_number($row_tr['transaction_total'])?></td>
                                               <td><?= tool_format_number($row_tr['transaction_payment'])?></td>
                                               <td><?= tool_format_number($row_tr['transaction_change'])?></td>
                                               <td style="text-align:center;">

                                                  <a href="print.php?transaction_id=<?= $row_tr['transaction_id']?>" class="btn btn-default" ><i class="fa fa-print"></i></a>
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $row_tr['transaction_id']; ?>,'report_detail.php?page=delete_transaction&date=<?= $_GET['date']?>&id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>

                                                </td> 
                                            </tr>
                                            <?php
											$no_tr++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                        
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>