<?php

function select(){
	$query = mysql_query("select a.* 
							from branches a
							
							order by branch_id");
	return $query;
}

function select_branch(){
	$query = mysql_query("select * from branches order by branch_id ");
	return $query;
}


function read_id($id){
	$query = mysql_query("select *
			from branches
			where branch_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into branches values(".$data.")");
}

function update($data, $id){
	mysql_query("update branches set ".$data." where branch_id = '$id'");
}

function delete($id){
	mysql_query("delete from branches where branch_id = '$id'");
}



?>