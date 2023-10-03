editar_instrutor.php
 <?php
// Inclua o arquivo de conexão
require_once '../conexao.php';

// Verifique se o parâmetro "cpf" foi fornecido na URL
if (isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];

    // Consulta SQL para selecionar o instrutor pelo CPF
    $sql = "SELECT * FROM TAB_instrutor WHERE CPF = '$cpf'";

    // Execute a consulta SQL
    $resultado = mysqli_query($conn, $sql);

    // Verifique se o instrutor foi encontrado
    if (mysqli_num_rows($resultado) == 1) {
        $instrutor = mysqli_fetch_assoc($resultado);
    } else {
        echo "instrutor não encontrado.";
        exit;
    }
} else {
    echo "Parâmetro CPF não fornecido.";
    exit;
}

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

    // Construa a consulta SQL para atualizar o registro
    $sql = "UPDATE TAB_instrutor 
            SET NOME = '$nome', ENDERECO = '$endereco', NUMERO = '$numero', BAIRRO = '$bairro', CIDADE = '$cidade', ESTADO = '$estado', EMAIL = '$email', SENHA = '$senha' 
            WHERE CPF = '$cpf'";

    // Execute a consulta SQL
    if (mysqli_query($conn, $sql)) {
        echo "Registro atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar o registro: " . mysqli_error($conn);
    }

    // Redirecione para a página de exibição do instrutor após a atualização
    header("Location: listar_instrutor.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar instrutor</title>
</head>
<body>
    <h2>Editar instrutor</h2>
    <form method="POST" action="">
        <input type="hidden" name="cpf" value="<?php echo $instrutor['CPF']; ?>">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $instrutor['NOME']; ?>"><br><br>
        <label>Endereço:</label>
        <input type="text" name="endereco" value="<?php echo $instrutor['ENDERECO']; ?>"><br><br>
        <label>Número:</label>
        <input type="text" name="numero" value="<?php echo $instrutor['NUMERO']; ?>"><br><br>
        <label>Bairro:</label>
        <input type="text" name="bairro" value="<?php echo $instrutor['BAIRRO']; ?>"><br><br>
        <label>Cidade:</label>
        <input type="text" name="cidade" value="<?php echo $instrutor['CIDADE']; ?>"><br><br>
        <label>Estado:</label>
        <input type="text" name="estado" value="<?php echo $instrutor['ESTADO']; ?>"><br><br>
        <label>Email:</label>
        <input type="text" name="email" value="<?php echo $instrutor['EMAIL']; ?>"><br><br>
        <label>Senha:</label>
        <input type="text" name="senha" value="<?php echo $instrutor['SENHA']; ?>"><br><br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>