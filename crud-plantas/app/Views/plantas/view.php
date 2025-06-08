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

        <?php if ($usuario_logado_id == $planta['usuario_id']) : ?>
            <a href="<?= base_url('plantas/edit/' . $planta['id']) ?>" 
               class="btn" 
               style="background-color: #5f7e49; color: white; border-radius: 20px; padding-inline: 20px;">
                Editar
            </a>
        <?php endif; ?>
    </div>
    <?php if (!empty($planta['imagem'])) : ?>
        <div class="mb-3">
            <img src="<?= base_url('uploads/' . $planta['imagem']) ?>" alt="Imagem da planta" style="max-width: 300px; border-radius: 10px;">
        </div>
    <?php else : ?>
        <div class="mb-3 text-muted">
            <em>Esta planta não possui imagem cadastrada.</em>
        </div>
    <?php endif; ?>

    <h4 class="mt-5">Comentários</h4>
    <?php if (!empty($comentarios)): ?>
        <ul class="list-group mb-3">
            <?php foreach ($comentarios as $comentario): ?>
                <li class="list-group-item">
                    <strong><?= esc($comentario['nome_usuario']) ?>:</strong>
                    <span style="word-break: break-word; white-space: pre-line;">
                        <?= esc($comentario['texto']) ?>
                    </span>
                    <br>
                    <small class="text-muted"><?= date('d/m/Y H:i', strtotime($comentario['data_criacao'])) ?></small>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="text-muted">Nenhum comentário ainda.</p>
    <?php endif; ?>

    <?php if ($usuario_logado_id): ?>
        <form action="<?= base_url('comentarios/comentar/' . $planta['id']) ?>" method="post" class="mb-4">
            <div class="mb-2">
                <textarea name="comentario" class="form-control" rows="2" placeholder="Deixe seu comentário..." required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Comentar</button>
        </form>
    <?php else: ?>
        <p class="text-muted">Faça login para comentar.</p>
    <?php endif; ?>

<?php else : ?>
    <p>Planta não encontrada.</p>
<?php endif; ?>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
