<?php
//session_start();

/*$outprint = "Just the test printer";
$printer = printer_open("58 Printer(1)");
printer_set_option($printer, PRINTER_MODE, "RAW");
printer_start_doc($printer, "Tes Printer");
printer_start_page($printer);
printer_write($printer, $outprint);
printer_end_page($printer);
printer_end_doc($printer);
printer_close($printer);
*/

$qpjt = mysql_query("SELECT * FROM `statement` s 
LEFT JOIN members m ON m.member_id = s.`member_id` WHERE s.member_id = $_GET[member] ORDER BY s.statement_id DESC LIMIT 1");
$row = mysql_fetch_array($qpjt);

$do = mysql_fetch_array(mysql_query("select * from office"));
?>
<style type="text/css">
body{
	font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
}
.frame{
	border:1px solid #000;
	width:10%;
	margin-left:auto;
	margin-right:auto;
	padding:10px;
}
table{
	font-size:14px;

}
label {
	font-size: 16px;
	color: black;
}
.hitam {
	font-weight: bold;
}
.header{
	text-align:center;
	font-weight:bold;
	font-size:11px;

}
.header_img{

	width:164px;
	height:79px;
	margin-left:auto;
	margin-right:auto;
	margin-bottom:10px;
}

.back_to_order{
	width:10%;
	margin-left:auto;
	margin-right:auto;
	color:#fff;
	font-weight:bold;
	background:#09F;
	text-align:center;
	border-radius:10px;
	margin-top:10px;
	padding:5px;height:30px;
}
.back_to_order:hover{
	background:#069;
}
</style>

<body onload="window.print()">
<!--<body>-->

<div class="header">
<span style="font-size:14px;"><?= $do['office_name']?></span><br>
<?= $do['office_address']?> <?= $do['office_phone']?>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top: 5;font-size:12px;">
	<tr>
		<td></td>
		<?php 
		$usr = mysql_fetch_array(mysql_query("select * from users where user_id = '$_SESSION[user_id]' "))
		?>
		<td align="right" >cashier: <?= $usr['user_name'] ?></td>
	</tr>
	<tr>
		<td></td>
		<td align="right" ></td>
	</tr>
</table>
<table>
	<tr>
		<?php
		if($row['member_id']!=0){
			$query = mysql_query("select * from members where member_id = ".$row['member_id']);
			$rmember= mysql_fetch_array($query);
		?>
		<td>Nama: <?= $rmember['member_name']?></td>
	</tr>
	<tr>
		<td>Alamat: <?= $rmember['member_alamat']?></td>
	</tr>
	<tr>
		<td>Tlp: <?= $rmember['member_phone']?></td>
	</tr>
	<?php } ?>
</table>
<hr>
<div class="form-group">
                                                        <?php if ($row['tekanan']==1){ ?>
                                                        <div id="tekanan">
                                                             <label>Apakah anda mempunyai atau pernah mempunyai masalah tekanan darah tinggi ?</label>
                                                            <label class="hitam">Ya</label>
                                                        </div><?php } ?>

                                                        <?php if ($row['asma']==1){ ?>
                                                        <div id="tekanan">
                                                             <label>Apakah anda menderita asma?</label>
                                                            <label class="hitam">Ya</label>
                                                        </div><?php } ?>

                                                        <?php if ($row['inhaler']==1){ ?>
                                                        <div id="tekanan">
                                                             <label>Jika ya, apakah anda perlu menggunakan inhaler saat perawatan berlangsung?</label>
                                                            <label class="hitam">Ya</label>
                                                        </div><?php } ?>

                                                        <?php if ($row['leher']==1){ ?>
                                                        <div id="tekanan">
                                                             <label>Apakah anda sedang mengalami masalah leher dan punggung?</label>
                                                            <label class="hitam">Ya</label>
                                                        </div><?php } ?>

                                                        <?php if ($row['kulit']==1){ ?>
                                                        <div id="tekanan">
                                                             <label>Apakah anda sedang memiliki masalah kulit, luka, cedera, atau infeksi?</label>
                                                            <label class="hitam">Ya</label>
                                                        </div><?php } ?>

                                                        <?php if ($row['selain_diatas']==1){ ?>
                                                        <div id="tekanan">
                                                             <label>Apakah anda memiliki masalah kesehatan selain yang telah disebutkan di atas dan perlu terapis anda ketahui?</label>
                                                            <label class="hitam">Ya</label>
                                                        </div><?php } ?>

                                                        <?php if ($row['alergi']==1){ ?>
                                                        <div id="tekanan">
                                                             <label>Apakah anda memiliki alergi atau bahan-bahan tertentu yang dapat bereaksi terhadap kulit anda?</label>
                                                            <label class="hitam">Ya</label>
                                                        </div><?php } ?>

                                                        <?php if ($row['hamil']==1){ ?>
                                                        <div id="tekanan">
                                                             <label>Apakah anda sedang hamil atau sedang merencanakan kehamilan?</label>
                                                            <label class="hitam">Ya</label>
                                                        </div><?php } ?>

                                                        <?php if ($row['kontak_lens']==1){ ?>
                                                        <div id="tekanan">
                                                             <label>Apakah anda menggunakan kontak lens?</label>
                                                            <label class="hitam">Ya</label>
                                                        </div><?php } ?>

                                                        <?php if ($row['melepas_lens']==1){ ?>
                                                        <div id="tekanan">
                                                             <label>Jika ya, apakah anda perlu melepasnya sebelum perawatan wajah atau perawatan lainnya?</label>
                                                            <label class="hitam">Ya</label>
                                                        </div><?php } ?>

                                                        <?php if ($row['tekanan']==1){ ?>
                                                        <div id="tekanan">
                                                             <label>Bagaimana level tekanan pijatan yang anda inginkan saat perawatan?</label>
                                                            <?php if ($row['level']==1){ ?> <label class="hitam">Lembut</label> <?php } ?>
                                                            <?php if ($row['level']==2){ ?> <label class="hitam">Sedang</label> <?php } ?>
                                                            <?php if ($row['level']==3){ ?> <label class="hitam">Kuat</label> <?php } ?>
                                                        </div><?php } ?>


                                                        <?php if ($row['spesial']==1){ ?>
                                                        <div id="tekanan">
                                                             <label>Apakah anda ingin mendapatkan penawaran spesial kami melalui email atau pesan SMS/WA?</label>
                                                            <label class="hitam">Ya</label>
                                                        </div><?php } ?>

                                                        <?php if ($row['jawaban']==1){ ?>
                                                        <div id="tekanan">
                                                             <label>Saya menyatakan bahwa jawaban yang berikan adalah benar</label>
                                                            <label class="hitam">Ya</label>
                                                        </div><?php } ?>

                                                        <?php if ($row['tidak_menyembunyikan']==1){ ?>
                                                        <div id="tekanan">
                                                             <label>Saya tidak menyembunyikan informasi apapun yang mungkin relevan untuk menentukan bagaimana
                                                            <br>perawatan saya dilakukan</label>
                                                            <label class="hitam">Ya</label>
                                                        </div><?php } ?>

                                                        <?php if ($row['tanggung_jawab']==1){ ?>
                                                        <div id="tekanan">
                                                             <label>Saya mengetahui bahwa Zee Holistic Living tidak bertanggung jawab atas cedera atau kerusakan
                                                            <br>setelah perawatan dilakukan?</label>
                                                            <label class="hitam">Ya</label>
                                                        </div><?php } ?>


                                                        
                                                    </div> 


<?php /*
<?php $bank = array('Mandiri', 'BCA', 'BRI');?>
<?php if($row['payment_method_id'] != 1 ){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:5px; font-size:12px;">
  <tr>
    <td>Bank: <?= $bank[$row['bank_id']]?></td>
    <td align="right" >Account Number: <?= $row['bank_account_number'] ?></td>
  </tr>
</table>
<?php }?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding: 0;">
<?php
  $no_item = 1;
  $total_price = 0;

  while($row_item = mysql_fetch_array($query_item)){
  ?>
  <tr>
    <td style="font-size:12px"><?= $row_item['menu_name'] ?></td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td><?= $row_item['transaction_detail_qty']." x ".number_format($row_item['transaction_detail_price'])?></td>
    <td align="right" style="font-size:12px"><?= number_format($row_item['transaction_detail_total'])?></td>
  </tr>
  <?php
 $no_item++;
 $total_price = $total_price + $row_item['transaction_detail_total'];
  }
 ?>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:12px; padding: 0">
	<tr>
			<td>Total</td>
			<td align="right"><?= number_format($row['transaction_total'])?></td>
	</tr>
	<?if($row['transaction_discount'] != 0){?>
	  <tr>
			<td>Diskon(<?= number_format($row['transaction_discount'])?>%)</td>
			<td align="right">-<?= number_format($row['transaction_discount']/100*$row['transaction_total'])?></td>
	  </tr>
  <?}
	if($row['transaction_disc_nominal'] != 0){?>
	<tr>
		<td>Diskon Nominal</td>
		<td align="right">-<?= number_format($row['transaction_disc_nominal'])?></td>
	</tr>
	<?}
	if($row['disc_member'] != 0){?>
	<tr>
		<td>Disk. member(<?= $rmember['member_discount']?>)%</td>
		<td align="right">-<?= number_format($row['disc_member'])?></td>
	</tr>
	<?}
		$totalawal  = $row['transaction_total'];
		$totalkedua =	$totalawal;
		$totalkedua=ceil($totalkedua);
		if (substr($totalkedua,-2)!=00){
			if(substr($totalkedua,-2)<50){
				$totalkedua=round($totalkedua,-2)+100;
			}else{
				$totalkedua=round($totalkedua,-2);
			}}?>
  <tr>
    <td style="font-size:16px"><strong>Grand Total</strong></td>
    <td style="font-size:16px" align="right"><strong><?= number_format($row['transaction_grand_total'])?></strong></td>
  </tr>
  <tr>
    <td style="font-size:16px">Bayar</td>
    <td align="right"><?= number_format($row['transaction_payment'])?></td>
  </tr>
  <tr>
    <td><strong>Kembali</strong></td>
    <!-- <td align="right"><strong><?= number_format($row['transaction_payment']-$totalkedua)?></strong></td> -->
		<td align="right"><strong><?= number_format($row['transaction_change'])?></strong></td>
  </tr>
</table>
*/ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top: 5;">
  <tr>
    <td align="center" style="font-size: 10px;">TERIMA KASIH ATAS KUNJUNGAN ANDA</td>
  </tr>
   <tr>
    <td align="center" style="font-size: 9px;">kritik dan saran</td>
  </tr>
  <tr>
    <td align="center" style="font-size: 9px;">085730311361</td>
  </tr>
  <tr>
    <td align="center" style="font-size: 8px;">- Powered By Jasasoftwaresurabaya.com -</td>
  </tr>
</table>

<a href="order.php?page=list&member=<?=$_GET['member']?>&id=<?=$_GET['id']?>&branch_id=<?=$_GET['branch_id']?>&ruangan_id=<?=$_GET['ruangan_id']?>&t=<?=$_GET['t']?>" style="text-decoration:none" title="Order"><div class="back_to_order">Order</div></a>

</body>
<script>
/*var url = "send_data.php?transaction_code=<?= $row['transaction_code'] ?>&branch_id=<?= $row['branch_id']?>&transaction_date=<?= $row['transaction_date']?>";
    window.onload = function(){
         window.open(url, "_blank"); // will open new tab on window.onload
    }
		//setTimeout(function(){ print(); }, 500);

		*/
</script>
