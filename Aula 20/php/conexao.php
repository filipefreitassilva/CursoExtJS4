<?php
 
//nome do servidor (127.0.0.1)
$servidor = "localhost";
 
//usuário do banco de dados
$user = "root";
 
//senha do banco de dados
$senha = "";
 
//nome da base de dados
$db = "sencha";
 
//executa a conexão com o banco, caso contrário mostra o erro ocorrido
$conexao = mysqli_connect($servidor,$user,$senha,$db) or die (mysql_error("Não conseguimos conectar no banco"));
 

 
?>