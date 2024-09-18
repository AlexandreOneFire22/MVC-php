<?php

namespace App\Dao;

use App\Entity\Livre;

class LivreDAO
{

    private \PDO $db;

    private array $erreurs = [];

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

    public function selectById(int $id) : ?Livre {

        $requete = $this->db->prepare("SELECT * FROM livre WHERE id_livre = :id");

        $requete->execute([':id'=> $id]);

        $livreBD = $requete->fetch(\PDO::FETCH_ASSOC);

        if (!$livreBD){
            return null;
        }
        // Mapping relationnel vers objet

        $livre = new Livre($livreBD["id_livre"],$livreBD["titre_livre"],$livreBD["auteur_livre"],$livreBD["nombre_page_livre"]);
        return $livre;
    }

    public function addLivre(Livre $livre):void{

        $titre = str_replace("'","\'",$titre);
        $auteur = str_replace("'","\'",$auteur);


        $this->db->query("INSERT INTO `livre` (`id_livre`,`titre_livre`, `nombre_page_livre`, `auteur_livre`) 
            VALUES (NULL, '$titre', '$nbPages', '$auteur');");

    }

    public function addErreur($nomErreur,$descriptionErreur):void {

        $this->erreurs [$nomErreur] = $descriptionErreur;

    }

    public function getErreur ():?array{

        if ($this->erreurs == []){
            return null;
        }else{
            return $this->erreurs;
        }
    }



}

