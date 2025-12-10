<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "../config/conexao.php";

    session_start();

    $nome = $_POST['nome_reg'];
    $email = $_POST['email_reg'];
    $senha = $_POST['senha_reg'];
    $genero = $_POST['genero_reg'];
    $permissao = "PADRAO";

    $select = $con->prepare('SELECT * FROM usuarios WHERE email_usuario = ?');
    $select->bind_param('s', $email);
    $select->execute();
    $resultado = $select->get_result();

    if (mysqli_num_rows($resultado) == 0) {

        $senha = password_hash($senha, PASSWORD_DEFAULT);

        $insert = $con->prepare('INSERT INTO usuarios(nome_usuario,senha_usuario,email_usuario,genero_usuario,permissao_usuario)VALUES(?,?,?,?,?)');
        $insert->bind_param('sssss', $nome, $senha, $email, $genero,$permissao);
        $insert->execute();

        $_SESSION['sucesso_reg'] = "Cadastrato realizado com sucesso!";
        if (isset($_SESSION['erro_reg'])) {
            unset($_SESSION['erro_reg']);
        }
        header("Location: ../../index.php");
    } else {
        $_SESSION['erro_reg'] = "Já existe um usuário cadastrado com este email!";
        header("Location: ../../index.php");
    }
}
