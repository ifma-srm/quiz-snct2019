<?php

session_start();
require_once "config.php";
require_once "classes/Quiz.class.php";

if ($_GET["logout"] == 1) {
	unset($_SESSION["logado"]);
}

if (!empty($_POST)) {


	$quiz = new Quiz();

	$login = $quiz->login();

	if (!$login) {
		$_SESSION["flash_login_error"] = "Falha no login. Dados de acesso incorretos!";
	} else {
		$_SESSION["logado"] = true;
		$_SESSION["username"] = $login["nome"];

	}
	
	header("location: index.php");
	exit;
}

?>
<!DOCTYPE html>
<html>
<head>
	
	<?php include "includes/head.php"; ?>

</head>
<body>

	<div class="mdl-layout mdl-js-layout">
		 
		<?php include "includes/header.php"; ?>

		 <main class="mdl-layout__content">
	    	<div class="page-content">

    		<?php 

    			if (!empty($_SESSION["logado"])) {
    				include "app/dashboard.php"; 
    			} else {
    				include "app/login.php"; 
    			}
    			
    		?>

	    	</div>
  		</main>

	</div>

	
</body>
</html>