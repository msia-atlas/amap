
$(function () {
    $('.oui').click(function () {
        var iId = $(this).data('id');
        $(this).parent().find('.non').removeClass('active');
        $(this).addClass('active');
        savePreference(iId, 'oui');
    });
    $('.non').click(function () {
        $(this).parent().find('.oui').removeClass('active');
        $(this).addClass('active');
        savePreference($(this).data('id'), 'non');
    });
}); 

/**
 * 
 * @param {integer} id
 * @param {string} statut
 * @returns {undefined}
 */
function savePreference(id, statut) {
    $.ajax({
        url: Routing.generate('preferenceConsommateur_save'),
        type: 'POST',
        format: 'JSON',
        data: {
            id: id,
            statut: statut
        },
        success: function (code_html, statut) {
            alertSuccess('Preference sauvegardée');
        },
        error: function (resultat, statut, erreur) {
            alertError('Preference non sauvegardée');
        }

    });
}
