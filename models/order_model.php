<?php

function select(){
	$query = mysql_query("select * from tables order by table_id");
	return $query;
}

function select_table_merger($building_id, $table_id){
	$query = mysql_query("select a.* , b.building_name as nama_gedung
							from tables a
							join buildings b on b.building_id = a.building_id
							where (a.building_id = '$building_id' and a.table_id <> '$table_id'
							and a.tms_id <> '1') and a.table_status_id = 1
							order by table_name");
	return $query;
}

function save_table_location($id, $data_x, $data_y){
		$get_margin = (mysql_fetch_array(mysql_query("select * from tables where table_id = '$id' ")));
		$margin_x=($get_margin['data_x']);
		$margin_y=($get_margin['data_y']);

		$data_x = $data_x + $margin_x;
		$data_y = $data_y + $margin_y;

		$data_x = ($data_x < 0) ? 0 : $data_x;
		$data_y = ($data_y < 0) ? 0 : $data_y;

		$data_x = ($data_x > 1264) ? 1264 : $data_x;
		$data_y = ($data_y > 768) ? 768 : $data_y;

		$query = mysql_query("update tables set data_x = '$data_x', data_y ='$data_y' where table_id = '$id'");

}




?>
