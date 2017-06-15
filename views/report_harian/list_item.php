              
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                              <div class="box-body2 table-responsive">
                              <div class="box-header" style="cursor: move;">
<h3 class="box-title"><strong>Detail Per Menu</strong></h3>
</div>
                                    <table id="" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Tanggal</th>
                                                <th>Penjualan</th>
                                                <th>Pajak</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                                 <?php
												$no_item = 1;
												$total_harga = 0;
                        $total_harga_pajak = 0;
												$date_awal = $date1;

												while(strtotime($date_awal) <= strtotime($date2)){
												?>
                                            <tr>
                                            <td><?= $no_item ?></td>
                      												<td><?= format_date($date_awal) ?></td>
                                                                      <td>
                                                                      <?php
                      												$total = get_total_penjualan_harian($date_awal);
                      												$total = ($total) ? $total : 0;
                      												echo tool_format_number($total);
                      												?>
                                                </td>
                                                 <td>
                                                                      <?php
                                              $total_pajak = get_total_pajak_harian($date_awal);
                                              $total_pajak = ($total_pajak) ? $total_pajak : 0;
                                              echo tool_format_number($total_pajak);
                                              ?>
                                                </td>
                                                
                                                 </tr>
                                        
                                              <?php
											  $date_awal = date("Y-m-d", strtotime("+1 day", strtotime($date_awal)));

											  $total_harga = $total_harga + $total;
                        $total_harga_pajak = $total_harga_pajak + $total_pajak;
											$no_item++;
                                            }
                                            ?>
                                            </tbody>
                                            <tfoot>
											<tr>
                                            
                                                 <td colspan="2" align="right"  style="font-size:22px; font-weight:bold;">TOTAL</td>
                                                <td><?= tool_format_number_report($total_harga)?></td>
                                             <td><?= tool_format_number_report($total_harga_pajak)?></td>
                                              </tr>
                                          </tfoot>
                                        
                                         
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                  

                