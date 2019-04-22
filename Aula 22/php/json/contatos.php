<?php

	//chama o arquivo de conexão com o bd
	include("conectar.php");

	switch ($_SERVER['REQUEST_METHOD']) {

		case 'GET':
			listaContatos();
			break;
		
		case 'POST':
			criaContato();
			break;

		case 'PUT':
			atualizaContato();
			break;
			
		case 'DELETE':
			deletaContato();
			break;		
	}

	function listaContatos() {

		//consulta sql
		include("conectar.php");
	 
	//consulta sql
	$query = mysqli_query($conexao, "SELECT * FROM contato") or die(mysqli_error($conexao));
		 
		//faz um looping e cria um array com os campos da consulta
		$rows = array('contatos' => array());
		while($contato = mysqli_fetch_assoc($query)) {
		    $rows['contatos'][] = $contato;
		}

		//encoda para formato JSON
		echo json_encode($rows);
	}

	function criaContato() {

		include("conectar.php");

		$info = $_POST['contatos'];

		$data = json_decode(stripslashes($info));

		$nome = $data->nome;
		$email = $data->email;
		 
		//consulta sql
		$query = mysqli_query($conexao, "INSERT INTO Contato (nome, email) values ('$nome', '$email')") or die(mysqli_error($conexao));
		 
		echo json_encode(array(
			"success" => mysqli_errno($conexao) == 0,
			"contatos" => array(
				"id" => mysqli_insert_id($conexao),
				"nome" => $nome,
				"email" => $email
			)
		));
	}

	function atualizaContato() {

		include("conectar.php");

		parse_str(file_get_contents("php://input"), $post_vars);

		$info = $post_vars['contatos'];

		$data = json_decode(stripslashes($info));

		$nome = $data->nome;
		$email = $data->email;
		$id = $data->id;
		 
		//consulta sql
		$query = mysqli_query($conexao, "UPDATE Contato SET nome = '$nome', email = '$email' WHERE id='$id'") or die(mysqli_error($conexao));
		 
		echo json_encode(array(
			"success" => mysqli_errno($conexao) == 0
		));
	}

	function deletaContato() {

		include("conectar.php");

		parse_str(file_get_contents("php://input"), $post_vars);

		$info = $post_vars['contatos'];

		$data = json_decode(stripslashes($info));

		$id = $data->id;
		 
		//consulta sql
		$query = mysqli_query($conexao, "DELETE FROM Contato WHERE id='$id'") or die(mysqli_error($conexao));

		
		 
		echo json_encode(array(
			"success" => mysqli_errno($conexao) == 0
		));
	}
?>