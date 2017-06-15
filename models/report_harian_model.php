<?php

function select_detail($date1, $date2){
						
	$query = mysql_query("SELECT a.menu_id, a.menu_price, a.menu_name, b.jumlah
								FROM menus a
								JOIN (
								
									SELECT sum( transaction_detail_qty ) AS jumlah, menu_id
									FROM transaction_details a
									JOIN transactions b on b.transaction_id = a.transaction_id
									WHERE  b.transaction_date >= '$date1 00:00:00'
									AND b.transaction_date <= '$date2 23:59:59'
									GROUP BY menu_id
								) AS b ON b.menu_id = a.menu_id
								order by b.jumlah desc
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
							WHERE  transaction_date >= '$date1 00:00:00'
							AND transaction_date <= '$date2 23:59:59'
							 ");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
}

function get_total_penjualan($date1, $date2){
	$query = mysql_query("SELECT sum(transaction_total) as jumlah 
							from transactions 
							WHERE  transaction_date >= '$date1 00:00:00'
							AND transaction_date <= '$date2 23:59:59'
							 ");
	$result = mysql_fetch_array($query);
	$result = ($result['jumlah']) ? $result['jumlah'] : "0"; 
	//$result = 25 / 100 * $result; 
	return $result;
}

function get_total_pajak($date1, $date2){
	$query = mysql_query("SELECT sum(transaction_total) as jumlah 
							from transactions 
							WHERE  transaction_date >= '$date1 00:00:00'
							AND transaction_date <= '$date2 23:59:59'
							 ");
	$result = mysql_fetch_array($query);
	$result = ($result['jumlah']) ? $result['jumlah'] : "0"; 
	//$result = 25 / 100 * $result;
	$result = 10 / 100 * $result; 
	return $result;
}


function get_total_penjualan_harian($date){
	$query = mysql_query("SELECT sum(transaction_total) as jumlah 
							from transactions 
							WHERE  transaction_date >= '$date 00:00:00'
							AND transaction_date <= '$date 23:59:59'
							 ");
	$result = mysql_fetch_array($query);
	$result = ($result['jumlah']) ? $result['jumlah'] : "0";
	//$result = 25 / 100 * $result; 
	return $result;
}

function get_total_pajak_harian($date){
	$query = mysql_query("SELECT sum(transaction_total) as jumlah 
							from transactions 
							WHERE  transaction_date >= '$date 00:00:00'
							AND transaction_date <= '$date 23:59:59'
							 ");
	$result = mysql_fetch_array($query);
	$result = ($result['jumlah']) ? $result['jumlah'] : "0";
	//$result = 25 / 100 * $result; 
	$result = 10 / 100 * $result; 
	return $result;
}



function delete_transaction($transaction_id){
		
		mysql_query("delete from transaction_details where transaction_id = '".$row['transaction_id']."'");	
		
		mysql_query("delete from transactions where transaction_id = '$transaction_id'");
}


?>