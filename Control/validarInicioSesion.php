<?php
session_start();
require "../Model/conexion.php";

$pass = $_POST['pass'];
$user = $_POST['usuario'];
$sql = "SELECT * FROM usuarios WHERE correo = '$user'";
$resultado = $conexion->query($sql);
$existe=$resultado->num_rows;////num_rows contiene el numero de resultados obtenidos de la consulta sql

if ($existe>0){////si existe un registro en la base de datos con el usuario ingresado
    while($row = $resultado->fetch_array()){
        ///guardar algunos datos en variables que pueden servir para validaciones 
        $usuario_db = $row['correo'];
        $password_db = $row['password'];
        $rol = $row['rol'];
        $id = $row['idUsuario'];
        
    }
////////////Verificar si la contraseña es la correcta
    if ($user == $usuario_db && $password_db == $pass) {
        $_SESSION['usuario']=$user;
        $_SESSION['pass']=$pass;
        $_SESSION['rol']=$rol;
        $_SESSION['id']=$id;
        echo $rol.'  '.$_SESSION['usuario'].' '.$_SESSION['pass'].' '.$_SESSION['id'];
        if($rol==1){////Si es un administrador lo enviamos a un menu diferente
            header('Location: ../admin/index.php');
            exit();
        }elseif ($rol==2) {
            # code...Es un usuario cliente le mostramos los productos
            header('Location: ../clientes/index.php');
            exit();
        }
        //header('Location: homestudent.php?mensaje=loginsuccess');
        exit();
    } else {
        header('Location: ../index.php?errorlogin=1');///enviamos un mendaje si la contraseña es incorrecta
        exit();
    }
}else {
    ///////el usuario ingresado no está registrado
    header('Location: ../index.php?errorlogin=2');
}
mysqli_close($conexion);  // Cierra la conexion
?>
