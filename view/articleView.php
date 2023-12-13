<main>
<?php
unset($_POST);
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
      <div class="share-container">
        <a href='<?php $facebook_share_url ?>' target='_blank'><span class="iconify-inline" data-icon="bi:facebook" style="color: #3b5998"></span></a>
        <a href='<?php $x_share_url ?>' target='_blank'><span class="iconify-inline" data-icon="ri:twitter-x-fill" style="color: black;"></span></a>
      </div>
    </div>
  </div>
  <div class="container mt-3">
    <div class="card">
      <div class="card-header">
        <h5>Poster un commentaire</h5>
      </div>
      <div class="card-body">
        <div class="mb-2">
          <form action='<?php echo("/article?id=".$_GET['id']); ?>' method='post'>
          <?php if(isset($_SESSION['session_token'])) {echo"<textarea class='form-control mb-2' id='comment' name='comment' rows='3' placeholder='Entrez votre commentaire ici...'></textarea>
          <button type='submit' class='btn btn-success'>Poster le commentaire</button>";}
          else { echo"<span class='mt-1' style='color: red'>Vous devez être connecté pour publier des commentaires</span>";} ?>
          </form>
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
        if(boolval(isset($_SESSION['admin']))){
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
  <script async defer src="https://cdnjs.cloudflare.com/ajax/libs/iconify/2.0.0/iconify.min.js"></script>