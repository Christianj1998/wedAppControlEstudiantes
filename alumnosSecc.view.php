<?php 
require 'functions.php';
$permisos = ['Administrador'];
permisos($permisos);
?>
<?php 

// recuperamos los datos del inicio.view.php 
$year = $_GET['year'];
$section = $_GET['section'];

//preparamos la consulta  para acceder a la base de datos utilizamos  un placeholder para luego asociarla con la variable
$stmt = $conn->prepare("SELECT * FROM alumnos WHERE id_grado = :year AND id_seccion = :section");
//placeholder es el: $year y $section

//asociames las variables al placeholder mediante binParam para pasar esos datos de manera dinamica a la consulta mysql
$stmt->bindParam(':year', $year);
$stmt->bindParam(':section', $section);

//se ejecuta la consulta preparada 
$stmt->execute();

// y obtenemos todos los resultados en un array en este caso alumnos para
//lego utilizarlo a lo largo del codigo
$alumnos = $stmt->fetchAll();



?>
<!DOCTYPE html>
<html>
<?php include 'menu.view.php';?>



///////// referencia///////////////////
<div class="body">
    <div class="panel">
            <h4 class="text-center">Listado de General de Alumnos</h4>
            <table class="table" cellspacing="0" cellpadding="0">
                <tr>
                    <th>No de<br>lista</th><th>Cedula</th><th>Apellidos</th><th>Nombres</th><th>Genero</th>
                    <th>Editar</th><th>Eliminar</th>
                </tr>
                <?php foreach ($alumnos as $a) :?>
                <tr>
                    <td align="center"><?php echo $a['num_lista']?></td>
                    <td align="center"><?php echo $a['cedula']?></td>
                    <td><?php echo $a['apellidos'] ?></td>
                    <td><?php echo $a['nombres'] ?></td>
                    <td align="center"><?php echo $a['genero'] ?></td>
                    <td ><a href="alumnoedit.view.php?id=<?php echo $a['id'] ?>" class="b_b">Editar</a> </td>
                    <td ><a href="alumnodelete.php?id=<?php echo $a['id'] ?>" class="b_b">Eliminar</a> </td>
                </tr>
                <?php endforeach;?>
            </table>
                <br><br>

                <a class="btn-link" href="alumnos.view.php">Agregar Alumno</a>
                <br><br>
                <!--mostrando los mensajes que recibe a traves de los parametros en la url-->
                <?php
                if(isset($_GET['err']))
                    echo '<span class="error">Error al almacenar el registro</span>';
                if(isset($_GET['info']))
                    echo '<span class="success">Registro almacenado correctamente!</span>';
                ?>


        </div>
</div>

</body>

</html>
