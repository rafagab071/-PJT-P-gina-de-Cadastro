<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"]) && !empty($_POST["id"])) {
        $idUsuario = $_POST["id"];

        require('conectar.php');

        try {
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
            $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);

            $atualizar = "UPDATE $db.$tb SET nome = :nome, email = :email, telefone = :telefone, cep = :cep WHERE id_cliente = :id";
            $res = $conx->prepare($atualizar);

            $res->bindParam(':nome', $nome);
            $res->bindParam(':email', $email);
            $res->bindParam(':telefone', $telefone);
            $res->bindParam(':cep', $cep);
            $res->bindParam(':id', $idUsuario);

            $res->execute();

            echo "<script>alert('Usuário atualizado com sucesso!'); window.location.href='listar.php';</script>";
        } catch (PDOException $e) {
            echo "Erro ao atualizar usuário.";
        }

        $conx = null;
    }
}
?>
