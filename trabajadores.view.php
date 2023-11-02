<!DOCTYPE html>
<?php
require 'functions.php';
//Define queienes tienen permiso en este archivo
$permisos = ['Administrador'];
permisos($permisos);
?>
<html>
<?php include 'menu.view.php';?>
<!-- Registro de trabajadores -->
<div class="body">
    <div class="panel">
        <form method="post" class="form" action="procesar_trabajador.php">
                <h4>Registro de Trabajadores</h4>
                <div class="form-group">
                    <label>Cedula</label><br>
                    <input type="text" required name="cedula" maxlength="11">
                </div>
                <div class="form-group">
                    <label>Nombres</label><br>
                    <input type="text" required name="nombres" maxlength="45">
                </div>
                <div class="form-group">

                    <label>Apellidos</label><br>
                    <input type="text" required name="apellidos" maxlength="45">
                </div>
                <div class="form-group">
                    <label>Ocupacion</label><br>
                    <input type="text" required name="ocupacion" maxlength="45">
                </div>
                
                <button class="b_b" type="submit" name="insertar">Guardar</button> 
                <button class="b_b" type="reset">Limpiar</button> 
                
                <!--mostrando los mensajes que recibe a traves de los parametros en la url-->
                <?php
                if(isset($_GET['err']))
                    echo '<span class="error">Error al almacenar el registro</span>';
                if(isset($_GET['info']))
                    echo '<span class="success">Registro almacenado correctamente!</span>';
                ?>

            </form>
        <?php
        if(isset($_GET['err']))
            echo '<span class="error">Error al guardar</span>';
        ?>
        </div>
</div>


<script src="js/script.js"></script>
</body>

</html>