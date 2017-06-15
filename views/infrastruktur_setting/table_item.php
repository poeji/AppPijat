<span class="tooltip-text2 scrollpanel no4">
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="table_item">
 <thead>
 <tr>
    <td align="center">No</td>
    <td>Menu</td>
    <td align="right">Qty</td>
    <td align="right">Harga</td>
    <td align="right">Jumlah</td>
  </tr>
  </thead>
  <?php
  $no_item = 1;
  $total_price = 0;
  $query_item = mysql_query("select b.*, c.menu_name 
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  join menus c on c.menu_id = b.menu_id
							  where table_id = '".$row['table_id']."'");
  while($row_item = mysql_fetch_array($query_item)){
  ?>
  <tr>
    <td align="center" valign="top"><?= $no_item ?></td>
    <td valign="top"><?= $row_item['menu_name'] ?></td>
    <td align="right" valign="top"><?= $row_item['transaction_detail_qty'] ?></td>
    <td align="right" valign="top"><?= $row_item['transaction_detail_price'] ?></td>
    <td align="right" valign="top"><?= $row_item['transaction_detail_total'] ?></td>
  </tr>
 <?php
 $no_item++;
 $total_price = $total_price + $row_item['transaction_detail_total'];
  }
 ?>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="6" class="table_total_item">
  <tr>
    <td>TOTAL</td>
    <td align="right"><?= $total_price ?></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%"><a href="#" style="text-decoration:none;"><div class="btn_edit_item">EDIT MENU</div></a></td>
    <td width="50%"><a href="javascript: save_payment(<?= $row['table_id'] ?>)" style="text-decoration:none;"><div class="btn_payment">PAYMENT</div></a></td>
  </tr>
</table>
</span>
