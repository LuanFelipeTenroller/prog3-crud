<?php include APPPATH . 'Views/templates/header.php'; ?>

<div>
    <h2>Bem-vindo ao Sistema de Cadastro de Plantas Ornamentais</h2>
    <p>Use o menu ou links abaixo para acessar os módulos:</p>

    <ul>
        <li><a href="<?= base_url('plantas') ?>">Gerenciar Plantas</a></li>
        <li><a href="<?= base_url('tipos') ?>">Gerenciar Tipos</a></li>
        <li><a href="<?= base_url('favoritos') ?>">Ver Favoritos</a></li>
    </ul>
</div>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
