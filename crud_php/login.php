<?php
session_start();
include "config.php";

$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $sql = "SELECT * FROM usuarios WHERE email=?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $res = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($res);

    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];
        header("Location: dashboard.php");
        exit;
    } else {
        $erro = "Email ou senha inválidos";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="container">
        <button id="themeBtn" onclick="toggleTheme()">🌙</button>

        <h2>Login</h2>

        <p class="erro"><?= $erro ?></p>

        <input type="text" style="display:none">
        <input type="password" style="display:none">

        <form method="post" autocomplete="new-password">
            <input type="email" name="email" id="email" placeholder="Digite seu email" autocomplete="off" autofocus
                onkeydown="if(event.key==='Enter'){event.preventDefault();document.getElementById('senha').focus();}">
            <div class="senha-box">
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha" autocomplete="new-password">
                <span id="eye" onclick="toggleSenha()">🙈</span>
            </div>

            <button>Entrar</button>
            <p class="link">
                Não tem conta? <a href="criar.php">Cadastre-se</a>
            </p>

        </form>

    </div>
</body>

</html>