<?php include APPPATH . 'Views/templates/header.php'; ?>

<h2>Adicionar Novo Tipo</h2>

<form action="<?= base_url('tipos/store') ?>" method="post">
    <label for="nome">Nome:</label><br>
    <input type="text" name="nome" id="nome" required><br><br>

    <label for="descricao">Descrição:</label><br>
    <textarea name="descricao" id="descricao"></textarea><br><br>

    <button type="submit">Salvar</button>
    <a href="<?= base_url('tipos') ?>">Cancelar</a>
</form>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
