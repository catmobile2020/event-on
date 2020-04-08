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

$(".delete-alert").click(function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })
});

var swiper = new Swiper('.swiper-container', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
