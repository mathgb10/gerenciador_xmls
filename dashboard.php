<?php
session_start();

if (!isset($_SESSION['nome_usuario'])) {
    header("Location: index.php");
    exit();
}

$nome_usuario  = $_SESSION['nome_usuario'];
$genero_usuario = $_SESSION['genero_usuario'];

?>

<!DOCTYPE html>
<html lang="pt-br"  data-tema="escuro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DownSide</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <?php include'php/componentes/nav.php'; ?>
    <main class="container-principal">
        <section class="sec-header">
            <div class="sec-header-avatar">
                <p><?php echo strtoupper(substr($nome_usuario, 0, 1)) ?></p>
            </div>
            <header class="sec-header-header">
                <h2>Olá, <?php echo htmlspecialchars($nome_usuario) ?>!</h2>
                <h4>Sejá <?php
                            if ($genero_usuario == "M") {
                                echo "Bem-Vindo!";
                            } else {
                                echo "Bem-Vinda!";
                            }
                            ?> A nossa plataforma.</h4>
            </header>
        </section>
        <section class="sec-dashboard">
            <div class="caixa">
                <div class="caixa-header">
                    <p>Qntd Planilhas</p>
                            
                </div>
                <div class="caixa-num">
                    2
                </div>
            </div>
            <div class="caixa">
                <div class="caixa-header">
                    <p>Relatórios Gerados</p>

                </div>
                <div class="caixa-num">
                    3
                </div>
            </div>
            <div class="caixa">
                <div class="caixa-header">
                    <p>Arquivos Excluidos</p>
                    
                </div>
                <div class="caixa-num">
                    1
                </div>
            </div>
        </section>
    </main>
</body>
</html>