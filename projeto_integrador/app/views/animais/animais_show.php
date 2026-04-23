<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Projeto Integrador • Dados do Animal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<?php include_once __DIR__ . "\..\header\header.php"; ?>

<body>

    <div class="container py-5">

        <?php if (isset($animal)): ?>
            <!-- TÍTULO + VOLTAR -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Detalhes do animal</h2>
                <a href="<?= URL_BASE ?>/animais" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar para Lista
                </a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="row g-4">
                        <!-- INFO -->
                        <div class="col-md-8">
                            <div class="mb-3">
                                <h3 class="mb-0 text-primary"><?= $animal['nome'] ?></h3>
                            </div>

                            <hr class="my-4">

                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <small class="text-muted d-block uppercase text-xs">Idade</small>
                                    <span class="fw-bold"><?= ($animal['idade'] > 1) ? $animal['idade'] . ' anos' : $animal['idade'] . ' ano' ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i> Animal não encontrado.
                <div class="mt-3">
                    <a href="<?= URL_BASE ?>/animais" class="btn btn-warning">Voltar para Lista</a>
                </div>
            </div>
        <?php endif; ?>

    </div>
    <?php include_once __DIR__ . "/../footer/footer.php"; ?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>