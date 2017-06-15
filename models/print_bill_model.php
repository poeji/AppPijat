<?php

function select($table_id){
	$query = mysql_query("select a.*,b.*, c.menu_name,d.table_name
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  join menus c on c.menu_id = b.menu_id
							  join tables d on d.table_id = a.table_id
							  where d.table_id = '".$table_id."'");
	return $query;
}

function select_item($transaction){
	$query = mysql_query("select b.*, c.menu_name 
							  from transactions a
							  join transaction_details b on b.transaction_id = a.transaction_id
							  join menus c on c.menu_id = b.menu_id
							  where a.transaction_id = '".$transaction."'");
	return $query;
}

function create_transaction_bill($id){
	mysql_query("insert into transaction_bills select * from transactions_tmp where table_id = '".$id."'");
}



?>