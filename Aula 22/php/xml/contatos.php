<?php

	header('Content-type: text/xml'); //MUITO IMPORTANTE!!!

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

		include("conectar.php");

		//consulta sql
		$query = mysqli_query($conexao, "SELECT * FROM Contato") or die(mysqli_error());
		 
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
	}

	function criaContato() {

		include("conectar.php");

		$dom = new DOMDocument();
		$dom->loadXML(file_get_contents('php://input'));

		$contatos = simplexml_import_dom($dom);

		$nome = $contatos->contato->nome;
		$email = $contatos->contato->email;
		 
		//consulta sql
		$query = mysqli_query($conexao, "INSERT INTO Contato (nome, email) values ('$nome', '$email')") or die(mysqli_error());

		

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
	}

	function atualizaContato() {

		include("conectar.php");

		$dom = new DOMDocument();
		$dom->loadXML(file_get_contents('php://input'));

		$contatos = simplexml_import_dom($dom);

		$nome = $contatos->contato->nome;
		$email = $contatos->contato->email;
		$id = $contatos->contato->id;
		 
		//consulta sql
		$query = mysqli_query($conexao, "UPDATE Contato SET nome = '$nome', email = '$email' WHERE id='$id'") or die(mysqli_error());

		

		$xml = '<?xml version="1.0" encoding="iso-8859-1" ?>';
		$xml.="<contatos>";

		$xml.="<success>" . mysqli_errno($conexao) == 0 . "</success>";

		$xml.="</contatos>";
		      
		//envia resultado do XML
		echo $xml;
	}

	function deletaContato() {

		include("conectar.php");

		$dom = new DOMDocument();
		$dom->loadXML(file_get_contents('php://input'));

		$contatos = simplexml_import_dom($dom);
		
		$id = $contatos->contato->id;
		 
		//consulta sql
		$query = mysqli_query($conexao, "DELETE FROM Contato WHERE id=%d") or die (mysqli_error());


		$xml = '<?xml version="1.0" encoding="iso-8859-1" ?>';
		$xml.="<contatos>";

		$xml.="<success>" . mysqli_errno($conexao) == 0 . "</success>";

		$xml.="</contatos>";
		      
		//envia resultado do XML
		echo $xml;
	}
?>