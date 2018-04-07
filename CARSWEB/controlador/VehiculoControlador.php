<?php
include_once '../modelo/VehiculoDAO.php';
//Recibe los datos que manda el js
$action = null;
if (isset($_POST["action"]) && !empty($_POST["action"])) { //Revisa si existe el valor action 
    $action = $_POST["action"];
   }

$action and $action != ""?call_user_func($action, array()):"";

//Eliminar datos
function delete(){
    
    $key =$_POST['idVehiculo'];
    
    $VDAO = new VehiculoDAO();
  
    $VDAO->setIdVehiculo( $key);
    
    $Mensaje="";
    $VDAO->delete($key);
    $Resultado = $VDAO->getIdVehiculo();
   
        if ($Resultado ==true) {
            $Respuesta=1;
            $Mensaje='Vehiculo eliminado exitosamente.';
        } else  if ($Resultado ==false) {
            $Respuesta=2;
            $Mensaje='No es posible eliminar el Vehiculo.';
        }
    
        $arrRespuesta = Array("Resultado" => $Respuesta,"Mensaje" => $Mensaje);
        echo json_encode($arrRespuesta);

}


//consultar datos
function readId(){
    $idVehiculo =$_POST['idVehiculo'];
    $VDAO = new VehiculoDAO();
  
    $VDAO->setIdVehiculo($idVehiculo);
    
    $Mensaje="";
    $VDAO->readId();
    $Resultado = $VDAO->getIdVehiculo();
        
    if ($Resultado != NULL) {
        $Respuesta=1;
        $Mensaje='Datos guardados.';
    } else  if ($Resultado == NULL) {
        $Respuesta=2;
        $Mensaje='Datos no guardados.';
    }
    
    $marca = $VDAO->getMarca();
    $modelo = $VDAO->getModelo();
    $color =$VDAO->getColor() ;
    $descripcion =$VDAO->getDescripcion() ;
    $idTipoAuto = $VDAO->getIdTipoAuto();
    $precio = $VDAO->getPrecio();
    $estado = $VDAO->getEstado();
    $id = $VDAO->getIdVehiculo();
       
    $arrDatos =Array("marca" => $marca, "modelo" => $modelo,"color" => $color, "descripcion" => $descripcion, 
        "idTipoAuto" => $idTipoAuto, "precio" => $precio, "estado" => $estado, "idVehiculo" => $id);
    
    $arrRespuesta = Array("Resultado" => $Respuesta,"Mensaje" => $Mensaje, "arrDatos" => $arrDatos);
    echo json_encode($arrRespuesta );
    

}

function insert(){
   
    // Obtiene la conexión hacia la base de datos
    $VDAO = new VehiculoDAO();
    
    $idVehiculo=$_POST['idVehiculo'];
    $marca=$_POST['marca'];
    $modelo=$_POST['modelo'];
    $color=$_POST['color'];
    $descripcion=$_POST['descripcion'];
    $idTipoV=$_POST['idTipoV'];
    $precio=$_POST['precio'];
    $estado=$_POST['estado'];
    
    $VDAO->setIdVehiculo($idVehiculo);
    $VDAO->setMarca($marca);
    $VDAO->setModelo($modelo);
    $VDAO->setColor($color);
    $VDAO->setDescripcion($descripcion);
    $VDAO->setIdTipoAuto($idTipoV);
    $VDAO->setPrecio($precio);
    $VDAO->setEstado($estado);
    
   
    if($idVehiculo != ""){//Editar
        
            $Accion = 2;     
            $Mensaje="";
            $Resultado= $VDAO->update();
           
            if ($Resultado=true) {
                $Respuesta=1;
                $Mensaje='Vehiculo modificado exitosamente.';
            } else  if ($Resultado=false) {
                $Respuesta=2;
                $Mensaje='No es posible modificar el Vehiculo.';
            }


            $arrRespuesta = Array("Resultado" => $Respuesta,"Mensaje" => $Mensaje,"Accion" => $Accion);
            echo json_encode($arrRespuesta);
    } else {
       // echo 'insertar';
        $Accion = 2;
        $Mensaje="";
        $Resultado= $VDAO->insert();
    
        //echo $Resultado;
        if ($Resultado=true) {
            $Respuesta=1;
            $Mensaje='Vehiculo agregado exitosamente.';
        } else  if ($Resultado=false) {
            $Respuesta=2;
            $Mensaje='No es posible agregar el Vehiculo.';
        }
    
    
        $arrRespuesta = Array("Resultado" => $Respuesta,"Mensaje" => $Mensaje, "Accion" => $Accion);
        echo json_encode($arrRespuesta);
        }
}
?>
