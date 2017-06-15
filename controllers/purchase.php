<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/purchase_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "form";
$title = ucfirst("Pembelian");

$_SESSION['menu_active'] = 7;

switch ($page) {
	case 'list':
		get_header($title);
		
		
		if($_SESSION['user_type_id']==1 || $_SESSION['user_type_id']==2){
			$where_branch = "";
		}else{
			$where_branch = " where a.branch_id = '".$_SESSION['branch_id']."' ";
		}
		
		$query = select($where_branch);
		$add_button = "purchase.php?page=form";

		include '../views/purchase/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "home.php";
		
		$query_supplier = select_supplier();
		$query_item = select_item();
		$query_branch = select_branch();
		$q_satuan = select_config('satuan','');

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			$row->purchase_date = format_date($row->purchase_date);
		
			$action = "purchase.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
	
			$row->purchase_date = format_date(date("Y-m-d"));
			$row->item_id = false;
			$row->purchase_price = false;
			$row->purchase_qty = false;
			$row->purchase_total = false;
			$row->supplier_id = false;
			$row->branch_id = false;
			$row->satuan_id = false;
			
			$action = "purchase.php?page=save";
		}

		include '../views/purchase/form.php';
		get_footer();
	break;

	case 'get_satuan_id':
		$item_id = $_POST['item_id'];
		//$q_satuan_item = select_satuan_item($item_id);
		$q_satuan_item = mysql_query("select * from satuan where satuan_id = 5");
		while ($r_satuan_item = mysql_fetch_array($q_satuan_item)) {
			$data[] = array(
							'item_satuan' => $r_satuan_item['item_satuan'], 
							'satuan_name' => $r_satuan_item['satuan_name']
							);
		}
		// // var_dump($data);
		echo json_encode($data);
		break;

	case 'save':
	
		extract($_POST);

		//print_r($_POST); exit();

		/*
		
    */

		$i_date = get_isset($i_date);
		$i_date = format_back_date($i_date);
		$i_item_id = get_isset($i_item_id);
		$i_harga = get_isset($i_harga);
		$i_qty = get_isset($i_qty);
		$i_total = get_isset($i_total);
		$i_supplier = get_isset($i_supplier);
		$i_branch_id = get_isset($i_branch_id);
		$i_satuan_id = get_isset($i_satuan_id);
		$get_item_name = get_item_name($i_item_id);
		$i_code = '2'.time();

		// echo $i_qty;
		$data = "'',
				 '$i_code',
				 '$i_date', 
				 '$i_item_id', 
				 '$i_qty',
				 '$i_harga',
				 '$i_total',
				 '$i_supplier',
				 '$i_branch_id',
				 '$i_satuan_id'
				";
			
			// echo $data;

			create($data);

			//input tabel stok_item
			$qcek = mysql_fetch_array(mysql_query("select stok_id, qty from stok_item where item_id = '$i_item_id' AND branch_id = '$i_branch_id'"));
			if(isset($qcek['stok_id'])) {
				$qtybr = $qcek['qty'] + $i_qty;
				mysql_query("UPDATE `stok_item` SET `qty` = '$qtybr' WHERE `stok_id` = '".$qcek['stok_id']."'");
			} else {
				mysql_query("INSERT INTO `stok_item`
				            (`stok_code`,
				             `date`,
				             `item_id`,
				             `qty`,
				             `satuan_id`,
				             `ket`,
				             `branch_id`)
				VALUES ('$i_code',
				        NOW(),
				        '$i_item_id',
				        '$i_qty',
				        '$i_satuan_id',
				        '+',
				        '$i_branch_id')");
			}
			
			
			$data_id = mysql_insert_id();
			$where_item_id_satuan_id = "where item_id = '$i_item_id' and item_satuan = '$i_satuan_id'";
			$i_qty = konversi_ke_satuan_utama_($i_item_id, $i_satuan_id, $i_qty);
			// echo $i_qty;
			$where_item_id_branch_id = "where item = '$i_item_id' and branch = '$i_branch_id'";
			$cek_stok = select_config_by('item_stocks', 'count(*)', $where_item_id_branch_id);

			if ($cek_stok > 0) {
					add_stock($i_item_id, $i_branch_id, $i_qty );
					echo "string";
			}
			else{	

				$data_i = "'',
						 '$i_item_id',
						 '$i_qty',
						 '$i_branch_id'
						";

					create_config('item_stocks', $data_i);
			}

		// simpan jurnal
		//create_journal($i_code, "purchase.php?page=form&id=", 2, $i_harga, $i_user_id, $i_branch_id);

			/*[i_date] => 04/06/2017
    [i_item_id] => 2
    [i_harga_currency] => 100.000
    [i_harga] => 1
    [i_qty] => 1
    [i_satuan_id] => 6
    [i_total] => 1
    [i_supplier] => 9
    [i_branch_id] => 6*/

    $harga = explode(".", $_POST['i_harga_currency']);
    $harganya = $harga[0].$harga[1];

		mysql_query("INSERT INTO `journals`
            (`journal_type_id`,
             `data_id`,
             `data_url`,
             `journal_debit`,
             `journal_credit`,
             `journal_piutang`,
             `journal_hutang`,
             `journal_date`,
             `journal_desc`,
             `bank_id`,
             `user_id`,
             `branch_id`)
VALUES ('2',
        '$i_code',
        'purchase.php?page=form&id=',
        '0',
        '$harganya',
        '0',
        '0',
        NOW(),
        '0',
        '0',
        '".$_SESSION['user_id']."',
        '$_POST[i_branch_id]')");

		unset($_SESSION['item_id']);
		header("Location: purchase.php?page=form&did=1");
		
		
	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: purchase.php?page=list&did=3');

	break;

	case 'save_pembelian':
		extract($_POST);
		break;
}

?>