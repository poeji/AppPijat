<?php 
error_reporting(0);
if(isset($_GET['page']) && $_GET['page'] == "simpankursi") { //simpan_transaksi

mysql_query("UPDATE `transaction_kursi` SET `ruangan_infrastruktur_id` = '$_GET[k]' WHERE `transcaction_id` = '$_GET[id]'");

echo "<script>location.href='c-order.php?page=payment&id=$_GET[id]&member=$_GET[member]';</script>";
} else {
echo "<script>location.href='home.php';</script>";
}
?>