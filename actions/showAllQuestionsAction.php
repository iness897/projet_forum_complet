<?php 

require('database.php');

// Récuperer les questions par défaut sans recherche 
$getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');


// Vérifier si une recherche a été rentrée par l'utilisateur
if(isset($_GET['search']) AND !empty($_GET['search'])){

    $userSearch = $_GET['search'];

    // Récuperer toutes les questons qui correspondent à la recherche 
    $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%'.$userSearch.'%" ORDER BY id DESC');

}

?>