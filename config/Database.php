<?php
class Database
{
    public $host = 'localhost';
    public $user = 'root';
    public $pass = '';
    public $db   = 'usuario';
    private $conn;

    function __construct()
    {
        $this->conn = $this->connectToDatabase();
        return $this->conn;
    }
    function connectToDatabase()
    {
        $conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if(mysqli_connect_error()){
            echo "Tenemos un error de conexion" .mysqli_connect_error();
        }
        return $conn;
    }
}
?>