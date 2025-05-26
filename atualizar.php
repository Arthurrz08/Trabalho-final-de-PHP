<?php
require_once 'classes/Filme.php';
require_once 'classes/FilmeRepository.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $ano = $_POST['ano'];
    $genero = $_POST['genero'];
    $nota = $_POST['nota'];

    $filme = new Filme($id, $nome, $ano, $genero, $nota);

    $repo = new FilmeRepository();
    $repo->atualizar($filme);

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
