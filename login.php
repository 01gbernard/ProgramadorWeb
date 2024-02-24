<?php

include('conexao.php');

if(isset($_POST['usuario']) && isset($_POST['senha'])) {

    if(strlen($_POST['usuario']) == 0) {
        echo "Preencha seu nome de usuário";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {
        
        $usuario = $mysqli->real_escape_string($_POST['usuario']);
        $senha = $mysqli->real_escape_string($_POST['senha']);        
        $sql_code = "SELECT * FROM login WHERE usuario = '$usuario' AND senha = '$senha'";
        $sql_querry = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error); 

        $quantidade = $sql_querry->num_rows;

        if($quantidade == 1) {

            $usuario = $sql_querry->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['usuario'] = $usuario['usuario'];


            header("Location: index.php");

        } else {

            echo "Falha ao logar! Usuário ou Senha incorretos.";

        }

    }

}
    
?>  

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <img src="./img/imgLogin.png" alt="Imagem Acessórios">
    <div class="login">
        <img src="./img/logoLaranja.png" alt="Logo helo nazare" class="logo">
        <form action="" method="post">
            <label for="usuario">Usuário</label>
            <input type="text" name="usuario" id="usuario" placeholder="Digite seu usuário...">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha...">
            <input type="submit" value="Entrar" id="entrar">
        </form>
    </div>
</body>
</html>
