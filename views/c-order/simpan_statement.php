<?php
error_reporting(0);
if(isset($_GET['page']) && $_GET['page'] == "simpan_statement") { //simpan_transaksi

//update data statement member
mysql_query("UPDATE `statement`
SET
  `date` = NOW(),
  `tekanan` = '$_POST[i_tekanan]',
  `asma` = '$_POST[i_asma]',
  `inhaler` = '$_POST[i_inhaler]',
  `leher` = '$_POST[i_leher]',
  `kulit` = '$_POST[i_kulit]',
  `kulit_jabarkan` = '$_POST[i_kulit_jabarkan]',
  `selain_diatas` = '$_POST[i_selain]',
  `selain_jabarkan` = '$_POST[i_selain_jabarkan]',
  `alergi` = '$_POST[i_alergi]',
  `alergi_jabarkan` = '$_POST[i_alergi_jabarkan]',
  `hamil` = '$_POST[i_hamil]',
  `usia_kandungan` = '$_POST[i_usia_kandungan]',
  `kontak_lens` = '$_POST[i_lens]',
  `melepas_lens` = '$_POST[i_melepasnya]',
  `level` = '$_POST[i_level]',
  `spesial` = '$_POST[i_spesial]',
  `jawaban` = '$_POST[i_jawaban]',
  `tidak_menyembunyikan` = '$_POST[i_menyembunyikan]',
  `tanggung_jawab` = '$_POST[i_bertanggung_jawab]'
WHERE `member_id` = '$_POST[i_member_id]'");

echo "<script>location.href='c-order.php?page=cetak_statement&id=$_POST[id]&member=$_POST[i_member_id]';</script>";
} else {
echo "<script>location.href='home.php';</script>";
}
?>