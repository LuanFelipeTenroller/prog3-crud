<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Plantas Ornamentais</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?= base_url() ?>">Home</a>
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="<?= base_url('plantas') ?>">Plantas</a>
                <a class="nav-item nav-link" href="<?= base_url('tipos') ?>">Tipos</a>
                <a class="nav-item nav-link" href="<?= base_url('favoritos') ?>">Favoritos</a>
            </div>
        </nav>
        <br>
