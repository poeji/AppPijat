<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/infrastruktur_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Infrastruktur");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);

		$query = select();
		$add_button = "infrastruktur.php?page=form";

		include '../views/infrastruktur/list.php';
		get_footer();
	break;

	case 'form':
		get_header();

		$close_button = "infrastruktur.php?page=list";
		$query_branch = select_branch();

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);

			$action = "infrastruktur.php?page=edit&id=$id";
		} else{

			//inisialisasi
			$row = new stdClass();

			$row->infrastruktur_name = false;
			$row->infrastruktur_warna = false;
			$row->infrastruktur_img = false;

			$action = "infrastruktur.php?page=save";
		}

		include '../views/infrastruktur/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$i_name 	= get_isset($i_name);
		$i_warna 	= get_isset($i_warna);

		$path 		= "../img/infrastruktur/";
		$i_img_tmp = $_FILES['i_img']['tmp_name'];
		$i_img = ($_FILES['i_img']['name']) ? $_FILES['i_img']['name'] : "";
		$i_img = str_replace(" ","",$i_img);

		$date = ($_FILES['i_img']['name']) ? time()."_" : "";

		$data = "'',
		      '$i_name',
		      '$i_warna',
		      '".$date.$i_img."'
		  		";

			if($i_img){
				move_uploaded_file($i_img_tmp, $path.$i_img);
			}

			create($data);

			header("Location: infrastruktur.php?page=list&did=1");


	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_warna = get_isset($i_warna);

		$path = "../img/infrastruktur/";
		$i_img_tmp = $_FILES['i_img']['tmp_name'];
		$i_img = ($_FILES['i_img']['name']) ? $_FILES['i_img']['name'] : "";
		$i_img = str_replace(" ","",$i_img);

		$date = ($_FILES['i_img']['name']) ? time()."_" : "";

			if($i_img){
				if(move_uploaded_file($i_img_tmp, $path.$date.$i_img)){
					$get_img_old = get_img_old($id);
					if(file_exists($path.$get_img_old)){
						unlink($path.$get_img_old);
					}
					$data = "infrastruktur_name = '$i_name',
								infrastruktur_warna = '$i_warna',
								infrastruktur_img = '$date$i_img'
								";
				}

			}else{
				$data 	= "infrastruktur_name = '$i_name',
							infrastruktur_warna = '$i_warna'
							";
			}
		//echo $data;
		update($data, $id);
		header("Location: infrastruktur.php?page=list&did=2");
	break;

	case 'delete':

		$id = get_isset($_GET['id']);

		$path = "../img/building/";

		$get_img_old = get_img_old($id);
					if(file_exists($path.$get_img_old)){
						unlink($path.$get_img_old);
					}


		delete($id);

		header("Location: infrastruktur.php?page=list&did=3");

	break;
}

?>
