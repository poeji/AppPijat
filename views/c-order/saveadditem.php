<?php 
error_reporting(0);
if(isset($_GET['page']) && $_GET['page'] == "saveadditem") { //simpan_transaksi

//print_r($_POST);

$dpjt = mysql_fetch_array(mysql_query("SELECT * FROM `transactions_tmp` t
LEFT JOIN pijat p ON p.`pijat_id` = t.`pijat`
WHERE t.`transaction_id` = $_POST[id]"));


$qitem = mysql_fetch_array(mysql_query("SELECT * FROM item i WHERE i.`item_id` = $_POST[item_id]"));

$margin = $qitem['item_harga_jual'] * $_POST['qty'];

$cekitem = mysql_fetch_array(mysql_query("SELECT d.`transaction_detail_id` FROM `transaction_tmp_details` d 
	WHERE d.`transaction_detail_item_qty` = $_POST[item_id] AND d.transaction_id = $_POST[id]"));

if(isset($cekitem['transaction_detail_id'])) {
	//echo "1";
	
	$ditem = mysql_fetch_array(mysql_query("SELECT * FROM `transaction_tmp_details` d 
	WHERE d.`transaction_detail_item_qty` = $_POST[item_id] AND d.transaction_id = $_POST[id]"));

	$transaction_detail_original_price = $ditem['transaction_detail_original_price'] + $_POST['qty'];

	$transaction_detail_margin_price = $transaction_detail_original_price * $qitem['item_harga_jual'];

	mysql_query("UPDATE `transaction_tmp_details`
SET 
  
  `transaction_detail_original_price` = '$transaction_detail_original_price',
  `transaction_detail_margin_price` = '$transaction_detail_margin_price'
WHERE `transaction_id` = '$_POST[id]' AND `transaction_detail_item_qty` = $_POST[item_id]");

} else {
	//echo "2";

	mysql_query("INSERT INTO `transaction_tmp_details`
            (`transaction_id`,
             `pijat_id`,
             `transaction_detail_item_qty`,
             `transaction_detail_original_price`,
             `transaction_detail_margin_price`,
             `transaction_detail_price`,
             `transaction_detail_price_discount`,
             `transaction_detail_grand_price`,
             `transaction_detail_qty`,
             `transaction_detail_total`,
             `transaction_detail_status`)
VALUES ('$_POST[id]',
        '$dpjt[pijat_id]',
        '$_POST[item_id]',
        '$_POST[qty]',
        '$margin',
        '0',
        '0',
        '0',
        '$_POST[qty]',
        '0',
        '0')");

}

echo "<script>location.href='c-order.php?page=additem&id=$_GET[id]&member=$_GET[member]';</script>";
} else {
echo "<script>location.href='home.php';</script>";
}
?>