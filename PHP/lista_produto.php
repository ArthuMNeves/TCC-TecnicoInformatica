<?php
     $conexao=mysqli_connect("localhost","root","","estoque");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Produtos</title>

    <link rel="stylesheet" href="../css/normalize.css">

    <link rel="stylesheet" href="../css/estilo.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <style>
        .lista {
            font-size: 1.6rem;
            padding: 5rem 5rem;
            background-image: linear-gradient(#052b08, transparent);
            text-align: center;
            color: #0e0705;
        }

        .lista a {
            display: flex;
            background-color: #644100;
            border-radius: 2.5px;
            font-size: 1.4rem;
            text-decoration: none;
            padding: 1rem 58.5rem;
            color: #e5e5e5;
        }

        .header_nav a:hover {
            background-color: #213025d7;
        }

        .gestoraNav {
            background-color: #16491a;
        }

        .gestoraBody {
            background-image: linear-gradient(#16491a, transparent);
        }

    </style>
</head>
<body>

    <div class="wrapperContainer wrapperContainer-dark wrapperContainer-fixed gestoraNav">
        <header class="header container">
          <a href="#top"> <img src="../imagens/LogoSite2.png" alt="Aprenser" class="img_logo"> </a>

            <nav class="header_nav">
                <ul>
                    <li><a href="estoque.php">Voltar</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="lista gestoraBody">
    <?php

        $lista_produtos = mysqli_query($conexao, "SELECT * FROM produtos");

        while($row_produtos = mysqli_fetch_assoc($lista_produtos)) {
            echo "ID: " .$row_produtos['id']. "<br>";
            echo "Nome do Produto: " .$row_produtos['produto']. "<br><br>";
            echo "Unidade de Medida: " .$row_produtos['unidade']. "<br><br>";
            echo "Quantidade: " .$row_produtos['quantidade']. "<br><br>";
            echo "Código de Barras: " .$row_produtos['codigo']. "<br><br>";
            echo "Validade do Produto: " .$row_produtos['validade']. "<br><br>";
            echo "Lote: " .$row_produtos['lote']. "<br><br>";

            echo "<a href='editar_produto.php?id=" .$row_produtos['id']. "'> Editar </a> <br>";
            
            echo "<a href='excluir_produto.php?id=" .$row_produtos['id']. "'> Excluir </a> <br><hr>";
        }
        ?>
    </div>
</body>
</html>