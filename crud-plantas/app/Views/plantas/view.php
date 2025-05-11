<?php include APPPATH . 'Views/templates/header.php'; ?>

<h2>Detalhes da Planta</h2>

<?php if (!empty($planta)) : ?>
    <p><strong>Nome:</strong> <?= esc($planta['nome']) ?></p>
    <p><strong>Espécie:</strong> <?= esc($planta['especie']) ?></p>
    <p><strong>Descrição:</strong> <?= esc($planta['descricao']) ?></p>
    <p><strong>Cuidados:</strong> <?= esc($planta['cuidados']) ?></p>
    <p><strong>Tipo:</strong> <?= esc($planta['tipo_nome'] ?? 'Não informado') ?></p>
    <p><strong>Registrada em:</strong> <?= date('d/m/Y H:i', strtotime($planta['data_registro'])) ?></p>

    <a href="<?= base_url('plantas/edit/' . $planta['id']) ?>">Editar</a> |
    <a href="<?= base_url('plantas') ?>">Voltar</a>
<?php else : ?>
    <p>Planta não encontrada.</p>
<?php endif; ?>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
