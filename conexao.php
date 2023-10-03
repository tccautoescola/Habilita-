conexao.php
<?php
$servername = "127.0.0.1";
$database = "autoescola";
$username = "root";
$password = "123456";
# Cria a conexão
$conn = mysqli_connect($servername, $username, $password, $database);
# Verifica a conexão
if ($conn->error) {
    die("A conexão falhou: " . mysqli_connect_error());
}

?>	