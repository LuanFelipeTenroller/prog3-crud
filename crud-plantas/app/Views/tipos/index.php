<?php include APPPATH . 'Views/templates/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mt-4 mb-3">
    <h2 style="color: #3a5a3c;">Tipos de Plantas</h2>

    <form class="d-flex" method="get" action="<?= base_url('tipos') ?>">
        <input type="text" name="search" class="form-control me-2" placeholder="Pesquisar...">
        <button type="submit" class="btn custom-buscar-btn">Buscar</button>
    </form>
</div>

<a href="<?= base_url('tipos/create') ?>" class="btn mb-3" style="background-color: #5f7e49; color: white; border-radius: 20px;">
    <i class="bi bi-plus-lg"></i> Adicionar Novo Tipo
</a>

<!-- Mensagens de sucesso ou erro -->
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (!empty($tipos)) : ?>
    <ul class="list-group">
        <?php foreach ($tipos as $tipo) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong><?= esc($tipo['nome']) ?></strong><br>
                    <small class="text-muted"><?= esc($tipo['descricao']) ?></small>
                </div>
                <div>
                    <a href="<?= base_url('tipos/edit/' . $tipo['id']) ?>" 
                       class="btn btn-sm btn-primary me-1">
                        Editar
                    </a>
                    <form action="<?= base_url('tipos/delete/' . $tipo['id']) ?>" method="post" style="display:inline;">
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Tem certeza que deseja excluir este tipo?')">
                            Excluir
                        </button>
                    </form>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p class="text-muted">Nenhum tipo cadastrado.</p>
<?php endif; ?>

<?php include APPPATH . 'Views/templates/footer.php'; ?>

<style>
    .custom-buscar-btn {
        border: 1px solid #5f7e49;
        color: #5f7e49;
        background-color: transparent;
    }

    .custom-buscar-btn:hover {
        background-color: #5f7e49;
        color: white;
    }
</style>
