<?php

function select($table_id){
	$query = mysql_query("select a.*, b.table_name
							  from transactions_tmp a
							  join tables b on b.table_id = a.table_id
							  where a.table_id = '".$table_id."'");
	return $query;
}

function select_item($table_id){
	$query = mysql_query("select b.*, c.menu_name,d.menu_type_name
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  join menus c on c.menu_id = b.menu_id
							  join menu_types d on d.menu_type_id = c.menu_type_id
							  where a.table_id = '".$table_id."'
							  and transaction_detail_status = '0'

							  ");
	return $query;
}
function updateprinted($tableid){
	$query = mysql_query("update widget_tmp wt
							inner join menus mn on
								wt.menu_id = mn.menu_id
							set wt.printed = 1
							where wt.table_id = ".$tableid );
}


?>
