<?php 
   session_start();
   require('actions/getInfosOfEdited.php');
   require('actions/editQuestionAction.php');
?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
<br><br>
    <div class="container">
       <?php if(isset($errorMsg)){
           echo '<p>'.$errorMsg.'</p>';
        }?>


<?php 
    if(isset($question_contenu)){
?>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Title of question</label>
            <input type="text" class="form-control" name="title" value="<?= $question_title ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Description of question</label>
            <textarea  class="form-control" name="description"><?= $question_description ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Question contenu</label>
            <textarea class="form-control" name="content"><?= $question_contenu ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="validate">Modify the question</button>
    </form>

<?php         
    }     
?>

    </div>
    

</body>
</html>