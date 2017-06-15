<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/penyesuaian_stock_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("penyesuaian STOCK");

$_SESSION['menu_active'] = 1;
$s_cabang = $_SESSION['branch_id'];
$branch_active = get_branch($s_cabang);

switch ($page) {
  case 'list':
  get_header($title);
	$where_branch = " where a.branch_id = '".$_SESSION['branch_id']."' ";
  $query = select($where_branch);
  include '../views/penyesuaian_stock/penyesuaian_stock_list.php';
  get_footer();
    break;
    case 'form':
  		get_header($title);
  		$close_button = "penyesuaian_stock.php?page=list";
  		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
      $branch_id = (isset($_GET['branch_id'])) ? $_GET['branch_id'] : null;
      $row = read_id($id,$branch_id);
      $action = "penyesuaian_stock.php?page=edit";
  		include '../views/penyesuaian_stock/penyesuaian_stock_form.php';
  		get_footer();
  		break;

	case 'delete':
		$id = get_isset($_GET['id']);
    $branch_id = get_isset($_GET['branch_id']);
		delete($id,$branch_id);
		header('Location: penyesuaian_stock.php?page=list&did=3');
		break;

  case 'edit':
    $item_id = $_POST['i_item_id'];
    $i_branch_id = $_POST['i_branch_id'];
    $i_item_qty_lama = $_POST['item_qty_lama'];
    $i_item_selisih = $_POST['edit_item_qty'];
    $i_item_qty_baru = $_POST['item_qty_baru'];
    $tanggal = date("Y-m-d h:m:s");
      $data_penyesuaian = "'',
                          '".$_SESSION['user_id']."',
                          '$i_branch_id',
                          '$tanggal',
                          '$item_id',
                          '$i_item_qty_lama',
                          '$i_item_selisih'
                          ";
    create_config("penyesuaian_stock_cabang",$data_penyesuaian);
    update_stok($i_item_qty_baru, $i_branch_id, $item_id);
		header('Location: penyesuaian_stock.php?page=list&id=3');
		break;

}


?>
