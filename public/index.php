<?php

// Contrôleur FRONTAL => Router
// Toute les requêtes des utilisateurs passent par ce fichier

require_once __DIR__.'/../vendor/autoload.php';

//Chargement des variable d'environnement


$dotEnv = \Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotEnv->load();  //charger les variables d'environnement de .env dans un tableau $_ENV




//Configurer la connexions à la base de données





//$dbConfig = require_once __DIR__.'/../config/database.php';

$db = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}",$_ENV['DB_USER'],$_ENV['DB_PASSWORD']);






// Mise en place du routing

$route = $_GET['route'] ?? 'accueil' ;

switch ($route){

    case "accueil" :
        $accueilController = new \App\Controllers\AccueilController();
        $accueilController->Accueil();

        break;

    case "livre-list" :

        // $livreDao est une dépendance de LivreController
        $livreDao = new \App\Dao\LivreDAO($db);

        // Injecter la dépendance $livreDao dans l'objet LivreController
        $livreControleur = new \App\Controllers\LivreController($livreDao);

        $livreControleur->list();

        break;

    case "livre-details" :

        $id = $_GET['id'] ?? null ;

        if ($id){

            // $livreDao est une dépendance de LivreController
            $livreDao = new \App\Dao\LivreDAO($db);

            // Injecter la dépendance $livreDao dans l'objet LivreController
            $livreControleur = new \App\Controllers\LivreController($livreDao);

            $livreControleur->details($id);

        }else{
            echo "La requête n'est pas valide.";
        }

        break;

    case "livre-add" :

        // $livreDao est une dépendance de LivreController
        $livreDao = new \App\Dao\LivreDAO($db);

        // Injecter la dépendance $livreDao dans l'objet LivreController
        $livreControleur = new \App\Controllers\LivreController($livreDao);

        $livreControleur->addLivre();

        break;

    default :
        // Page erreur 404
        echo "Page non trouvée";

        break;

}






//if ($route === "accueil") {
    // Créer un objet AccueilController

 //   $accueilController = new \App\Controllers\AccueilController();
//    $accueilController->Accueil();

//}else{
   // echo "Page non trouvée";
//}



