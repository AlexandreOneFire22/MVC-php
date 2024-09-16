<?php

namespace App\Dao;

class LivreDAO
{

    private \PDO $db;

    /**
     * @param \PDO $db
     */

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }


    // Envoyer la requête "SELECT * FROM Livre"
    //Retourner les enregistrements sous la forme d'un tableau d'objet de la classes Livre


    public function selectAll() : array {

        $requete = $this->db->query("SELECT * FROM livre");
        $livresBD = $requete->fetchAll(\PDO::FETCH_ASSOC);

        // Mapping relationnel vers objet

        $livres =[];





        return $livres;
    }


}