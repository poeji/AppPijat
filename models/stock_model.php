<?php

function select(){
	$query = mysql_query("SELECT a.*, b.satuan_name
							FROM item a
							JOIN satuan b ON b.satuan_id = a.item_satuan 
							order by item_id");
	return $query;
}

function select_branch($where){
	$query = mysql_query("select * from branches $where order by branch_id");
	return $query;
}

function read_id($id){
	$query = mysql_query("select * from item where item_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into item values(".$data.")");
}

function update($data, $id){
	mysql_query("update item set ".$data." where item_id = '$id'");
}

function get_stock($item_id, $branch_id){
	$query = mysql_query("select item_stock_qty as result from item_stocks 
								where item = '$item_id' 
								and branch = '$branch_id'
								");

	$row = mysql_fetch_array($query);

	$result = ($row['result']) ? $row['result'] : "0";
	return $result;
}
function delete($id){
	$query = mysql_query("delete from item where item_id = '$id'");
}


?>
