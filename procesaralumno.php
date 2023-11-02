<?php
if(!$_POST){
    header('location: alumnos.view.php');
}
else {
    //incluimos el archivo funciones que tiene la conexion
    require 'functions.php';
    //Recuperamos los valores que vamos a llenar en la BD
    $cedula =   htmlentities($_POST ['cedula']);
    $nombres = htmlentities($_POST ['nombres']);
    $apellidos = htmlentities($_POST ['apellidos']);
    $genero = htmlentities($_POST['genero']);
    $numlista = htmlentities($_POST['numlista']);
    $idgrado = htmlentities($_POST['años']);
    $idseccion = htmlentities($_POST['seccion']);

    //insertar es el nombre del boton guardar que esta en el archivo trabajadores.view.php
    if (isset($_POST['insertar'])){

        $result = $conn->query("insert into alumnos (num_lista ,cedula ,nombres, apellidos, genero, id_grado, id_seccion) values ('$numlista' ,'$cedula' , '$nombres', '$apellidos', '$genero', '$idgrado','$idseccion' )");
        if (isset($result)) {
            header('location:alumnos.view.php?info=1');
        } else {
            header('location:alumnos.view.php?err=1');
        }// validación de registro

    //sino boton modificar que esta en el archivo trabajadores.view.php
    }else if (isset($_POST['modificar'])) {
        //capturamos el id trabajadores a modificar
            $id_alumno = htmlentities($_POST['id']);
            $result = $conn->query("update alumnos set num_lista = '$numlista', cedula = '$cedula', nombres = '$nombres', apellidos = '$apellidos', genero = '$genero',id_grado = '$idgrado', id_seccion = '$idseccion' where id = " . $id_alumno);
            if (isset($result)) {
                header('location:alumnoedit.view.php?id=' . $id_alumno . '&info=1');
            } else {
                header('location:alumnoedit.view.php?id=' . $id_alumno . '&err=1');
            }// validación de registro
    }

} 

