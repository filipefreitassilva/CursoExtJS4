<?php
//connect to db
include("conexao.php");
 
//sql query
$query = mysqli_query($conexao,"SELECT * FROM contact") or die(mysqli_error());
 

//faz um looping e cria um array com os campos da consulta
$rows = array('contatos' => array());
while($contato = mysqli_fetch_assoc($query)) {
    $rows['contatos'][] = $contato;
}
//JSON
echo json_encode($rows);
?>