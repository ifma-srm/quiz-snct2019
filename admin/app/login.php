<h2 id="welcome">Bem-vindo(a)! Entre no sistema</h2>

<div class="mdl-grid">

	<div id="login" class="mdl-cell mdl-cell--6-col mdl-cell--3-offset">
		
		<form action="index.php" id="form-login" method="post">

			<h3 class="mdl-layout-title">Informe os dados abaixo para entrar no sistema</h3>

			<p style="color:red;text-align: center;"><?=$_SESSION["flash_login_error"]; unset($_SESSION["flash_login_error"])?></p>

		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" name="email" type="text" id="log">
		    <label class="mdl-textfield__label" for="log">Nome de Usuário (E-mail ou ID)</label>
		  </div>
		  <br />
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" name="senha" type="password" id="pass">
		    <label class="mdl-textfield__label" for="pass">Informe a sua senha</label>
		  </div>
		  <br />

		  <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
			  Entrar
			</button>

		 <button type="reset" class="mdl-button mdl-js-button mdl-button--raised mdl-button--raised">
			  Cancelar
			</button>

		</form>

		
	</div>

</div>