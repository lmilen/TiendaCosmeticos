<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
}
require "../Model/conexion.php";
include 'encabezado.php';

$user=$_SESSION['usuario'];

$sql = "SELECT * FROM productos";
$resultado = $conexion->query($sql);
$existe=$resultado->num_rows;////num_rows contiene el numero de resultados obtenidos de la consulta sql



 ?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="cart-header text-center bg-primary">
            <br>
            <h2 class="text-white">Todos los Productos</h2>
            <hr>
            <p class="text-light">Registros hasta el momento</p>
        </div>
        <?php
            if (isset($_GET['eliminar']) and $_GET['eliminar'] == 1) {//eliminacion exitoso
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Se eliminó el producto!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>
        <?php
            if (isset($_GET['erroreliminar']) and $_GET['erroreliminar'] == 1) {//eliminacion fallo
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>NO Se eliminó el producto!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>
        <?php
            if (isset($_GET['registro']) and $_GET['registro'] == 1) {//registro exitoso
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Se ha registrado producto!</strong>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>
        <div class="card-body checkout_details_area">
            <div class="table-responsive">

                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                    <thead>
                        <th class="text-center">Id</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Descripcion</th>
                        <th class="text-center">Categoría</th>
                        <th class="text-center" colspan="2">Acciones</th>
                    </thead>
                    <tbody>
                        <?php
                        if ($existe>0){////si existe un registro en la base de datos con el usuario ingresado
                            while($row = $resultado->fetch_array()){
                                ///guardar algunos datos en variables que pueden servir para validaciones 
                                $precio = $row['precio'];
                                $cantidad = $row['cantidad'];
                                $categoria = $row['idCategoria'];
                                $descripcion = $row['descripcion'];
                                $nombre = $row['nombre'];
                                // $imagen = $row['imagen'];
                                $id = $row['idProd'];
                                if($categoria==1) $tipoProducto='Cabello';
                                if($categoria==2) $tipoProducto='Labios';
                                if($categoria==3) $tipoProducto='Ojos';
                                if($categoria==4) $tipoProducto='Rostro';        
                    ?>
                        <tr>
                            <td>
                                <?php echo $id; ?>
                            </td>
                            <td>
                                <?php echo $nombre; ?>
                            </td>
                            <td>
                                <?php echo $precio; ?>
                            </td>
                            <td>
                                <?php echo $cantidad; ?>
                            </td>
                            <td>
                                <?php echo $descripcion; ?>
                            </td>
                            <td>
                                <?php echo $tipoProducto; ?>
                            </td>

                            <td><a class="text-success" href="editarProducto.php?id=<?php echo $id; ?>"><i class="bi bi-pencil-square"></i>Modificar</a>
                            </td>
                            <td><a onclick="return confirm('¿Estas Seguro de eliminar este Producto?')"
                                    class="text-danger" href="../Control/eliminarProducto.php?id=<?php echo $id; ?>"><i
                                        class="bi bi-trash3-fill">Eliminar</a>
                            </td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="col-12 col-lg-5">
                <div class="single_footer_area">
                    <div class="footer_heading mb-30">
                        <h6>¿Quieres agregar un Nuevo Producto?</h6> <a href="registrarProducto.php"
                            class="btn btn-success">Registrar Producto</a>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>

<?php
mysqli_close($conexion);  // Cierra la conexion
include '../footer.php'?>