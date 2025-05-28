<?php include APPPATH . 'Views/templates/header.php'; ?>

<h2 style="color: #3a5a3c;" class="mt-4 mb-4">Detalhes da Planta</h2>

<?php if (!empty($planta)) : ?>
    <p><strong>Nome:</strong> <?= esc($planta['nome']) ?></p>
    <p><strong>Espécie:</strong> <?= esc($planta['especie']) ?></p>
    <p><strong>Descrição:</strong> <?= esc($planta['descricao']) ?></p>
    <p><strong>Cuidados:</strong> <?= esc($planta['cuidados']) ?></p>
    <p><strong>Tipo:</strong> <?= esc($planta['tipo_nome'] ?? 'Não informado') ?></p>
    <p><strong>Registrada em:</strong> <?= date('d/m/Y H:i', strtotime($planta['data_registro'])) ?></p>

    <div class="d-flex mt-4">
        <a href="<?= base_url('plantas') ?>" class="btn me-2" style="border: 1px solid #5f7e49; color: #5f7e49; background-color: white; border-radius: 20px; padding-inline: 20px;">Voltar</a>

        <a href="<?= base_url('plantas/edit/' . $planta['id']) ?>" 
           class="btn" 
           style="background-color: #5f7e49; color: white; border-radius: 20px; padding-inline: 20px;">
            Editar
        </a>
    </div>

<?php else : ?>
    <p>Planta não encontrada.</p>
<?php endif; ?>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
