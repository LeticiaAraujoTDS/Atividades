<body>
    <header class=" bg-primary p-4 shadow-sm">
        <div class="container mx-auto">
            <div class="row align-items-start">
                <?php if (isset($_SESSION['usuario_logado'])): ?>
                    <div class="row mt-2 pt-2 fs-3">
                        <div class="col">
                            <span class="badge rounded-pill bg-white text-dark border">
                                <i class="bi bi-person-circle"></i> Sr. <?=  ucfirst($_SESSION['usuario_logado']->getPerfil()) ?>
                            </span>
                        </div>
                    </div>
                <?php else: ?>
                <div class="row mt-2 pt-2 fs-3">
                        <div class="col">
                            <span class="badge rounded-pill bg-white text-dark border">
                                <i class="bi bi-person-circle"></i> Sr. Não identificado
                            </span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
</header>