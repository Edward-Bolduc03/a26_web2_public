<?php

function afficherPageAccueil()
{
    require_once 'vue/accueil.php';
}

function afficherPageJeuMemoire()
{
    $classes = [
        'text-bg-primary',
        'text-bg-success',
        'text-bg-warning',
        'text-bg-danger',
        'text-bg-secondary',
        'text-bg-dark'
    ];

    // Dupliquer les classes pour qu'elles apparaissent deux fois
    $classes = array_merge($classes, $classes);

    // Mélanger les classes
    shuffle($classes);

    // Créer un tableau 4x3
    $cartes = array_chunk($classes, 3);

    require "vue/memoire.php";
}

function afficherPageAsyncVsSync()
{
    require 'vue/asyncVsSync.php';
}

function afficherPageFormulaire()
{
    require 'vue/formulaire.php';
}
