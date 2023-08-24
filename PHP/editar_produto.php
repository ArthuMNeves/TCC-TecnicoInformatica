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
        .formulario
         {
            font-size: 1.3rem;
        }

        .infoAdicional {
            margin-left: 5.5rem;
        }

        .header_nav a:hover {
            background-color: #644100;
        }

        .botoes ul li {
            padding-left: 9.5rem;
        }

        .gestoraNav {
            background-color: #2e9737;
        }

        .gestoraBody {
            background-image: linear-gradient(#2e9737, transparent);
        }

        .form {
            font-size: 1.4rem;
            margin-left: 25%;
            font-weight: bold;
        }

        .form label {
            float: left;
            width: 150px; /* Define a largura do rótulo */
            text-align: right; /* Alinha o texto do rótulo à direita */
            margin-right: 15px; /* Adiciona um espaço entre o rótulo e o input */
        }

        .form input[type="text"] {
            width: 300px; /* Define a largura do input de texto */
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
        $conexao=mysqli_connect("localhost","root","","estoque");
        $id = filter_input(INPUT_GET, 'id');
        $lista_produtos = mysqli_query($conexao, "SELECT * FROM produtos WHERE id = '$id'");
        $row_produtos = mysqli_fetch_assoc($lista_produtos);
    ?>

    <div class="wrapperContainer wrapperContainer-hero gestoraBody">

    <section class="formulario container">
        <h2 class="section_title"> Cadastro de Produtos </h2>

        <div class="informacoes">
        <form name="cadastro" method="post" action="proc_editar_produto.php">
            <h3>Dados do produto:</h3>
                <!-- <article style="text-align: left; margin-left: 25%;"> -->
                <div class="form">
                    <label> Nome do Produto: </label><input type="text" name="produto" value="<?php echo $row_produtos['produto'];?>"> <br> <br>
                    <label> Unidade de medida: </label><select name="unidade" value="<?php echo $row_produtos['unidade'];?>"> <option>Quilo(kg)</option> <option>Unidade</option> </select> <br> <br> <!--Ao selecionar a opção apareceria uma aba para informar-->
                    <label> Valor Unidade: </label><input type="text" name="valor" value="<?php echo $row_produtos['valor'];?>"> <br> <br>
                    <label> Quantidade: </label><input type="text" name="quantidade" value="<?php echo $row_produtos['quantidade'];?>"> <br> <br>
                    <label> Código de Barras: </label><input type="text" name="codigo" value="<?php echo $row_produtos['codigo'];?>"> <br> <br>
                    <label> Validade do Produto: </label><input type="text" name="validade" value="<?php echo $row_produtos['validade'];?>"> <br> <br>
                    <label> Lote: </label><input type="text" name="lote" value="<?php echo $row_produtos['lote'];?>"> <br> <br> <br>
                    <label> Fornecedor: </label><input type="text" name="fornecedor" value="<?php echo $row_produtos['fornecedor'];?>"> <br> <br>
                <!-- </article> -->
                </div>
                <br> <br> <br>

                <div class="botoes">
                    <ul>
                        <li><input type="hidden" name="id" value="<?php echo $row_produtos['id'];?>"></li>
                        <li><input type="submit" value="Editar"></li>
                    </ul>
                </div>
        </form>
        </div>
    </section>
    
    </div>
</body>
</html>