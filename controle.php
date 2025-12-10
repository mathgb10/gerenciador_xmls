<?php
session_start();

if (!isset($_SESSION['nome_usuario'])) {
    header("Location: index.php");
    exit();
}

if ($_SESSION['permissao_usuario'] != 'ADMin') {
    header("Location: index.php");
    exit();
}

$nome_usuario  = $_SESSION['nome_usuario'];
$genero_usuario = $_SESSION['genero_usuario'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vioxel</title>

    <link rel="shortcut icon" href="assets/imgs/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <?php include 'php/componentes/nav.php' ?>
</body>

</html>