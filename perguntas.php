<?php

session_start();

if (!$_SESSION["logado"]) {	
	header("location: index.php");
	exit;
}


require_once "lib/DB.class.php";

$db = new DB();

$temas = $db->select("select * from temas order by tema");

$perguntas = $db->select("select p.*, t.tema, u.nome from perguntas p, temas t, usuarios u where p.id_tema = t.id_tema and p.id_usuario = u.id_usuario");

if (!empty($_POST["pergunta"])) {

    $post = array('pergunta' => $_POST["pergunta"],
                    'data_cadastro' => date("Y-m-d H:i:s"),
                    'id_usuario' => 1,
                    'id_tema' => $_POST["tema"]
                );



    $db->save("perguntas", $post);

    header("location: perguntas.php");
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
    		
	    	<section class="mdl-grid mdl-cell mdl-cell--12-col mdl-shadow--2dp">	    		

                
                   <div class="mdl-card mdl-cell mdl-cell--12-col">
                    
                    <div class="mdl-card__title">

                        <h1 class="mdl-card__title-text">Perguntas</h1>

                         <form class="mdl-cell mdl-cell--3-offset mdl-cell--6-col" action="perguntas.php" method="post">
                   
                             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <select class="mdl-textfield__input" id="tema" name="tema">
                                  <option></option>

                                  <?php foreach($temas as $key=>$item) { ?>

                                    <option value="<?=$item["id_tema"]?>"><?=$item["tema"]?></option>

                                  <?php } ?>
                                  
                                </select>
                                <label class="mdl-textfield__label" for="octane">Qual o tema da pergunta?</label>
                              </div>
                            
                            <br />

                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="pergunta" type="text" id="pergunta" />
                                <label class="mdl-textfield__label" for="pergunta">O que deseja perguntar?</label>
                            </div>

                            <br />

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
                                <th>Tema</th>
                                <th>Pergunta</th>
                                <th>Cadastrado por</th>
                                <th>Data de Cadastro</th>
                                <th>Quantidade de Perguntas</th>                                                             
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach($perguntas as $key=>$item) { ?>
                                <tr>
                                    <td class="mdl-data-table__cell--center"><?=$item["id_pergunta"]?></td>
                                    <td class="mdl-data-table__cell--center"><?=$item["tema"]?></td>
                                    <td class="mdl-data-table__cell--center"><?=$item["pergunta"]?></td>
                                    <td class="mdl-data-table__cell--center"><?=$item["nome"]?></td>
                                    <td class="mdl-data-table__cell--center"><?=$item["data_cadastro"]?></td>
                                    <td class="mdl-data-table__cell--center">0</td>
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