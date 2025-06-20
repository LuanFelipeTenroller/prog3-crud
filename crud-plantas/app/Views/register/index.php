<?php
helper('url');
$exibirHeader = false;
include APPPATH . 'Views/templates/header.php';
?>

<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
        <h2 class="fw-bold text-center mb-4" style="color: #455c34;">Cadastro</h2>
        <form id="formCadastro">
            <div class="mb-3">
                <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" required>
            </div>
            <div class="mb-3">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3 position-relative">
                <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
                <button type="button" class="btn btn-sm btn-outline-secondary position-absolute top-0 end-0 mt-2 me-2" id="toggleSenha" tabindex="-1">
                    <span id="iconSenha" class="bi bi-eye"></span>
                </button>
            </div>
            <div class="mb-3">
                <input type="password" id="confirmaSenha" name="confirmaSenha" class="form-control" placeholder="Confirme a senha" required>
            </div>
            <button type="submit" class="btn w-100 mb-2" style="background-color: #5f7e49; color: white;">Cadastrar</button>
        </form>
        <a href="<?= base_url('login') ?>" class="btn btn-outline-secondary w-100">Já tenho conta</a>
    </div>
</div>

<script>
document.getElementById('toggleSenha').addEventListener('click', function () {
    const senhaInput = document.getElementById('senha');
    const icon = document.getElementById('iconSenha');
    if (senhaInput.type === 'password') {
        senhaInput.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        senhaInput.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
});

document.getElementById('formCadastro').addEventListener('submit', async function (e) {
  e.preventDefault();

  const senha = document.getElementById('senha').value;
  const confirmaSenha = document.getElementById('confirmaSenha').value;

  if (senha !== confirmaSenha) {
    alert('As senhas não coincidem!');
    return;
  }

  const res = await fetch('<?= base_url('usuario') ?>', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({
      nome: document.getElementById('nome').value,
      email: document.getElementById('email').value,
      senha: senha
    })
  });

  const data = await res.json();

  if (data.message) {
    alert('Cadastro realizado com sucesso!');
    window.location.href = '<?= base_url('login') ?>';
  } else if (data.error) {
    alert(data.error);
  } else {
    alert('Erro ao cadastrar!');
  }
});
</script>

<?php include APPPATH . 'Views/templates/footer.php'; ?>