<?php 
require('database.php');

// Vérifier si ID de la question est bien passé en paramétre dans l'url 
if(isset($_GET['id']) AND !empty($_GET['id'])){

    // Vérifier si la question existe
    $idOfQuestion = $_GET['id'];
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfQuestion));

        if($checkIfQuestionExists->rowCount() > 0){
            // Récuperer les données de la question  
            $questionInfos = $checkIfQuestionExists->fetch(); 
            if($questionInfos['id_auteur'] == $_SESSION['id']){

                $question_title = $questionInfos['titre'];
                $question_description = $questionInfos['description']; 
                $question_contenu = $questionInfos['contenu']; 

                $question_description = str_replace('<br />', '', $question_description);
                $question_contenu = str_replace('<br />', '', $question_contenu);

            }else{
                $errorMsg = "Vous n'étes pas l'auteur de cette question";
            }
            
        }else{
            $errorMsg = "Auncune question n'a été trouvé"; 
        }

}else{
    $errorMsg = "Auncune question n'a été trouvé";
}




?>