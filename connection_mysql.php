<?php 
  /**
  * 
  */
  class Connection_Mysql implements Connection
  {

    private $connection;
    private $host;
    private $bd;
    private $username;
    private $password;

    function __construct()
    {
      
    }

    public function conectar($params_connection)
    {
        try {
            $this->host = '';
            $this->bd = '';
            $this->username = '';
            $this->password = '';

            if (!isset($params_connection['host'])){
                throw new Exception("Error, Host no especificado");
            }
            if (!isset($params_connection['bd'])){
                throw new Exception("Error, bd no especificado");
            }
            if (!isset($params_connection['username'])){
                throw new Exception("Error, username no especificado");
            }
            if (!isset($params_connection['password'])){
                throw new Exception("Error, password no especificado");
            }
            $this->host = $params_connection['host'];
            $this->bd = $params_connection['bd'];
            $this->username = $params_connection['username'];
            $this->password = $params_connection['password'];
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->bd);
            if($this->connection->connect_errno){
                throw new Exception("Error al conectar base de datos");
            }
            echo "Conexión a BD exitosa</br>";
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function close(){
        try {
            $this->connection->close();
            echo "BD cerrada";
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function executeQuery($sql)
    {
        try {
            if (!isset($this->connection)){
                throw new Exception("Error connection not initialize");
            }
            $resultado = $this->connection->query($sql);
            if($resultado === false){
                throw new Exception("Error : " . $this->connection->error);
            }
            $lista = array();
            while($row = $resultado->fetch_array(MYSQLI_ASSOC)){
                $lista[] = $row;
            }
            return $lista;
        } catch (Exception $e) {
            throw $e;
        }
        finally {
            $resultado->close();
        }
    }
  }

 ?>