
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                             <div class="title_page"> <?= $title2 ?></div>
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Voucher ID</th>
                                                <th>Kode Voucher</th>                                          
                                               
                                                <th>Voucher Date</th>
                                                <th>Voucher Expired</th>
                                                <!--<th>Voucher Use</th>-->
                                                <th>Status</th>
                                                <th>Voucher Type</th>
                                                <!--<th>Kode Voucher</th>-->
                                                <th>Nominal</th>
                                                   <th>Config</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
										   while($row = mysql_fetch_array($querya)){
                                            ?>
                                            <tr>
                                            <td><?= $no?></td>
                                            <td><?= $id_vo = $row['id_voucher_detail']?></td>
                                              <td><?= $row['no_voucher']?></td>
                                              <td><?= format_date($row['voucher_date_issued'])?></td>
                                               <td><?= format_date($row['voucher_exp_date'])?></td>
                                               <!--<td><? $row['voucher_use']?></td>-->
                                               <td><?php if ($row['status_voucher']=='0') {
                                                    echo "Not Active";
                                               }else{
                                                    echo "Use";
                                               }
                                                    ?></td>
                                               <td><?= $row['voucher_type_name']?></td>
                                               <!--<td><? $row['voucher_code']?></td>-->
                                               <td><?= $row['voucher_value']?></td>
                                               <td style="text-align:center;">
                                                   
                                                    <a href="voucher.php?page=form_voucher&id=<?php echo $id_vo ?>" class="btn btn-default" >View</a>
                                                    <!--<a href="javascript:void(0)" onclick="confirm_delete(<? $row['id_voucher_detail']; ?>,'voucher.php?page=delete_list&id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>-->
<!--                                                    <a href="voucher.php?page=print&id=<? $row['id_voucher_detail']?>" class="btn btn-default"><i class="fa fa-archive"></i></a>-->
                                                </td> 
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
<!--                                          <tfoot>
                                            <tr>
                                                <td colspan="6"><a href="<? $add_button ?>" class="btn btn-danger " >Add</a></td>
                                               
                                            </tr>
                                        </tfoot>-->
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->