<?php include "cabecalhoAdm.php"; ?>
<div class="container">
	<main>
	<?php
	require "../classes/Produto.php";
	require "../classes/Fabricante.php";
	require "../includes/functions.php";

	if(isset($_GET['acao'])){
		switch($_GET['acao']){

			case "cadastro":
				$titulo = "Cadastrar Produto";
				if(isset($_POST['cadastrar'])){
					//dados foram submetidos
					$dados = array();
					$dados['nome'] = $_POST['nome'];
					$dados['idFabricante'] = ($_POST['idFabricante'] == 0)? 'NULL' : $_POST['idFabricante'];
					$dados['imagem'] = (!empty($_FILES['arquivo']['name']))? $_FILES['arquivo']['name']:"";
					$dados['descricao'] = $_POST['descricao'];
					$dados['tensao'] = $_POST['tensao'];
					$dados['catMarcenaria'] = isset($_POST['marcenaria'])? 1 : 0;
					$dados['catJardinagem'] = isset($_POST['jardinagem'])? 1 : 0;
					$dados['catLimpeza'] = isset($_POST['limpeza'])? 1 : 0;
					$dados['catEscritorio'] = isset($_POST['escritorio'])? 1 : 0;
					$dados['catMecanica'] = isset($_POST['mecanica'])? 1 : 0;
					$dados['catOutros'] = isset($_POST['outros'])? 1 : 0;
					$dados['qtde'] = $_POST['quantidade'];
					$dados['valor'] = $_POST['valor'];
					$dados['desconto'] = $_POST['desconto'];
					$produto = new Produto();
					$resultado = $produto->cadastrar($dados);
					if($resultado){
						$mensagem = "O produto <strong>{$dados['nome']}</strong> foi cadastrado com sucesso";
						// TENTA O UPLOAD
						if(!move_uploaded_file($_FILES['arquivo']['tmp_name'], "../img/produtos/{$_FILES['arquivo']['name']}")){
							$mensagem.="<br>No entanto, a imagem não pôde ser enviada. Contate o suporte";
						}
					}
					else{
						$mensagem = "Erro. O produto <strong>{$dados['nome']}</strong> não foi cadastrado";
						$mensagem .= $produto->erro();
					}
					include "views/produtoConfirmacao.php";
				}
				else{
					include "views/produtoCadastro.php";
				}
				break;

			case "altera":
				$titulo = "Alteração de Produto";

				break;
			case "exclui":
				$titulo = "Exclusão de Produto";

				break;		
		}
	}
	else {
		$titulo = "Relatório de Produtos";
		$produto = new Produto();
		$lista = $produto->listarTodos();
		include "views/produtoIndex.php";
	}
	?>

	</main>
	<br><br><br>
</div>
<?php include "rodapeAdm.php";?>
