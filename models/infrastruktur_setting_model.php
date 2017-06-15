<?php

function select(){
	$query = mysql_query("select * from tables order by table_id");
	return $query;
}

function select_table($building_id){
	$query = mysql_query("select * from tables where building_id = '$building_id' order by table_id");
	return $query;
}

function save_table_location($id, $data_x, $data_y, $data_top){
		$get_margin = (mysql_fetch_array(mysql_query("select * from tables where table_id = '$id' ")));
		$margin_x=($get_margin['data_x']);
		$margin_y=($get_margin['data_y']);

		$data_x = $data_x;// + $margin_x;
		$data_y = $data_y + $data_top;

		$data_x = ($data_x < 0) ? 0 : $data_x;
		$data_y = ($data_y < 0) ? 0 : $data_y;

		//$data_x = ($data_x > 1264) ? 1264 : $data_x;
		//$data_y = ($data_y > 768) ? 768 : $data_y;

		$query = mysql_query("update tables set data_x = '$data_x', data_y ='$data_y' where table_id = '$id'");

}



?>
