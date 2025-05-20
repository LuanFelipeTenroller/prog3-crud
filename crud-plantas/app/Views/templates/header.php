<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Plantas Ornamentais</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded mt-3 px-3">
            <a class="navbar-brand fw-bold" href="<?= base_url() ?>"><i class="bi bi-house-fill"></i> Home</a>
            <div class="navbar-nav">
                <a class="nav-link" href="<?= base_url('plantas') ?>"><i class="bi bi-flower1"></i> Plantas</a>
                <a class="nav-link" href="<?= base_url('tipos') ?>"><i class="bi bi-tags"></i> Tipos</a>
                <a class="nav-link" href="<?= base_url('favoritos') ?>"><i class="bi bi-star-fill"></i> Favoritos</a>
            </div>
        </nav>
