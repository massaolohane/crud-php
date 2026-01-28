<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

include "config.php";

$id = $_GET['id'];

$stmt = mysqli_prepare($conexao, "SELECT * FROM usuarios WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($res);

if ($_POST) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $up = mysqli_prepare($conexao, "UPDATE usuarios SET nome=?, email=? WHERE id=?");
    mysqli_stmt_bind_param($up, "ssi", $nome, $email, $id);
    mysqli_stmt_execute($up);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <button id="themeBtn" onclick="toggleTheme()">🌙</button>

        <h2>Editar Usuário</h2>

        <form method="post">
            <input name="nome" value="<?= $user['nome'] ?>">
            <input name="email" value="<?= $user['email'] ?>">
            <button>Salvar</button>
        </form>

        <a href="index.php">Voltar</a>
        <script src="js/script.js"></script>
    </div>
</body>

</html>