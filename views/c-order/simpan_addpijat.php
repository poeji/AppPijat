<?php 
error_reporting(0);
if(isset($_GET['page']) && $_GET['page'] == "simpan_addpijat") { //simpan_transaksi

//print_r($_POST); 

$data = mysql_query("SELECT i.`item_name`, d.`item_qty`, i.`item_id`
FROM `pijat_details` d
LEFT JOIN item i ON i.`item_id` = d.`item`
WHERE d.`pijat` = $_POST[i_pijat]
ORDER BY i.`item_name` ASC");


while($b = mysql_fetch_array($data)){
$qcek = mysql_fetch_array(mysql_query("SELECT * FROM stok_item s LEFT JOIN item i ON i.`item_id` = s.`item_id` WHERE s.item_id = $b[item_id]"));
    if($qcek['qty'] < $b['item_qty']) {
        echo "<script>alert('Stok untuk Item $qcek[item_name] tidak mencukupi, sisa stok Qty $qcek[qty], Qty yang dibutuhkan adalah $b[item_qty]'); location.href='c-order.php?page=addpijat&member=$_POST[member]&id=$_POST[id]';</script>";
        //echo "<a href='stokitem.php' class='btn btn-success' target='_blank'>Cek Stok</a>";
        exit();
    }
}


$tgltransexp = explode("/", $_POST['i_date']);
$tgltrans = $tgltransexp[2]."-".$tgltransexp[1]."-".$tgltransexp[0]." ".date("H:i", strtotime("$_POST[jam]"));

mysql_query("INSERT INTO `transaction_pijat`
            (`date`,
             `transaction_id`,
             `pijat_id`,
             `ruangan_infrastruktur_id`,
             `tanggal`,
             `status_pijat`)
VALUES (NOW(),
        '$_POST[id]',
        '$_POST[i_pijat]',
        '$_POST[i_kursi]',
        '$tgltrans',
        '0')");



echo "<script>location.href='c-order.php?page=payment&id=$_POST[id]&member=$_POST[member]';</script>";
} else {
echo "<script>location.href='home.php';</script>";
}
?>