<?php

class Database {
    
    private static $instance = NULL; //INSTANCIA ÚNICA
    private $host = NULL; //SERVIDOR
    private $database = NULL; //NOMBRE DE LA BSE DE DATOS
    private $user = NULL; //USUARIO
    private $password = NULL; //CONTRASEÑA
    private $con = NULL;
    
    /*
     * Método a leer el archivo de configuración XML a la base de datos.
     */
    private function readXML(){
        $xmlFile =__DIR__."\configuracion.xml";//Archivo xml
        if (file_exists($xmlFile)){
            $xml = simplexml_load_file($xmlFile); //Carga el archivo xml
        }else{
            exit('Fallo al abrir el archivo configuracio.xml');
        }
        $this->host = $xml->mysql[0]->host;
        $this->database = $xml->mysql[0]->database;
        $this->user = $xml->mysql[0]->user;
        $this->password = $xml->mysql[0]->password;
    }

    /*
     * constructor de la clase
     */
    public function __construct() {
        try{
            $this->readXML();
            $this->con = new PDO('mysql:host=' .
                    $this->host . ';dbname=' . $this->database,
                    $this->user, $this->password);
        } catch (PDOException $e){
            echo 'No puede conectarse con la base de datos' .
            $e->getMessage();
            
        }
    }

    /*
     * Método estático que regresa la única instancia de la clase
     * @return type Objeto de la BD
     */
    public static function getInstance(){
        if(!(self::$instance instanceof Database)){
            self::$instance = new Database();
        }
        return self::$instance;
    }

    /*
     * Extrae la conexión de la BD
     * @return type Connection
     */
    public function getConexion() {
        return $this->con;
    }

}

?>