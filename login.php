<?php
    include_once("models/conexao.php");
    if(isset($_POST['email']) || isset($_POST['senha'])){
        if(strlen($_POST['email']) == 0) {
            echo "Preencha seu e-mail";
        } else if(strlen($_POST['senha']) == 0) {
            echo "Preencha sua senha";
        } else {
            $email = $conn->real_escape_string($_POST['email']);
            $senha = $conn->real_escape_string($_POST['senha']);

            $sql = "SELECT * FROM form_pronatec WHERE email = '$email' AND senha = '$senha'";
            $query = $conn->query($sql) or die("Falha na execução do codigo sql: " . $conn->error);

            $quantidade = $query->num_rows;

            if($quantidade == 1) {
                $usuario = $query->fetch_assoc();

                if(!isset($_SESSION)){
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];


                header("Location: alterardados.php");
            }else{
                mensagem("falha ao logar! e-mail ou senha incorretos","danger");
            }
        }
         
    }
    
    
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
        body{
            background-image: url("https://images.pexels.com/photos/356065/pexels-photo-356065.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
       
        <div class="container w-50 mt-4 p-3 bg-primary rounded-2 "> 
            <h3 class="mb-3 text-white">Acesso restrito</h3>
            <label class="form-label text-white" for="email">E-mail:</label>
            <input class="form-control mb-3" type="email" name="email">
            
            <label class="form-label text-white" for="senha">Senha:</label>
            <input class="form-control mb-4" type="password" name="senha">

            <div class="d-flex">
                <button class="btn btn-success mx-auto p-2" style="width: 200px;" type="submit">Entrar</button>
            </div>
        </div>
    </form>
</body>
</html>