<h1 class="nombre-pagina">Panel de Administración</h1>

<?php include_once __DIR__.'/../templates/barra.php' ?>

<h2>Buscar Citas</h2>
<div class="busqueda">
    <form action="" class="form">
        <div class="field">
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha" value="<?php echo $fecha ?>">
        </div>
    </form>
</div>
<?php 
    if (count($citas) === 0) {
        echo "<h2>No hay Citas</h2>";
    }
?>
<div id="citas-admin">
    <ul class="citas">
        <?php 
            $idCita = 0;
            foreach($citas as $key => $cita):
                if($idCita !== $cita->id):
                    $total = 0;
        ?>
        <li>
            <h3>Cita</h3>
            <p>ID: <span><?php echo $cita->id; ?></span></p>
            <p>Hora: <span><?php echo $cita->hora; ?></span></p>
            <p>Cliente: <span><?php echo $cita->cliente; ?></span></p>
            <p>Correo: <span><?php echo $cita->email; ?></span></p>
            <p>Teléfono: <span><?php echo $cita->telefono; ?></span></p>

            <h3>Servicios</h3>
        <?php
            $idCita = $cita->id; 
            endif;

            $total += $cita->precio;
        ?>
            <p class="servicio"><?php echo $cita->servicio." : "; ?><span><?php echo "$ ".$cita->precio; ?></span></p>   
        
            <?php 
                $actual = $cita->id;
                $proximo = $citas[$key+1]->id ?? 0;
                
                if(esUltimo($actual, $proximo)): ?>
                    <p class="total">Total:<span><?php echo " $ ".$total; ?></span></p>   
        <?php    
                endif;   
            endforeach;
        ?>
    </ul>
</div>

<?php 
    $script = "<script src='build/js/buscador.js'></script>";
?>