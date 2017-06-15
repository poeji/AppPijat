              
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                              <div class="box-body2 table-responsive">
                              <div class="box-header">
<h3 class="box-title"><strong>Journal</strong></h3>
</div>
                                    <table id="" class="table table-bordered table-striped">
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no_item = 1;
										    $total_debit = 0;
										    $total_credit = 0;
											$total_piutang = 0;
											$total_hutang = 0;
                                            while($row_item = mysql_fetch_array($query_item)){
												
                                       ?>
                                            <tr>
                                            <td><?= $no_item ?></td>
												<td><?= format_date($row_item['journal_date']); ?></td>
                                                <td><?= $row_item['journal_type_name'] ?></td>
                                              	<td><?= $row_item['journal_desc']; ?></td>
                                                <td><?= $row_item['branch_name']; ?></td>
                                                <td><?= tool_format_number($row_item['journal_debit'])?></td>
                                                <td><?= tool_format_number($row_item['journal_credit'])?></td>
                                             	<td><?= tool_format_number($row_item['journal_piutang'])?></td>
                                                <td><?= tool_format_number($row_item['journal_hutang'])?></td>
                                                 </tr>
                                        

                                              <?php
											  $total_debit = $total_debit + $row_item['journal_debit'];
											  $total_credit = $total_credit + $row_item['journal_credit'];
											  $total_piutang = $total_piutang + $row_item['journal_piutang'];
											  $total_hutang = $total_hutang + $row_item['journal_hutang'];
											  $no_item++;
                                            }
                                            ?>
                                            </tbody>
                                            <tfoot>
											<tr>
                                            
                                                 <td colspan="5" align="right"  style="font-size:22px; font-weight:bold;">TOTAL</td>
                                                 <td><?= tool_format_number_report($total_debit)?></td>
                                                 <td><?= tool_format_number_report($total_credit)?></td>
                                                <td><?= tool_format_number_report($total_piutang)?></td>
                                              <td><?= tool_format_number_report($total_hutang)?></td>
                                              
                                              </tr>
                                          </tfoot>
                                        
                                         
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                  

                