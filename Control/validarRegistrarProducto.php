<?php
session_start();
require"../Model/conexion.php";
if(empty($_POST["nombre"]) || empty($_POST["precio"]) || empty($_POST["cantidad"]) || empty($_POST["categoria"])){
    header("location:../admin/registrarProducto.php?errorregistro=1");/////hay campos vacios
    exit();
}

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$categoria = $_POST['categoria'];
$descripcion = $_POST['descripcion'];
// echo 'nom'.$nombre;echo 'prec'.$precio;echo 'cant'.$cantidad;echo 'categ'.$categoria;

$registrar="INSERT INTO productos (nombre, precio, cantidad, descripcion, idCategoria) VALUES ('$nombre','$precio','$cantidad','$descripcion','$categoria')";
$resultadoRegistro=$conexion->query($registrar);
if($resultadoRegistro)
    header("location:../admin/productos.php?registro=1");///registro exitoso
    // echo 'SIIIIIIIIII';
else
// print_r($resultadoRegistro);
    header("location:../admin/registrarProducto.php?errorregistro=4");//

mysqli_close($conexion);  // Cierra la conexion

?>