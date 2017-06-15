<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/print_order_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("Pembayaran");

$_SESSION['table_active'] = 1;

switch ($page) {
	case 'list':
		$building_id = get_isset($_GET['building_id']);
		$table_id = get_isset($_GET['table_id']);
		$query = select($table_id);
		$row = mysql_fetch_array($query);
		$query_item = select_item($table_id);
		$back_button = "order.php?table_id=$table_id&building_id=$building_id";
		include '../views/print_order/list.php';
		updateprinted($table_id);
	break;
}

?>
