<?php

include_once '../configuracion/DAO.php';
include_once '../configuracion/Database.php';


/**
 * Description of VentaDAO
 *Clase que que permite realizar más específicamente los métodos heredados de la clase DAO
 * @version 1.0
 * @author Carlos_Arriaga
 */
class VentaDAO extends DAO {

    //Variables 
    private $tabla = 'vehiculo';//nombre de tabla 
    //Propiedades de la entidad
    private $idVehiculo;//id del vehiculo
    private $marca;//marca del vehiculo
    private $modelo;//modelo del vehiculo
    private $color;//color del vehiculo
    private $descripcion;//descripción del vehiculo
    private $idTipoAuto;//tipo de vehiculo
    private $precio;//precio de vehiculo
    private $estado;//estatus de vehiculo

    //Métodos Getter y Setters
    function getTabla() {
        return $this->tabla;
    }

    function getIdVehiculo() {
        return $this->idVehiculo;
    }

    function getMarca() {
        return $this->marca;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getColor() {
        return $this->color;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getIdTipoAuto() {
        return $this->idTipoAuto;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getEstado() {
        return $this->estado;
    }

    function setTabla($tabla) {
        $this->tabla = $tabla;
    }

    function setIdVehiculo($idVehiculo) {
        $this->idVehiculo = $idVehiculo;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setIdTipoAuto($idTipoAuto) {
        $this->idTipoAuto = $idTipoAuto;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    public function __construct() {
        
    }

    /*
     * Método que permite consultar los datos de la tabla 
     */
    public function read($value = NULL, $key = NULL) {

        $sql = NULL;
        if (is_null($key)) {
            $sql = "SELECT * FROM " . $this->tabla;
        } else {
            $key = $this->primaryKey;
            $sql = "SELECT * FROM " . $this->tabla . " WHERE {$key}='{$value}'";
        }
        
        $stmt = $this->con->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    /*
     * Método que permite insertar datos en la tabla.
     */
    public function insert() {
        
        if ($this->con == NULL) {
            $instance = Database::getInstance(); //Única instancia
            $this->con = $instance->getConexion(); //Extrae conexión
        }
        
        $campos = array(
    
            ':marca' => $this->marca,
            ':modelo' => $this->modelo,
            ':color' => $this->color,
            ':descripcion' => $this->descripcion,
            ':idTipoAuto' => $this->idTipoAuto,
            ':precio' => $this->precio,
            ':estado' => $this->estado
        );
        $insert = 'INSERT INTO ' . $this->tabla .
                ' (marca, modelo, color, descripcion, idTipoAuto, precio, estado ) VALUES ' .
                " (:marca, :modelo, :color, :descripcion, :idTipoAuto, :precio, :estado)";

        $stmt = $this->con->prepare($insert);

        if ($stmt->execute($campos)) {
            return true;
            echo 'inserto con exito';
        } else {
            return false;
            echo 'no inserto';
        }
    }
    
    /*
     * Método que permite modificar datos en la tabla.
     */
    public function update(){
        if ($this->con == NULL) {
            $instance = Database::getInstance(); //Única instancia
            $this->con = $instance->getConexion(); //Extrae conexión
        }
        
        $sql = "UPDATE " . $this->tabla . " SET ";
        $sql .= " marca=:marca, modelo=:modelo, color=:color, descripcion=:descripcion, idTipoAuto=:idTipoAuto, precio=:precio, estado=:estado"
                . " where idVehiculo= $this->idVehiculo";
        
        $campos = array(
            ':marca' => $this->marca,
            ':modelo' => $this->modelo,
            ':color' => $this->color,
            ':descripcion' => $this->descripcion,
            ':idTipoAuto' => $this->idTipoAuto,
            ':precio' => $this->precio,
            ':estado' => $this->estado
        );
       
        $stmt = $this->con->prepare($sql);
        if ($stmt->execute($campos)){
            return true;
        }else{
            return false;
        }
    }

    /*
     * Método que permite consultar el id en la tabla.
     */
    public function readId(){
        if ($this->con == NULL) {
            $instance = Database::getInstance(); //Única instancia
            $this->con = $instance->getConexion(); //Extrae conexión
        }
        if (is_null($this->getIdVehiculo())){
            exit('Se requiere un valor para el ID');
        } else{
            $sql =" SELECT * FROM " . $this->tabla . " WHERE idVehiculo={$this->getIdVehiculo()}";
        }
       
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        $this->marca = $row['marca'];
        $this->modelo = $row['modelo'];
        $this->color = $row['color'];
        $this->descripcion = $row['descripcion'];
        $this->idTipoAuto = $row['idTipoAuto'];
        $this->precio = $row['precio'];
        $this->estado = $row['estado'];
        $this->idVehiculo = $row['idVehiculo'];
        
    }
    
    
    /*
     * Método que imprime el grid de los registros 
     */
    public function gridHtml() {
        if ($this->con == NULL) {
            $instance = Database::getInstance(); //Única instancia
            $this->con = $instance->getConexion(); //Extrae conexión
        }
        $tableHtml = "<table class='table table-hover'>" .
                "<tr>" .
                "<th>Id</th>" .
                "<th>Marca</th>" .
                "<th>Modelo</th>" .
                "<th>Color</th>" .
                "<th>Descripción</th>" .
                "<th>Tipo de Auto</th>" .
                "<th>Precio</th>" .
                "<th>Estado</th>" .
                "<th>&nbsp;</th>" .
                "<th>&nbsp;</th>" .
                "</tr>";
        
        $registros = $this->read();
        if ($registros->rowCount() > 0) {
            while ($row = $registros->fetch(PDO::FETCH_ASSOC)) {
                $tableHtml = $tableHtml . "<tr>" .
                        "<td>" . $row['idVehiculo'] . "</td>" .
                        "<td>" . $row['marca'] . "</td>" .
                        "<td>" . $row['modelo'] . "</td>" .
                        "<td>" . $row['color'] . "</td>" .
                        "<td>" . $row['descripcion'] . "</td>" .
                        "<td>" . $row['idTipoAuto'] . "</td>" .
                        "<td>" . $row['precio'] . "</td>" .
                        "<td><input type='checkbox' disabled='disabled' ";
                
                if ($row['estado'] == 1) {
                    $tableHtml = $tableHtml . " checked";
                }
                $tableHtml = $tableHtml . "></td>" .
                        "<td><a href='listar_vehiculo.php' class='btn btn-info left-margin' data-toggle='modal' data-target='#modalAgregarVehiculo' onclick='javascript:readId(" . $row['idVehiculo'] . ");'>"
                        . "<span class='glyphicon glyphicon-edit'></span>Editar</a></td>" .
                        "<td><a href='listar_vehiculo.php' class='btn btn-danger delete-object' data-toggle='modal' data-target='#modalEliminarVehiculo' onclick='javascript:IdEliminarVehiculo(" . $row['idVehiculo'] . ");'>"
                        . "<span class='glyphicon glyphicon-remove'></span>Eliminar</a></td>" .
                        "</tr>";
            }
            $tableHtml = $tableHtml . "</table>";
            echo $tableHtml;
        } else {
            echo "<div class='alert alert-warning'>No existen registros de Entidad.</div>";
        }
    }
    
    /*
     * Método que imprime el grid de los registros 
     */
     public function delete( $key = NULL){
         if ($this->con == NULL) {
            $instance = Database::getInstance(); //Única instancia
            $this->con = $instance->getConexion(); //Extrae conexión
        }
        
        if (is_null($key)){
            $key = $this->primaryKey;
        }
        $delete = "DELETE FROM " . $this->tabla .
                " WHERE idVehiculo='$key'";
        $stmt = $this->con->prepare($delete);
        
        if ($stmt->execute()){
            return true;
        }
        return false;
    }
    
    
    public function _toString() {
        return 'Marca=' . $this->marca . 'Modelo' . $this->modelo .
               'Color=' . $this->color . 'Descripcion' . $this->descripcion .
               'IdTipoAuto=' . $this->idTipoAuto . 'Precio' . $this->precio .
               'Estado=' . $this->estado; 
    }
    
}
