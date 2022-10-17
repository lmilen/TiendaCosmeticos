<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
}
require "../Model/conexion.php";
include 'encabezado.php';

$user=$_SESSION['usuario'];
$idCliente=$_SESSION['id'];

$sql = "SELECT * FROM productos LIMIT 4";
$resultado = $conexion->query($sql);
 ?>

<!-- ****** Welcome Slides Area Start ****** -->
<section class="welcome_area">
    <div class="welcome_slides owl-carousel">
        <!-- Single Slide Start -->
        <div class="single_slide height-800 bg-img background-overlay"
            style="background-image: url(../img/bg-img/bg-1.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="welcome_slide_text">
                            <h6 data-animation="bounceInDown" data-delay="0" data-duration="500ms">* Compra lo mejor en
                                productos de belleza</h6>
                            <h2 data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">Cosmetic Trends</h2>
                            <a href="productos.php" class="btn karl-btn" data-animation="fadeInUp" data-delay="1s"
                                data-duration="500ms">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Slide Start -->
        <div class="single_slide height-800 bg-img background-overlay"
            style="background-image: url(../img/bg-img/bg-4.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="welcome_slide_text">
                            <h6 data-animation="fadeInDown" data-delay="0" data-duration="500ms">* Compra lo mejor en
                                productos de belleza</h6>
                            <h2 data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">Summer Collection
                            </h2>
                            <a href="productos.php" class="btn karl-btn" data-animation="fadeInLeftBig" data-delay="1s"
                                data-duration="500ms">Check Collection</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Slide Start -->
        <div class="single_slide height-800 bg-img background-overlay"
            style="background-image: url(../img/bg-img/bg-2.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="welcome_slide_text">
                            <h6 data-animation="fadeInDown" data-delay="0" data-duration="500ms">* Only today we offer
                                free shipping</h6>
                            <h2 data-animation="bounceInDown" data-delay="500ms" data-duration="500ms">Women Fashion
                            </h2>
                            <a href="productos.php" class="btn karl-btn" data-animation="fadeInRightBig" data-delay="1s"
                                data-duration="500ms">Check Collection</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ****** Welcome Slides Area End ****** -->

<!-- ****** Top Catagory Area Start ****** -->
<section class="top_catagory_area d-md-flex clearfix">
    <!-- Single Catagory -->
    <div class="single_catagory_area d-flex align-items-center bg-img"
        style="background-image: url(../img/bg-img/bg-6.jpg);">
        <div class="catagory-content">
            <h6>Face</h6>
            <h2>Sale 30%</h2>
            <a href="productos.php" class="btn karl-btn">SHOP NOW</a>
        </div>
    </div>
    <!-- Single Catagory -->
    <div class="single_catagory_area d-flex align-items-center bg-img"
        style="background-image: url(../img/bg-img/bg-3.jpg);">
        <div class="catagory-content">
            <h6>in hair products excepting the new collection</h6>
            <h2>Designer</h2>
            <a href="productos.php" class="btn karl-btn">SHOP NOW</a>
        </div>
    </div>
</section>
<!-- ****** Top Catagory Area End ****** -->




<!-- ****** Offer Area Start ****** -->
<section class="offer_area height-700 section_padding_100 bg-img"
    style="background-image: url(../img/bg-img/bg-5.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-end justify-content-end">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="offer-content-area wow fadeInUp" data-wow-delay="1s">
                    <h2>White cream <span class="karl-level">Hot</span></h2>
                    <p>* Free shipping until 25 Dec 2017</p>
                    <div class="offer-product-price">
                        <h3><span class="regular-price">$25.90</span> $15.90</h3>
                    </div>
                    <a href="productos.php" class="btn karl-btn mt-30">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ****** Offer Area End ****** -->
