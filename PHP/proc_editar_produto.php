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
        <a href="estoque.php" class="btn"> Voltar às Tabelas de Pesquisa </a>
    </div>

    <div class="wrapperContainer wrapperContainer-dark3 endPage">
        <footer class="footer">Desenvolvido por Arthur M Neves</footer>
    </div>

    <?php
        $conexao=mysqli_connect("localhost","root","","estoque");
        $id = filter_input(INPUT_POST, 'id');
        $produto = filter_input(INPUT_POST, 'produto');
        $unidade = filter_input(INPUT_POST, 'unidade');
        $valor = filter_input(INPUT_POST, 'valor');
        $quantidade = filter_input(INPUT_POST, 'quantidade');
        $codigo = filter_input(INPUT_POST, 'codigo');
        $validade = filter_input(INPUT_POST, 'validade');
        $lote = filter_input(INPUT_POST, 'lote');
        $fornecedor = filter_input(INPUT_POST, 'fornecedor');

        $lista_produtos = mysqli_query($conexao,"UPDATE produtos SET produto='$produto', unidade='$unidade', valor='$valor', quantidade='$quantidade',
            codigo='$codigo', validade='$validade', lote='$lote', fornecedor='$fornecedor' WHERE id='$id'");

        // echo "<br> Editado! <br> <br>";

        // echo "<a href='lista_produto.php'>Voltar à lista </a>";
    ?>
</body>
</html>