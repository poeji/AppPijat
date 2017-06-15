<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/print_bill_model.php';
$page = null;	
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("Bill");

$_SESSION['table_active'] = 1;

switch ($page) {
	case 'list':
		
		$table_id = get_isset($_GET['ruangan_infrastruktur_id']);
		$building_id = (isset($_GET['building_id'])) ? $_GET['building_id'] : 0;
		$query = select($table_id);
		//$row = mysql_fetch_array($query);
		//$query_item = select_item($transaction_id);

		create_transaction_bill($table_id);
		
		include '../views/print/list.php';
		
	break;
	
	

	
}

?>