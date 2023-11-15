<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recherche d'adresses</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
  <header>
    <a href="/">Accueil</a>
    <a href="/recherche">Recherche</a>
  </header>
  <main>
    <?php
      $request = $_SERVER['REQUEST_URI'];

      if($request!=="/") {
        switch ($request) {
          case "/articles":
            include "./controller/articlesController.php";
            break;
          case "/":
            include "./controller/articlesController.php";
            break;
          default: 
            include "./controller/articlesController.php";
            break;
        };
      } ?>
  </main>
</body>
</html>