<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="./styleForm.css" />
</head>

<body tabindex="0">
    <nav>
    </nav>

    <form id="formCadastro" action="incluir.php" method="POST">
        <h2>Cadastro de Usuários</h2>
        <label for="nome">*Nome Completo:</label>
        <input type="text" id="nome" name="nome" required autofocus>
        <p id="erro-nome" class="erro-mensagem"></p>

        <label for="email">*Email:</label>
        <input type="email" id="email" name="email" required>
        <p id="erro-email" class="erro-mensagem"></p>

        <label for="cpf">*CPF:</label>
        <input type="text" id="cpf" name="cpf" required>
        <p id="erro-cpf" class="erro-mensagem"></p>

        <label for="cep">*CEP: (Somente Números)</label>
        <input type="text" id="cep" name="cep" required>
        <p id="erro-cep" class="erro-mensagem"></p>

        <label for="telefone">*Telefone: (Somente Números, formato: 119...)</label>
        <input type="tel" id="telefone" name="telefone" required>
        <p id="erro-telefone" class="erro-mensagem"></p>

        <label for="senha">*Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <p id="erro-senha" class="erro-mensagem"></p>

        <label for="confirmarSenha">*Confirme a Senha:</label>
        <input type="password" id="confirmarSenha" name="confirmarSenha" required>
        <p id="erro-confirmarSenha" class="erro-mensagem"></p>

        <button type="button" onclick="validarEEnviar()">Cadastrar Usuário</button>
        <button type="button" onclick="javascript:window.location='listar.php'">Listar Usuários</button>
    </form>

    <?php
    session_start();

    if (isset($_SESSION['mensagem'])) {
        echo "<div>{$_SESSION['mensagem']}</div>";

        unset($_SESSION['mensagem']);
    }
    ?>

    <script src="./script.js"></script>
</body>

</html>
