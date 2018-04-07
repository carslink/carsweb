<?php

/**
 * Description of DAO
 *Clase abstracta que permite heredar de ella los metodos hacia las clases.
 * @author Carlos_Arriaga
 */
abstract class DAO {
    
    protected $con = NULL; //Objeto conexión a una fuente de datos.
            
    /*
     * Constructor de la clase.
     */
    
    public function __constructor(){
        $instance = Database::getInstance(); //Única instancia
        $this->con = $instance->getConexion(); //Extrae conexión
        
    }
    
    /*
     * Método genérico que realiza consultas a la base de datos.
     * @param type $value Valor del campo a consultar
     * @param type $key clave del campo
     * @return type Un enunciado.
     */
    public abstract function read($value = NULL, $key = NULL); 
    
    /*
     * Método genérico que realiza consultas a las base de datos
     * @return type Un enunciado.
     */
    public abstract function readId();
    
    /*
     * Método genérico que realiza inserción a la base de datos.
     */
    public abstract function insert();
    
    /*
     * Método genérico que realiza modificación a la base de datos.
     */
    public abstract function update();
    
    /*
     * Método genérico que realiza eliminación en la base de datos.
     * @param type $key clave del campo
     */
    public abstract function delete( $key = NULL);
    
}
