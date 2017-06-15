<script>
function update_status_order(id, building_id){
	window.location.href = "order.php?page=order_status&id="+id+"&building_id="+building_id;
}
</script>
<!-- Main content -->
 <section class="content" style="height:650px !important; max-height:650px;">
               <br>
               <?php
               $q_right = mysql_query("select a.*, b.transaction_id
			   						from tables a
									join transactions_tmp b on b.table_id = a.table_id
			   						where a.table_status_id = '2'
									order by transaction_date
									");
				while($r_right = mysql_fetch_array($q_right)){

					$count_order_status = get_count_order_status($r_right['transaction_id']);
					if($count_order_status > 0){
			   ?>
                    <div class="row" >
                        <div class="col-md-12" style="padding-left:0; padding-right:10px;" >
                            <div class="box" >
                             <div class="box-header">
                                    <h3 class="box-title">Meja <?= $r_right['table_name']?></h3>
                                </div>
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="update_status_order">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Menu</th>
                                                <th>Qty</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
										$no_right_detail = 1;
                                         $q_right_detail = mysql_query("select a.transaction_detail_id, a.transaction_detail_qty, b.menu_name
										 								from transaction_tmp_details a
																		join menus b on b.menu_id = a.menu_id
										 								where transaction_id = '".$r_right['transaction_id']."'
																		and transaction_detail_status = '0'
										");
										while($r_right_detail = mysql_fetch_array($q_right_detail)){
										?>

                                        <tr onClick="update_status_order(<?= $r_right_detail['transaction_detail_id'] ?>, <?= $building_id ?>)" style="cursor:pointer;">
                                        	<td><?= $no_right_detail ?></td>
                                            <td><?= $r_right_detail['menu_name'] ?></td>
                                            <td><?= $r_right_detail['transaction_detail_qty'] ?></td>
                                        </tr>

                                        </tbody>
                                        <?php
										$no_right_detail++;
										}
										?>

                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                 </div>
<?php
					}
				}
?>
</section>
