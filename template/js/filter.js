$(document).ready(function () {
// Slide range
//     $("#slider-range").slider({
//         range: true,
//         min: 0,
//         max: 500,
//         values: [25, 250],
//         slide: function (event, ui) {
//             $("#amount").val("$ " + ui.values[0]);
//             $("#amount1").val("$ " + ui.values[1]);
//         }
//     });
//     $("#amount").val("$ " + $("#slider-range").slider("values", 0));
//     $("#amount1").val("$ " + $("#slider-range").slider("values", 1));
//Aside Accordeon
    $('[data-accordeon-head]').on('click', function () {
        $(this).next().toggleClass('accordeon-body--active');
    });
// Default color svg-active
    $('.top-filter__icon--grid svg').css('fill', '#36C2FF');
// Change view
    $('.top-filter__icon').on("click", function (e) {
        let target = $(event.target);
        if (target.is('.top-filter__icon--list') || target.is('#list')) {
            $('.view-grid').addClass('view-list').removeClass('view-grid');
            $('.card__grid').css('display', 'none');
            $('.card__list').css({'display':'flex','width':'100%'});
            $('.top-filter__icon--list svg').css('fill', '#36C2FF');
            $('.top-filter__icon--grid svg').css('fill', '#64759f');
        } else if (target.is('.top-filter__icon--grid') || target.is('#grid')) {
            $('.view-list').addClass('view-grid').removeClass('view-list');
            $('.card__grid').css('display', 'flex');
            $('.card__list').css('display', 'none');
            $('.top-filter__icon--grid svg').css('fill', '#36C2FF');
            $('.top-filter__icon--list svg').css('fill', '#64759f');

            console.log($(event.target).attr('class'));

        }
    });

    $(window).resize(function () {
        if ($(document).width() < 768) {
            $('.view-list').addClass('view-grid').removeClass('view-list');
            $('.card__grid').css('display', 'flex');
            $('.card__list').css('display', 'none');
            $('.top-filter__icon--grid svg').css('fill', '#36C2FF');
            $('.top-filter__icon--list svg').css('fill', '#64759f');
        }
    });


});