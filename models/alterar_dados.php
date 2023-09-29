<?php
include_once("conexao.php");
include_once("protect.php");

$id = $_SESSION['id'];

// Verificando se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Recuperando os dados do formulário

  $nome = $_POST['name'];
  $senha = $_POST['pass'];
  $etnia = $_POST['etnic'];
  $data = $_POST['date'];
  $estadoCivil = $_POST['state'];
  $genero = $_POST['gender'];
  $mae = $_POST['mother'];
  $pai = $_POST['father'];
  $nacionalidade = $_POST['nationality'];
  $naturalidade = $_POST['naturalness'];
  $sitOcupacional = $_POST['ocupationalsituation'];
  $nomeEmpresa = $_POST['companyname'];
  $cnpj = $_POST['cnpj'];
  $funcao = $_POST['function'];
  $necessidades = $_POST['specialnecessities'];
  $endereco = $_POST['address'];
  $bairro = $_POST['neighborhood'];
  $cidade = $_POST['city'];
  $uf = $_POST['uf'];
  $cep = $_POST['cep'];
  $telefone = $_POST['phone'];
  $telefone2 = $_POST['phone2'];
  $email = $_POST['email'];
  $seguroEmprego = $_POST['safejob'];
  $dinheiroFamilia = $_POST['familymoney'];
  $ofertaEmprego = $_POST['offerjob'];
  $usoImagem = $_POST['divulgation'];
  $divulgacaoDados = $_POST['marketing'];
  $nomePais = $_POST['nameparent'];
  $cpfPais = $_POST['cpfparent'];
  $rgPais = $_POST['rgparent'];
  $orgaoExp = $_POST['expeditorgan'];
  $ensinoFund = $_POST['fundamental'];
  $ensinoMed = $_POST['highschool'];
  $ensinoSup = $_POST['college'];
  $nomeEscola = $_POST['schoolname'];
  $municipio = $_POST['county'];
  $ufEscola = $_POST['ufschool'];
  $tipoEnsino = $_POST['learntype'];
  $modalidadeEnsino = $_POST['modalitylearn'];
  $estudoAtual = $_POST['studynow'];
  $modalideEstudo = $_POST['studymodal'];
  $tipoCurso = $_POST['typecourse'];
  
  if (isset($_POST['cursotec'])) {
      $cursoTec = $_POST['cursotec'];

  }

  if (isset($_POST['cursofic'])) {
    $cursoFic = $_POST['cursofic'];
  }
  $cursoFic = $_POST['cursofic'];
  $turnoEscola = $_POST['turnschool'];
  $horarioTurno = $_POST['hourturn'];

  //inserir dados

  $query = "UPDATE form_pronatec SET nome = '$nome', data_nasc ='$data', estado_civil='$estadoCivil',	sexo='$genero',	mae='$mae', pai='$pai',	nacionalidade='$nacionalidade',	naturalidade='$naturalidade',	cor_etnia='$etnia',	situacoes_ocup='$sitOcupacional',nome_empresa='$nomeEmpresa',cnpj='$cnpj',funcao='$funcao', necessidades_esp='$necessidades',	endereco='$endereco',	bairro='$bairro',	cidade='$cidade',	uf='$uf',	cep='$cep',	telefone1='$telefone',	telefone2='$telefone2',	email='$email',	seguro_des='$seguroEmprego',	aux_financ='$dinheiroFamilia',	oferta_emprego='$ofertaEmprego',	uso_imagem='$usoImagem',	divulg_produtos='$divulgacaoDados',	nome_resp='$nomePais',	cpf_resp='$cpfPais',	rg_resp='$rgPais',	orgao_exp='$orgaoExp',	ensino_fund='$ensinoFund',	ensino_med='$ensinoMed',	ensino_sup='$ensinoSup',	escola_nome='$nomeEscola',	escola_municipio='$municipio',	uf_escola='$ufEscola',	tipo_ensino='$tipoEnsino',	modalidade_ensino='$modalidadeEnsino',	mat_redepub='$estudoAtual',	tipo_matricula='$modalideEstudo', tipo_curso='$tipoCurso',	curso_fic='$cursoFic', curso_tecnico='$cursoTec' ,	turno_curso='$turnoEscola',	horario_curso='$horarioTurno' ,senha='$senha' WHERE id = $id";
}

  if (mysqli_query($conn, $query)) {
    mensagem("Alteração efetuada com sucesso", 'success');
  } else {
    mensagem("Não foi possivel realizar a alteração", 'danger');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração concluida</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
</body>
</html>