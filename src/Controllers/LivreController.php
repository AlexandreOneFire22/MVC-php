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

        $livre = $this->livreDao->selectById($id);

        if ($livre){

            //Fait appel à la Vue afin de renvoyer la page

            require __DIR__."/../../views/livre/details.php";

        }else{

            header("HTTP/1.0 404 Not Found");

        }




    }

    public function addLivre(){

        if ($_SERVER["REQUEST_METHOD"] === "POST"){

            if (empty($titre)) {
                $this->livreDao->addErreur("titre","Le titre est obligatoire.");
            }
            if (empty($auteur)) {
                $this->livreDao->addErreur("auteur","Le nom de l'auteur est obligatoire.");
            }
            if (empty($nbPages)) {
                $this->livreDao->addErreur("nbPages","Le nombre de pages est obligatoire.");
            }

            if ($this->livreDao->getErreur()){
                $this->livreDao->addLivre($_POST["titre"],$_POST["nbPages"],$_POST["auteur"]);
                require __DIR__."/../../views/accueil/accueil.php";
            }else{
                require __DIR__."/../../views/livre/addLivre.php";
            }

        }else{

            require __DIR__."/../../views/livre/addLivre.php";

        }

    }


}