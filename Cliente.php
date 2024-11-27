<?php
class Cliente {
    private $conn;
    private $table_name = "clientes";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para criar um novo cliente
    public function create($nome, $email, $telefone) {
        $query = "INSERT INTO " . $this->table_name . " (nome, email, telefone) VALUES (:nome, :email, :telefone)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":telefone", $telefone);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Método para listar todos os clientes
    public function read() {
        $query = "SELECT id, nome, email, telefone FROM " . $this->table_name . " ORDER BY nome ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Método para excluir um cliente por ID
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
