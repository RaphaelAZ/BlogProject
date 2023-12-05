<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blog - Projet</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
      <h5><?php echo $theArticle[0]['name']; ?></h5> 
      <div>
        <label class="fw-bold">Contexte : </label><?php echo " ".$theArticle[0]['context']; ?>
      </div>
      </div>

      <div class="card-body">
      <?php echo $theArticle[0]['content']; ?>
      </div>
      
      </div>
    </div>
  </div>
  <div class="container mt-3">
    <div class="card">
      <div class="card-header">
        <h5>
          Commentaires
        </h5>
      </div>
      <?php 
      
      foreach($commentaries as $comment){ ?>
      <div class="card-body">
        <h6>
          
        </h6>
        <?php
        echo $comment['message'];
        echo $comment['postDate'];
        ?>
      </div>
      <?php } ?>
    </div>
  </div>
</body>

</html>