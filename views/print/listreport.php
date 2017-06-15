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
<!--body  onload=print()-->
<body>
	<div class="header">
		<span style="font-size:14px;">Hong Li Huo Guo Cheng<br>
		Resto </span><br>
		Manyar Kertoarjo 45 Surabaya<br />
		(031) 591 74 777
	</div>

	<?php
	$totAll = 0;
	while ($row = mysql_fetch_array($query)) {
	$totAll = $totAll+$row['total_all'];
	?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top: 5;">
		  <tr>
		<td>No. <?= $row['transaction_id'] ?></td>
		<td align="right" >cashier: <?= $row['user_name'] ?></td>
	</tr>
		  <tr>
			<td>Meja <?= $row['table_name']?> (<?= $row['building_name']?>)</td>
			<td align="right" ><?= $row['transaction_date'] ?></td>
		  </tr>
		</table>
		<?php $bank = array('Mandiri', 'BCA', 'BRI');?>
		<?php if($row['payment_method_id'] != 1){?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top: 5;">
		  <tr>
			<td>Bank: <?= $bank[$row['bank_id']]?></td>
			<td align="right" >Account Number: <?= $row['bank_account_number'] ?></td>
		  </tr>
		</table>
		<?php }?>
		<?php
			$itemquery = select_item($row['transaction_id']);
		?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top: 5;">
			<?php while($item = mysql_fetch_array($itemquery)){?>
				<tr>
					<td colspan="2"><?= $item['menu_name'] ?></td>
				</tr>
				<tr>
					<td><?= $item['transaction_detail_qty']." x ".number_format($item['transaction_detail_price'])?></td>
					<td align="right"><?= number_format($item['transaction_detail_total'])?></td>
				</tr>
			<?php }?>
		</table>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:15px; padding-top: 5;">
			<tr>
				<td>Total</td>
				<td align="right"><?= number_format($row['transaction_total'])?></td>
			</tr>
			<?php
			if($row['transaction_discount'] != 0){
			?>
			<tr>
				<td>Diskon(<?= number_format($row['transaction_discount'])?>%)</td>
				<td align="right">-<?= number_format($row['transaction_discount']/100*$row['transaction_total'])?></td>
			</tr>
			<?php
			}
			?>
			<tr>
				<td>Service Charge(5%)</td>
				<td align="right"><?= number_format($row['service_charge'])?></td>
			</tr>
			<tr>
				<td>Tax(10%)</td>
				<td align="right"><?= number_format($row['tax'])?></td>
			</tr>
			<tr>
				<td style="font-size:16px"><strong>Grand Total</strong></td>
				<td style="font-size:16px" align="right"><strong><?= number_format($row['total_all'])?></strong></td>
			</tr>
			<tr>
				<td>Bayar</td>
				<td align="right"><?= number_format($row['transaction_payment'])?></td>
			</tr>
			<tr>
				<td><strong>Kembali</strong></td>
				<td align="right"><strong><?= number_format($row['transaction_change'])?></strong></td>
			</tr>
		</table>
		<br>
	<?php } ?>
	<hr>
	<hr>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:17px; padding-top: 5;">
		<tr>
			<td><strong>Rp.</strong></td>
			<td align="right"><strong><?= number_format($totAll)?></strong></td>
		</tr>
	</table>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top: 5;">
	  <tr>
		<td align="center" style="font-size: 12px;">- Powered By Jasasoftwaresurabaya.com -</td>
	  </tr>
	</table>
</body>
