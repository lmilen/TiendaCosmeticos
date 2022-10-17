<?php
session_start();

require"../Model/conexion.php";
$id=$_GET['id'];

//////////eliminaremos un usuario con su id
$sql="DELETE from productos where idProd='$id'";
$resultado=$conexion->query($sql);
if($resultado)
    header("location: ../admin/productos.php?eliminar=1");///eliminacion exitoso
else
    header("location: ../admin/productos.php?erroreliminar=1");///error en eliminar

mysqli_close($conexion);  // Cierra la conexion


?>