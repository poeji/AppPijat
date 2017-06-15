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

$qpjt = mysql_query("SELECT t.*, p.*, m.`member_name`, m.member_id, m.`member_alamat`, m.`member_phone`, DATE_FORMAT(k.`datebook`, '%d %M %Y %H:%i:%s') AS tgl, 
DATE_FORMAT(k.`dateinsert`, '%Y-%m-%d %H:%i:%s') AS tglins, r.`infrastruktur_name` 
FROM `transactions` t
LEFT JOIN pijat p ON p.`pijat_id` = t.`pijat_id` 
LEFT JOIN members m ON m.`member_id` = t.`member_id` 
LEFT JOIN `transaction_kursi` k ON k.`transcaction_id` = t.`transaction_id` 
LEFT JOIN `ruangan_infrastruktur` r ON r.`ruangan_infrastruktur_id` = k.`ruangan_infrastruktur_id` 
WHERE ruangan_id = '".$_GET['ruangan_id']."' AND k.ruangan_infrastruktur_id = '".$_GET['ruangan_infrastruktur_id']."' AND DATE_FORMAT(t.`transaction_date`, '%Y%m%d') = '$_GET[t]' AND t.`transaction_id` = '$_GET[id]'");
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
		<td>N/<?= $row['transaction_code']?></td>
		<?php 
		$usr = mysql_fetch_array(mysql_query("select * from users where user_id = '$_SESSION[user_id]' "))
		?>
		<td align="right" >cashier: <?= $usr['user_name'] ?></td>
	</tr>
	<tr>
		<td>Meja: <?= $row['pijat_name']?></td>
		<td align="right" ><?= $row['transaction_date'] ?></td>
		<input type="hidden" id="transaction_code" name="transaction_code" value="<?= $row['transaction_code']?>">
		<input type="hidden" id="branch_id" name="branch_id" value="<?= $row['branch_id']?>">
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

<table id="" class="" width="100%">
                                    <tbody>
                                        <tr>
                                          <td width="10%" valign="top">1</td>
                                          <td valign="top"><?= $row['pijat_name'] ?></td>
                                          <td align="right" valign="top"><?= number_format($row['pijat_harga']) ?></td>
                                        </tr>

                                           <?php 
                                           $tjual = 0;
                                           $no = 2;
                                           $qtemp = mysql_query("SELECT d.`transaction_detail_id`, i.* 
FROM `transaction_details` d 
LEFT JOIN item i ON i.`item_id` = d.`menu_id` 
WHERE d.transaction_id = '".$_GET['id']."'");
        while ($dtemp = mysql_fetch_array($qtemp)) {
          ?>
                                           <tr>
                                          <td width="10%" valign="top"><?=$no?></td>
                                          <td valign="top"><?=$dtemp['item_name']?></td>
                                          <td align="right" valign="top"><?php print number_format($dtemp['item_harga_jual']); ?></td>
                                        </tr>
                                        <?php $tjual += $dtemp['item_harga_jual'];  $no++; } ?>
                                    </tbody>
                                  </table>
                                  <?php 
                                  $total_price = $tjual + $row['pijat_harga'];
                                  $sc = $total_price * 0.05;
                                  $tax = $total_price * 0.1;
                                  $totalkedua = $total_price + $sc + $tax;
                                  ?>
                                  <div style="border-bottom:1px #000 dotted; padding-bottom:5px; margin-bottom:5px;"></div>
                                    <table width="100%">
                                     <tfoot>
                                        <tr>
                                            <td colspan="2" >Total </td>
                                            <td colspan="3" style="text-align:right;" ><?= number_format($total_price)?>
                                             </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" >Service Charge(5%) </td>
                                            <td colspan="3" style="text-align:right;" ><?= number_format($sc)?>
                                             </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" >Tax(10%) </td>
                                            <td colspan="3" style="text-align:right;" ><?= number_format($tax)?>
                                             </td>
                                        </tr>
  								                      <tr>
                                            <td colspan="2" style="font-size:20px;">Grand Total </td>
                                            <td colspan="3" style="text-align:right; font-size:20px;" ><span id="totalkedua"><?= number_format($totalkedua)?></span></td>
                                        </tr>
                                    </tfoot>
                                  </table>

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
<a href="order.php?page=list&member=&id=<?=$_GET['id']?>&branch_id=<?=$_GET['branch_id']?>&ruangan_id=<?=$_GET['ruangan_id']?>&t=<?=$_GET['t']?>" style="text-decoration:none" title="Order"><div class="back_to_order">Order</div></a>

</body>
<script>
/*var url = "send_data.php?transaction_code=<?= $row['transaction_code'] ?>&branch_id=<?= $row['branch_id']?>&transaction_date=<?= $row['transaction_date']?>";
    window.onload = function(){
         window.open(url, "_blank"); // will open new tab on window.onload
    }
		//setTimeout(function(){ print(); }, 500);

		*/
</script>
