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
                        <a class="navbar-brand" href="paginaPrincipal.php" style="color:#ffffff">CarsWeb</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-link dropdown-toggle nav-item dropdown" style="padding-left: 40px; color:#f9f6f6a1">
                                    <a style="padding-left: 30px;padding-right: 30px; color:#ffffff" class="btn btn-outline-secondary border border-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Veh&iacute;culos
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="catalogo_vehiculos.php">Mostrar Veh&iacute;culos</a>
                                    </div>
                                </li>
                                <li class="nav-link dropdown-toggle nav-item dropdown" style="padding-left: 40px; color:#f9f6f6a1">
                                    <a style="padding-left: 30px;padding-right: 30px; color:#ffffff" class="btn btn-outline-secondary border border-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ofertas
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="catalogo_ofertas.php">Mostrar Ofertas</a>
                                    </div>
                                </li>
                                <li style="padding-left: 615px;padding-top: 8px;">
                                    <button type="button" class="btn btn-outline-light" data-toggle='modal' data-target='#modalLogin' style="border-color: gray;">Login</button>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- MODAL login -->
            <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="color: white; background-color: darkgrey;">
                            <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail2">Correo Electronic&oacute;</label>
                                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputPassword2">Contraseña</label>
                                    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                    <div class="help-block text-right"><a href="">¿Olvidaste tu contraseña?</a></div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block" style="background-color: cadetblue;">Iniciar Sessi&oacute;n</button>
                                </div>
                                <div style="padding-right: 50px;">
                                        <div class="help-block text-right"><a href="">Registrarse</a></div>
                                </div>
                                <div class="checkbox" style="padding-right: 280px;">
                                    <label>
                                        <input type="checkbox" style="color: gray;"> ¿Recordar cuenta?
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                 