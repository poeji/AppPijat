<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/kategori_menu_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("Kategori Menu");
$title2 = ucwords("Kategori Sub Menu");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
                $query_2 = select_sub();
                
		$add_button = "kategori_menu.php?page=form";
                $add_button_sub = "kategori_menu.php?page=form_sub";
                
		include '../views/kategori_menu/list.php';
                include '../views/kategori_menu/list_sub.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "kategori_menu.php?page=list";
		
                
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
                        $status_select = status($id);
                        
			$action = "kategori_menu.php?page=edit&id=$id";
		} else {
			
			//inisialisasi
			$row = new stdClass();
	
			$row->kategori_utama_name  = false;
//			$row->status  = false;
			$action = "kategori_menu.php?page=save";
		}

		include '../views/kategori_menu/form.php';
		get_footer();
	break;
        
        case 'form_sub':
            get_header($title2);

		$close_button = "kategori_menu.php?page=list";
		$query_kategori_type = select_kategori_type();
                
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id_2($id);
                                                
			$action = "kategori_menu.php?page=edit_sub&id=$id";
		} else {
			
			//inisialisasi
			$row = new stdClass();
                        
			$row->menu_type_name  = false;
                        $row->id_kategori_utama = false;
			
			$action = "kategori_menu.php?page=save_sub";
		}

		include '../views/kategori_menu/form_sub.php';
		get_footer();
        break;    
        
	case 'save':
	
		extract($_POST);
                
		$i_name = get_isset($i_name);
//		$i_status = get_isset($i_status);
                
                
		$data = "'',
					'$i_name'
			";
			
			

		create($data);
			
		header("Location: kategori_menu.php?page=list&did=1");
	break;
    
        case 'save_sub':
	
		extract($_POST);
                
		$i_name = get_isset($i_name);
//		$i_status = get_isset($i_status);
                
                
		$data = "'',
					'$i_name'
                                            
			";
			
			
//                echo $data;
//                exit();
		create2($data);
			
		header("Location: kategori_menu.php?page=list&did=1");
	break;
    
        case 'edit_sub':
                
		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
//                $i_status = get_isset($i_status);
              
                $data = " 
                                                        menu_type_name = '$i_name'
							
							
							";       
//		echo $data;
//                echo $id;
//                exit();
		update2($data, $id);
			
			header('Location: kategori_menu.php?page=list&did=2');
		
		

	break;
    
	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
//                $i_status = get_isset($i_status);
              
                $data = " 
                                                        kategori_utama_name = '$i_name'
							
							
							";       
				
		update($data, $id);
			
			header('Location: kategori_menu.php?page=list&did=2');
		
		

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: kategori_menu.php?page=list&did=3');

	break;
    
        case 'delete_sub':

		$id = get_isset($_GET['id']);	

		delete2($id);

		header('Location: kategori_menu.php?page=list&did=3');

	break;
}

?>