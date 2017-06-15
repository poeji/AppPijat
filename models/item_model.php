<?php

function select(){
	$query = mysql_query("select a.*, b.satuan_name 
							from item a
							left join satuan b on b.satuan_id = a.item_satuan
							order by item_id");
	return $query;
}


function read_id($id){
	$query = mysql_query("select *
							from item
			where item_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into item values(".$data.")");
}

function update($data, $id){
	mysql_query("update item set ".$data." where item_id = '$id'");
}

function delete($id){
	mysql_query("delete from item where item_id = '$id'");
}

 function select_tabel_konversi($id){
  $query = mysql_query("SELECT a.* , b.satuan_name , c.satuan_name AS konversi, d.item_name FROM konversi_item a
		                  LEFT JOIN satuan b ON b.satuan_id = a.satuan_utama
		                  LEFT JOIN satuan c ON c.satuan_id = a.satuan_konversi
		                  LEFT JOIN item d ON d.item_id = a.item_id
		                  WHERE a.item_id = '$id'");
  return $query;
}
function select_konversi($where_satuan_yang_sudah_dipilih){
  $query = mysql_query("SELECT * from satuan $where_satuan_yang_sudah_dipilih");
  return $query;
}
?>