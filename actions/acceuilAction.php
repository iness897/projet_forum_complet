<?php
session_start();
require('database.php');


// Validation du formulaire 

if(isset($_POST['validate'])){

    // Verifier si User a bien completé tous les champs.

    if(!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password'])){

      // Les données de User

     $user_pseudo = htmlspecialchars($_POST['pseudo']); 
     $user_lastname = htmlspecialchars($_POST['lastname']); 
     $user_firstname = htmlspecialchars($_POST['firstname']);
     $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

      // Si l'utilisateur existe déja sur le site  

    $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
    $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if($checkIfUserAlreadyExists -> rowCount() == 0){
        
            // insérer l'utilisateur dans la bdd

            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, nom, prenom, mdp)VALUES(?,?,?,?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname,$user_firstname, $user_password));

            // Récuperer les informations de l'utilisateur 

            $getInfoThisUser = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom = ? AND prenom = ? AND pseudo = ?');
            $getInfoThisUser->execute(array($user_lastname, $user_firstname, $user_pseudo));

            $usersInfos = $getInfoThisUser->fetch();

            // Authentifier l'utilisateur sur le site et récuperer ses donnes dans des variables gloabales sessions  

            $_SESSION['auth'] = true; 
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['lastname'] = $usersInfos['nom'];
            $_SESSION['firstname'] = $usersInfos['prenom'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];

            // Rediriger l'utilisateur vers la page d'acceuil

            header('Location: index.php');

        }else{
        $errorMsg = "l'utilisateur existe deja";
    }


    }

else{
    $errorMsg = "Veuillez completer tous les champs ...";
}
}

?>