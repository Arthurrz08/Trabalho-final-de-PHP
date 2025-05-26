<?php

require_once __DIR__ . '/Conexao.php';
require_once __DIR__ . '/Filme.php';

class FilmeRepository {

    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::conectar();
    }

    public function salvar(Filme $filme) {
        $sql = "INSERT INTO filmes (nome, ano, genero, nota) VALUES (:nome, :ano, :genero, :nota)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $filme->nome,
            ':ano' => $filme->ano,
            ':genero' => $filme->genero,
            ':nota' => $filme->nota
        ]);
    }

    public function listarTodos() {
        $sql = "SELECT * FROM filmes ORDER BY id DESC";
        $stmt = $this->pdo->query($sql);
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $filmes = [];
        foreach ($dados as $d) {
            $filmes[] = new Filme($d['id'], $d['nome'], $d['ano'], $d['genero'], $d['nota']);
        }
        return $filmes;
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM filmes WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        $d = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($d) {
            return new Filme($d['id'], $d['nome'], $d['ano'], $d['genero'], $d['nota']);
        }
        return null;
    }

    public function atualizar(Filme $filme) {
        $sql = "UPDATE filmes SET nome = :nome, ano = :ano, genero = :genero, nota = :nota WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $filme->nome,
            ':ano' => $filme->ano,
            ':genero' => $filme->genero,
            ':nota' => $filme->nota,
            ':id' => $filme->id
        ]);
    }

    public function excluir($id) {
        $sql = "DELETE FROM filmes WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    public function calcularMediaNotas() {
        $sql = "SELECT AVG(nota) as media FROM filmes";
        $stmt = $this->pdo->query($sql);
        $d = $stmt->fetch(PDO::FETCH_ASSOC);
        return $d['media'] ? round($d['media'], 2) : 0;
    }
}
?>
