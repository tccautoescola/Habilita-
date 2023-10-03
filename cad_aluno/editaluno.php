<?php
// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupere os dados do formulário
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Inclua o arquivo de conexão
    require_once '../conexao.php';

    // Construa a consulta SQL para atualizar o registro
    $sql = "UPDATE TAB_ALUNO 
            SET NOME = '$nome', ENDERECO = '$endereco', NUMERO = '$numero', BAIRRO = '$bairro', CIDADE = '$cidade', ESTADO = '$estado', EMAIL = '$email', SENHA = '$senha' 
            WHERE CPF = '$cpf'";

    // Execute a consulta SQL
    if (mysqli_query($conn, $sql)) {
        echo "Registro atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar o registro: " . mysqli_error($conn);
    }

    // Redirecione para a página de exibição do aluno após a atualização
    header("Location: listar_aluno.php");
    exit;
}
?>