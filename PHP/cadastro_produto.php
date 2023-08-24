<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="../css/normalize.css">

    <link rel="stylesheet" href="../css/estilo.css">

    <style>
        body{
            font-size: 1.5rem;
            text-align: center;
            justify-content: center;
        }

        .cadastrarNovo {
            padding: 20rem;
            justify-content: center;
            background-color: #16491a;
        }

        .endPage {
            padding-top: 2.4rem;
            background-color: #16491a;
            color: #e5e5e5;
        }
        
    </style>

</head>

<body>
<div class="wrapperContainer wrapperContainer-dark wrapperContainer-fixed">
        <header class="header2 container">
            <center>
                <a href="../home_gestor.html"> <img src="../imagens/LogoSite2.png" alt="Aprenser" class="img_logo"> </a>
            </center>
        </header>
    </div>

    <div class="wrapperContainer wrapperContainer-hero cadastrarNovo">
        <a href="../cadastro_produto.html" class="btn"> Cadastrar novo produto </a>
    </div>

    <div class="wrapperContainer wrapperContainer-dark3 endPage">
        <footer class="footer">Desenvolvido por Arthur M Neves</footer>
    </div>

    <?php

    $conexao=mysqli_connect("localhost","root","","estoque");

    $produto=$_POST['produto'];
    $unidade=$_POST['unidade'];
    $valor=$_POST['valor'];
    $quantidade=$_POST['quantidade'];
    $codigo=$_POST['codigo'];
    $validade=$_POST['validade'];
    $lote=$_POST['lote'];
    $fornecedor=$_POST['fornecedor'];

    mysqli_query($conexao,"INSERT INTO produtos (produto, unidade, valor, quantidade, codigo, validade, lote, fornecedor) VALUES ('$produto','$unidade', '$valor','$quantidade','$codigo','$validade','$lote','$fornecedor')");

    // echo "Cadastro realizado <br>";
    ?>

</body>

</html>