<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/reserved_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list_backup";
$title = ucfirst("Reserved");

$_SESSION['menu_active'] = 5;

switch ($page) {
	
	case 'list_backup':
		get_header($title);
		
		if($_SESSION['user_type_id'] == 1 || $_SESSION['user_type_id'] == 2){
			$where = "";
		}else{
			$where = " and c.branch_id = '".$_SESSION['branch_id']."'";
		}
		
		$query = select($where);
		$add_button = "reserved.php?page=list";

		include '../views/reserved/list.php';
		get_footer();
	break;
	
	case 'list':
	
		get_header($title);

		$close_button = "reserved.php?page=list_backup";
		$query_member = select_member();
		$query_pijat = select_pijat();
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){
			$row = read_id($id);
			$action = "reserved.php?page=edit&id=$id";
			$q_reserved = select_config('reserved','');

		}else {
			//inisialisasi
			$row = new stdClass();
	
			$row->member_id = false;
			$row->phone = false;
			$row->address = false;
			$row->date = date("d/m/Y");
			$row->hour = date("H:i:s");
			$row->pijat = false;
			// $row->member_name = false;
			// $row->member_alamat = false;
			// $row->member_email = false;
			// $row->member_phone = false;
		$action = "reserved.php?page=save";
	} 
			$row->member_name = false;
			$row->member_alamat = false;
			$row->member_email = false;
			$row->member_phone = false;
		include '../views/reserved/form.php';
		get_footer();
		
	break;

	case 'save':
		
		extract($_POST);
		$i_member_id = get_isset($i_member_id);
		$i_phone = get_isset($i_phone);
		$i_address = get_isset($i_address);
		$i_date = get_isset($i_date);
		$i_date = format_back_date($i_date);
		$i_hour = get_isset($i_hour);
		$i_pijat_id = get_isset($i_pijat_id);
		
		$i_h = explode(" ", $i_hour);
		
		$hour = explode(":", $i_h[0]);
		
		
		
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

		
		$query_count = select($where);				

				$data = "'',
				'$i_member_id',
				'$i_phone',
				'$i_address',
				'$i_date',
				'$new_hour',
				'$i_pijat_id',
				'0'
				";
			save($data);

			// var_dump($_POST);	

		header("location: reserved.php?page=list_backup&did=1");	
	break;
	
	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_member_id = get_isset($i_member_id);
		$i_phone = get_isset($i_phone);
		$i_address = get_isset($i_address);
		$i_date = get_isset($i_date);
		// $i_date = format_back_date($i_date);
		$i_hour = get_isset($i_hour);
		$i_pijat_id = get_isset($i_pijat_id);

		$data = " member_id = '$i_member_id',
				  phone = '$i_phone',
				  address = '$i_address',
				  date = '$i_date',
				  hour = '$i_hour',
				  pijat = '$i_pijat_id'
				";
		// var_dump($data);				
		update($data, $id);

		header("Location: reserved.php?page=list_backup&id=$id&did=2");
	break;

	case 'delete':

		$id = get_isset($_GET['id']);
		delete($id);
		header('Location: reserved.php?page=list_backup&did=3');

	break;
	
	case 'save_add_member':

	extract($_POST);

    $i_name = get_isset($i_name);
    $i_telepon = get_isset($i_telepon);
    $i_alamat = get_isset($i_alamat);
    $i_emails = get_isset($i_emails);

    $data_s = "'',
          '$i_name',
          '$i_telepon',
          '$i_alamat',
          '$i_emails'
      	";
    	create_config('members',$data_s);
    	var_dump($_POST);
    	// echo $data_s;
    header('location: reserved.php?page=list&id=');
	break;
	
	case 'get_member_details':
		$i_member_id = $_POST['i_member_id'];
		$where_member_id = "where member_id = '$i_member_id'";
		$q_member = select_config('members', $where_member_id);
		$r_member = mysql_fetch_array($q_member);
			$data = array(
							'member_id' => $r_member['member_id'], 
							'member_name' => $r_member['member_name'], 
							'member_alamat' => $r_member['member_alamat'],
							'member_phone' => $r_member['member_phone']  
							);
		echo json_encode($data);
	break;

	case 'edit_transaction':

		extract($_POST);

		$id = get_isset($_GET['id']);
		header("location: transaction.php?page=list&reserved_id=$id");	
	break;
}

?>