<section class="new_arrivals_area section_padding_100_0 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_heading text-center">

                    <h2 class="text-primary">Mira lo que tenemos para ti</h2>
                    <h6 class="text-secondary">Seleccione el Producto para más info</h6>

                </div>
            </div>
        </div>
    </div>
    <?php
                if (isset($_GET['error']) and $_GET['error'] == 1) {//no hay suficientes
            ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>No hay suficientes productos!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>
    <?php
                if (isset($_GET['error']) and $_GET['error'] == 2) {//error en base de datos
            ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error en base de datos!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>
    <div class="container">
        <div class="row karl-new-arrivals">
            <?php
                while($row = $resultado->fetch_array()){
                                ///guardar algunos datos en variables que pueden servir para validaciones 
                                $precio = $row['precio'];
                                $cantidad = $row['cantidad'];
                                $categoria = $row['idCategoria'];
                                $descripcion = $row['descripcion'];
                                $nombre = $row['nombre'];
                                $imagen = $row['imagen'];
                                $id = $row['idProd'];
                                if($categoria==1) $tipoProducto='Cabello';
                                if($categoria==2) $tipoProducto='Labios';
                                if($categoria==3) $tipoProducto='Ojos';
                                if($categoria==4) $tipoProducto='Rostro';        
                        ?>
            <!-- Single gallery Item Start -->
            <div class="col-12 col-sm-6 col-md-4 single_gallery_item women wow fadeInUpBig" data-wow-delay="0.2s">
                <!-- Product Image -->
                <div class="product-img">
                    <img src="<?php echo $imagen; ?>" alt="<?php echo $imagen; ?>">
                    <div class="product-quicview">
                        <a href="#" data-toggle="modal" data-target="#quickview<?php echo $id; ?>"><i
                                class="ti-plus"></i></a>
                    </div>
                </div>
                <!-- Product Description -->
                <div class="product-description">
                    <h2>
                        <?php echo $nombre; ?> <span class="karl-level">Hot</span>
                    </h2>

                    <h4 class="product-price">Precio: $
                        <?php echo $precio; ?>
                    </h4>
                    <p>Categoría: Para
                        <?php echo $tipoProducto; ?>
                    </p>
                    <?php if($cantidad<=0) { ?>
                    <!-- NO HAY -->
                    <button type="button" name="addtocart" class="cart-submit">Producto Agotado</button>
                    <?php }?>
                </div>
            </div>
            <?php if($cantidad>0) { ?>
            <!-- ****** Quick View Modal Area Start ****** -->
            <div class="modal fade" id="quickview<?php echo $id; ?>" tabindex="-1" role="dialog"
                aria-labelledby="quickview" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <div class="modal-body">
                            <div class="quickview_body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-lg-5">
                                            <div class="quickview_pro_img">
                                                <img src="<?php echo $imagen; ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-7">
                                            <div class="quickview_pro_des">
                                                <h4 class="title">
                                                    <?php echo $nombre; ?>
                                                </h4>
                                                <div class="top_seller_product_rating mb-15">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                                <h5 class="price">$
                                                    <?php echo $precio; ?> <span>Envío $10%</span>
                                                </h5>
                                                <p>Descripcion: <?php echo $descripcion; ?></p>

                                            </div>


                                            <label for="qty">¿Cuantos comprará?</label><br>

                                            <!-- Add to Cart Form -->
                                            <form class="cart" method="post" action="comprar.php">
                                                <input type="hidden" name="idC" value="<?php echo $idCliente; ?>">
                                                <input type="hidden" name="idP" value="<?php echo $id; ?>">

                                                <div class="quantity">
                                                    <input type="number" class="qty-text" id="qty" step="1" min="1"
                                                        max="<?php echo $cantidad; ?>" name="cantidad" value="1">
                                                </div>
                                                <button type="submit" name="addtocart" class="cart-submit">Add to
                                                    cart</button>

                                            </form>


                                            <div class="share_wf mt-30">
                                                <p>Share With Friend</p>
                                                <div class="_icon">
                                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
            <!-- ****** Quick View Modal Area End ****** -->
            <?php } ?>


        </div>
    </div>

</section>
<!-- ****** New Arrivals Area End ****** -->




<?php include '../footer.php'?>