<?php include APPPATH . 'Views/templates/header.php'; ?>

<h2>Lista de Plantas</h2>

<a href="<?= base_url('plantas/create') ?>">Adicionar Nova Planta</a>

<?php if (!empty($plantas) && is_array($plantas)) : ?>
    <ul>
        <?php foreach ($plantas as $planta) : ?>
            <li>
                <strong><?= esc($planta['nome']) ?></strong> - <?= esc($planta['especie']) ?><br>
                <a href="<?= base_url('plantas/view/' . $planta['id']) ?>">Ver</a> |
                <a href="<?= base_url('plantas/edit/' . $planta['id']) ?>">Editar</a> |
                <form action="<?= base_url('favoritos/store/' . $planta['id']) ?>" method="post" style="display:inline;">
                    <button type="submit">Favoritar</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>Nenhuma planta cadastrada.</p>
<?php endif; ?>

<?php include APPPATH . 'Views/templates/footer.php'; ?>