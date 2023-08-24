<?php

error_reporting(E_ERROR | E_PARSE); // só para tirar os warnings

$conexao = mysqli_connect("localhost", "root", "", "estoque");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>entrada e saida de produtos</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/normalize.css">

    <link rel="stylesheet" href="../css/estilo.css">

    <style>
        .formulario {
            font-size: 1.5rem;
            text-align: justify;
        }

        /* .endPage {
            padding-top: 12.3rem;
        } */

        .informacoes {
            padding-top: 2rem;
            padding-left: 29.7rem;
        }

        .botoesRA {
            align-items: center;
            padding-top: 1.5rem;
        }

        .botoesRA ul {
            list-style-type: none;
            display: flex;
            gap: 2.5rem;
            margin-left: 11.5rem;
        }

        .pesquisa {
            display: inline-block;
            padding-bottom: 1rem;
            padding-left: 29.5rem;
        }

        .form {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .form label {
            float: left;
            width: 200px;
            /* Define a largura do rótulo */
            text-align: right;
            /* Alinha o texto do rótulo à direita */
            margin-right: 15px;
            /* Adiciona um espaço entre o rótulo e o input */
        }

        .form input[type="text"] {
            width: 200px;
            /* Define a largura do input de texto */
        }

        .wrapperNav {
            background-color: #2e9737;
        }

        .wrapperBody {
            background-image: linear-gradient(#2e9737, transparent);
        }
    </style>

</head>

<body>
    <div class="wrapperContainer wrapperContainer-dark wrapperNav">
        <header class="header container">
            <img src="../imagens/LogoSite.png" alt="Aprenser" class="img_logo">

            <nav class="header_nav">
                <ul>
                    <li><a href="../home_gestor.html">Voltar</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="wrapperContainer wrapperContainer-hero formularioContainer wrapperBody">
        <section class="formulario container">
            <h2 class="section_title"> Fluxo de Produtos </h2>



            <form method="GET" action="">
                <div class="pesquisa">
                    <label>Código do Produto: </label><input name="id" type="text" value="<?php ?>">
                    <button type="submit" class="bPesquisa">Pesquisar</button><br><br>
                </div>

            </form>

            <?php

            session_start(); //inicia a sessão

            if (empty($_GET['id'])) {
                // echo "<script>alert('Informe o código do produto!');</script>";
            } else {

                $id = $_GET['id'];

                $_SESSION['id'] = $id;  // Armazena o ID na variável de sessão

                $produtos = mysqli_query($conexao, "SELECT * FROM produtos WHERE id='$id'");

                $row_prod = mysqli_fetch_assoc($produtos);

                $nomeProd = $row_prod['produto'];

                $qtdProd = $row_prod['quantidade'];

                $_SESSION['qtdProd'] = $qtdProd; //armazena o qtdProd (valor do estoque) na variável de sessão
            }

            ?>

            <div class="informacoes">
                <form method="GET" action="">
                    <div class="form">
                        <label> Nome do Produto: </label><input name="nomeProd" type="text" value="<?php echo $nomeProd; ?>"> <br> <br>
                        <label> Quantidade em Estoque: </label><input name="qtdProd" type="text" value="<?php echo $qtdProd ?>"> <br> <br>
                        <label> Qtd: </label><input name="qtd" type="text" value="<?php ?>"> <br> <br>
                    </div>
                    <div class="botoesRA">
                        <ul>
                            <li><button type="submit" name="retirar">Retirar</button></li>
                            <li><button type="submit" name="adicionar">Adicionar</button></li>
                        </ul>
                    </div>

                </form>

                <?php
                if (isset($_GET['retirar'])) {
                    if (!empty($_GET['qtd'])) {
                        $qtd = $_GET['qtd'];

                        $id = $_SESSION['id'];  // Recupera o id da variável de sessão

                        $qtdProd = $_SESSION['qtdProd']; // Recupera a quantidade do estoque

                        // $qtdFinal = $qtdProd - $qtd; Não funciona pois os valores salvos anteriormente nas variáveis se perdem assim como id!

                        // Verifica se a quantidade em estoque é suficiente
                        if ($qtd <= $qtdProd) {
                            $query = "UPDATE produtos SET quantidade = quantidade - '$qtd' WHERE id='$id'";

                            $resultado = mysqli_query($conexao, $query);

                            if ($resultado) {
                                echo "<script>alert('Produto(s) retirado!');</script>";
                            } else {
                                echo "Ocorreu um erro ao atualizar o valor: " . mysqli_error($conexao);
                            }
                        } else {
                            echo "<script>alert('Quantidade insuficiente em estoque!');</script>";
                        }
                    }
                } elseif (isset($_GET['adicionar'])) {
                    if (!empty($_GET['qtd'])) {
                        $qtd = $_GET['qtd'];

                        $id = $_SESSION['id'];  // Recupera o id da variável de sessão

                        // $qtdFinal = $qtdProd + $qtd; Não funciona pois os valores salvos anteriormente nas variáveis se perdem assim como id!

                        $query = "UPDATE produtos SET quantidade = quantidade + '$qtd' WHERE id='$id'";

                        $resultado = mysqli_query($conexao, $query);

                        if ($resultado) {
                            echo "<script>alert('Produto(s) adicionado!');</script>";
                        } else {
                            echo "Ocorreu um erro ao atualizar o valor: " . mysqli_error($conexao);
                        }
                    }
                }
                ?>

            </div>
        </section>
    </div>

    <!-- <div class="wrapperContainer wrapperContainer-dark3 endPage">
        <footer class="footer">Desenvolvido por Thui</footer>
    </div> -->
</body>

</html>