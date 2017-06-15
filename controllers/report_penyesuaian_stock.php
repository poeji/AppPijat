<?php

include '../lib/config.php';
include '../lib/function.php';
include '../models/report_penyesuaian_stock_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Laporan penyesuaian stock");

$_SESSION['menu_active'] = 5;
$s_cabang = $_SESSION['branch_id'];

switch ($page) {
  case 'list':
  get_header();
  $query = select($s_cabang);
  include '../views/report_penyesuaian_stock/report_penyesuaian_stock_list.php';
  get_footer();
    break;
}
 ?>
