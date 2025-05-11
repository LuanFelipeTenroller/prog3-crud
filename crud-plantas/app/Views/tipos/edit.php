<?php include APPPATH . 'Views/templates/header.php'; ?>

<h2>Editar Tipo de Planta</h2>

<form action="<?= base_url('tipos/update/' . $tipo['id']) ?>" method="post">

    <label for="nome">Nome:</label><br>
    <input type="text" name="nome" id="nome" value="<?= esc($tipo['nome']) ?>" required><br><br>

    <label for="descricao">Descrição:</label><br>
    <textarea name="descricao" id="descricao"><?= esc($tipo['descricao']) ?></textarea><br><br>

    <button type="submit">Atualizar</button>
    <a href="<?= base_url('tipos') ?>">Cancelar</a>
</form>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
