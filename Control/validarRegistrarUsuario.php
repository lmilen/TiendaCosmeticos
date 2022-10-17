<?php
session_start();
require"../Model/conexion.php";
if(empty($_POST["pass"]) || empty($_POST["login"]) || empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["cc"])|| empty($_POST["celular"])){
    header("location:../registrarUsuario.php?errorregistro=1");/////hay campos vacios
    exit();
}
$rol=$_POST['rol']; ////cliente es tipo 2, admin es tipo1

$pass = $_POST['pass'];
$user = $_POST['login'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cc = $_POST['cc'];
$celular = $_POST['celular'];

if($rol==1){////si es un admin para que lo redirija a la pagina del administrador
    if (!filter_var($user, FILTER_VALIDATE_EMAIL)){
        header("location:../admin/registrarAdmin.php?errorregistro=2");///el correo  no es valido
        exit();
    }
    
    //////////////////vamos a verificar que el correo no exista
    $sql = "SELECT * FROM usuarios WHERE correo = '$user'";
    $resultado=$conexion->query($sql);
    $existe = $resultado->num_rows;////num_rows contiene el numero de resultados obtenidos de la consulta sql
    if ($existe==1)  ////si existe un registro en la base de datos con el usuario ingresado
    {
        header("location:../admin/registrarAdmin.php?errorregistro=3");///el correo ya existe
    }else{
        $registrar="INSERT INTO usuarios(identificacion, nombres, apellidos, celular, correo, password, rol) VALUES ('$cc','$nombre','$apellido','$celular','$user','$pass','$rol')";
    
        $resultadoRegistro=$conexion->query($registrar);
        if($resultadoRegistro)
        header("location:../admin/index.php?registro=1");///registro exitoso
        else
        header("location:../admin/registrarAdmin.php?errorregistro=4");///error en base de datos al ingresar registro
    }
    mysqli_close($conexion);  // Cierra la conexion
  
}elseif ($rol==2) {///Si es un cliente lo redirige a sus paginas
    # code...
    if (!filter_var($user, FILTER_VALIDATE_EMAIL)){
        header("location:../registrarUsuario.php?errorregistro=2");///el correo  no es valido
        exit();
    }
    
    //////////////////vamos a verificar que el correo no exista
    $sql = "SELECT * FROM usuarios WHERE correo = '$user'";
    $resultado=$conexion->query($sql);
    $existe = $resultado->num_rows;////num_rows contiene el numero de resultados obtenidos de la consulta sql
    if ($existe==1)  ////si existe un registro en la base de datos con el usuario ingresado
    {
        header("location:../registrarUsuario.php?errorregistro=3");///el correo ya existe
    }else{
        $registrar="INSERT INTO usuarios(identificacion, nombres, apellidos, celular, correo, password, rol) VALUES ('$cc','$nombre','$apellido','$celular','$user','$pass','$rol')";
    
        $resultadoRegistro=$conexion->query($registrar);
        if($resultadoRegistro)
        header("location:../index.php?registro=1");///registro exitoso
        else
        header("location:../registrarUsuario.php?errorregistro=4");///error en base de datos al ingresar registro
    }
    mysqli_close($conexion);  // Cierra la conexion
    
    
    
}
?>