<?php include APPPATH . 'Views/templates/header.php'; ?>

<h2>Tipos de Plantas</h2>

<!-- Mensagens de sucesso ou erro -->
<?php if (session()->getFlashdata('error')): ?>
    <div style="color: red; margin-bottom: 15px;">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
    <div style="color: green; margin-bottom: 15px;">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<a href="<?= base_url('tipos/create') ?>">Adicionar Novo Tipo</a>

<?php if (!empty($tipos)) : ?>
    <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 10px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tipos as $tipo) : ?>
                <tr>
                    <td><?= esc($tipo['id']) ?></td>
                    <td><?= esc($tipo['nome']) ?></td>
                    <td><?= esc($tipo['descricao']) ?></td>
                    <td>
                        <a href="<?= base_url('tipos/edit/' . $tipo['id']) ?>">Editar</a> |
                        <form action="<?= base_url('tipos/delete/' . $tipo['id']) ?>" method="post" style="display:inline;">
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este tipo?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>Nenhum tipo cadastrado.</p>
<?php endif; ?>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
