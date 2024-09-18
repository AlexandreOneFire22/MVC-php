<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                       class="form-control"
                       id="titre"
                       name="titre"
                       value=""
                       placeholder="Saisissez le titre">
            </div>

            <div class="mb-3">
                <label for="auteur" class="form-label">auteur* :</label>
                <input type="text"
                       class="form-control"
                       id="auteur"
                       name="auteur"
                       value=""
                       placeholder="Saisissez le nom de l'auteur">

            </div>



            <div class="mb-3">
                <label for="nbPages" class="form-label">nombre de pages* :</label>
                <input type="int"
                       class="form-control"
                       id="nbPages"
                       name="nbPages"
                       value=""
                       placeholder="Saisissez le nombre de pages">
            </div>

            <span class="d-flex justify-content-evenly">
                <button type="submit" class="btn btn-primary mt-3">Valider</button>
            </span>
        </form>
    </div>



</div>
</body>
</html>