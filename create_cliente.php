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
?>
