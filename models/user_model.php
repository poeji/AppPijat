<?php

function select(){
	$query = mysql_query("select a.*, b.branch_name, c.user_type_name
							from users a
							join branches b on b.branch_id = a.branch_id
							join user_types c on c.user_type_id = a.user_type_id
							order by user_id");
	return $query;
}

function select_type(){
	$query = mysql_query("select * from user_types order by user_type_id");
	return $query;
}


function select_branch(){
	$query = mysql_query("select * from branches order by branch_id");
	return $query;
}

function read_id($id){
	$query = mysql_query("select *
			from users 
			where user_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into users values(".$data.")");
}

function update($data, $id){
	mysql_query("update users set ".$data." where user_id = '$id'");
}

function delete($id){
	mysql_query("delete from users  where user_id = '$id'");
}
function cek_name_login($name){
	$query = mysql_query("select count(user_id)
							from users 
						where user_login = '".$name."'");
	$result = mysql_fetch_array($query);
	$row = $result['0'];
	return $row;
}

?>