<?php

require_once "admin/config.php";
require_once PATH."classes/Quiz.class.php";

$quiz = new Quiz();
$temas = $quiz->dropdownTemas();

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
</head>
<body>

	<div class="demo-blog mdl-layout mdl-js-layout has-drawer is-upgraded">
      <main class="mdl-layout__content">
        <div class="demo-blog__posts mdl-grid">
        	<div class="mdl-card mdl-cell mdl-cell--4-col something-else">
           		
			    <img src="assets/images/3.png" />
				
            
         	</div>	
	          <div class="mdl-card mdl-cell mdl-cell--8-col quiz">

	          	<div class="mdl-card__title">
				    <h2 class="mdl-card__title-text">Escolha um Tema</h2>
				</div>

	            <div class="mdl-card__supporting-text themes">

	            	<?php foreach($temas as $key=>$item) { ?>
                
	              	<?php if ($key == 0 or $key % 2 == 0) { ?>
	              	<div>
	              	<?php } ?>	
	            	
	            	<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-<?=$item["id_tema"]?>">
					  <input type="radio" id="option-<?=$item["id_tema"]?>" class="mdl-radio__button" name="options" value="<?=$item["id_tema"]?>"<?php if ($key == 0) {echo "checked";}?> onclick="setTema(<?=$item["id_tema"]?>)">
					  <span class="mdl-radio__label"><?=$item["tema"]?></span>
					</label>				
					
					
					<?php if ($key == count($temas)-1 or $key % 2 == 1) { ?>
	              	</div>
	              	<?php } ?>	
					

					<?php } ?>

	            </div>
	            <div class="mdl-card__supporting-text">
	              
	             	 <form action="quiz.php" method="post">
					  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					    <input class="mdl-textfield__input" name="nome" type="text" id="nome">
					    <input type="hidden" id="tema" name="id_tema" value="<?=$temas[0]["id_tema"]?>">
					    <label class="mdl-textfield__label" for="nome">Qual é o seu nome?</label>
					    <span class="mdl-textfield__error">Esta informação é obrigatória!</span>

					  </div>

					  <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">Iniciar</button>

					</form>
	              
	            </div>
	          </div>
          </div>
         </main>
        </div>
          
   
    <script src="admin/js/material.min.js"></script>
    <script src="assets/js/quizsnct.js"></script>
  </body>
  
</html>

