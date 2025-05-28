<?php 
helper('url'); 
$isHomePage = true;
include APPPATH . 'Views/templates/header.php'; 
?>

<div class="text-center" style="margin-top: 100px;">
    <h2 class="fw-bold" style="color: #455c34; font-size: 3.2rem;">
        Do que sua planta precisa?
    </h2>
    <p class="lead text-secondary">Use os botões abaixo para acessar os módulos:</p>

    <div class="d-flex justify-content-center flex-wrap gap-3 mb-4">
        <a href="<?= base_url('plantas') ?>" class="btn px-4 py-2" style="background-color: #76a458; color: white;">
            <i class="bi bi-flower1"></i> Plantas
        </a>
        <a href="<?= base_url('tipos') ?>" class="btn px-4 py-2" style="background-color: #3678c8; color: white;">
            <i class="bi bi-tags"></i> Tipos
        </a>
        <a href="<?= base_url('favoritos') ?>" class="btn px-4 py-2" style="background-color: #f0cd62; color: #5f5f00;">
            <i class="bi bi-star-fill"></i> Favoritos
        </a>
    </div>
</div>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
