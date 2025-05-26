<?php

class Conexao {
    public static function conectar() {
        $host = "localhost";
        $port = "5432";
        $dbname = "filmesdb";
        $user = "postgres";
        $password = "admin";

        try {
            $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
}
?>
