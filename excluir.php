<?php
require_once 'classes/FilmeRepository.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $repo = new FilmeRepository();
    $repo->excluir($id);
}

header('Location: index.php');
exit;
?>
