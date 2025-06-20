<?php
helper('url'); 
$exibirHeader = false;
include APPPATH . 'Views/templates/header.php'; 
?>

<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
        <h2 class="fw-bold text-center mb-4" style="color: #455c34;">Login</h2>
        <form id="formLogin" action="javascript:void(0);">
            <div class="mb-3">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
            </div>
            <button type="submit" class="btn w-100 mb-2" style="background-color: #5f7e49; color: white;">Entrar</button>
        </form>
        <a href="<?= base_url('cadastro') ?>" class="btn btn-outline-secondary w-100">Criar conta</a>
    </div>
</div>

<script>
    window.appConfig = {
        loginUrl: '<?= site_url('login') ?>',
        baseUrl: '<?= site_url('/') ?>'
    };
</script>

<script src="<?= base_url('js/login.js') ?>"></script>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
