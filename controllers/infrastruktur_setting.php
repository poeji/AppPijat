<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/infrastruktur_setting_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("infrastruktur");
$title2 = 'Bakmi Gili';
$_SESSION['menu_active'] = 6;

switch ($page) {
	case 'list':

		$first_ruangan_id = select_config_by('ruangan', 'min(ruangan_id)', '');
		$ruangan_id = (isset($_GET['ruangan_id'])) ? $_GET['ruangan_id'] : $first_ruangan_id;
		$where_ruangan_id = "WHERE ruangan_id = '$ruangan_id'";
		$building_name = select_config_by('ruangan', 'ruangan_name', $where_ruangan_id);
		$action_room = "infrastruktur_setting.php?page=save_room";
		$action_infrastruktur = "infrastruktur_setting.php?page=save_infrastruktur&ruangan=$ruangan_id";
		$q_infrastruktur = select_config('ruangan_infrastruktur', '');
		$q_infrastruktur_ = select_config('ruangan_infrastruktur', '');
		$q_infrastruktur__ = select_config('ruangan_infrastruktur', '');

		$action_logout = "logout.php";
		include '../views/infrastruktur_setting/list.php';
		//get_footer();
	break;

	case 'save_infrastruktur_location':

		$id			=	$_POST['ruangan_infrastruktur_id'];
		$data_x	=	$_POST['x'];
		$data_y	=	$_POST['y'];

		$data = "koordinat_x 	= '$data_x',
						 koordinat_y	= '$data_y'
						 ";

		$where_ruangan_infrastruktur_id = "ruangan_infrastruktur_id = '$id'";
		update_config2('ruangan_infrastruktur', $data, $where_ruangan_infrastruktur_id);

	break;

	case 'save_room':
		$room_name = $_POST['i_room_name'];
		$data = "'','".$room_name."'";
		save_room($data);
		header('location: infrastruktur_setting.php');
	break;

case 'save_infrastruktur':
	$ruangan_id = $_POST['ruangan_id'];
	$infrastruktur_id = $_POST['infrastruktur_id'];
	$inf_name = $_POST['inf_name'];
	$branch_id = $_SESSION['branch_id'];

	$data = "'',
					'$ruangan_id',
					'$branch_id',
					'$infrastruktur_id',
					'$inf_name',
					'',
					'',
					''
					";
	create_config('ruangan_infrastruktur', $data);
	$ruangan_infrastruktur_id = mysql_insert_id();
	echo json_encode($ruangan_infrastruktur_id);
	break;


case 'popmodal_add_infrastruktur':
	$ruangan_id = $_GET['ruangan_id'];
	$q_infrastruktur = select_config('infrastruktur', '');
	include '../views/infrastruktur_setting/popmodal_infrastruktur.php';
	break;

case 'get_img_infrastruktur':
	$infrastruktur_id = $_POST['infrastruktur_id'];
	$where_infrastruktur_id = "WHERE infrastruktur_id = '$infrastruktur_id'";
	$infrastruktur_img = select_config_by('infrastruktur', 'infrastruktur_img', $where_infrastruktur_id);
	echo json_encode($infrastruktur_img);
	break;

case 'popmodal_hapus_infrastruktur':
	$ruangan_id = $_GET['ruangan_id'];
	$where_ruangan_id = "WHERE ruangan = '$ruangan_id'";
	$where_ruangan_id_ = "WHERE ruangan_id = '$ruangan_id'";
	$action = "infrastruktur_setting.php?page=hapus_infrastruktur";
	$ruangan_name = select_config_by('ruangan', 'ruangan_name', $where_ruangan_id_);
	$q_infrastruktur = select_config('ruangan_infrastruktur', $where_ruangan_id);
	include '../views/infrastruktur_setting/popmodal_hapus_infrastruktur.php';
	break;

case 'hapus_infrastruktur':
	$ruangan_id = $_POST['ruangan_id'];
	$infrastruktur_id = $_POST['infrastruktur_id'];
	$where_ruangan_id_infrastruktur_id = "ruangan = '$ruangan_id' and ruangan_infrastruktur_id = '$infrastruktur_id'";
	echo $where_ruangan_id_infrastruktur_id;
	delete_config('ruangan_infrastruktur', $where_ruangan_id_infrastruktur_id);
	header("location:infrastruktur_setting.php?page=list&ruangan_id=$ruangan_id");
	break;
}

?>
