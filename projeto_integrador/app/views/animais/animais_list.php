<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Projeto Integrador • Lista de Animais</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<?php include_once __DIR__ . "\..\header\header.php"; ?>

<body>

    <div class="container py-5">

        <!-- TÍTULO + NOVO -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Lista de Animais</h2>
            <a href="<?= URL_BASE ?>/animais/cadastrar" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Novo Animal
            </a>
        </div>

        <!-- CARD COM TABELA -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="px-4 py-3">Nome</th>
                                <th class="px-4 py-3">Idade</th>
                                <th class="px-4 py-3 text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lista as $animal): ?>
                                <tr>
                                    <td class="px-4 py-3 align-middle"><?= $animal['nome'] ?></td>
                                    <td class="px-4 py-3 align-middle"><?= ($animal['idade'] > 1) ? $animal['idade'] . ' anos' : $animal['idade'] . ' ano' ?></td>
                                    <td class="px-4 py-3 align-middle text-end">
                                        <a href="<?= URL_BASE ?>/animais/animal?id=<?= $animal['id'] ?>" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                        <?php if (isset($_SESSION['usuario_logado'])): ?>
                                            <a href="<?= URL_BASE ?>/animais/editar?id=<?= $animal['id'] ?>" class="btn btn-sm btn-outline-warning">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <?php if ($_SESSION['usuario_logado']->getPerfil() === 'admin'): ?>
                                                <a href="<?= URL_BASE ?>/animais/excluir?id=<?= $animal['id'] ?>"
                                                    class="btn btn-outline-danger btn-sm"
                                                    onclick="return confirm('Tem certeza que deseja excluir este animal?')">
                                                    <i class="bi bi-trash"></i> Excluir Animal
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <a href="<?= URL_BASE ?>/usuarios" class="btn btn-primary">Ver Usuarios</a>
        </div>

    </div>
    <?php include_once __DIR__ . "/../footer/footer.php"; ?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>