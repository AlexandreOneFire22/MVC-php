<?php

require_once __DIR__.'/../vendor/autoload.php';

$dbConfig = require_once __DIR__.'/../config/database.php';

$db = new PDO("mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}",$dbConfig['user'],$dbConfig['password']);

// Injecter la dépendance $livreDao dans l'objet LivreController

$id = 3;

//$livreControleur = new \App\Controllers\LivreController($livreDao);

$requete = $db->query("SELECT * FROM livre WHERE id_livre = $id");
$livreBD = $requete->fetchAll(\PDO::FETCH_ASSOC);

//$id = $_GET['id'] ?? 'erreur' ;


dump($livreBD);


