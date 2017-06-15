<?php 
include '../../lib/config.php';
$proses = $_GET['proses'];

if($proses=="paketitem") {
	
	$pijat_id = $_GET['pijat_id'];
	$data = mysql_query("SELECT i.`item_name`, d.`item_qty`, i.`item_id`
FROM `pijat_details` d
LEFT JOIN item i ON i.`item_id` = d.`item`
WHERE d.`pijat` = $pijat_id
ORDER BY i.`item_name` ASC");

while($b = mysql_fetch_array($data)){
$qcek = mysql_fetch_array(mysql_query("SELECT * FROM stok_item s LEFT JOIN item i ON i.`item_id` = s.`item_id` WHERE s.item_id = $b[item_id]"));
	if($qcek['qty'] < $b['item_qty']) {
		//echo "Stok untuk Item ".$b['item_name']." tidak mencukupi, sisa stok ".$b['sisa'];
		//echo "SELECT * FROM stok_item s LEFT JOIN item i ON i.`item_id` = s.`item` WHERE s.item_id = $b[item_id]";
		echo "<script>alert('Stok untuk Item $qcek[item_name] tidak mencukupi, sisa stok Qty $qcek[qty], Qty yang dibutuhkan adalah $b[item_qty]')</script>";
		echo "<a href='stokitem.php' class='btn btn-success' target='_blank'>Cek Stok</a>";
		exit();
	}

}
?>
	
	<div class="row" style="height: 150px">
											<table class="table" style="font-size: 12px;">
		                      <thead>
		                        <tr>
								 	<th width="5%">No.</th>
		                          	<th width="50%">QTY</th>
		                          	<th width="50%">NAMA ITEM</th>
		                        </tr>
		                      </thead>
		                      <tbody class="">
		                      <?php 
		                      $no = 1;
		                      $data2 = mysql_query("SELECT i.`item_name`, d.`item_qty`, i.`item_id`
								FROM `pijat_details` d
								LEFT JOIN item i ON i.`item_id` = d.`item`
								WHERE d.`pijat` = $pijat_id
								ORDER BY i.`item_name` ASC");
		                      while($d = mysql_fetch_array($data2)){
		                      ?>
		                      <tr>
		                      		<td><?=$no?></td>
		                      		<td><?=$d['item_qty']?></td>
		                      		<td><?=$d['item_name']?></td>
		                      </tr>
		                      <?php $no++; } ?>
		                      </tbody>
		                    </table>
		                    </div>


<?php

} ?>