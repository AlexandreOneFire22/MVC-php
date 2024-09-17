<?php

namespace App\Dao;

use App\Entity\Livre;

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

        foreach ($livresBD as $livre){
            $livres [] = new Livre($livre["id_livre"],$livre["titre_livre"],$livre["auteur_livre"],$livre["nombre_page_livre"]);
        }
        return $livres;
    }

    public function selectOne($id) : Livre {

        $requete = $this->db->query("SELECT * FROM livre WHERE id_livre = $id");
        $livreBD = $requete->fetchAll(\PDO::FETCH_ASSOC);

        // Mapping relationnel vers objet

        $livre = new Livre($livreBD[0]["id_livre"],$livreBD[0]["titre_livre"],$livreBD[0]["auteur_livre"],$livreBD[0]["nombre_page_livre"]);
        return $livre;
    }

    public function add($titre,$nbPages,$auteur):array{

        $titre = str_replace("'","\'",$titre);
        $auteur = str_replace("'","\'",$auteur);


        $requete = $this->db->query("INSERT INTO `livre` (`id_livre`,`titre_livre`, `nombre_page_livre`, `auteur_livre`) 
            VALUES (NULL, '$titre', '$nbPages', '$auteur');");

        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

}

