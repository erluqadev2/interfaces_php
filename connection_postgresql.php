<?php 
  /**
  * 
  */
  class Connection_Postgresql implements Connection
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
            $this->db = '';
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
            $this->db = $params_connection['bd'];
            $this->username = $params_connection['username'];
            $this->password = $params_connection['password'];
            
            $connection_string = 'host=' . $this->host . ' port=5432 dbname=' . $this->db . ' user=' . $this->username . ' password=' . $this->password;
            echo "</br>" . $connection_string . "</br>";
            $this->connection = pg_connect($connection_string);
            if(!$this->connection){
                throw new Exception("Error al conectar_BD");
            }
            echo "Conexión a BD exitosa</br>";
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function close(){
        try {
            pg_close($this->connection);
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
            $resultado = pg_query($this->connection, $sql);
            if($resultado === false){
                throw new Exception("Error : " . $this->connection->error);
            }
            $lista = array();
            while($row = pg_fetch_assoc($resultado)){
                $lista[] = $row;
            }
            return $lista;
        } catch (Exception $e) {
            throw $e;
        }
    }
  }

 ?>