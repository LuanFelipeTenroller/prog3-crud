</div>

<footer class="text-center mt-5 mb-3 text-muted">
    <p>&copy; <?= date('Y') ?> - Sistema de Cadastro de Plantas Ornamentais</p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php
    $bottomValue = (isset($isHomePage) && $isHomePage === true) ? '-40px' : '-150px';
?>

<img src="<?= base_url('assets/img/home.png') ?>" alt="Rodapé com plantas"
     style="width: 100%; position: fixed; bottom: <?= $bottomValue ?>; left: 0; z-index: -1;">

</body>
</html>
