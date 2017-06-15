<?php

function select(){
	$query = mysql_query("select a.*, b.voucher_type_name
							from vouchers a	
							join voucher_types b on b.voucher_type_id = a.voucher_type_id
										
							order by voucher_id");
	return $query;
}

function select2(){
	$query = mysql_query("SELECT a.*, b.voucher_type_name,c.voucher_code, c.voucher_value
                                                        FROM voucher_detail a	
                                                        JOIN voucher_types b ON b.voucher_type_id = a.voucher_type_id	
                                                        JOIN vouchers c ON c.voucher_id = a.voucher_id						

                                                        ORDER BY a.id_voucher_detail DESC");
	return $query;
}

function select_voucher(){
	$query = mysql_query("select * from vouchers order by voucher_id ");
	return $query;
}


function read_id($id){
	$query = mysql_query("select *
			from vouchers
			where voucher_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function read_id2($id){
	$query = mysql_query("SELECT a.*, b.voucher_type_name,c.voucher_code, c.voucher_value
                                                        FROM voucher_detail a	
                                                        JOIN voucher_types b ON b.voucher_type_id = a.voucher_type_id	
                                                        JOIN vouchers c ON c.voucher_id = a.voucher_id
                                                        WHERE a.id_voucher_detail = '$id'						
                                                        ORDER BY a.id_voucher_detail DESC");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into vouchers values(".$data.")");
}

function create_data($data){
	mysql_query("INSERT INTO voucher_detail values(".$data.")");
}

function update($data, $id){
	mysql_query("update vouchers set ".$data." where voucher_id = '$id'");
        mysql_query("update vouchers_detail set ".$data." where voucher_id = '$id'");
}

function delete($id){
	mysql_query("delete from vouchers where voucher_id = '$id'");
        mysql_query("delete from voucher_detail where voucher_id = '$id'");
}
function delete_list($id){
	mysql_query("delete from voucher_detail where id_voucher_detail = '$id'");
}

function prints($id){
        mysql_query("select a.*, b.voucher_type_name
							from vouchers a	
							join voucher_types b on b.voucher_type_id = a.voucher_type_id
										
							order by voucher_id");
}
?>