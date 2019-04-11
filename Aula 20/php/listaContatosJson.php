<?php
//connect to db
include("conexao.php");
 
//sql query
$query = mysqli_query($conexao,"SELECT * FROM contact") or die(mysqli_error());
 
//interates the result and creates an array with each row
$rows = array();
while($contact = mysqli_fetch_assoc($query)) {
    $rows[] = $contact;
}
//JSON
echo json_encode($rows);
?>