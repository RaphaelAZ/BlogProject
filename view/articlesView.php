<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blog - Projet</title>
  <link rel="stylesheet" href="../assets/styles.css">
</head>

<body>
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
        <?php foreach($articles->getArticles() as $article){?>
        <tr>
            <td class="message-display">
                <?php echo $article['name']; ?>
            </td>
            <td class="message-display">
                <?php echo $article['context']; ?>
            </td>
            <td class="message-display">
                <?php echo $article['content']; ?>
            </td>
            <td>
                <a href="<?php echo '/article?id='.$article['id']; ?>">
                    <img src="../assets/img/eye_logo.png" class="img-fluid img-thumbnail rounded go-to">
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>

</html>