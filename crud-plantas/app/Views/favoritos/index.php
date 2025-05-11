<?php include APPPATH . 'Views/templates/header.php'; ?>

<h2>Favoritos</h2>

<?php if (!empty($favoritos)) : ?>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Planta</th>
                <th>Data de Adição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($favoritos as $favorito) : ?>
                <tr>
                    <td><?= esc($favorito['id']) ?></td>
                    <td><?= esc($favorito['nome_planta']) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($favorito['data_registro'])) ?></td>
                    <td>
                        <form action="<?= base_url('favoritos/delete/' . $favorito['id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir este favorito?');">
                            <button type="submit">Remover</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>Nenhum favorito encontrado.</p>
<?php endif; ?>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
