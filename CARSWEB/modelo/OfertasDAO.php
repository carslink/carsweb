 
<?php

include_once '../configuracion/DAO.php';
include_once '../configuracion/Database.php';

/**
 * Description of OfertasDAO
 *
 * @author Carlos_Arriaga
 */
class OfertasDAO extends DAO {

    private $tabla = 'oferta';
    //Propiedades de la Oferta
    private $idOferta;
    private $descripcionAuto;
    private $precio;
    private $total;
    private $estado;
    private $descripcionOferta;
    private $idVendedor;

    //Métodos Getter y Setters
    function getTabla() {
        return $this->tabla;
    }

    function getIdOferta() {
        return $this->idOferta;
    }

    function getDescripcionAuto() {
        return $this->descripcionAuto;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getTotal() {
        return $this->total;
    }

    function getEstado() {
        return $this->estado;
    }

    function getDescripcionOferta() {
        return $this->descripcionOferta;
    }

    function getIdVendedor() {
        return $this->idVendedor;
    }


    function setTabla($tabla) {
        $this->tabla = $tabla;
    }

    function setIdOferta($idOferta) {
        $this->idOferta = $idOferta;
    }

    function setDescripcionAuto($descripcionAuto) {
        $this->descripcionAuto = $descripcionAuto;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setDescripcionOferta($descripcionOferta) {
        $this->descripcionOferta = $descripcionOferta;
    }

    function setIdVendedor($idVendedor) {
        $this->idVendedor = $idVendedor;
    }

    

       

        public function read($value = NULL, $key = NULL) {

        $sql = NULL;
        if (is_null($key)) {
            $sql = "SELECT * FROM " . $this->tabla;
        } else {
            $key = $this->primaryKey;
            $sql = "SELECT * FROM " . $this->tabla . " WHERE {$key}='{$value}'";
        }
        //echo $sql;
        $stmt = $this->con->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function insert() {
        if ($this->con == NULL) {
            $instance = Database::getInstance(); //Única instancia
            $this->con = $instance->getConexion(); //Extrae conexión
        }
        $campos = array(
            ':descripcionAuto' => $this->descripcionAuto,
            ':precio' => $this->precio,
            ':total' => $this->total,
            ':estado' => $this->estado,
            ':descripcionOferta' => $this->descripcionOferta,
            ':idVendedor' => $this->idVendedor
        );
        $insert = 'INSERT INTO ' . $this->tabla .
                ' (descripcionAuto, precio, total, estado, descripcionOferta, idVendedor) ' .
                "  VALUES (:descripcionAuto, :precio, :total, :estado, :descripcionOferta, :idVendedor) ";
              

        $stmt = $this->con->prepare($insert);

        if ($stmt->execute($campos)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function update(){
        $sql = "UPDATE " . $this->tabla . " SET ";
        $sql .= " descripcionAuto=:descripcionAuto, precio=:precio, total=:total, estado=:estado, "
                . " descripcionOferta=:descripcionOferta, idVendedor=:idVendedor "
                . " where id= $this->idOferta";
        
        $campos = array(
            ':descripcionAuto' => $this->descripcionAuto,
            ':precio' => $this->precio,
            ':total' => $this->total,
            ':estado' => $this->estado,
            ':descripcionOferta' => $this->descripcionOferta,
            ':idVendedor' => $this->idVendedor
        );
        
        $stmt = $this->con->prepare($sql);
        if ($stmt->execute($campos)){
            return true;
        }else{
            return false;
        }
    }

    
    public function readId(){
        if ($this->con == NULL) {
            $instance = Database::getInstance(); //Única instancia
            $this->con = $instance->getConexion(); //Extrae conexión
        }
        if (is_null($this->getId())){
            exit('Se requiere un valor para el ID');
        } else{
            $sql =" SELECT * FROM " . $this->tabla . " WHERE id={$this->getId()}";
        }
        
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        
        $this->descripcionAuto = $row['descripcionAuto'];
        $this->precio = $row['precio'];
        $this->total = $row['total'];
        $this->estado = $row['estado'];
        $this->descripcionOferta = $row['descripcionOferta'];
        $this->idVendedor = $row['idVendedor'];
    }
    
    
    /*
     * Método que imprime el grid de los registros de oferta
     */
    public function gridHtml() {
        if ($this->con == NULL) {
            $instance = Database::getInstance(); //Única instancia
            $this->con = $instance->getConexion(); //Extrae conexión
        }
        $tableHtml = "<table class='table table-hover'>" .
                "<tr>" .
                "<th>Id</th>" .
                "<th>Descripción Auto</th>" .
                "<th>Precio</th>" .
                "<th>Total</th>" .
                "<th>Descripción Oferta</th>" .
                "<th>Vendedor</th>" .
                "<th>Estado</th>" .
                "<th>&nbsp;</th>" .
                "<th>&nbsp;</th>" .
                "</tr>";
        $registros = $this->read();
        if ($registros->rowCount() > 0) {
            while ($row = $registros->fetch(PDO::FETCH_ASSOC)) {
                $tableHtml = $tableHtml . "<tr>" .
                        "<td>" . $row['idOferta'] . "</td>" .
                        "<td>" . $row['descripcionAuto'] . "</td>" .
                        "<td>" . $row['precio'] . "</td>" .
                        "<td>" . $row['total'] . "</td>" .
                        "<td>" . $row['descripcionOferta'] . "</td>" .
                        "<td>" . $row['idVendedor'] . "</td>" .
                        "<td><input type='checkbox' disabled='disabled' ";
                
                if ($row['estado'] == 1) {
                    $tableHtml = $tableHtml . " checked";
                }
                
                $tableHtml = $tableHtml . "></td>" .
                        "<td><a href='listar_oferta.php?idE=" . $row['idOferta'] . "' data-toggle='modal' data-target='#modalModificarOfertas' class='btn btn-info left-margin'>"
                        . "<span class='glyphicon glyphicon-edit'></span>Editar</a></td>" .
                        "<td><a href='listar_oferta.php?id=" . $row['idOferta'] . "'  class='btn btn-danger delete-object'>"
                        . "<span class='glyphicon glyphicon-remove'></span>Eliminar</a></td>" .
                        "</tr>";
            }
            $tableHtml = $tableHtml . "</table>";
            echo $tableHtml;
            
        } else {
            echo "<div class='alert alert-warning'>No existen registros de Oferta.</div>";
        }
    }
    
     public function delete( $key = NULL){
         if ($this->con == NULL) {
            $instance = Database::getInstance(); //Única instancia
            $this->con = $instance->getConexion(); //Extrae conexión
        }
        
        if (is_null($key)){
            $key = $this->primaryKey;
        }
        $delete = "DELETE FROM " . $this->tabla .
                " WHERE idOferta='$key'";
        $stmt = $this->con->prepare($delete);
        echo $delete;
        if ($stmt->execute()){
            return true;
        }
        return false;
    }
    
    
    public function _toString() {
        return 'descripcionAuto=' . $this->descripcionAuto . 'precio' . $this->precio .
               'total=' . $this->total . 'estado' . $this->estado .
               'descripcionOferta=' . $this->descripcionOferta . 'idVendedor' . $this->idVendedor;
    }

}


