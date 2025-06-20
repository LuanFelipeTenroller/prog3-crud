<?php include APPPATH . 'Views/templates/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mt-4 mb-3">
    <h2 style="color: #3a5a3c;">Listagem de Plantas</h2>

    <form class="d-flex" method="get" action="<?= base_url('plantas') ?>">
        <input type="text" name="search" class="form-control me-2" placeholder="Pesquisar...">
        <button type="submit" class="btn custom-buscar-btn">Buscar</button>
    </form>
</div>

<a href="<?= base_url('plantas/create') ?>" class="btn mb-3" style="background-color: #5f7e49; color: white; border-radius: 20px;">
    <i class="bi bi-plus-lg"></i> Adicionar Nova Planta
</a>

<?php if (!empty($plantas) && is_array($plantas)) : ?>
    <ul class="list-group">
        <?php foreach ($plantas as $planta) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong><?= esc($planta['nome']) ?></strong> - <?= esc($planta['especie']) ?>
                </div>
                <div>
                    <a href="<?= base_url('plantas/view/' . $planta['id']) ?>"
                        class="btn btn-sm me-1"
                        style="background-color: #5f7e49; color: white; border-radius: 5px;">
                        Ver
                    </a>
                    <?php if ($usuario_logado_id == $planta['usuario_cadastro_id']) : ?>
                        <a href="<?= base_url('plantas/edit/' . $planta['id']) ?>" class="btn btn-sm btn-primary me-1">Editar</a>

                        <form action="<?= base_url('plantas/delete/' . $planta['id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir esta planta?');">
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    <?php endif; ?>


                    <button type="button"
                        class="btn btn-sm btn-favoritar"
                        data-id="<?= $planta['id'] ?>"
                        aria-label="Favoritar planta"
                        style="background: none; border: none; color: #f0ad4e; font-size: 1.3rem;">
                        <i class="bi <?= !empty($planta['favorito']) ? 'bi-star-fill' : 'bi-star' ?>"></i>
                    </button>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p class="text-muted">Nenhuma planta cadastrada.</p>
<?php endif; ?>

<?php include APPPATH . 'Views/templates/footer.php'; ?>

<style>
    .custom-buscar-btn {
        border: 1px solid #5f7e49;
        color: #5f7e49;
        background-color: transparent;
    }

    .custom-buscar-btn:hover {
        background-color: #5f7e49;
        color: white;
    }
</style>

<script>
    const baseUrl = "<?= base_url() ?>/";
    document.querySelectorAll('.btn-favoritar').forEach(button => {
        button.addEventListener('click', async () => {
            const plantaId = button.getAttribute('data-id');
            const token = localStorage.getItem('token');

            if (!token) {
                alert('Usuário não autenticado.');
                return;
            }

            if (token) {
                const payloadBase64 = token.split('.')[1];
                const payloadJson = atob(payloadBase64.replace(/-/g, '+').replace(/_/g, '/'));
                console.log('Payload JWT:', JSON.parse(payloadJson));
            }

            try {
                const response = await fetch(`${baseUrl}favoritos/store/${plantaId}`, {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json'
                    }
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    const icon = button.querySelector('i');
                    if (result.favorito) {
                        icon.classList.replace('bi-star', 'bi-star-fill');
                    } else {
                        icon.classList.replace('bi-star-fill', 'bi-star');
                    }
                } else {
                    alert(result.error || "Erro ao favoritar.");
                }
            } catch (error) {
                console.error('Erro na requisição:', error);
                alert("Erro na requisição.");
            }
        });
    });
</script>