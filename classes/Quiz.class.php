<?php

require_once "config.php";
require_once "lib/DB.class.php";

class Quiz {

	var $db = null;

	public function __construct() {

		$this->db = new DB();	

	}

	public function listaTemas() {

		return  $this->db->select("select t.*, u.nome, count(p.id_tema) as quantidade from temas t inner join usuarios u on (u.id_usuario = t.id_usuario) left outer join perguntas p on (p.id_tema = t.id_tema) group by t.id_tema");

	}

	public function dropdownTemas() {

		return $this->db->select("select * from temas order by tema");

	}

	public function listaPerguntas() {

		return $this->db->select("select p.*, t.tema, u.nome, count(id_resposta) as quantidade from perguntas p inner join temas t on (p.id_tema = t.id_tema) inner join usuarios u on (p.id_usuario = u.id_usuario) left outer join respostas r on (p.id_pergunta = r.id_pergunta) group by id_pergunta order by id_pergunta");

	}

	public function postResposta() {

		if ($_POST["quant_respostas"] == 0) {
	        $_POST["correta"] = 1;
	    }


	    $post = array('id_pergunta' => $_POST["id_pergunta"],
	                    'resposta' => $_POST["resposta"],
	                    'correta' => (empty($_POST["correta"]) ? 0:1)
	                );

	     if ($this->checkPost("correta")) {

	        $this->db->update("respostas", array("correta"=> 0 ), "id_pergunta = " . $_POST["id_pergunta"]);

	    }



    	$this->db->save("respostas", $post);

	}

	public function listaRespostas($id) {

		return $this->db->select("select * from respostas where id_pergunta = $id");

	}

	public function resetRespostas($id_pergunta) {

		$this->db->update("respostas", array("correta"=> 0 ), "id_pergunta = $id_pergunta");

	}

	public function marcarCorreta($id_resposta) {

		$this->db->update("respostas", array("correta"=> 1 ), "id_resposta = $id_resposta");
	}

	public function postTema() {

		 $post = array('tema' => $_POST["tema"],
                    'data_cadastro' => date("Y-m-d H:i:s"),
                    'id_usuario' => 1
                );

   		$this->db->save("temas", $post);

	}

	public function postPergunta() {

		$post = array('pergunta' => $_POST["pergunta"],
                    'data_cadastro' => date("Y-m-d H:i:s"),
                    'id_usuario' => 1,
                    'id_tema' => $_POST["tema"]
                );

   		 $this->db->save("perguntas", $post);

	}

	public function redirect($url) {

		 header("location: $url");
   		 exit;

	}

	public function checkSession() {

		if (!$_SESSION["logado"]) {	
			$this->redirect("index.php");
		}


	}

	public function debug($var) {

		echo "<pre>";
		var_dump($var);
		echo "</pre>";
		exit;

	}

	public function checkPost($param) {

		return !empty($_POST["$param"]);

	}

	public function checkGet($param) {

		return !empty($_GET["$param"]);

	}



}

?>