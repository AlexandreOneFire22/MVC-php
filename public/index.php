<?php

// Contrôleur FRONTAL => Router
// Toute les requêtes des utilisateurs passent par ce fichier

require_once __DIR__.'/../vendor/autoload.php';

//Configurer la connexions à la base de données




$dbConfig = require_once __DIR__.'/../config/database.php';

$db = new PDO("mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}",$dbConfig['user'],$dbConfig['password']);






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



