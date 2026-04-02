<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Projeto Integrador • Editar Usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="container py-5">
            <div class="d-flex justify-content-center align-items-center mb-4">
                <div class="card-header">
                    <h4 class="mb-0">Editar Usuário</h4>
                </div>
            </div>
            <div class="card shadow-sm col-md-6 mx-auto border">

                <div class="card-body">
                    <form action="<?= URL_BASE ?>/usuarios/atualizar" method="post">
                        <!-- Campo oculto para o ID -->
                        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

                        <div class="mb-3">
                            <label for="nomeUsuario" class="form-label">Nome de Usuário</label>
                            <input type="text" class="form-control" id="nomeUsuario" name="nomeUsuario" value="<?= $usuario['nomeUsuario'] ?>">
                            <?php if (isset($erros['nomeUsuario'])): ?>
                                <div class="text-danger small"><?= $erros['nomeUsuario'] ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $usuario['email'] ?>">

                            <?php if (isset($erros['emailUsado'])): ?>
                                <div class="text-danger small"><?= $erros['emailUsado'] ?></div>

                            <?php elseif (isset($erros['email'])): ?>
                                <div class="text-danger small"><?= $erros['email'] ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="senha" class="form-label">Nova Senha (Deixe em branco para não alterar)</label>
                            <input type="password" class="form-control" id="senha" name="senha">

                        </div>

                        <div class="mb-3">
                            <label for="perfil" class="form-label">Perfil de Acesso</label>
                            <select class="form-select" id="perfil" name="perfil">
                                <option value="user" <?= $usuario['perfil'] === 'user' ? 'selected' : '' ?>>Usuário Padrão</option>
                                <option value="admin" <?= $usuario['perfil'] === 'admin' ? 'selected' : '' ?>>Administrador</option>
                            </select>
                            <?php if (isset($erros['perfil'])): ?>
                                <div class="text-danger small"><?= $erros['perfil'] ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Atualizar Dados</button>
                            <a href="<?= URL_BASE ?>/usuarios" class="btn btn-outline-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>