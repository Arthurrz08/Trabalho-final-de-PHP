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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="bg-dark">
    <div class="container py-4">
        <h1 class="text-center mb-4">🎬 Projeto Filmes</h1>

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
                            <select name="genero" class="form-control" placeholder="Selecione o gênero" required>
                                <option value="">Selecione o gênero</option>
                                <option value="Ação">Ação</option>
                                <option value="Comédia">Comédia</option>
                                <option value="Drama">Drama</option>
                                <option value="Terror">Terror</option>
                                <option value="Romance">Romance</option>
                                <option value="Animação">Animação</option>
                                <option value="Ficção Científica">Ficção Científica</option>
                                <option value="Suspense">Suspense</option>
                            </select>
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
            <select id="filtroGenero" class="form-control">
                <option value="">Filtrar por gênero...</option>
                <option value="acao">Ação</option>
                <option value="comedia">Comédia</option>
                <option value="drama">Drama</option>
                <option value="terror">Terror</option>
                <option value="romance">Romance</option>
                <option value="animacao">Animação</option>
                <option value="ficcao científica">Ficção Científica</option>
                <option value="suspense">Suspense</option>
            </select>
        </div>

        <div class="alert alert-info text-center">
            ⭐ Média das notas: <strong><?= $media ?></strong>
        </div>

        <?php foreach ($filmes as $filme): ?>
            <div class="card mb-2 filme" data-genero="<?= strtolower($filme->genero) ?>">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5><?= htmlspecialchars($filme->nome) ?> (<?= $filme->ano ?>)</h5>
                        <p class="mb-0"><?= htmlspecialchars($filme->genero) ?> - Nota: <?= $filme->nota ?></p>
                    </div>
                    <div>
                        <a href="editar.php?id=<?= $filme->id ?>" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <button class="btn btn-danger btn-sm" onclick="confirmarExclusao(<?= $filme->id ?>)">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        </div>
        <div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="modalExcluirLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-dark">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="modalExcluirLabel">Confirmar Exclusão</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir este filme?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <a href="#" id="btnExcluirConfirmado" class="btn btn-danger">Excluir</a>
                    </div>
                </div>
            </div>
        </div>
        
    <script>
        function confirmarExclusao(id) {
            const btn = document.getElementById('btnExcluirConfirmado');
            btn.href = 'excluir.php?id=' + id;
            const modal = new bootstrap.Modal(document.getElementById('modalExcluir'));
            modal.show();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
