<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Cliente-Tienda de Cosméticos</title>



    <!-- Responsive CSS -->
    <link href="../css/responsive.css" rel="stylesheet">
    <!-- Favicon  -->
    <link rel="icon" href="../img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="../css/core-style.css">
    <link rel="stylesheet" href="../css/styles.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!--cdn incons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body background="../img/fondo.webp">


    <div id="wrapper">

        <!-- ****** Header Area Start ****** -->
        <header class="header_area bg-img background-overlay-white"
            style="background-image: url(../img/bg-img/bg-1.jpg);">
            <!-- Top Header Area Start -->
            <div class="top_header_area">
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-end">

                        <div class="col-12 col-lg-7">
                            <div class="top_single_area d-flex align-items-center">
                                <!-- Logo Area -->
                                <div class="top_logo">
                                    <a href="#"><img src="../img/core-img/logo.png" alt=""></a>
                                </div>
                                <!-- Cart & Menu Area -->
                                <div class="header-cart-menu d-flex align-items-center ml-auto">
                                    <!-- Cart Area -->
                                    <div class="cart">
                                        <a href="#" id="header-cart-btn" target="_blank"><span
                                                class="cart_quantity">2</span> <i class="ti-bag"></i> Usuario</a>
                                        <!-- Cart List Area Start -->
                                        <ul class="cart-list">
                                            <li>
                                                <a href="#" class="image">
                                                    <h6>Opciones</h6>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="info.php" class="btn btn-sm btn-cart">Perfil</a>
                                                <a href="#" data-toggle="modal" data-target="#salir"
                                                    class="btn btn-sm btn-checkout">Cerrar Sesión</a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ****** Quick View Modal Cerrar Sesion ****** -->
            <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

                    <div class="modal-content">
                        <div class="modal-header  bg-danger">
                            <h5 class="modal-title text-light" id="exampleModalLabel">¿Seguro quieres cerrar Sesión?
                            </h5>
                            <button class="close bg-light" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="quickview_body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-lg-5">
                                            <button class="btn btn-secondary" type="button"
                                                data-dismiss="modal">Cancel</button>
                                            <a class="btn btn-danger" href="../salir.php">Salir</a>
                                        </div>
                                        <div class="col-12 col-lg-7">
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
            <!-- ****** Quick View Modal Cerrar Sesion ****** -->


            <!-- Top Header Area End -->
            <div class="main_header_area">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-12 d-md-flex justify-content-between">
                            <!-- Header Social Area -->
                            <div class="header-social-area">
                                <a href="#"><span class="karl-level">Share</span> <i class="fa fa-pinterest"
                                        aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                            <!-- Menu Area -->
                            <div class="main-menu-area">
                                <nav class="navbar navbar-expand-lg align-items-start">

                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#karl-navbar" aria-controls="karl-navbar" aria-expanded="false"
                                        aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i
                                                class="ti-menu"></i></span></button>

                                    <div class="collapse navbar-collapse align-items-start collapse" id="karl-navbar">
                                        <ul class="navbar-nav animated" id="nav">
                                            <li class="nav-item active"><a class="nav-link" href="index.php">Home</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="karlDropdown"
                                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">Mirar por categorías</a>
                                                <div class="dropdown-menu" aria-labelledby="karlDropdown">
                                                    <a class="dropdown-item" href="productosCabello.php">Para el
                                                        cabello</a>
                                                    <a class="dropdown-item" href="productosLabios.php">Para los
                                                        labios</a>
                                                    <a class="dropdown-item" href="productosOjos.php">Para los
                                                        ojos</a>
                                                    <a class="dropdown-item" href="productosRostro.php">Para el
                                                        rostro</a>

                                                </div>
                                            </li>

                                            <li class="nav-item"><a class="nav-link" href="productos.php">Mostrar
                                                    todos</a></li>

                                            <li class="nav-item"><a class="nav-link" href="misCompras.php">Listar
                                                    Compras</a></li>

                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <!-- Help Line -->
                            <div class="help-line">
                                <a href=""><i class="ti-headphone-alt"></i> 3011234567</a>
                            </div>
                            <div class="help-line">
                                <a href="#" data-toggle="modal" data-target="#quickview"><i
                                        class="fas fa-fw fa-user"></i> Cerrar Sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ****** Header Area End ****** -->
 