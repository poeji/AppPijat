<?php

function select($where){
	$query = mysql_query("SELECT a.*,b.member_name,c.pijat_name
								FROM reserved a
								JOIN members b ON b.member_id = a.member_id
								join pijat c ON c.pijat_id = a.pijat
								order by reserved_id");
	return $query;
}

function select_reserved(){
	$query = mysql_query("select * from reserved order by reserved_id");
}

function select_member(){
	$query = mysql_query("select * from members order by member_id ");
	return $query;
}

function select_pijat(){
	$query = mysql_query("select * from pijat order by pijat_id");
	return $query;
}

function save($data){
		$query = mysql_query("insert into reserved values($data)");	
}

function read_id($id){
	$query = mysql_query("select * from reserved where reserved_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function read_id_transaction($id){
	$query = mysql_query("select * from transactions_tmp where transaction_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function update($data, $id){
	mysql_query("update reserved set ".$data." where reserved_id = '$id'");
}

function delete($id){
	mysql_query("delete from reserved where reserved_id = '$id'");
}

?>