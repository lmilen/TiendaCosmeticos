<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
}
require "../Model/conexion.php";
include 'encabezado.php';
$sql = "SELECT * FROM categoriaproducto";
$resultado = $conexion->query($sql);

 ?>

<div class="container">
        <div class="tarjeta card o-hidden border-0 shadow-lg my-5">
            <div class="cart-header text-center bg-primary">
                <br>
                <h2 class="text-white">Bienvenido</h2>
                <hr>
                <p class="text-light">Registrar Nuevo Producto</p>
            </div>
            <div class="card-body checkout_details_area">
                <?php
                if (isset($_GET['errorregistro']) and $_GET['errorregistro'] == 1) {
                    ///campos vacios
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>No se pudo registrar!</strong> LLena todos los campos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>
                
                <?php
                if (isset($_GET['errorregistro']) and $_GET['errorregistro'] == 4) {
                    ///campos vacios
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>No se pudo registrar!</strong>Error en la base de datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>
                
                <form method="POST" action="../Control/validarRegistrarProducto.php">
                    <div class="form-group">
                        <label for="nombre">&nbsp; Nombre <span>*</span></label>
                        <input type="text" class="form-control form-control-user" placeholder="Ingrese nombre del producto"
                            name="nombre" id="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="cc">&nbsp; Precio $ <span>*</span></label>
                        <input type="number" class="form-control form-control-user"
                            placeholder="Ingrese el precio del producto" name="precio" id="precio" required>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">&nbsp; Cantidad <span>*</span></label>
                        <input type="number" class="form-control form-control-user" placeholder="Cantidad a registrar"
                            name="cantidad" id="cantidad" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">&nbsp; Descripcion <span>*</span></label>
                        <input type="text" class="form-control form-control-user" placeholder="Ingrese una descripcion sobre del producto"
                            name="descripcion" id="descripcion" required>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label text-primary" for="categoria">Categoría</label>
                        <select class="form-control" name="categoria" placeholder="Categoria a registrar">
                        <?php while($row = $resultado->fetch_array()){ ?>
                            <option value="<?php echo $row['idCat']; ?> "><?php echo $row['idCat'].'-'.$row['categoria']; ?></option>
                            
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Registrar producto</button>
                        </div>
                    </div>
                    <hr>
                </form>
                
                <hr>
            </div>



        </div>
    </div>


<?php include '../footer.php'?>