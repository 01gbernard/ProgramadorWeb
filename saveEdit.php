<?php

include('conexao.php');

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];

    $sqlUpdate = "UPDATE produtos SET produto='$produto', quantidade='$quantidade', preco='$preco' WHERE id='$id'";
    
    $enviar = $mysqli->query($sqlUpdate);
}

header("Location: index.php");
