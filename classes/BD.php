<?php
class BD {
	private $host = "localhost";
	private $user = "admrent";
	private $password = "12345";
	private $database = "rent";
	private $conexao;

	function __construct(){
		$this->conexao = mysqli_connect($this->host, $this->user, $this->password, $this->database);
		mysqli_query($this->conexao, "set names 'utf8'");
	}

	function select($sql){
		// recebe um select qualquer, executa e devolve um array de resultados
		$retorno = mysqli_query($this->conexao, $sql);
		$arrayResultados = array();
		if(mysqli_num_rows($retorno) > 0){
			while($linha = mysqli_fetch_assoc($retorno)){
				$arrayResultados[] = $linha;
			}
		}
		return $arrayResultados;
	}

	function query($sql){
		return mysqli_query($this->conexao, $sql);
	}
}
?>