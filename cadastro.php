<?php

include('protect.php');

if (!empty($_SESSION['mensagem'])) {
    echo $_SESSION['mensagem'];
    unset($_SESSION['mensagem']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="./css/cadastro.css"> 
</head>
<body>
    <main>
        <img src="./img/imgLogin.png" alt="Imagem Acessórios">

        <div class="login">
            <form action="listar.php" method="POST">
                <h1>Cadastro de Produto</h1>

                <label for="produto">Nome do produto</label>
                <input type="text" name="produto" placeholder="Nome do produto...">

                <label for="quantidade">Quantidade do produto</label>
                <input type="number" name="quantidade"placeholder="Quantidade do produto...">

                <label for="preco">Preço</label>
                <input type="text" name="preco" placeholder="Preço do produto...">
                <div class="botoes">
                    <a href="index.php" class="back">Voltar</a>
                    <input type="submit" name="enviar" value="Cadastrar produto" id="enviar">
                </div>
            </form>
        </div>
    </main> 
</body>
</html>