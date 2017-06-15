<?php
function select(){
  $query = mysql_query("SELECT * FROM office");
  $result = mysql_fetch_object($query);
	return $result;
}
function read($id){
  $query = mysql_query("SELECT * FROM office WHERE office_id = '".$id."'");
  $result = mysql_fetch_object($query);
	return $result;
}
function create($data){
	mysql_query("insert into office values(".$data.")");
}

function get_img_old($id){
  $query = mysql_query("select office_img from office
						where office_id = '".$id."'");
	// $result = mysql_fetch_array($query);
	// $row = $result['office_img'];
	// return $row;
  return $query;
}
function update($data, $id){
	mysql_query("update office set ".$data." where office_id = '$id'");
}
 ?>
