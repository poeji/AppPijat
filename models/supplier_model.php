<?php

function select(){
	$query = mysql_query("select *
							from suppliers
							order by supplier_id");
	return $query;
}


function read_id($id){
	$query = mysql_query("select *
							from suppliers
			where supplier_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into suppliers values(".$data.")");
}

function update($data, $id){
	mysql_query("update suppliers set ".$data." where supplier_id = '$id'");
}

function delete($id){
	mysql_query("delete from suppliers where supplier_id = '$id'");
}
?>