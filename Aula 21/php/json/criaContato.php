<?php
	//chama o arquivo de conexão com o bd
	include("../conectar.php");

	$info = $_POST['contatos'];

	$data = json_decode(stripslashes($info));

	
	$nome = $data->nome;
	$email = $data->email;
	 
	//consulta sql
	$query = mysqli_query($conexao,"INSERT INTO Contato (nome, email) values ('$nome', '$email')") or die (mysqli_error());
	 
	echo json_encode(array(
		"success" => mysqli_errno($conexao) == 0,
		"contatos" => array(
			"id" => mysqli_insert_id($conexao),
			"nome" => $nome,
			"email" => $email
		)
	));
?>