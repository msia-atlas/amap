jQuery(document).ready(function() {
function add() {
    var collectionHolder = $('.bodyLignePanier');
    var prototype = collectionHolder.attr('data-prototype');
    form = prototype.replace(/\$\$name\$\$/g, collectionHolder.children().length);
    $('.bodyLignePanier').append(form);
}

$('a.add').click(function (event) {
    event.preventDefault();
    add();
});
});
