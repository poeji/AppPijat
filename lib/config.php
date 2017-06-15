<?php
ob_start();
session_start();
$con = mysql_connect("localhost","root","");
//mysql_select_db("warung_app", $con);
//$con = mysql_connect("localhost","ab3127_r35t0","x}.;1O9X.=xw");
mysql_select_db("pijat", $con);
unset($_SESSION['menu_active']);

$http = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 's' : '') . '://';
$fo = str_replace("index.php", "", $_SERVER['SCRIPT_NAME']);

if($_SERVER['SERVER_PORT']!='80'){
	$port = ":".$_SERVER['SERVER_PORT'];
}else{
	$port="";
}

$config['base_url'] = $http.$_SERVER['SERVER_NAME'].$port.$fo;

date_default_timezone_set('Asia/Jakarta');
?>
