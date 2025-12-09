<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "../config/conexao.php";

    session_start();

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
            $_SESSION['nome_usuario'] = $transformado['nome_usuario'];
            $_SESSION['genero_usuario'] = $transformado['genero_usuario'];
            $_SESSION['permissao_usuario'] = $transformado['permissao_usuario'];
            $_SESSION['sucesso'] = "Sucesso!";
            if (isset($_SESSION['erro'])) {
                unset($_SESSION['erro']);
            }
            header("Location: ../../index.php");
        } else {
            $_SESSION['erro'] = "Senha Incorreta!";
            header("Location: ../../index.php");
        }
    } else {
        $_SESSION['erro'] = "Usuário Não Encontrado!";
        header("Location: ../../index.php");
    }
}
