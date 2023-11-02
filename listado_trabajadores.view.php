<?php 
require 'functions.php';
$permisos = ['Administrador'];
permisos($permisos);
?>
<?php 
//preparamos la consulta  para acceder a la base de datos utilizamos  un placeholder para luego asociarla con la variable
$stmt = $conn->prepare("SELECT * FROM trabajadores ");
//placeholder es el: $year y $section

//asociames las variables al placeholder mediante binParam para pasar esos datos de manera dinamica a la consulta mysql

//se ejecuta la consulta preparada 
$stmt->execute();

// y obtenemos todos los resultados en un array en este caso alumnos para
//lego utilizarlo a lo largo del codigo
$trabajadores = $stmt->fetchAll();



?>
<!DOCTYPE html>
<html>
<?php include 'menu.view.php';?>
<div class="body">
    <div class="panel">
            <h4 class="text-center">Listado de trabajadores</h4>
            <table class="table" cellspacing="0" cellpadding="0">
                <tr>
                    <th>Cedula</th><th>Apellidos</th><th>Nombres</th><th>Ocupacion</th>
                    <th>Editar</th><th>Eliminar</th>
                </tr>
                <?php foreach ($trabajadores as $t) :?>
                <tr>
                    
                    <td align="center"><?php echo $t['cedula']?></td>
                    <td><?php echo $t['apellido'] ?></td>
                    <td><?php echo $t['nombre'] ?></td>
                    <td align="center"><?php echo $t['ocupacion'] ?></td>
                    <td ><a href="trabajadoredit.view.php?id=<?php echo $t['id'] ?>" class="b_b">Editar</a> </td>
                    <td ><a href="trabajadordelete.php?id=<?php echo $t['id'] ?>" class="b_b">Eliminar</a> </td>
                </tr>
                <?php endforeach;?>
            </table>
               

                
                <!--mostrando los mensajes que recibe a traves de los parametros en la url-->
                <?php
                if(isset($_GET['err']))
                    echo '<span class="error">Error al almacenar el registro</span>';
                if(isset($_GET['info']))
                    echo '<span class="success">Registro almacenado correctamente!</span>';
                ?>


        </div>
</div>
<script src="js/script.js"></script>
</body>

</html>
