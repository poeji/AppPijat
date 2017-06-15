<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/stock_model.php';

$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Item Stock");

$_SESSION['menu_active'] = 8;

switch ($page) {
	case 'list':
		get_header($title);
		
                if($_SESSION['user_type_id']==1 || $_SESSION['user_type_id']==3){
                    $query = select();
                    $where_branch = "";
                    $q_branch = select_branch($where_branch);
                    $add_button = "stock.php?page=form";
                    include '../views/stock/list_admin.php';
                    
                }elseif($_SESSION['user_type_id']==2 || $_SESSION['user_type_id']==4){
                    $query = select();
                    $where_branch = "";
                    $q_branch = select_branch($where_branch);
                    
                    $where_branch = " where branch_id = '".$_SESSION['branch_id']."' ";
                    $add_button = "stock.php?page=form";
                    include '../views/stock/list.php';
                }  else {
                    $add_button = "stock.php?page=form";
                    include '../views/stock/list.php';
                }
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "stock.php?page=list";
		
		// $query_unit = select_unit();
		

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			
			$action = "stock.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
	
			$row->item_name = false;
			$row->item_satuan = false;
			$row->item_limit = false;
			
			$action = "stock.php?page=save";
		}

		include '../views/stock/form.php';
		get_footer();
	break;

	case 'save':
	
		extract($_POST);

		$i_name = get_isset($i_name);
		$i_satuan = get_isset($i_satuan);
		
		$data = "'',
					'$i_name',
					'$i_satuan',
			";
			
			//echo $data;

			create($data);
		
			header("Location: stock.php?page=list&did=1");
		
		
	break;

	case 'edit':

		extract($_POST);
		
		$id = get_isset($_GET['id']);
		
		$i_name = get_isset($i_name);
		$i_unit_id = get_isset($i_unit_id);
	
		
					$data = "
					item_name = '$i_name',
					unit_id = '$i_unit_id',

					";
			
			update($data, $id);
			
			header('Location: stock.php?page=list&did=2');

		

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: stock.php?page=list&did=3');

	break;
}

?>