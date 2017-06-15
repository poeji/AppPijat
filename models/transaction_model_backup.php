<?php

function select(){
	$query = mysql_query("select * from menus order by menu_id");
	return $query;
}

function select_cat(){
	$query = mysql_query("select * from menu_types order by menu_type_id");
	return $query;
}

function select_history($table_id){
	 $query = mysql_query("select b.*, c.menu_name
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  join menus c on c.menu_id = b.menu_id
							  where table_id = '".$table_id."'
							  order by transaction_detail_id
							  ");
	return $query;
}

function select_menu($keyword){
	$query = mysql_query("select * from menus where menu_name like '%$keyword%' order by menu_id");
	$row = mysql_fetch_array($query);
	return $row['menu_id'];
}
function update_config($table, $data, $column, $id){
	mysql_query("update $table set $data where $column = $id");
}

function delete_history($id){
	mysql_query("delete from transaction_tmp_details  where transaction_detail_id = '$id'");
}

function check_table($table_id){
	$query = mysql_query("select count(transaction_id) as jumlah
							  from transactions_tmp
							  where table_id = '".$table_id."'
							  ");
	$row = mysql_fetch_array($query);

	$jumlah = $row['jumlah'];
	return $jumlah;
}

function get_transaction_id_old($table_id){
	$query = mysql_query("select transaction_id
							  from transactions_tmp
							  where table_id = '".$table_id."'
							  ");
	$row = mysql_fetch_array($query);

	return $row['transaction_id'];

}


function check_history($table_id, $menu_id){
	$query = mysql_query("select count(b.transaction_detail_id) as jumlah
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  where table_id = '".$table_id."' and menu_id = '$menu_id'
							  ");
	$row = mysql_fetch_array($query);

	$jumlah = $row['jumlah'];
	return $jumlah;
}

function get_data_history($table_id, $menu_id){
	$query = mysql_query("select b.*
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  where table_id = '".$table_id."' and menu_id = '$menu_id'
							  ");
	return $query;
}

function delete_reserved($table_id){
	mysql_query("delete from reserved where table_id = $table_id
							  ");
}

?>
