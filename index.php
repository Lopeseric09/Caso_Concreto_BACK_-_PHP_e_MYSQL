<?php
include_once 'Database.php';
include_once 'Cliente.php';

$database = new Database();
$db = $database->getConnection();
$cliente = new Cliente($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    if ($cliente->create($nome, $email, $telefone)) {
        echo "Cliente inserido com sucesso!";
    } else {
        echo "Erro ao inserir cliente.";
    }
}

$clientes = $cliente->read();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Clientes</title>
</head>
<body>
    <h1>Cadastro de Clientes</h1>

    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br><br>
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required><br><br>
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone" required><br><br>
        <button type="submit">Cadastrar</button>
    </form>

    <h2>Clientes Cadastrados</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $clientes->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['telefone']; ?></td>
            <td>
                <a href="delete_cliente.php?id=<?php echo $row['id']; ?>">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
