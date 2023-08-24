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

        $id=filter_input(INPUT_POST,'id');
        $razao=filter_input(INPUT_POST,'razao');
        $fantasia=filter_input(INPUT_POST,'fantasia');
        $endereco=filter_input(INPUT_POST,'endereco');
        $bairro=filter_input(INPUT_POST,'bairro');
        $cidade=filter_input(INPUT_POST,'cidade');
        $uf=filter_input(INPUT_POST,'uf');
        $telefone=filter_input(INPUT_POST,'telefone');
        $cep=filter_input(INPUT_POST,'cep');
        $email=filter_input(INPUT_POST,'email');
        $cnpj=filter_input(INPUT_POST,'cnpj');
        $inscricao=filter_input(INPUT_POST,'inscricao');
        $pessoa=filter_input(INPUT_POST,'pessoa');
        $contato=filter_input(INPUT_POST,'contato');
        $prazo=filter_input(INPUT_POST,'prazo');
        $produtos=filter_input(INPUT_POST,'produtos');
        $desconto=filter_input(INPUT_POST,'desconto');
        $pagamento=filter_input(INPUT_POST,'pagamento');
        $atividade=filter_input(INPUT_POST,'atividade');

        $lista_fornecedores = mysqli_query($conexao,"UPDATE fornecedores SET razao='$razao', fantasia='$fantasia', 
                endereco='$endereco', bairro='$bairro', cidade='$cidade', uf='$uf', telefone='$telefone', cep='$cep', 
                email='$email', cnpj='$cnpj', inscricao='$inscricao', pessoa='$pessoa', contato='$contato', prazo='$prazo', 
                produtos='$produtos', desconto='$desconto', pagamento='$pagamento', atividade='$atividade' WHERE id='$id'");

        // echo "<br> Editado! <br> <br>";

        // echo "<a href='lista_fornecedor.php'>Voltar à lista </a>";

    ?>

</body>
</html>