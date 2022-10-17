<?php
session_start();
require"../Model/conexion.php";
if(empty($_POST["nombre"]) || empty($_POST["precio"]) || empty($_POST["cantidad"]) || empty($_POST["categoria"])){
    header("location:../admin/editarProducto.php?id=".$_GET['id']."&errorregistro=1");/////hay campos vacios
    exit();
}

$id=$_GET['id'];

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$categoria = $_POST['categoria'];
$descripcion = $_POST['descripcion'];
// echo 'nom '.$nombre;echo ' prec '.$precio;echo ' cant '.$cantidad;echo ' categ '.$categoria;echo ' id '.$id;

$modificar="UPDATE productos SET nombre='$nombre', precio='$precio', cantidad='$cantidad',descripcion='$descripcion', idCategoria='$categoria' WHERE idProd = '$id'";
$resultado=$conexion->query($modificar);

if($resultado)
    header("location:../admin/productos.php?registro=1");///registro exitoso
    // echo 'SIIIIIIIIII';
else
//  print_r($resultado);
    header("location:../admin/editarProducto.php?id=".$_GET['id']."&errorregistro=4");//

mysqli_close($conexion);  // Cierra la conexion


?>