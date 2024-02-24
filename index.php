<?php

    include('protect.php');
    include('conexao.php');

    $sql = "SELECT * FROM produtos ORDER BY id DESC";
    $enviar = $mysqli->query($sql);
    $resultado = mysqli_fetch_all($enviar, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque helô nazaré</title>
    <link rel="stylesheet" href="./css/style.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


</head>
<body>
    <header>

        <img src="./img/LogoLaranja.png" alt="logo helo nazare" class="logo" href="index.html">

        <div class="search">

            <form method="POST" action="index.php">
    
                <input name ="pesquisa" placeholder="Pesquise um produto..." type="text" class="pesquisa">
                <button type="submit" class="pesq"><span class="material-symbols-rounded">search</span></button>
    
            </form>

        </div>

        <div class="user">
            <a href="logout.php" id="logout"><span class="material-symbols-rounded">logout</span></a>
        </div>

    </header>
    <main>
        <div class="botao">
            <a href="cadastro.php" class="addProduto"><span class="material-symbols-rounded">add_circle</span>Adicionar um produto</a>
        </div>
        <div class="table">

            <table>
                <tr>
                    <th>#</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
                <?php 
    
                    $pesquisa = isset($_POST['pesquisa']) ? $_POST['pesquisa'] : '';
                    $complemento = "produto LIKE '%$pesquisa%'";
    
                    $sql = "SELECT * FROM produtos WHERE $complemento";
                    $enviar = mysqli_query($mysqli, $sql); 
    
                    if (mysqli_num_rows($enviar) > 0) {
                        while ($dados = mysqli_fetch_assoc($enviar)) {
                            echo "<tr>";
                            echo "<td>".$dados['id']."</td>";
                            echo "<td>".$dados['produto']."</td>";
                            echo "<td>".$dados['quantidade']."</td>";
                            echo "<td>".$dados['preco']."</td>";
                            echo "<td class='botoes'>
                                    <a class='editb' href='edit.php?id=$dados[id]'>
                                    <span class='material-symbols-rounded'>edit_square</span>
                                    </a>
                                    <a class='deleteb' href='delete.php?id=$dados[id]'>
                                    <span class='material-symbols-rounded'>delete</span>
                                    </a>
                                  </td>";
                            echo "</tr>";
                        }
                    }
                        
    
                ?>
    
            </table>

        </div>

    </main>
    

</body>
</html>