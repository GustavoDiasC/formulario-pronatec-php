<?php
include_once("models/protect.php");
include_once("models/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Dados</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="css/style.css">
</head>

<body class="text-black">
    <h1 class="text-center text-warning">Alterar dados do formulario</h1>
    <section class="mx-auto w-75 h-75 p-4 bg-warning  rounded-5 mt-4 mb-3 border-bottom border-4 border-primary">
        <form action="models/alterar_dados.php" method="POST">
            <nav>
                <a class="btn btn-danger btn-md" href="logout.php">Sair</a>
                <a class="btn btn-success btn-md" href="visualizardados.php">Visualizar Dados</a>
                <a class="btn btn-danger btn-md " type="submit"  onclick="avisoDelete()" href="models/deletar_dados.php">Deletar</a>
            </nav>
            <?php
            $id = $_SESSION['id'];
            // Query para selecionar todos os dados da tabela
            $sql = "SELECT * FROM form_pronatec WHERE id = '$id'";

            $result = mysqli_query($conn, $sql);

            // Verificando se a query retornou resultados
            if (mysqli_num_rows($result) > 0) {
                // Loop através dos resultados da query
                while ($row = mysqli_fetch_assoc($result)) {
                    // Adicionando os dados ao array
            ?>
                    <!--Dados do Aluno -->
                    <fieldset class="container mb-3">
                        <legend class="text-center fs-2 fw-bold">Dados do Aluno</legend>
                        <label class="form-label" for="name">Nome</label>
                        <input class="form-control mb-3" type="text" class="form-control" id="name" name="name" value="<?= $row['nome'] ?>" required>
                        <label class="form-label" for="pass">Senha</label>
                        <input class="form-control" type="password" class="form-control" id="pass" name="pass" value="<?= $row['senha'] ?>">
                    </fieldset>

                    <!-- Informações pessoais  -->
                    <section class="container mb-3">
                        <section class="row">
                            <section class="col">
                                <fieldset>
                                    <label class="mb-2" for="date">Escolha sua data de nascimento: </label>
                                    <input class="p-2" type="date" id="date" name="date" onchange="desabilitarCampoResp()" value="<?= $row['data_nasc'] ?>">
                                </fieldset>
                            </section>
                            <section class="col">
                                <legend>Estado Civil:</legend>
                                <fieldset>
                                    <input class="form-check-input" type="radio" class="form-control" id="state1" name="state" value="Solteiro" <?php if ($row['estado_civil'] == "Solteiro") {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?> required>
                                    <label class="form-check-label" for="state1">Solteiro</label>
                                </fieldset>
                                <fieldset>
                                    <input class="form-check-input" type="radio" class="form-control" id="state2" name="state" value="Casado" <?php if ($row['estado_civil'] == "Casado") {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
                                    <label class="form-check-label" for="state2">Casado</label>
                                </fieldset>
                                <fieldset>
                                    <input class="form-check-input" type="radio" class="form-control" id="state3" name="state" value="Divorciado" <?php if ($row['estado_civil'] == "Divorciado") {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                    <label class="form-check-label" for="state3">Divorciado</label>
                                </fieldset>
                            </section>
                            <section class="col">
                                <legend>Sexo:</legend>
                                <fieldset>
                                    <input class="form-check-input" type="radio" class="form-control" id="gender1" name="gender" value="Masculino" required <?php if ($row['sexo'] == "Masculino") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>>
                                    <label class="form-check-label" for="gender1">Masculino</label>
                                </fieldset>
                                <fieldset>
                                    <input class="form-check-input" type="radio" class="form-control" id="gender2" name="gender" value="Feminino" <?php if ($row['sexo'] == "Feminino") {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                    <label class="form-check-label" for="gender2">Feminino</label>
                                </fieldset>
                                <fieldset>
                                    <input class="form-check-input" type="radio" class="form-control" id="gender3" name="gender" value="Feminino" <?php if ($row['sexo'] == "Não declarado") {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                    <label class="form-check-label" for="gender3">Feminino</label>
                                </fieldset>
                            </section>
                            <section class="col">
                                <legend>Cor/Etnia:</legend>
                                <fieldset>
                                    <input class="form-check-input" type="radio" class="form-control" id="etnic1" name="etnic" value="Amarela" required  <?php if ($row['cor_etnia'] == "Amarela") {echo "checked";} ?>>
                                    <label class="form-check-label" for="etnic1">Amarela</label>
                                </fieldset>
                                <fieldset>
                                    <input class="form-check-input" type="radio" class="form-control" id="etnic2" name="etnic" value="Branca" <?php if ($row['cor_etnia'] == "Branca") {echo "checked";} ?>>
                                    <label class="form-check-label" for="etnic2">Branca</label>
                                </fieldset>
                                <fieldset>
                                    <input class="form-check-input" type="radio" class="form-control" id="etnic3" name="etnic" value="Indígena" <?php if ($row['cor_etnia'] == "Indígena") {echo "checked";} ?>>
                                    <label class="form-check-label" for="etnic3">Indígena</label>
                                </fieldset>
                                <fieldset>
                                    <input class="form-check-input" type="radio" class="form-control" id="etnic3" name="etnic" value="Preta" <?php if ($row['cor_etnia'] == "Preta") {echo "checked";} ?>>
                                    <label class="form-check-label" for="etnic3">Preta</label>
                                </fieldset>
                                <fieldset>
                                    <input class="form-check-input" type="radio" class="form-control" id="etnic4" name="etnic" value="Parda" <?php if ($row['cor_etnia'] == "Parda") {echo "checked";} ?>>
                                    <label class="form-check-label" for="etnic4">Parda</label>
                                </fieldset>
                            </section>
                        </section>
                    </section>

                    <!-- filiação e nacionalidade -->
                    <section class="container mb-3">
                        <section class="row">
                            <article class="col">
                                <fieldset>
                                    <label class="form-label" for="mother">Mãe:</label>
                                    <input class="form-control" type="text" class="form-control" id="mother" name="mother" value="<?= $row['mae'] ?>">
                                </fieldset>
                            </article>
                            <article class="col">
                                <fieldset>
                                    <label class="form-label" for="father">Pai:</label>
                                    <input class="form-control" type="text" class="form-control" id="father" name="father" value="<?= $row['pai'] ?>">
                                </fieldset>
                            </article>
                            <section class="container">
                                <section class="row">
                                    <article class="col mt-3">
                                        <fieldset>
                                            <label class="form-label" for="nationality">Nacionalidade:</label>
                                            <input class="form-control" type="text" class="form-control" id="nationality" name="nationality" value="<?= $row['nacionalidade'] ?>">
                                        </fieldset>
                                    </article>
                                    <article class="col mt-3">
                                        <fieldset>
                                            <label class="form-label" for="naturalness">Naturalidade/Estado:</label>
                                            <input class="form-control" type="text" class="form-control" id="naturalness" name="naturalness" value="<?= $row['naturalidade'] ?>">
                                        </fieldset>
                                    </article>
                                </section>
                            </section>
                        </section>
                    </section>

                    <!--Situação ocupacional-->
                    <section class="container mb-3">
                        <fieldset>
                            <legend>Situação ocupacional:</legend>
                            <select id="ocupacionalsit" class="form-select mb-3" aria-label="Situação ocupacional" name="ocupationalsituation" onchange="desabilitarCampoSitOcup()">
                                <option selected><?= $row['situacoes_ocup'] ?></option>
                                <option value="Aposentado">Aposentado</option>
                                <option value="Autônomo">Autônomo</option>
                                <option value="1º emprego">1º emprego</option>
                                <option value="Desempregado">Desempregado</option>
                                <option value="Empregado">Empregado</option>
                                <option value="Empregador">Empregador</option>
                                <option value="Profissional Liberal">Profissional Liberal</option>
                            </select>
                        </fieldset>
                        <section class="row">
                            <p>Caso a situação ocupacional seja “empregado”, informar:</p>
                            <article class="g-col-6 g-col-md-4 mb-3">
                                <fieldset>
                                    <label class="form-label" for="companyname">Nome da Empresa:</label>
                                    <input class="form-control" type="text" class="form-control" id="companyname" name="companyname" value="<?= $row['nome_empresa'] ?>">
                                </fieldset>
                            </article>
                            <article class="g-col-6 g-col-md-4 mb-3">
                                <fieldset>
                                    <label class="form-label" for="cnpj">CNPJ:</label>
                                    <input class="form-control" type="text" class="form-control" id="cnpj" name="cnpj" value="<?= $row['cnpj'] ?>">
                                </fieldset>
                            </article>
                            <article class="g-col-6 g-col-md-4 mb-3">
                                <fieldset>
                                    <label class="form-label" for="function">Função:</label>
                                    <input class="form-control" type="text" class="form-control" id="function" name="function" value="<?= $row['funcao'] ?>">
                                </fieldset>
                            </article>
                        </section>
                    </section>

                    <!--Necessidades especiais-->
                    <section class="container mb-3">
                        <fieldset>
                            <legend>Necessidades Especiais:</legend>
                            <select id="specialness" class="form-select mb-3" aria-label="Necessidades especiais" name="specialnecessities" onchange="desabilitarCampoResp()">
                                <option selected><?= $row['necessidades_esp'] ?></option>
                                <option value="Altas Habilidades ">Altas Habilidades </option>
                                <option value="Auditiva">Auditiva</option>
                                <option value="Física">Física</option>
                                <option value="Mental">Mental</option>
                                <option value="Multi-deficiência">Multi-deficiência</option>
                                <option value="Visual">Visual</option>
                                <option value="Condutas Típicas">Condutas Típicas</option>
                                <option value="Nenhuma">Nenhuma</option>
                            </select>
                        </fieldset>
                    </section>

                    <!--Endereço -->
                    <section class="container mb-3">
                        <section class="row mb-3">
                            <article class="col-8">
                                <fieldset>
                                    <label class="form-label" for="address">Endereço:</label>
                                    <input class="form-control" type="text" class="form-control" id="address" name="address" value="<?= $row['endereco'] ?>">
                                </fieldset>
                            </article>
                            <article class="col-4">
                                <fieldset>
                                    <label class="form-label" for="neighborhood">Bairro:</label>
                                    <input class="form-control" type="text" class="form-control" id="neighborhood" name="neighborhood" value="<?= $row['bairro'] ?>">
                                </fieldset>
                            </article>
                        </section>
                        <section class="row mb-3">
                            <article class="col-6">
                                <fieldset>
                                    <label class="form-label" for="city">Cidade:</label>
                                    <input class="form-control" type="text" class="form-control" id="city" name="city" value="<?= $row['cidade'] ?>">
                                </fieldset>
                            </article>
                            <article class="col">
                                <fieldset>
                                    <label class="form-label" for="uf">UF:</label>
                                    <input class="form-control" type="text" class="form-control" id="uf" name="uf" value="<?= $row['uf'] ?>">
                                </fieldset>
                            </article>
                            <article class="col">
                                <fieldset>
                                    <label class="form-label" for="cep">CEP:</label>
                                    <input class="form-control" type="text" class="form-control" id="cep" name="cep" value="<?= $row['cep'] ?>">
                                </fieldset>
                            </article>
                        </section>
                        <section class="row">
                            <article class="col">
                                <fieldset>
                                    <label class="form-label" for="phone">Telefone 1:</label>
                                    <input class="form-control" type="text" class="form-control" id="phone" name="phone" <?= $row['telefone1'] ?>>
                                </fieldset>
                            </article>
                            <article class="col">
                                <fieldset>
                                    <label class="form-label" for="phone2">Telefone 2:</label>
                                    <input class="form-control" type="text" class="form-control" id="phone2" name="phone2" value="<?= $row['telefone2'] ?>">
                                </fieldset>
                            </article>
                            <article class="col">
                                <fieldset>
                                    <label class="form-label" for="email">E-mail:</label>
                                    <input class="form-control" type="email" class="form-control" id="email" name="email" value="<?= $row['email'] ?>">
                                </fieldset>
                            </article>
                        </section>
                    </section>

                    <!--Beneficios-->
                    <section class="container mb-3">
                        <section class="row">
                            <section class="g-col-6 g-col-md-4">
                                <fieldset>
                                    <legend>Está recebendo Seguro Desemprego? </legend>
                                    <label class="form-check-label ms-1" for="safejob1">Sim</label>
                                    <input class="form-check-input" type="radio" class="form-control" id="safejob1" name="safejob" value="Sim" required <?php if ($row['seguro_des'] == "Sim") {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                    <label class="form-check-label" for="safejob">Não</label>
                                    <input class="form-check-input" type="radio" class="form-control" id="safejob" name="safejob" value="Não" required <?php if ($row['seguro_des'] == "Não") {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                </fieldset>
                            </section>
                            <section class="g-col-6 g-col-md-4">
                                <fieldset>
                                    <legend>Aluno ou sua família recebe auxílio financeiro por meio de algum programa de transferência de renda? </legend>
                                    <label class="form-check-label ms-1" for="familymoney1">Sim</label>
                                    <input class="form-check-input" type="radio" class="form-control" id="familymoney1" name="familymoney" value="Sim" required <?php if ($row['aux_financ'] == "Sim") {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                } ?>>
                                    <label class="form-check-label" for="familymoney">Não</label>
                                    <input class="form-check-input" type="radio" class="form-control" id="familymoney" name="familymoney" value="Não" required <?php if ($row['aux_financ'] == "Não") {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                } ?>>
                                </fieldset>
                            </section>
                            <section class="g-col-6 g-col-md-4">
                                <fieldset>
                                    <legend class="mb-2">Autorizo a inclusão de meus dados pessoais no cadastro de oferta de profissionais para vagas: </legend>
                                    <label class="form-check-label ms-1 " for="offerjob1">Sim</label>
                                    <input class="form-check-input " type="radio" class="form-control" id="offerJob1" name="offerjob" value="Sim" required <?php if ($row['oferta_emprego'] == "Sim") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>>
                                    <label class="form-check-label " for="offerjob">Não</label>
                                    <input class="form-check-input " type="radio" class="form-control" id="offerJob" name="offerjob" value="Não" required <?php if ($row['oferta_emprego'] == "Não") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>>
                                </fieldset>
                            </section>
                            <section class="g-col-6 g-col-md-4">
                                <fieldset>
                                    <legend>Autorizo o uso de minha imagem e dados para divulgação:</legend>
                                    <label class="form-check-label ms-1" for="divulgation1">Sim</label>
                                    <input class="form-check-input" type="radio" class="form-control" id="divulgation1" name="divulgation" value="Sim" required <?php if ($row['uso_imagem'] == "Sim") {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                } ?>>
                                    <label class="form-check-label" for="divulgation">Não</label>
                                    <input class="form-check-input" type="radio" class="form-control" id="divulgation" name="divulgation" value="Não" required <?php if ($row['uso_imagem'] == "Não") {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                } ?>>
                                </fieldset>
                            </section>
                            <section class="g-col-6 g-col-md-4">
                                <fieldset>
                                    <legend>Aceito receber por email informações de divulgação de produtos, serviços e oportunidade de emprego:</legend>
                                    <label class="form-check-label ms-1 " for="marketing1">Sim</label>
                                    <input class="form-check-input " type="radio" class="form-control" id="marketing1" name="marketing" value="Sim" required <?php if ($row['divulg_produtos'] == "Sim") {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                } ?>>
                                    <label class="form-check-label " for="marketing">Não</label>
                                    <input class="form-check-input " type="radio" class="form-control" id="marketing" name="marketing" value="Não" required <?php if ($row['divulg_produtos'] == "Não") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>>
                                </fieldset>
                            </section>
                        </section>
                    </section>

                    <!--Dados Responsavel-->
                    <section class="container mb-3">
                        <fieldset>
                            <legend class="text-center">Dados Responsável - Quando menor ou incapaz</legend>
                            <article class="mb-3">
                                <fieldset>
                                    <label class="form-label" for="nameparent">Nome:</label>
                                    <input class="form-control" type="text" class="form-control" id="nameparent" name="nameparent" value="<?= $row['nome_resp'] ?>">
                                </fieldset>
                            </article>
                            <section class="row">
                                <article class="g-col-6 g-col-md-4 mb-3">
                                    <fieldset>
                                        <label class="form-label" for="cpfparent">CPF:</label>
                                        <input class="form-control" type="number" class="form-control" id="cpfparent" name="cpfparent" value="<?= $row['cpf_resp'] ?>">
                                    </fieldset>
                                </article>
                                <article class="g-col-6 g-col-md-4 mb-3">
                                    <fieldset>
                                        <label class="form-label" for="rgparent">RG:</label>
                                        <input class="form-control" type="text" class="form-control" id="rgparent" name="rgparent" value="<?= $row['rg_resp'] ?>">
                                    </fieldset>
                                </article>
                                <article class="g-col-6 g-col-md-4 mb-3">
                                    <fieldset>
                                        <label class="form-label" for="expeditorgan">Órgão Expedidor:</label>
                                        <input class="form-control" type="text" class="form-control" id="expeditorgan" name="expeditorgan" value="<?= $row['orgao_exp'] ?>">
                                    </fieldset>
                                </article>
                            </section>
                        </fieldset>
                    </section>

                    <!--Dados Escolaridade-->
                    <section class="container mb-3">
                        <fieldset>
                            <legend class="text-center">Dados Escolaridade</legend>
                            <section class="row mb-3">
                                <article class="g-col-6 g-col-md-4 mb-3">
                                    <fieldset>
                                        <legend>Ensino Fundamental</legend>
                                        <label class="form-check-label" for="fundamental1">Completo</label>
                                        <input class="form-check-input" type="radio" class="form-control" id="fundamental1" name="fundamental" value="Completo" required <?php if ($row['ensino_fund'] == "Completo") {
                                                                                                                                                                                echo "checked";
                                                                                                                                                                            } ?>>
                                        <label class="form-check-label" for="fundamental">Incompleto Ano/serie:</label>
                                        <input class="form-check-input" type="radio" class="form-control" id="fundamental" name="fundamental" value="Incompleto" required <?php if ($row['ensino_fund'] == "Incompleto") {
                                                                                                                                                                                echo "checked";
                                                                                                                                                                            } ?>>
                                        <input class="form-control mt-2" type="text" id="fundyear" name="fundyear" value="">
                                    </fieldset>
                                </article>
                                <article class="g-col-6 g-col-md-4 mb-3">
                                    <fieldset>
                                        <legend>Ensino Médio</legend>
                                        <label class="form-check-label" for="highschool1">Completo</label>
                                        <input class="form-check-input" type="radio" class="form-control" id="highschool1" name="highschool" value="Completo" required <?php if ($row['ensino_med'] == "Completo") {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } ?>>
                                        <label class="form-check-label" for="highschool">Incompleto Ano/serie:</label>
                                        <input class="form-check-input" type="radio" class="form-control" id="highschool" name="highschool" value="Incompleto" required <?php if ($row['ensino_med'] == "Incompleto") {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } ?>>
                                        <input class="form-control mt-2" type="text" id="highschoolyear" name="highschoolyear" value="">
                                    </fieldset>
                                </article>
                                <article class="g-col-6 g-col-md-4 mb-3">
                                    <fieldset>
                                        <legend>Ensino Superior</legend>
                                        <label class="form-check-label" for="college1">Completo</label>
                                        <input class="form-check-input" type="radio" class="form-control" id="college1" name="college" value="Completo" required <?php if ($row['ensino_sup'] == "Completo") {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    } ?>>
                                        <label class="form-check-label " for="college">Incompleto Ano/serie:</label>
                                        <input class="form-check-input " type="radio" class="form-control" id="college" name="college" value="Incompleto" required <?php if ($row['ensino_sup'] == "Incompleto") {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    } ?>>
                                        <input class="form-control mt-2" type="text" id="degreeyear" name="degreeyear" value="">
                                    </fieldset>
                                </article>
                            </section>
                        </fieldset>

                        <section class="row">
                            <fieldset>
                                <legend>Dados da Escola</legend>
                                <section class="g-col-6 g-col-md-4">
                                    <fieldset>
                                        <label class="form-check-label" for="schoolname">Escola:</label>
                                        <input class="form-control" type="text" id="schoolname" name="schoolname" value="<?= $row['escola_nome'] ?>">
                                    </fieldset>
                                </section>
                                <section class="g-col-6 g-col-md-4 mb-3">
                                    <fieldset>
                                        <label class="form-check-label" for="county">Município:</label>
                                        <input class="form-control" type="text" id="county" name="county" value="<?= $row['escola_municipio'] ?>">
                                    </fieldset>
                                </section>
                                <section class="g-col-6 g-col-md-4 mb-3">
                                    <fieldset>
                                        <label class="form-check-label" for="ufschool">UF:</label>
                                        <input class="form-control" type="text" id="ufschool" name="ufschool" value="<?= $row['uf_escola'] ?>">
                                    </fieldset>
                                </section>
                            </fieldset>

                            <section class="row">
                                <section class=" g-col-6 g-col-md-4 mt-3">
                                    <p>Tipo de ensino:</p>
                                    <select class="form-select mb-3" aria-label="tipo de ensino" name="learntype">
                                        <option selected><?= $row['tipo_ensino'] ?></option>
                                        <option value="Regular">Regular</option>
                                        <option value="Educação de Jovens e Adultos">Educação de Jovens e Adultos</option>
                                    </select>
                                </section>
                                <section class=" g-col-6 g-col-md-4 mt-3">
                                    <p>Cursou/Cursando o ensino:</p>
                                    <select class="form-select mb-3" aria-label="modalidade do ensino" name="modalitylearn">
                                        <option selected><?= $row['modalidade_ensino'] ?></option>
                                        <option value="Público Municipal">Público Municipal</option>
                                        <option value="Público Federal">Público Federal</option>
                                        <option value="Público Estadual">Público Estadual</option>
                                        <option value="Privado">Privado</option>
                                    </select>
                                </section>
                            </section>

                            <fieldset>
                                <legend>Atualmente você está matriculado na rede pública?</legend>
                                <label class="form-check-label ms-1 " for="studynow1">Sim</label>
                                <input class="form-check-input " type="radio" class="form-control" id="studynow1" name="studynow" value="Sim" required <?php if ($row['mat_redepub'] == "Sim") {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                <label class="form-check-label " for="studynow">Não</label>
                                <input class="form-check-input " type="radio" class="form-control" id="studynow" name="studynow" value="Não" required <?php if ($row['mat_redepub'] == "Não") {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                            </fieldset>

                            <fieldset>
                                <label class="form-check-label " for="studymodality">no Ensino Médio</label>
                                <input class="form-check-input " type="radio" class="form-control" id="studymodality" name="studymodal" value="Ensino médio" required <?php if ($row['tipo_matricula'] == "Ensino médio") {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } ?>>
                                <label class="form-check-label " for="studymodality2">na EJA- ensino médio</label>
                                <input class="form-check-input " type="radio" class="form-control" id="studymodality2" name="studymodal" value="EJA - Ensino médio" required <?php if ($row['tipo_matricula'] == "EJA - Ensino médio") {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                } ?>>
                                <label class="form-check-label " for="studymodality3">na EJA- ensino fundamental</label>
                                <input class="form-check-input " type="radio" class="form-control" id="studymodality3" name="studymodal" value="EJA - Ensino fundamental" required <?php if ($row['tipo_matricula'] == "EJA - Ensino fundamental") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    } ?>>
                            </fieldset>
                        </section>
                    </section>

                    <!--Dados do Curso-->
                    <section class="container">
                        <fieldset>
                            <legend class="text-center">Dados do Curso</legend>
                            <article class="d-flex align-items-center ">
                                <label class="ms-1 fw-bold">Curso FIC <input class=" form-check-input mb-2" type="radio" class="form-control" id="cursoFicCheck" name="typecourse" value="Curso fic" required <?php if ($row['tipo_curso'] == "Curso fic") {
                                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                                } ?>></label>
                            </article>
                        </fieldset>

                        <select class="form-select mb-3" aria-label="curso FIC(formação inicial continuada)" name="cursofic" id="cursofic" onchange="alterarCampoTurno()">
                            <option selected><?= $row['curso_fic'] ?></option>
                            <option value="AGENTE EPIDEMIOLÓGICO">AGENTE EPIDEMIOLÓGICO</option>
                            <option value="AUXILIAR ADMINISTRATIVO">AUXILIAR ADMINISTRATIVO</option>
                            <option value="AUXILIAR DE CRECHE">AUXILIAR DE CRECHE</option>
                            <option value="BOLOS E SUAS VARIAÇÕES ">BOLOS E SUAS VARIAÇÕES </option>
                            <option value="EDUCAÇÃO ESPECIAL E INCLUSIVA">EDUCAÇÃO ESPECIAL E INCLUSIVA</option>
                            <option value="MAQUIAGEM">MAQUIAGEM</option>
                            <option value="RECEPCIONISTA">RECEPCIONISTA</option>
                            <option value="SECRETARIA ESCOLAR ">SECRETARIA ESCOLAR </option>
                            <option value="TECNOLOGIAS EDUCACIONAIS">TECNOLOGIAS EDUCACIONAIS</option>
                            <option value="WORD E EXCEL">WORD E EXCEL</option>
                        </select>

                        <fieldset>
                            <article class="d-flex align-items-center ">
                                <label class="ms-1 fw-bold">Curso TÉCNICO <input class=" form-check-input mb-2" type="radio" class="form-control" id="cursoTecCheck" name="typecourse" required value="Curso Técnico" <?php if ($row['tipo_curso'] == "Curso Técnico") {
                                                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                                                        } ?>></label>

                            </article>
                        </fieldset>

                        <select class="form-select mb-3" aria-label="curso técnico" name="cursotec" id="cursotec" onchange="alterarCampoHora()">
                            <option selected><?= $row['curso_tecnico'] ?></option>
                            <option value="ADMINISTRAÇÃO">ADMINISTRAÇÃO</option>
                            <option value="INFORMÁTICA">INFORMÁTICA</option>
                            <option value="RÁDIO E TV">RÁDIO E TV</option>
                        </select>


                        <section class="row">
                            <article class="col">
                                <fieldset>
                                    <legend>Turno:</legend>
                                    <select readonly="readonly" class="form-select mb-3" aria-label="turno dos cursos" name="turnschool" id="turnschool" onchange="alterarCampoHora()">
                                        <option selected><?= $row['turno_curso'] ?></option>
                                        <option value="MATUTINO">MATUTINO</option>
                                        <option value="VESPERTINO">VESPERTINO </option>
                                        <option value="NOTURNO">NOTURNO</option>
                                    </select>
                                </fieldset>
                            </article>

                            <article class="col">
                                <fieldset>
                                    <legend>Horário:</legend>
                                    <select readonly="readonly" class="form-select mb-3" aria-label="Default select example" name="hourturn" id="hourturn">
                                        <option selected><?= $row['horario_curso'] ?></option>
                                        <option value="7h às 11h">7h às 11h</option>
                                        <option value="13h às 17h">13h às 17h</option>
                                        <option value="18h às 22h">18h às 22h</option>
                                    </select>
                                </fieldset>
                            </article>
                        </section>
                    </section>
            <?php   }
            } else {
                mensagem("Nenhum registro foi feito", 'danger');
            }
            ?>


            <section class="d-grid container mt-3">
                <input class="btn btn-success btn-lg mb-3" type="submit" value="Alterar" onclick="avisoAlteracao()">   
            </section>
        </form>
        
    </section>
    <script src="./js/script.js"></script>
</body>

</html>