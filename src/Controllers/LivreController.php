<?php

namespace App\Controllers;

use App\Dao\LivreDAO;

class LivreController
{

    private \PDO $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    //Lister l'ensemble des livres


    public function list(){

        //Fait appelle au Modèle afin de récupérer les données dans la BD

        $livreDao = new LivreDAO($this->db);

        $livres = $livreDao->selectAll();

        //Fait appel à la Vue afin de renvoyer la page

        require __DIR__."/../../views/livre/list.php";

    }

}