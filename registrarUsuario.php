<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Login Tienda Cosmeticos</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="css/styles.css">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!--cdn incons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body background="img/fondo.webp">

    <div class="container">
        <div class="tarjeta card o-hidden border-0 shadow-lg my-5">
            <div class="cart-header text-center">
                <br>
                <h2 class="text-primary">Bienvenidos</h2>
                <hr>
                <p class="text-info">Registrar cuenta</p>
            </div>
            <div class="card-body checkout_details_area">
                <?php
                if (isset($_GET['errorregistro']) and $_GET['errorregistro'] == 1) {
                    ///campos vacios
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>No se pudo registrar tu cuenta!</strong> LLena todos los campos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>
                <?php
                if (isset($_GET['errorregistro']) and $_GET['errorregistro'] == 2) {
                    ///correo no valido
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>No se pudo registrar tu cuenta!</strong>Su correo no es válido.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>
                <?php
                if (isset($_GET['errorregistro']) and $_GET['errorregistro'] == 3) {
                    ///correo ya existe
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>No se pudo registrar tu cuenta!</strong>El correo ingresado ya existe.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>
                <?php
                if (isset($_GET['registro']) and $_GET['registro'] == 1) {//registro exitoso
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Se ha registrado tu cuenta!</strong>Puedes iniciar sesión.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>
                <form method="POST" action="Control/validarRegistrarUsuario.php">
                    <div class="form-group">
                        <label for="login">&nbsp; Usuario - Correo electrónico <span>*</span></label>
                        <input type="text" class="form-control form-control-user"
                            placeholder="Ingrese su correo electrónico" name="login" id="login" required>
                    </div>
                    <div class="form-group">
                        <label for="pass">&nbsp; Contraseña <span>*</span></label>
                        <input type="password" class="form-control form-control-user"
                            placeholder="Ingrese su contraseña" name="pass" id="pass" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">&nbsp; Nombres <span>*</span></label>
                        <input type="text" class="form-control form-control-user" placeholder="Ingrese su nombre"
                            name="nombre" id="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">&nbsp; Apellidos <span>*</span></label>
                        <input type="text" class="form-control form-control-user" placeholder="Ingrese su apellido"
                            name="apellido" id="apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="cc">&nbsp; No de Identificación <span>*</span></label>
                        <input type="number" class="form-control form-control-user"
                            placeholder="Ingrese su número de identificación" name="cc" id="cc" required>
                    </div>
                    <div class="form-group">
                        <label for="celular">&nbsp; Celular <span>*</span></label>
                        <input type="number" class="form-control form-control-user" placeholder="Ingrese su celular"
                            name="celular" id="celular" required>
                    </div>
                    <!-- Si es un cliente el rol es 2 -->
                    <input name="rol" type="hidden" value="2">
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Registrar cuenta</button>
                        </div>
                    </div>
                    <hr>
                </form>
                <div class="col-12 col-lg-5">
                    <div class="single_footer_area">
                        <div class="footer_heading mb-30">
                            <h6>¿Ya tienes una cuenta?</h6> <a href="index.php" class="btn btn-primary">Iniciar
                                Sesión</a>
                        </div>
                    </div>
                </div>
                <hr>
            </div>



        </div>
    </div>

    <?php include 'footer.php'?>