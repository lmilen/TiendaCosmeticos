<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
}
require "../Model/conexion.php";
include 'encabezado.php';

$user=$_SESSION['usuario'];
$idUser=$_SESSION['id'];

$sql = "SELECT * FROM usuarios";
$resultado = $conexion->query($sql);
$existe=$resultado->num_rows;////num_rows contiene el numero de resultados obtenidos de la consulta sql



 ?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="cart-header text-center bg-primary">
            <br>
            <h2 class="text-white">LISTADO DE USUARIOS</h2>
            <hr>
            <p class="text-light">Registros hasta el momento</p>
        </div>
        <?php
                if (isset($_GET['eliminar']) and $_GET['eliminar'] == 1) {//eliminacion exitoso
            ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Se eliminó la cuenta!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>
        <?php
                if (isset($_GET['erroreliminar']) and $_GET['erroreliminar'] == 1) {//eliminacion fallo
            ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>NO Se eliminó la cuenta!</strong>El usuario tiene compras registradas
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
                        <th class="text-center">ROL</th>
                        <th class="text-center" colspan="2">Acciones</th>

                    </thead>
                    <tbody>
                        <?php
                        if ($existe>0){////si existe un registro en la base de datos
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
                                if($rol==1) $tipoUser='Administrador';
                                if($rol==2) $tipoUser='Cliente';
                                
                        ?>
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
                                <?php echo $tipoUser; ?>

                            </td>
                            
                            <td><a class="text-success" href="editar.php?id=<?php echo $id; ?>"><i
                                        class="bi bi-pencil-square"></i>Modificar</a>
                            </td>
                            <?php if($id != $idUser){ ?>
                            <td><a onclick="return confirm('¿Estas Seguro de eliminar esta cuenta?')"
                                    class="text-danger" href="../Control/eliminarUsuario.php?id=<?php echo $id; ?>"><i
                                        class="bi bi-trash3-fill">Eliminar</a></td>
                            <?php } ?>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="col-12 col-lg-5">
                <div class="single_footer_area">
                    <div class="footer_heading mb-30">
                        <h6>¿Quieres agregar un Administrador?</h6> <a href="registrarAdmin.php"
                            class="btn btn-primary">Registra Nuevo Admin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
mysqli_close($conexion);  // Cierra la conexion
include '../footer.php'?>