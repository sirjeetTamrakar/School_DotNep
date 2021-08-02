
$(document).ready(function () {
    $(".banner-carousel").slick({
        infinite: true,
        speed: 300,
    });
});
$(document).ready(function () {
    $(".notice-carousel").slick({
        infinite: true,
        vertical: true,
        slidesToShow: 3,
        autoplay: true,
        autoplaySpeed: 1000,
        slidesToScroll: 1,
        verticalSwiping: true,
    });
});

(function ($) {
    $(".dropdown-menu a.dropdown-toggle").on("click", function (e) {
        if (!$(this).next().hasClass("show")) {
            $(this)
                .parents(".dropdown-menu")
                .first()
                .find(".show")
                .removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass("show");

        $(this)
            .parents("li.nav-item.dropdown.show")
            .on("hidden.bs.dropdown", function (e) {
                $(".dropdown-submenu .show").removeClass("show");
            });

        return false;
    });
})(jQuery);

function openNav() {
document.getElementById("myNav").style.width = "100%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
document.getElementById("myNav").style.width = "0%";
}

$(".br-dropdown .brBtn").click(function(){
$(this).siblings().toggle('active');
});

$(function() {
$('marquee').mouseover(function() {
$(this).attr('scrollamount',1);
}).mouseout(function() {
$(this).attr('scrollamount',5);
});
});


$(".nav-item").hover(function(){
    $(this).children(".sub-menu").css("display", "block");
}, function(){
    $(this).children(".sub-menu").css("display", "none");
});



