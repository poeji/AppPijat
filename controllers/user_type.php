<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/user_type_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("user type");

$_SESSION['menu_active'] = 11;

switch ($page) {
	case 'list':
		get_header($title);

		$query = select();
		$add_button = "user_type.php?page=form";
		include '../views/user_type/list.php';
		get_footer();
	break;

	case 'form':
		get_header();

		$close_button = "user_type.php?page=list";
		$query_type = select_type();
		$query_branch = select_branch();

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);

			$action = "user_type.php?page=edit&id=$id";
		} else{

			//inisialisasi
			$row = new stdClass();
			//$get_code = get_user_type_code();

			$row->user_type_name = false;
			$row->user_type_id = '';


			$action = "user_type.php?page=save";
		}

		include '../views/user_type/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$i_name = get_isset($i_name);


				$data = "'',
					'$i_name'
			";

			//echo $i_name;

			$new_id = create($data);

			//echo $new_id;
			$query = read_side_menu();

            while($row = mysql_fetch_array($query)){

            	$value = '$permit'.$row['side_menu_id'];
            	$crud = $_POST['permit'.$row['side_menu_id']];
            	if(is_array($crud)){
					$crud_value = implode(',',$crud);
				}else{
					$crud_value = '';
				}

				//echo $crud_value;

				$user_type_id = $new_id;
				$side_menu_id = $row['side_menu_id'];
				if($row['side_menu_type_parent'] == 0){
					$permit_acces = 0;
				}else{
					$permit_acces = $crud_value;
				}

				$data_detail = "'',
						'$user_type_id',
						'$side_menu_id',
						'$permit_acces'";

						create_permit($data_detail);
            }

			header('Location: user_type.php?page=list&did=1');
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);

				$data = "'',
					'$i_name'
					";

		update($data, $id);

		$query = read_side_menu();
		while($row = mysql_fetch_array($query)){
				$value = '$permit'.$row['side_menu_id'];
				$crud = $_POST['permit'.$row['side_menu_id']];
				if(is_array($crud)){
					$crud_value = implode(',',$crud);
				}else{
					$crud_value = '';
			}

		$user_type_id = $id;
		$side_menu_id = $row['side_menu_id'];

		if($row['side_menu_type_parent'] == 0){
				$permit_acces = 0;
			}else{
				$permit_acces = $crud_value;
			}

		$data_detail = "'',
										'$user_type_id',
										'$side_menu_id',
										'$permit_acces'";
										create_permit($data_detail);
		}

		header('Location: user_type.php?page=list&did=2');

	break;

	case 'delete':

		$id = get_isset($_GET['id']);

		delete($id);

		header('Location: user_type.php?page=list&did=3');

	break;
}

?>
