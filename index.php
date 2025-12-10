<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br" data-tema="escuro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vioxel</title>

    <link rel="shortcut icon" href="assets/imgs/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <main class="container-login">
        <form action="php/actions/login.php" method="POST" class="caixa-form">
            <header>
                <h1>Login</h1>
            </header>
            <div class="caixas">
                <?php
                if (isset($_SESSION['erro'])) {
                    echo "<div class='erro'><p>{$_SESSION['erro']}</p></div>";
                    unset($_SESSION['erro']);
                }

                if (isset($_SESSION['sucesso'])) {
                    echo "<div class='sucesso'><p>{$_SESSION['sucesso']}</p></div>";
                    unset($_SESSION['sucesso']);
                    echo "<script>setTimeout(()=>{ window.location.href='dashboard.php'; }, 200);</script>";
                }
                ?>
                <div class="caixa-input">
                    <i class="bi bi-person-circle"></i>
                    <input type="text" name="nome_usuario" placeholder="Nome de Usuário" required>
                    </fieldset>
                </div>
                <div class="caixa-input">
                    <i class="bi bi-lock"></i>
                    <input type="password" name="senha_usuario" placeholder="******" minlength="6" required>
                    </fieldset>
                </div>
            </div>
            <div class="caixa-btn">
                <button>Entrar<i class="bi bi-box-arrow-in-right"></i></button>
                <a href="#" onclick="showReg()">Registrar-se</a>
                <a href="#" onclick="showEsq()">Esqueci minha senha</a>
            </div>
        </form>

        <!-- MODAL REGISTRO -->
        <div class="modal-base" id="modal-registro" <?php if (isset($_SESSION['erro_reg']) || isset($_SESSION['sucesso_reg'])) echo 'style="display:flex;"'; ?>>
            <div class="modal-conteudo">
                <form action="php/actions/register.php" method="POST">
                    <header class="modal-header">
                        <h2>Registrar-se</h2>
                        <button class="btn-fechar" type="button" onclick="document.getElementById('modal-registro').style.display='none'">&times;</button>
                    </header>

                    <div class="modal-caixas">
                        <?php
                        if (isset($_SESSION['erro_reg'])) {
                            echo "<div class='erro'><p>{$_SESSION['erro_reg']}</p></div>";
                            unset($_SESSION['erro_reg']);
                        }

                        if (isset($_SESSION['sucesso_reg'])) {
                            echo "<div class='sucesso'><p>{$_SESSION['sucesso_reg']}</p></div>";
                            unset($_SESSION['sucesso_reg']);
                        }
                        ?>
                        <div class="caixa-input">
                            <i class="bi bi-person"></i>
                            <input type="text" placeholder="Nome de Usuário" name="nome_reg" required>
                        </div>

                        <div class="caixa-input">
                            <i class="bi bi-envelope"></i>
                            <input type="email" placeholder="E-mail" name="email_reg" required>
                        </div>

                        <div class="caixa-input">
                            <i class="bi bi-lock"></i>
                            <input type="password" placeholder="******" name="senha_reg" minlength=6 required>
                        </div>
                        <div class="caixa-input">
                            <i class="bi bi-gender-ambiguous"></i>
                            <input type="radio" name="genero_reg" value="M"><span><i class="bi bi-gender-male"></i></span>
                            <input type="radio" name="genero_reg" value="F"><span><i class="bi bi-gender-female"></i></span>
                        </div>

                        <button class="modal-btn">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- MODAL ESQUECI SENHA -->
        <div class="modal-base" id="modal-senha">
            <div class="modal-conteudo">
                <header class="modal-header">
                    <h2>Recuperar Senha</h2>
                    <button class="btn-fechar" type="button" onclick="document.getElementById('modal-senha').style.display='none'">&times;</button>
                </header>

                <div class="modal-caixas">
                    <div class="caixa-input">
                        <i class="bi bi-envelope"></i>
                        <input type="email" placeholder="Seu e-mail">
                    </div>

                    <button class="modal-btn">Enviar código</button>
                </div>
            </div>
        </div>

    </main>
    <script src="scripts/script.js" defer></script>
</body>

</html>