<?php
// BAYAR KALKULATORNYA BELOM ==================================================================================
date_default_timezone_set('Asia/Jakarta');


include '../lib/config.php';
include '../lib/function.php';
include '../models/order_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "dashboard";
$title = ucfirst("Order");
$judul = 'Zee Holistic';
$_SESSION['menu_active'] = 2;

switch ($page) {
    case 'list':
        //get_header();
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



        include '../views/c-order/view.php';
        //get_footer();
    break;

    case 'dashboard':

    //get_header();
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

    	//include '../views/c-order/dashboard.php';

    	 //get_header();

		    include '../views/c-order/view.php';

		//get_footer();

	break;

    case 'order':
    	
    get_header();

    include '../views/c-order/transaction.php';

    get_footer();
    break;

    case 'simpan_transaksi':
    
    /*echo "<pre>";
    print_r($_GET);
    echo "</pre>";*/

    include '../views/c-order/simpan_transaksi.php';

    break;

    case 'form_statement':
	
	get_header();

    include '../views/c-order/form_statement.php';

    get_footer();

	break;

	case 'simpan_statement':
	
	/*echo "<pre>";
    print_r($_POST);
    echo "</pre>";*/
    include '../views/c-order/simpan_statement.php';

	break;

	case 'cetak_statement':
	
	/*echo "<pre>";
    print_r($_GET);
    echo "</pre>";*/
    include '../views/c-order/cetak_statement.php';

	break;

	case 'payment':
	

	include '../views/c-order/payment.php';
	break;

	case 'saveall':
	
		include '../views/c-order/saveall.php';

	break;

	case 'print_bill':
	
		include '../views/c-order/print_bill.php';

	break;

	case 'addpijat':
	
		include '../views/c-order/addpijat.php';

	break;

	case 'simpan_addpijat':
	
		include '../views/c-order/simpan_addpijat.php';

	break;

	case 'editkursi':
	
		include '../views/c-order/editkursi.php';

	break;

	case 'simpankursi':
	
		include '../views/c-order/simpankursi.php';

	break;

	case 'additem':
	
		include '../views/c-order/additem.php';

	break;

	case 'saveadditem':
	
		include '../views/c-order/saveadditem.php';

	break;

	case 'delitem':
	
		include '../views/c-order/delitem.php';

	break;

	case 'appointment':
	
		include '../views/c-order/appointment.php';

	break;

	case 'cancelorder':
	
		include '../views/c-order/cancelorder.php';

	break;

	case 'editpijat':
	
		include '../views/c-order/editpijat.php';

	break;

	case 'saveeditpijat':
	
		include '../views/c-order/saveeditpijat.php';
	break;

	case 'save_payment':
	
		include '../views/c-order/save_payment.php';
	break;
}