$(document).ready(function() {
    $('select').material_select();
    $('a[data-expand]').on('click', function (e) {
        const ID = $(this).data('expand');
        $('.collapsible').collapsible('open', 0);
    })

    $('span[data-toast]').each( function(i, el) {
        const text = $(el).data('text');
        const duration = $(el).data('duration');
        Materialize.toast(text, duration, 'rounded');
    });
});
