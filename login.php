<?php include "includes/cabecalho.php";?>
	<!-- area central com 3 colunas -->
	<div class="container">
	<?php include "includes/menu_lateral.php"; ?>	

		<section class="col-2">
			<h2>Minha conta</h2>
			<div>
				<form action="autenticacao.php" method="post" id="form-contato">
					<fieldset>
						<legend><strong>Já possui cadastro?</strong></legend>
					    <div class="form-item">
					      <label for="usuario" class="rotulo">Login ou e-mail:</label>
					      <input type="text" id="usuario" name="usuario" size="50">   
					    </div>
					    <div class="form-item">
					      <label for="senha" class="rotulo">Senha:</label>
					      <input type="password" id="senha" name="senha" size="50">   
					    </div>	
					    <div class="form-item">
					    	<label>
					    		<input type="checkbox" name="lembrar">Mantenha-me conectado
					    	</label>
					    </div>
					    <div class="form-item" style="color: red">
					    	<?php
					    	if(isset($_GET['erro'])){
					    		if($_GET['erro'] == 1)
					    			echo "Login ou e-mail incorreto";
					    		else
					    			echo "Senha incorreta";
					    	}
					    	?>
					    </div>				    				    			
					    <div class="form-item">
							<input type="submit" id="botao" value="Entrar">
					    </div>
					</fieldset>
					<br>
					<fieldset>
						<legend>
							<strong>Ainda não é nosso cliente?</strong>
						</legend>
						<p>
							<a href="cad_cliente.php">
							Cadastre-se</a> agora para utilizar nossos serviços
						</p>
					</fieldset>
				</form>
			</div>			
		</section>
		<?php include "includes/mais_vendidos.php"; ?>
	</div>
	<!-- fim area central -->
	<?php include "includes/rodape.php"; ?>
	