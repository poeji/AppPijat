<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/item_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("item");

$_SESSION['menu_active'] = 2;
$_SESSION['sub_menu_active'] = 10;
$cabang = $_SESSION['branch_id'];
$permit = get_akses_permits($_SESSION['user_type_id'],$_SESSION['sub_menu_active']);

switch ($page) {
	case 'list':
		get_header($title);

		$query = select();
		$q_satuan = select_config('satuan','');
		$add_button = "item.php?page=form";

		include '../views/item/list.php';
		get_footer();
	break;

	case 'form':
		get_header();

		$close_button = "item.php?page=list";

		$q_satuan = select_config('satuan', '');

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			$where_item_id = "where item_id = '$id'";
			$row = select_object_config('item', $where_item_id);
			$q_tabel_konversi = select_tabel_konversi($id);
			$action = "item.php?page=edit&id=$id";
		} else{

			//inisialisasi
			$row = new stdClass();

			$row->item_name = false;
			$row->item_hpp = false;
			$row->item_margin = false;
			$row->item_harga_jual = false;
			$row->item_limit = false;
			$row->item_satuan = false;

			$action = "item.php?page=save";
		}

		include '../views/item/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$i_name = get_isset($i_name);
		$i_hpp = get_isset($i_hpp);
		$i_margin = get_isset($i_margin);
		$i_jual = get_isset($i_jual);
		$i_limit = get_isset($i_limit);
		$i_satuan = get_isset($i_satuan);

		$data = "'',
					'$i_name',
					'$i_hpp',
					'$i_margin',
					'$i_jual',
					'$i_limit',
					'$i_satuan'
			";
			create_config('item',$data);
			// echo $data;
			header("Location: item.php?page=list&did=1");
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_hpp = get_isset($i_hpp);
		$i_margin = get_isset($i_margin);
		$i_jual = get_isset($i_jual);
		$i_limit = get_isset($i_limit);
		$i_satuan = get_isset($i_satuan);

					$data = " item_name = '$i_name',
							  item_hpp = '$i_hpp',
							  item_margin = '$i_margin',
							  item_harga_jual = '$i_jual',
							  item_limit = '$i_limit',
							  item_Satuan = '$i_satuan'
					";		
			update($data, $id);
			// echo $data;
			header('Location: item.php?page=list&did=2');

	break;

	case 'delete':

		$id = get_isset($_GET['id']);

		delete($id);

		header('Location: item.php?page=list&did=3');

	break;

	case 'delete_konversi':
		$id  = $_GET['item_id'];
		$konversi_id = get_isset($_GET['id']);
		$where_konversi_id = "konversi_id = '$konversi_id'";

		delete_config('konversi_item', $where_konversi_id);
		header("location: item.php?page=form&id=$id");
		break;

		case 'pop_modal_konversi':
		$id  = $_GET['id'];
		$close_button = "item.php?page=form&id=$id";
		$where_item_id = "WHERE item_id = '$id'";
		$satuan = select_config_by('item', 'item_satuan', $where_item_id);
		$konversi_id = (isset($_GET['konversi_id'])) ? $_GET['konversi_id'] : null;

		$and_satuan_konversi = "";

		if ($konversi_id!=null) {
			$where_konversi_id = "where konversi_id = '$konversi_id'";
			$row = select_object_config('konversi_item', $where_konversi_id);

			$and_satuan_konversi = " and satuan_id ='$row->satuan_konversi'";

			$action = "item.php?page=edit_konversi&id=$konversi_id";
		} else {
				$row = new stdClass();

			// $row->satuan = false;
			$row->jumlah = false;
			$row->satuan_konversi = false;
			$row->jumlah_satuan_konversi = false;
			$action = "item.php?page=save_konversi";
		}	

		$where_item_id = "WHERE item_id = '$id'";
     	$item_name = select_config_by('item', 'item_name', $where_item_id);
      	$where_satuan_id = "WHERE satuan_id = '$satuan'";
      	$satuan_name = select_config_by('satuan', 'satuan_name', $where_satuan_id);
      	$q_satuan = select_config('satuan','');

      	$where_satuan_yang_sudah_dipilih = "where satuan_id != '$satuan'";
      	$and_satuan_yang_sudah_dipilih = "";
      	$q_satuan_yang_sudah_dipilih = select_config('konversi_item', $where_item_id);

     
      	while ($r_satuan_yang_sudah_dipilih = mysql_fetch_array($q_satuan_yang_sudah_dipilih)) {

      		$satuan_konversi_yg_sudah_dipilih = $r_satuan_yang_sudah_dipilih['satuan_konversi'];

      		if ($satuan_konversi_yg_sudah_dipilih != null && $satuan_konversi_yg_sudah_dipilih != $row->satuan_konversi) {
      			$and_satuan_yang_sudah_dipilih = " and satuan_id != '$satuan_konversi_yg_sudah_dipilih'";      		
      			$where_satuan_yang_sudah_dipilih = $where_satuan_yang_sudah_dipilih.$and_satuan_yang_sudah_dipilih;
      		}

      	}


      	$q_konversi = select_konversi($where_satuan_yang_sudah_dipilih);

      	include '../views/item/pop_modal_konversi.php';
		break;

		case 'save_konversi':

		$id  = $_POST['item_id'];

		extract($_POST);
		$item_id = get_isset($item_id);
		$satuan = get_isset($satuan);
		$qty_utama = get_isset($qty_utama);
		$satuan_konversi = get_isset($satuan_konversi);
		$qty_konversi = get_isset($qty_konversi);

		$data = "'',
				 '$item_id',
				 '$satuan',
				 '$qty_utama',
				 '$satuan_konversi',
				 '$qty_konversi'
				";
		var_dump($_POST);
		create_config('konversi_item', $data);
		// echo $data;
		header("location: item.php?page=form&id=$id");
		break;

		case 'edit_konversi':
		$id  = $_POST['item_id'];
		
		extract($_POST);
			$konversi_id = get_isset($_GET['id']);
			$item_id = get_isset($item_id);
			$satuan = get_isset($satuan);
			$qty_utama = get_isset($qty_utama);
			$satuan_konversi = get_isset($satuan_konversi);
			$qty_konversi = get_isset($qty_konversi);

			$data = "
					 item_id = '$item_id',
					 satuan_utama = '$satuan',
					 jumlah = '$qty_utama',
					 satuan_konversi = '$satuan_konversi',
					 jumlah_satuan_konversi = '$qty_konversi'
					";
		var_dump($data);
		$where_konversi_id = "konversi_id = '$konversi_id'";	
		update_config2("konversi_item", $data, $where_konversi_id);
		header("location: item.php?page=form&id=$id");
		break;
}

?>
