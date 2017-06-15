<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/paket_pijat_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("paket pijat");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		$where ='';
		$query = select_config('paket_pijat', $where);
		$add_button = "paket_pijat.php?page=form";

		include '../views/paket_pijat/list.php';
		get_footer();
	break;

	case 'form':
		get_header($title);

		$close_button = "paket_pijat.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;

		if($id){
			$paket_pijat_id = $id;
			$row = read_id($id);
			$q_paket_pijat_details = select_paket_pijat_details($id);

			$action = "paket_pijat.php?page=edit&id=$id";
		} else {

			//inisialisasi
			$row = new stdClass();

			$row->paket_pijat_name = false;
			$row->paket_pijat_harga = false;

			$action = "paket_pijat.php?page=save";
		}

		include '../views/paket_pijat/form.php';
		get_footer();
	break;

	case 'save':
			extract($_POST);

			$i_name = get_isset($i_name);
			$i_harga = get_isset($i_harga);
			$data = "'',
						'$i_name',
						'$i_harga',
				";

				//echo $data;

			create($data);

			header("Location: paket_pijat.php?page=list&did=1");
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_harga = get_isset($i_harga);
		$data = "paket_pijat_name = '$i_name',
				 paket_pijat_harga = '$i_harga'

				";

		update($data, $id);

		header('Location: paket_pijat.php?page=list&did=2');
	break;

	case 'delete':
			$id = get_isset($_GET['id']);
			delete($id);
			header('Location: paket_pijat.php?page=list&did=3');
	break;

	case 'popmodal_add_pijat':

			$paket_pijat_id = (isset($_GET['paket_pijat_id'])) ? $_GET['paket_pijat_id'] : null;
			$paket_pijat_detail_id = (isset($_GET['paket_pijat_detail_id'])) ? $_GET['paket_pijat_detail_id'] : null;


			if ($paket_pijat_detail_id) {

				$action = "paket_pijat.php?page=edit_paket_pijat_detail";
				$where_paket_pijat_detail = "where paket_pijat_detail_id = '$paket_pijat_detail_id'";
				$row = select_object_config('paket_pijat_details',$where_paket_pijat_detail);

			} else {

				$row = new stdClass();

				$row->pijat_id = false;
				$row->pijat = false;

				$action = "paket_pijat.php?page=save_paket_pijat_detail";

			}

			$q_pijat = select_config('pijat', '');
			include '../views/paket_pijat/popmodal_add_pijat.php';

			break;

	case 'save_paket_pijat_detail':

		$paket_pijat_id = $_POST['paket_pijat_id'];
		$pijat_id = $_POST['pijat_id'];

		$data = "'',
						 '$paket_pijat_id',
						 '$pijat_id'";
		create_config('paket_pijat_details', $data);

		header("Location: paket_pijat.php?page=form&id=$paket_pijat_id");
		break;

	case 'edit_paket_pijat_detail':

		$paket_pijat_detail_id = $_POST['paket_pijat_detail_id'];
		$paket_pijat_id = $_POST['paket_pijat_id'];
		$pijat_id = $_POST['pijat_id'];

		$where_paket_pijat_detail_id = "paket_pijat_detail_id = '$paket_pijat_detail_id'";
		$data_update = "pijat = '$pijat_id'";

		update_config2('paket_pijat_details', $data_update, $where_paket_pijat_detail_id);

		header("Location: paket_pijat.php?page=form&id=$paket_pijat_id");
		// var_dump($_POST);
		break;

	case 'delete_paket_pijat_detail':

		$paket_pijat_detail_id = (isset($_GET['paket_pijat_detail_id'])) ? $_GET['paket_pijat_detail_id'] : null;
		$paket_pijat_id = $_GET['paket_pijat_id'];

		$where_paket_pijat_detail_id = "paket_pijat_detail_id = '$paket_pijat_detail_id'";
		delete_config('paket_pijat_details', $where_paket_pijat_detail_id);
		
		header("Location: paket_pijat.php?page=form&id=$paket_pijat_id");
		break;
}

?>
