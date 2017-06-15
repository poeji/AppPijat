<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/list_transaction_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("List Transaksi");

$_SESSION['menu_active'] = 9;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "list_transaction.php?page=form";

		include '../views/list_transaction/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "list_transaction.php?page=list";
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
		
			$action = "list_transaction.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
	
			$row->list_transaction_name = false;
			
			$action = "list_transaction.php?page=save";
		}

		include '../views/list_transaction/form.php';
		get_footer();
	break;

	case 'save':
	
		extract($_POST);

		$i_name = get_isset($i_name);
		
		$data = "'',
					
					'$i_name'
					
			";
			
			//echo $data;

			create($data);
		
			header("Location: list_transaction.php?page=list&did=1");
		
		
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		
					$data = " list_transaction_name = '$i_name'
					";
			
			update($data, $id);
			
			header('Location: list_transaction.php?page=list&did=2');

		

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: list_transaction.php?page=list&did=3');

	break;
}

?>