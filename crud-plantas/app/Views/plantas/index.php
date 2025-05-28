<?php include APPPATH . 'Views/templates/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mt-4 mb-3">
    <h2 style="color: #3a5a3c;">Listagem de Plantas</h2>

    <form class="d-flex" method="get" action="<?= base_url('plantas') ?>">
        <input type="text" name="search" class="form-control me-2" placeholder="Pesquisar...">
        <button type="submit" class="btn custom-buscar-btn">Buscar</button>
    </form>
</div>

<a href="<?= base_url('plantas/create') ?>" class="btn mb-3" style="background-color: #5f7e49; color: white; border-radius: 20px;">
    <i class="bi bi-plus-lg"></i> Adicionar Nova Planta
</a>

<?php if (!empty($plantas) && is_array($plantas)) : ?>
    <ul class="list-group">
        <?php foreach ($plantas as $planta) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong><?= esc($planta['nome']) ?></strong> - <?= esc($planta['especie']) ?>
                </div>
                <div>
                    <a href="<?= base_url('plantas/view/' . $planta['id']) ?>" class="btn btn-sm btn-secondary me-1">Ver</a>
                    <a href="<?= base_url('plantas/edit/' . $planta['id']) ?>" class="btn btn-sm btn-primary me-1">Editar</a>
                    <form action="<?= base_url('favoritos/store/' . $planta['id']) ?>" method="post" style="display:inline;">
                        <button type="submit" class="btn btn-sm btn-warning">Favoritar</button>
                    </form>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p class="text-muted">Nenhuma planta cadastrada.</p>
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