<?php include APPPATH . 'Views/templates/header.php'; ?>

<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body text-center">
            <i class="bi bi-person-circle" style="font-size: 4rem; color: #5f7e49;"></i>
            <h3 class="mt-3 mb-1"><?= esc($usuario['nome'] ?? 'Usuário') ?></h3>
            <p class="text-muted mb-2"><?= esc($usuario['email'] ?? '') ?></p>
            <hr>
            <a href="<?= base_url('logout') ?>" class="btn btn-outline-danger mt-3">
                <i class="bi bi-box-arrow-right"></i> Sair
            </a>
        </div>
    </div>
</div>

<?php include APPPATH . 'Views/templates/footer.php'; ?>