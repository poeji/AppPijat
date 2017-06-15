<?php

function select(){
	$query = mysql_query("select a.* 
							from satuan a	
							where satuan_id <> 1					
							order by satuan_id");
	return $query;
}

function select_satuan(){
	$query = mysql_query("select * from satuans order by satuan_id ");
	return $query;
}


function read_id($id){
	$query = mysql_query("select *
			from satuan
			where satuan_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into satuan values(".$data.")");
}

function update($data, $id){
	mysql_query("update satuan set ".$data." where satuan_id = '$id'");
}

function delete($id){
	mysql_query("delete from satuan where satuan_id = '$id'");
}
?>