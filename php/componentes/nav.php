<?php
    $pagina = basename($_SERVER['PHP_SELF']);
?>
<nav class="nav-bar">
    <div class="nav-header">
        DownSide
    </div>
    <div class="nav-items">
        <a href="dashboard.php" class="<?php if($pagina == 'dashboard.php') echo "ativo" ?>"><i class="bi bi-house-door-fill"></i> Home</a>
        <a href="arquivos.php" class="<?php if($pagina == 'arquivos.php') echo "ativo" ?>"><i class="bi bi-file-earmark-fill"></i>Arquivos</a>
        <a href="">Gerar Relátorio</a>
    </div>
    <div class="nav-footer">
        <button onclick="mudarTema()" id="tema"><i class="bi bi-moon-stars-fill"></i></button>
        <button onclick="window.location.href='php/actions/logout.php'" id="sair"><i class="bi bi-box-arrow-left"></i>Sair</button>
    </div>
</nav>