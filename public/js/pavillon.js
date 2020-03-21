document.addEventListener("DOMContentLoaded", function() {
    var etages = [];
    var data = {};
    var modal = document.getElementById('exampleModal');
    var boutonAjoutEtage = document.getElementById('ajout_etage');
    var boutonCreer = document.getElementById('bouton_creer');
    var form = document.getElementById('enregistrer_form');
    var nombreEtageInput = document.createElement('input');
    nombreEtageInput.setAttribute('type', 'hidden');
    nombreEtageInput.setAttribute('value', '0');
    nombreEtageInput.setAttribute('name', 'nombreEtage');
    form.appendChild(nombreEtageInput);

    boutonAjoutEtage.addEventListener('click', function () {
        var etage = {
            libelle_etage : document.getElementById('libelle_etage').value,
            nombre_chambre : document.getElementById('nombre_chambre').value
        };
        var button = document.createElement('button');

        button.setAttribute('type', 'button');
        button.className += 'btn btn-sm btn-danger float-right';
        button.innerHTML = 'Supprimer';

        // Insertion des champs pour informations
        var cardNode = document.createElement("div");
        cardNode.className += 'card col-md-12 mb-2';
        var cardBody = document.createElement("div");
        cardBody.classList.add('card-body');
        cardNode.appendChild(cardBody);
        cardBody.innerHTML = `<strong>Nom:</strong> ${etage.libelle_etage} | <strong>Nombre chambre:</strong> ${etage.nombre_chambre}`
        cardBody.appendChild(button);
        etages.push(etage);
        form.insertBefore(cardNode, document.getElementById('boutons'));

        button.addEventListener('click', function () {
            etages = etages.filter(e => e.libelle_etage !== etage.libelle_etage);
            form.removeChild(cardNode);
            console.log(etages);
        }, false)
        // Insertion des champs masqués pour pouvoir transmettre les informations au niveau de la requête
        var etageInput = document.createElement('input');
        etageInput.setAttribute('type', 'hidden');
        etageInput.setAttribute('name', 'etage' + nombreEtageInput.value);
        etageInput.setAttribute('value', `${etage.libelle_etage}|${etage.nombre_chambre}`);
        form.appendChild(etageInput);

        nombreEtageInput.setAttribute('value', (parseInt(nombreEtageInput.value) + 1) + '');

        console.log(nombreEtageInput.value);
        console.log(etages);
        closeOneModal("exampleModal");
        //modal.classList.remove('show');
    }, false);

    
});




function closeOneModal(modalId) {

    // get modal
    const modal = document.getElementById(modalId);

    // change state like in hidden modal
    modal.classList.remove('show');
    modal.setAttribute('aria-hidden', 'true');
    modal.setAttribute('style', 'display: none');

    // get modal backdrop
    const modalBackdrops = document.getElementsByClassName('modal-backdrop');

    // remove opened modal backdrop
    document.body.removeChild(modalBackdrops[0]);
}