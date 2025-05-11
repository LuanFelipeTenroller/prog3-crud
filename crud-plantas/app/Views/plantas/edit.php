<?php include APPPATH . 'Views/templates/header.php'; ?>

<h2>Editar Planta</h2>

<form action="<?= base_url('plantas/update/' . $planta['id']) ?>" method="post">

    <label for="nome">Nome:</label><br>
    <input type="text" name="nome" id="nome" value="<?= esc($planta['nome']) ?>" required><br><br>

    <label for="especie">Espécie:</label><br>
    <input type="text" name="especie" id="especie" value="<?= esc($planta['especie']) ?>"><br><br>

    <label for="descricao">Descrição:</label><br>
    <textarea name="descricao" id="descricao"><?= esc($planta['descricao']) ?></textarea><br><br>

    <label for="cuidados">Cuidados:</label><br>
    <textarea name="cuidados" id="cuidados"><?= esc($planta['cuidados']) ?></textarea><br><br>

    <label for="tipo_id">Tipo:</label><br>
    <select name="tipo_id" id="tipo_id">
        <option value="">Selecione um tipo</option>
        <?php foreach ($tipos as $tipo) : ?>
            <option value="<?= esc($tipo['id']) ?>" <?= $planta['tipo_id'] == $tipo['id'] ? 'selected' : '' ?>>
                <?= esc($tipo['nome']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Atualizar</button>
    <a href="<?= base_url('plantas') ?>">Cancelar</a>
</form>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
