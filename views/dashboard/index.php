<?php include_once __DIR__ . '/header-dashboard.php'; ?>

<div class="contenedor-sm">
    <div class="contenedor-nueva-ocurrencia">
        <button
            type="button"
            class="agregar-ocurrencia"
            id="agregar-ocurrencia"
        >&#43; Nueva Ocurrencia</button>
    </div>
</div>

<?php include_once __DIR__ . '/footer-dashboard.php'; ?>

<?php
$script = '
    <script src="build/js/ocurrencias.js"></script>
';

?>