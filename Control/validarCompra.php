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
print_r($resultadoProducto);
while($row = $resultadoProducto->fetch_array()){
    $precio = $row['precio'];
    $cantidadInventario=$row['cantidad'];
}
echo 'idcli '.$idCliente.' idprod '.$idProducto.' cantCom'.$cantidadCompra.' precio '.$precio.' cantHabia '.$cantidadInventario;
if($cantidadInventario < $cantidadCompra){
    header("location:../clientes/productos.php?error=1");//No hay suficientes
}else{
    $cantidadInv=$cantidadInventario-$cantidadCompra;
    $valorEnvio=1000;
    $valorTotal=$valorEnvio+($cantidadCompra*$precio);

    
    $registrar="INSERT INTO `compras`(`idPoductoCompra`, `idClienteCompra`, `cantidadCompra`, `Total`) VALUES ('$idProducto','$idCliente','$cantidadCompra','$valorTotal');";
    $resultadoRegistro=$conexion->query($registrar);
    // print_r($resultadoRegistro);
    if($resultadoRegistro){
        //     
    //   echo 'SIIIIIIIIII';
      $modificar="UPDATE productos SET cantidad='$cantidadInv' WHERE idProd = '$idProducto'";
      $resultado=$conexion->query($modificar);
      header("location:../clientes/misCompras.php?registro=1");///registro exitoso
    }
    else{
     header("location:../clientes/misCompras.php?error=2");//
    }
}
// echo '<br>total a pagar'.$valorTotal;


mysqli_close($conexion);  // Cierra la conexion

?>