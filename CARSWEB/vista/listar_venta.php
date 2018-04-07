<?php
include_once '../modelo/VentaDAO.php';

// Establece el título de la página
$page_title = "Ventas";
include_once "layout_header.php"; //header
?>
<!--js venta-->
<script src="../Scripts/js_venta.js" type="text/javascript"></script>

<!--Visualiza título de la página -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item " aria-current="page"><h4><?php echo $page_title ?></h4></li>
    </ol>
</nav>

<!--boton agregar-->
<div style="padding-left: 10px;">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalAgregarVentas">
        Agregar Venta
    </button>
</div>
<div>
    <br>
    <!-- Modal Agregar Ventas-->
    <div class="modal fade" id="modalAgregarVentas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="color: white; background-color: darkgrey;">
                    <h5 class="modal-title" id="exampleModalLongTitle">Venta</h5>
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
                                <td>Fecha</td>
                                <td><input type='date' name='fecha' id='fecha' class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Vendedor</td>
                                <td><SELECT class="form-control"> 
                                        <OPTION VALUE="1">Selecciona una opci&oacute;n</OPTION>
                                        <OPTION VALUE="1">Jose Carlos Gonzalez</OPTION>
                                        <OPTION VALUE="2">David Arriaga</OPTION>
                                    </SELECT>
                                </td>
                            </tr>
                            <tr>
                                <td>Descripci&oacute;n de Venta</td>
                                <td><textarea class="form-control" rows="3" name='descripcionVenta' id='descripcionVenta' ></textarea></td>
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
                    <button type="button" class="btn btn-primary" name='enviar' id='enviar' onclick="javascript:llamarValidarVenta();" style="background-color:#069026f0;">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL ELIMINAR -->
    <div class="modal fade" id="modalEliminarVenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="color: white; background-color: darkgrey;">
                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Venta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4> <label>¿Está seguro de eliminar la Venta?</label></h4>         
                    <input type="text" id="htxtiIdRegistroEliminarV" class="" />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="buton" class="btn btn-primary" name='enviar' id='enviar' onclick="javascript:obtenerIdEliminarV();" style="background-color:#069026f0;">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin dialog confirmar eliminar -->
    </div>
<?php
$VDAO = new VentaDAO();
$VDAO->gridHtml();
include_once "layout_footer.php"; //footer
?>

