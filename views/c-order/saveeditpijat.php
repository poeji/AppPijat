<?php 
error_reporting(0);
if(isset($_POST['page']) && $_POST['page'] == "saveeditpijat") { //simpan_transaksi

//get data
$d = mysql_fetch_array(mysql_query("select * from pijat where pijat_id = '".$_POST['pijat_id']."'"));

if($_POST['type']==1) {

//update type = 1
$query = mysql_query("UPDATE `transactions_tmp`
SET 
  `pijat` = '$_POST[pijat_id]',
  `pijat_price` = '$d[pijat_harga]'
WHERE `transaction_id` = '$_POST[id]'");

} else {

//update type = 2
$query = mysql_query("UPDATE `transaction_pijat`
SET 
  `pijat_id` = '$_POST[pijat_id]'
WHERE `transaction_pijat_id` = '$_POST[tid]'");

}



echo "<script>location.href='c-order.php?page=editpijat&id=$_POST[id]&member=$_POST[member]';</script>";
} else {
echo "<script>location.href='home.php';</script>";
}
?>