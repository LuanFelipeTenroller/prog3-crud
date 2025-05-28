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
</head>

<body>
    <div class="container">

        <?php
        // Verifica se está na home
        $request = \Config\Services::request();
        $uri = $request->getPath();

        if ($uri !== '' && $uri !== '/') :
        ?>
            <nav class="navbar navbar-expand-lg rounded mt-3 px-3" style="background-color: #e1ecbb;">
                <a class="navbar-brand fw-bold" href="<?= base_url() ?>" style="color: #455c34;">
                    <i class="bi bi-house-fill"></i> Home
                </a>
                <div class="navbar-nav">
                    <a class="nav-link" href="<?= base_url('plantas') ?>" style="color: #455c34;">
                        <i class="bi bi-flower1"></i> Plantas
                    </a>
                    <a class="nav-link" href="<?= base_url('tipos') ?>" style="color: #455c34;">
                        <i class="bi bi-tags"></i> Tipos
                    </a>
                    <a class="nav-link" href="<?= base_url('favoritos') ?>" style="color: #455c34;">
                        <i class="bi bi-star-fill"></i> Favoritos
                    </a>
                </div>
            </nav>
        <?php endif; ?>
