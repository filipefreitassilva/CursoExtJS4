<?php
	header('Content-type: text/xml'); //MUITO IMPORTANTE!!!

	//chama o arquivo de conexão com o bd
	include("../conectar.php");
	 
	//consulta sql
	$query = mysqli_query($conexao, "SELECT * FROM Contato") or die(mysqli_error($conexao));
	 
	//faz um looping e cria um xml com os campos da consulta
	$xml = '<?xml version="1.0" encoding="iso-8859-1" ?>';
	$xml.="<contatos>";

	$rows = array();
	while($contato = mysqli_fetch_assoc($query)) {
	    $xml.=   "<contato>";
	    $xml.=      "<id>" . $contato['id'] . "</id>";
	    $xml.=      "<nome>" . $contato['nome'] . "</nome>";
	    $xml.=      "<email>" . $contato['email'] . "</email>";
	    $xml.=   "</contato>";
	}

	$xml.="</contatos>";
	      
	//envia resultado do XML
	echo $xml;

?>