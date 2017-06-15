<?php

function select(){
	$query = mysql_query("select a.* from user_types a");
	return $query;
}

function select_type(){
	$query = mysql_query("select * from user_types order by user_type_id");
	return $query;
}


function select_branch(){
	$query = mysql_query("select * from branches order by branch_id");
	return $query;
}

function read_id($id){
	$query = mysql_query("select *
			from user_types
			where user_type_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into user_types values(".$data.")");
	return mysql_insert_id();
}

function create_permit($data){
	mysql_query("insert into permits values(".$data.")");
}

function update($data, $id){
	mysql_query("update user_types set ".$data." where user_type_id = '$id'");
	mysql_query("delete from permits where user_type_id = '$id'");
}

function delete($id){
	mysql_query("delete from user_types where user_type_id = '$id'");
}
function cek_name_login($name){
	$query = mysql_query("select count(user_id)
							from users
						where user_login = '".$name."'");
	$result = mysql_fetch_array($query);
	$row = $result['0'];
	return $row;
}

function manu($type){

	if($type){
		$query2 = mysql_query("select a.*,(select permit_acces from permits b where b.side_menu_id = a.side_menu_id and b.user_type_id = '".$type."') as permit_acces from side_menus a where side_menu_level = 1");
		return $query2;
	}else{
		$query = mysql_query("select * from side_menus where side_menu_level = 1");
		return $query;
	}

}

function menu_parent($id,$type){


	if($type){
		$query2 = mysql_query("select a.*,(select permit_acces from permits b where b.side_menu_id = a.side_menu_id and b.user_type_id = '".$type."') as permit_acces from side_menus a
				  where a.side_menu_parent ='".$id."'");
		return $query2;
	}else{
		$query = mysql_query("select * from side_menus where side_menu_parent = '".$id."' ");
		return $query;
	}

}

function read_side_menu(){
	$query = mysql_query("select * from side_menus");
	return $query;
}

?>
