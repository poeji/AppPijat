<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/user_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("user");

$_SESSION['menu_active'] = 11;

switch ($page) {
	case 'list':
		get_header($title);

		$query = select();
		$add_button = "user.php?page=form";


		include '../views/user/list.php';
		get_footer();
	break;

	case 'form':
		get_header();

		$close_button = "user.php?page=list";
		$query_type = select_type();
		$query_branch = select_branch();
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){
			$row = read_id($id);
			$row->user_confirm_password = $row->user_password;
			$action = "user.php?page=edit&id=$id";
		} else{
			//inisialisasi
			$row = new stdClass();
			//$get_code = get_user_code();
			$row->user_code = false;
			$row->user_type_id = false;
			$row->user_name = false;
			$row->user_phone = false;
			$row->user_password = false;
			$row->user_login = false;
			$row->user_confirm_password = false;
			$row->branch_id = false;
			$action = "user.php?page=save";
		}
		include '../views/user/form.php';
		get_footer();
	break;

	case 'save':



		extract($_POST);

		$i_type = get_isset($i_type);
		$i_branch_id = get_isset($i_branch_id);
		$i_login = get_isset($i_login);
		$i_password = get_isset($i_password);
		$i_confirm_password = get_isset($i_confirm_password);
		$i_name = get_isset($i_name);
		$i_code = get_isset($i_code);
		$i_phone = get_isset($i_phone);

		$path = "../img/user/";
		$i_img_tmp = $_FILES['i_img']['tmp_name'];
		$i_img = ($_FILES['i_img']['name']) ? time()."_".$_FILES['i_img']['name'] : "";

		$cek_i_login = cek_name_login($i_login);

		if($cek_i_login >= '1'){
			header("Location: user.php?page=form&err=2");

		}else{

			if($i_password != $i_confirm_password){

				header('Location: user.php?page=form&err=1');

			}else{

				$i_password = md5($i_password);

				$data = "'',
					'$i_type',
					'$i_login',
					'$i_password',
					'$i_name',
					'$i_code',
					'$i_phone',
					'$i_img',
					'1',
					'$i_branch_id'
			";

			//echo $data;

			create($data);
			if($i_img){
				move_uploaded_file($i_img_tmp, $path.$i_img);
			}

			header('Location: user.php?page=list&did=1');
		}
		}
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_type = get_isset($i_type);
		$i_branch_id = get_isset($i_branch_id);
		$i_login = get_isset($i_login);
		$i_password = get_isset($i_password);
		$i_name = get_isset($i_name);
		$i_code = '';
		$i_phone = get_isset($i_phone);
		$i_city_id = '';

		$path = "../img/user/";
		$i_img_tmp = $_FILES['i_img']['tmp_name'];
		$i_img = ($_FILES['i_img']['name']) ? $_FILES['i_img']['name'] : "";

		if($i_password != $i_confirm_password){

			header("Location: user.php?page=form&id=$id&err=1");

		}else{

			$i_password = md5($i_password);
			if($i_img){

				if($i_img){
				if(move_uploaded_file($i_img_tmp, $path.$i_img)){
					unlink("../img/user/" . $row[gambar]);

					$data = " user_login = '$i_login',
										user_type_id = '$i_type',
										user_name = '$i_name',
										user_code = '$i_code',
										user_phone = '$i_phone',
										user_img = '$i_img',
										branch_id = '$i_branch_id'

			";
					};
			}

			}else{
				$data = " user_login = '$i_login',
									user_type_id = '$i_type',
									user_name = '$i_name',
									user_code = '$i_code',
									user_phone = '$i_phone',
									branch_id = '$i_branch_id'
									";
			}
			$where_user_id = "user_id = '$id'";
			update_config2('users', $data, $where_user_id);
			header('Location: user.php?page=list&did=2');

		}

	break;

	case 'delete':

		$id = get_isset($_GET['id']);

		delete($id);

		header('Location: user.php?page=list&did=3');

	break;
}

?>
