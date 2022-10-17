<?php
session_start();
require"../Model/conexion.php";
if(empty($_POST["pass"]) || empty($_POST["login"]) || empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["cc"])|| empty($_POST["celular"])){
    header("location:../admin/editar.php?errorregistro=1");/////hay campos vacios
    exit();
}

$pass = $_POST['pass'];
$correo = $_POST['login'];
$nombres = $_POST['nombre'];
$apellidos = $_POST['apellido'];
$cc = $_POST['cc'];
$celular = $_POST['celular'];
////vamos a recibir por get el tipo de registro a editar
////si el tipo es 1 vamos a editar un admin
////si el tipo es 2 vamos a editar un cliente
////si el tipo es 3 vamos a editar un producto
/////ademas recibimos por get el id
$tipo=$_GET['tipo'];
$id=$_GET['id'];

if($tipo==1){
    ////tipo 1 porquee es el admin quien esta modificando
    //////////editaremos un usuario con su id y redirigimos a las paginas del admin
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)){
    header("location: ../admin/editar.php?errorregistro=2");///el correo  no es valido
    exit();
    }

    $sql="UPDATE usuarios set identificacion = '$cc', nombres='$nombres', apellidos='$apellidos', celular='$celular', correo='$correo', password='$pass' where idUsuario='$id'";
    $resultado=$conexion->query($sql);
    if($resultado)
        header("location: ../admin/index.php?registro=1");///registro exitoso
    else
        header("location: ../admin/editar.php?errorregistro=4");///error en base de datos al ingresar registro
}
if($tipo==2){
    ////es tipo 2 porque el cliente esta modifiacndo sus datos
    //////////editaremos un cliente con su id y redirigimos a las paginas del cliente
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)){
    header("location: ../clientes/editar.php?errorregistro=2");///el correo  no es valido
    exit();
    }

    $sql="UPDATE usuarios set identificacion = '$cc', nombres='$nombres', apellidos='$apellidos', celular='$celular', correo='$correo', password='$pass' where idUsuario='$id'";
    $resultado=$conexion->query($sql);
    if($resultado)
        header("location: ../clientes/info.php?registro=1");///registro exitoso
    else
        header("location: ../clientes/editar.php?errorregistro=4");///error en base de datos al ingresar registro
}


mysqli_close($conexion);  // Cierra la conexion


?>