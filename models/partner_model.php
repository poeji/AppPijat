<?php

function select(){
	$query = mysql_query("select a.* 
							from partners a	
							where partner_id <> 1					
							order by partner_id");
	return $query;
}

function select_partner(){
	$query = mysql_query("select * from partners order by partner_id ");
	return $query;
}


function read_id($id){
	$query = mysql_query("select *
			from partners
			where partner_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into partners values(".$data.")");
}

function update($data, $id){
	mysql_query("update partners set ".$data." where partner_id = '$id'");
}

function delete($id){
	mysql_query("delete from partners where partner_id = '$id'");
}
?>