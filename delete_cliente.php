<?php
include_once 'Database.php';
include_once 'Cliente.php';

$database = new Database();
$db = $database->getConnection();
$cliente = new Cliente($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($cliente->delete($id)) {
        echo "Cliente excluído com sucesso!";
    } else {
        echo "Erro ao excluir cliente.";
    }
}
?>
