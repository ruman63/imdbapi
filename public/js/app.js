$(document).ready(function() {
    $('select').material_select();
    $('a[data-expand]').on('click', function (e) {
        const ID = $(this).data('expand');
        $('.collapsible').collapsible('open', 0);
    })
});
