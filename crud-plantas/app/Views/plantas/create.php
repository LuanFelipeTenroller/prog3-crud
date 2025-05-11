<?php include APPPATH . 'Views/templates/header.php'; ?>

<h2>Adicionar Nova Planta</h2>

<form action="<?= base_url('plantas/store') ?>" method="post">
    <label for="nome">Nome:</label><br>
    <input type="text" name="nome" id="nome" required><br><br>

    <label for="especie">Espécie:</label><br>
    <input type="text" name="especie" id="especie"><br><br>

    <label for="descricao">Descrição:</label><br>
    <textarea name="descricao" id="descricao"></textarea><br><br>

    <label for="cuidados">Cuidados:</label><br>
    <textarea name="cuidados" id="cuidados"></textarea><br><br>

    <label for="tipo_id">Tipo:</label><br>
    <select name="tipo_id" id="tipo_id">
        <option value="">Selecione um tipo</option>
        <?php foreach ($tipos as $tipo) : ?>
            <option value="<?= esc($tipo['id']) ?>"><?= esc($tipo['nome']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Salvar</button>
    <a href="<?= base_url('plantas') ?>">Cancelar</a>
</form>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
