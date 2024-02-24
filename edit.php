<?php

include('protect.php');
include('conexao.php');

if (!empty($_GET['id'])) {

    $id = $_GET['id'];
    $sql = "SELECT * FROM produtos WHERE id=$id";
    $enviar = $mysqli->query($sql);

    if ($enviar->num_rows > 0) {
        while ($dados = mysqli_fetch_assoc($enviar)) {
            $id = $dados['id'];
            $produto = $dados['produto'];
            $quantidade = $dados['quantidade'];
            $preco = $dados['preco'];
        }
    } else {
        header('location:index.php');
    }
}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="./css/cadastro.css">
    </style>
</head>
<body>
    <main>
        <img src="./img/imgLogin.png" alt="Imagem Acessórios">
        <div class="login">
            <form action="saveEdit.php" method="POST">
                <h1>Alterar Produto</h1>

                <label for="produto">Nome do produto</label>
                <input type="text" name="produto" placeholder="Nome do produto..." value="<?php echo $produto ?>">

                <label for="quantidade">Quantidade do produto</label>
                <input type="number" name="quantidade"placeholder="Quantidade do produto..." value="<?php echo $quantidade ?>">

                <label for="preco">Preço</label>
                <input type="text" name="preco" placeholder="Preço do produto..." value="<?php echo $preco ?>">
                <div class="botoes"> 
                    <a href="index.php" class="back">Voltar</a>   
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" name="update" value="Atualizar produto" id="enviar">
                </div>
            </form>
        </div>
    </main> 
</body>
</html>