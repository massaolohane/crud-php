<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

include "config.php";

$id = $_GET['id'];

$stmt = mysqli_prepare($conexao, "DELETE FROM usuarios WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

header("Location: index.php");
exit;
