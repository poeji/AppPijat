

                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                               <th width="5%">No</th>
                                               <th>Trainer Type</th>
                                                <th>Trainer Code</th>
                                                <th>Trainer name</th> 
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query_trainer_view)){
												if($row['user_type_id'] == '2'){
													$status = 'ADM'; 
												}else { 
													$status = 'Premier Builder';
												}
                                            ?>
                                            <tr>
                                            	<td><?= $no?></td>
                                                <td><?= $status?></td>
                                                <td><?= $row['user_code']?></td>
                                                <td><?= $row['user_name']?></td>
                                              
                                               

                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                        
                                    </table>
                                </div>
                                </div>
                                </div>
                                </div>
                        
                