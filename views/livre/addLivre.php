<?php


$erreurs = [];

$titre = "";
$auteur = "";
$nbPages = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //le formulaire à été soumis !
    //Traiter les données du formulaire
    //Récupérer les valeur saisie par l'utilisateur
    // Superglobale $_POST : tableau associatif

    $titre = $_POST["titre"];
    $auteur = $_POST["auteur"];
    $nbPages = $_POST["nbPages"];

    //Validation des données
    if (empty($titre)) {
        $erreurs ["titre"] = "Le titre est obligatoire.";
    }
    if (empty($auteur)) {
        $erreurs ["auteur"] = "Le nom de l'auteur est obligatoire.";
    }
    if (empty($nbPages)) {
        $erreurs ["nbPages"] = "Le nombre de pages est obligatoire.";
    }

    //Traiter les données

    if (empty($erreurs)) {
        // Traitement des données (exemple insertion dans une base de données)
        //Redirigé l'utilisateur vers une autre page (la page d'accueil)

//2. Prépareration de la requête


        EnvoyerFormulaireFilm($titre,$duree,$resume,$date_sortie,$pays,$image,$id_utilisateur);

        header("Location: index.php");
        exit();


    }

}


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?= __DIR__."/../../public/assets/css/cyborg-bootstrap.min.css" ?>" rel="stylesheet">
    <title>Add livre</title>
</head>
<body class="bg-light">

<div class="container">
    <h1 class="ms-5">Ajouter un livre :</h1>

    <div class="w-75 mx-auto">
        <form action="" method="post" novalidate>

            <div class="mb-3">
                <label for="titre" class="form-label">Titre* :</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs["titre"])) ? "border border-2 border-danger" : "" ?>"
                       id="titre"
                       name="titre"
                       value="<?= $titre ?>"
                       placeholder="Saisissez le titre">

                <?php if (isset($erreurs["titre"])) : ?>

                    <p class="form-text fs-5 text-rouge"> <?= $erreurs["titre"] ?></p>

                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="auteur" class="form-label">auteur* :</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs["auteur"])) ? "border border-2 border-danger" : "" ?>"
                       id="auteur"
                       name="auteur"
                       value="<?= $auteur ?>"
                       placeholder="Saisissez le nom de l'auteur">

                <?php if (isset($erreurs["auteur"])) : ?>

                    <p class="form-text fs-5 text-rouge"> <?= $erreurs["auteur"] ?></p>

                <?php endif; ?>
            </div>



            <div class="mb-3">
                <label for="nbPages" class="form-label">nombre de pages* :</label>
                <input type="int"
                       class="form-control <?= (isset($erreurs["nbPages"])) ? "border border-2 border-danger" : "" ?>"
                       id="nbPages"
                       name="nbPages"
                       value="<?= $nbPages ?>"
                       placeholder="Saisissez le nombre de pages">

                <?php if (isset($erreurs["nbPages"])) : ?>

                    <p class="form-text fs-5 text-rouge"> <?= $erreurs["nbPages"] ?></p>

                <?php endif; ?>
            </div>

            <span class="d-flex justify-content-evenly">
                <button type="submit" class="btn btn-primary mt-3">Valider</button>
            </span>
        </form>
    </div>



</div>

<script src="<?= __DIR__."/../../public/assets/js/bootstrap.bundle.min.js" ?>"></script>
</body>
</html>