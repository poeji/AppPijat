<?php
function select(){
	$query = mysql_query("select * from order_time order by idt");
	return $query;
}
function create($data){
	mysql_query("insert into order_time values($data)");
}
function update($data, $id){
	mysql_query("update order_time set ".$data." where idt = '$id'");
}

function delete($id){
	mysql_query("delete from order_time where idt = '$id'");
}
function read_id($id){
	$query = mysql_query("select *
			from order_time
			where idt = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}
?>
