<?php

function select_login($login, $password){
	$query = mysql_query("select * from users where user_login = '$login' and user_password = '$password'");
	$result = mysql_num_rows($query);
	return $result;
}

function select_user($login, $password){
	$query = mysql_query("select * from users where user_login = '$login' and user_password = '$password'");
	$result = mysql_fetch_object($query);
	return $result;
}

?>
