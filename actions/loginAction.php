<?php 
session_start();
require('database.php');


// Validation du formulaire 

if(isset($_POST['validate'])){

    if(!empty($_POST['pseudo']) AND !empty($_POST['password'])){

    // Les données de User

            $user_pseudo = htmlspecialchars($_POST['pseudo']); 
            $user_password = htmlspecialchars($_POST['password'], PASSWORD_DEFAULT);

    // vérifier si utilisateur existe (si pseudo correcte)
     
            $checkIfUserExist = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?'); 
            $checkIfUserExist->execute(array($user_pseudo));

            if($checkIfUserExist->rowCount() > 0){

    // recuperer les donnes utilisateur 

                $usersInfos = $checkIfUserExist->fetch(); 
    
                if(password_verify($user_password, $usersInfos['mdp'])){

    // Authentifier l'utilisateur sur le site et recuperer ses donnes

                    $_SESSION['auth'] = true; 
                    $_SESSION['id'] = $usersInfos['id'];
                    $_SESSION['lastname'] = $usersInfos['nom'];
                    $_SESSION['firstname'] = $usersInfos['prenom'];
                    $_SESSION['pseudo'] = $usersInfos['pseudo'];

    // Redirige utilisateur vers la page acceuil 
    
                    header('Location: index.php');

                }else{
                    $errorMsg = "votre mot de passe est incorrect ...";
                }

            }else{
                $errorMsg = "Votre pseudo est incorrect ...";
            }

        }
    else{
            $errorMsg = "l'utilisateur existe deja";
        }


}else
{
    $errorMsg = "Veuillez completer tous les champs ...";
}
















?>