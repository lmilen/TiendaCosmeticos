<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
}
require "../Model/conexion.php";
include 'encabezado.php';

$id=$_GET['id'];

$sql = "SELECT * FROM productos WHERE idProd = '$id'";
$resultado = $conexion->query($sql);
$existe=$resultado->num_rows;////num_rows contiene el numero de resultados obtenidos de la consulta sql

if ($existe>0){////si existe un registro en la base de datos con el usuario ingresado
    while($row = $resultado->fetch_array()){
        ///guardar algunos datos en variables que pueden servir para validaciones 
        $precio = $row['precio'];
        $cantidad = $row['cantidad'];
        $categoria = $row['idCategoria'];
        $descripcion = $row['descripcion'];
        $nombre = $row['nombre'];
        // $imagen = $row['imagen'];
        if($categoria==1) $tipoProducto='Cabello';
        if($categoria==2) $tipoProducto='Labios';
        if($categoria==3) $tipoProducto='Ojos';
        if($categoria==4) $tipoProducto='Rostro';
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
            <p class="text-light">Modificar Informacion Producto</p>
        </div>
        <?php
                if (isset($_GET['errorregistro']) and $_GET['errorregistro'] == 1) {
                    ///campos vacios
            ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>No se pudo modificar!</strong> LLena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>
        <?php
                if (isset($_GET['errorregistro']) and $_GET['errorregistro'] == 4) {
                    ///correo no valido
            ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>No se pudo modificar!</strong>Error en base de datos
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>

        <div class="card-body checkout_details_area">
            <!-- Le envio tipo=1 porquee es el admin quien esta editando -->
            <form method="POST" action="../Control/validarEditarProducto.php?id=<?php echo $id; ?>">
                <div class="form-group">
                    <label for="nombre">&nbsp; Nombre <span>*</span></label>
                    <input type="text" class="form-control form-control-user" placeholder="Ingrese nombre del producto"
                        name="nombre" id="nombre" value="<?php echo $nombre; ?>">
                </div>
                <div class="form-group">
                    <label for="cc">&nbsp; Precio $ <span>*</span></label>
                    <input type="number" class="form-control form-control-user"
                        placeholder="Ingrese el precio del producto" name="precio" id="precio"
                        value="<?php echo $precio; ?>">
                </div>
                <div class="form-group">
                    <label for="cantidad">&nbsp; Cantidad <span>*</span></label>
                    <input type="number" class="form-control form-control-user" placeholder="Cantidad a registrar"
                        name="cantidad" id="cantidad" value="<?php echo $cantidad; ?>">
                </div>
                <div class="form-group">
                        <label for="descripcion">&nbsp; Descripcion <span>*</span></label>
                        <input type="text" class="form-control form-control-user" placeholder="Ingrese una descripcion sobre del producto"
                            name="descripcion" id="descripcion" value="<?php echo $descripcion; ?>">
                    </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label text-primary" for="categoria">Categoría</label>
                    <select class="form-control" name="categoria" placeholder="Categoria a registrar">
                        <option value="<?php echo $categoria; ?> ">
                            <?php echo $categoria.'-'.$tipoProducto; ?>
                        </option>
                        <option value="1">1-cabello</option>
                        <option value="2">2-labios</option>
                        <option value="3">3-ojos</option>
                        <option value="4">4-rostro</option>


                    </select>
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
                        <h6>¿Quieres agregar un Nuevo Producto?</h6> <a href="registrarProducto.php"
                            class="btn btn-primary">Registra Producto</a>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>

<?php
include '../footer.php'?>