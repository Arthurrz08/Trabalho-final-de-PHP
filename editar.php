<?php
require_once 'classes/FilmeRepository.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$repo = new FilmeRepository();
$filme = $repo->buscarPorId($id);

if (!$filme) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Filme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

<div class="container py-4">
    <h1 class="text-center mb-4">✏️ Editar Filme</h1>

    <div class="card">
        <div class="card-body">
            <form action="atualizar.php" method="POST">
                <input type="hidden" name="id" value="<?= $filme->id ?>">

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($filme->nome) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ano</label>
                    <input type="number" name="ano" class="form-control" value="<?= $filme->ano ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gênero</label>
                    <input type="text" name="genero" class="form-control" value="<?= htmlspecialchars($filme->genero) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nota (1 a 5)</label>
                    <input type="number" name="nota" class="form-control" min="1" max="5" value="<?= $filme->nota ?>" required>
                </div>
                <div class="d-grid">
                    <button class="btn btn-success" type="submit">Atualizar Filme</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
