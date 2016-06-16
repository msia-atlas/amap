jQuery(document).ready(function() {
function add() {
    var collectionHolder = $('.bodyLignePanier');
    var prototype = collectionHolder.attr('data-prototype');
form = prototype.replace(new RegExp("_name_", 'g'), "_"+collectionHolder.children().length+"_");
    $('.bodyLignePanier').append(form);
}

$('a.add').click(function (event) {
    event.preventDefault();
    add();
});
});
