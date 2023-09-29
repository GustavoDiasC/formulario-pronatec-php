<?php 
include_once("conexao.php");
include_once("protect.php");

$id = $_SESSION['id'];

$sql = "DELETE FROM form_pronatec WHERE 
id = '$id'";

 mysqli_query($conn, $sql) or die("Erro ao tentar deletar registro");
 mysqli_close($conn);
 echo "Cliente Excluído com sucesso!";

if($sql == true){
  session_destroy();
}

header("Location: /atividade9/index.php");
exit;
?>
