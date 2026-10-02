<?php
require_once "modele/bd.php";

class ModeleUtilisateur
{
    // Permet d'obtenir un produit à partir de son nom
    public static function ObtenirUtilisateur(string $nom)
    {
        $connexion = BD::ObtenirConnexion();

        // Préparation de la requête SQL avec un paramètre nommé
        $req = $connexion->prepare(
            "SELECT * FROM utilisateurs WHERE nom = :nom"
        );

        // Liaison du paramètre ':nom' avec la variable $nom
        $req->bindParam(':nom', $nom);

        // Exécution de la requête
        $req->execute();

        // Retourne l'objet PDOStatement contenant le résultat
        return $req;
    }

    public static function AjouterUtilisateur(string $nom, string $mot_de_passe)
    {
        $connexion = BD::ObtenirConnexion();

        // Préparation de la requête SQL avec un paramètre nommé
        $req = $connexion->prepare(
            "INSERT INTO utilisateurs (nom, mot_de_passe) VALUES (:nom, :mot_de_passe)"
        );

        // Liaison du paramètre ':nom' avec la variable $nom
        $req->bindParam(':nom', $nom);
        $req->bindParam(':mot_de_passe', $mot_de_passe);

        // Exécution de la requête
        $req->execute();

        // Retourne l'objet PDOStatement contenant le résultat
        return $connexion->lastInsertId();
    }

    public static function ModifierUtilisateur(string $vieuxNom, string $nouveauNom, string|null $email, string|null $image)
    {
        $connexion = BD::ObtenirConnexion();

        // Préparation de la requête SQL avec un paramètre nommé
        $req = $connexion->prepare(
            "UPDATE utilisateurs
            SET nom = :nouveauNom, email = :email, image = :image
            WHERE nom = :vieuxNom"
        );

        // Liaison du paramètre ':nom' avec la variable $nom
        $req->bindParam(':vieuxNom', $vieuxNom);
        $req->bindParam(':nouveauNom', $nouveauNom);
        $req->bindParam(':email', $email);
        $req->bindParam(':image', $image);
        
        // Exécution de la requête
        return $req->execute();
    }
}