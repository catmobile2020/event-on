(function() {
    $('.toggle-menu').on('click', function() {
        $(this).toggleClass('active');
        $('aside').animate({width: 'toggle'}, 200);
    });
})();


$(".b-alert").click(function() {
    Swal.fire(
        'Thank you',
        'For registering',
        'success'
    )
});
