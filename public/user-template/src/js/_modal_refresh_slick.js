(function ($) {
    $(".modal").on("shown.bs.modal", function (e) {
        var objSlickSlider = $(this).find(".slick-slider");
        if (objSlickSlider.length) {
            objSlickSlider.each(function () {
                $(this).slick("getSlick").refresh();
            });
        }
    });
})(jQuery);
