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

        // Insertion des champs pour informations
        var cardNode = document.createElement("div");
        cardNode.className += 'card col-md-12 mb-2';
        var cardBody = document.createElement("div");
        cardBody.classList.add('card-body');
        cardNode.appendChild(cardBody);
        cardBody.innerHTML = `<p><strong>Nom:</strong> ${etage.libelle_etage} | <strong>Nombre chambre:</strong> ${etage.nombre_chambre}</p>`
        etages.push(etage);
        form.insertBefore(cardNode, document.getElementById('boutons'));


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

    // boutonCreer.addEventListener('click', function () {
    //     var reg = /^[a-z0-9]+$/i;
    //     var libelle = document.getElementById('libelle');
    //     if (libelle.value.length <= 0 || !reg.test(libelle.value))
    //         alert('remplir libelle');
    //     else {
    //         data = {
    //             'libelle': libelle.value,
    //             'etages': etages
    //         };
    //         console.log(data);
    //         var token = document.getElementById('csrf_token');
    //         var params = typeof data == 'string' ? data : Object.keys(data).map(
    //             function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
    //         ).join('&');
    //         var xhr = new XMLHttpRequest();
    //         xhr.open('POST', APP_URL + '/pavillon/sauver');
    //         xhr.onreadystatechange = function() {
    //             if (xhr.readyState>3 && xhr.status==200) { console.log(xhr.responseText); }
    //         };
    //         xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    //         xhr.setRequestHeader('X-CSRF-TOKEN', token.getAttribute('content'));
    //         xhr.send(params);
    //     }
    // }, false);
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