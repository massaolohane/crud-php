<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="container">
        <button id="themeBtn" onclick="toggleTheme()">🌙</button>

        <h2>Bem-vinda, <?= $_SESSION['nome'] ?></h2>

        <a href="index.php">Gerenciar Usuários</a><br><br>
        <a href="logout.php">Sair</a>
        <script src="js/script.js"></script>

    </div>
</body>

</html>