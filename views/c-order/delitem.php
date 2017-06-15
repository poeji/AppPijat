<?php 
error_reporting(0);
if(isset($_GET['page']) && $_GET['page'] == "delitem") { //simpan_transaksi

$qitem = mysql_fetch_array(mysql_query("SELECT * FROM item i WHERE i.`item_id` = $_GET[item_id]"));

$ditem = mysql_fetch_array(mysql_query("SELECT * FROM `transaction_tmp_details` d 
    WHERE d.`transaction_detail_item_qty` = $_GET[item_id] AND d.transaction_id = $_GET[id]"));

    $transaction_detail_original_price = $ditem['transaction_detail_original_price'] - 1;

    $transaction_detail_margin_price = $transaction_detail_original_price * $qitem['item_harga_jual'];
  

    mysql_query("UPDATE `transaction_tmp_details`
SET 
  
  `transaction_detail_original_price` = '$transaction_detail_original_price',
  `transaction_detail_margin_price` = '$transaction_detail_margin_price'
WHERE `transaction_id` = '$_GET[id]' AND `transaction_detail_item_qty` = $_GET[item_id]");

echo "<script>location.href='c-order.php?page=additem&id=$_GET[id]&member=$_GET[member]';</script>";
} else {
echo "<script>location.href='home.php';</script>";
}
?>