<?php

session_start();

require_once "config.php";
require_once "classes/Quiz.class.php";

$quiz = new Quiz();
$quiz->checkSession();

$id_pergunta = $_GET["id_pergunta"];

if ($quiz->checkPost("resposta")) {

    $id_pergunta = $_POST["id_pergunta"];

    $quiz->postResposta();
    $quiz->redirect("respostas.php?id_pergunta=" . $id_pergunta);

}

if ($quiz->checkGet("id_resposta")) {

    $quiz->resetRespostas($id_pergunta);
    $quiz->marcarCorreta($_GET["id_resposta"]);
}

$pergunta = $quiz->db->get("perguntas", "id_pergunta", $id_pergunta);
$respostas = $quiz->listaRespostas($id_pergunta);

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
    		
	    	<section class="mdl-grid mdl-cell mdl-cell--12-col mdl-shadow--2dp">	    		

                
                   <div class="mdl-card mdl-cell mdl-cell--12-col">
                    
                    <div class="mdl-card__title">

                        <h1 class="mdl-card__title-text">Respostas</h1>
                        
                         <form class="mdl-cell mdl-cell--3-offset mdl-cell--6-col" action="respostas.php" method="post">

                            <h1 class="mdl-card__title-text"><?=$pergunta["pergunta"]?></h1>
                   
                            <br />

                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="resposta" type="text" id="resposta" />
                                <label class="mdl-textfield__label" for="pergunta">Insira uma resposta</label>
                            </div>

                            <br />

                            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-1">
                              <input type="checkbox" id="switch-1" class="mdl-switch__input" name="correta" value="1" />
                              <span class="mdl-switch__label">Resposta correta</span>
                            </label>

                            <br />
                            <br />


                            <input type="hidden" name="id_pergunta" value="<?=$pergunta["id_pergunta"]?>" />

                            <input type="hidden" name="quant_respostas" value="<?=count($respostas)?>" />

                            <button class="mdl-button mdl-button--raised mdl-button--primary mdl-js-button mdl-js-ripple-effect">
                                <i class="material-icons"></i>
                                Salvar
                            </button>                              
                         </form>

                         <div class="mdl-layout-spacer"></div>
                        <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
                            <i class="material-icons">add</i>
                        </button>

                    </div> 


                    <div>
                        <table class="mdl-data-table mdl-js-data-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Resposta</th>
                                <th>Correta?</th>                            
                                <th>Mudar Status</th>                                                                                             
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach($respostas as $key=>$item) { ?>
                                <tr>
                                    <td class="mdl-data-table__cell--center"><?=$item["id_resposta"]?></td>
                                    <td class="mdl-data-table__cell--center"><?=$item["resposta"]?></td>
                                    <td class="mdl-data-table__cell--center"><?=$item["correta"] == 1 ? "Sim":"Não"?></td>

                                    <td class="mdl-data-table__cell--center">
                                        <?php if ($item["correta"] == 0) { ?>
                                         <a href="respostas.php?id_resposta=<?=$item["id_resposta"]?>&id_pergunta=<?=$pergunta["id_pergunta"]?>" class="mdl-button mdl-button--raised mdl-button--accent mdl-js-button mdl-js-ripple-effect">
                                            <i class="material-icons"></i>
                                            Tornar Correta
                                        </a> 
                                        <?php } ?>
                                    </td>
                                    
                                </tr>
                                 <?php } ?>  
                                                              
                            </tbody>
                        </table>
                    </div>
                </div>
  	    	</section>

  		</main>

	</div>

	
</body>
</html>