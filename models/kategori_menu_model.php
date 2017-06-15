<?php

	function select(){
		$query = mysql_query("SELECT * FROM kategori_utama ORDER BY id_kategori_utama");
		return $query;
	}
        
        function select_sub(){
		$query_2 = mysql_query("SELECT a.kategori_utama_name, b.*
                                            FROM kategori_utama a
                                            JOIN menu_types b
                                            ON b.id_kategori_utama = a.id_kategori_utama
                                            ");
		return $query_2;
	}
        function select_kategori_type(){
		$query = mysql_query("SELECT * FROM kategori_utama WHERE STATUS = 1");
		return $query;
	}
	function read_id($id){
		$query = mysql_query("select *
				from kategori_utama
				where id_kategori_utama = '$id'");
		$result = mysql_fetch_object($query);
		return $result;
	}
        function read_id_2($id){
		$query = mysql_query("SELECT a.kategori_utama_name, b.*
                                            FROM kategori_utama a
                                            JOIN menu_types b
                                            ON b.id_kategori_utama = a.id_kategori_utama
				where menu_type_id = '$id'");
		$result = mysql_fetch_object($query);
		return $result;
	}
        function status($id){
                $result = mysql_query("select status
				from kategori_utama
				where id_kategori_utama = '$id'");
		return $result;
        }

	function create($data){
		mysql_query("insert into kategori_utama values(".$data.")");
	}
        
        function create2($data){
		mysql_query("insert into menu_types values(".$data.")");
	}

	function update($data, $id){
                mysql_query("update kategori_utama set ".$data." where id_kategori_utama = '$id'");
        }
        
        function update2($data, $id){
                mysql_query("update menu_types set ".$data." where menu_type_id = '$id'");
        }

	function delete($id){
		mysql_query("delete from kategori_utama where id_kategori_utama = '$id'");
                mysql_query("delete from menu_types where id_kategori_utama = '$id'");
	}
        function delete2($id){
		mysql_query("delete from menu_types where menu_type_id = '$id'");
	}

?>
