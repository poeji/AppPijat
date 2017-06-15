<?php

function select(){
	$query = mysql_query("select a.* 
							from members a	
												
							order by member_id");
	return $query;
}

function select_statement($id){
	$query = mysql_query("select a.*, b.member_id
							from statement a
							join members b ON b.member_id = a.member_id	
							where member_id = '$id'	
							order by statement_id");
	return $query;
}

function select_member(){
	$query = mysql_query("select * from members order by member_id ");
	return $query;
}


function read_id($id){
	$query = mysql_query("select *
			from members
			where member_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into members values(".$data.")");
}

function create_statement($data){
	mysql_query("insert into statement values(".$data.")");
}

function update($data, $id){
	mysql_query("update members set ".$data." where member_id = '$id'");
}

function update_statement($data, $id){
	msql_query("update statement set ".$data." where statement_id = '$id'");
}

function delete($id){
	mysql_query("delete from members where member_id = '$id'");
}

function delete_statemens($id){
	mysql_query("delete from statement where statement_id = '$id'");
}


?>