<?php
include "classes/Cliente.php";
$client = new Cliente();
$dados = $client->autenticar($_POST['usuario']);

if(empty($dados)){ // usuario nao existe
	header("Location: login.php?erro=1");
}
else{ // usuario existe
	$pass = md5($_POST['senha']);
	if($pass != $dados[0]['senha']){
		header("Location: login.php?erro=2");
	}
	else{ // login e senha corretos
		session_start(); // abre uma nova sessao
		$_SESSION['nome'] = $dados[0]['nome']; 
		$_SESSION['id'] =  $dados[0]['id'];
		$_SESSION['endereco'] = $dados[0]['endereco'] .", ".$dados[0]['bairro'];
		header("Location: index.php");
	}
}
?>