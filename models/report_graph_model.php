<?php

function select_detail($date1, $date2){
						
	$query = mysql_query("SELECT a.menu_id , a.menu_price, a.menu_name, b.jumlah, jumlah_dasar, jumlah_omset, c.partner_name
								FROM menus a
								JOIN (
								
									SELECT 	sum( transaction_detail_qty ) AS jumlah,
											sum( transaction_detail_qty * transaction_detail_original_price ) AS jumlah_dasar, 
											sum( transaction_detail_qty * transaction_detail_price ) AS jumlah_omset, 
											menu_id
									FROM transaction_details a
									JOIN transactions b on b.transaction_id = a.transaction_id
									WHERE  b.transaction_date >= '$date1'
									AND b.transaction_date <= '$date2'
									GROUP BY menu_id
								) AS b ON b.menu_id = a.menu_id
								join partners c on c.partner_id = a.partner_id
								order by b.jumlah desc
						");
	
	return $query;
}

function select_transaction($date1, $date2){
						
	$query = mysql_query("select b.*, c.table_name, d.building_name 
									from transactions b 
									left join tables c on c.table_id = b.table_id
									left join buildings d on d.building_id = c.building_id
									WHERE  b.transaction_date >= '$date1'
									AND b.transaction_date <= '$date2'
									order by transaction_id
						");
	
	return $query;
}

function read_id($id){
	$query = mysql_query("SELECT a.*, b.unit_name, c.transaction_type_name
							FROM  transactions a
							JOIN units b on a.unit_id = b.unit_id
							JOIN transaction_types c on c.transaction_type_id = a.transaction_type_id
 							WHERE  a.transaction_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function get_jumlah_penjualan($date1, $date2){
	$query = mysql_query("SELECT count(transaction_id) as jumlah 
							from transactions 
							WHERE  transaction_date >= '$date1'
							AND transaction_date <= '$date2'
							 ");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
}

function get_total_penjualan($date1, $date2){
	$query = mysql_query("SELECT sum(transaction_grand_total) as jumlah 
							from transactions 
							WHERE  transaction_date >= '$date1'
							AND transaction_date <= '$date2'
							 ");
	$result = mysql_fetch_array($query);
	$result = ($result['jumlah']) ? $result['jumlah'] : "0"; 
	return $result;
}

function get_menu_terlaris($date1, $date2){
	$query = mysql_query("SELECT a.menu_id, a.menu_price, a.menu_name, jumlah
								FROM menus a
								JOIN (
								
									SELECT sum( transaction_detail_qty ) AS jumlah, menu_id
									FROM transaction_details a
									JOIN transactions b on b.transaction_id = a.transaction_id
									WHERE  b.transaction_date >= '$date1 00:00:00'
									AND b.transaction_date <= '$date2 23:59:59'
									GROUP BY menu_id
								) AS b ON b.menu_id = a.menu_id
								order by jumlah desc, menu_id asc
								limit 1
								
							 ");
	$result = mysql_fetch_array($query);
	$result = ($result['menu_name']) ? $result['menu_name'] : "-"; 
	return $result;
}

function select_partner($date1, $date2){
	$query = mysql_query("SELECT a.partner_id, a.partner_name, jumlah_qty, jumlah_margin, jumlah_original, jumlah_omset
								FROM partners a
								JOIN (
								
									SELECT sum(transaction_detail_qty) as jumlah_qty, 
											sum(transaction_detail_qty * transaction_detail_margin_price ) AS jumlah_margin, 
											sum(transaction_detail_qty * transaction_detail_original_price ) AS jumlah_original,
											sum(transaction_detail_qty * transaction_detail_price ) AS jumlah_omset,
											partner_id
									FROM transaction_details a
									JOIN transactions b on b.transaction_id = a.transaction_id
									JOIN menus c on c.menu_id = a.menu_id
									WHERE  b.transaction_date >= '$date1 00:00:00'
									AND b.transaction_date <= '$date2 23:59:59'
									AND partner_id <> 1
									GROUP BY partner_id
								) AS b ON b.partner_id = a.partner_id
							
									
								");
	
	return $query;
}


function delete_transaction($transaction_id){
		
		//mysql_query("delete from transaction_details where transaction_id = '".$row['transaction_id']."'");	
		//mysql_query("insert into transaction_histories select * from transactions where transaction_id = '$transaction_id'");
	$query = mysql_query("select * from transactions where transaction_id = '$transaction_id'");
	$result = mysql_fetch_array($query);
	$data = array();

	$data = "'".$result['transaction_id']."',
			'".$result['table_id']."',
			'".$result['branch_id']."',
			'".$result['member_id']."',
			'".$result['transaction_date']."',
			'".$result['transaction_total']."',
			'".$result['transaction_discount']."',
			'".$result['transaction_grand_total']."',
			'".$result['transaction_payment']."',
			'".$result['transaction_change']."',
			'".$result['payment_method_id']."',
			'".$result['bank_id']."',
			'".$result['user_id']."',
			'".$result['bank_account_number']."',
			'".$result['transaction_code']."',
			'".$_SESSION['user_id']."',
			'0'";

	mysql_query("insert into transaction_histories values(".$data.")");

	mysql_query("delete from transactions where transaction_id = '$transaction_id'");
}

function get_total_dasar($date1, $date2, $partner_id){
	$query = mysql_query("SELECT a.menu_id, a.menu_price, a.menu_name, jumlah
								FROM menus a
								JOIN (
								
									SELECT sum( transaction_detail_qty ) AS jumlah, menu_id
									FROM transaction_details a
									JOIN transactions b on b.transaction_id = a.transaction_id
									WHERE  b.transaction_date >= '$date1 00:00:00'
									AND b.transaction_date <= '$date2 23:59:59'
									GROUP BY menu_id
								) AS b ON b.menu_id = a.menu_id
								order by jumlah desc, menu_id asc
								limit 1
								
							 ");
	$result = mysql_fetch_array($query);
	$result = ($result['menu_name']) ? $result['menu_name'] : "-"; 
	return $result;
}
function select_chart_penjualan($month1, $month2){
   	$query = mysql_query("SELECT SUM(transaction_grand_total) AS jumlah,
                                                        MONTH(transaction_date) AS waktu
							FROM transactions 
							WHERE  transaction_date >= '2016-01-01'
							AND transaction_date <= '2017-01-01 00:00:00'
							GROUP BY MONTH(transaction_date)
						");
	
	return $query;
}

function select_chart_sales($date1, $date2){
  $query = mysql_query("SELECT a.menu_name, b.jumlah, jumlah_omset, c.partner_name
								FROM menus a
								JOIN (
								
									SELECT 	SUM( transaction_detail_qty ) AS jumlah,
											SUM( transaction_detail_qty * transaction_detail_original_price ) AS jumlah_dasar, 
											SUM( transaction_detail_qty * transaction_detail_price ) AS jumlah_omset, 
											menu_id
									FROM transaction_details a
									JOIN transactions b ON b.transaction_id = a.transaction_id
									WHERE  b.transaction_date >= '$date1'
									AND b.transaction_date <= '$date2'
									GROUP BY menu_id
								) AS b ON b.menu_id = a.menu_id
								JOIN partners c ON c.partner_id = a.partner_id
								ORDER BY b.jumlah DESC
						");
  return $query;
}

?>