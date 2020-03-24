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

var swiper = new Swiper('.swiper-container', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
