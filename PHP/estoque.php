<?php
$conexao = mysqli_connect("localhost", "root", "", "estoque");

if ($conexao->connect_errno) {
    die("Erro na conexão");
}

// isset($_GET['busca']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/normalize.css">

    <link rel="stylesheet" href="../css/estilo.css">

    <style>
        *,
        *:after,
        *:before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #e5e5e5;
        }

        html {
            font: 400 62.5% 'Inter', sans-serif;
        }

        p,
        a {
            font-size: 1.2rem;
        }

        h2 {
            font-size: 2.5rem;
        }

        h3 {
            font-size: 2.0rem;
        }

        h4 {
            font-size: 1.7rem;
            text-align: center;
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

        .inicio {
            padding: 5rem;
            background-image: linear-gradient(#2e9737, transparent);
        }

        .inicio2 {
            padding: 5rem;
            background-image: linear-gradient(transparent, transparent);
        }

        .titulos {
            margin-bottom: 2rem;
            margin-left: 5rem;
        }

        .titulos h4 {
            margin-top: 2rem;
            margin-left: 0rem;
            font-size: 2.0rem;
        }

        .pesquisa_tabela {
            text-align: center;
            font-size: 1.4rem;
            margin-left: 5rem;
        }

        /* #botao {
            margin-left: .25rem;
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.3s;
            border-style: solid;
            width: 80px;
        }

        #botao input:hover {
            background-color: rgb(4, 85, 29);
            color: rgb(255, 255, 255);
        } */

        .Tabela {
            font-size: 12.5px;
            text-align: center;
        }

        .Tabela a {
            display: inline;
            text-decoration: none;
            font-size: 1.2rem;
            color: black;
        }

        .Tabela a:hover {
            color: #88dc75;
        }

        .Tabela2 {
            margin-left: 4.5rem;
        }

        .Tabela2 a {
            display: inline;
            text-decoration: none;
            font-size: 1.2rem;
            color: black;
        }

        .Tabela2 a:hover {
            color: #88dc75;
        }

        .thFornecedor {
            width: auto;
        }

        .thFornecedor {
            width: 50rem;
        }

        .tdUF {
            padding: 1rem;
        }

        .tdId {
            text-align: center;
        }

        .tdLinks {
            text-align: center;
            padding: 2px;
        }

        .wrapperNav {
            background-color: #2e9737;
        }

        .container {
            margin-left: 5rem;
        }
    </style>

</head>

<body>
    <div class="wrapperContainer wrapperContainer-dark wrapperContainer-fixed wrapperNav">
        <header class="header container">
            <a href="#top"> <img src="../imagens/LogoSite.png" alt="Aprenser" class="img_logo"> </a>

            <nav class="header_nav">
                <ul>
                    <li><a href="../home_gestor.html">Voltar</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="wrapperContainer inicio">
        <section class="container acessoListas">
            <div class="titulos">
                <h2>Estoque Nathuralleh</h2>

                <h4>Pesquisa Fornecedores:</h4>
            </div>

            <div class="pesquisa_tabela">
                <form action="">
                    <input name="busca" type="text" placeholder="Digite o nome do fornecedor">
                    <button type="submit">Pesquisar</button>
                </form>
            </div>

            <br>

            <div class="Tabela">
                <table width="1100px" border="1">
                    <tr>
                        <th>Fornecedor</th>
                        <th>CNPJ</th>
                        <th>Endereço</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>UF</th>
                        <th>E-mail</th>
                        <th>Inscrição Estadual</th>
                        <th>Tipo Pessoa</th>
                        <th>Contato</th>
                        <th>Prazo Entregas</th>
                        <th>Descontos</th>
                        <th>Produtos Fornecidos</th>
                        <th>Código</th>
                        <th> </th>
                    </tr>
            </div>
            <?php

            if (!isset($_GET['busca'])) {
            ?>
                <tr>
                    <td colspan="14">Digite algo para pesquisar...</td>
                </tr>
                <?php
            } else {
                $pesquisa = $conexao->real_escape_string($_GET['busca']);
                $sql_code = "SELECT * FROM fornecedores 
                        WHERE razao LIKE '%$pesquisa%' 
                        OR fantasia LIKE '%$pesquisa%' 
                        OR produtos LIKE '%$pesquisa%'
                        OR id LIKE '%$pesquisa%'";

                $sql_query = $conexao->query($sql_code) or die("Erro ao consultar" . $conexao->error);

                if ($sql_query->num_rows == 0) {
                ?>
                    <tr>
                        <td colspan="14">Nenhum resultado encontrado...</td>
                    </tr>
                    <?php
                } else {

                    while ($dados = $sql_query->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $dados['razao']; ?></td>
                            <td><?php echo $dados['cnpj']; ?></td>
                            <td><?php echo $dados['endereco']; ?></td>
                            <td><?php echo $dados['bairro']; ?></td>
                            <td><?php echo $dados['cidade']; ?></td>
                            <td class="tdUF"><?php echo $dados['uf']; ?></td>
                            <td><?php echo $dados['email']; ?></td>
                            <td><?php echo $dados['inscricao']; ?></td>
                            <td><?php echo $dados['pessoa']; ?></td>
                            <td><?php echo $dados['contato']; ?></td>
                            <td><?php echo $dados['prazo']; ?></td>
                            <td><?php echo $dados['desconto']; ?></td>
                            <td><?php echo $dados['produtos']; ?></td>
                            <td class="tdId"><?php echo $dados['id']; ?></td>
                            <td class="tdLinks"><?php echo '<a href="editar_fornecedor.php?id=' . $dados['id'] . '"> Editar </a>';
                                                echo "<hr>";
                                                echo '<a href="excluir_fornecedor.php?id=' . $dados['id'] . '" onclick="return confirm(\'Tem certeza que deseja excluir este fornecedor?\')"> Excluir </a>'; ?>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>

            <?php //**** */
            } ?>
            </table>
        </section>
    </div>

    <br>
    <hr>

    <div class="wrapperContainer inicio2">
        <section class="container acessoListas">
            <div class="titulos">
                <h4>Pesquisa Produtos:</h4>
            </div>

            <div class="pesquisa_tabela">
                <form action="">
                    <input name="buscaP" type="text" placeholder="Digite o nome do produto">
                    <button type="submit">Pesquisar</button>
                </form>
                <br>
                <div class="Tabela2">
                    <table width="1000px" border="1">
                        <tr>
                            <th>Produto</th>
                            <th>Unidade</th>
                            <th>Valor Unidade</th>
                            <th>Quantidade</th>
                            <th>Código de Barras</th>
                            <th>Validade</th>
                            <th>Lote</th>
                            <th>Fornecedor</th>
                            <th>Código</th>
                            <th> </th>
                        </tr>
                </div>
                <?php



                if (!isset($_GET['buscaP'])) {
                ?>
                    <tr>
                        <td colspan="9">Digite algo para pesquisar...</td>
                    </tr>
                    <?php
                } else {
                    $pesquisa = $conexao->real_escape_string($_GET['buscaP']);
                    $sql_code = "SELECT * FROM produtos 
                        WHERE produto LIKE '%$pesquisa%' 
                        OR unidade LIKE '%$pesquisa%' 
                        OR quantidade LIKE '%$pesquisa%'
                        OR lote LIKE '%$pesquisa%'
                        OR id LIKE '$pesquisa'";

                    $sql_query = $conexao->query($sql_code) or die("Erro ao consultar" . $conexao->error);

                    if ($sql_query->num_rows == 0) {
                    ?>
                        <tr>
                            <td colspan="9">Nenhum resultado encontrado...</td>
                        </tr>
                        <?php
                    } else {
                        while ($dados = $sql_query->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $dados['produto']; ?></td>
                                <td><?php echo $dados['unidade']; ?></td>
                                <td><?php echo $dados['valor']; ?></td>
                                <td><?php echo $dados['quantidade']; ?></td>
                                <td><?php echo $dados['codigo']; ?></td>
                                <td><?php echo $dados['validade']; ?></td>
                                <td><?php echo $dados['lote']; ?></td>
                                <td><?php echo $dados['fornecedor']; ?></td>
                                <td class="tdId"><?php echo $dados['id']; ?></td>
                                <td class="tdLinks"><?php echo '<a href="editar_produto.php?id=' . $dados['id'] . '"> Editar </a>';
                                                    echo "<hr>";
                                                    echo '<a href="excluir_produto.php?id=' . $dados['id'] . '" onclick="return confirm(\'Tem certeza que deseja excluir este produto?\')"> Excluir </a>'; ?>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>

                <?php //**** */
                } ?>
                </table>
            </div>
        </section>
    </div>
</body>

</html>