<?php include APPPATH . 'Views/templates/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mt-4 mb-3">
    <h2 style="color: #3a5a3c;">Favoritos</h2>

    <form class="d-flex" method="get" action="<?= base_url('favoritos') ?>">
        <input type="text" name="search" class="form-control me-2" placeholder="Pesquisar...">
        <button type="submit" class="btn custom-buscar-btn">Buscar</button>
    </form>
</div>

<?php if (!empty($favoritos)) : ?>
    <ul class="list-group">
        <?php foreach ($favoritos as $favorito) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong><?= esc($favorito['nome_planta']) ?></strong><br>
                    <small class="text-muted">Adicionado em: <?= date('d/m/Y H:i', strtotime($favorito['data_registro'])) ?></small>
                </div>
                <div>
                    <a href="<?= base_url('plantas/view/' . $favorito['planta_id']) ?>" 
                       class="btn btn-sm me-1" 
                       style="background-color: #5f7e49; color: white; border-radius: 5px;">
                        Ver
                    </a>
                    <form action="<?= base_url('favoritos/delete/' . $favorito['id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja remover dos favoritos?');">
                        <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                    </form>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p class="text-muted">Nenhum favorito encontrado.</p>
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
