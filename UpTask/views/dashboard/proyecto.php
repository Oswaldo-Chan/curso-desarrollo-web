<?php include_once __DIR__.'/header.php'; ?>

    <div class="contenedor-sm">
        <div class="contenedor-nueva-tarea">
            <button type="button" class="agregar-tarea" id="agregar-tarea">&#43; Nueva Tarea</button>
        </div>
    </div>

    <ul id="listado-tareas" class="listado-tareas"></ul>
<?php include_once __DIR__.'/footer.php'; ?>

<?php 
$script = '
    <script src="build/js/tareas.js"></script>
';
?>