<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/jurnal_umum_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Pemasukan dan Pengeluaran Lainnya");

$_SESSION['menu_active'] = 9;

switch ($page) {
	case 'list':
		get_header($title);
		
		if($_SESSION['user_type_id']==1 || $_SESSION['user_type_id']==2){
			$where_branch = "";
		}else{
			$where_branch = " and a.branch_id = '".$_SESSION['branch_id']."' ";
		}
		
		$query = select($where_branch);
		
		$add_button = "jurnal_umum.php?page=form";

		include '../views/jurnal_umum/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "jurnal_umum.php?page=list";
		
		if($_SESSION['user_type_id']==1 || $_SESSION['user_type_id']==2){
			$where_branch = "";
		}else{
			$where_branch = " where a.branch_id = '".$_SESSION['branch_id']."' ";
		}
		
		$q_journal_type = select_journal_type();
		$q_bank = select_bank();
		$q_branch = select_branch($where_branch);

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			$row->journal_date = format_date($row->journal_date);
			$action = "jurnal_umum.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
	
			$row->journal_type_id = false;
			$row->journal_debit = 0;
			$row->journal_credit = 0;
			$row->journal_piutang = 0;
			$row->journal_hutang = 0;
			$row->journal_date = date("d/m/Y");
			$row->journal_desc = false;
			$row->bank_id = false;
			$row->branch_id = false;
			
			$action = "jurnal_umum.php?page=save";
		}

		include '../views/jurnal_umum/form.php';
		get_footer();
	break;

	case 'save':
	
		extract($_POST);

		$i_journal_type_id = get_isset($i_journal_type_id);
		$i_journal_debit = get_isset($i_journal_debit);
		$i_journal_credit = get_isset($i_journal_credit);
		$i_journal_piutang = get_isset($i_journal_piutang);
		$i_journal_hutang = get_isset($i_journal_hutang);
		$i_journal_date = get_isset($i_journal_date);
		$i_journal_date = format_back_date($i_journal_date);
		$i_journal_desc = get_isset($i_journal_desc);
		$i_bank_id = get_isset($i_bank_id);
		$i_branch_id = get_isset($i_branch_id);
		
		$data = "'',
					'$i_journal_type_id',
					'',
					'jurnal_umum.php?page=form&id=',
					'$i_journal_debit',
					'$i_journal_credit',
					'$i_journal_piutang',
					'$i_journal_hutang',
					'$i_journal_date',
					'$i_journal_desc',
					'$i_bank_id',
					'".$_SESSION['user_id']."',
					'$i_branch_id'
			";
			
			
			create($data);
			$data_id = mysql_insert_id();
			update_data_id($data_id);
		
			header("Location: jurnal_umum.php?page=list&did=1");
		
		
	break;

	case 'edit':

		extract($_POST);
		
		$id = get_isset($_GET['id']);
		
		$i_journal_type_id = get_isset($i_journal_type_id);
		$i_journal_debit = get_isset($i_journal_debit);
		$i_journal_credit = get_isset($i_journal_credit);
		$i_journal_piutang = get_isset($i_journal_piutang);
		$i_journal_hutang = get_isset($i_journal_hutang);
		$i_journal_date = get_isset($i_journal_date);
		$i_journal_date = format_back_date($i_journal_date);
		$i_journal_desc = get_isset($i_journal_desc);
		$i_bank_id = get_isset($i_bank_id);
		$i_branch_id = get_isset($i_branch_id);
	
		
					$data = "
					journal_type_id = '$i_journal_type_id',
					journal_debit = '$i_journal_debit',
					journal_credit = '$i_journal_credit',
					journal_piutang = '$i_journal_piutang',
					journal_hutang = '$i_journal_hutang',
					journal_date = '$i_journal_date',
					journal_desc = '$i_journal_desc',
					bank_id = '$i_bank_id',
					branch_id = '$i_branch_id'

					";
			
			update($data, $id);
			
			header('Location: jurnal_umum.php?page=list&did=2');

		

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: jurnal_umum.php?page=list&did=3');

	break;
}

?>