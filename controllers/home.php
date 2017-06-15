<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/home_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Home");
$_SESSION['menu_active'] = 1;
switch ($page) {
	case 'list':
		get_header($title);
		include '../views/layout/home2.php';
		get_footer();
	break;
	case 'form_result':
	break;
}
?>