<?php
require('database.php');

// Vérifier si ID de la question est rentré dans URL 
if(isset($_GET['id']) AND !empty($_GET['id'])){

    // Récuperer identifiant de la question 
    $idOfTheQuestionExists = $_GET['id']; 

    // Vérifier si la question existe
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfTheQuestionExists));

    if($checkIfQuestionExists->rowCount() > 0){
      
        // Récuperer toutes les dates de la questions 
        $questionsInfos = $checkIfQuestionExists->fetch();

        // Stocker les dates de ka question dans des variables propres
        $question_title = $questionsInfos['titre'];
        $question_content = $questionsInfos['contenu'];
        $question_id_author = $questionsInfos['id_auteur'];
        $question_pseudo_author = $questionsInfos['pseudo_auteur'];
        $question_publication_date = $questionsInfos['date_publication'];
    }else{
    $errorMsg = "Aucune question n'a été trouvée";
    }

}else{
    $errorMsg= "Aucune question n'a été trouvé";
}


?>