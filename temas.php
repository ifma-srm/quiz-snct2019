<?php

session_start();


if (!$_SESSION["logado"]) {	
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
    		
	    	<section class="mdl-grid mdl-cell mdl-cell--12-col mdl-shadow--2dp">	    		

                <div class="mdl-card mdl-cell mdl-cell--12-col">
                    <div class="mdl-card__title">
                        <h1 class="mdl-card__title-text">Temas</h1>
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
                                <tr>
                                    <td class="mdl-data-table__cell--center">1</td>
                                    <td class="mdl-data-table__cell--center">Cachoeira do Itapecuru</td>
                                    <td class="mdl-data-table__cell--center">Letícia Oliveira</td>
                                    <td class="mdl-data-table__cell--center">06/09/2019 às 11h06</td>
                                    <td class="mdl-data-table__cell--center">5</td>
                                </tr>  
                                 <tr>
                                    <td class="mdl-data-table__cell--center">2</td>
                                    <td class="mdl-data-table__cell--center">Santuário de Pedra Caída</td>
                                    <td class="mdl-data-table__cell--center">Laura Dantas</td>
                                    <td class="mdl-data-table__cell--center">07/09/2019 às 17h45</td>
                                    <td class="mdl-data-table__cell--center">3</td>
                                </tr>                               
                            </tbody>
                        </table>
                    </div>
                </div>
  	    	</section>

  		</main>

	</div>

	
</body>
</html>