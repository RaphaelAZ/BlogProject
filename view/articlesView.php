<main>
  <h1>Liste des articles</h1>
  <table class="table justify-content text-center">
        <tr class="font-weight-blod">
            <td>
                Nom de l'article
            </td>
            <td>
                Contexte
            </td>
            <td>
                À propos
            </td>
            <td>
                Voir
            </td>
        </tr>
        <?php foreach($articlesList as $article){?>
        <tr>
            <td class="message-display">
                <?php echo $article->getArticleName(); ?>
            </td>
            <td class="message-display">
                <?php echo $article->getArticleContext(); ?>
            </td>
            <td class="message-display">
                <?php echo $article->getArticleContent(); ?>
            </td>
            <td>
                <a href="<?php echo '/article?id='.$article->getArticleID(); ?>">
                    <img src="../assets/img/eye_logo.png" class="img-fluid img-thumbnail rounded go-to">
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <div>
        <?php
        if($error){
            echo $error;
        }
        ?>
    </div>
</main>