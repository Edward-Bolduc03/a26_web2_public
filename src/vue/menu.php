<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Navigation principale">
    <div class="container">
        <!-- Bouton hamburger pour les petits écrans -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu de navigation -->
        <!-- Sur les petits écrans, les éléments du menu sont cachés par défaut et -->
        <!-- doivent être affichés lorsque le bouton hamburger est cliqué -->
        <div class="collapse navbar-collapse" id="navbar">
            <!-- Boutons de navigation à gauche -->
            <ul class="navbar-nav me-auto">
                <!-- Bouton vers la page d'accueil -->
                <li class="nav-item">
                    <a
                        class="nav-link <?php NavClass("afficherPageAccueil");
                                        NavClassDefault(); ?>"
                        href="index.php?action=afficherPageAccueil">
                        Accueil
                    </a>
                </li>
                <!-- Bouton vers la page du jeu de mémoire -->
                <li class="nav-item">
                    <a
                        class="nav-link <?php NavClass("afficherPageJeuMemoire"); ?>"
                        href="index.php?action=afficherPageJeuMemoire">
                        Mémoire
                    </a>
                </li>
                <!-- Bouton vers la page Async vs Sync -->
                <li class="nav-item">
                    <a
                        class="nav-link <?php NavClass("afficherPageAsyncVsSync"); ?>"
                        href="index.php?action=afficherPageAsyncVsSync">
                        Async vs Sync
                    </a>
                </li>
                <!-- Bouton vers la page du formulaire -->
                <li class="nav-item">
                    <a
                        class="nav-link <?php NavClass("afficherPageFormulaire"); ?>"
                        href="index.php?action=afficherPageFormulaire">
                        Formulaire
                    </a>
                </li>
            </ul>
            <!-- Boutons de navigation à droite -->
            <ul class="navbar-nav">
            </ul>
        </div>
    </div>
</nav>

<?php
// Ajoute la classe active si le lien de menu est actif selon l'action demandée dans l'URL
function NavClass(string $menu)
{
    if (isset($_GET['action']) && $_GET['action'] === $menu) {
        echo ' active ';
    }
}

// Ajoute la classe active si aucune action n'est spécifiée dans l'URL.
// Un seul élément du menu (généralement l'accueil) devrait appeler cette fonction.
function NavClassDefault()
{
    if (!isset($_GET['action'])) {
        echo ' active ';
    }
}

// Vérifie si l'utilisateur est connecté en vérifiant la présence de la variable de session
function estConnecte()
{
    return isset($_SESSION['utilisateur']);
}
?>