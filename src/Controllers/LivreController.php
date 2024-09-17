<?php

namespace App\Controllers;

use App\Dao\LivreDAO;

class LivreController
{

    private LivreDAO $livreDao; //Dépendance

    public function __construct(LivreDAO $dao)
    {
        $this->livreDao = $dao;
    }

    //Lister l'ensemble des livres


    public function list(){

        //Fait appelle au Modèle afin de récupérer les données dans la BD

        $livres = $this->livreDao->selectAll();

        //Fait appel à la Vue afin de renvoyer la page

        require __DIR__."/../../views/livre/list.php";

    }

    public function details($id){

        //Fait appelle au Modèle afin de récupérer les données dans la BD

        $livre = $this->livreDao->selectOne($id);

        //Fait appel à la Vue afin de renvoyer la page

        require __DIR__."/../../views/livre/details.php";

    }

    public function add(){

        //Fait appelle au Modèle afin de récupérer les données dans la BD

        //$livres = $this->livreDao->selectAll();

        //Fait appel à la Vue afin de renvoyer la page

        require __DIR__."/../../views/livre/addLivre.php";

    }


}