(function ($) {
    $(".modal").on("shown.bs.modal", function (e) {
        var modalSrc = $(this).attr("data-srcvalue") || "false",
            point = $(this).find(".modal-dialog");

        if (modalSrc == "false") {
            return false;
        }

        $.ajax({
            url: modalSrc,
            success: function (data) {
                var $item = $(data);
                point.append($item);
                if (modalSrc == "ajax-content/ajax_modal-quick-view.html") {
                    $("#ModalquickView .pt-gallery").galleryPreview({});
                }
            },
        });
    });
})(jQuery);
