<?php
function afficherPageAccueil()
{
    require 'vue/accueil.php';
}

function afficherPageConnexion()
{
    if (isset($_SESSION['nomUtilisateur']))
        {
            header('location:index.php?action=afficherPageProfil');
        }
    require 'vue/connexion.php';
}

function afficherPageProfil()
{
    if (!isset($_SESSION['nomUtilisateur'])) 
        {
            header('location:index.php?action=afficherPageConnexion');
            exit;
        }
    require 'vue/profil.php';
}

function validerDonneesConnexion()
{
    $erreurs = [];
    if (empty($_POST['nomUtilisateur']) || mb_strlen($_POST['nomUtilisateur']) < 3 || mb_strlen($_POST['nomUtilisateur']) > 45) {
        $erreurs[] = 'Le nom d\'utilisateur est requis et doit contenir entre 3 et 45 caractères.';
    }
    if (empty($_POST['motDePasse']) || mb_strlen($_POST['motDePasse']) < 6 || mb_strlen($_POST['motDePasse']) > 45) {
        $erreurs[] = 'Le mot de passe est requis et doit contenir entre 6 et 45 caractères.';
    }
    return $erreurs;
}

function connecter()
{
    $erreurs = validerDonneesConnexion();
    if (!empty($erreurs)) {
        $_SESSION['erreurs'] = $erreurs;
        header('Location: index.php?action=afficherPageConnexion');
        exit;
    }
    if ($_POST['nomUtilisateur'] !== 'admin' ||
        $_POST['motDePasse'] !== '123456') 
    {
        $_SESSION['erreurs'] = ['Nom d\'utilisateur ou mot de passe incorrect.'];
        header('Location: index.php?action=afficherPageConnexion');
        exit;
    }
    else
    {   // Rediriger vers la page du profil après une connexion réussie
        
        $_SESSION['nomUtilisateur'] = $_POST['nomUtilisateur'];
        $_SESSION['motDePasse'] = $_POST['motDePasse'];
        header('Location: index.php?action=afficherPageProfil');
        exit;
    }
}

function deconnecter() 
{
    session_unset();
    session_destroy();
    header('location:index.php?action=afficherPageAccueil');
    exit;
}