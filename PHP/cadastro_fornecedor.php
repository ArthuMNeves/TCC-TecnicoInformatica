<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    
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
            padding-top: 2.1rem;
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
        <a href="../cadastro_fornecedor.html" class="btn"> Cadastrar novo fornecedor </a>
    </div>

    <div class="wrapperContainer wrapperContainer-dark3 endPage">
        <footer class="footer">Desenvolvido por Arthur M Neves</footer>
    </div>

<?php

    $conexao=mysqli_connect("localhost","root","","estoque");

        $razao=$_POST['razao'];
        $fantasia=$_POST['fantasia'];
        $endereco=$_POST['endereco'];
        $bairro=$_POST['bairro'];
        $cidade=$_POST['cidade'];
        $uf=$_POST['uf'];
        $telefone=$_POST['telefone'];
        $cep=$_POST['cep'];
        $email=$_POST['email'];
        $cnpj=$_POST['cnpj'];
        $inscricao=$_POST['inscricao'];
        $pessoa=$_POST['pessoa'];   /* */
        $contato=$_POST['contato'];
        $prazo=$_POST['prazo'];
        $produtos=$_POST['produtos'];
        $desconto=$_POST['desconto'];
        $pagamento=$_POST['pagamento'];
        $atividade=$_POST['atividade'];
        
    mysqli_query($conexao,"INSERT INTO fornecedores (razao, fantasia, endereco, 
        bairro, cidade, uf, telefone, cep, email, cnpj, inscricao, pessoa, contato,
        prazo, produtos, desconto, pagamento, atividade)
        VALUES ('$razao','$fantasia','$endereco', 
        '$bairro','$cidade','$uf','$telefone','$cep','$email','$cnpj','$inscricao','$pessoa','$contato',
        '$prazo','$produtos','$desconto','$pagamento','$atividade')");

    // echo "Cadastro realizado <br> <br>";

    // echo "<a href='../cadastro_fornecedor.html'> Cadastrar novo fornecedor! </a> <br>";  /** */
?>

</body>
</html>