<?php

    include('conexao.php');

    if (isset($_POST['enviar'])) {
        if (!empty($_POST['produto']) || !empty($_POST['quantidade']) || !empty($_POST['preco'])) {
            $produto = $_POST['produto'];
            $quantidade = $_POST['quantidade'];
            $preco = $_POST['preco'];

            $sql = "INSERT INTO produtos(produto, quantidade, preco) VALUES ('$produto', '$quantidade', '$preco')";
            $enviar = mysqli_query($mysqli, $sql);

            if ($enviar) {
                $_SESSION['mensagem'] = "Produto cadastrado com sucesso.";
                header("Location: cadastro.php");
                exit;
            } else {
                $_SESSION['mensagem'] = "Erro ao cadastrar produto.";
                header("Location: cadastro.php");
                exit;
            }
        }
    }
