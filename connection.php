<?php 
  /**
  * 
  */
  interface Connection
  {
    
    public function conectar($params_connection);

    public function executeQuery($sql);

    public function close();
  }
 ?>