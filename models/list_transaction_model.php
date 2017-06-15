<?php

function select(){
	$query = mysql_query("select a.*, b.table_name, c.building_name 
							from transactions a
							left join tables b on b.table_id = a.table_id
							left join buildings c on c.building_id = b.building_id 
							order by transaction_id");
	return $query;
}

function select_list_transaction(){
	$query = mysql_query("select * from list_transactions order by list_transaction_id ");
	return $query;
}


function read_id($id){
	$query = mysql_query("select *
			from list_transactions
			where list_transaction_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into list_transactions values(".$data.")");
}

function update($data, $id){
	mysql_query("update list_transactions set ".$data." where list_transaction_id = '$id'");
}

function delete($id){
	mysql_query("delete from list_transactions where list_transaction_id = '$id'");
}
?>