listar_aluno.php
<?php
require_once '../conexao.php';

$sql = "SELECT * FROM tab_aluno ORDER BY nome";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registros da tabela Aluno</title>
    <link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-... (código de integridade)" crossorigin="anonymous" />
<script>
function confirmDelete() {
    return confirm("Tem certeza que deseja excluir este registro?");
}
</script>
</head>
<body>
    <h1>Alunos</h1>

    <a href="cadastra_aluno.php">Cadastrar Aluno</a>

    <table>
        <tr>
            <th>CPF</th>
            <th>Nome</th>
            <th>Email</th>
            <th></th>
        </tr>
        <?php
        // Verificar se existem registros
        if ($result->num_rows > 0) {
            // Exibir os registros em HTML
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["CPF"] . "</td>";
                echo "<td>" . $row["NOME"] . "</td>";
                echo "<td>" . $row["EMAIL"] . "</td>";
                echo "<td>";
                echo "<a href='editar_aluno.php?cpf=" . $row["CPF"] . "'><i class='fas fa-edit'></i></a>"; // Ícone para editar
                echo "<a href='delete_aluno.php?cpf=" . $row["CPF"] . "' onclick='return confirmDelete()'><i class='fas fa-trash-alt'></i></a>"; // Ícone para excluir
 echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum registro encontrado</td></tr>";
        }
        ?>
    </table>

    <?php
    // Fechar a conexão com o banco de dados
    $conn->close();
    ?>
</body>
</html>