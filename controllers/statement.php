<?php
error_reporting(0);
include '../lib/config.php';
include '../lib/function.php';
// include '../models/statement_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("Statement");

$_SESSION['menu_active'] = 1;

switch ($page) {

	case 'list':
		get_header();

		$close_button = "transaction.php";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$member_id = (isset($_GET['member'])) ? $_GET['member'] : null;
		$status = (isset($_GET['status'])) ? $_GET['status'] : null;
		
		if($member_id){
			$where_member_id = "WHERE member_id = '$member_id'";
			$r_member = select_object_config('members', $where_member_id);			
			$statement_id = select_config_by('statement', 'count(*)', $where_member_id); 
			if ($statement_id>0) {
				$row = mysql_query("SELECT * FROM statement WHERE member_id = '$member_id'");
				$r_statement = mysql_fetch_array($row);
				//echo $r_statement['asma'];	
				// $result = $row['result'];
				// echo $row['asma'];
				// var_dump($row);		
				
					$action_statement = "statement.php?page=save_statement";
			} 
			else {
				$r_statement = new stdClass();

				$r_statement->tekanan = false;
				$r_statement->asma = false;
				$r_statement->inhaler = false;
				$r_statement->leher = false;
				$r_statement->kulit = false;
				$r_statement->kulit_jabarkan = false;
				$r_statement->selain_diatas = false;
				$r_statement->selain_jabarkan = false;
				$r_statement->alergi  = false;
				$r_statement->alergi_jabarkan = false;
				$r_statement->hamil = false;
				$r_statement->usia_kandungan = false;
				$r_statement->kontak_lens = false;
				$r_statement->melepas_lens = false;
				$r_statement->level = false;
				$r_statement->spesial = false;
				$r_statement->jawaban = false;
				$r_statement->tidak_menyembunyikan = false;
				$r_statement->tanggung_jawab = false;
				if ($status != 1) {
					$action_statement = "statement.php?page=save_statement";	
				} else {
					$action_statement = "";	
				}
			}

		} 
		else {

			$r_member = new stdClass();

			$r_member->member_name = false;
			$r_member->member_email = false; 	
			$r_member->member_phone = false;
			$r_member->member_alamat = false;

			if ($status != 1) {
					$action_statement = "member.php?page=save_statement&id=$member_id";	
				} else {
					$action_statement = "";	
				}

		}
			// $r_statement = new stdClass();

			// $r_statement->tekanan = false;
			// $r_statement->asma = false;
			// $r_statement->inhaler = false;
			// $r_statement->leher = false;
			// $r_statement->kulit = false;
			// $r_statement->kulit_jabarkan = false;
			// $r_statement->selain_diatas = false;
			// $r_statement->selain_jabarkan = false;
			// $r_statement->alergi  = false;
			// $r_statement->alergi_jabarkan = false;
			// $r_statement->hamil = false;
			// $r_statement->usia_kandungan = false;
			// $r_statement->kontak_lens = false;
			// $r_statement->melepas_lens = false;
			// $r_statement->level = false;
			// $r_statement->spesial = false;
			// $r_statement->jawaban = false;
			// $r_statement->tidak_menyembunyikan = false;
			// $r_statement->tanggung_jawab = false;

		// echo "string";
		//var_dump($r_statement);
		include '../views/statement/form_statement.php';
		get_footer();
	break;

	case 'save_statement':
			extract($_POST);

				//$id = (isset($_GET['id'])) ? $_GET['id'] : null;
				if(isset($i_member_id) && $i_member_id != "") { $i_member_id = get_isset($i_member_id); } //(isset($_GET['member'])) ? $_GET['member'] : null;
				$id = $_POST['id'];
				$i_tekanan = get_isset($i_tekanan);
				$i_asma = get_isset($i_asma);
				$i_inhaler = get_isset($i_inhaler);
				$i_leher = get_isset($i_leher);
				$i_kulit = get_isset($i_kulit);
				$i_kulit_jabarkan = get_isset($i_kulit_jabarkan);
				$i_selain = get_isset($i_selain);
				$i_selain_jabarkan = get_isset($i_selain_jabarkan);
				$i_alergi = get_isset($i_alergi);
				$i_alergi_jabarkan = get_isset($i_alergi_jabarkan);
				$i_hamil = get_isset($i_hamil);
				$i_usia_kandungan = get_isset($i_usia_kandungan);
				$i_lens = get_isset($i_lens);
				$i_melepasnya = get_isset($i_melepasnya);
				$i_level = get_isset($i_level);
				$i_spesial = get_isset($i_spesial);
				$i_jawaban = get_isset($i_jawaban);
				$i_menyembunyikan = get_isset($i_menyembunyikan);
				$i_bertanggung_jawab = get_isset($i_bertanggung_jawab);

				$data = "'',
						'$i_member_id',
						'$i_tekanan',
						'$i_asma',
						'$i_inhaler',
						'$i_leher',
						'$i_kulit',
						'$i_kulit_jabarkan',
						'$i_selain',
						'$i_selain_jabarkan',
						'$i_alergi',
						'$i_alergi_jabarkan',
						'$i_hamil',
						'$i_usia_kandungan',
						'$i_lens',
						'$i_melepasnya',
						'$i_level',
						'$i_spesial',
						'$i_jawaban',
						'$i_menyembunyikan',
						'$i_bertanggung_jawab'

						";
				// create_config('statement',$data);
				$statement_id = create_config('statement', $data);
				 //var_dump($_POST);  exit();

				//cek tanggal book
				$c = mysql_fetch_array(mysql_query("SELECT DATE_FORMAT(transaction_date, '%Y%m%d') AS t, branch_id FROM `transactions_tmp` WHERE transaction_id = $id"));

				/*echo "<script>
				var win = window.open(url, 'print.php?page=printquisoner');
  				win.focus();
						</script>";*/

			     header("Location: print.php?page=printquisoner&member=".$i_member_id."&id=".$id."&branch_id=$c[branch_id]&ruangan_id=9&t=$c[t]");
				// echo "string";
		break;

}

?>
