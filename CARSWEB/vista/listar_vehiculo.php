<?php
include_once '../modelo/VehiculoDAO.php';

// Establece el título de la página
$page_title = "Veh&iacute;culos";
include_once "layout_header.php"; //header
?>
<script src="../Scripts/js_vehiculo.js" type="text/javascript"></script>

<!--Visualiza título de la página -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item " aria-current="page"><h4><?php echo $page_title ?></h4></li>
    </ol>
</nav>
<!--botones-->
<div style="padding-left: 10px;">
    <!-- Button agregar -->
    <button type="button" class="btn btn-outline-success"  data-toggle="modal" data-target="#modalAgregarVehiculo">
        Agregar Veh&iacute;culo
    </button>
    <!-- Button reporte -->
    <button type="button" class="btn btn-outline-warning glyphicon glyphicon-file">
       Crear Reporte
    </button>
</div>
<div>
    <br>
    <!-- Modal Agregar Vehiculo-->
    <div class="modal fade" id="modalAgregarVehiculo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="color: white; background-color: darkgrey;">
                    <h5 class="modal-title" id="exampleModalLongTitle">Veh&iacute;culo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
               <form id='frmVehiculo'>
                <div class="modal-body">
                        <input type="text" id="idVehiculo" class="hidden" />
                        <table class='table table-hover'>
                            <tr>
                                <td>Marca</td>
                                <td><div class="form-group"><input type='text' name='marca' id='marca' class="form-control" placeholder="Marca del Vehículo" title="Se nece" required></div></td>
                            </tr>
                            <tr>
                                <td>Modelo</td>
                                <td><div class="form-group"><input type='number' name='modelo' id='modelo' class="form-control" placeholder="Modelo del Vehículo" required></div></td>
                            </tr>
                            <tr>
                                <td>Color</td>
                                <td><div class="form-group"><input type='text' name='color' id='color' class="form-control" placeholder="Color del Vehículo" required></div></td>
                            </tr>
                            <tr>
                                <td>Descripci&oacute;n</td>
                                <td><div class="form-group"><textarea class="form-control" rows="3" name='descripcion' id='descripcion' placeholder="Descripción del Vehículo" required></textarea></div></td>
                            </tr>
                            <tr>
                                <td>Tipo Veh&iacute;culo</td>
                                <td><div class="form-group"><SELECT name="idTipoV" id="idTipoV" class="form-control" required> 
                                        <OPTION >Selecciona una opci&oacute;n</OPTION>
                                        <OPTION VALUE="2">Carro</OPTION>
                                        <OPTION VALUE="3">Camioneta</OPTION>
                                        </SELECT></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Precio</td>
                                <td><div class="form-group"><input type='text' name='precio' id='precio' class="form-control" pattern="[0-9]{2}"></div></td>
                            </tr>
                            <tr>
                                <td>Estado</td>
                                <td><div class="form-group"><input type='checkbox' name='estado' id='estado' class="form-check-input" checked></div></td>
                            </tr>
                        </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary" name='enviar' id='enviar'  onclick="javascript:llamarValidarVehiculo();"style="background-color:#069026f0;">Agregar</button>
                </div>
               </form>
            </div>
        </div>
    </div>
    <!-- MODAL ELIMINAR -->
    <div class="modal fade" id="modalEliminarVehiculo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="color: white; background-color: darkgrey;">
                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Vehículo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4> <label>¿Está seguro de eliminar el Vehículo?</label></h4>         
                    <input type="text" id="htxtiIdRegistroEliminar" class="" />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="buton" class="btn btn-primary" name='enviar' id='enviar' onclick="javascript:obtenerIdEliminar();" style="background-color:#069026f0;">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin dialog confirmar eliminar -->
    </div>
</div>
<?php
$VDAO = new VehiculoDAO();
$VDAO->gridHtml();
include_once "layout_footer.php"; //footer
?>


