<?php
	//chama o arquivo de conexão com o bd
	include("conectar.php");

	$callback = $_REQUEST['callback'];
	 
	//consulta sql
	$query = mysqli_query($conexao, "SELECT * FROM Contato") or die(mysqli_error());
	 
	//faz um looping e cria um array com os campos da consulta
	$rows = array('contatos' => array());
	while($contato = mysqli_fetch_assoc($query)) {
	    $rows['contatos'][] = $contato;
	}

	header('Content-Type: text/javascript');

	//encoda para formato JSON
	echo $callback . '(' . json_encode($rows) . ');';
?>