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
let deuxiemeCarte;

/**
 * Gère le clic sur une carte
 * @param {Event} event 
 */
function gererClickCarte(event) {
    const carte = event.currentTarget; // Récupère la carte cliquée
    const couleur = carte.dataset.couleur; // Récupère la couleur de la carte
    carte.classList.add(couleur); // Ajoute la classe de couleur à la carte

    // Si premièreCarte est undefined, on la définit à la carte cliquée
    if (deuxiemeCarte !== premiereCarte && deuxiemeCarte == undefined) {
        deuxiemeCarte = carte;
        console.log(deuxiemeCarte.couleur);
    }
    if (premiereCarte == undefined) {
        premiereCarte = carte;
        console.log(premiereCarte.couleur);
    }
    if ((premiereCarte !== undefined && deuxiemeCarte !== undefined) && premiereCarte.couleur == deuxiemeCarte.couleur){
        premiereCarte.innerHTML = `<i class="fa-solid fa-eye"></i>`;
        deuxiemeCarte.innerHTML = `<i class="fa-solid fa-eye"></i>`;
    } 
}