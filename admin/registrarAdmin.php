<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
}
require "../Model/conexion.php";
include 'encabezado.php';

 ?>

<div class="container">
        <div class="tarjeta card o-hidden border-0 shadow-lg my-5">
            <div class="cart-header text-center bg-primary">
                <br>
                <h2 class="text-white">Bienvenidos</h2>
                <hr>
                <p class="text-light">Registrar Administrador</p>
            </div>
            <div class="card-body checkout_details_area">
                <?php
                if (isset($_GET['errorregistro']) and $_GET['errorregistro'] == 1) {
                    ///campos vacios
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>No se pudo registrar cuenta!</strong> LLena todos los campos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>
                <?php
                if (isset($_GET['errorregistro']) and $_GET['errorregistro'] == 2) {
                    ///correo no valido
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>No se pudo registrar cuenta!</strong>Correo no es válido.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>
                <?php
                if (isset($_GET['errorregistro']) and $_GET['errorregistro'] == 3) {
                    ///correo ya existe
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>No se pudo registrar cuenta!</strong>El correo ingresado ya existe.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>
                <?php
                if (isset($_GET['registro']) and $_GET['registro'] == 1) {//registro exitoso
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Se ha registrado cuenta!</strong>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>
                <form method="POST" action="../Control/validarRegistrarUsuario.php">
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
                    <input name="rol" type="hidden" value="1">
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Registrar cuenta</button>
                        </div>
                    </div>
                    <hr>
                </form>
                
                <hr>
            </div>



        </div>
    </div>


<?php include '../footer.php'?>