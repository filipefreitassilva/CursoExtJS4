 <?php
	//chama o arquivo de conexão com o bd
	include("conectar.php");

	$callback = $_REQUEST['callback'];

	$records = parse_str($_REQUEST['records'], $array);

	$id = $array['id'];
	 
	//consulta sql
	$query = mysqli_query($conexao, "DELETE FROM Contato WHERE id='$id'") or die(mysqli_error());

	header('Content-Type: text/javascript');
	 
	echo $callback . '(' .
	 json_encode(array(
		"success" => mysqli_errno($conexao) == 0
	)) . ');';
?>