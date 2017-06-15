<?php

function update_config($table, $data, $where){
  mysql_query("update $table set $data $where");
}

function select_config_by($table, $obj, $where){
  $query = mysql_query("SELECT $obj as result FROM $table $where");
	$row = mysql_fetch_array($query);
	$result = $row['result'];
	return $result;
}

function select_config($table, $where){
	$query = mysql_query("SELECT * FROM $table $where");
	return $query;
}
 ?>
