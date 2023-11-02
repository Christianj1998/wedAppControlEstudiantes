<?php
if(!$_POST){
    header('location: trabajadores.view.php');
}
else {
    //incluimos el archivo funciones que tiene la conexion
    require 'functions.php';
    //Recuperamos los valores que vamos a llenar en la BD
    $cedula =   htmlentities($_POST ['cedula']);
    $nombre = htmlentities($_POST ['nombre']);
    $apellidos = htmlentities($_POST ['apellido']);
    $ocupacion = htmlentities($_POST['ocupacion']);
    

    //insertar es el nombre del boton guardar que esta en el archivo alumnos.view.php
    if (isset($_POST['insertar'])){

        $result = $conn->query("insert into trabajadores (cedula ,nombre, apellido, ocupacion) values ('$cedula' , '$nombre', '$apellidos', '$ocupacion')");
        if (isset($result)) {
            header('location:trabajadores.view.php?info=1');
        } else {
            header('location:trabajadores.view.php?err=1');
        }// validación de registro

    //sino boton modificar que esta en el archivo alumnoedit.view.php
    }else if (isset($_POST['modificar'])) {
        //capturamos el id alumnos a modificar
            $id_trabajadores = htmlentities($_POST['id']);
            $result = $conn->query("update trabajadores set  cedula = '$cedula', nombre = '$nombre', apellido = '$apellidos', ocupacion = '$ocupacion' where id = " . $id_trabajadores);
            if (isset($result)) {
                header('location:trabajadoresedit.view.php?id=' . $id_trabajadores . '&info=1');
            } else {
                header('location:trabajadoresedit.view.php?id=' . $id_trabajadores . '&err=1');
            }// validación de registro
    }

}

