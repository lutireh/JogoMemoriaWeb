var usuario;
var senha;
var nome;
var dataNascimento;
var cpf;
var telefone; 
var email;

function verificaCamposLogin(){
  usuario = document.forms["formularioLogin"]["usuario"].value;
  senha = document.forms["formularioLogin"]["senha"].value;

  if (usuario=="" || senha=="") {
    alert("preencha todos os campos");
    return false;
  }
  else
    return true;
}

function verificaCamposCadastro(){
  usuario = document.forms["formularioCadastro"]["usuario"].value;
  senha = document.forms["formularioCadastro"]["senha"].value;
  nome = document.forms["formularioCadastro"]["nome"].value;
  dataNascimento = document.forms["formularioCadastro"]["nascimento"].value;
  cpf = document.forms["formularioCadastro"]["cpf"].value;
  email = document.forms["formularioCadastro"]["email"].value;
  telefone = document.forms["formularioCadastro"]["telefone"].value;

  if(usuario=="" || senha=="" || nome=="" || dataNascimento=="" || cpf=="" || email=="" || telefone==""){
    alert ("Preencha Todos os Campos");
    return false;
  }
  else{
    return true;
  }
}
