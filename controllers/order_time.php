<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/ordertime_model.php';

$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Order Time Settings");

$_SESSION['menu_active'] = 11;

switch ($page) {
    case 'list':
		get_header($title);
        
		 $id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$query = select();
		$add_button = "order_time.php?page=form";
		include '../views/order_time/list.php';
		get_footer();
    break;

   case 'form':
                
		get_header();
                $id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
                $close_button = "order_time.php?page=list";

                if($id){

			$row = read_id($id);
		
			$action = "order_time.php?page=edit&id=$id";
		} else {
			
			//inisialisasi
			$row = new stdClass();
	
			$row->order_time = false;
			$row->ket = false;
			
			$action = "order_time.php?page=save";
		}
		include '../views/order_time/form.php';
		get_footer();
	break;
        
        case 'save':
                $id = (isset($_GET['id'])) ? $_GET['id'] : null;
		extract($_POST);

		$i_hours = get_isset($i_hours);
		$ket = get_isset($keterangan);
                
             
                
                $i_h = explode(" ", $i_hours);
		$hour = explode(":", $i_h[0]);
		
//		//echo $new_id;
//                $query = read_side_menu();
		
		if($i_h[1] == "PM"){
			if($hour[0] == 12){
				$new_hour = $hour[0];
			}else{
				$new_hour = $hour[0] + 12;
			}
			$new_hour = $new_hour.":".$hour[1];
		}else{
			if($hour[0] == 12){
				$new_hour = $hour[0] - 12;
			}else{
				$new_hour = $hour[0];
			}
			
			if(strlen($new_hour)==1){
				$new_hour = "0".$new_hour;
			}
			
			$new_hour = $new_hour.":".$hour[1];
		}
               
		$data = "'',
					
					'$new_hour',
					'$ket',
                                        '0'   
			";
			create($data);
		
			header("Location: order_time.php?page=list&did=1");
		
		
	break;
    
        case 'edit':
                $id = (isset($_GET['id'])) ? $_GET['id'] : null;
		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_hours = get_isset($i_hours);
		
					$data = " order_time = '$i_hours'
					";
			
			update($data, $id);
			
			header('Location: order_time.php?page=list&did=2');

		

	break;
        case 'delete':
                $id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: order_time.php?page=list&did=3');

	break;
    
}
?>
