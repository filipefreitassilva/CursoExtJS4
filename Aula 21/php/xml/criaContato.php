<?php
	
	header('Content-type: text/xml'); //MUITO IMPORTANTE!!!

	//chama o arquivo de conexão com o bd
	include("../conectar.php");

	$dom = new DOMDocument();
	$dom->loadXML(file_get_contents('php://input'));

	$contatos = simplexml_import_dom($dom);

	$nome = $contatos->contato->nome;
	$email = $contatos->contato->email;
	 
	//consulta sql
	$query = mysqli_query($conexao, "INSERT INTO Contato (nome, email) values ('$nome', '$email')");

	$xml = '<?xml version="1.0" encoding="iso-8859-1" ?>';
	$xml.="<contatos>";

	$xml.="<success>" . mysqli_errno($conexao) == 0 . "</success>";

	
    $xml.=   "<contato>";
    $xml.=      "<id>" . mysqli_insert_id($conexao). "</id>";
    $xml.=      "<nome>" . $nome . "</nome>";
    $xml.=      "<email>" . $email . "</email>";
    $xml.=   "</contato>";


	$xml.="</contatos>";
	      
	//envia resultado do XML
	echo $xml;
?>