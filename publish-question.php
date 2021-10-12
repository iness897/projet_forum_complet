
<?php 
session_start();
require('actions/publishQuestionAction.php');
 ?>


<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
<br><br>

<form class='container' method="POST">

  <?php 

  if(isset($errorMsg)){
      echo '<p>'.$errorMsg.'</p>';
  }elseif(isset($successMsg)){
    echo '<p>'.$successMsg.'</p>';  
  } 

  ?>

    <div class="mb-3">
        <label class="form-label">Title of question</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="mb-3">
        <label class="form-label">Description of question</label>
        <textarea  class="form-control" name="description"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Question contenu</label>
        <textarea class="form-control" name="content"></textarea>
    </div>

    <button type="submit" class="btn btn-primary" name="validate">Publish the question</button>


</form>

</body>
</html>