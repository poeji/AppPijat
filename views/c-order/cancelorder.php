<?php 
error_reporting(0);
if(isset($_GET['page']) && $_GET['page'] == "cancelorder") { //simpan_transaksi

/*//hapus transaction_temp
echo "DELETE FROM `transaction_tmp_details` WHERE `transaction_id` = '".$_GET['id']."'";

//hapus transaction_detail_temp
echo "<br>DELETE FROM `transactions_tmp` WHERE `transaction_id` = '".$_GET['id']."'";

//hapus transaction_kursi
echo "<br>DELETE FROM `transaction_kursi` WHERE `transcaction_id` = '".$_GET['id']."'";

//hapus transaction_pijat
echo "<br>DELETE FROM `transaction_pijat` WHERE `transaction_id` = '".$_GET['id']."'";

exit();*/


//hapus transaction_temp
mysql_query("DELETE FROM `transaction_tmp_details` WHERE `transaction_id` = '".$_GET['id']."'");

//hapus transaction_detail_temp
mysql_query("DELETE FROM `transactions_tmp` WHERE `transaction_id` = '".$_GET['id']."'");

//hapus transaction_kursi
mysql_query("DELETE FROM `transaction_kursi` WHERE `transcaction_id` = '".$_GET['id']."'");

//hapus transaction_pijat
mysql_query("DELETE FROM `transaction_pijat` WHERE `transaction_id` = '".$_GET['id']."'");

echo "<script>location.href='c-order.php';</script>";
} else {
echo "<script>location.href='home.php';</script>";
}
?>