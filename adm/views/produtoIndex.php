<h2><?=$titulo;?></h2>
<p>| <a href="produtoController.php?acao=cadastro">
inserir novo</a> |</p>
<table border="1" style="border-collapse: collapse">
	<tr>
		<th>Nome</th>
		<th>Fabricante</th>
		<th>Valor da locação</th>
		<th>Ação</th>
	</tr>
	<?php
	if(empty($lista)){
		echo "<tr><td colspan='4'>Nenhum produto cadastrado</td></tr>";
	}
	else{
		foreach ($lista as $produto){
			?>
			<tr>
				<td><?=$produto['nomeProduto'];?></td>
				<td><?=$produto['nomeFabricante'];?></td>
				<td><?=formataPreco($produto['valorFinal']);?></td>
				<td>
				<a href="produtoController.php?acao=altera&id=<?=$produto['idProduto'];?>">alterar</a> | 
				<a href="produtoController.php?acao=exclui&id=<?=$produto['idProduto'];?>">excluir</a></td>
			</tr>
			<?php
		}
	}
	?>
</table>