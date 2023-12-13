<main>
<?php
  if(isset($_GET['id'])){
  echo "<a href='/articles' class='text-decoration-none rounded bg-danger p-1 link-light'>Retour</a>";
  }
  ?>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
      <h5><?php echo $article->getArticleName(); ?></h5> 
      <div>
        <label class="fw-bold">Contexte : </label><?php echo " ".$article->getArticleContext(); ?>
      </div>
      </div>

      <div class="card-body">
      <?php echo $article->getArticleContent(); ?>
      </div>
      <hr>
      <?php
      echo "<a href='$facebook_share_url' target='_blank'>Partager sur Facebook</a>";
      ?>
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
      if(count($comments)>1){
      foreach($comments as $comment){ ?>
      <div class="card-body">
        <h6>
          <?php 
          echo $Cmanager->getUserOfThisComment($article->getArticleID())." - ".$comment->getPostDate();
          ?>
        </h6>
        <?php
        echo $comment->getMessage();
        if(isset($_SESSION['name'])&&isset($_SESSION['session_token'])){
          echo ("<div>
          <form method='post' action='/article?id=".$_GET['id']."'>
          <button type='submit' class='btn bg-danger text-light' id='admin-delete' value='' id='delete_comment' name='delete_comment'>
          <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' viewBox='0 0 24 24'><path fill='currentColor' d='M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6v12M8 9h8v10H8V9m7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5Z'/></svg>
          </button>
          </form>
          </div>");
        }
        ?>
      </div>
      <hr />
      <?php 
        }
      }
      else{
        echo "<div class='card-body'>Aucun Commentaire n'a été publié</div>";
      }
      ?>
    </div>
  </div>
  <div>
    <?php
    if($error){
      echo $error;
    }
    ?>
  </div>
  </main>