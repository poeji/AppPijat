<?php
// $s_cabang = $_SESSION['branch_id'];

function create_config($table, $data){
	mysql_query("insert into $table values(".$data.")");
	return mysql_insert_id();
}

function create_config_2($table, $data, $con){
	mysql_query("insert into $table values(".$data.")", $con);
	return mysql_insert_id();
}

function update_config($table, $data, $column, $id){
	mysql_query("update $table set $data where $column = $id");
}

function update_config2($table, $data, $param){
	mysql_query("update $table set $data where $param");
}

function delete_config($table, $param){
	mysql_query("delete from $table where $param");
}

function select_config($table, $where){
	$query = mysql_query("SELECT * FROM $table $where");
	return $query;
}

function select_object_config($table, $where){
	$query = mysql_query("SELECT * FROM $table $where");
	$result = mysql_fetch_object($query);
	return $result;
}

function select_config_by($table, $obj, $where){
	$query = mysql_query("SELECT $obj as result FROM $table $where");
	$row = mysql_fetch_array($query);
	$result = $row['result'];
	return $result;
}

function get_last_id($table,$id){
	$query = mysql_query("SELECT MAX($id) as result FROM $table");
	$row = mysql_fetch_array($query);
	$result = $row['result'] ? $row['result'] : 1;
	return $result;
}

// function get_item_name($id){
// 	$query = mysql_query("SELECT * FROM items WHERE item_id = '$id'");
// 	return $query;
// }


function get_land_code(){
	$query = mysql_query("select land_code from counters");
	$result = mysql_fetch_array($query);
	$code = ($result['land_code']) ? $result['land_code'] + 1 : 1;

	if(strlen($code) == 1){
		$code = "0000".$code;
	}else if(strlen($code) == 2){
		$code = "000".$code;
	}else if(strlen($code) == 3){
		$code = "00".$code;
	}else if(strlen($code) == 4){
		$code = "0".$code;
	}

	return "HT".$code;
}
function edit_land_code(){
	mysql_query("update counters set land_code = land_code + 1");
}
function get_land_area($land_id){
	$query = mysql_query("select sum(farmer_land_area) as jumlah from farmer_lands where land_id = '$land_id'");
	$row = mysql_fetch_object($query);
	$result = ($row->jumlah) ? $row->jumlah : 0;
	return $result;
}
function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}
function get_event_code(){
	$query = mysql_query("select event_code from config");
	$row = mysql_fetch_object($query);
	$result = $row->event_code + 1;
	return $result;
}
function new_date(){
	$new_date = date("Y-m-d H:m:s");
	return $new_date;
}

function get_header($title = ""){
	include '../views/layout/header.php';
}

function get_header2($title = ""){
	include '../views/layout/header2.php';
}

function get_footer($query_find = 0){
	include '../views/layout/footer.php';
}

function get_large_modal(){
	include '../views/large_modal.php';
}

function get_medium_modal(){
	include '../views/medium_modal.php';
}

function get_small_modal(){
	include '../views/small_modal.php';
}

function get_isset($data){
	$result = (isset($data)) ? $data : null;
	return $result;
}

function format_date($date){
	if($date == "0000-00-00"){
		return "-";
	}else{
		$date = explode("-", $date);
		$new_date = $date[2]."/".$date[1]."/".$date[0];

		return $new_date;
	}

}

function format_date_js($date){
	if($date == "0000-00-00"){
		return "-";
	}else{
		$date = explode("/", $date);
		$new_date = $date[2]."-".$date[1]."-".$date[0];

		return $new_date;
	}

}

function format_hour($hour){
		$hour = explode(" ", $hour);

		return $hour[0].":00";

}

