<?php
	//chama o arquivo de conexão com o bd
	include("conectar.php");

	$callback = $_REQUEST['callback'];

	$nome = $_REQUEST['nome'];
	$email = $_REQUEST['email'];
	 
	//consulta sql
	$query = mysqli_query($conexao, "INSERT INTO Contato (nome, email) values ('$nome', '$email')") or die(mysqli_error());

	header('Content-Type: text/javascript');

	echo $callback . '(' . 
		json_encode(array(
		"success" => mysqli_errno($conexao) == 0,
		"contatos" => array(
			"id" => mysqli_insert_id($conexao),
			"nome" => $nome,
			"email" => $email
		)
	)) . ');';
?>