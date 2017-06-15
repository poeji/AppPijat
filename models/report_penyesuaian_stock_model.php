<?php

function select($id){
  $query = mysql_query("SELECT a.*, b.*, c.user_name, d.item_stock_qty, e.branch_name FROM penyesuaian_stock_cabang a
                        JOIN items b ON b.item_id = a.item_id
                        JOIN users c on c.user_id = a.user_id
                        LEFT JOIN item_stocks d on d.item_id = a.item_id
                        LEFT JOIN branches e on e.branch_id = a.branch_id
                        WHERE a.branch_id = '$id'");
  return $query;
}

?>
