<?php
require 'functions.php';

$permisos = ['Administrador'];
permisos($permisos);
//consulta los alumnos para el listaddo de alumnos
$alumnos = $conn->prepare("select a.id, a.num_lista, a.cedula, a.nombres, a.apellidos, a.genero, b.nombre as años, c.nombre as seccion from alumnos as a inner join años as b on a.id_grado = b.id inner join secciones as c on a.id_seccion = c.id order by a.apellidos");
$alumnos->execute();
$alumnos = $alumnos->fetchAll();
?>
<!DOCTYPE html>
<html>
<?php include 'menu.view.php';?>
<div class="body">
    <div class="panel">
            <h4 class="text-center">Listado de General de Alumnos</h4>
            <table class="table" cellspacing="0" cellpadding="0">
                <tr>
                    <th>No de<br>lista</th><th>Cedula</th><th>Apellidos</th><th>Nombres</th><th>Genero</th><th>año</th><th>Seccion</th>
                    <th>Editar</th><th>Eliminar</th>
                </tr>
                <?php foreach ($alumnos as $alumno) :?>
                <tr>
                    <td align="center"><?php echo $alumno['num_lista']?></td>
                    <td align="center"><?php echo $alumno['cedula']?></td>
                    <td><?php echo $alumno['apellidos'] ?></td>
                    <td><?php echo $alumno['nombres'] ?></td>
                    <td align="center"><?php echo $alumno['genero'] ?></td>
                    <td align="center"><?php echo $alumno['años'] ?></td>
                    <td align="center"><?php echo $alumno['seccion'] ?></td>
                    <td ><a href="alumnoedit.view.php?id=<?php echo $alumno['id'] ?>" class="b_b">Editar</a> </td>
                    <td ><a href="alumnodelete.php?id=<?php echo $alumno['id'] ?>" class="b_b">Eliminar</a> </td>
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
<script src="js/script.js"></script>
</body>

</html>