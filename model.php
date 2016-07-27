<?php 
    /**
    * 
    */
   include_once 'connection.php';
   include_once 'config.php';

    class ModelNotif
    {
        private $connection;
        private $config;

        function __construct()
        {
            $this->config = new Config();
            $params_connection = $this->config->getParamsConnection();
            $this->connection = $this->config->getInstanceDB();
            $this->connection->conectar($params_connection);
        }

        public function listarNotificaciones()
        {
            try {
                if (!isset($this->connection)){
                    throw new Exception("Error connection not initialize");
                }
                $sql = 'select * from notificacion';
                $lista = $this->connection->executeQuery($sql);
                if (isset($lista)){
                    return $lista;
                }
                else {
                    return null;
                }
            } catch (Exception $e) {
                throw $e;
            }
            finally {
                $this->connection->close();
            }
        }
    }
 ?>