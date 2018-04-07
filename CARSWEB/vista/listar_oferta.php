<?php
include_once '../modelo/OfertasDAO.php';

// Obtiene la conexión hacia la base de datos
$Oferta = new OfertasDAO();

// Establece el título de la página
$page_title = "Ofertas";
include_once "layout_header.php"; //header


?>
<!—Visualiza título de la página -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item " aria-current="page"><h4><?php echo $page_title ?></h4></li>
  </ol>
</nav>
 
<div style="padding-left: 10px;">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalAgregarOfertas">
        Agregar Oferta
    </button>
</div>
<div>


<?php
//TABLA OFERTAS
$Oferta->gridHtml();
//INSERTAR
//Vía método POST
if ($_POST) {
//Llena el objeto $Oferta con los parámetros enviados
    $Oferta->setDescripcionAuto($_POST['descripcionAuto']);
    $Oferta->setPrecio($_POST['precio']);
    $Oferta->setTotal($_POST['total']);
    $Oferta->setDescripcionOferta($_POST['descripcionOferta']);
    $Oferta->setIdVendedor($_POST['idVendedor']);
    if (isset($_POST['estado'])){
        $Oferta->setEstado(TRUE);
    }else{
        $Oferta->setEstado(FALSE);
    }
    if ($Oferta->insert()) {
        echo "<div class='alert alert-success'>Oferta agregada exitosamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>No es posible agregar la Oferta.</div>";
    }
}

//ELIMINAR
// Obtiene el id de la entidad a eliminar
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR:missing ID.');

$Oferta->setIdOferta($id);
$key = $id;

if ($Oferta->delete($key)) {
        echo "<div class='alert alert-success'>Entidad eliminada exitosamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>No es posible eliminar la entidad.</div>";
    }
    
 //EDITAR
$idE = isset($_GET['idE']) ? $_GET['idE'] : die('ERROR:missing ID.');
$Oferta->setId($idE);
$Oferta->readId();

// Procesar la información
//Vía método POST
if ($_POST) {
//Llena el objeto $entidad con los parámetros enviados
    $Oferta->setDescripcionAuto($_POST['descripcionAuto']);
    $Oferta->setPrecio($_POST['precio']);
    $Oferta->setTotal($_POST['total']);
    $Oferta->setDescripcionOferta($_POST['descripcionOferta']);
    $Oferta->setIdVendedor($_POST['idVendedor']);
    if (isset($_POST['estado'])){
        $Oferta->setEstado(1);
    }else{
        $Oferta->setEstado(0);
    }
    if ($Oferta->update()) {
        echo "<div class='alert alert-success'>Oferta modificada exitosamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>No es posible modificar la Oferta.</div>";
    }
}

?>









    
    <!-- Modal Agregar Ofertas-->
    <div class="modal fade" id="modalAgregarOfertas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nueva Oferta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action='' method='POST'>
                        <table class='table table-hover'>
                            <tr>
                                <td>Descripci&oacute;n de Auto</td>
                                <td><textarea class="form-control" rows="3" name='descripcionAuto' id='descripcionAuto' ></textarea></td>
                            </tr>
                            <tr>
                                <td>Precio</td>
                                <td><input type='text' name='precio' id='precio' class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td><input type='text' name='total' id='total' class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Descripci&oacute;n Oferta</td>
                                <td><textarea class="form-control" rows="3" name='descripcionOferta' id='descripcionOferta' ></textarea></td>
                            </tr>
                            <tr>
                                <td>Vendedor</td>
                                <td><SELECT class="form-control" name="idVendedor" id="idVendedor"> 
                                        <OPTION VALUE="1">Selecciona una opci&oacute;n</OPTION>
                                        <OPTION VALUE="1">Jose Carlos Gonzalez</OPTION>
                                        <OPTION VALUE="2">David Arriaga</OPTION>
                                    </SELECT>
                                </td>
                            </tr>
                            <tr>
                                <td>Estado</td>
                                <td><input type='checkbox' name='estado' id='estado' class="form-check-input" checked></td>
                            </tr>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" name='enviar' id='enviar'>Agregar</button>
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
</div
</div>
<!-- Modal Editar Ofertas-->
<div class="modal fade" id="modalModificarOfertas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Editar Oferta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action='' method='POST'>
                    <table class='table table-hover'>
                        <tr>
                            <td>Descripci&oacute;n de Auto</td>
                            <td><textarea class="form-control" rows="3" name='descripcionAuto' id='descripcionAuto' value="<?php echo $Oferta->getDescripcionAuto(); ?>"></textarea></td>
                        </tr>
                        <tr>
                            <td>Precio</td>
                            <td><input type='text' name='precio' id='precio' class="form-control" value="<?php echo $Oferta->getPrecio(); ?>" ></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td><input type='text' name='total' id='total' class="form-control" value="<?php echo $Oferta->getTotal(); ?>"></td>
                        </tr>
                        <tr>
                            <td>Descripci&oacute;n Oferta</td>
                            <td><textarea class="form-control" rows="3" name='descripcionOferta' id='descripcionOferta' value="<?php echo $Oferta->getDescripcionOferta(); ?>"></textarea></td>
                        </tr>
                        <tr>
                            <td>Vendedor</td>
                            <td><SELECT class="form-control" name="idVendedor" id="idVendedor" <script>$("#idVendedor").val(<?php $Oferta->getIdVendedor()?>).change();</script> >
                                    <OPTION VALUE="1">Selecciona una opci&oacute;n</OPTION>
                                    <OPTION VALUE="1">Jose Carlos Gonzalez</OPTION>
                                    <OPTION VALUE="2">David Arriaga</OPTION>
                                </SELECT>
                            </td>
                        </tr>
                        <tr>
                            <td>Estado</td>
                            <td><input type='checkbox' name='estado' id='estado' class="form-check-input" <?php echo ($Oferta->getActivo() == 1) ? 'checked' : '' ?>></td>
                        </tr>
                    </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name='enviar' id='enviar'>Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include_once "layout_footer.php"; //footer
?>


