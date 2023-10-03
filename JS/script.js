//cpfField = document.querySelector("#cpf");
//cpfField.addEventListener("blur",TestaCPF(cpfField.value))

function testaCPF() {
  let strCPF = document.getElementById("cpf").value;

  var Soma;
  var Resto;
  Soma = 0;
  var resultado = false;

  if (strCPF == "00000000000") resultado = false;

  for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
  Resto = (Soma * 10) % 11;

  if ((Resto == 10) || (Resto == 11))
    Resto = 0;

  if (Resto != parseInt(strCPF.substring(9, 10)))
    resultado = false;

  Soma = 0;
  for (i = 1; i <= 10; i++)
    Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
  
  Resto = (Soma * 10) % 11;

  if ((Resto == 10) || (Resto == 11))
    Resto = 0;

  if (Resto != parseInt(strCPF.substring(10, 11) ))
    resultado = false;    
  else
    resultado = true;

  if (resultado == false) {
    alert("CPF Inválido");
    return;
  }
}

function validarSenha(){
  if(password.value != confirmp.value){
      alert("Senhas diferentes!");
      password.value="";
      confirmp.value="";
      password.focus();
  }
}


