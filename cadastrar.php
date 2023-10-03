<?php
//Recebendo a descrição ao formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];



//Conexao com BD
include_once("conexao.php");

//Instrução SQL
$stmt = "insert into tbusuarios values ('$nome', '$email', '$cpf', '$senha');";

//Executando a instrução SQL
if(mysqli_query($conn,$stmt)){
    header("Location:index.html");
}else{
    echo "Erro ao cadastrar categoria".mysqli_error($conn)."<br>";
}
//Fechando o BD
mysqli_close($conn);
?>