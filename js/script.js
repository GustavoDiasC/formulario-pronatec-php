//desabilitar campos da situação ocupacional

function desabilitarCampoSitOcup() {
    var campo = document.getElementById("ocupacionalsit");
    if (campo.value !== "Empregado") {
      document.getElementById("companyname").readOnly = true;
      document.getElementById("cnpj").readOnly = true;
      document.getElementById("function").readOnly = true;
    } else {
      document.getElementById("companyname").readOnly = false;
      document.getElementById("cnpj").readOnly = false;
      document.getElementById("function").readOnly = false;
    }
}

//desabilitar campos de responsável quando for menor ou incapaz
function desabilitarCampoResp() {
    let campoEspecial = document.getElementById("specialness");
    let dataNasc  = document.getElementById("date").value;
    let anoNasc = new Date(dataNasc).getFullYear();
    let anoAtual = new Date().getFullYear();
    let idade = anoAtual - anoNasc;

    if (idade >= 18 || campoEspecial.value !== "Nenhuma") {
      document.getElementById("nameparent").readOnly = true;
      document.getElementById("cpfparent").readOnly = true;
      document.getElementById("rgparent").readOnly = true;
      document.getElementById("expeditorgan").readOnly = true;
    } else {
        document.getElementById("nameparent").readOnly = false;
        document.getElementById("cpfparent").readOnly = false;
        document.getElementById("rgparent").readOnly = false;
        document.getElementById("expeditorgan").readOnly = false;
    }
}

//desabilitar campos de escolaridade quando o ensino for completo
    let opcaoEscola = document.getElementsByName("fundamental")
    let opcaoEscola2 = document.getElementsByName("highschool")
    let opcaoEscola3 = document.getElementsByName("college")
   
    for (let i = 0; i < opcaoEscola.length; i++) {
        for (let m = 0; m < opcaoEscola2.length; m++) {
            for (let c = 0; c < opcaoEscola3.length; c++) {
                opcaoEscola[i].addEventListener("change", function(){
                    let opcaoEscolhidaf = document.querySelector('input[name="fundamental"]:checked').value;
        
                    if (opcaoEscolhidaf !== "Completo") {
                        document.getElementById("fundyear").readOnly = false;
                    }else{
                        document.getElementById("fundyear").readOnly = true;
                    }
                })

                opcaoEscola2[m].addEventListener("change", function(){
                    let opcaoEscolhidam = document.querySelector('input[name="highschool"]:checked').value;
        
                    if (opcaoEscolhidam !== "Completo") {
                        document.getElementById("highschoolyear").readOnly = false;
                    }else{
                        document.getElementById("highschoolyear").readOnly = true;
                    }
                })
                 
                opcaoEscola3[c].addEventListener("change", function(){
                    let opcaoEscolhidac = document.querySelector('input[name="college"]:checked').value;
        
                    if (opcaoEscolhidac !== "Completo") {
                        document.getElementById("degreeyear").readOnly = false;
                    }else{
                        document.getElementById("degreeyear").readOnly = true;
                    }
                }) 
                
            }   
        }
    }

//desabilitar campos ao escolher um tipo de curso

$(document).ready(function() {
    $('input[name="typecourse"]').change(function() {
      if ($(this).is(":checked") && $(this).val() == "Curso fic") {
        $('#cursotec').hide();
        $('#cursotec').val('');
        $('#cursofic').show();
      } else {
        $('#cursofic').hide();
        $('#cursofic').val('');
        $('#cursotec').show();
      }
    });
  });



//função para desabilitar radio da situação matricula  
$(document).ready(function() {
    $('input[name="studynow"]').change(function() {
      if ($(this).is(":checked") && $(this).val() == "Não") {
        $('#studymodality').hide();
        $('#studymodality').val('');
        $('#studymodality2').hide();
        $('#studymodality2').val('');
        $('#studymodality3').hide();
        $('#studymodality3').val('');
      } else {
        $('#studymodality').show();
        $('#studymodality2').show();
        $('#studymodality3').show();
      }
    });
  });


//limitar um valor para curso tecnico ou fic

// Seleciona o elemento <select>
var selectElement = document.getElementById("cursofic");

// Define o valor padrão como "Selecione uma opção"
selectElement.value = "";

// Adiciona um listener de evento para verificar se uma opção é selecionada
selectElement.addEventListener("change", function() {
  if (selectElement.value === "") {
    selectElement.value = "";
  }
});

var selectElement = document.getElementById("cursotec");

// Define o valor padrão como "Selecione uma opção"
selectElement.value = "";

// Adiciona um listener de evento para verificar se uma opção é selecionada
selectElement.addEventListener("change", function() {
  if (selectElement.value === "") {
    selectElement.value = "";
  }
});

  
  


//indicar um turno para cursos especificos
function alterarCampoTurno() {
    const opcao1 = document.querySelector('input[name="typecourse"][value="Curso fic"]');

        
    if (opcao1.checked = true) {

        if (opcaocursofic.value === "AGENTE EPIDEMIOLÓGICO" || opcaocursofic.value === "AUXILIAR ADMINISTRATIVO" || opcaocursofic.value === "AUXILIAR DE CRECHE" || opcaocursofic.value === "EDUCAÇÃO ESPECIAL E INCLUSIVA") {
            document.getElementById("turnschool").value = "MATUTINO";
            document.getElementById("turnschool").readOnly = true;
            document.getElementById("hourturn").value = "7h às 11h";
        } else if (opcaocursofic.value === "BOLOS E SUAS VARIAÇÕES" || opcaocursofic.value === "MAQUIAGEM") {
            document.getElementById("turnschool").value = "VESPERTINO";
            document.getElementById("turnschool").readOnly = true;
            document.getElementById("hourturn").value = "13h às 17h";
        } else if (opcaocursofic.value === "RECEPCIONISTA" || opcaocursofic.value === "SECRETARIA ESCOLAR" || opcaocursofic.value === "TECNOLOGIAS EDUCACIONAIS") {
            document.getElementById("turnschool").value = "NOTURNO";
            document.getElementById("turnschool").readOnly = true;
            document.getElementById("hourturn").value = "18h às 22h";
        }else{
            document.getElementById("turnschool").readOnly = false;
        }

    }


}

function avisoAlteracao(){
    let confirmacao = confirm('Atenção você deseja realmente alterar os dados!?');
    if(confirmacao = true){
        alert("Operação realizada!");
    }else{
        alert("Operação cancelada!");
    }
}

function avisoDelete(){
    let confirmacao2 = confirm('Atenção você deseja realmente apagar os dados!?');
    if(confirmacao2 = true){
        alert("Operação realizada!");
    }else{
        alert("Operação cancelada!");
    }
}

function alertaAlteracao(){
    alert("Para alterar os dados entre com seu email e senha registrados no cadastro!!");
}

    


//Indica o horario correto do turno de acordo com a opção escolhida
function alterarCampoHora(){
    let opcaoTurno = document.getElementById("turnschool");

    if (opcaoTurno.value === "MATUTINO") {
        document.getElementById("hourturn").value = "7h às 11h";
    }else if (opcaoTurno.value === "VESPERTINO"){
        document.getElementById("hourturn").value = "13h às 17h";
    }else{
        document.getElementById("hourturn").value = "18h às 22h";
    }
}



