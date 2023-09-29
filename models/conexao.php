<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "mydb";

$conn = new mysqli($host, $user, $password, $database);
mysqli_set_charset($conn, "utf8");

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}else{
    //echo "Banco Conectado!";
}

function mensagem($texto,$tipo){
    echo "<div class='alert alert-$tipo' role='alert'>
    $texto
  </div>";
  }

?>