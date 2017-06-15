<?php

function select(){
	$query = mysql_query("select * from side_menus");
	return $query;
}
function select_type(){
	$query = mysql_query("select * from side_menus");
	return $query;
}

function delete($id){
	mysql_query("delete from side_menus where side_menu_id = '$id'");
}

?>