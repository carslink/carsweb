<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $page_title ?></title>

        <!-- Enlace a Bootstrap -->
        <link rel="stylesheet" href="../media/css/bootstrap.min.css">
        <!--Enlace a mi estilo -->
        <link rel="stylesheet" href="../media/css/miestilo.css">
        <link href="../media/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css"/>
<!--        Jquery-->
        <script src="../media/js/jquery-1.11.1.min.js"></script>
        <!--Bootstrap-->
        <script src="../media/js/bootstrap.min.js"></script>
<!--        bootbox library
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>-->
        <script src="../Scripts/bootstrapValidator.min.js" type="text/javascript"></script>
        
    </head>
    <body>
        <div>
            <div class="page-header">
                <h1><?php $page_title ?></h1>
                <div>
                    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                        <a class="navbar-brand" href="principalAdmin.php" style="color:#ffffff">CarsWeb</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-link dropdown-toggle nav-item dropdown" style="padding-left: 40px; color:#f9f6f6a1 ">
                                    <a style="padding-left: 30px;padding-right: 30px; color:#ffffff" class="btn btn-outline-secondary  border border-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Usuarios
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="listar_usuario.php">Mostrar Usiarios</a>
                                    </div>
                                </li>
                                <li class="nav-link dropdown-toggle nav-item dropdown" style="padding-left: 40px; color:#f9f6f6a1">
                                    <a style="padding-left: 30px;padding-right: 30px; color:#ffffff" class="btn btn-outline-secondary border border-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Veh&iacute;culos
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="listar_vehiculo.php">Mostrar Veh&iacute;culo</a>
                                    </div>
                                </li>
                                <li class="nav-link dropdown-toggle nav-item dropdown" style="padding-left: 40px; color:#f9f6f6a1">
                                    <a style="padding-left: 30px;padding-right: 30px; color:#ffffff" class="btn btn-outline-secondary border border-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ofertas
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="listar_oferta.php">Mostrar Oferta</a>
                                    </div>
                                </li>
                                <li class="nav-link dropdown-toggle nav-item dropdown" style="padding-left: 40px; color:#f9f6f6a1">
                                    <a style="padding-left: 30px;padding-right: 30px; color:#ffffff" class="btn btn-outline-secondary border border-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ventas
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="listar_venta.php">Mostrar Venta</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>