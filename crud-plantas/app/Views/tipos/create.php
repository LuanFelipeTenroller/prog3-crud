<?php include APPPATH . 'Views/templates/header.php'; ?>

<h2 style="color: #3a5a3c;" class="mt-4 mb-4">Adicionar Novo Tipo</h2>

<form action="<?= base_url('tipos/store') ?>" method="post">
    <div class="row">
        
        <div class="col-md-6">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="4"></textarea>
            </div>

            <div class="mt-3 mb-5">
                <a href="<?= base_url('tipos') ?>" class="btn ms-2" style="border: 1px solid #5f7e49; color: #5f7e49; background-color: white; border-radius: 20px; padding-inline: 20px;">
                    Cancelar
                </a>
                <button type="submit" class="btn" style="background-color: #5f7e49; color: white; border-radius: 20px; padding-inline: 20px;">
                    Salvar
                </button>
            </div>
        </div>
    </div>
</form>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
