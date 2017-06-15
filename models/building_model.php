<?php

function select(){
	$query = mysql_query("select a.*, b.branch_name
							from ruangan a
							join branches b on b.branch_id = a.branch_id
							order by ruangan_id");
	return $query;
}

function select_ruangan(){
	$query = mysql_query("select * from ruangan order by ruangan_id ");
	return $query;
}

function select_branch(){
	$query = mysql_query("select * from branches order by branch_id ");
	return $query;
}


function read_id($id){
	$query = mysql_query("select *
			from ruangan
			where ruangan_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into ruangan values(".$data.")");
}

function update($data, $id){
	mysql_query("update ruangan set ".$data." where ruangan_id = '$id'");
}

function delete($id){
	mysql_query("delete from ruangan where ruangan_id = '$id'");
}


?>