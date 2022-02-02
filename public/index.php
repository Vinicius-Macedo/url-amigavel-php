<?php

include './../app/config.php';
include APP_FOLDER . 'autoload.php';
$db = new Database;

?>



<!DOCTYPE html>
<html lang="pt-br">


<?php

$rotas = new Rotas();
include_once VIEWS_FOLDER . 'Templates/footer.php';


?>




</html>