function format_date_only($date){
	if($date == "0000-00-00" || $date == null ){
		return "-";
	}else{
		$date = explode(" ", $date);
		$date = $date[0];
		$date = explode("-", $date);
		$new_date = $date[2]."/".$date[1]."/".$date[0];

		return $new_date;
	}
}
function get_hour($data){
	$data = explode(" ", $data);
	$hour = $data[1];
	$h = explode(":", $hour);
	$new_hour = $h[0].":".$h[1];
	return $new_hour;
}
function format_back_date($date){
	$date = explode("/", $date);

	$back_date =  $date[2]."-".$date[1]."-".$date[0];

	return $back_date;

}
function format_back_date2($date){

	$date = explode("/", $date);
	if($date[0] < 10){
		$date[0] = '0'.$date[0];
	}

	if($date[1] < 10){
		$date[1] = '0'.$date[1];
	}
	$back_date =  $date[2]."-".$date[0]."-".$date[1];

	return $back_date;

}
function format_back_date3($date){

	$date = explode("-", $date);
	$back_date =  $date[2]."-".$date[1]."-".$date[0];

	return $back_date;

}
function format_back_date4($date){

	$date = explode("-", $date);
	$back_date =  $date[2]."/".$date[1]."/".$date[0];

	return $back_date;

}
function format_back_date_upload($date){

	$date = explode("/", $date);
	$back_date =  $date[2]."-".$date[0]."-".$date[1];

	return $back_date;

}

