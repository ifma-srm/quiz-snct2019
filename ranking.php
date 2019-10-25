<?php

require_once "admin/config.php";
require_once PATH."classes/Quiz.class.php";

$quiz = new Quiz();

if (!empty($_GET["id"])) {

	$quiz->db->update("participantes", array("pontos"=> $_GET["s"]), "id_participante = {$_GET["id"]}");
	$participante = $quiz->db->get("participantes","id_participante", $_GET["id"]);

	$id_tema = $participante["id_tema"];

	$ranking = $quiz->getRankingPorTema($id_tema);


}

?>

<h4 class="rank-title">Ranking do tema <?=$ranking[0]["tema"]?></h4>

<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp ranking">
	<thead>
	<tr>
		<th>#</th>
		<th>Pontos</th>
		<th class="mdl-data-table__cell--non-numeric">Participante</th>
	</tr>
</thead>
	 <tbody>
	 <?php foreach($ranking as $key=>$item) { ?>	
	<tr>
		<td width="10%"><strong><?=$key+1?>º</strong></td>
		<td width="10%"><?=$item["pontos"]?></td>
		<td class="mdl-data-table__cell--non-numeric"><?=$item["nome"]?></td>
	</tr>
	<?php } ?>
	
 </tbody>
</table>