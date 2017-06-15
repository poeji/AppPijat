<?php

function get_branch($id){
  $query = mysql_query("SELECT branch_name FROM branches WHERE branch_id = '$id'");
  $result = mysql_fetch_array($query);
  $row = $result['branch_name'];
  return $row;
}

function select($where){
  $query = mysql_query("SELECT a.*, b.*, c.branch_name FROM item_stocks a
                        LEFT JOIN items b ON b.item_id = a.item_id
                        LEFT JOIN branches c ON c.branch_id = a.branch_id
                        $where order by a.item_id");
  return $query;
}

function read_id($id,$branch_id){
  $query = mysql_query("SELECT a.*, b.*, c.branch_name FROM item_stocks a
                        JOIN items b ON b.item_id = a.item_id
                        LEFT JOIN branches c on c.branch_id =a.branch_id
                        where a.item_id = '$id' and a.branch_id = '$branch_id' ");
  $result = mysql_fetch_object($query);
  return $result;
}

function read_id2($id){
  $query = mysql_query("SELECT a.*, b.*, c.item_type_name, d.kategori_buku_name FROM item_stocks a
                        JOIN items b ON b.item_id = a.item_id
                        LEFT JOIN items_types c ON c.item_type_id = b.item_type
                        LEFT JOIN kategori_buku d ON d.kategori_buku_id = b.kategori_buku
                        where a.item_id = '$id'");
  $result = mysql_fetch_object($query);
  return $result;
}


function read_stock($id){
  $query = mysql_query("SELECT a.*, d.* FROM item_stocks a
                        left JOIN stock2 d on d.item_id = a.item_id
                        where a.item_id = '$id'");
  $result = mysql_fetch_object($query);
  return $result;
}

function delete($id,$branch_id){
  mysql_query("delete from item_stocks where item_id = '$id' and branch_id = '$branch_id'");
}

function update_stok($item_qty, $branch_id, $item_id){
  mysql_query("update item_stocks set item_stock_qty = '$item_qty' WHERE branch_id = '$branch_id' and item_id = '$item_id'");
}

 ?>
