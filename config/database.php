<?php
class Database{
    private $host = "localhost";
    private $db_name = "biblioteca";
    private $username = "root";
    private $password = "1e3l5i10o";
    public $conexion;

    public function getConnection(){
        $this->conexion = null;
        try{
            $this->conexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                                      $this->username, $this->password);
            $this->conexion->exec("set names utf8");
        }catch(PDOException $error_conexion){
            echo "Error de conexión: " . $error_conexion->getMessage();
        }
        return $this->conexion;
    }
}
?>
