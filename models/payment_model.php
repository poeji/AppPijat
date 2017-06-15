<?php

function select($table_id){
	$query = mysql_query("select b.*, c.menu_name
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  join menus c on c.menu_id = b.menu_id
							  where table_id = '".$table_id."'");
	return $query;
}

function create($data){
	mysql_query("insert into buildings values(".$data.")");
}

function get_table_name($table_id){
	//$query = mysql_query("select table_name as result from tables where table_id = '$table_id'");
	//$query = mysql_query("SELECT r.`ruangan_infrastruktur_id`, r.`infrastruktur_name`, r.`ruangan`, r.`branch`, r.`infrastruktur` FROM `ruangan_infrastruktur` r WHERE r.`ruangan_infrastruktur_id` = '$table_id'");
	$query = mysql_query("SELECT r.`infrastruktur_name` as result FROM `ruangan_infrastruktur` r WHERE r.`ruangan_infrastruktur_id` = '$table_id'");
	$row = mysql_fetch_array($query);

	return $row['result'];
}
function get_branch_name($id){
	$query = mysql_query("select branch_name as result from branches where branch_id = '$id'");
	$row = mysql_fetch_array($query);

	return $row['result'];
}

function get_transaction_code($id){
	$query = mysql_query("select transaction_code as result from transactions_tmp where table_id = '$id'");
	$row = mysql_fetch_array($query);

	return $row['result'];
}
function get_member_id($id){
	//$query = mysql_query("select member_id as result from transactions_tmp where table_id = '$id'");
	$query = mysql_query("SELECT member_id AS result  FROM transactions_tmp WHERE transaction_id = ''");
	$row = mysql_fetch_array($query);

	return $row['result'];
}
function get_member_name($id){
	$query = mysql_query("select member_name as result from members where member_id = '$id'");
	$row_member = mysql_fetch_array($query);

	return $row['result'];
}
function read_voucher($id){
	$query = mysql_query("select * from vouchers where voucher_id = '$id'");
	$row = mysql_fetch_array($query);

	return $row;
}


?>
