<?php

$host = "db001";
$user = "root";
$password = "123456";
$database = "cadastro";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];

$sql = "INSERT INTO pessoas(nome,email,telefone)
        VALUES('$nome','$email','$telefone')";

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultado do Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<?php

if ($conn->query($sql) === TRUE) {

    echo "<h2>Cadastro realizado com sucesso!</h2>";

} else {

    echo "<h2>Erro ao cadastrar!</h2>";
    echo "<p>" . $conn->error . "</p>";

}

?>

<br>

<a href="index.html">
    Voltar
</a>

</div>

</body>
</html>