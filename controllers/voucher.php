<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/voucher_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("voucher");
$title2 = ucwords("voucher detail");
$title3 = ucwords("jumlah voucher");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
                $querya = select2();
		$add_button = "voucher.php?page=form";

		include '../views/voucher/list.php';
                include '../views/voucher/list_voucher.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "voucher.php?page=list";
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			$row->voucher_date = format_date($row->voucher_date);
		
			$action = "voucher.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
                        $row->voucher_id = false;
			$row->voucher_code = false;
			$row->voucher_type_id = false;
			$row->voucher_value = false;
			$row->voucher_date = false;

			$action = "voucher.php?page=save";
		}

		include '../views/voucher/form.php';
		get_footer();
	break;
        
        case 'form_list':
		get_header();

		$close_button = "voucher.php?page=list";
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			$row->voucher_date = format_date($row->voucher_date);
		
//			$actions = "voucher.php?page=edit&id=$id";
                        $actions = "voucher.php?page=save_list";
		} else{
			
			//inisialisasi
			$row = new stdClass();
                        $row->voucher_id = false;
			$row->voucher_code = false;
			$row->voucher_type_id = false;
			$row->voucher_value = false;
			$row->voucher_date = false;

			$actions = "voucher.php?page=save_list";
		}
                    
		include '../views/voucher/form_list.php';
                
		get_footer();
	break;
        
        case 'form_voucher':
		get_header($title2);

		$close_button = "voucher.php?page=list";
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id2($id);
			$actions = "voucher.php?page=save_list";
		} else{
			
			//inisialisasi
			$row = new stdClass();
                        $row->id_voucher_detail = false;
			$row->no_voucher = false;
			$row->id_branch = false;
			$row->voucher_date_issued = false;
			$row->voucher_exp_date = false;
                        $row->voucher_use = false;
                        $row->voucher_exp_date = false;
                        $row->voucher_use = false;
                        $row->status_voucher = false;
                        $row->voucher_type_id = false;
                        $row->voucher_id = false;
                        $row->voucher_type_name = false;
                        $row->voucher_code = false;
                        $row->voucher_value = false;
			
		}

		include '../views/voucher/form_voucher.php';
		get_footer();
	break;
        
        case 'save_list':
                
          
		extract($_POST);
                $i_id = get_isset($i_id); // code id
                $i_code = get_isset($i_code); // code voucher
		$i_type_id = get_isset($i_type_id); // voucher type id
		$i_voucher = get_isset($i_voucher); // jumlah voucher keluar
		$i_date = format_back_date($i_date); // voucher date experied 	
                $voucher_date = date("Y-m-d"); // voucher keluar
                
                
//                echo $i_id."</br>"; 
//                echo $i_code."</br>";
//                echo $i_date."</br>";
//                echo $i_voucher."</br>";
//                echo $voucher_date."</br>";
//                echo $_GET['id']."</br>";
//                exit();
                
                $no = 1;  
                for ($i= 1; $i <= $i_voucher; $i++){
                $data = "'',
                    
                '$i_code$no', 
                '0', 
                '$voucher_date',
                '$i_date', 
                '0',
                '0', 
                '$i_type_id',
                '$i_id'    
                ";
                        
                        
			create_data($data);
                        $no++;
                }
			header("Location: voucher.php?page=list&did=1");
		
		
	break;
    
	case 'save':
	
		extract($_POST);

		$i_code = get_isset($i_code);
		$i_type_id = get_isset($i_type_id);
		$i_value = get_isset($i_value);
		$i_date = format_back_date($i_date);
		
		

		$data = "'',
					'$i_code',
					'$i_type_id',
					'$i_value',
					'$i_date'
					
			";
			
			//echo $data;

			create($data);
		
			header("Location: voucher.php?page=list&did=1");
		
		
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_code = get_isset($i_code);
		$i_type_id = get_isset($i_type_id);
		$i_value = get_isset($i_value);
		$i_date = format_back_date($i_date);
		
					$data = " voucher_code = '$i_code',
					voucher_type_id = '$i_type_id',
					voucher_value = '$i_value',
					voucher_date = '$i_date'
					";
			
			update($data, $id);
			
			header('Location: voucher.php?page=list&did=2');

		

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: voucher.php?page=list&did=3');

	break;
    
        case 'delete_list':

		$id = get_isset($_GET['id']);	

		delete_list($id);

		header('Location: voucher.php?page=list&did=3');

	break;
        
        case 'print':
                
               
        break;
}

?>