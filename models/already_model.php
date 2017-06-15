<?php

function select(){
	$query = mysql_query("select a.* from reserved a
							order by reserved_id");
	return $query;
}

function read_id($id){
	$query = mysql_query("select *
			from reserved
			where reserved_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into reserved values(".$data.")");
}

function update($data, $id){
	mysql_query("update branches set ".$data." where branch_id = '$id'");
}

function delete($name){
	mysql_query("DELETE FROM reserved WHERE NAME LIKE '$name'");
}
function get_img_old($id){
	$query = mysql_query("select branch_img
			from branches
			where branch_id = '$id'");
	$result = mysql_fetch_array($query);
	return $result['branch_img'];
}


?>