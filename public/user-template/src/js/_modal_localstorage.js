(function ($) {
    $("body").on(
        "click",
        "#ModalDiscount .pt-modal-discount .checkbox-group",
        function () {
            localStorage.setItem("showedmodal", "toshow");
        }
    );
})(jQuery);
