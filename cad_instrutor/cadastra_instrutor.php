cadastra_instrutor.php
<?php
// Inclua o arquivo de conexão
require_once '../conexao.php';

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

    // Construa a consulta SQL para inserir o registro
    $sql = "INSERT INTO TAB_INSTRUTOR (CPF, NOME, ENDERECO, NUMERO, BAIRRO, CIDADE, ESTADO, EMAIL, SENHA) 
            VALUES ('$cpf', '$nome', '$endereco', '$numero', '$bairro', '$cidade', '$estado', '$email', '$senha')";

    // Execute a consulta SQL
    if (mysqli_query($conn, $sql)) {
        echo "Registro inserido com sucesso.";
    } else {
        echo "Erro ao inserir o registro: " . mysqli_error($conn);
    }

    // Feche a conexão com o banco de dados
    mysqli_close($conn);

    // Redirecione para a página de exibição do instrutor após a atualização
    header("Location: listar_instrutor.php");
    exit;

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de instrutor</title>
</head>
<body>
    <h2>Cadastro de instrutor</h2>
    <form method="POST" action="">
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required><br><br>

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco"><br><br>

        <label for="numero">Número:</label>
        <input type="text" id="numero" name="numero"><br><br>

        <label for="bairro">Bairro:</label>
        <input type="text" id="bairro" name="bairro"><br><br>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade"><br><br>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" maxlength="2"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" maxlength="20"><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>