<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Projeto Integrador • Lista de Usuários</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<?php include_once __DIR__ . "\..\header\header.php"; ?>

<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Lista de Usuários</h2>
            <a href="<?= URL_BASE ?>/usuarios/cadastrar" class="btn btn-primary">
                <i class="bi bi-person-plus"></i> Novo Usuário
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="px-4 py-3">ID</th>
                                <th class="px-4 py-3">Nome de Usuário</th>
                                <th class="px-4 py-3">E-mail</th>
                                <th class="px-4 py-3">Perfil</th>
                                <?php if (isset($_SESSION['usuario_logado'])): ?>
                                    <th class="px-4 py-3 text-end">Ações</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $u): ?>
                                <tr>
                                    <td class="px-4 py-3 align-middle"><?= $u['id'] ?></td>
                                    <td class="px-4 py-3 align-middle"><?= $u['nomeUsuario'] ?></td>
                                    <td class="px-4 py-3 align-middle"><?= $u['email'] ?></td>
                                    <td class="px-4 py-3 align-middle">
                                        <span class="badge bg-secondary"><?= $u['perfil'] ?></span>
                                    </td>
                                    <?php if (isset($_SESSION['usuario_logado'])): ?>
                                        <td class="px-4 py-3 align-middle text-end">
                                            <a href="<?= URL_BASE ?>/usuarios/editar?id=<?= $u['id'] ?>" class="btn btn-sm btn-outline-warning">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <?php if ($_SESSION['usuario_logado']->getPerfil() === 'admin'): ?>
                                                <a href="<?= URL_BASE ?>/usuarios/excluir?id=<?= $u['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Deseja excluir este usuário?')">
                                                    <i class="bi bi-trash"></i> Excluir
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <a href="<?= URL_BASE ?>/animais" class="btn btn-primary">Ver Animais</a>
        </div>
    </div>
    <?php include_once __DIR__ . "/../footer/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>