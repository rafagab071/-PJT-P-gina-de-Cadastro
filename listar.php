<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["acao"]) && isset($_POST["id"])) {
        if ($_POST["acao"] == "excluir") {
            $idUsuario = $_POST["id"];

            require('conectar.php');

            try {
                $excluir = "DELETE FROM $db.$tb WHERE id_cliente = :id";
                $res = $conx->prepare($excluir);
                $res->bindParam(':id', $idUsuario);
                $res->execute();
            } catch (PDOException $e) {
                echo "Erro ao excluir usuário.";
            }

            $conx = null;
        }
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
	<link rel="stylesheet" href="./styleHome.css" />
</head>

<body tabindex="0">
    <nav>
    </nav>
	
<?php
	require('conectar.php');

	try {
		$sel = "SELECT nome, email, telefone, cep, id_cliente FROM $db.$tb ORDER BY id_cliente ASC";

		$result = $conx->query($sel);

		echo "<h2>Lista de Usuários</h2>";

		if ($result->rowCount() > 0) {
			echo "<table>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Nome</th>";
			echo "<th>Email</th>";
			echo "<th>Telefone</th>";
			echo "<th>CEP</th>";
			echo "<th>Ações</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";

			while ($linha = $result->fetch(PDO::FETCH_ASSOC)) {
				echo "<tr>";
				echo "<td>" . $linha['nome'] . "</td>";
				echo "<td>" . $linha['email'] . "</td>";
				echo "<td>" . $linha['telefone'] . "</td>";
				echo "<td>" . $linha['cep'] . "</td>";
				
				echo "<td>";
				echo "<button class='btn-alterar' onclick=\"location.href='pagina_alterar.php?id=" . $linha['id_cliente'] . "'\">Alterar</button>";
				echo "<button class='btn-excluir' onclick=\"excluirUsuario(" . $linha['id_cliente'] . ", '" . $linha['nome'] . "')\">Excluir</button>";
				echo "</td>";

				echo "</tr>";
			}

			echo "</tbody>";
			echo "</table>";
    } 	else {
        echo "<p>Nenhum usuário encontrado.</p>";
    }
} catch (PDOException $e) {
    echo "<div>Impressão não realizada...</div>";
}
	echo '<p><a href="formulario.php">Voltar</a></button>';

?>
	
</body>

</html>
<script>
	function excluirUsuario(idUsuario, nomeUsuario) {
		if (confirm("Deseja realmente excluir o usuário '" + nomeUsuario + "'?")) {
			var xhr = new XMLHttpRequest();

			xhr.open("POST", "", true);
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

			xhr.onreadystatechange = function () {
				if (xhr.readyState == 4 && xhr.status == 200) {
					var resposta = JSON.parse(xhr.responseText);
					if (resposta.status === 'success') {
						var linhaUsuario = document.getElementById("linha-" + idUsuario);
						if (linhaUsuario) {
							linhaUsuario.remove();
						}
					}
				}
			};

			xhr.send("acao=excluir&id=" + idUsuario);
		}
		setTimeout(function () {
                        location.reload(true);
                    }, 500);
	}
</script>