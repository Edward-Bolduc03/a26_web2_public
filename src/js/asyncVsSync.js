document.addEventListener("DOMContentLoaded", initialiser);

function initialiser() {
    document
        .querySelector("#btn-sync")
        .addEventListener("click", gererClickSync);
}

function gererClickSync() {
    const divAffichage = document.querySelector("#affichage-sync");
    const nbSecondes = obtenirNombreSecondes();
    const horodatageDepart = Date.now();

    // On vide la div d'affichage
    divAffichage.innerHTML = "";

    for (let i = 0; i < nbSecondes; i++) {
        while (Date.now() < horodatageDepart + i * 1000) {
            // Attente active d'une seconde
            // On attend activement
        }
        divAffichage.innerHTML += `${nbSecondes - i}<br>`;
    }
}

function obtenirNombreSecondes() {
    const inputNbSecondes = document.querySelector("#nombreSecondes");
    return inputNbSecondes.value;
}
