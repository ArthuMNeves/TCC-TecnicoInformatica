<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Fornecedores</title>

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

        $conexao=mysqli_connect("localhost","root","","estoque");

        $lista_fornecedores = mysqli_query($conexao,"SELECT * FROM fornecedores");
        
        while($row_fornecedores = mysqli_fetch_assoc($lista_fornecedores)){
            echo "ID: " .$row_fornecedores['id']. "<br><br>";
            echo "Razão Social:" .$row_fornecedores['razao']. "<br><br>";
            echo "Nome Fantasia:" .$row_fornecedores['fantasia']. "<br><br>";
            echo "Endereço:" .$row_fornecedores['endereco']. "<br><br>";
            echo "Bairro:" .$row_fornecedores['bairro']. "<br><br>";
            echo "Cidade:" .$row_fornecedores['cidade']. "<br><br>";
            echo "UF:" .$row_fornecedores['uf']. "<br><br>";
            echo "Telefone:" .$row_fornecedores['telefone']. "<br><br>";
            echo "CEP:" .$row_fornecedores['cep']. "<br><br>";
            echo "E-mail:" .$row_fornecedores['email']. "<br><br>";
            echo "CNPJ:" .$row_fornecedores['cnpj']. "<br><br>";
            echo "Inscrição Estadual:" .$row_fornecedores['inscricao']. "<br><br>";
            echo "Tipo de pessoa:" .$row_fornecedores['pessoa']. "<br><br>";
            echo "Telefone do Contato:" .$row_fornecedores['contato']. "<br><br>";
            echo "Prazo médio de entregas:" .$row_fornecedores['prazo']. "<br><br>";
            echo "Principais produtos:" .$row_fornecedores['produtos']. "<br><br>";
            echo "Descontos:" .$row_fornecedores['desconto']. "<br><br>";
            echo "Condições de pagamento:" .$row_fornecedores['pagamento']. "<br><br>";
            echo "Ativo:" .$row_fornecedores['atividade']. "<br><br>";
   
    
            echo "<a href='editar_fornecedor.php?id=" .$row_fornecedores['id']. "'> Editar </a> <br>";
            echo "<a href='excluir_fornecedor.php?id=" .$row_fornecedores['id']. "'> Excluir </a> <br><hr>";

        }

    ?>
    </div>
</body>
</html>