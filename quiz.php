<?php

require_once "admin/config.php";
require_once PATH."classes/Quiz.class.php";

$quiz = new Quiz();

$id_participante = $quiz->postParticipante();

$id_tema = $_POST["id_tema"];

$tema = $quiz->db->get("temas", "id_tema", $id_tema);

$perguntas = $quiz->perguntasPorTema($id_tema);

$json_perguntas = json_encode($perguntas);


?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

<title>Quiz SNCT</title>

<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
<link rel="stylesheet" href="assets/css/material.lime-orange.min.css">

<link rel="stylesheet" href="admin/css/material.icon.css">
<link rel="stylesheet" href="assets/css/style.css">
<script src="admin/js/material.min.js"></script>
<script type="text/javascript">
	var questions = <?=$json_perguntas?>;
	var id_user = <?=$id_participante?>;
	var current = 0;
</script>
</head>
<body>

	<div class="demo-blog mdl-layout mdl-js-layout has-drawer is-upgraded">
      <main class="mdl-layout__content">
        <div class="demo-blog__posts mdl-grid">
        	<div class="mdl-card mdl-cell mdl-cell--4-col something-else">
           		
				<h3 class="points">Pontuação: <span id="score">0</span></h3>

				<a href="index.php">
			    <img src="assets/images/3.png" />
			    </a> <br />

			
            
         	</div>	
	          <div class="mdl-card mdl-cell mdl-cell--8-col quiz play">

	          	<div class="mdl-card__title" id="userinfo">
				    <h2 class="mdl-card__title-text" id="user">

				    	<strong><?=$_POST["nome"]?></strong> respondendo sobre 
				    	<em><?=$tema["tema"]?></em>
				    
				    </h2>
				</div>

	            <div class="mdl-card__supporting-text questions" id="question_text">
	            	
	            </div>
	            <div class="mdl-card__supporting-text answers" id="ranking">
	              
	              <ul id="question_options">
	              	
	              </ul>
	             	 
	            </div>
	          </div>
          </div>
         </main>
        </div>
          
   
    <script src="admin/js/material.min.js"></script>
    <script src="assets/js/confetti.js"></script>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/quizsnct.js"></script>
    	
    	
    	
  </body>
  
</html>

