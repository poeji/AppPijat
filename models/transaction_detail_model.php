<?php

function select(){
						
	$query = mysql_query("select b.*, c.table_name, d.building_name 
									from transaction_histories b 
									left join tables c on c.table_id = b.table_id
									left join buildings d on d.building_id = c.building_id
									order by transaction_id
						");
	
	return $query;
}

function select_detail($id){
						
	$query = mysql_query("select b.*, c.menu_name
									from transaction_details b 
									join menus c on c.menu_id = b.menu_id
									where b.transaction_id = $id
									
						");
	
	return $query;
}

function read_id($id){
	$query = mysql_query("select b.*, c.table_name, d.building_name 
									from transaction_histories b 
									left join tables c on c.table_id = b.table_id
									left join buildings d on d.building_id = c.building_id
									where b.transaction_id = '$id'
									order by transaction_id");
	$result = mysql_fetch_object($query);
	return $result;
}

function update($id){
	mysql_query("update transaction_histories set status = 1 where transaction_id = '$id'");
}


?>