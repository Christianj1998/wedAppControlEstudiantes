<?php
require 'functions.php';
if($_SESSION['rol'] =='Administrador') {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        try {
            $id_trabajador = $_GET['id'];
            $trabajadores = $conn->prepare("delete from trabajadores where id = " . $id_trabajador);
            $trabajadores->execute();
            header('location:listado_trabajadores.view.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        die('Ha ocurrido un error');
    }
}else{
    header('location:inicio.view.php?err=1');
}
?>