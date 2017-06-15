<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/konversi_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Konversi");

$_SESSION['menu_active'] = 2;
$_SESSION['sub_menu_active'] = 46;
$permit = get_akses_permits($_SESSION['user_type_id'],$_SESSION['sub_menu_active']);
switch ($page) {
  case 'list':
    get_header($title);
    $query = select();
    $query_konversi = select_konversi();
    $add_button = "Konversi.php?page=popmodal";
    include '../views/Konversi/konversi.php';
    get_footer();
    break;

  case 'form':
    get_header();
    $close_button = "home.php";
    $id = (isset($_GET['id'])) ? $_GET['id'] : null;
    $where_satuan_id = "WHERE konversi_id = '$id'";
    if($id){
      $row = read_id($id);
      $action = "konversi.php?page=edit&id=$id";
      } else{
      //inisialisasi
      $row = new stdClass();
      $row->konversi_id = false;
      $row->konversi_name = false;
      }
      include '../views/konversi/konversi.php';
      get_footer();
    break;

  case 'pop_modal_konversi':
      $close_button = "Konversi.php";
      $satuan_id  = $_GET['satuan_id'];
      $where_satuan_id = "WHERE satuan_id = '$satuan_id'";
      $satuan_name = select_config_by('satuan', 'satuan_name', $where_satuan_id);
      $query_konversi = select_satuan($satuan_id);
      $action = "konversi.php?page=save_konversi";
      
      include '../views/konversi/pop_modal_konversi.php';
    break;

    case 'save_konversi':
    extract($_POST);

    $satuan_id = get_isset($satuan_id);
    $jumlah = get_isset($jumlah);
    $satuan = get_isset($satuan);
    $jumlah_satuan = get_isset($jumlah_satuan);

    $data = "'',
          '$satuan_id',
          '$jumlah',
          '$satuan',
          '$jumlah_satuan'
      ";
    create_config('konversi',$data);
    $konversi_id = mysql_insert_id();
    header("location:konversi.php");
      break;

    case 'delete':
    // $id = get_isset($_GET['id']);
    // $where_satuan_id = "satuan_id = '$id'";    
    // delete_config('satuan', $where_satuan_id);
    // header('Location: satuan.php?page=list&did=3');
    break;

  case 'edit':

    // extract($_POST);

    // $id = get_isset($_GET['id']);
    // $satuan_name = get_isset($satuan_name);
    // $data = " satuan_name = '$satuan_name'";
    // update_satuan($data,$id);

    // header("Location: satuan.php?page=list&did=2");
    break;
}

 ?>
