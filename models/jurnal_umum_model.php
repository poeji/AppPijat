<?php

function select($where){
	$query = mysql_query("select a.*, b.journal_type_name, c.branch_name
							from journals a 
							join journal_types b on b.journal_type_id = a.journal_type_id
							join branches c on c.branch_id = a.branch_id
							where a.journal_type_id = 3 or a.journal_type_id = 4
							$where
							
							order by journal_id");
	return $query;
}


function select_journal_type(){
	$query = mysql_query("select * from journal_types where journal_type_id = 3 or journal_type_id = 4 order by journal_type_id");
	return $query;
}

function select_bank(){
	$query = mysql_query("select a.* from banks a order by bank_id");
	return $query;
}

function select_branch($where){
	$query = mysql_query("select a.* from branches a $where order by branch_id");
	return $query;
}

function read_id($id){
	$query = mysql_query("select a.*
			from journals a
			
			where journal_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into journals values(".$data.")");
}

function update($data, $id){
	mysql_query("update journals set ".$data." where journal_id = '$id'");
}

function delete($id){
	mysql_query("delete from journals where journal_id = '$id'");
}


function update_data_id($id){
	mysql_query("update journals set data_id = '$id' where journal_id = '$id'");
}



?>