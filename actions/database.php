<?php

try{
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;port=3308','root', 'root');
}
catch(Exception $e){
   die('une erreur a été trouvé :' . $e->getMessage());
}

?>