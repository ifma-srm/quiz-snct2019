<?php

session_start();

require_once "classes/Quiz.class.php";

$quiz = new Quiz();

$quiz->checkSession();

$temas = $quiz->listaTemas();

if ($quiz->checkPost("tema")) {

    $quiz->postTema();
    $quiz->redirect("temas.php");

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
    		
	    	<section class="mdl-grid mdl-cell mdl-cell--12-col mdl-shadow--2dp">	    		   
                <div class="mdl-card mdl-cell mdl-cell--12-col">

                    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">

                        <div class="mdl-tabs__tab-bar">
                              <a href="#listagem" class="mdl-tabs__tab is-active">Listagem</a>
                              <a href="#form" class="mdl-tabs__tab">Formulário</a>                             
                        </div>

                        <div class="mdl-tabs__panel is-active" id="listagem">

                            <div class="mdl-card__title">

                              <h1 class="mdl-card__title-text">Temas - Listagem</h1>

                            </div>

                            <div>
                                <table class="mdl-data-table mdl-js-data-table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome do Tema</th>
                                        <th>Cadastrado por</th>
                                        <th>Data de Cadastro</th>
                                        <th>Quantidade de Perguntas</th>                                                             
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($temas as $key=>$item) { ?>
                                        <tr>
                                            <td class="mdl-data-table__cell--center"><?=$item["id_tema"]?></td>
                                            <td class="mdl-data-table__cell--center"><?=$item["tema"]?></td>
                                            <td class="mdl-data-table__cell--center"><?=$item["nome"]?></td>
                                            <td class="mdl-data-table__cell--center"><?=$item["data_cadastro"]?></td>
                                            <td class="mdl-data-table__cell--center"><?=$item["quantidade"]?></td>
                                        </tr>
                                         <?php } ?>  
                                                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mdl-tabs__panel" id="form">

                            <div class="mdl-card__title">



                              <h1 class="mdl-card__title-text">Temas - Formulário</h1>

                            </div>

                             <form class="mdl-cell mdl-cell--1-offset mdl-cell--6-col" action="temas.php" method="post">

                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" name="tema" type="text" id="tema" />
                                            <label class="mdl-textfield__label" for="tema">Nome do Tema</label>
                                        </div>
                                        <button class="mdl-button mdl-button--raised mdl-button--primary mdl-js-button mdl-js-ripple-effect">
                                            <i class="material-icons"></i>
                                            Salvar
                                        </button>                              
                                     </form>

                            </div>
                        </div>

                </div>
                    
                    
  	    	</section>

  		</main>

	</div>

	
</body>
</html>