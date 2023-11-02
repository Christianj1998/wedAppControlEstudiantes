<!DOCTYPE html>
<?php
require 'functions.php';
//Define queienes tienen permiso en este archivo
$permisos = ['Administrador'];
permisos($permisos);
//consulta las secciones
$secciones = $conn->prepare("select * from secciones");
$secciones->execute();
$secciones = $secciones->fetchAll();

//consulta de grados
$años = $conn->prepare("select * from años");
$años->execute();
$años = $años->fetchAll();
?>
<html>
<?php include 'menu.view.php';?>
<!-- Registro de alumno -->
<div class="body">
    <div class="panel">
        <form method="post" class="form" action="procesaralumno.php">
                <h4>Registro de Alumnos</h4>
                <div class="form-group">
                    <label>Cedula</label>
                    <input type="text" required name="cedula" maxlength="11">
                </div>
                <div class="form-group">
                    
                    <label>Nombres</label>
                    <input type="text" required name="nombres" maxlength="45">
                </div>
                <div class="form-group">
                    <label>Apellidos</label>
                    <input type="text" required name="apellidos" maxlength="45">
                </div>
                <div class="form-group">  
                    <label>No de Lista</label>
                    <input type="number" min="1" class="number" name="numlista">
                </div>
                <div class="genero">    
                    <input required type="radio" name="genero" value="M"> 
                    <label>Masculino</label>
                     <br>
                    <input type="radio" name="genero" required value="F"> 
                    <label>Femenino</label>
                </div>
                <div class="form-group">

                    <label>Años</label><br>
                    <select name="años" required>
                        
                        <?php foreach ($años as $años):?>
                            <option  value="<?php echo $años['id'] ?>"><?php echo $años['nombre'] ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="seccion">
                        <?php foreach ($secciones as $seccion):?>
                            <input type="radio" name="seccion" required value="<?php echo $seccion['id'] ?>">Sección <?php echo $seccion['nombre'] ?>
                            <?php endforeach;?>
                        </div>
                            <button class="b_b" type="submit" name="insertar">Guardar</button> 
                            <button class="b_b" type="reset">Limpiar</button> 
                <br><br>
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