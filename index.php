<!DOCTYPE html>
<html lang="pt-br" data-tema="escuro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DownSide</title>

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <main class="container-login">
        <form action="" method="POST" class="caixa-form">
            <header>
                <h1>Login</h1>
            </header>
            <div class="caixas">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    require_once "php/conexao.php";

                    $nome = $_POST['nome_usuario'];
                    $senha = $_POST['senha_usuario'];

                    $select = $con->prepare("SELECT * FROM usuarios WHERE nome_usuario = ?");
                    $select->bind_param('s', $nome);
                    $select->execute();
                    $resultado = $select->get_result();

                    if (mysqli_num_rows($resultado) == 1) {
                        $transformado = $resultado->fetch_assoc();
                        $nome_usuario = $transformado['nome_usuario'];
                        $senha_usuario_db = $transformado['senha_usuario'];

                        if (password_verify($senha, $senha_usuario_db)) {

                            session_start();
                            $_SESSION['nome_usuario'] = $transformado['nome_usuario'];
                            $_SESSION['genero_usuario'] = $transformado['genero_usuario'];
                            $_SESSION['permissao_usuario'] = $transformado['permissao_usuario'];

                            echo "<div class='sucesso'><p>Sucesso!</p></div>";
                            echo "<script>setTimeout( ()=> { window.location.href='dashboard.php'; }, 300)</script>";
                        } else {
                            echo "<div class='erro'><p>Senha Incorreta!</p></div>";
                        }
                    } else {
                        echo "<div class='erro'><p>Usuário Não Encontrado!</p></div>";
                    }
                }
                ?>
                <div class="caixa-input">
                    <i class="bi bi-person-circle"></i>
                    <input type="text" name="nome_usuario" placeholder="Nome de Usuário">
                    </fieldset>
                </div>
                <div class="caixa-input">
                    <i class="bi bi-lock"></i>
                    <input type="password" name="senha_usuario" placeholder="******" minlength="6">
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
        <div class="modal-base" id="modal-registro">
            <div class="modal-conteudo">
                <header class="modal-header">
                    <h2>Registrar-se</h2>
                    <button class="btn-fechar" onclick="document.getElementById('modal-registro').style.display='none'">&times;</button>
                </header>

                <div class="modal-caixas">
                    <div class="caixa-input">
                        <i class="bi bi-person"></i>
                        <input type="text" placeholder="Nome de Usuário">
                    </div>

                    <div class="caixa-input">
                        <i class="bi bi-envelope"></i>
                        <input type="email" placeholder="E-mail">
                    </div>

                    <div class="caixa-input">
                        <i class="bi bi-lock"></i>
                        <input type="password" placeholder="Senha">
                    </div>

                    <button class="modal-btn">Cadastrar</button>
                </div>
            </div>
        </div>

        <!-- MODAL ESQUECI SENHA -->
        <div class="modal-base" id="modal-senha">
            <div class="modal-conteudo">
                <header class="modal-header">
                    <h2>Recuperar Senha</h2>
                    <button class="btn-fechar" onclick="document.getElementById('modal-senha').style.display='none'">&times;</button>
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