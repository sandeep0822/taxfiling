$(document).ready(function() {
    $("#testimonial-slider").owlCarousel({
        items: 2,
        itemsDesktop: [1000, 2],
        itemsDesktopSmall: [979, 2],
        itemsTablet: [768, 1],
        pagination: false,
        navigation: true,
        navigationText: ["", ""],
        autoPlay: true,
    });
});
function aos_init() {
    AOS.init({
        duration: 1000,
        once: true,
    });
}
$(window).on("load", function() {
    aos_init();
});
$(document).ready(function() {
    $("tbody").scroll(function(e) {
        $("thead").css("left", -$("tbody")
            .scrollLeft()); //fix the thead relative to the body scrolling
        $("thead th:nth-child(1)").css("left", $("tbody")
            .scrollLeft()); //fix the first cell of the header
        $("tbody td:nth-child(1)").css("left", $("tbody")
            .scrollLeft()); //fix the first column of tdbody
    });
});
$(window).on("load", function() {
    setTimeout(function() {
        $("#myModal").modal("show");
    }, 5000);
});
