(function ($) {
    $(".modal").on("shown.bs.modal", function (e) {
        var $this = $(this);

        $(this)
            .find(".pt-options-swatch li a")
            .each(function () {
                $(this).css({
                    "background-image": "url(" + $(this).attr("data-src") + ")",
                });
            });
        setTimeout(function () {
            $this.find(".lazyload").each(function () {
                if (!$(this).hasClass("loaded")) {
                    $(this).attr("src", $(this).data("src"));
                }
            });
        }, 0.2);
    });
})(jQuery);
