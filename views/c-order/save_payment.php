<?php 
//error_reporting(0);
if(isset($_POST['page']) && $_POST['page'] == "save_payment") { //simpan_transaksi

/*echo "<pre>";
print_r($_POST); 
echo "</pre>";*/

/*
[page] => save_payment
    [id] => 1
    [i_member] => 1
    [i_payment_method] => 2
    [i_bank_id] => 2
    [i_bank_account] => 12345678991
    [i_voucher_id] => 0
    [i_payment] => 200000
    [i_total] => 188600
    [i_disc_nominal] => 0
    [i_discount] => 0
    [i_grand_total] => 188600
    [i_change] => 11400
    */

//exit();

$qtrans = mysql_fetch_array(mysql_query("SELECT t.*, p.*, m.*, k.*, p.pijat_id as pijat, t.transaction_detail_pemijat as pemijat
FROM `transactions_tmp` t
LEFT JOIN pijat p ON p.`pijat_id` = t.`pijat`
LEFT JOIN members m ON m.`member_id` = t.`member_id`
LEFT JOIN `transaction_kursi` k ON k.`transcaction_id` = t.`transaction_id`
WHERE  t.transaction_id = '$_POST[id]'"));

$quser = mysql_fetch_array(mysql_query("select * from users where user_id = '".$_SESSION['user_id']."'"));

//tabel `transactions`
$strans = mysql_query("INSERT INTO `transactions`
            (`transaction_id`,
             `branch_id`,
             `member_id`,
             `pijat_id`,
             `pemijat_id`,
             `transaction_date`,
             `transaction_total`,
             `transaction_discount`,
             `disc_member`,
             `transaction_grand_total`,
             `transaction_payment`,
             `transaction_change`,
             `transaction_disc_nominal`,
             `payment_method_id`,
             `bank_id`,
             `user_id`,
             `bank_account_number`,
             `transaction_code`,
             `flag_code`,
             `ket`)
VALUES ('$qtrans[transaction_id]',
        '$qtrans[branch_id]',
        '$qtrans[member_id]',
        '$qtrans[pijat]',
        '$qtrans[pemijat]', 
        '$qtrans[datebook]', 
        '$qtrans[pijat_price]',
        '$_POST[i_discount]',
        '0',
        '$_POST[i_total]',
        '$_POST[i_payment]',
        '$_POST[i_change]',
        '0',
        '$_POST[i_payment_method]',
        '$_POST[i_bank_id]',
        '$quser[user_id]',
        '$_POST[i_bank_account]',
        '$qtrans[transaction_code]',
        '0',
        '$qtrans[ket]')");

//tambah data transaction_pijat
/*$qtpjt = mysql_query("INSERT INTO `transaction_pijat`
            (`date`,
             `transaction_id`,
             `pijat_id`,
             `ruangan_infrastruktur_id`,
             `tanggal`,
             `status_pijat`)
VALUES (NOW(),
        '$qtrans[transaction_id]',
        '$qtrans[pijat]',
        '$qtrans[ruangan_infrastruktur_id]',
        '$qtrans[transaction_date]',
        '1')");*/

//tabel `transaction_details`
$qdet = mysql_query("SELECT * FROM `transaction_tmp_details` WHERE transaction_id = '$_POST[id]'");

while($ddet = mysql_fetch_array($qdet)) {
    $sdet = mysql_query("INSERT INTO `transaction_details`
                (`transaction_id`,
                 `menu_id`,
                 `transaction_detail_original_price`,
                 `transaction_detail_margin_price`,
                 `transaction_detail_price`,
                 `transaction_detail_price_discount`,
                 `transaction_detail_grand_price`,
                 `transaction_detail_qty`,
                 `transaction_detail_total`)
    VALUES ('$ddet[transaction_id]',
            '$ddet[transaction_detail_item_qty]',
            '$ddet[transaction_detail_original_price]',
            '$ddet[transaction_detail_margin_price]',
            '$ddet[transaction_detail_price]',
            '$ddet[transaction_detail_price_discount]',
            '$ddet[transaction_detail_grand_price]',
            '$ddet[transaction_detail_qty]',
            '$ddet[transaction_detail_total]')");
}

//tabel `journals`
$sjrn = mysql_query("INSERT INTO `journals`
            (`journal_type_id`,
             `data_id`,
             `data_url`,
             `journal_debit`,
             `journal_credit`,
             `journal_piutang`,
             `journal_hutang`,
             `journal_date`,
             `journal_desc`,
             `bank_id`,
             `user_id`,
             `branch_id`)
VALUES ('1',
        '$qtrans[transaction_code]',
        'order.php?page=form&id=',
        '$_POST[i_grand_total]',
        '0',
        '0',
        '0',
        '$qtrans[datebook]',
        '0',
        '$_POST[i_bank_id]',
        '$quser[user_id]',
        '$qtrans[branch_id]')");


//pengurangan stok paket pijat
        $item = "";
$qpjt = mysql_query("SELECT p.`pijat_id` FROM `transaction_pijat` p
WHERE p.`transaction_id` = $qtrans[transaction_id]");
while ($dpjt = mysql_fetch_array($qpjt)) {
	
	$pjtdtl = mysql_query("SELECT d.`item`, SUM(item_qty) AS total 
FROM `pijat_details` d
WHERE d.`pijat` = '$dpjt[pijat_id]'
GROUP BY d.`item`");
   /* echo "SELECT d.`item`, SUM(item_qty) AS total 
FROM `pijat_details` d
WHERE d.`pijat` = '$dpjt[pijat_id]'
GROUP BY d.`item`<hr>";*/
	while($dpjtdtl = mysql_fetch_array($pjtdtl)) {


      // echo "<br>ItemID:".$dpjtdtl['item']." => Total Mili Liter=".$dpjtdtl['total'];




		//update stok
		$cekqty = mysql_fetch_array(mysql_query("select qty from stok_item where item_id = $dpjtdtl[item] AND branch_id = '$qtrans[branch_id]'"));
       // echo "<hr>select qty from stok_item where item_id = $dpjtdtl[item] AND branch_id = '$qtrans[branch_id]'<hr>";

        //echo "Stok=".$cekqty['qty']."<hr>";

		$qtybr = $cekqty['qty'] - $dpjtdtl['total'];
		$qupdate = mysql_query("UPDATE `stok_item` SET `qty` = '$qtybr' WHERE `item_id` = '$dpjtdtl[item]' AND branch_id = '$qtrans[branch_id]'");

        //echo "qtybr=QtySkrng:".$cekqty['qty']."-totalorder:".$dpjtdtl['total']."($dpjtdtl[item])<hr>";
        //echo "1.UPDATE `stok_item` SET `qty` = '$qtybr' WHERE `item_id` = '$dpjtdtl[item]' AND branch_id = '$qtrans[branch_id]'<hr>";

        //$item."_".$dpjtdtl['item'] += $dpjtdtl['total'];
        //$item_1 += $dpjtdtl['total'];
        //$item_2 += $dpjtdtl['total'];
        
	}

}

//echo "=========================================================================================================================<br>";
//pengurangan stok item yang di beli
$qidet = mysql_query("SELECT d.`transaction_detail_item_qty`, d.`transaction_detail_original_price` 
FROM `transaction_tmp_details` d
WHERE d.`transaction_id` = $qtrans[transaction_id]");
while ($didet = mysql_fetch_array($qidet)) {
    //update stok
        $cekqty2 = mysql_fetch_array(mysql_query("select qty from stok_item where item_id = $didet[transaction_detail_item_qty] AND branch_id = '$qtrans[branch_id]'"));

       // echo "Stok=".$cekqty2['qty']."<hr>";

        $qtybr2 = $cekqty2['qty'] - $didet['transaction_detail_original_price'];
        $qupdate2 = mysql_query("UPDATE `stok_item` SET `qty` = '$qtybr2' WHERE `item_id` = '$didet[transaction_detail_item_qty]' AND branch_id = '$qtrans[branch_id]'");
        //echo "2.UPDATE `stok_item` SET `qty` = '$qtybr2' WHERE `item_id` = '$didet[transaction_detail_item_qty]' AND branch_id = '$qtrans[branch_id]'<hr>";
}

//hapus tabel temp
mysql_query("DELETE FROM `transactions_tmp` WHERE `transaction_id` = '$qtrans[transaction_id]'");

mysql_query("DELETE FROM `transaction_tmp_details` WHERE `transaction_id` = '$qtrans[transaction_id]'");

//update status kursi
mysql_query("UPDATE `transaction_kursi` SET `status_kursi` = '1' WHERE `transcaction_id` = '$qtrans[transaction_id]'");

//update status pijat
mysql_query("UPDATE `transaction_pijat` SET `status_pijat` = '1' WHERE `transaction_id` = '$qtrans[transaction_id]'");

echo "<script>location.href='c-order.php?page=list';</script>";
//echo "<script>location.href='c-order.php?page=print_bill&id=$qtrans[transaction_id]&st=order';</script>";
} else {
	echo "<script>location.href='home.php';</script>";
}
?>