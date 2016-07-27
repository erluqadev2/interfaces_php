<?php 
    include_once('model.php');
    /**
    * 
    */
    class Controller
    {
        private $model;
        
        function __construct()
        {
            $this->model = new ModelNotif();
        }

        public function listarNotificaciones()
        {
            echo "controller listarNotificaciones</br>";
            try {
                return $this->model->listarNotificaciones();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

    }
 ?>