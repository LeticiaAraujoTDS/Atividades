<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Projeto Integrador • Editar Animal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<?php include_once __DIR__ . "\..\header\header.php"; ?>

<body class="bg-light">

    <div class="container">
        <div class="d-flex mt-5">
            <main class="flex-fill content">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Editar Animal</h2>
                    <a href="<?= URL_BASE ?>/animais" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Voltar
                    </a>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body p-4">

                        <form action="<?= URL_BASE ?>/animais/atualizar" method="post">

                            <input type="hidden" name="id" value="<?= $animal['id'] ?>">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="nome" class="form-label">Nome do Animal</label>
                                    <input type="text" class="form-control" id="nome" name="nome"
                                        value="<?= $animal['nome'] ?>" required>
                                    <?php if (isset($erros['nome'])): ?>
                                        <div class="text-danger small">
                                            <?= $erros['nome'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6">
                                    <label for="idade" class="form-label">Idade</label>
                                    <input type="number" class="form-control" id="idade" name="idade"
                                        value="<?= $animal['idade'] ?>" required>
                                    <?php if (isset($erros['idade'])): ?>
                                        <div class="text-danger small">
                                            <?= $erros['idade'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <a href="<?= URL_BASE ?>/animais" class="btn btn-light border">Cancelar</a>
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bi bi-save"></i> Atualizar
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </main>
        </div>
    </div>
    <?php include_once __DIR__ . "/../footer/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>