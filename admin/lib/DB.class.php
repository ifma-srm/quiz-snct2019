<?php

require_once "config.php";

Class DB {

	var $con = null;

	public function __construct() {

		$this->con = mysqli_connect(DB_HOST, DB_USER, DB_PASS);

		mysqli_select_db($this->con, DB_NAME);

	}

	public function save($table, $post) {

		foreach($post as $key=>$item) {
			$post[$key] = "'" . $item . "'";
		}

		$insert = implode(", ", $post);

		$sql = "insert into $table values (null, $insert)";

		return mysqli_query($this->con, $sql);


	}

	public function update($table, $post, $condition) {

		$items = array();

		foreach($post as $key=>$item) {
			$items[] = "$key = '" . $item . "'";
		}

		$fields = implode(", ", $items);

		$sql = "update $table set $fields where $condition";
	
		return mysqli_query($this->con, $sql);


	}

	public function select($sql) {

		$query = mysqli_query($this->con, $sql);

		$resultado = array();

		while($linha = mysqli_fetch_assoc($query)) {
			$resultado[] = $linha;
		}

		return $resultado;

	}

	public function get($table, $id, $value) {

		$item = $this->select("select * from $table where $id = $value");
		return $item[0];

	}


}

?>