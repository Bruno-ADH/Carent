(function ($) {
    "use strict";

    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);

    });


    // Date and time picker
    $('.date').datetimepicker({
        format: 'L'
    });
    $('.time').datetimepicker({
        format: 'LT'
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


    // parking isotope and filter
    var parkingIsotope = $('.parking-container').isotope({
        itemSelector: '.parking-item',
        layoutMode: 'fitRows'
    });
    $('#parking-flters li').on('click', function () {
        $("#parking-flters li").removeClass('active');
        $(this).addClass('active');

        parkingIsotope.isotope({ filter: $(this).data('filter') });
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 100,
        items: 1,
        dots: false,
        loop: true,
    });

    $('#searchInput').on('input', function() {
        var searchTerm = $(this).val();

         if (searchTerm.length >= 1) {
            $('#carlist').addClass('d-none');
            $.ajax({
                url: '/catalogue/search-carjs',
                method: 'GET',
                data: { term: searchTerm },
                success: function(data) {
                    $('#searchResults').html(data);
                    $('#searchResults').show();
                },
            });
        } else {
            $('#carlist').removeClass('d-none');
            $('#searchResults').hide();
        }
    });

})(jQuery);

