<?php include APPPATH . 'Views/templates/header.php'; ?>

<h2 style="color: #3a5a3c;" class="mt-4 mb-4">Adicionar Nova Planta</h2>

<form action="<?= base_url('plantas/store') ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <!-- Coluna esquerda -->
        <div class="col-md-6">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="especie" class="form-label">Espécie:</label>
                <input type="text" name="especie" id="especie" class="form-control">
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="4"></textarea>
            </div>
        </div>

        <!-- Coluna direita -->
        <div class="col-md-6 d-flex flex-column">
            <div class="mb-3">
                <label for="cuidados" class="form-label">Cuidados:</label>
                <textarea name="cuidados" id="cuidados" class="form-control" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label for="tipo_id" class="form-label">Tipo:</label>
                <select name="tipo_id" id="tipo_id" class="form-select">
                    <option value="">Selecione um tipo</option>
                    <?php foreach ($tipos as $tipo) : ?>
                        <option value="<?= esc($tipo['id']) ?>"><?= esc($tipo['nome']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Botões alinhados à direita e com margem inferior -->
            <div class="mt-3 mb-5">
                <a href="<?= base_url('plantas') ?>" class="btn ms-2" style="border: 1px solid #5f7e49; color: #5f7e49; background-color: white; border-radius: 20px; padding-inline: 20px;">
                    Cancelar
                </a>
                <button type="submit" class="btn" style="background-color: #5f7e49; color: white; border-radius: 20px; padding-inline: 20px;">
                    Salvar
                </button>
            </div>
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem:</label>
            <input type="file" name="imagem" id="imagem" class="form-control" accept="image/*">
            <div id="preview-container" class="mt-2"></div>
        </div>
    </div>
</form>

<script>
    document.getElementById('imagem').addEventListener('change', function(event) {
        const previewContainer = document.getElementById('preview-container');
        previewContainer.innerHTML = ''; // Limpa o preview anterior

        const file = event.target.files[0];
        if (file) {
            const img = document.createElement('img');
            img.style.maxWidth = '200px';
            img.style.borderRadius = '10px';
            img.src = URL.createObjectURL(file);
            previewContainer.appendChild(img);
        }
    });

    document.querySelector('form').addEventListener('submit', async function(e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);

        const token = localStorage.getItem('token');

        const response = await fetch('<?= base_url('plantas/store') ?>', {
            method: 'POST',
            headers: {
                'Authorization': 'Bearer ' + token,
            },
            body: formData,
        });

        const result = await response.json();

        if (response.ok) {
            alert('Planta salva com sucesso!');
            window.location.href = '<?= base_url('plantas') ?>';
        } else {
            alert('Erro: ' + (result.error || 'Erro desconhecido'));
        }
    });
</script>


<?php include APPPATH . 'Views/templates/footer.php'; ?>
