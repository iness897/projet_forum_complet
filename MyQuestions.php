<?php 
require('actions/myQuestionsAction.php');      
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

<br><br>

<div class="container"> 
    
    <?php 
    while($question = $getAllMyQuestions->fetch()){
        ?>
    <div class="card">
    <h5 class="card-header">
        <a href="article.php?id=<?= $question['id']; ?>">
        <?= $question['titre']; ?>
        </a>
    </h5>
        <div class="card-body">
        <p class="card-text">
            <?= $question['description']; ?> 
        </p>
        <a href="article.php?id=<?= $question['id'] ?>" class="btn btn-primary">Access to the question</a>
        <a href="edit-question.php?id=<?= $question['id']; ?>" class="btn btn-warning">Modify the question</a>
        <a href="actions/deleteQuestionAction.php?id=<?= $question['id']; ?>" class="btn btn-danger">Delete the question</a>
        </div>
    </div> 
<br><br>
    <?php
    }
    ?>
</div>

</body>
</html>