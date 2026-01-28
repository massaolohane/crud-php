<?php

include "config.php";
$erro = "";

if ($_POST) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (!$nome || !$email || !$senha) {
        $erro = "Preencha todos os campos";
    } else {

        $hash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome,email,senha) VALUES (?,?,?)";
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $hash);
        mysqli_stmt_execute($stmt);

        header("Location: index.php");
        exit;
    }
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

        <h2>Novo Usuário</h2>

        <p class="erro"><?= $erro ?></p>

        <form method="post" autocomplete="new-password">
            <input type="text" name="nome" id="nome" placeholder="Digite seu nome" autocomplete="off" autofocus>
            <input type="email" name="email" id="email" placeholder="Digite seu email" autocomplete="off">
            <div class="password-box">
                <div class="senha-box">
                    <input type="password" name="senha" id="senha" placeholder="Crie uma senha" autocomplete="new-password">
                    <span id="eye" onclick="toggleSenha()">🙈</span>
                </div>
            </div>

            <button>Cadastrar</button>
            <p class="link">
                Já tem conta? <a href="login.php">Fazer login</a>
            </p>

        </form>

        <a href="index.php">Voltar</a>
        <script src="js/script.js"></script>
    </div>
</body>

</html>