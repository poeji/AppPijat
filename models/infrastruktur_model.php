<?php

function select(){
	$query = mysql_query("SELECT a.*
							FROM infrastruktur a
							ORDER BY infrastruktur_id");
	return $query;
}

function select_infrastruktur(){
	$query = mysql_query("select * from infrastruktur order by infrastruktur_id");
	return $query;
}

function select_branch(){
	$query = mysql_query("select * from branches order by branch_id ");
	return $query;
}

function read_id($id){
	$query = mysql_query("select *
			from infrastruktur
			where infrastruktur_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into infrastruktur values(".$data.")");
}

function update($data, $id){
	mysql_query("update infrastruktur set ".$data." where infrastruktur_id = '$id'");
}

function delete($id){
	mysql_query("delete from infrastruktur where infrastruktur_id = '$id'");
}

function get_img_old($id){
	$query = mysql_query("select infrastruktur_img from infrastruktur
							where infrastruktur_id = '$id'");
	$result = mysql_fetch_array($query);
	return $result['infrastruktur_img'];
}

?>