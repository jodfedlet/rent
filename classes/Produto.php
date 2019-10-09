<?php
require_once "BD.php";
class Produto{
	private $conexao;

	function __construct(){
		$this->conexao = new BD();
	}

	function filtroCategoria($cat){
		$sql = "SELECT * FROM produto WHERE $cat IS TRUE";
		return $this->conexao->select($sql);
	}

	function filtroBusca($palavraChave){
		$sql = "SELECT * FROM produto WHERE nome LIKE '%$palavraChave%' ORDER BY nome";
		return $this->conexao->select($sql);
	}

	function filtroNovidades(){
		$sql = "SELECT * FROM produto ORDER BY id DESC LIMIT 5";
		return $this->conexao->select($sql);		
	}

	function consultaProduto($id){
		$sql = "SELECT produto.id as idProduto, produto.nome as nomeProduto, imagem, descricao, tensao, catMarcenaria, catJardinagem, catLimpeza, catEscritorio, catMecanica, catOutros, qtde, valor, desconto, (valor-desconto) as valorFinal, fabricante.id as idFabricante, fabricante.nome as nomeFabricante FROM produto INNER JOIN fabricante ON produto.idFabricante = fabricante.id WHERE produto.id = $id";
		return $this->conexao->select($sql);	
	}

	function listarTodos(){
		$sql = "SELECT produto.id as idProduto, produto.nome as nomeProduto, imagem, descricao, tensao, catMarcenaria, catJardinagem, catLimpeza, catEscritorio, catMecanica, catOutros, qtde, valor, desconto, (valor-desconto) as valorFinal, fabricante.id as idFabricante, fabricante.nome as nomeFabricante FROM produto INNER JOIN fabricante ON produto.idFabricante = fabricante.id order by produto.nome";
		return $this->conexao->select($sql);	
	}	
}
?>