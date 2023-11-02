<!DOCTYPE html>
<?php
require 'functions.php';
$permisos = ['Administrador'];
permisos($permisos);
if(isset($_GET['id'])) {

    $id_trabajador = $_GET['id'];

    $trabajadores = $conn->prepare("select * from trabajadores where id = ".$id_trabajador);
    $trabajadores->execute();
    $trabajadores = $trabajadores->fetch();

}else{
    Die('Ha ocurrido un error');
}
?>
<html>
<?php include 'menu.view.php';?>
<!-- listado de alumnos -->

<div class="body">
    <div class="panel">
        <form method="post" class="form" action="procesar_trabajador.php">
                <h4>Edición de Trabajadores</h4>

                <!--colocamos un campo oculto que tiene el id del alumno-->
                <div class="form-group">
                    <input type="hidden" value="<?php echo $trabajadores['id']?>" name="id">
                    <label>cedula</label><br>
                    <input type="text" required name="cedula" value="<?php echo $trabajadores['cedula']?>" maxlength="45">
                </div>
                <div class="form-group">
                    <label>Nombres</label><br>
                    <input type="text" required name="nombre" value="<?php echo $trabajadores['nombre']?>" maxlength="45">
                </div>
                <div class="form-group">
                    <label>Apellidos</label><br>
                    <input type="text" required name="apellido" value="<?php echo $trabajadores['apellido']?>" maxlength="45">
                </div>

                <div class="form-group">
                    <label>Ocupacion</label><br>
                    <input type="text" required name="ocupacion" value="<?php echo $trabajadores['ocupacion']?>" maxlength="45">    
                </div>                
               
                <button class="b_b" type="submit" name="modificar">Guardar Cambios</button> 
                <br><br>
                <!--mostrando los mensajes que recibe a traves de los parametros en la url-->
                <?php
                if(isset($_GET['err']))
                    echo '<span class="error">Error al editar el registro</span>';
                if(isset($_GET['info']))
                    echo '<span class="success">Registro modificado correctamente!</span>';
                ?>

            </form>
        </div>
</div>


<script src="js/script.js"></script>
</body>

</html>