<header class="mdl-layout__header">
 	<div class="mdl-layout__header-row">		      
      	<span class="mdl-layout-title">Quiz SNCT</span>	

      	<?php if ($_SESSION["logado"]) { ?>
      	<!-- Add spacer, to align navigation to the right -->
	      <div class="mdl-layout-spacer"></div>
	      <!-- Navigation. We hide it in small screens. -->
	      <nav class="mdl-navigation mdl-layout--large-screen-only">		        
	        <span class="mdl-navigation__link" href="">Seja bem-vindo(a), Fulano(a)</span>
	        <a class="mdl-navigation__link" href="index.php?logout=1">Sair</a>
	      </nav>

	    <?php } ?>

    </div>
</header>

<?php if ($_SESSION["logado"]) { ?>
<div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Menu</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="index.php">Dashboard</a>
      <a class="mdl-navigation__link" href="temas.php">Temas</a>
      <a class="mdl-navigation__link" href="perguntas.php">Perguntas</a>
      <a class="mdl-navigation__link" href="participantes.php">Participantes</a>
    </nav>
  </div>
 <?php } ?>