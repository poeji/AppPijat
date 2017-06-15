<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/order_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Order");

$_SESSION['menu_active'] = 2;

switch ($page) {
	case 'list':

		$where_branch = "";
		if($_SESSION['user_type_id']==3 || $_SESSION['user_type_id']==4 || $_SESSION['user_type_id']==5){
			$where_branch = " where branch_id = '".$_SESSION['branch_id']."' ";
			$branch_id = $_SESSION['branch_id'];
		}else{
			$first_branch_id = get_first_branch_id();
			$branch_id = (isset($_GET['branch_id'])) ? $_GET['branch_id'] : $first_branch_id;
		}
		$first_building_id = get_first_building_id($branch_id);
		$building_id = (isset($_GET['building_id'])) ? $_GET['building_id'] : $first_building_id;
		$branch_name = get_branch_name($branch_id);
		$building_name = get_building_name($building_id);
		$building_img = get_building_img($building_id);
		//get_header2($title);
		//$query = select();
		$action_room = "order.php?page=save_room";
		$action_table = "order.php?page=save_table&building_id=$building_id";
		$action_logout = "logout.php";
		$action2 = "order.php?page=switch_table";
		//$building_next();
		//$building_prev();
		include '../views/order/list.php';
		//get_footer();
	break;

	case 'save_table_location':

		$id=$_GET['id'];
		$data_x=$_GET['data_x'];
		$data_y=$_GET['data_y'];

		save_table_location($id, $data_x, $data_y);


	break;

	case 'save_room':
		$room_name = $_POST['i_room_name'];
		$data = "'','".$room_name."'";
		save_room($data);
		header('location: order.php');
	break;

	case 'save_table':
		$building_id = $_GET['building_id'];
		$table_name = $_POST['i_table_name'];
		$data = "'',
				'$building_id',
				'".$table_name."',
				'200',
				'200'
				";
		save_table($data);
		header("location: order.php?building_id=$building_id");
	break;

	case 'save_payment':

		$i_payment = $_POST['i_payment'];
		$i_change = $_POST['i_change'];
		$i_discount = $_POST['i_discount'];
		$i_grand_total = $_POST['i_grand_total'];
		$i_payment_method = $_POST['i_payment_method'];
		$i_totaltax = "";
		$i_disc_nominal = $_POST['i_disc_nominal'];
		$i_disc_member = $_POST['i_disk2'];
		$i_bank_id = "";
		$i_bank_account = "";
		if($i_payment_method == 2 || $i_payment_method == 3){
			$i_bank_id  = $_POST['i_bank_id'];
			$i_bank_account  = $_POST['i_bank_account'];
		}
		$building_id = $_GET['building_id'];
		$table_id = $_GET['table_id'];
		$branch_id = get_branch_id($building_id);
		$data_total = get_data_total($table_id);
		$total_discount = get_total_discount($table_id);
		//echo $total_discount;
		update_table_status($table_id);
		if($i_payment < $i_grand_total){
			header("location: payment.php?table_id=$table_id&building_id=$building_id&err=1");
		}else{
		$query =  mysql_query("select *
								from transactions_tmp a
								where a.table_id = '$table_id'
								");
		// simpan transaksi
		while($row = mysql_fetch_array($query)){

			// create settlement
			$get_discount_type = get_discount_type($row['member_id']);
			if($total_discount > 0 && $get_discount_type == 2){
				update_settlement($total_discount, $row['member_id']);
			}

			$data = "'',
					'$table_id',
					'$branch_id',
					'".$row['member_id']."',
					'".$row['transaction_date']."',
					'".$data_total."',
					'".$i_discount."',
					'".$i_disc_member."',
					'".$i_grand_total."',
					'".$i_payment."',
					'".$i_change."',
					'".$i_disc_nominal."',
					'".$i_payment_method."',
					'".$i_bank_id."',
					'".$row['user_id']."',
					'".$i_bank_account."',
					'".$i_totaltax."',
					'".$row['transaction_code']."',
                                         0   

			";
			// simpan transaksi
			create_config("transactions", $data);
			$transaction_id = mysql_insert_id();
			$get_table_name = get_table_name($table_id);
			// simpan jurnal
			create_journal($transaction_id, "", 1, $i_grand_total, "Meja ".$get_table_name, $i_bank_id, $branch_id);

			$query_detail =  mysql_query("select *
								from transaction_tmp_details a
								where a.transaction_id = '".$row['transaction_id']."'
								");
			while($row_detail = mysql_fetch_array($query_detail)){

				// simpan transaksi detail
				$data_detail = "'',
									'$transaction_id',
									'".$row_detail['menu_id']."',
									'".$row_detail['transaction_detail_original_price']."',
									'".$row_detail['transaction_detail_margin_price']."',
									'".$row_detail['transaction_detail_price']."',
									'".$row_detail['transaction_detail_price_discount']."',
									'".$row_detail['transaction_detail_grand_price']."',
									'".$row_detail['transaction_detail_qty']."',
									'".$row_detail['transaction_detail_total']."'
									";
					create_config("transaction_details", $data_detail);

					$query_item =  mysql_query("select *
								from menu_recipes a
								where a.menu_id = '".$row_detail['menu_id']."'
								");
					while($row_item = mysql_fetch_array($query_item)){
						// update stok bahan
						$new_stock = $row_detail['transaction_detail_qty'] * $row_item['item_qty'];
							update_stock($branch_id, $row_item['item_id'], $new_stock);
					}

			}

			// hapus tmp
			delete_tmp($table_id);
			// hapus widget_tmp
			delete_widget_tmp_details($table_id);
			delete_widget_tmp($table_id);
		}

		//include '../views/order/print.php';

		header("location: print.php?transaction_id=$transaction_id");
		}


	break;

	case 'cancel_order':
		$table_id = $_GET['table_id'];
		$building_id = $_GET['building_id'];
		$query_bill = mysql_query("select * from transaction_bills where table_id = '$table_id'");
		$print_bill = mysql_fetch_array($query_bill);
		// if($print_bill){
		// 	$branch_id = get_branch_id($building_id);
		// 	$data_total = get_data_total($table_id);
		// 	$total_discount = get_total_discount($table_id);
		// 	$data = "'',
		// 			'$table_id',
		// 			'$branch_id',
		// 			'".$print_bill['member_id']."',
		// 			'".$print_bill['transaction_date']."',
		// 			'".$data_total."',
		// 			'0',
		// 			'".$data_total."',
		// 			'".$data_total."',
		// 			'0',
		// 			'0',
		// 			'0',
		// 			'".$print_bill['user_id']."',
		// 			'0',
		// 			'".$print_bill['transaction_code']."'
		// 	";
		// 	// simpan transaksi
		// 	create_config("transactions", $data);
		// 	$transaction_id = mysql_insert_id();
		// 	$get_table_name = get_table_name($table_id);
		// 	// simpan jurnal
		// 	create_journal($transaction_id, "", 1, $data_total, "Meja ".$get_table_name, "0", $branch_id);
		// 	$query_detail =  mysql_query("select *
		// 						from transaction_tmp_details a
		// 						where a.transaction_id = '".$print_bill['transaction_id']."'
		// 						");
		// 	while($row_detail = mysql_fetch_array($query_detail)){
		// 		// simpan transaksi detail
		// 		$data_detail = "'',
		// 							'$transaction_id',
		// 							'".$row_detail['menu_id']."',
		// 							'".$row_detail['transaction_detail_original_price']."',
		// 							'".$row_detail['transaction_detail_margin_price']."',
		// 							'".$row_detail['transaction_detail_price']."',
		// 							'".$row_detail['transaction_detail_price_discount']."',
		// 							'".$row_detail['transaction_detail_grand_price']."',
		// 							'".$row_detail['transaction_detail_qty']."',
		// 							'".$row_detail['transaction_detail_total']."'
		// 							";
		// 			create_config("transaction_details", $data_detail);
		//
		// 			$query_item =  mysql_query("select *
		// 						from menu_recipes a
		// 						where a.menu_id = '".$row_detail['menu_id']."'
		// 						");
		// 			while($row_item = mysql_fetch_array($query_item)){
		// 				// update stok bahan
		// 				$new_stock = $row_detail['transaction_detail_qty'] * $row_item['item_qty'];
		// 					update_stock($branch_id, $row_item['item_id'], $new_stock);
		// 			}
		// 	}
		// 	delete_transaction($transaction_id);
		// 	delete_config("transaction_bills", "table_id = '".$table_id."'");
		// }
		// hapus transaction_tmp_details
		$q_detail = mysql_query("select * from transactions_tmp where table_id = '$table_id'");
		while($r_detail = mysql_fetch_array($q_detail)){
			delete_config("transaction_tmp_details", "transaction_id = '".$r_detail['transaction_id']."'");
		}
		delete_config("transactions_tmp", "table_id = '$table_id'");
		// hapus widget_tmp_details
		$q_widget_detail = mysql_query("select * from widget_tmp where table_id = '$table_id'");
		while($r_widget_detail = mysql_fetch_array($q_widget_detail)){
			delete_config("widget_tmp_details", "wt_id = '".$r_widget_detail['wt_id']."'");
		}
		delete_config("widget_tmp", "table_id = '$table_id'");
		mysql_query("update tables set table_status_id = '1' where table_id = '$table_id'");
		//cancel_order($table_id);
		header("location: order.php?building_id=$building_id");
	break;

	case 'order_status':
		$id = $_GET['id'];
		$building_id = $_GET['building_id'];

		update_order_status($id);
		header("location: order.php?building_id=$building_id");
	break;

	case 'cancel_reserved':
		$table_id = $_GET['table_id'];
		$building_id = $_GET['building_id'];

		//echo $table_id;
		cancel_reserved($table_id);
		header("location: order.php?building_id=$building_id");
	break;

	case 'merger_table':

		$table_id = get_isset($_GET['table_id']);
		$building_id = (isset($_GET['building_id'])) ? $_GET['building_id'] : 0;
		$building_name = get_building_name($building_id);
		$query_table_merger = select_table_merger($building_id, $table_id);
		$query_exist = mysql_query("select count(table_id) as jumlah from table_mergers where table_parent_id = '".$table_id."'");
		$row_exist = mysql_fetch_array($query_exist);
		$jumlah_child = $row_exist['jumlah'];

		$action = "order.php?page=save_merger_table&table_id=".$table_id."&building_id=".$building_id;
		$delete_merger_action = "order.php?page=delete_all_merger&table_id=".$table_id."&building_id=".$building_id;
		$close_button = "order.php?building_id=$building_id";

		include '../views/order/merger_table.php';

	break;

	case 'delete_all_merger':
		$table_id = get_isset($_GET['table_id']);
		$building_id = (isset($_GET['building_id'])) ? $_GET['building_id'] : 0;
		// update status merger si parent
		update_merger_status($table_id, 0);

		// looping childnya
		$query = mysql_query("select * from table_mergers where table_parent_id = '$table_id'");
		while($row = mysql_fetch_array($query)){
			// update status merger si child
			update_merger_status($row['table_id'], 0);
			delete_merger_table($table_id, $row['table_id']);
		}

		header("location: order.php?building_id=$building_id");

	break;

	case 'save_merger_table':
		$table_id = get_isset($_GET['table_id']);
		$building_id = (isset($_GET['building_id'])) ? $_GET['building_id'] : 0;


		update_merger_status($table_id, 1);

		$query_table_merger = select_table_merger($building_id, $table_id);
		while($row = mysql_fetch_array($query_table_merger)){

			if($row['tms_id']==0){
					update_merger_status($row['table_id'], 0);
					delete_merger_table($table_id, $row['table_id']);

					if($_POST['i_table_id_'.$row['table_id']] == 1){
						$data = "'',
							'$table_id',
							'".$row['table_id']."'
							";
						save_merger_table($data);
						update_merger_status($row['table_id'], 2);
					}
			}else{
				// cek apakah child sendiri ?
				$query_exist = mysql_query("select count(table_id) as jumlah from table_mergers where table_parent_id = '".$table_id."' and table_id = '".$row['table_id']."'");
				$row_exist = mysql_fetch_array($query_exist);
													// jika ya tampilkan
				if($row_exist['jumlah'] > 0){

					update_merger_status($row['table_id'], 0);
					delete_merger_table($table_id, $row['table_id']);

					if($_POST['i_table_id_'.$row['table_id']] == 1){
						$data = "'',
							'$table_id',
							'".$row['table_id']."'
							";
						save_merger_table($data);
						update_merger_status($row['table_id'], 2);
					}
				}
			}
		}
		header("location: order.php?building_id=$building_id");
	break;

	case 'add_duration':

		$reserved_id = $_GET['reserved_id'];
		$i_duration = $_POST['i_duration'];
		$building_id = (isset($_GET['building_id'])) ? $_GET['building_id'] : 0;

		$get_reservation_time = get_reservation_time($reserved_id);
		//echo $get_reservation_time;

		$minute = $i_duration;
        $add = strtotime('+'.$minute.' minutes', strtotime($get_reservation_time));
		$add = date("Y-m-d H:i:s", $add);

		add_duration($reserved_id, $add);
		header("location: order.php?building_id=$building_id");

	break;
	 case 'switch_table':

		 $i_table_id = '';
		 $i_table = '';

			extract($_POST);

			$i_table_id = get_isset($i_table_id);
			$i_table = get_isset($i_table);

			mysql_query("update transactions_tmp set table_id = '$i_table_id' where table_id = '$i_table'");
			mysql_query("update widget_tmp set table_id = '$i_table_id' where table_id = '$i_table'");
			mysql_query("update widget_tmp set table_id = '$i_table_id' where table_id = '$i_table'");
			mysql_query("update tables set table_status_id = '1' where table_id = '$i_table'");
			mysql_query("update tables set table_status_id = '2' where table_id = '$i_table_id'");
			header("location: order.php");
			//var_dump($_POST);
			//  var_dump($i_table);
			//  var_dump($i_table_id);
	 	break;

		case 'got_table':

		$id = $_POST['x'];
		//var_dump($id);
		$query = mysql_query("select a.*, b.building_name
				from tables a
				left join buildings b on b.building_id = a.building_id
				where tms_id <> '2'
				order by building_id, table_name
				");
		break;
}

?>
