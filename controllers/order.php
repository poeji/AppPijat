<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/order_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Order");
$judul = 'Bakmi Gili';
$_SESSION['menu_active'] = 2;

switch ($page) {
	case 'list':
		$where_branch = "";
		$where = '';
		$first_ruangan_id = select_config_by('ruangan', 'min(ruangan_id)', '');

		$ruangan_id = (isset($_GET['ruangan_id'])) ? $_GET['ruangan_id'] : $first_ruangan_id;
		$branch_id = (isset($_GET['branch_id'])) ? $_GET['branch_id'] : $_SESSION['branch_id'];

		$q_branch = select_config('branches', $where);

		$where_branch_id = "where branch_id = '$branch_id'";
		$where_ruangan_id = "WHERE ruangan_id = '$ruangan_id'";

		$branch_name = select_config_by('branches', 'branch_name', $where_branch_id);
		$ruangan_name = select_config_by('ruangan', 'ruangan_name', $where_ruangan_id);

		$q_ruangan = select_config('ruangan', $where_branch_id);

		$q_infrastruktur = select_config('ruangan_infrastruktur', '');
		$q_infrastruktur_ = select_config('ruangan_infrastruktur', '');
		$q_infrastruktur__ = select_config('ruangan_infrastruktur', '');

		$action_logout = "logout.php";
		$action_order = "order.php?page=order_form&infrastruktur_id=";
		include '../views/order/list.php';
	break;

	case 'order_form':
		$infrastruktur_id = $_GET['infrastruktur_id'];
		header("location:transaction.php?page=list&ruangan_infrastruktur_id=$infrastruktur_id");
		break;
	}
?>
