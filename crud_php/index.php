<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

include "config.php";

$res = mysqli_query($conexao, "SELECT * FROM usuarios");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Usuários</title>
</head>

<body>
    <div class="container">
        <button id="themeBtn" onclick="toggleTheme()">🌙</button>

        <h2>Usuários</h2>

        <a href="criar.php">Novo Usuário</a> |
        <a href="dashboard.php">Dashboard</a> |
        <a href="logout.php">Sair</a>
        <script src="js/script.js"></script>


        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>

            <?php while ($u = mysqli_fetch_assoc($res)) { ?>
                <tr>
                    <td><?= $u['id'] ?></td>
                    <td><?= $u['nome'] ?></td>
                    <td><?= $u['email'] ?></td>
                    <td>
                        <a href="editar.php?id=<?= $u['id'] ?>">Editar</a> |
                        <a href="excluir.php?id=<?= $u['id'] ?>" onclick="return confirm('Excluir usuário?')">Excluir</a>
                    </td>
                </tr>
            <?php } ?>

        </table>

    </div>
</body>

</html>