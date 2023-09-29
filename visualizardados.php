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
  <title>Resultado</title>

  <!-- Boostrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!---Fontawesome icones--->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="style.css">


</head>

<body>
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
     
      <section class="mt-4 mb-4 w-50 mx-auto">
        <h1 class="text-center mb-3">Dados do Aluno</h1>
        <section class="border border-dark border-3 rounded p-1 container mb-3"> 
        <nav>
          <a class="btn btn-primary btn-md" href="alterardados.php">Voltar</a>
        </nav>
          <article class="row g-2 ">
            <span class="g-col-6 g-col-md-4 border-dark border-bottom">
              <h2 class="text-center  fs-2">Informações <br> Pessoais</h2>
            </span>
            <ul class="g-col-6 g-col-md-4 fs-6 list-group list-group-flush">
              <li class="list-group-item">Nome do aluno: <?= $row['nome'] ?> </li>
              <li class="list-group-item">Data de nascimento: <?= $row['data_nasc'] ?> </li>
              <li class="list-group-item">Estado civil:<?= $row['estado_civil'] ?> </li>
              <li class="list-group-item">Sexo: <?= $row['sexo'] ?> </li>
            </ul>
          </article>
        </section>
        <section class="border border-dark border-3 rounded p-1 container mb-3">
          <article class="row g-2 ">
            <span class="g-col-6 g-col-md-4 border-dark border-bottom">
              <h2 class="text-center  fs-2">Filiação e <br>Nacionalidade</h2>
            </span>
            <ul class="g-col-6 g-col-md-4 fs-6 list-group list-group-flush">
              <li class="list-group-item">Mãe: <?= $row['mae'] ?></li>
              <li class="list-group-item">Pai: <?= $row['pai'] ?></li>
              <li class="list-group-item">Nacionalidade: <?= $row['nacionalidade'] ?></li>
              <li class="list-group-item">Naturalidade/Estado: <?= $row['naturalidade'] ?></li>
              <li class="list-group-item">Cor/Etnia: <?= $row['cor_etnia'] ?></li>
            </ul>
          </article>
        </section>

        <section class="border border-dark border-3 rounded p-1 container mb-3">
          <article class="row g-2 ">
            <span class="g-col-6 g-col-md-4 border-dark border-bottom">
              <h2 class="text-center  fs-2">Situação <br>Ocupacional</h2>
            </span>
            <ul class="g-col-6 g-col-md-4 fs-6 list-group list-group-flush">
              <li class="list-group-item">Nome da empresa:<?= $row['nome_empresa'] ?></li>
              <li class="list-group-item">CNPJ:<?= $row['cnpj'] ?></li>
              <li class="list-group-item">Função:<?= $row['funcao'] ?></li>
              <li class="list-group-item">Situação:<?= $row['situacoes_ocup'] ?></li>
            </ul>
          </article>
        </section>

        <section class="border border-dark border-3 rounded p-1 container mb-3">
          <article class="row  g-2 ">
            <span class="g-col-6 g-col-md-4 border-dark border-bottom">
              <h2 class="text-center  fs-2">Necessidades <br>Especiais</h2>
            </span>
            <p class="g-col-6 g-col-md-4 align-self-center fs-4 ms-1">Necessidades: </p>
          </article>
        </section>

        <section class="border border-dark border-3 rounded p-1 container mb-3">
          <article class="row  g-2 ">
            <span class="g-col-6 g-col-md-4 border-dark border-bottom">
              <h2 class="text-center  fs-2">Endereço </h2>
            </span>
            <ul class="g-col-6 g-col-md-4 fs-6 list-group list-group-flush">
              <li class="list-group-item">Endereço:<?= $row['endereco'] ?></li>
              <li class="list-group-item">Bairro:<?= $row['bairro'] ?></li>
              <li class="list-group-item">Cidade:<?= $row['cidade'] ?></li>
              <li class="list-group-item">UF:<?= $row['uf'] ?></li>
              <li class="list-group-item">CEP:<?= $row['cep'] ?></li>
            </ul>
          </article>
        </section>

        <section class="border border-dark border-3 rounded p-1 container mb-3">
          <article class="row  g-2 ">
            <span class="g-col-6 g-col-md-4  border-dark border-bottom">
              <h2 class="text-center  fs-2">Contato </h2>
            </span>
            <ul class="g-col-6 g-col-md-4 fs-6 list-group list-group-flush">
              <li class="list-group-item">Telefone 1:<?= $row['telefone1'] ?></li>
              <li class="list-group-item">Telefone 2:<?= $row['telefone2'] ?></li>
              <li class="list-group-item">E-mail:<?= $row['email'] ?></li>
            </ul>
          </article>
        </section>

        <section class="border border-dark border-3 rounded p-1 container mb-3">
          <article class="row  g-2 ">
            <span class="g-col-6 g-col-md-4  border-dark border-bottom">
              <h2 class="text-center  fs-2">Beneficios e <br> Autorizações </h2>
            </span>
            <ul class="g-col-6 g-col-md-4 fs-6 list-group list-group-flush">
              <li class="list-group-item">Está recebendo Seguro Desemprego:<?= $row['seguro_des'] ?></li>
              <li class="list-group-item">Aluno ou sua família recebe auxílio financeiro:<?= $row['aux_financ'] ?></li>
              <li class="list-group-item ">Autorizo a inclusão de meus dados pessoais no cadastro de oferta de profissionais para vagas:<?= $row['oferta_emprego'] ?></li>
              <li class="list-group-item ">Autorizo o uso de minha imagem e dados para divulgação:<?= $row['uso_imagem'] ?></li>
              <li class="list-group-item">Aceito receber por email informações de divulgação de produtos, serviços e oportunidade de emprego:<?= $row['divulg_produtos'] ?></li>
            </ul>
          </article>
        </section>

        <section class="border border-dark border-3 rounded p-1 container mb-3">
          <article class="row  g-2 ">
            <span class="g-col-6 g-col-md-4  border-dark border-bottom">
              <h2 class="text-center  fs-2">Dados do <br> Responsável </h2>
            </span>
            <ul class="g-col-6 g-col-md-4 fs-6 list-group list-group-flush">
              <li class="list-group-item">Nome:<?= $row['nome_resp'] ?></li>
              <li class="list-group-item">CPF:<?= $row['cpf_resp'] ?></li>
              <li class="list-group-item ">RG:<?= $row['rg_resp'] ?></li>
              <li class="list-group-item ">Orgão Expedidor:<?= $row['orgao_exp'] ?></li>
            </ul>
          </article>
        </section>

        <section class="border border-dark border-3 rounded p-1 container mb-3">
          <article class="row  g-2 ">
            <span class="g-col-6 g-col-md-4  border-dark border-bottom">
              <h2 class="text-center  fs-2">Escolaridade </h2>
            </span>
            <ul class="g-col-6 g-col-md-4 fs-6 list-group list-group-flush">
              <li class="list-group-item">Ensino Fundamental:<?= $row['ensino_fund'] ?></li>
              <li class="list-group-item">Ensino Médio:<?= $row['ensino_med'] ?></li>
              <li class="list-group-item ">Ensino Superior:<?= $row['ensino_sup'] ?></li>
              <li class="list-group-item ">Escola:<?= $row['escola_nome'] ?></li>
              <li class="list-group-item ">Município:<?= $row['escola_municipio'] ?></li>
              <li class="list-group-item ">UF:<?= $row['uf_escola'] ?></li>
            </ul>
          </article>
        </section>

        <section class="border border-dark border-3 rounded p-1 container mb-3">
          <article class="row  g-2 ">
            <span class="g-col-6 g-col-md-4  border-dark border-bottom">
              <h2 class="text-center  fs-2">Tipo de ensino </h2>
            </span>
            <ul class="g-col-6 g-col-md-4 fs-6 list-group list-group-flush">
              <li class="list-group-item">Tipo:<?= $row['tipo_ensino'] ?></li>
              <li class="list-group-item">Modalidade:<?= $row['modalidade_ensino'] ?></li>
              <li class="list-group-item">Está matriculado:<?= $row['mat_redepub'] ?></li>
              <li class="list-group-item">Em qual grau:<?= $row['tipo_matricula'] ?></li>
            </ul>
          </article>
        </section>

        <section class="border border-dark border-3 rounded p-1 container mb-3">
          <article class="row  g-2 ">
            <span class="g-col-6 g-col-md-4  border-dark border-bottom">
              <h2 class="text-center  fs-2">Dados do Curso </h2>
            </span>
            <ul class="g-col-6 g-col-md-4 fs-6 list-group list-group-flush">
              <li class="list-group-item">Tipo curso:<?= $row['tipo_curso'] ?></li>
              <li class="list-group-item">Curso escolhido:<?= $row['curso_fic'] ?></li>
              <li class="list-group-item">Curso escolhido:<?= $row['curso_tecnico'] ?></li>
              <li class="list-group-item">Turno:<?= $row['turno_curso'] ?></li>
              <li class="list-group-item">Horário:<?= $row['horario_curso'] ?></li>
            </ul>
          </article>
        </section>
    <?php   }
  } else {
    mensagem("Nenhum registro foi feito", 'danger');
  }
    ?>

    <section class="border border-dark border-3 rounded p-1 container">
      <article class="row  g-2 ">
        <span class="g-col-6 g-col-md-4  border-dark border-bottom">
          <h2 class="text-center  fs-2">Observações </h2>
        </span>
        <ul class="g-col-6 g-col-md-4 fs-6 list-group list-group-flush list-unstyled p-2">
          <li>
            1. O curso poderá ser adiado ou cancelado quando:
            a) o número de alunos for inferior às vagas disponíveis;
            b) motivo de força maior deliberado pela Gerência da instituição responsável pela execução do curso;
          </li>
          <li>2. No caso de omissão da inclusão dos dados pessoais, uso da imagem e recebimento de informações será entbottomido como aceita (sim);</li>
          <li>3. O aluno e/ou seu responsável devem respeitar as normas escolares vigentes da instituição responsável pela execução do curso;</li>
          <li>4. O aluno e ou seu responsável declara possuir os conhecimentos específicos prévios necessários para participar do curso, atbottomo assim ao(s) pré-requisito(s) descrito(s) no Descritivo do Curso/Plano de Curso;</li>
          <li>5. O aluno ou seu responsável declara veracidade das informações acima prestadas.</li>
        </ul>
      </article>
    </section>

    <section class="container mt-4">
      <section class="row g-3">
        <article class="col">
          <hr>
          <p class="text-center">Assinatura do Aluno</p>
        </article>
        <article class="col">
          <hr>
          <p class="text-center">Assinatura do Responsável Legal (por extenso)</p>
        </article>
      </section>
    </section>

      </section>

      <script src="./js/script.js"></script>
</body>

</html>