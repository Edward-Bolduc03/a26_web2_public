<?php
require_once "modele/bd.php";

class modeleArticles 
{
    public static function obtenirArticles()
    {
        $connexion = BD::ObtenirConnexion();
        $req = $connexion->prepare(
            "SELECT
                a.*,
                COALESCE(
                    (
                        SELECT JSON_ARRAYAGG(ia.url)
                        FROM images_articles ia
                        WHERE ia.article_id = a.id
                    ),
                    JSON_ARRAY()
                ) AS images
            FROM articles a;"
        );
        $req->execute();
        return $req;
    }
}