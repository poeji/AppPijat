<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/already_model.php';

$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("Already Reserved Table");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "already_reserved.php?page=form";

		include '../views/already_reserved/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "already_reserved.php?page=list";
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
		
			$action = "already_reserved.php?page=edit&id=$id";
		} else {
			
			//inisialisasi
			$row = new stdClass();
	
			$row->branch_name = false;
			$row->branch_address = false;
			$row->branch_phone = false;
			$row->branch_city = false;
			$row->branch_desc = false;
			$row->branch_img = false;
			
			$action = "already_reserved.php?page=save";
		}

		include '../views/already_reserved/form.php';
		get_footer();
	break;

	case 'save':
	
		extract($_POST);

		$i_name = get_isset($i_name);
		$i_address = get_isset($i_address);
		$i_phone = get_isset($i_phone);
		$i_city = get_isset($i_city);
		$i_desc = get_isset($i_desc);
		
		
		$date = time();
		
		$data = "'',
					'$i_name',
					'".$image."',
					'$i_desc',
					'$i_address',
					'$i_phone',
					'$i_city'
			";

		create($data);
			
		header("Location: already_reserved.php?page=list&did=1");
		
		
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_address = get_isset($i_address);
		$i_phone = get_isset($i_phone);
		$i_city = get_isset($i_city);
		$i_desc = get_isset($i_desc);
		
		$date = time();

		echo $i_phone;
		
				$data = "branch_name = '$i_name',
							branch_desc = '$i_desc',
							branch_address = '$i_address',
							branch_phone = '$i_phone',
							branch_city = '$i_city'
					";
			
		update($data, $id);
			
			header('Location: already_reserved.php?page=list&did=2');
		
		

	break;

	case 'delete':

                $name = get_isset($_GET['name']);
                
		delete($name);

		header('Location: already_reserved.php?page=list&did=3');

	break;
}

?>