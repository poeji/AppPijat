<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/send_data_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Order");
$judul = 'Bakmi Gili';
$_SESSION['menu_active'] = 2;

switch ($page) {
	case 'list':

    $transaction_code = $_GET['transaction_code'];
    $branch_id = $_GET['branch_id'];
    $transaction_date = format_date_only($_GET['transaction_date']);
    $transaction_date = format_back_date($transaction_date);

    $where_transaction_code = "WHERE transaction_code = '$transaction_code'";

    $jml_orang = select_config_by('transactions', 'jml_orang',$where_transaction_code)||1;
    $transaction_id = select_config_by('transactions', 'transaction_id',$where_transaction_code);
    $table_id = select_config_by('transactions', 'table_id',$where_transaction_code);

    $where_transaction_id = "WHERE transaction_id = '$transaction_id'";
    $q_transaction_details = select_config('transaction_details', $where_transaction_id);

    $grand_total = select_config_by('transactions', 'transaction_grand_total',$where_transaction_code);

    $per_kepala = $grand_total/$jml_orang;

    $no = 1;
    $jml_menu_ = 0;
    while ($r_transaction_details = mysql_fetch_array($q_transaction_details)) {
        $menu_id[$no] = $r_transaction_details['menu_id'];
        $where_menu_id[$no]  = "WHERE menu_id = '".$menu_id[$no]."'";
        $menu_original_price[$no] = select_config_by('menus', 'menu_original_price',$where_menu_id[$no]);
        $menu_margin_price[$no] = select_config_by('menus', 'menu_margin_price',$where_menu_id[$no]);
        $menu_price[$no] = select_config_by('menus', 'menu_price',$where_menu_id[$no]);
        $and_transaction_id = " and transaction_id = '$transaction_id'";
        $jml_menu[$no] = select_config_by('transaction_details', 'sum(transaction_detail_qty)',$where_menu_id[$no].$and_transaction_id);
        $menu_kategori[$no] = select_config_by('menus', 'menu_kategori',$where_menu_id[$no]);
    $no++;
  }
    $jml_menu_all = $jml_menu_;
    $strtime = strtotime($transaction_date);
    $jam     = date("h:m", $strtime);


    $flag_code = "flag_code = 1";
    update_config('transactions', $flag_code, $where_transaction_code);

    include '../views/send_data/send_transaction.php';

  break;

  case 'send_data':

    $transaction_code = $_POST['transaction_code'];
    $branch_id = $_POST['branch_id'];
    $data = "'',
             '$transaction_code',
             '$branch_id'";
    $where_transaction_code = "WHERE transaction_code = '$transaction_code'";
    $flag_code = "flag_code = 1";
    update_config('transactions', $flag_code, $where_transaction_code);
    // $con_C_trans = mysql_connect("http://bakmigili.com","thebakmi_report",",qI!3c,.}h(c");
    // $db_1 = mysql_select_db("thebakmi_posreport", $con_C_trans);

    // create_config('table_test_sync', $data, $db_1);

    break;
}