function cek_type_file($tipe_file){
	   $hasil = 0; //false
	   $tipe  = $tipe_file;
	   if (($tipe == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") or ($tipe == "application/vnd.ms-excel") ) {
		  $hasil = 1; //true
	   }

	   return $hasil;
}
function format_date_xl($date_xl){
	$month=array('Jan'=>'01','Feb'=>'02','Mar'=>'03','Apr'=>'04','May'=>'05','Jun'=>'06','Jul'=>'07','Aug'=>'08','Sep'=>'09','Oct'=>'10','Nov'=>'11','Dec'=>'12');
	$date_xl = explode("-", $date_xl);
	$back_date =  $date_xl[2]."-".$month[$date_xl[1]]."-".$date_xl[0];

	return $back_date;
}

function get_user_data(){
	$query_user = mysql_query("select a.*,b.user_type_name from users a
								join user_types b on b.user_type_id = a.user_type_id
								where a.user_id = '".$_SESSION['user_id']."'");
	$row_user = mysql_fetch_object($query_user);

	$name = ucfirst($row_user->user_name);
	$type = ucfirst($row_user->user_type_name);
	$user_img = $row_user->user_img;
	$user_id = $row_user->user_id;

	return array($name, $type, $user_img,$user_id);
}

function create_report($title) {
				$format =			header("Pragma: public");
									header("Expires: 0");
									header("Cache-Control : must-revalidate, post-check=0, pre-check=0");
									header("Content-type: application/force-download");
								    header("Content-type: application/octet-stream");
									header("Content-type: application/download");
								    header("Content-Disposition: attachment; filename=$title.xls");
								    header("Content-transfer-encoding: binary");

return $format;
}

function tool_format_number($data){
	$data = number_format($data, 0);
	$data = "<div style='text-align:right'>".$data."</div>";
	return $data;
}
function tool_format_number_report($data){
	$data = number_format($data, 2);
	$data = "<div style='text-align:right; font-size:26px;'>".$data."</div>";
	return $data;
}
function format_report($data){
	$data = "<div style='text-align:right; font-size:26px;'>".$data."</div>";
	return $data;
}

function show_message($message, $link){
	?>
    <script type="text/javascript">
    alert("<?= $message ?>");
	window.location = "<?= $link ?>";
    </script>
    <?php

}

function get_abjad($data){
	$abjad = array("","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
	return $abjad[$data];
}

function get_abjad_besar($data){
	$abjad = array("","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");

	return strtoupper($abjad[$data]);
}

function get_urutan($parent_id, $number){
	$query = mysql_query("select count(vps_id) as result from village_profile_structures where vps_parent_id = '$parent_id' and vps_number < '$number'");
	$row = mysql_fetch_array($query);

	return $row['result'] + 1;
}

function count_stock_limit($s_cabang){
	$query = mysql_query("SELECT COUNT(item_stock_id) AS result
												FROM item_stocks a
												JOIN items b ON b.item_id = a.item_id
												WHERE a.item_stock_qty <= b.item_limit
												AND branch_id = '$s_cabang'
												");
	$row = mysql_fetch_array($query);

	return $row['result'];
}

function select_stock_limit($s_cabang){
	$query = mysql_query("SELECT a.*, b.item_name, c.unit_name, d.branch_name
												FROM item_stocks a
												JOIN items b ON b.item_id = a.item_id
												LEFT JOIN units c ON c.unit_id = b.unit_id
					              JOIN branches d ON d.branch_id = a.branch_id
												WHERE a.item_stock_qty <= b.item_limit
												AND a.branch_id = '$s_cabang'
												");
	return $query;
}

function select_office(){
	$query=mysql_query("SELECT * FROM office");
	return $query;
}
function select_batas_waktu(){
	$now_date =date("Y-m-d",strtotime('+4 days'));
	$query = mysql_query("SELECT a.*,b.*, c.* from piutang a
												JOIN transactions b on b.transaction_id = a.transaction_id
												join members c on c.member_id = b.member_id
												where tgl_batas <= '".$now_date."' AND b.lunas != 0");
	return $query;
}

function count_batas_waktu(){
	$now_date =date("Y-m-d",strtotime('+4 days'));
	$query = mysql_query("SELECT count(a.tgl_batas) as result from piutang a
												JOIN transactions b on b.transaction_id = a.transaction_id
												where tgl_batas  <= '".$now_date."'AND b.lunas != 0");
	$row = mysql_fetch_array($query);
	// $jml = $row['result']
	return $row['result'];
}

function select_batas_waktu_hutang(){
	$now_date =date("Y-m-d",strtotime('+4 days'));
	$query = mysql_query("SELECT a.*,b.*, c.* from hutang a
												JOIN purchases b on b.purchases_id = a.purchase_id
												join suppliers c on c.supplier_id = b.supplier_id
												where a.batas_tanggal <= '".$now_date."' AND b.lunas != 0");
	return $query;
}
function count_batas_waktu_hutang(){
	$now_date =date("Y-m-d",strtotime('+4 days'));
	$query = mysql_query("SELECT count(a.batas_tanggal) as result from hutang a
												JOIN purchases b on b.purchases_id = a.purchase_id
												where a.batas_tanggal  <= '".$now_date."'AND b.lunas != 0");
	$row = mysql_fetch_array($query);
	// $jml = $row['result']
	return $row['result'];
}


function count_transaction_delete(){

	$query = mysql_query("select count(transaction_id) as result
							from transaction_histories a
							where status = 0
							");
	$row = mysql_fetch_array($query);

	return $row['result'];
}

function select_transaction_delete(){

	$query = mysql_query("select a.*,b.user_name
							from transaction_histories a
							join users b on b.user_id = a.user_delete
							where status = 0
							");
	return $query;
}

function menu_lv1($id){
		$query = mysql_query("select a.* from side_menus a
													join permits b on b.side_menu_id = a.side_menu_id
													join users c on c.user_type_id = b.user_type_id
													where a.side_menu_level = 1 and c.user_id = '".$id."' and b.permit_acces != ''");
	return $query;
}

function menu_lv2($id,$type){
		$query = mysql_query("select b.permit_acces,c.* from users a
													join permits b on b.user_type_id = a.user_type_id
													join side_menus c on c.side_menu_id = b.side_menu_id
													where a.user_id = '".$id."'  and c.side_menu_parent = '".$type."' and b.permit_acces != ''");
	return $query;
}

function cek_menu_lv2($id,$type){
		$query = mysql_query("select count(c.side_menu_id) as result from users a
													join permits b on b.user_type_id = a.user_type_id
													join side_menus c on c.side_menu_id = b.side_menu_id
													where a.user_id = '".$id."'  and c.side_menu_parent = '".$type."' and b.permit_acces != ''");
	$row = mysql_fetch_array($query);

	return $row['result'];
}

function menu_lv3($id,$type){
		$query = mysql_query("SELECT b.permit_acces,c.* FROM users a
													JOIN permits b ON b.user_type_id = a.user_type_id
													JOIN side_menus c ON c.side_menu_id = b.side_menu_id
													WHERE a.user_id = '".$id."'
													AND c.side_menu_parent = '".$type."'
													AND b.permit_acces != ''");
	return $query;
}

function cek_menu_lv3($id,$type){
		$query = mysql_query("select count(c.side_menu_id) as result from users a
													join permits b on b.user_type_id = a.user_type_id
													join side_menus c on c.side_menu_id = b.side_menu_id
													where a.user_id = '".$id."'  and c.side_menu_parent = '".$type."' and b.permit_acces != ''");
	$row = mysql_fetch_array($query);

	return $row['result'];
}

function get_cabang_name($id){
	$query = mysql_query("select branch_name from branches where branch_id = '".$id."'");
	$result = mysql_fetch_array($query);
	$result = $result['branch_name'] ? $result['branch_name'] : "-";
	return $result;
}

function get_unit_name($id){
	$query = mysql_query("SELECT unit_name as result FROM units WHERE unit_id = '$id'");
	$row = mysql_fetch_array($query);
	$result = $row['result'];
	return $result;
}

function get_unit_id($id){
	$query = mysql_query("SELECT unit_id AS result FROM items WHERE item_id ='$id'");
	$row = mysql_fetch_array($query);
	$result = $row['result'];
	return $result;
}

// konversi dari satuan konversi ke satuan utama
function konversi_ke_satuan_utama($item_id, $unit_id_beli,$qty){
	$result = '';
	$query = mysql_query("SELECT unit_id as result FROM items WHERE item_id = '$item_id'");
	$row = mysql_fetch_array($query);
	$unit_id_utama = $row['result'];
	if ($unit_id_beli != 0) {
		$q_konversi = mysql_query("SELECT * FROM unit_konversi WHERE item_id = '$item_id'
														 AND unit_id = '$unit_id_utama'
														 AND unit_konversi = '$unit_id_beli'");
		$r_konversi = mysql_fetch_array($q_konversi);
		if ($r_konversi['unit_jml'] > $r_konversi['unit_konversi_jml']) {
			$qty = $qty * $r_konversi['unit_konversi_jml'];
		} elseif ($r_konversi['unit_jml'] < $r_konversi['unit_konversi_jml']) {
			$qty = $qty / $r_konversi['unit_konversi_jml'];
		}
	}
	$result = $qty;
	return $result;
}

// new konversi
function konversi_ke_satuan_utama_($item_id, $unit_id_beli,$qty){
	$result = '';
	$query 	= mysql_query("SELECT item_satuan as result FROM item WHERE item_id = '$item_id'");
	$row 	= mysql_fetch_array($query);

	$unit_id_utama = $row['result'];
	if ($unit_id_beli != 0) {
		$q_konversi = mysql_query("SELECT * FROM konversi_item WHERE item_id = '$item_id'
														 AND satuan_utama = '$unit_id_utama'
														 AND satuan_konversi = '$unit_id_beli'");
		$r_konversi = mysql_fetch_array($q_konversi);
		if ($r_konversi['jumlah'] > $r_konversi['jumlah_satuan_konversi']) {
			$qty = $qty * $r_konversi['jumlah_satuan_konversi'];
		} elseif ($r_konversi['jumlah'] < $r_konversi['jumlah_satuan_konversi']) {
			$qty = $qty / $r_konversi['jumlah_satuan_konversi'];
		}
	}
	$result = $qty;
	return $result;
}

// konversi dari jumlah konversi ke satuan utama
function konversi_total_jumlah($unit_id_utama, $item_id, $qty, $unit_konversi){
	$qty_asli = $qty;
	$qty = $qty;
	$query = mysql_query("SELECT a.*,b.unit_name AS unit_utama_name, c.unit_name AS unit_konversi_name
												FROM unit_konversi a
												LEFT JOIN units b ON b.unit_id = a.unit_id
												LEFT JOIN units c ON c.unit_id = a.unit_konversi
												WHERE a.item_id = '$item_id' and a.unit_id = '$unit_id_utama' and unit_konversi = '$unit_konversi'");
	if ($query!=null) {
		$row = mysql_fetch_array($query);
		if ($row['unit_konversi_jml'] < $row['unit_jml']) {
			$qty = $qty / $row['unit_jml'];
			$qty = floor($qty);
			$qty_a = $qty * $row['unit_jml'];
			$qty_b = $qty_asli - $qty_a;
			if ($qty_b>0) {
				$arr = array($qty,$row['unit_konversi_name'],$qty_b,$row['unit_utama_name']);
				$qty = implode(" ", $arr);
			}else {
				$arr = array($qty,$row['unit_konversi_name']);
				$qty = implode(" ", $arr);
			}
			$result = $qty;
		} else {
			$qty = $qty * $row['unit_konversi_jml'];
			$result = $qty_asli - $qty;
		}
	}
	return $result;
}


function konversi_qty($item_id,$i_unit,$i_qty){
	$qty = $i_qty;
	$query = mysql_query("SELECT * FROM unit_konversi WHERE item_id = '$item_id' and unit_konversi = '$i_unit'");
	$row = mysql_fetch_array($query);
	if ($row['unit_konversi_jml']!=null) {
		if ($row['unit_konversi_jml'] < $row['unit_jml']) {
			$qty = $i_qty / $row['unit_jml'];
		} else {
			$qty = $i_qty * $row['unit_konversi_jml'];
		}
	}
	return $qty;
}

function get_akses_permits($id, $target_id){
	$query = mysql_query("SELECT permit_acces FROM permits
												WHERE user_type_id = '$id'
												AND side_menu_id = '$target_id'");
	$row = mysql_fetch_array($query);
	$result = $row['permit_acces'];
	return $result;
}


function format_berat($berat){
	$satuan_gr = 'Gram';
	$satuan_kg = 'Kg';
	$satuan_ton = 'Ton';
	$arr = array($berat,$satuan_gr);
	$berat = implode(" ",$arr);
	if ($berat>1000) {
		$berat = $berat/1000;
		$arr = array($berat,$satuan_kg);
		$berat = implode(" ",$arr);
	}elseif ($berat>1000000) {
		$berat = $berat/1000000;
		$arr = array($berat,$satuan_ton);
		$berat = implode(" ",$arr);
	}
	return $berat;
}

function get_nama_hari($day){
	$nama_hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
	$jml_hari = count($nama_hari);
	$day = date('N', strtotime($day));
	$hari_ini = $nama_hari[$day];
	return $hari_ini;
}

function get_nama_bulan($bulan){
	$nama_bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	$jml_bulan = count($nama_bulan);
	$bulan = date('m', strtotime($bulan));
	$bulan = (int)$bulan;
	$bulan_ini = $nama_bulan[$bulan];
	return $bulan_ini;
}

function get_tahun($day){
	$tahun = date('Y', strtotime($day));
	return $tahun;
}

function terbilang($x) {
		$abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
	 if ($x < 12)
		 return " " . $abil[$x];
	 elseif ($x < 20)
		 return Terbilang($x - 10) . "Belas";
	 elseif ($x < 100)
		 return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);
	 elseif ($x < 200)
		 return " Seratus" . Terbilang($x - 100);
	 elseif ($x < 1000)
		 return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);
	 elseif ($x < 2000)
		 return " Seribu" . Terbilang($x - 1000);
	 elseif ($x < 1000000)
		 return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);
	 elseif ($x < 1000000000)
		 return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);
}

function get_bank_name($id){
	$query = mysql_query("select bank_name as result from banks where bank_id = '$id'");
	$row = mysql_fetch_array($query);
	$result = $row['result'];
	return $result;
}

?>
