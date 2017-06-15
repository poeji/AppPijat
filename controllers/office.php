<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/office_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("OFFICE ID");

$_SESSION['menu_active'] = 7;
$_SESSION['sub_menu_active'] = 18;
$permit = get_akses_permits($_SESSION['user_type_id'],$_SESSION['sub_menu_active']);
switch ($page) {
  case 'list':
    get_header();
    $id=1;
    $row = read($id);
    $action = "office.php?page=form&id=$id";
    include '../views/office/office_list.php';
    get_footer();
    break;

  case 'form':
    get_header($title);
    $id = (isset($_GET['id'])) ? $_GET['id'] : null;
    $close_button="office.php?page=list";
    $query = select();
    if($query!=false){
        $row = read($id);
        $action = "office.php?page=edit&id=$id";
    }else {
      $id=1;
      $row = new stdClass();
      $row->office_name = false;
      $row->office_address = false;
      $row->office_city = false;
      $row->office_phone = false;
      $row->office_email = false;
      $row->office_desc = false;
      $row->office_img = false;
      $row->office_owner = false;
      $row->office_owner_phone = false;
      $row->office_owner_address = false;
      $row->office_owner_email = false;
      $action = "office.php?page=save&id=$id";
    }
    $add_button = "office.php?page=form";
    include '../views/office/office_form.php';
    get_footer();
    break;

  case 'save':
    extract($_POST);
    $id = get_isset($_GET['id']);
    $i_name = get_isset($i_name);
    $i_telp = get_isset($i_telp);
    $i_email = get_isset($i_email);
    $i_alamat = get_isset($i_alamat);
    $i_city = get_isset($i_city);
    $i_desc = get_isset($i_desc);
    $i_cabang_id = get_isset($i_cabang_id);

    $i_name_owner = get_isset($i_name_owner);
    $i_phone_owner = get_isset($i_phone_owner);
    $i_alamat_pemilik = get_isset($i_alamat_pemilik);
    $i_email_pemilik = get_isset($i_email_pemilik);

    $path = "../img/office/";
		$i_img_tmp = $_FILES['i_img']['tmp_name'];
		$i_img = ($_FILES['i_img']['name']) ? time()."_".$_FILES['i_img']['name'] : "";
    $data = "'$id',
          '$i_name',
          '$i_img',
          '$i_desc',
          '$i_alamat',
          '$i_telp',
          '$i_email',
          '$i_city',
          '$i_name_owner',
          '$i_phone_owner',
          '$i_alamat_pemilik',
          '$i_email_pemilik'
      ";
      // var_dump($data);
      if($i_img){
				move_uploaded_file($i_img_tmp, $path.$i_img);
			}
      $_SESSION['branch_id'] = $i_cabang_id;
      $s_cabang = $_SESSION['branch_id'];
      var_dump($s_cabang);
      create($data);
      header("Location: office.php?page=list&did=1");
    break;

  case 'edit':

    extract($_POST);
    $id = get_isset($_GET['id']);
    // var_dump($_POST);
    $i_name = get_isset($i_name);
    $i_telp = get_isset($i_telp);
    $i_email = get_isset($i_email);
    $i_alamat = get_isset($i_alamat);
    $i_city = get_isset($i_city);
    $i_desc = get_isset($i_desc);

    $i_name_owner = get_isset($i_name_owner);
    $i_phone_owner = get_isset($i_phone_owner);
    $i_alamat_pemilik = get_isset($i_alamat_pemilik);
    $i_email_pemilik = get_isset($i_email_pemilik);

    $path = "../img/office/";
		$i_img_tmp = $_FILES['i_img']['tmp_name'];
		$i_img = ($_FILES['i_img']['name']) ? time()."_".$_FILES['i_img']['name'] : "";
    if($i_img){
      if($i_img){
        if(move_uploaded_file($i_img_tmp, $path.$i_img)){
          $get_img_old = get_img_old($id);
          if($get_img_old){
            if(file_exists($path.$get_img_old)){
              unlink($path . $get_img_old);
              }
            }
            $data = "
                      office_name = '$i_name',
                      office_img = '$i_img',
                      office_desc = '$i_desc',
                      office_address = '$i_alamat',
                      office_phone = '$i_telp',
                      office_email = '$i_email',
                      office_city = '$i_city',
                      office_owner = '$i_name_owner',
                      office_owner_phone = '$i_phone_owner',
                      office_owner_address = '$i_alamat_pemilik',
                      office_owner_email =  '$i_email_pemilik'
            ";
              }
          }
        }else {
            $data = "
                    office_name = '$i_name',
                    office_desc = '$i_desc',
                    office_address = '$i_alamat',
                    office_phone = '$i_telp',
                    office_email = '$i_email',
                    office_city = '$i_city',
                    office_owner = '$i_name_owner',
                    office_owner_phone = '$i_phone_owner',
                    office_owner_address = '$i_alamat_pemilik',
                    office_owner_email =  '$i_email_pemilik'
            ";
      }
      // if (isset($_SESSION['branch_id']) && $_SESSION['branch_id']==true) {
      //   $_SESSION['branch_id'] = $i_cabang_id;
      // 	$s_cabang= $_SESSION['branch_id'];
      // }else {
      //   $_SESSION['branch_id']=1;
      // 	$s_cabang = $_SESSION['branch_id'];
      // }
      $_SESSION['branch_id'] = $i_cabang_id;
      $s_cabang = $_SESSION['branch_id'];
      //var_dump($s_cabang);
    update($data, $id);
    header('Location: office.php?page=list&did=2');
    break;
}
 ?>
