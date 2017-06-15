 

                <?php
                if(isset($_GET['did_item']) && $_GET['did_item'] == 1){
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
                }else if(isset($_GET['did_item']) && $_GET['did_item'] == 2){
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
                }else if(isset($_GET['did_item']) && $_GET['did_item'] == 3){
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

              
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Date</th>
                                                 <th>Name</th>
												  <th>Type</th>
												  <th>Trainer</th>
												  <th>Participants</th>
                                                <th width="20%">Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no_item = 1;
                                            while($row_item = mysql_fetch_array($query_item)){
											$j_par = mysql_query("select count(*) as jumlah_participant from transaction_agents where transaction_id = '".$row_item['transaction_id']."'");
											$r_par = mysql_fetch_object($j_par);
                                            ?>
                                            <tr>
                                            <td><?= $no_item ?></td>
												<td><?= format_date($row_item['transaction_date']); ?></td>
                                                <td><?= $row_item['transaction_name']?></td>
												<td><?= $row_item['transaction_type_name']?></td>
                                                <td><?= $row_item['user_name']?></td>
												<td><?= $r_par->jumlah_participant ?></td>
                                               
                                               
                                                <td style="text-align:center;">
                                                    <a href="absensi.php?page=form_view&id=<?= $row_item['transaction_id']?>&type=2" class="btn btn-danger" >Detail</a>
                                                 </tr>
                                            <?php
											$no_item++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                         
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                  

                