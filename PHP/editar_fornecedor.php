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
        .formulario {
            font-size: 1.3rem;
        }

        .infoAdicional {
            margin-left: 5.5rem;
        }

        .header_nav a:hover {
            background-color: #644100;
        }

        .botoes ul li {
            padding-left: 3.5rem;
        }

        .form {
            font-size: 1.4rem;
            margin-left: 20%;
            font-weight: bold;
        }

        .form label {
            float: left;
            width: 200px; /* Define a largura do rótulo */
            text-align: right; /* Alinha o texto do rótulo à direita */
            margin-right: 15px; /* Adiciona um espaço entre o rótulo e o input */
            margin-bottom: 4px;
        }

        .form input[type="text"] {
            width: 300px; /* Define a largura do input de texto */
        }

        .botoes ul li {
           margin-left: 5.5rem;
           font-size: 1.3rem;
        }

        .atividade {
            margin-left: 25%;
        }

        .atividade ul {
            list-style-type: none;
            display: flex;
            gap: 2rem;
        }

        .gestoraNav {
            background-color: #2e9737;
        }

        .gestoraBody {
            background-image: linear-gradient(#2e9737, transparent);
        }

        .header_nav a {
            padding: .70rem 1.15rem;
            border: solid 1px;
            text-decoration: none;
            color: #e5e5e5;
        }

        .header_nav ul {
            display: flex;
            gap: .6rem;
            list-style-type: none;
        }

        .header_nav a:hover {
            background-color: #213025d7;
        }
    </style>


</head>

<body>
    <div class="wrapperContainer wrapperContainer-dark wrapperContainer-fixed gestoraNav">
        <header class="header container">
            <a href="#top"> <img src="../imagens/LogoSite.png" alt="Aprenser" class="img_logo"> </a>

            <nav class="header_nav">
                <ul>
                    <li><a href="estoque.php">Voltar</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <?php
    $conexao = mysqli_connect("localhost", "root", "", "estoque");
    $id = filter_input(INPUT_GET, 'id');
    $lista_fornecedores = mysqli_query($conexao, "SELECT * FROM fornecedores WHERE id = '$id'");
    $row_fornecedores = mysqli_fetch_assoc($lista_fornecedores);
    ?>

    <div class="wrapperContainer wrapperContainer-hero gestoraBody">

        <section class="formulario container">
            <h2 class="section_title"> Cadastro de Fornecedores </h2>

            <div class="informacoes">
                <form method="POST" action="proc_editar_fornecedores.php">
                    <h3>Dados do fornecedor:</h3>
                    <!-- <article style="text-align: left; margin-left: 25%;"> -->
                    <div class="form">
                        <label> Razão Social: </label><input type="text" name="razao" value="<?php echo $row_fornecedores['razao']; ?>"> <br> <br> <br>
                        <label> Nome Fantasia: </label><input type="text" name="fantasia" value="<?php echo $row_fornecedores['fantasia']; ?>"> <br> <br> <br>
                        <label> CNPJ: </label><input type="text" name="cnpj" value="<?php echo $row_fornecedores['cnpj']; ?>"> <br> <br> <br>
                        <label> Endereço: </label><input type="text" name="endereco" value="<?php echo $row_fornecedores['endereco']; ?>"> <br> <br> <br>
                        <label> Bairro: </label><input type="text" name="bairro" value="<?php echo $row_fornecedores['bairro']; ?>"> <br> <br> <br>
                        <label> Cidade: </label><input type="text" name="cidade" value="<?php echo $row_fornecedores['cidade']; ?>"> <br> <br> <br>
                        <label> UF: </label><input type="text" name="uf" value="<?php echo $row_fornecedores['uf']; ?>"> <br> <br> <br>
                        <label> Telefones: </label><input type="text" name="telefone" value="<?php echo $row_fornecedores['telefone']; ?>"> <br> <br> <br> 
                        <label> CEP: </label><input type="text" name="cep" value="<?php echo $row_fornecedores['cep']; ?>"> <br> <br> <br>
                        <label> E-mail: </label><input type="text" name="email" value="<?php echo $row_fornecedores['email']; ?>"> <br> <br> <br>
                        <label> Inscrição Estadual: </label><input type="text" name="inscricao" value="<?php echo $row_fornecedores['inscricao']; ?>"> <br> <br> <br>
                        <label> Tipo de pessoa: </label><select name="pessoa" value="<?php echo $row_fornecedores['pessoa']; ?>">
                                <option>Jurídica</option>
                                <option>Física</option>
                            </select> <br> <br> <br> <!---->
                        <label> Número do Contato: </label><input type="text" name="contato" value="<?php echo $row_fornecedores['contato']; ?>"> <br> <br> <br>
                            <!-- </article> -->
                    </div>

                    <h4 class="infoAdicional">Informações adicionais:</h4>
                    <!-- <article style="text-align: left; margin-left: 25%;"> -->
                    <div class="form">
                        <label> Prazo médio de entregas: </label><input type="text" name="prazo" value="<?php echo $row_fornecedores['prazo']; ?>"> <br> <br> <br>
                        <label> Principais produtos: </label><input type="text" name="produtos" value="<?php echo $row_fornecedores['produtos']; ?>"> <br> <br> <br>
                        <label> Descontos: </label><input type="text" name="desconto" value="<?php echo $row_fornecedores['desconto']; ?>"> <br> <br> <br>
                        <label> Condições de pagamento: </label><input type="text" name="pagamento" value="<?php echo $row_fornecedores['pagamento']; ?>"> <br> <br>
                        <div class="atividade">
                                <ul>
                                    <li> Ativo <input type="radio" name="atividade" value="ativo" checked> </li>
                                    <li> Inativo <input type="radio" name="atividade" value="inativo"> </li>
                                </ul>
                    <!-- </article> -->
                        </div>
                    </div>
                    <br> <br> <br>

                    <div class="botoes">
                        <ul>
                            <li><input type="hidden" name="id" value="<?php echo $row_fornecedores['id']; ?>"></li>
                            <li><input type="submit" value="Editar"></li>
                        </ul>
                    </div>
                </form>
            </div>
        </section>

    </div>
</body>

</html>