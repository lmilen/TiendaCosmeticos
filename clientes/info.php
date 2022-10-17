<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
}
require "../Model/conexion.php";
include 'encabezado.php';

$user=$_SESSION['id'];
// $user=$_SESSION['usuario'];

$sql = "SELECT * FROM usuarios WHERE idUsuario = '$user'";
$resultado = $conexion->query($sql);
$existe=$resultado->num_rows;////num_rows contiene el numero de resultados obtenidos de la consulta sql

if ($existe>0){////si existe un registro en la base de datos con el usuario ingresado
    while($row = $resultado->fetch_array()){
        ///guardar algunos datos en variables que pueden servir para validaciones 
        $usuario = $row['correo'];
        $password = $row['password'];
        $rol = $row['rol'];
        $nombres = $row['nombres'];
        $apellidos = $row['apellidos'];
        $celular = $row['celular'];
        $identificacion = $row['identificacion'];
        $id = $row['idUsuario'];
        
    }
}
mysqli_close($conexion);  // Cierra la conexion

 ?>
</div>
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="cart-header text-center bg-primary">
            <br>
            <h2 class="text-white">Bienvenido</h2>
            <hr>
            <p class="text-light">Informacion de su cuenta</p>
        </div>
        
                <?php
                if (isset($_GET['erroreliminar']) and $_GET['erroreliminar'] == 1) {//error en eliminar            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>No puedes eliminar tu cuenta!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>
        <div class="card-body checkout_details_area">
            <div class="table-responsive">

                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                    <thead>
                        <th class="text-center">Identificación</th>
                        <th class="text-center">Nombres</th>
                        <th class="text-center">Apellidos</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Celular</th>
                        <th class="text-center">Password</th>
                        <th class="text-center" colspan="2">Opciones</th>

                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $identificacion; ?>
                            </td>
                            <td>
                                <?php echo $nombres; ?>
                            </td>
                            <td>
                                <?php echo $apellidos; ?>
                            </td>
                            <td>
                                <?php echo $usuario; ?>
                            </td>
                            <td>
                                <?php echo $celular; ?>
                            </td>
                            <td>
                                <?php echo $password; ?>
                            </td>
                            <td><a class="text-success" href="editar.php?id=<?php echo $id; ?>"><i class="bi bi-pencil-square"></i>Modificar</a>
                            </td>
                            <td><a onclick="return confirm('¿Estas Seguro de eliminar esta cuenta?')" class="text-danger" href="../Control/eliminarCuenta.php?tipo=2&id=<?php echo $id; ?>"><i class="bi bi-trash3-fill">Eliminar</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>



            <hr>
        </div>
        


    </div>
</div>

<?php include '../footer.php'?>