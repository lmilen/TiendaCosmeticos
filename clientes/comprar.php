<?php
session_start();
require"../Model/conexion.php";

$idCliente = $_POST['idC'];
$idProducto = $_POST['idP'];

$cantidadCompra = $_POST['cantidad'];

$cliente="SELECT * FROM usuarios WHERE idUsuario='$idCliente'";
$resultadoCliente=$conexion->query($cliente);
while($row = $resultadoCliente->fetch_array()){
    $nombres = $row['nombres'];
    $apellidos = $row['apellidos'];
    $celular = $row['celular'];
}

$producto="SELECT * FROM productos WHERE idProd='$idProducto'";
$resultadoProducto=$conexion->query($producto);
//print_r($resultadoProducto);
while($row = $resultadoProducto->fetch_array()){
    $nombreProducto=$row['nombre'];
    
    $img=$row['imagen'];
    $precio = $row['precio'];
    $cantidadInventario=$row['cantidad'];
}
// echo 'idcli '.$idCliente.' idprod '.$idProducto.' cantCom'.$cantidadCompra.' precio '.$precio.' cantHabia '.$cantidadInventario;
if($cantidadInventario < $cantidadCompra){
    header("location:../clientes/productos.php?error=1");//No hay suficientes
}else{
    //$cantidadInv=$cantidadInventario-$cantidadCompra;
    $valorEnvio=1000;
    $valorTotal=$valorEnvio+($cantidadCompra*$precio);
    // echo 'idcli '.$idCliente.' idprod '.$idProducto.' cantCompra '.$cantidadCompra.' precio '.$precio.' cantHabia '.$cantidadInventario.' valEnv '.$valorEnvio.' total '.$valorTotal;

    include 'encabezado.php';
?>
</div>
<div class="container">

    <div class="tarjeta card o-hidden border-0 shadow-lg my-5">
        <div class="cart-header text-center bg-primary">
            <br>
            <h2 class="text-white">Informcacion de la compra</h2>

            <hr>
            <p class="text-light">Confirma los datos</p>
        </div>


        <div class="card-body checkout_details_area">
            <div class="product-img text-center">

            <img src="<?php echo $img; ?>" style="width: 200px;">
            </div>
            <form method="POST" action="../Control/validarCompra.php">
                <div class="form-group">
                <input type="hidden" name="idC" value="<?php echo $idCliente; ?>">
                <input type="hidden" name="cantidad" value="<?php echo $cantidadCompra; ?>">
                    <input type="hidden" name="idP" value="<?php echo $idProducto; ?>">
                    <label for="nombre">&nbsp; Nombre Cliente: <span>*</span></label>
                    <input type="text" class="form-control form-control-user" name="nombre" id="nombre" disabled
                        value="<?php echo $nombres.' '.$apellidos; ?>">
                </div>
                <div class="form-group">
                    <label for="nombre">&nbsp; Nombre del Producto: <span>*</span></label>
                    <input type="text" class="form-control form-control-user" name="nombre" id="nombre" disabled
                        value="<?php echo $nombreProducto; ?>">
                </div>
                <div class="form-group">
                    <label for="cc">&nbsp; Precio por Unidad $ <span>*</span></label>
                    <input type="number" class="form-control form-control-user"
                        placeholder="Ingrese el precio del producto" name="precio" id="precio"
                        value="<?php echo $precio; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="cantidad">&nbsp; Cantidad a comprar<span>*</span></label>
                    <input type="number" class="form-control form-control-user" placeholder="Cantidad a registrar"
                        name="cantidad" id="cantidad" value="<?php echo $cantidadCompra; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="cc">&nbsp; Precio Envío 10% del total $ <span>*</span></label>
                    <input type="number" class="form-control form-control-user"
                        placeholder="Ingrese el precio del producto" name="precio" id="precio"
                        value="<?php echo $valorEnvio; ?>" disabled>
                </div>
                <hr>
                <div class="form-group">
                    <label for="cc">&nbsp; Precio Total a Pagar $ <span>*</span></label>
                    <input type="number" class="form-control form-control-user"
                        placeholder="Ingrese el precio del producto" name="precio" id="precio"
                        value="<?php echo $valorTotal; ?>" disabled>
                </div>
                <hr>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Confirmar Compra</button>
                    </div>
                </div>
                <hr>
            </form>

            <hr>
        </div>


    </div>
</div>
<?php  
}
mysqli_close($conexion);  // Cierra la conexion
include '../footer.php';
?>