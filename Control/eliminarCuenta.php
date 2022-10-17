<?php
session_start();
require"../Model/conexion.php";

$id=$_GET['id'];
$tipo=$_GET['tipo'];

if($tipo==1){
    //////////eliminaremos un admin con su id
    $sql="DELETE from usuarios where idUsuario='$id'";
    $resultado=$conexion->query($sql);
    if($resultado)
        header("location: ../index.php?eliminar=1");///eliminacion exitoso
    else
        header("location: ../admin/index.php?erroreliminar=1");///error en eliminar
}
if($tipo==2){
    //////////el cliente elimina su cuenta y lo redirigimos al inicio de sesion
    $sql="DELETE from usuarios where idUsuario='$id'";
    $resultado=$conexion->query($sql);
    if($resultado)
        header("location: ../index.php?eliminar=1");///eliminacion exitoso
    else
        header("location: ../clientes/info.php?erroreliminar=1");///error en eliminar
        // print_r($resultado);
        // echo 'id '.$id;
}

mysqli_close($conexion);  // Cierra la conexion


?>