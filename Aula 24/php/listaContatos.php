<?php
	//chama o arquivo de conexão com o bd
	include("conectar.php");
	
	switch ($_SERVER['REQUEST_METHOD']) {

		case 'GET':
			listaContatos();
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
?>