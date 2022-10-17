<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
}
require "../Model/conexion.php";
include 'encabezado.php';

$user=$_GET['id'];

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

<div class="container">
    <div class="tarjeta card o-hidden border-0 shadow-lg my-5">
        <div class="cart-header text-center bg-primary">
            <br>
            <h2 class="text-white">Bienvenido</h2>
            <hr>
            <p class="text-light">Modificar Informacion cuenta</p>
        </div>
        <?php
            if (isset($_GET['errorregistro']) and $_GET['errorregistro'] == 1) {
                    ///campos vacios
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>No se pudo modificar cuenta!</strong> LLena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>
        <?php
            if (isset($_GET['errorregistro']) and $_GET['errorregistro'] == 2) {
                ///correo no valido
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>No se pudo modificar cuenta!</strong>Su correo no es válido.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>

        <div class="card-body checkout_details_area">
            <!-- Le envio tipo=1 porquee es el admin quien esta editando -->
            <form method="POST" action="../Control/validarEditar.php?tipo=1&id=<?php echo $id; ?>">
                <div class="form-group">
                    <label for="login">&nbsp; Usuario - Correo electrónico <span>*</span></label>
                    <input type="text" class="form-control form-control-user"
                        placeholder="Ingrese su correo electrónico" name="login" id="login"
                        value="<?php echo $usuario; ?>">
                </div>
                <div class="form-group">
                    <label for="pass">&nbsp; Contraseña <span>*</span></label>
                    <input type="password" class="form-control form-control-user" placeholder="Ingrese su contraseña"
                        name="pass" id="pass" value="<?php echo $password; ?>">
                </div>
                <div class="form-group">
                    <label for="nombre">&nbsp; Nombres <span>*</span></label>
                    <input type="text" class="form-control form-control-user" placeholder="Ingrese su nombre"
                        name="nombre" id="nombre" value="<?php echo $nombres; ?>">
                </div>
                <div class="form-group">
                    <label for="apellido">&nbsp; Apellidos <span>*</span></label>
                    <input type="text" class="form-control form-control-user" placeholder="Ingrese su apellido"
                        name="apellido" id="apellido" value="<?php echo $apellidos; ?>">
                </div>
                <div class="form-group">
                    <label for="cc">&nbsp; No de Identificación <span>*</span></label>
                    <input type="number" class="form-control form-control-user"
                        placeholder="Ingrese su número de identificación" name="cc" id="cc"
                        value="<?php echo $identificacion; ?>">
                </div>
                <div class="form-group">
                    <label for="celular">&nbsp; Celular <span>*</span></label>
                    <input type="number" class="form-control form-control-user" placeholder="Ingrese su celular"
                        name="celular" id="celular" value="<?php echo $celular; ?>">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Modificar Datos</button>
                    </div>
                </div>
                <hr>
            </form>
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

<?php include '../footer.php'?>