<?php 
helper('url'); 
include APPPATH . 'Views/templates/header.php'; 
?>

<div class="text-center mt-5">
    <h2 class="text-success fw-bold">Do que sua planta precisa?</h2>
    <p class="lead text-secondary">Use os botões abaixo para acessar os módulos:</p>

    <div class="d-flex justify-content-center flex-wrap gap-3 mb-4">
        <a href="<?= base_url('plantas') ?>" class="btn btn-success px-4 py-2">
            <i class="bi bi-flower1"></i> Plantas
        </a>
        <a href="<?= base_url('tipos') ?>" class="btn btn-primary px-4 py-2">
            <i class="bi bi-tags"></i> Tipos
        </a>
        <a href="<?= base_url('favoritos') ?>" class="btn btn-warning px-4 py-2">
            <i class="bi bi-star-fill"></i> Favoritos
        </a>
    </div>
</div>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
