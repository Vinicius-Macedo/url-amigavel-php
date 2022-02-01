<?php
include './../app/config.php';
include LIB_FOLDER.'Rotas.php';
include LIB_FOLDER.'Controller.php';
include LIB_FOLDER.'Database.php';
$db = new Database;
?>


<!DOCTYPE html>
<html lang="pt-br">


  <?php
     $rotas = new Rotas();
     include_once VIEWS_FOLDER.'Templates/footer.php';
  ?>




</html>