 <?php
	//chama o arquivo de conexão com o bd
	include("conectar.php");

	$callback = $_REQUEST['callback'];

	$nome = $_REQUEST['nome'];
	$email = $_REQUEST['email'];

	$records = parse_str($_REQUEST['records'], $array);

	$id = $array['id'];
	 
	//consulta sql
	$query = mysqli_query($conexao, "UPDATE Contato SET nome = '$nome', email = '$email' WHERE id='$id'") or die(mysqli_error());

	header('Content-Type: text/javascript');
	 
	echo $callback . '(' .
	 json_encode(array(
		"success" => mysqli_errno($conexao) == 0
	)) . ');';
?>