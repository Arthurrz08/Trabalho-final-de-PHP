<?php
require_once 'classes/FilmeRepository.php';

$repo = new FilmeRepository();
$filmes = $repo->listarTodos();
$media = $repo->calcularMediaNotas();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Filmes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="bg-light">

    <div class="container py-4">
        <h1 class="text-center mb-4">🎬 Projeto Filmes</h1>

        <div class="alert alert-info text-center">
            ⭐ Média das notas: <strong><?= $media ?></strong>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <form action="inserir.php" method="POST">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="ano" class="form-control" placeholder="Ano" required>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="genero" class="form-control" placeholder="Gênero" required>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="nota" class="form-control" placeholder="Nota (1-5)" min="1" max="5" required>
                        </div>
                        <div class="col-md-1 d-grid">
                            <button class="btn btn-primary" type="submit">+</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="mb-3">
            <input type="text" id="filtroGenero" class="form-control" placeholder="Filtrar por gênero...">
        </div>

        <?php foreach ($filmes as $filme): ?>
            <div class="card mb-2 filme" data-genero="<?= strtolower($filme->genero) ?>">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5><?= htmlspecialchars($filme->nome) ?> (<?= $filme->ano ?>)</h5>
                        <p class="mb-0"><?= htmlspecialchars($filme->genero) ?> - Nota: <?= $filme->nota ?></p>
                    </div>
                    <div>
                        <a href="editar.php?id=<?= $filme->id ?>" class="btn btn-warning btn-sm">✏️</a>
                        <a href="excluir.php?id=<?= $filme->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir este filme?')">🗑️</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

    <script src="js/script.js"></script>
</body>
</html>
