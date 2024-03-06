<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID do usuário não fornecido.";
    exit;
}

$idUsuario = $_GET['id'];

require('conectar.php');

try {
    $consulta = "SELECT * FROM $db.$tb WHERE id_cliente = :id";
    $resultado = $conx->prepare($consulta);
    $resultado->bindParam(':id', $idUsuario);
    $resultado->execute();

    if ($resultado->rowCount() == 0) {
        echo "Usuário não encontrado.";
        exit;
    }

    $usuario = $resultado->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erro ao recuperar dados do usuário.";
    exit;
}

$conx = null;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuário</title>
    <link rel="stylesheet" href="./styleAlterar.css" />
</head>

<body>

    <h2>Alterar Usuário</h2>

    <form method="post" action="processar_alteracao.php">
        <input type="hidden" name="id" value="<?php echo $usuario['id_cliente']; ?>">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $usuario['nome']; ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>

        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" value="<?php echo $usuario['telefone']; ?>" required>
        <p id="erro-telefone" class="erro-mensagem"></p>

        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" value="<?php echo $usuario['cep']; ?>" required>

        <button type="button" onclick="validarEEnviarAlteracao()">Salvar Alterações</button>
    </form>

    <p><a id="volta" href="listar.php">Voltar para a lista de usuários</a></p>
    <link rel="stylesheet" href="./styleForm.css" />
    <style>
        #volta{
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }
    </style> 
    <script src="./script.js"></script>
</body>

</html>
