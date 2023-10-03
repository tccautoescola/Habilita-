delete_instrutor.php
 <?php
require_once '../conexao.php';

// Verifica se o parâmetro CPF está presente na URL
if (isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];

    // Prepara a consulta SQL para excluir o instrutor com o CPF fornecido
    $sql = "DELETE FROM tab_instrutor WHERE CPF = '$cpf'";

    if ($conn->query($sql) === TRUE) {
        echo "instrutor excluído com sucesso.";
    } else {
        echo "Erro ao excluir instrutor: " . $conn->error;
    }
} else {
    echo "Parâmetro CPF ausente na URL.";
}

// Fechar a conexão com o banco de dados
$conn->close();
    // Redirecione para a página de exibição do instrutor após a atualização
    header("Location: listar_instrutor.php");
    exit;
?>