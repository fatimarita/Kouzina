console.log('JS bien chargé');

window.onload = function() {
    $('#likes button').on('click', function() {
        // Récupération de l'id
        const id = $('#likes button').first().data('id');

        const params = {
            url: 'http://kouzina/recette/likes/' + id
        };
        // Lancement de l'appel AJAX
        $.ajax(params).done(displayNewLikes);
    });

};


function displayNewLikes(json) {
    // Afficher la nouvelle valeur du nombre de likes
    $('#likes span').text(json.cpt);
}