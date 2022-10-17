<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
}
require "../Model/conexion.php";
include 'encabezado.php';

$user=$_SESSION['usuario'];

$sql="select * from usuarios, productos, compras where (productos.idProd=compras.idPoductoCompra) AND (usuarios.idUsuario=compras.idClienteCompra)";	
$resultado=$conexion->query($sql);

 ?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="cart-header text-center bg-primary">
            <br>
            
            <h2 class="text-white">Todas las Compras registradas</h2>
            
            <hr>
            <p class="text-light">Registros hasta el momento</p>
        </div>
        
                
        <div class="card-body checkout_details_area">
            <div class="table-responsive">

                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                    <thead>
                    <th class="text-center">Id compra</th>
                    <th class="text-center">Id cliente</th>
                        <th class="text-center">Nombres</th>
                        <th class="text-center">Celular</th>
                        <th class="text-center">Producto</th>
                        <th class="text-center">Precio(Unidad)</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Categoría</th>
                        <th class="text-center">Valor</th>
                        <th class="text-center">FechaCompra</th>

                    </thead>
                    <tbody>
                        <?php
                            while($row = $resultado->fetch_array()){
                                ///guardar algunos datos en variables que pueden servir para validaciones                                 
                                $id = $row['idCompra'];
                                $idCliente = $row['identificacion'];
                                $nombreCliente = $row['nombres'].' '.$row['apellidos'];
                                $celular = $row['celular'];
                                $nombre = $row['nombre'];
                                $precio = $row['precio'];
                                $cantidad = $row['cantidadCompra'];
                                $categoria = $row['idCategoria'];
                                if($categoria==1) $tipoProducto='Cabello';
                                if($categoria==2) $tipoProducto='Labios';
                                if($categoria==3) $tipoProducto='Ojos';
                                if($categoria==4) $tipoProducto='Rostro';  
                                $Total = $row['Total'];
                                $fechaCompra = $row['fechaCompra'];
                        ?>
                        <tr>
                        <td>
                                <?php echo $id; ?>
                            </td><td>
                                <?php echo $idCliente; ?>
                            </td>
                            <td>
                                <?php echo $nombreCliente; ?>
                            </td>
                            <td>
                                <?php echo $celular; ?>
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
                            <td><?php echo $tipoProducto; ?></td>
                            <td><?php echo $Total; ?></td>
                            <td><?php echo $fechaCompra; ?></td>
                  
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>



            <hr>
        </div>
        


    </div>
</div>

<?php
mysqli_close($conexion);  // Cierra la conexion
include '../footer.php'?>