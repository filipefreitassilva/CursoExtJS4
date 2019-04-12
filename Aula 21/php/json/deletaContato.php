 <?php
	//chama o arquivo de conexão com o bd
	include("../conectar.php");

	$info = $_POST['contatos'];

	$data = json_decode(stripslashes($info));

	$id = $data->id;
	 
	//consulta sql
	$query = mysqli_query($conexao, "DELETE FROM Contato WHERE id='$id'");

	
	 
	echo json_encode(array(
		"success" => mysqli_errno($conexao) == 0
	));
?>