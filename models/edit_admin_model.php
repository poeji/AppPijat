<?
function read_id($id){
	$query = mysql_query("select *
				from users 
				where user_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function cek_name_login($name,$id){
	$query = mysql_query("select user_id
							from users 
						where user_login = '".$name."' AND user_id <>'".$id."'");
	$result = mysql_num_rows($query);
	return $result;
}
function update_pas($pass,$id){
	mysql_query("UPDATE users SET user_password='".$pas."' where user_id = '".$id."'");
}
	
function create($data){
	mysql_query("insert into users values(".$data.")");
}

function update($data, $id){
	mysql_query("update users set ".$data." where user_id = '$id'");
}

function delete($id){
	mysql_query("delete from users  where user_id = '$id'");
}


?>
