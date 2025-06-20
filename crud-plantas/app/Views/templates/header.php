<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Plantas Ornamentais</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .nav-link {
            color: #455c34 !important;
            padding-bottom: 5px;
        }

        .nav-link.active {
            border-bottom: 3px solid #455c34;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">

        <?php

        $request = \Config\Services::request();
        $uri = $request->getPath();
        $rotaAtual = trim($uri, '/');

        if (!isset($exibirHeader) || $exibirHeader === true) :
        ?>
            <nav class="navbar navbar-expand-lg rounded mt-3 px-3" style="background-color: #e1ecbb;">
                <div class="navbar-nav d-flex flex-row gap-4">
                    <a class="nav-link <?= ($rotaAtual === 'home' || $rotaAtual === 'index.php') ? 'active' : '' ?>" href="<?= base_url() ?>">
                        <i class="bi bi-house-fill"></i> Home
                    </a>
                    <a class="nav-link <?= ($rotaAtual === 'plantas') ? 'active' : '' ?>" href="<?= base_url('plantas') ?>">
                        <i class="bi bi-flower1"></i> Plantas
                    </a>
                    <a class="nav-link <?= ($rotaAtual === 'tipos') ? 'active' : '' ?>" href="<?= base_url('tipos') ?>">
                        <i class="bi bi-tags"></i> Tipos
                    </a>
                    <a class="nav-link <?= ($rotaAtual === 'favoritos') ? 'active' : '' ?>" href="<?= base_url('favoritos') ?>">
                        <i class="bi bi-star-fill"></i> Favoritos
                    </a>
                </div>
                <div class="navbar-nav ms-auto d-flex flex-row gap-3">
                    <!-- Ícone do perfil que abre o modal -->
                    <a class="nav-link" href="#" id="perfilIcon" data-bs-toggle="modal" data-bs-target="#perfilModal" title="Perfil">
                        <i class="bi bi-person-circle" style="font-size: 1.8rem;"></i>
                    </a>
                </div>
            </nav>

        <!-- Modal do perfil -->
        <div class="modal fade" id="perfilModal" tabindex="-1" aria-labelledby="perfilModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-end">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="perfilModalLabel">Opções do Perfil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body d-flex flex-column gap-2">
                <a href="<?= base_url('perfil') ?>" class="btn btn-outline-success w-100">
                    <i class="bi bi-person"></i> Meu Perfil
                </a>
                <a href="<?= base_url('logout') ?>" class="btn btn-outline-danger w-100">
                    <i class="bi bi-box-arrow-right"></i> Sair
                </a>
            </div>
            </div>
        </div>
        </div>
        <?php endif; ?>
