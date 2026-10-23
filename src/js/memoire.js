document.addEventListener("DOMContentLoaded", initialiserMemoire);

function initialiserMemoire() {
    ajouterEvenementClicCartes();
}

function ajouterEvenementClicCartes() {
    document.querySelectorAll(".carte").forEach(carte => {
        carte.addEventListener("click", gererClickCarte);
    });
}

/**
 * Variable pour stocker la première carte cliquée
 * @type {HTMLElement|undefined}
 */
let premiereCarte;
let enAttente = false;
const MAX_SCORE = 6;
let score = 0;

/**
 * Gère le clic sur une carte
 * @param {Event} event 
 */
function gererClickCarte(event) {
    if (enAttente) {
        return;
    }

    const carte = event.currentTarget; // Récupère la carte cliquée
    const couleur = carte.dataset.couleur; // Récupère la couleur de la carte
    carte.classList.add(couleur); // Ajoute la classe de couleur à la carte

    if (premiereCarte == undefined) {
        premiereCarte = carte;
        console.log(premiereCarte.couleur);
    }

    if (premiereCarte === carte){
        return;
    }

    if (premiereCarte.dataset.couleur === couleur){
        premiereCarte.innerHTML = `<i class="fa-solid fa-eye"></i>`;
        carte.innerHTML = `<i class="fa-solid fa-eye"></i>`;
        premiereCarte == undefined;

        score++; // On incrémente le score
        // Si l'utilisateur a trouvé toutes les paires, on affiche un message de félicitations
        if (score === MAX_SCORE) {
            const plateauJeuMemoire =
                document.querySelector("#plateauJeuMemoire");
            plateauJeuMemoire.innerHTML = `
                <div class="alert alert-success" role="alert">
                    Félicitations! Vous avez trouvé toutes les paires!
                </div>
                ${plateauJeuMemoire.innerHTML}
            `;
        }
        return;
    }

    const anciennePremiereCarte = premiereCarte;
    enAttente = true;
    premiereCarte = undefined;
    setTimeout(() => {
        anciennePremiereCarte.classList.remove(anciennePremiereCarte.dataset.couleur);
        carte.classList.remove(couleur);
        enAttente = false;
    }, 1000);
}