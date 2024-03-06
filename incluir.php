<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST) && !empty($_POST)) {
        extract($_POST);

        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
        $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);
        $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
        $senha = password_hash(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);

        require("conectar.php");

        try {
            $incl = "INSERT INTO $db.$tb (nome, email, cpf, cep, telefone, senha) VALUES (:nome, :email, :cpf, :cep, :telefone, :senha)";
            $res = $conx->prepare($incl);

            $res->bindParam(':nome', $nome);
            $res->bindParam(':email', $email);
            $res->bindParam(':cpf', $cpf);
            $res->bindParam(':cep', $cep);
            $res->bindParam(':telefone', $telefone);
            $res->bindParam(':senha', $senha);

            $res->execute();

            echo "<script>alert('Usuário cadastrado com sucesso!'); window.location.href='formulario.php';</script>";
            $_SESSION['mensagem'] = "Usuário cadastrado com sucesso!";
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = "Erro ao cadastrar usuário. Tente novamente.";
        }

        $conx = null;
    }
}
?>
