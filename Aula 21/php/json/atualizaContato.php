 <?php
	//chama o arquivo de conexão com o bd
	include("../conectar.php");

	$info = $_POST['contatos'];

	$data = json_decode(stripslashes($info));

	$nome = $data->nome;
	$email = $data->email;
	$id = $data->id;
	 
	//consulta sql
	$query = mysqli_query($conexao,"UPDATE Contato SET nome = '$nome', email = '$email' WHERE id='$id'") or die(mysqli_error($conexao));


	 
	echo json_encode(array(
		"success" => mysqli_errno($conexao) == 0
	));
?>