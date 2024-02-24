<?php
include('conexao.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM produtos WHERE id=$id";
    $enviar = $mysqli->query($sql);

    if ($enviar->num_rows > 0) {
        $sqlDelete = "DELETE FROM produtos WHERE id=$id";
        $enviarDelete = $mysqli->query($sqlDelete);

        if ($enviarDelete) {
            echo "Item deletado com sucesso!";
        } else {
            echo "Erro ao deletar o item: " . $mysqli->error;
        }
    } else {
        echo "Item não encontrado.";
    }
}

header("Location: index.php");
