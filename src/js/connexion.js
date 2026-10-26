document.addEventListener("DOMContentLoaded", init);

function init() {
    const form = document.querySelector("#forumulaireConnexion");
    form.addEventListener("submit", gererSoumission);
}

async function gererSoumission (event) {
    event.preventDefault();
    event.stopPropagation();

    const form = event.currentTarget;
    const formData = new FormData(form);

    try {
        const reponse = await fetch("index.php?action=connecter", {
            method: "POST",
            body: formData
        }); 

        const donnees = await reponse.text();

        if (reponse.ok) {
            gererSuccesServeur(donnees);
        }
        else {
            gererErreurServeur(donnees);
        }
    } catch (error) {
        gererErreurClient();
    }

    
}

function gererSuccesServeur(donnees) {
    // alert("Success");
    document.querySelector("#reponse").innerHTML = `
    <div class="alert alert-success" role="alert">
        Connexion réussie, vous serez redirigé dans 2 secondes.
    </div>
    `;
    setTimeout(()=> {
        window.location.href = `index.php?action=afficherPageProfil`;
    },2000)
    
}

function gererErreurServeur(donnees) {
    // alert("Erreur : " + donnees);
    document.querySelector("#reponse").innerHTML = `
    <div class="alert alert-danger" role="alert"> 
        ${donnees} 
    </div>
    `;
}

function gererErreurClient() {
    document.querySelector("#reponse").innerHTML = `
    <div class="alert alert-danger" role="alert"> 
        Une erreur est survenue, veuillez réessayer.
    </div>
    `;
}