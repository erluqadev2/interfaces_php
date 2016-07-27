<?php 
  /**
  * 
  */
 include_once 'connection_mysql.php';
 include_once 'connection_postgresql.php';
  class Config
  {
    const MYSQL = 'MYSQL';
    const POSTGRESQL = 'POSTGRESQL';
    private $config = array();
    private $motordb = self::POSTGRESQL;

  
    function __construct()
    {
      $this->config[self::MYSQL]['params_connection'] = array();
      $this->config[self::MYSQL]['params_connection']['host'] = 'localhost';
      $this->config[self::MYSQL]['params_connection']['bd'] = 'test_node';
      $this->config[self::MYSQL]['params_connection']['username'] = 'root';
      $this->config[self::MYSQL]['params_connection']['password'] = '';

      $this->config[self::POSTGRESQL]['params_connection'] = array();
      $this->config[self::POSTGRESQL]['params_connection']['host'] = 'localhost';
      $this->config[self::POSTGRESQL]['params_connection']['bd'] = 'notificaciones_push';
      $this->config[self::POSTGRESQL]['params_connection']['username'] = 'postgres';
      $this->config[self::POSTGRESQL]['params_connection']['password'] = 'postgres';
    }

    public function getConfig()
    {
      return $this->config;
    }

    public function getInstanceDB(){
      echo "</br>" . $this->motordb . '</br>';
      if($this->motordb == self::MYSQL){
        return new Connection_Mysql();
      }
      if($this->motordb == self::POSTGRESQL){
        return new Connection_Postgresql();
      }
    }

    public function getParamsConnection()
    {
      return $this->config[$this->motordb]['params_connection'];
    }
  }
  
 ?>