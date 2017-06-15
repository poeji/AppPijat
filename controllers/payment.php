<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/payment_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("Pembayaran");
$judul = 'ZEE HOLISTIC';

$_SESSION['table_active'] = 1;

switch ($page) {
	case 'list':

		$ruangan_infrastruktur_id = get_isset($_GET['ruangan_infrastruktur_id']);
		$branch_id = (isset($_GET['branch_id'])) ? $_GET['branch_id'] : 0;
		$idnya = (isset($_GET['id'])) ? $_GET['id'] : 0;
		$table_id = (isset($_GET['table_id'])) ? $_GET['table_id'] : 0;
		$ruangan_id = (isset($_GET['ruangan_id'])) ? $_GET['ruangan_id'] : 0;
		$tgl = (isset($_GET['t'])) ? $_GET['t'] : date('Ymd');
		$query = select($ruangan_infrastruktur_id);
		$query2 = select($ruangan_infrastruktur_id);
		$action = "transaksi.php?page=save_payment&table_id=$table_id&branch_id=$branch_id&ruangan_id=$ruangan_id&ruangan_infrastruktur_id=$ruangan_infrastruktur_id&id=$idnya&t=$tgl";

		//$action = "order.php?page=save_payment&ruangan_infrastruktur_id=".$ruangan_infrastruktur_id."&branch_id=".$branch_id;
		$table_name = get_table_name($ruangan_infrastruktur_id);
		$building_name = get_branch_name($branch_id);
		//$transaction_code = get_transaction_code($ruangan_infrastruktur_id);
		$member_id = get_member_id($ruangan_infrastruktur_id);


		if($ruangan_infrastruktur_id == 0 ){
			$button_back = "";
		}else{
			$button_back = "order.php?page=listbranch_id=$branch_id&ruangan_id=$ruangan_id&ruangan_infrastruktur_id=$ruangan_infrastruktur_id&id=$idnya&t=$tgl";
		}

		include '../views/payment/list.php';

	break;



	case 'save':

		extract($_POST);

		$i_name = get_isset($i_name);

		$data = "'',
					'$i_name'
			";
			//echo $data;
			create($data);

			header("Location: payment.php?page=list&did=1");


	break;

	case 'read_voucher':

		extract($_POST);

		$id = get_isset($id);

		$data_voucher = read_voucher($id);

		//echo $data_voucher['voucher_type_id']."-".$data_voucher['voucher_value'];
		$data['voucher_type_id'] = $data_voucher['voucher_type_id'];
		$data['voucher_value'] = $data_voucher['voucher_value'];

		echo json_encode($data);

	break;

	case 'hitungbulat':
		$totalkedua=ceil($_POST['price']);
		if (substr($totalkedua,-2)!=00){
			if(substr($totalkedua,-2)<50){
				$totalkedua=round($totalkedua,-2)+100;
			}else{
				$totalkedua=round($totalkedua,-2);
			}
		}
		echo $totalkedua;
	break;

	case 'tax':

	break;
}

?>
