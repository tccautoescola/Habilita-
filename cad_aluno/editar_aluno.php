<?php
// Inclua o arquivo de conexão
require_once '../conexao.php';

// Verifique se o parâmetro "cpf" foi fornecido na URL
if (isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];

    // Consulta SQL para selecionar o aluno pelo CPF
    $sql = "SELECT * FROM TAB_ALUNO WHERE CPF = '$cpf'";

    // Execute a consulta SQLeditar_aluno.php

    // Execute a consulta SQL
    $resultado = mysqli_query($conn, $sql);

    // Verifique se o aluno foi encontrado
    if (mysqli_num_rows($resultado) == 1) {
        $aluno = mysqli_fetch_assoc($resultado);
    } else {
        echo "Aluno não encontrado.";
        exit;
    }
}
    ?>

<html>
<head>
    <title>Editar Aluno</title>
</head>
<body>
    <h2>Editar Aluno</h2>
    <form method="POST" action="editaluno.php">
        <input type="hidden" name="cpf" value="<?php echo $aluno['CPF']; ?>">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $aluno['NOME']; ?>"><br><br>
        <label>Endereço:</label>
        <input type="text" name="endereco" value="<?php echo $aluno['ENDERECO']; ?>"><br><br>
        <label>Número:</label>
        <input type="text" name="numero" value="<?php echo $aluno['NUMERO']; ?>"><br><br>
        <label>Bairro:</label>
        <input type="text" name="bairro" value="<?php echo $aluno['BAIRRO']; ?>"><br><br>
        <label>Cidade:</label>
        <input type="text" name="cidade" value="<?php echo $aluno['CIDADE']; ?>"><br><br>
        <label>Estado:</label>
        <input type="text" name="estado" value="<?php echo $aluno['ESTADO']; ?>"><br><br>
        <label>Email:</label>
        <input type="text" name="email" value="<?php echo $aluno['EMAIL']; ?>"><br><br>
        <label>Senha:</label>
        <input type="text" name="senha" value="<?php echo $aluno['SENHA']; ?>"><br><br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
