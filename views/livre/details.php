<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détails livre</title>
</head>
<body>

<h1> Détails de <?= $livre->getTitre() ?> </h1>

<ul>

    <li> Titre : <?= $livre->getTitre() ?></li>
    <li> Auteur : <?= $livre->getAuteur() ?></li>
    <li> Nombre de pages : <?= $livre->getNbPages() ?></li>

</ul>

<h2><a href="index.php"> Accueil</a></h2>


</body>
</html>
