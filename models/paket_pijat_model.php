<?php

function select(){
	$query = mysql_query("select a.*
								from paket_pijat a
								join item b on b.item_id = a.item_id
								order by paket_pijat_id");
	return $query;
}

function select_paket_pijat(){
	$query = mysql_query("select * from paket_pijat order by paket_pijat_id ");
	return $query;
}

function select_item(){
	$query = mysql_query("select * from item order by item_id ");
	return $query;
}

function select_paket_pijat_details($id){
	$query = mysql_query("SELECT a.*, b.pijat_name FROM paket_pijat_details a
												LEFT JOIN pijat b on b.pijat_id = a.pijat
												WHERE a.paket_pijat = '$id'");
	return $query;
}

function read_id($id){
	$query = mysql_query("select *
			from paket_pijat
			where paket_pijat_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into paket_pijat values(".$data.")");
}

function update($data, $id){
	mysql_query("update paket_pijat set ".$data." where paket_pijat_id = '$id'");
}

function delete($id){
	mysql_query("delete from paket_pijat where paket_pijat_id = '$id'");
}
?>
