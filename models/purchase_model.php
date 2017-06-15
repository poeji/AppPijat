<?php

function select($where){
	$query = mysql_query("select a.* , b.supplier_name, d.item_name, e.branch_name
							from purchases a
							join suppliers b on b.supplier_id = a.supplier_id
							join item d on d.item_id = a.item_id
							join branches e on e.branch_id = a.branch_id
							$where
							order by purchase_id");
	return $query;
}

function select_supplier(){
	$query = mysql_query("select * from suppliers order by supplier_id ");
	return $query;
}

function select_item(){
	$query = mysql_query("select * from item order by item_id");
	return $query;
}

function select_branch(){
	$query = mysql_query("select * from branches order by branch_id");
	return $query;
}

function read_id($id){
	$query = mysql_query("select a.*,b.supplier_name
			from purchases a
			join suppliers b on b.supplier_id = a.supplier_id
			
			where purchase_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into purchases values(".$data.")");
}


function create_journal($data_id, $data_url, $journal_type_id, $journal_credit, $journal_desc, $bank_id, $branch_id){
	mysql_query("insert into journals values(
				'',
				'$journal_type_id',
				'$data_id',
				'$data_url',
				'0',
				'$journal_credit',
				'0',
				'0',
				'".date("Y-m-d")."',
				'$journal_desc',
				'$bank_id',
				'".$_SESSION['user_id']."',
				'$branch_id'
	)");
}

function add_stock($item_id, $branch_id, $qty){
	$query = mysql_query("SELECT COUNT(item_stock_id) AS result FROM item_stocks WHERE item = '$item_id' AND branch = '$branch_id'");
	$result = mysql_fetch_array($query);
	
	if($result['result'] > 0){
		mysql_query("update item_stocks set item_stock_qty = item_stock_qty + $qty where item = $item_id and branch = '$branch_id'");
	}else{
		mysql_query("insert into item_stocks values('', '$item_id', '$qty', '$branch_id')");
	}
}



function update($data, $id){
	mysql_query("update purchases set ".$data." where purchase_id = '$id'");
}

function delete($id){
	mysql_query("delete from purchases where purchase_id = '$id'");
}

function get_item_name($item_id){
	$query = mysql_query("select item_name as result from item where item_id= '$item_id'");
	$row = mysql_fetch_array($query);
	
	$result = ($row['result']);
	return $result;
}

function select_satuan_item($id)
{
	$query = mysql_query("SELECT a.item_satuan, b.satuan_name FROM item a 
							LEFT JOIN satuan b ON b.satuan_id = a.item_satuan
							WHERE a.item_id = '$id'
							UNION 
							SELECT c.satuan_konversi, d.satuan_name FROM konversi_item c
							LEFT JOIN satuan d ON d.satuan_id = c.satuan_konversi
							WHERE c.item_id = '$id'");
	return $query;
}
?>