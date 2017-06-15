<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/supplier_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Supplier");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "supplier.php?page=form";

		include '../views/supplier/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "supplier.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
		
			$action = "supplier.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
	
			$row->supplier_name = false;
			$row->supplier_phone = false;
			$row->supplier_email = false;
			$row->supplier_addres = false;
			
			$action = "supplier.php?page=save";
		}

		include '../views/supplier/form.php';
		get_footer();
	break;

	case 'save':
	
		extract($_POST);

		$i_name = get_isset($i_name);
		$i_telp = get_isset($i_telp);
		$i_email = get_isset($i_email);
		$i_alamat = get_isset($i_alamat);
		
		$data = "'',
					'$i_name',
					'$i_telp', 
					'$i_email', 
					'$i_alamat'
			";
			
			//echo $data;

			create($data);
		
			header("Location: supplier.php?page=list&did=1");
		
		
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_telp = get_isset($i_telp);
		$i_email = get_isset($i_email);
		$i_alamat = get_isset($i_alamat);
		
					$data = " supplier_name = '$i_name',
					supplier_phone = '$i_telp',
					supplier_email = '$i_email',
					supplier_addres = '$i_alamat'
					";
			echo $data;
			update($data, $id);
			
			header('Location: supplier.php?page=list&did=2');

		

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: supplier.php?page=list&did=3');

	break;
}

?>