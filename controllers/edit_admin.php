<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/edit_admin_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "form";
$title = ucfirst("admin");

switch ($page) {
	 
	
	case 'form':
		get_header();
		if($_SESSION['user_type_id'] == 1 || $_SESSION['user_type_id'] == 3){
				$close_button="transaction.php?page=list";
			}else{
				$close_button="report_detail.php?page=list";
			}
		

		$id = $_SESSION['user_id'];
		if($id){

			$row = read_id($id);
			
			//log_data(1, 0, $_SESSION['user_id'],  "edit admin");
			//$row->user_birth_date = format_date($row->user_birth_date);
			$row->user_confirm_password = $row->user_password;


			$action = "edit_admin.php?page=edit&id=$id";
		}

		include '../views/edit_admin/form.php';
		get_footer();
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_login = get_isset($i_login);
		$i_password = get_isset($i_password);
		$i_confirm_password = get_isset($i_confirm_password);
		$i_name = get_isset($i_name);
		$i_phone = get_isset($i_phone);
	

	
		$path = "../img/user/";
		$i_img_tmp = $_FILES['i_img']['tmp_name'];
		$i_img = ($_FILES['i_img']['name']) ? $_FILES['i_img']['name'] : "";
		
		$cek_i_login = cek_name_login($i_login,$id);

		if($cek_i_login >= '1'){
			header("Location: edit_admin.php?page=form&id=$id&err=2");
		
		}else{
		
				if($i_password != $i_confirm_password){
					
					echo"<script> window.location='edit_admin.php?page=form&did=1'</script>";
				}else{
					$i_password = md5($i_password);
					
					
					mysql_query("UPDATE users SET user_password='".$i_password."' where user_id = '".$id."'");
				}
				if($i_img){
					$data = " user_login = '$i_login', 
						 	user_name = '$i_name',
						 	user_phone = '$i_phone',
						 	user_img = '$path$i_img'";
				}else{
					$data = " user_login = '$i_login', 
								user_name = '$i_name',
								user_phone = '$i_phone'
						";
						
			}

			//echo $data;
			update($data, $id);
			//log_data(3, $id, $_SESSION['user_id'],  "edit admin");
			if($i_img){
				move_uploaded_file($i_img_tmp, $path.$i_img);
			}
		
			
		
		}
	header('Location: edit_admin.php?page=form&did=2');

	break;
}

?>