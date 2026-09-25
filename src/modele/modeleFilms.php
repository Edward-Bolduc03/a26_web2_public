<?php 
require_once "modele/bd.php";

class ModeleFilms 
{
    public static function obtenirFilm() 
    {
        $connexion = BD::ObtenirConnexion();

        $requete = $connexion->prepare(
            "SELECT * FROM films"
        );

        $requete->execute();

        return $requete;
    }

    public static function ajouterFilm(string $titre) 
    {
        $connexion = BD::ObtenirConnexion();

        $requete = $connexion->prepare(
            "INSERT INTO `films` (`titre`) VALUES
            (:titre)"
        );

        $requete->bindParam(':titre', $titre);

        $requete->execute();

        return $requete;
    }
}