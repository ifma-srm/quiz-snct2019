<?php

session_start();

if (!$_SESSION["logado"]) {	
	header("location: index.php");
	exit;
}


require_once "lib/DB.class.php";

$db = new DB();

$temas = $db->select("select t.*, u.nome, count(p.id_tema) as quantidade from temas t, usuarios u, perguntas p where t.id_usuario = u.id_usuario and t.id_tema = p.id_tema group by p.id_tema");

if (!empty($_POST["tema"])) {

    $post = array('tema' => $_POST["tema"],
                    'data_cadastro' => date("Y-m-d H:i:s"),
                    'id_usuario' => 1
                );

    $db->save("temas", $post);

    header("location: temas.php");
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

                        <h1 class="mdl-card__title-text">Temas</h1>

                         <form class="mdl-cell mdl-cell--3-offset mdl-cell--6-col" action="temas.php" method="post">

                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="tema" type="text" id="tema" />
                                <label class="mdl-textfield__label" for="tema">Nome do Tema</label>
                            </div>
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
  	    	</section>

  		</main>

	</div>

	
</body>
</html>