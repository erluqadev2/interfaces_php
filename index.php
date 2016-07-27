<?php 
  include_once('controller.php');
  $controller = new Controller();
  $lista_not = $controller->listarNotificaciones();
  echo "</br>lista</br>";
  foreach ($lista_not as $key => $value) {
      var_dump($value);
      echo "</br>";
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>index</title>
</head>
<body>
    hello word
</body>
</html>