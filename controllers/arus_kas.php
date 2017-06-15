<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/arus_kas_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Arus Kas");

$_SESSION['menu_active'] = 9;

switch ($page) {
	
	case 'list':
		get_header();
		
		if($_SESSION['user_type_id']==1 || $_SESSION['user_type_id']==2){
			$where_branch2 = "";
		}else{
			$where_branch2 = " where a.branch_id = '".$_SESSION['branch_id']."' ";
		}
		
		$query_branch = select_branch($where_branch2);
		$query_type_journal = select_type_journal();

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$date_default = "";
		$date_url = "";
		$branch_id = "";
		$journal_type_id = "";

		$button_download = "";
		
		if(isset($_GET['preview'])){
			$i_date = get_isset($_GET['date']);
			$branch_id = get_isset($_GET['branch_id']);
			$journal_type_id = get_isset($_GET['journal_type_id']);
			$date_default = $i_date;
			$date_url = "&date=".str_replace(" ","", $i_date);
			
		}
		
		$action = "arus_kas.php?page=form_result&preview=1";
		
		include '../views/arus_kas/form.php';
		
		if(isset($_GET['preview'])){
			
				if(isset($_GET['date'])){
					$i_date = $_GET['date'];
				}else{
					extract($_POST);
					$i_date = get_isset($i_date);
				}
			$i_date = str_replace(" ","", $i_date);
			
			$date = explode("-", $i_date);
			$date1 = format_back_date($date[0]);
			$date2 = format_back_date($date[1]);

			$query_item = select_detail($date1, $date2, $branch_id,$journal_type_id);

			include '../views/arus_kas/list_item.php';
		
		}
		
		
		get_footer();
	break;
	
	case 'form_result':
		

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$date_default = "";
		$date_url = "";
		
		//if(isset($_GET['preview'])){
			
			extract($_POST);
			$i_date = (isset($_POST['i_date'])) ? $_POST['i_date'] : null;
			$i_branch_id = (isset($_POST['i_branch_id'])) ? $_POST['i_branch_id'] : null;
			$i_journal_type = (isset($_POST['i_journal_type'])) ? $_POST['i_journal_type'] : null;
			$date_default = $i_date;
			$date_url = "&date=".str_replace(" ","", $i_date);
		//}
		
		header("Location: arus_kas.php?page=list&preview=1&date=$date_default&branch_id=$i_branch_id&journal_type_id=$i_journal_type");
	break;
	

	
	
	
	case 'download':
	
			$i_date = $_GET['date'];
			$i_date = str_replace(" ","", $i_date);
			$date_real = $_GET['date'];
			
			
			
			$date = explode("-", $i_date);
			$date1 = format_back_date($date[0]);
			$date2 = format_back_date($date[1]);
			
			$i_owner_id = get_isset($_GET['owner']);
			
			if($i_owner_id == 0){
				$supplier = "All Supplier";
			}else{
				$supplier = get_data_owner($i_owner_id);
			}
			
			$query_item = select_detail($date1, $date2, $i_owner_id);
			
			//fungsi backup
			$datetime1 = new DateTime($date1);
			$datetime2 = new DateTime($date2);
			$difference = $datetime1->diff($datetime2);
			//echo $difference->days;
			
			/*$sel = abs(strtotime($date2)-strtotime($date1));
			$selisih= $sel /(60*60*24);*/
			
			$jumlah_hari = $difference->days + 1;
			$jumlah_truk = get_jumlah_truk($date1, $date2, $i_owner_id);
			$jumlah_pengiriman = get_jumlah_pengiriman($date1, $date2, $i_owner_id);
			$jumlah_volume = (get_jumlah_volume($date1, $date2, $i_owner_id)) ? get_jumlah_volume($date1, $date2, $i_owner_id) : 0;
			$jumlah_volume = str_replace(".",",", $jumlah_volume);
			
			$total_jasa_angkut = get_total_jasa_angkut($date1, $date2, $i_owner_id);
			$total_jasa_angkut = str_replace(".",",", $total_jasa_angkut);
			$total_subsidi_tol = get_total_subsidi_tol($date1, $date2, $i_owner_id);
			$total_transport = $total_jasa_angkut + $total_subsidi_tol;
			$total_harga_urukan = get_total_harga_urukan($date1, $date2, $i_owner_id);
			$total_hpp = get_total_hpp($date1, $date2, $i_owner_id);
						
			$title = 'arus_kas';
			$supplier_title = str_replace(" ","_", $supplier);
			$format = create_report($title."_".$supplier_title."_".$i_date);
			
			include '../views/report/arus_kas.php';
			

	break;


	
	case 'download_pdf':
			$i_date = $_GET['date'];
			$date_view = $_GET['date'];
			$i_date = str_replace(" ","", $i_date);
			
			
			$date = explode("-", $i_date);
			$date1 = format_back_date($date[0]);
			$date2 = format_back_date($date[1]);
			
			$i_owner_id = get_isset($_GET['owner']);
			
			if($i_owner_id == 0){
				$supplier = "All Supplier";
			}else{
				$supplier = get_data_owner($i_owner_id);
			}
			
			$query_item = select_detail($date1, $date2, $i_owner_id);
			
			//fungsi backup
			$datetime1 = new DateTime($date1);
			$datetime2 = new DateTime($date2);
			$difference = $datetime1->diff($datetime2);
			//echo $difference->days;
			
			/*$sel = abs(strtotime($date2)-strtotime($date1));
			$selisih= $sel /(60*60*24);*/
			
			$jumlah_hari = $difference->days + 1;
			$jumlah_truk = get_jumlah_truk($date1, $date2, $i_owner_id);
			$jumlah_pengiriman = get_jumlah_pengiriman($date1, $date2, $i_owner_id);
			$jumlah_volume = (get_jumlah_volume($date1, $date2, $i_owner_id)) ? get_jumlah_volume($date1, $date2, $i_owner_id) : 0;
			$jumlah_volume = str_replace(".",",", $jumlah_volume);
			
			$total_jasa_angkut = get_total_jasa_angkut($date1, $date2, $i_owner_id);
			$total_jasa_angkut = intval($total_jasa_angkut);
			$total_jasa_angkut = str_replace(".",",", $total_jasa_angkut);
			$total_subsidi_tol = get_total_subsidi_tol($date1, $date2, $i_owner_id);
			$total_transport = $total_jasa_angkut + $total_subsidi_tol;
			$total_harga_urukan = get_total_harga_urukan($date1, $date2, $i_owner_id);
			$total_hpp = get_total_hpp($date1, $date2, $i_owner_id);
			
			include '../views/report/arus_kas_pdf.php';
	
	break;
	
	
	
	case 'delete_transaction':
		

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			
			extract($_POST);
			$i_date = get_isset($_GET['date']);
			$date_default = $i_date;
			
		
		delete_transaction($id);
		
		header("Location: arus_kas.php?page=list&preview=1&date=$date_default");
	break;
	
}

?>