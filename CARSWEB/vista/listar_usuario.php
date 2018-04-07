<?php
include_once '../configuracion/Database.php';

// Obtiene la conexión hacia la base de datos
$database = new Database();
$db = $database->getConexion();
//$auto = new Autos($db);

// Establece el título de la página
$page_title = "Usuarios";
include_once "layout_header.php"; //header
?>
<!—Visualiza título de la página -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item " aria-current="page"><h4><?php echo $page_title ?></h4></li>
  </ol>
</nav>

<?php
////Vía método POST
//if ($_POST) {
////Llena el objeto $auto con los parámetros enviados
//    $auto->marca = $_POST['marca'];
//    $auto->version = $_POST['version'];
//    $auto->modelo = $_POST['modelo'];
//    $auto->color = $_POST['color'];
//    $auto->sistemaDeFrenos = $_POST['sistemaDeFrenos'];
//    $auto->puertas = $_POST['puertas'];
//    $auto->ruedas = $_POST['ruedas'];
//    if (isset($_POST['tipoVelocidad'])) {
//        $auto->tipoVelocidad = 1;
//    } else {
//        $auto->tipoVelocidad = 0;
//    }
//    if (isset($_POST['estilo'])) {
//        $auto->estilo = 1;
//    } else {
//        $auto->estilo = 0;
//    }
//    if (isset($_POST['bolsasAire'])) {
//        $auto->bolsasAire = 1;
//    } else {
//        $auto->bolsasAire = 0;
//    }
//    if (isset($_POST['estado'])) {
//        $auto->estado = 1;
//    } else {
//        $auto->estado = 0;
//    }
//    if ($auto->insert()) {
//        echo "<div class='alert alert-success'>Entidad agregada exitosamente.</div>";
//    } else {
//        echo "<div class='alert alert-danger'>No es posible agregar la entidad.</div>";
//    }
//}
?>
<div style="padding-left: 10px;">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalAgregarUsuario">
        Agregar Usuario
    </button>
</div>
<div>
    <!-- Modal Agregar Usuario-->
    <div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action='' method='POST'>
                        <table class='table table-hover'>
                            <tr>
                                <td>Nombre</td>
                                <td><input type='text' name='nombre' id='nombre' class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Apellido Paterno</td>
                                <td><input type='text' name='apellidoP' id='apellidoP' class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Apellido Materno</td>
                                <td><input type='text' name='apellidoM' id='apellidoM' class="form-control"></td>
                            </tr>
                            <tr>
                                <td>email</td>
                                <td><input type='text' name='email' id='email' class="form-control"></td>
                            </tr>
                            <tr>
                                <td>contraseña</td>
                                <td><input type='text' name='contrasenia' id='contrasenia' class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Tipo Usuario</td>
                                <td><SELECT class="form-control"> 
                                        <OPTION VALUE="1">Selecciona una opci&oacute;n</OPTION>
                                        <OPTION VALUE="1">Administrador</OPTION>
                                        <OPTION VALUE="2">Vendedor</OPTION>
                                        <OPTION VALUE="3">Comprador</OPTION>
                                    </SELECT>
                                </td>
                            </tr>
                            <tr>
                                <td>Estado</td>
                                <td><input type='checkbox' name='estado' id='estado' class="form-check-input" checked></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" name='enviar' id='enviar'>Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div
</div>
<?php
include_once "layout_footer.php"; //footer
?>


