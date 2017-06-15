<?php 
error_reporting(0);
if(isset($_GET['page']) && $_GET['page'] == "simpan_transaksi") { //simpan_transaksi

    //print_r($_GET); echo count($_GET['itemid']); exit();

    //save tabel transaction_temp
    $tgltransexp = explode("/", $_GET['i_date']);
    $tgltrans = $tgltransexp[2]."-".$tgltransexp[1]."-".$tgltransexp[0]." ".date("H:i", strtotime("$_GET[jam]"));
    $code = "2".time();

    if($_GET[i_member] != "") {
        $intrans = mysql_query("INSERT INTO `transactions_tmp`
                (`member_id`,
                 `branch_id`,
                 `pijat`,
                 `pijat_price`,
                 `transaction_detail_pemijat`,
                 `transaction_date`,
                 `transaction_code`,
                 `ket`)
    VALUES ('$_GET[i_member]',
            '$_GET[branch]',
            '$_GET[i_pijat]',
            '$_GET[pijat_price]',
            '$_GET[i_pemijat]',
            '$tgltrans',
            '$code',
            '$_GET[a]')");
    }
    


    //save tabel transaction_detail_temp
    //$iditem = mysql_fetch_array(mysql_query("select transaction_id, transaction_date from transactions_tmp where member_id = '$_GET[i_member]' AND branch_id = '$_GET[branch]' AND pijat = '$_GET[i_pijat]'  AND transaction_date = '$tgltrans' AND ket = '$_GET[keterangan]'"));
    
    $transaction_id = mysql_insert_id();

    $totalitem = count($_GET['itemid']);

    for($i=0; $i < $totalitem; $i++) {

        $ditem = mysql_fetch_array(mysql_query("SELECT * FROM `item` WHERE item_id = '".$_GET['itemid'[$i]]."'"));
        $detailtotal = $ditem['item_harga_jual'] * $_GET['itemqty'][$i];
        
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
    VALUES ('$transaction_id',
            '$_GET[i_pijat]',
            '".$_GET['itemid'][$i]."',
            '".$_GET['itemqty'][$i]."',
            '$ditem[item_margin]',
            '$ditem[item_harga_jual]',
            '0',
            '0',
            '".$_GET['itemqty'][$i]."',
            '$detailtotal',
            '0')");
    }


    //save tabel transaction_kursi
    if($_GET[i_member] != "") {
         $inskursi = mysql_query("INSERT INTO `transaction_kursi`
                (`ruangan_id`,
                 `ruangan_infrastruktur_id`,
                 `branch_id`,
                 `member_id`,
                 `datebook`,
                 `dateinsert`,
                 `transcaction_id`,
                 `keterangan`,
                 `status_kursi`)
    VALUES ('$_GET[ruangan]',
            '$_GET[kursi]',
            '$_GET[branch]',
            '$_GET[i_member]',
            '$tgltrans',
            NOW(),
            '$transaction_id',
            '$_GET[a]',
            '0')");

//tambah data transaction_pijat
$qtpjt = mysql_query("INSERT INTO `transaction_pijat`
            (`date`,
             `transaction_id`,
             `pijat_id`,
             `ruangan_infrastruktur_id`,
             `tanggal`,
             `status_pijat`)
VALUES (NOW(),
        '$transaction_id',
        '$_GET[i_pijat]',
        '$_GET[kursi]',
        '$tgltrans',
        '0')");

    }
   
//hapus data kosong di transaction_temp
//mysql_query("DELETE FROM `transactions_tmp` WHERE `member_id` = 0 AND branch_id = 0 AND pijat = 0 AND pijat_price = 0");

//hapus data kosong di transaction_kursi
//mysql_query("DELETE FROM `transaction_kursi` WHERE `ruangan_id` = 0 AND ruangan_infrastruktur_id = 0 AND branch_id = 0 AND member_id = 0");

echo "<script>location.href='c-order.php?page=form_statement&id=$transaction_id&member=$_GET[i_member]';</script>";
} else {
echo "<script>location.href='home.php';</script>";
}
?>