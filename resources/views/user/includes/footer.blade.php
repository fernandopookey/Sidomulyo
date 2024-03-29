<style>
    .footer-content-self {
        background-color: red;
        /* justify-content: space-around; */
    }

    .footer-image {
        -webkit-transform: scale(1);
        transform: scale(1);
        -webkit-transition: .3s ease-in-out;
        transition: .3s ease-in-out;
    }

    .footer-image:hover {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
</style>

<footer id="pt-footer" style="background: linear-gradient(to left, #33ccff 43%, #0000cc 100%);">
    <div class="pt-footer-col tt-color-scheme-01">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="pt-mobile-collapse">
                        <h4 class="pt-footer-title pt-collapse-title" style="color: white;">
                            Alamat Kami
                            <i class="pt-icon">
                                <svg viewBox="0 0 16 16" fill="none">
                                    <use xlink:href="#icon-close"></use>
                                </svg>
                            </i>
                        </h4>
                        <div class="pt-collapse-content">
                            @foreach ($sosmed as $item)
                            <ul class="pt-list">
                                <li class="mb-2">
                                    <img src="{{ Storage::url($item->photos) }}" class="footer-image" width="100"
                                        alt="">
                                </li>
                                <li>
                                    <a href="https://www.google.com/maps/place/SIDOMULYO+ADVERTISING+%26+PRINTING/@-7.3252615,110.4989932,17.69z/data=!4m6!3m5!1s0x2e7a792dcfede13f:0x4e769037bd843457!8m2!3d-7.3250743!4d110.4994406!16s%2Fg%2F11tj05ylc8?hl=id"
                                        target="_blank" style="color: white;">
                                        {!! $item->alamat !!}
                                    </a>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4">
                    <div class="pt-mobile-collapse">
                        <h4 class="pt-footer-title pt-collapse-title" style="color: white;">
                            Info
                            <i class="pt-icon">
                                <svg viewBox="0 0 16 16" fill="none">
                                    <use xlink:href="#icon-close"></use>
                                </svg>
                            </i>
                        </h4>
                        <div class="pt-collapse-content">
                            <ul class="pt-list">
                                <li>
                                    <a href="{{ route('profile') }}" style="color: white;">Tentang Kami</a>
                                </li>
                                <li>
                                    <a href="{{ route('product') }}" style="color: white;">Produk Kami</a>
                                </li>
                                <li>
                                    <a href="{{ route('blog') }}" style="color: white;">Blog Kami</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-4 col-lg-2">
                    <div class="pt-mobile-collapse">
                        <h4 class="pt-footer-title pt-collapse-title">
                            Alamat Kami
                        </h4>
                        <div class="pt-collapse-content">
                            <ul class="pt-list">
                                <li><a href="page-faq.html">FAQs</a></li>
                                <li>Jln Bla Bla Bla</li>
                                <small>Klik Gambar Untuk Lihat Rute</small>
                                <a href="https://www.google.com/maps/place/Bunda+Kost/@-7.3262107,110.4795759,14z/data=!4m6!3m5!1s0x2e7a793152ec3303:0x25394de136cd0198!8m2!3d-7.3324749!4d110.497192!16s%2Fg%2F11fmfwhz75"
                                    target="_blank" class="footer-img-map">
                                    <img src="/images/neon.png" alt="">
                                </a>
                            </ul>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-4 col-lg-4">
                    <div class="pt-mobile-collapse">
                        @foreach ($sosmed as $item)
                        <h4 class="pt-footer-title pt-collapse-title" style="color: white;">
                            Sosial Media Kami
                            <i class="pt-icon">
                                <svg viewBox="0 0 16 16" fill="none">
                                    <use xlink:href="#icon-close"></use>
                                </svg>
                            </i>
                        </h4>
                        <div class="pt-collapse-content">
                            <ul class="pt-list">
                                <li class="align-items-center li-sosmed-footer">
                                    <a target="_blank" href="{{ $item->whatsapp }}" class="sosmed-footer d-flex">
                                        <img src="/images/wa.svg" style="max-width: 22px" alt="">
                                        <div class="px-1" style="color: white;">{{ $item->whatsapp_title }}</div>
                                    </a>
                                </li>
                                <li class="align-items-center">
                                    <a target="_blank" href="{{ $item->instagram }}" class="sosmed-footer d-flex">
                                        <img src="/images/ig.svg" style="max-width: 22px" alt="">
                                        <div class="px-1" style="color: white;">{{ $item->instagram_title }}</div>
                                    </a>
                                </li>
                                <li class="align-items-center">
                                    <a target="_blank" href="{{ $item->facebook }}" class="sosmed-footer d-flex">
                                        <img src="/images/fb.svg" style="max-width: 22px" alt="">
                                        <div class="px-1" style="color: white;">{{ $item->facebook_title }}</div>
                                    </a>
                                </li>
                                <li class="align-items-center">
                                    <a target="_blank" href="{{ $item->shopee }}" class="sosmed-footer d-flex">
                                        <img src="/images/shopee.svg" style="max-width: 22px" alt="">
                                        <div class="px-1" style="color: white;">{{ $item->shopee_title }}</div>
                                    </a>
                                </li>
                                <li class="align-items-center">
                                    <a target="_blank" href="{{ $item->tokopedia }}" class="sosmed-footer d-flex">
                                        <img src="/images/tokopedia.svg" style="max-width: 22px" alt="">
                                        <div class="px-1" style="color: white;">{{ $item->tokopedia_title }}</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="pt-footer-custom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- copyright -->
                    <div class="pt-box-copyright">
                        &copy; 2020 Yanka Ecommerce HTML template. All Rights Reserved by <a
                            href="https://themeforest.net/user/softali/portfolio" target="_blank">SoftAli.</a>
                    </div>
                </div>
                <div class="col-12">
                    <!-- payment-list -->
                    <ul class="pt-payment-list">
                        <li><a href="page404.html">
                                <svg width="67" height="19" viewBox="0 0 67 19">
                                    <use xlink:href="#icon-payment_01"></use>
                                </svg>
                            </a></li>
                        <li><a href="page404.html">
                                <svg width="50" height="17" viewBox="0 0 50 17">
                                    <use xlink:href="#icon-payment_02"></use>
                                </svg>
                            </a></li>
                        <li><a href="page404.html">
                                <svg width="42" height="24" viewBox="0 0 42 24">
                                    <use xlink:href="#icon-payment_03"></use>
                                </svg>
                            </a></li>
                        <li><a href="page404.html">
                                <svg width="55" height="18" viewBox="0 0 55 18">
                                    <use xlink:href="#icon-payment_04"></use>
                                </svg>
                            </a></li>
                        <li><a href="page404.html">
                                <svg width="65" height="22" viewBox="0 0 65 22">
                                    <use xlink:href="#icon-payment_05"></use>
                                </svg>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
</footer>
<a href="#" id="js-back-to-top" class="pt-back-to-top">
    <span class="pt-icon">
        <svg version="1.1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;"
            xml:space="preserve">
            <g>
                <polygon fill="currentColor" points="20.9,17.1 12.5,8.6 4.1,17.1 2.9,15.9 12.5,6.4 22.1,15.9 	">
                </polygon>
            </g>
        </svg>
    </span>
    <span class="pt-text">BACK TO TOP</span>
</a>
{{-- <div class="pt-promofixed" id="js-init-promofixed">
    <a href="#" class="pt-btn-close">
        <svg fill="none">
            <use xlink:href="#icon-close"></use>
        </svg>
    </a>
    <div id="js-slick-promofixed" class="promofixed-list-item">
        <a href="product-type-04.html" class="pt-item">
            <div class="pt-img">
                <picture>
                    <source srcset="images/product/product-06.webp" type="image/webp">
                    <source srcset="images/product/product-06.jpg" type="image/png">
                    <img class="lazyload"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAArwAAAOCAQMAAACvc5NpAAAAA1BMVEUAAACnej3aAAAAAXRSTlMAQObYZgAAAHBJREFUeNrswYEAAAAAgKD9qRepAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADg9uCABAAAAEDQ/9f9CBUAAAAAAAAAAAAAAAAAAAAAAGAiOEEAAVstZ/kAAAAASUVORK5CYII="
                        data-lazy="images/product/product-06.webp" alt="image">
                </picture>
            </div>
            <div class="pt-description">
                <p>Someone purchsed a</p>
                <h6 class="pt-title">Midi button-up denim skirt</h6>
                <div class="pt-info">
                    54 minutes ago from Moscow, Russia
                </div>
            </div>
        </a>
        <a href="product-type-04.html" class="pt-item">
            <div class="pt-img">
                <picture>
                    <source srcset="images/product/product-05.webp" type="image/webp">
                    <source srcset="images/product/product-05.jpg" type="image/png">
                    <img class="lazyload"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAArwAAAOCAQMAAACvc5NpAAAAA1BMVEUAAACnej3aAAAAAXRSTlMAQObYZgAAAHBJREFUeNrswYEAAAAAgKD9qRepAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADg9uCABAAAAEDQ/9f9CBUAAAAAAAAAAAAAAAAAAAAAAGAiOEEAAVstZ/kAAAAASUVORK5CYII="
                        data-lazy="images/product/product-05.webp" alt="image">
                </picture>
            </div>
            <div class="pt-description">
                <p>Someone purchsed a</p>
                <h6 class="pt-title">Midi button-up denim skirt</h6>
                <div class="pt-info">
                    14 Minutes ago from New York, USA
                </div>
            </div>
        </a>

    </div>
</div> --}}
<!-- modal "Add To Cart" -->
{{-- <div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog"
    data-srcvalue="ajax-content/ajax_modal-add-to-cart.html" aria-label="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm"></div>
</div> --}}
<!-- modal "Add Quick View" -->
{{-- <div class="modal fade" id="ModalquickView" tabindex="-1" role="dialog"
    data-srcvalue="ajax-content/ajax_modal-quick-view.html" aria-label="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-quick-view"></div>
</div> --}}
<!-- modal "Discount" -->
{{-- <div class="modal fade" id="ModalDiscount" tabindex="-1" role="dialog"
    data-srcvalue="ajax-content/ajax_modal-discount.html" aria-label="myModalLabel" aria-hidden="true" data-pause=2000
    data-localStorage=showedmodal>
    <div class="modal-dialog modal-md"></div>
</div> --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="external/jquery/jquery.min.js"><\/script>')
</script>
<script async src="js/bundle.js"></script>


{{-- <div class="pt-svg-sprite">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <symbol fill="none" viewBox="0 0 24 24" id="icon-arrow_large_left" xmlns="http://www.w3.org/2000/svg">
            <path d="M17 3l-9 9 9 9" stroke="currentColor" stroke-width="1.6" />
        </symbol>
        <symbol fill="none" viewBox="0 0 12 20" id="icon-arrow_large_right" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 1l9 9-9 9" stroke="currentColor" stroke-width="1.6" />
        </symbol>
        <symbol fill="none" viewBox="0 0 12 7" id="icon-arrow_small_bottom" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 1l5 5 5-5" stroke="currentColor" stroke-width="1.1" />
        </symbol>
        <symbol fill="none" viewBox="0 0 12 7" id="icon-arrow_small_top" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 6l5-5 5 5" stroke="currentColor" stroke-width="1.1" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-cart_1" xmlns="http://www.w3.org/2000/svg">
            <path fill="transparent" d="M0 0h24v24H0z" />
            <path
                d="M2.792 8.113l.008-.056V8A1.2 1.2 0 0 1 4 6.8h16A1.2 1.2 0 0 1 21.2 8v.057l.008.056 1.991 13.937A1.2 1.2 0 0 1 22 23.2H2a1.2 1.2 0 0 1-1.199-1.15L2.792 8.113z"
                stroke="currentColor" stroke-width="1.6" />
            <path d="M17 10c0-4.97-2.239-9-5-9s-5 4.03-5 9" stroke="currentColor" stroke-width="1.6" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-cart_1_disable" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M6.786 5.654c.254-.885.584-1.696.98-2.407C8.732 1.505 10.195.199 12 .199c1.803 0 3.267 1.306 4.235 3.048.395.71.725 1.522.98 2.407l5.22-5.22 1.13 1.13L19.132 6H20a2 2 0 0 1 2 2l2 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2L2 8a2 2 0 0 1 2-2h.869L.434 1.565 1.566.434l5.22 5.22zm1.566.345a9.827 9.827 0 0 1 .812-1.975c.842-1.516 1.878-2.225 2.836-2.225s1.994.709 2.836 2.225c.319.573.594 1.238.812 1.975H8.352zM6.37 7.6A16.71 16.71 0 0 0 6.2 10h1.6c0-.35.012-.696.034-1.034L10.869 12l-9.128 9.128L3.6 8.113v-.114c0-.22.18-.4.4-.4h2.37zM12 13.131l-9.269 9.268H21.27L12 13.131zm10.26 7.996l-9.129-9.128 3.035-3.034c.022.338.034.683.034 1.034h1.6c0-.825-.059-1.63-.17-2.4H20c.22 0 .4.18.4.4v.114l1.86 13.014zM12 10.867L8.731 7.6h6.538L12 10.868z"
                fill="currentColor" />
        </symbol>
        <symbol viewBox="0 0 24 23.8" id="icon-cart_1_plus" xmlns="http://www.w3.org/2000/svg">
            <g fill="currentColor">
                <path
                    d="M22 8c0-1.1-.9-2-2-2h-2.7C16.4 2.6 14.4.2 12 .2S7.6 2.6 6.7 6H4c-1.1 0-2 .9-2 2L0 22v.1C0 23.2.9 24 2 24h20c1.1 0 2-.8 2-1.9V22L22 8zM12 1.8c1.5 0 2.9 1.7 3.6 4.2H8.4c.7-2.5 2.1-4.2 3.6-4.2zm10 20.6H2c-.2 0-.4-.1-.4-.3l2-13.9V8c0-.2.2-.4.4-.4h2.4c-.1.8-.2 1.6-.2 2.4h1.6c0-.8.1-1.6.2-2.4h8c.1.8.2 1.6.2 2.4h1.6c0-.8-.1-1.6-.2-2.4H20c.2 0 .4.2.4.5l2 14c0 .2-.2.3-.4.3z" />
                <path d="M12.8 11h-1.6v3.2H8v1.6h3.2V19h1.6v-3.2H16v-1.6h-3.2z" />
            </g>
        </symbol>
        <symbol viewBox="0 0 24.2 23.8" id="icon-cart_2" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M22.1 5H6.9c-.3 0-.5.1-.7.1L5.1.2H0v1.6h3.9L5 7.3v.1l2 9c.2 1 1 1.6 1.9 1.6h11.3c.9 0 1.6-.6 1.8-1.6l2-9c.2-1.2-.7-2.4-1.9-2.4zm-1.7 11.1c0 .2-.2.3-.3.3H8.9c-.1 0-.2-.1-.3-.3L6.8 7.8l-.2-.7c0-.2 0-.3.1-.3.1-.1.1-.1.2-.1h15.2c.1 0 .1 0 .2.1 0 .1.1.2.1.4l-2 8.9zM9.5 19C8.1 19 7 20.1 7 21.5S8.1 24 9.5 24s2.5-1.1 2.5-2.5S10.9 19 9.5 19zm0 3.4c-.5 0-.9-.4-.9-.9s.4-.9.9-.9.9.4.9.9-.4.9-.9.9zm10-3.4c-1.4 0-2.5 1.1-2.5 2.5s1.1 2.5 2.5 2.5 2.5-1.1 2.5-2.5-1.1-2.5-2.5-2.5zm0 3.4c-.5 0-.9-.4-.9-.9s.4-.9.9-.9.9.4.9.9-.4.9-.9.9z"
                fill="currentColor" />
        </symbol>
        <symbol viewBox="0 0 24.2 23.8" id="icon-cart_2_plus" xmlns="http://www.w3.org/2000/svg">
            <g fill="currentColor">
                <path
                    d="M9.5 19C8.1 19 7 20.1 7 21.5S8.1 24 9.5 24s2.5-1.1 2.5-2.5S10.9 19 9.5 19zm0 3.4c-.5 0-.9-.4-.9-.9s.4-.9.9-.9.9.4.9.9-.4.9-.9.9zm10-3.4c-1.4 0-2.5 1.1-2.5 2.5s1.1 2.5 2.5 2.5 2.5-1.1 2.5-2.5-1.1-2.5-2.5-2.5zm0 3.4c-.5 0-.9-.4-.9-.9s.4-.9.9-.9.9.4.9.9-.4.9-.9.9zM13.8 9.8h1.6V6.6h3.2V5h-3.2V1.8h-1.6V5h-3.2v1.6h3.2z" />
                <path
                    d="M22.1 5h-1.9v1.7h1.9c.1 0 .1 0 .2.1 0 .1.1.2.1.4l-2 8.9c0 .2-.2.3-.3.3H8.9c-.1 0-.2-.1-.3-.3L6.8 7.8l-.2-.7c0-.2 0-.3.1-.3.1-.1.1-.1.2-.1H9V5H6.9c-.3 0-.5.1-.7.1L5.1.2H0v1.6h3.9L5 7.3v.1l2 9c.2 1 1 1.6 1.9 1.6h11.3c.9 0 1.6-.6 1.8-1.6l2-9c.2-1.2-.7-2.4-1.9-2.4z" />
            </g>
        </symbol>
        <symbol fill="none" viewBox="0 0 16 16" id="icon-close" xmlns="http://www.w3.org/2000/svg">
            <path d="M14.434.434l-14 14 1.132 1.132 14-14L14.434.434zm-14 1.132l14 14 1.132-1.132-14-14L.434 1.566z"
                fill="currentColor" />
        </symbol>
        <symbol viewBox="0 0 24 22" id="icon-compare" xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor"
                d="M5.5 8L0 17.2C0 20.5 2.4 23 5.5 23s5.5-2.5 5.5-5.8L5.5 8zm3.6 9.2H1.9l3.6-6.1 3.6 6.1zm-3.6 4.2c-1.7 0-3-1.1-3.6-2.6h7.2c-.6 1.5-1.9 2.6-3.6 2.6zM19 3.2h-4.1C14.5 1.9 13.4 1 12 1s-2.5.9-2.9 2.2H5v1.6h4.1C9.5 6.1 10.6 7 12 7s2.5-.9 2.9-2.2H19V3.2zm-7 2.2c-.8 0-1.4-.6-1.4-1.4s.6-1.4 1.4-1.4 1.4.6 1.4 1.4-.6 1.4-1.4 1.4zM18.5 8L13 17.2c0 3.2 2.4 5.8 5.5 5.8s5.5-2.5 5.5-5.8L18.5 8zm3.6 9.2h-7.2l3.6-6.1 3.6 6.1zm-3.6 4.2c-1.7 0-3-1.1-3.6-2.6h7.2c-.6 1.5-1.9 2.6-3.6 2.6z" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-compare-add" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M5.5 9L0 18.2C0 21.5 2.4 24 5.5 24s5.5-2.5 5.5-5.8L5.5 9zm3.6 9.2H1.9l3.6-6.1 3.6 6.1zm9.469-16.75l-3.966 1.04c-.717-1.155-2.01-1.747-3.364-1.391-1.354.355-2.19 1.505-2.246 2.864L5.027 5.004l.407 1.548L9.399 5.51c.717 1.155 2.01 1.747 3.364 1.391 1.354-.355 2.19-1.505 2.246-2.864l3.966-1.04-.406-1.549zm-6.212 3.905a1.367 1.367 0 0 1-1.71-.999 1.367 1.367 0 0 1 .999-1.71 1.367 1.367 0 0 1 1.71 1 1.367 1.367 0 0 1-1 1.709zM18.5 6L13 15.2c0 3.2 2.4 5.8 5.5 5.8s5.5-2.5 5.5-5.8L18.5 6zm3.6 9.2h-7.2l3.6-6.1 3.6 6.1z"
                fill="currentColor" />
        </symbol>
        <symbol viewBox="0 0 24 24" id="icon-edit" xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor"
                d="M2.3 20.4c-.1 0-.1 0 0 0H2c-.1 0-.1-.1-.2-.1-.1-.1-.1-.2-.1-.3v-.3l.6-5v-.1s0-.1.1-.1L14.6 2.1c.4-.4.8-.5 1.4-.5.5 0 1 .2 1.3.5l2.6 2.6c.4.4.5.8.5 1.3s-.2 1-.5 1.3L7.7 19.6s-.1 0-.1.1h-.1l-5.2.7zm.6-1.3l2.9-.4-2.6-2.6-.3 3zm.8-4.3L5 16.1l9.7-9.7L13.5 5l-9.8 9.8zm3.5 3.5L17 8.5l-1.3-1.3L5.9 17l1.3 1.3zM15.5 3l-1.2 1.2 3.5 3.5L19 6.5c.1-.1.2-.3.2-.4 0-.2-.1-.3-.2-.4L16.4 3c-.1-.1-.3-.2-.4-.2-.2 0-.4 0-.5.2z" />
        </symbol>
        <symbol id="icon-eye" xml:space="preserve" viewBox="0 0 24 16" xmlns="http://www.w3.org/2000/svg">
            <style>
                .anst0 {
                    fill: #333
                }
            </style>
            <path class="anst0"
                d="M23.9 11.7c-1-2.2-2.5-4.1-4.6-5.5C17.1 4.7 14.7 4 12 4s-5.1.7-7.3 2.2C2.6 7.6 1.1 9.4.1 11.7L0 12l.1.3c1 2.2 2.5 4.1 4.6 5.5C6.9 19.3 9.3 20 12 20s5.1-.7 7.3-2.2c2.1-1.4 3.6-3.2 4.6-5.5l.1-.3-.1-.3zm-5.5 4.8c-1.9 1.3-4 1.9-6.4 1.9-2.4 0-4.5-.6-6.4-1.9-1.7-1.2-3-2.6-3.9-4.5.8-1.8 2.1-3.3 3.9-4.5 1.9-1.3 4-1.9 6.4-1.9 2.4 0 4.5.6 6.4 1.9 1.7 1.2 3 2.6 3.9 4.5-.9 1.8-2.2 3.3-3.9 4.5z" />
            <path class="anst0"
                d="M12 7c-2.8 0-5 2.2-5 5s2.2 5 5 5 5-2.2 5-5-2.2-5-5-5zm0 8.4c-1.9 0-3.4-1.5-3.4-3.4s1.5-3.4 3.4-3.4 3.4 1.5 3.4 3.4-1.5 3.4-3.4 3.4z" />
        </symbol>
        <symbol viewBox="0 0 22 24" id="icon-filter" xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor"
                d="M9 24V12L1 5V0h22v5l-8 7v8l-6 4zM2.6 4.3l8 7V21l2.8-1.9v-7.9l8-7V1.6H2.6v2.7z" />
        </symbol>
        <symbol fill="none" viewBox="0 0 18 23" id="icon-lock" xmlns="http://www.w3.org/2000/svg">
            <circle cx="9" cy="14" r="2.2" stroke="currentColor" stroke-width="1.6" />
            <path d="M9 16v3M.8 7.8h16.4v14.4H.8z" stroke="currentColor" stroke-width="1.6" />
            <path
                d="M4.8 7c0-3.015 2.01-5.2 4.2-5.2V.2C5.666.2 3.2 3.387 3.2 7h1.6zM9 1.8c2.19 0 4.2 2.185 4.2 5.2h1.6C14.8 3.387 12.334.2 9 .2v1.6z"
                fill="currentColor" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-mail">
            <path d="M0 0h24v24H0z" />
            <path stroke="currentColor" stroke-width="1.6" d="M.8 4.8h22.4v14.4H.8z" />
            <path d="M1.5 5.5L12 13l10.5-7.5" stroke="currentColor" stroke-width="1.6" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-menu-404" xmlns="http://www.w3.org/2000/svg">
            <path fill="#fff" d="M0 0h24v24H0z" />
            <circle cx="12" cy="12" r="11.2" stroke="currentColor" stroke-width="1.6" />
            <path d="M17 7L7 17M7 7l10 10" stroke="currentColor" stroke-width="1.6" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-menu-delivery" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M24 12l-5.5-5H14V3H0v17h4.2c.4 1.2 1.5 2 2.8 2 1.3 0 2.4-.8 2.8-2h5.4c.4 1.2 1.5 2 2.8 2 1.3 0 2.4-.8 2.8-2H24v-8zm-6.1-3.4l3.9 3.6H14V8.6h3.9zM7 20.4c-.8 0-1.4-.6-1.4-1.4 0-.8.6-1.4 1.4-1.4.8 0 1.4.6 1.4 1.4 0 .8-.6 1.4-1.4 1.4zm2.9-2C9.7 17 8.4 16 7 16s-2.7 1-2.9 2.4H1.6V4.6h10.8v13.8H9.9zm8.1 2c-.8 0-1.4-.6-1.4-1.4 0-.8.6-1.4 1.4-1.4.8 0 1.4.6 1.4 1.4 0 .8-.6 1.4-1.4 1.4zm2.9-2C20.7 17 19.4 16 18 16s-2.7 1-2.9 2.4H14v-4.6h8.4v4.6h-1.5z"
                fill="currentColor" />
        </symbol>
        <symbol viewBox="0 0 24.1 24" id="icon-menu-documentation" xmlns="http://www.w3.org/2000/svg">
            <style>
                .atst0 {
                    fill: currentColor
                }
            </style>
            <path class="atst0"
                d="M21.3 12.2c0-1.5 1.2-2.6 2.6-2.6h.1c-.5-2.5-1.8-4.7-3.6-6.4-.2.3-.5.6-.8.8 0 0-.6.5-1.5.5-.5 0-1-.1-1.5-.5 0 0-1.1-.6-1.1-2.3 0-.4.1-.7.3-1.1C14.6.2 13.3 0 12 0c-1.2 0-2.4.2-3.5.5.6 1.2.1 2.7-1.1 3.4-.4.2-.9.3-1.3.3-.9 0-1.7-.4-2.2-1.2C2.1 4.6.7 6.7.1 9.1c1.4.1 2.4 1.3 2.4 2.6 0 1.4-1.1 2.5-2.5 2.6.5 2.4 1.7 4.6 3.5 6.3.5-.8 1.3-1.2 2.2-1.2.5 0 .9.1 1.4.4 1.2.7 1.7 2.3 1 3.5 1.3.4 2.6.7 4 .7 1.2 0 2.3-.2 3.4-.5-.7-1.2-.2-2.8 1-3.5.4-.2.8-.3 1.3-.3 1 0 1.9.5 2.4 1.4 1.9-1.6 3.3-3.8 3.9-6.3-1.7 0-2.8-1.2-2.8-2.6zm-1.2 6.6c-.7-.5-1.5-.7-2.4-.7-.7 0-1.4.2-2.1.5-1 .6-1.7 1.5-2 2.6-.1.4-.1.7-.1 1.1-.5.1-1 .1-1.4.1-.7 0-1.4-.1-2.1-.2 0-.4 0-.8-.1-1.2-.3-1.1-1-2-2-2.5-.7-.4-1.4-.6-2.1-.6-.7 0-1.5.2-2.1.5-.7-.9-1.3-1.9-1.7-3 1.3-.7 2.2-2.1 2.2-3.6s-.8-2.9-2-3.6c.4-1.1 1-2 1.8-2.9.6.4 1.4.6 2.2.6.7 0 1.5-.2 2.1-.5 1.4-.8 2.1-2.1 2.2-3.6.5-.1 1.1-.1 1.7-.1.6 0 1.2.1 1.9.2 0 2 1.1 3.1 1.8 3.6s1.6.8 2.4.8c1 0 1.8-.4 2.2-.6.7.9 1.3 1.9 1.7 3-1.4.7-2.3 2.1-2.3 3.7v.1c0 1.6.9 3 2.2 3.7-.6.7-1.3 1.7-2 2.6z" />
            <path class="atst0"
                d="M12 8c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4zm0 6.4c-1.3 0-2.4-1.1-2.4-2.4s1.1-2.4 2.4-2.4 2.4 1.1 2.4 2.4-1.1 2.4-2.4 2.4z" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-menu-faqs" xmlns="http://www.w3.org/2000/svg">
            <path fill="#fff" d="M0 0h24v24H0z" />
            <circle cx="12" cy="12" r="11.2" stroke="currentColor" stroke-width="1.6" />
            <path d="M8 9a4 4 0 1 1 4 4v3m0 2v2" stroke="currentColor" stroke-width="1.6" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-menu-mail" xmlns="http://www.w3.org/2000/svg">
            <path stroke="currentColor" stroke-width="1.6" d="M.8 4.8h22.4v14.4H.8z" />
            <path d="M1.5 5.5L12 13l10.5-7.5" stroke="currentColor" stroke-width="1.6" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-menu-maintance" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0)">
                <path fill="#fff" d="M0 0h24v24H0z" />
                <path
                    d="M6.194 23L3.75 20.708 1 17.944l6.828-6.16A7.868 7.868 0 0 1 17.956 1.523l-4.303 4.302a1.222 1.222 0 0 0 0 1.728l2.795 2.795c.477.477 1.25.477 1.728 0l4.302-4.303a7.867 7.867 0 0 1-10.097 10.19L6.194 23z"
                    stroke="currentColor" stroke-width="1.6" />
            </g>
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-menu-men" xmlns="http://www.w3.org/2000/svg">
            <path fill="#fff" d="M0 0h24v24H0z" />
            <path d="M2.826 23.2c.36-5.393 4.323-9.4 9.174-9.4 4.851 0 8.815 4.007 9.174 9.4H2.826z"
                stroke="currentColor" stroke-width="1.6" />
            <circle cx="12" cy="10" r="9.2" fill="#fff" stroke="currentColor" stroke-width="1.6" />
            <mask id="axa" fill="#fff">
                <path d="M21.628 12.702a10 10 0 1 0-19.317-.228L12 10l9.628 2.702z" />
            </mask>
            <path d="M21.628 12.702a10 10 0 1 0-19.317-.228L12 10l9.628 2.702z" fill="#fff" stroke="currentColor"
                stroke-width="3.2" mask="url(#axa)" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-menu-return" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 2L2 9l7 7" stroke="currentColor" stroke-width="1.6" />
            <path
                d="M15.5 8H2v1.6h13.5c3.5 0 6.4 2.9 6.4 6.4 0 3.5-2.9 6.4-6.4 6.4H2V24h13.5c4.4 0 8-3.6 8-8s-3.6-8-8-8z"
                fill="currentColor" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-menu-shop" xmlns="http://www.w3.org/2000/svg">
            <path fill="#fff" d="M0 0h24v24H0z" />
            <path stroke="currentColor" stroke-width="1.6" d="M3.8 8.8h16.4v13.4H3.8z" />
            <path stroke="currentColor" stroke-width="1.6" d="M9.8 16.8h4.4v5.4H9.8zM1 8l4-6h14l4 6" />
            <path
                d="M9.147 11.528L8.5 10.64l-.647.887c-.4.549-.858.967-1.34 1.247A2.998 2.998 0 0 1 5 13.2a2.998 2.998 0 0 1-1.512-.425c-.495-.287-.965-.72-1.373-1.29a6.84 6.84 0 0 1-.967-2.033A8.513 8.513 0 0 1 .836 7.8h22.328a8.515 8.515 0 0 1-.312 1.652 6.838 6.838 0 0 1-.968 2.033c-.407.57-.877 1.003-1.372 1.29A2.998 2.998 0 0 1 19 13.2a2.998 2.998 0 0 1-1.512-.425c-.483-.28-.941-.698-1.341-1.247l-.647-.887-.646.887c-.4.549-.86.967-1.342 1.247A2.998 2.998 0 0 1 12 13.2a2.998 2.998 0 0 1-1.512-.425c-.483-.28-.941-.698-1.341-1.247z"
                fill="#fff" stroke="currentColor" stroke-width="1.6" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-menu-size_guide" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0)" stroke="currentColor" stroke-width="1.6">
                <path d="M0 5h22m-4-4l4 4-4 4m3 7v3m0-8v3m-5 7h3m-8 0h3M5 0v22m4-4l-4 4-4-4" />
            </g>
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-menu-women" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0)">
                <path fill="#fff" d="M0 0h24v24H0z" />
                <path d="M4.826 23.2c.36-5.393 4.323-9.4 9.174-9.4 4.851 0 8.815 4.007 9.174 9.4H4.826z"
                    stroke="currentColor" stroke-width="1.6" />
                <path d="M.8 8A5.2 5.2 0 0 1 6 2.8h6.2V9c0 6.47-5.035 11.762-11.4 12.174V8z" fill="#fff"
                    stroke="currentColor" stroke-width="1.6" />
                <circle cx="14" cy="10" r="9.2" fill="#fff" stroke="currentColor" stroke-width="1.6" />
                <mask id="bba" fill="#fff">
                    <path d="M23.628 12.702a10 10 0 1 0-19.317-.228L14 10l9.628 2.702z" />
                </mask>
                <path d="M23.628 12.702a10 10 0 1 0-19.317-.228L14 10l9.628 2.702z" fill="#fff" stroke="currentColor"
                    stroke-width="3.2" mask="url(#bba)" />
            </g>
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-mobile-menu-toggle">
            <path d="M0 6h24M0 12h16M0 18h24" stroke="currentColor" stroke-width="1.6" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-mobile-menu-toggle02">
            <circle cx="3" cy="12" r="2.2" stroke="currentColor" stroke-width="1.6" />
            <circle cx="12" cy="12" r="2.2" stroke="currentColor" stroke-width="1.6" />
            <circle cx="21" cy="12" r="2.2" stroke="currentColor" stroke-width="1.6" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-mobile_menu_toggle">
            <path d="M0 6h24M0 12h16M0 18h24" stroke="currentColor" stroke-width="1.6" />
        </symbol>
        <symbol fill="none" viewBox="0 0 16 16" id="icon-options">
            <path
                d="M13.172 4.953l1.547-1.547-2.125-2.125-1.547 1.547a6.21 6.21 0 0 0-.75-.36 4.472 4.472 0 0 0-.797-.265V0h-3v2.203a4.52 4.52 0 0 0-.797.266c-.26.104-.51.224-.75.36L3.406 1.28 1.281 3.406l1.547 1.547c-.135.24-.26.49-.375.75-.104.26-.187.526-.25.797H0v3h2.203c.063.27.146.537.25.797.115.26.24.51.375.75l-1.547 1.547 2.125 2.125 1.547-1.547c.24.135.49.26.75.375.26.104.526.187.797.25V16h3v-2.203a5.53 5.53 0 0 0 .797-.25c.26-.115.51-.24.75-.375l1.547 1.547 2.125-2.125-1.547-1.547c.135-.24.255-.49.36-.75.114-.26.202-.526.265-.797H16v-3h-2.203a4.479 4.479 0 0 0-.266-.797 6.215 6.215 0 0 0-.36-.75zM8 10.5a2.407 2.407 0 0 1-1.766-.734A2.407 2.407 0 0 1 5.5 8c0-.688.245-1.276.734-1.766A2.407 2.407 0 0 1 8 5.5a2.41 2.41 0 0 1 1.766.734c.49.49.734 1.079.734 1.766a2.41 2.41 0 0 1-.734 1.766c-.49.49-1.079.734-1.766.734z"
                fill="#fff" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-pause">
            <path fill="currentColor" d="M0 0h9v24H0zm15 0h9v24h-9z" />
        </symbol>
        <symbol fill="none" viewBox="0 0 67 19" id="icon-payment_01">
            <path
                d="M45.213.861h-5.158c-.304 0-.607.298-.759.597l-2.124 13.117c0 .299.152.448.455.448h2.731c.303 0 .455-.15.455-.447l.607-3.727c0-.298.304-.597.759-.597h1.669c3.49 0 5.462-1.64 5.917-4.919.303-1.341 0-2.534-.607-3.28-.91-.744-2.276-1.192-3.945-1.192zm.607 4.92c-.303 1.788-1.669 1.788-3.034 1.788h-.91l.606-3.428c0-.15.152-.298.455-.298h.304c.91 0 1.82 0 2.276.596.303.149.303.596.303 1.342z"
                fill="#469BDB" />
            <path
                d="M8.041.861H2.883c-.304 0-.607.298-.759.597L0 14.575c0 .299.152.448.455.448h2.428c.303 0 .607-.298.758-.597l.607-3.577c0-.298.304-.597.759-.597h1.669c3.49 0 5.462-1.64 5.917-4.919.303-1.341 0-2.534-.607-3.28C11.076 1.31 9.862.862 8.041.862zm.607 4.92C8.345 7.569 6.98 7.569 5.614 7.569h-.759l.607-3.428c0-.15.152-.298.455-.298h.304c.91 0 1.82 0 2.275.596.152.149.304.596.152 1.342zm15.02-.149h-2.427c-.152 0-.455.15-.455.298l-.152.746-.152-.299c-.607-.745-1.669-1.043-2.883-1.043-2.73 0-5.158 2.087-5.613 4.92-.304 1.49.151 2.832.91 3.726.759.894 1.82 1.192 3.186 1.192 2.276 0 3.49-1.341 3.49-1.341l-.152.745c0 .298.152.447.455.447h2.276c.304 0 .607-.298.759-.596l1.365-8.348c-.151-.149-.455-.447-.607-.447zm-3.49 4.77c-.303 1.342-1.365 2.385-2.882 2.385-.759 0-1.365-.298-1.669-.596-.303-.447-.455-1.043-.455-1.789.152-1.341 1.365-2.385 2.73-2.385.76 0 1.215.298 1.67.596.455.448.607 1.193.607 1.79z"
                fill="#283B82" />
            <path
                d="M60.688 5.632H58.26c-.151 0-.455.15-.455.298l-.152.746-.151-.299c-.607-.745-1.67-1.043-2.883-1.043-2.731 0-5.159 2.087-5.614 4.92-.303 1.49.152 2.832.91 3.726.76.894 1.821 1.192 3.187 1.192 2.276 0 3.49-1.341 3.49-1.341l-.152.745c0 .298.151.447.455.447h2.276c.303 0 .607-.298.758-.596l1.366-8.348c-.152-.149-.304-.447-.607-.447zm-3.49 4.77c-.303 1.342-1.365 2.385-2.883 2.385-.758 0-1.365-.298-1.668-.596-.304-.447-.456-1.043-.456-1.789.152-1.341 1.366-2.385 2.731-2.385.759 0 1.214.298 1.67.596.606.448.758 1.193.606 1.79z"
                fill="#469BDB" />
            <path
                d="M36.87 5.633h-2.58c-.303 0-.454.149-.606.298l-3.338 5.068-1.517-4.77c-.152-.298-.304-.447-.759-.447h-2.427c-.304 0-.456.298-.456.596l2.732 7.9-2.58 3.578c-.151.298 0 .746.304.746h2.427c.304 0 .455-.15.607-.299l8.345-11.776c.455-.447.152-.894-.152-.894z"
                fill="#283B82" />
            <path
                d="M63.573 1.31L61.45 14.726c0 .298.152.447.455.447h2.124c.304 0 .607-.298.76-.596L66.91 1.459c0-.298-.151-.447-.455-.447h-2.428c-.151-.15-.303 0-.455.298z"
                fill="#469BDB" />
        </symbol>
        <symbol fill="none" viewBox="0 0 50 17" id="icon-payment_02">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M15.226 16.407l4.62-15.233h4.122l-4.62 15.233h-4.122zM13.383 1.178L9.675 7.635c-.944 1.692-1.496 2.546-1.761 3.615h-.056c.065-1.355-.124-3.018-.142-3.959l-.409-6.113H.368l-.071.41c1.783 0 2.84.895 3.13 2.727L4.78 16.407h4.27l8.635-15.229h-4.302zM45.44 16.407l-.114-2.266-5.147-.004-1.052 2.27H34.65l8.115-15.204h5.493l1.374 15.204H45.44zm-.472-8.985c-.046-1.126-.085-2.654-.008-3.579h-.06c-.252.756-1.33 3.027-1.803 4.144l-1.534 3.339h3.614l-.21-3.904zM28.295 16.84c-2.91 0-4.841-.923-6.22-1.746l1.963-3c1.238.693 2.21 1.492 4.446 1.492.72 0 1.412-.187 1.806-.868.573-.99-.133-1.524-1.743-2.435l-.795-.517c-2.387-1.632-3.42-3.18-2.296-5.885C26.176 2.15 28.072.84 31.2.84c2.158 0 4.18.933 5.36 1.845l-2.258 2.648c-1.15-.93-2.104-1.401-3.195-1.401-.87 0-1.53.335-1.759.788-.429.85.139 1.43 1.393 2.209l.946.601c2.898 1.828 3.588 3.745 2.862 5.537-1.25 3.084-3.695 3.773-6.254 3.773z"
                fill="#1D5B99" />
        </symbol>
        <symbol fill="none" viewBox="0 0 42 24" id="icon-payment_03">
            <path
                d="M24.732 12.063c0 6.572-5.396 11.937-12.15 11.937C5.895 24 .435 18.635.435 12.063.434 5.492 5.83.127 12.518.127c6.818 0 12.214 5.365 12.214 11.936z"
                fill="#EA192A" />
            <path
                d="M41.111 12c0 6.603-5.428 12-12.214 12-6.72 0-12.213-5.397-12.213-12S22.112 0 28.833 0c6.85 0 12.278 5.397 12.278 12z"
                fill="#F9B532" />
            <path
                d="M24.764 12.063c0-.889-.13-1.714-.258-2.54h-7.497c.065-.444.194-.825.323-1.27h6.721a7.484 7.484 0 0 0-.517-1.269H17.85c.194-.444.453-.825.711-1.27h4.33a6.05 6.05 0 0 0-.97-1.27h-2.39a10.92 10.92 0 0 1 1.227-1.206C18.681 1.325 15.87.19 12.802.127v23.865c3.094-.048 5.864-1.238 8.021-3.111.452-.381.84-.826 1.228-1.27h-2.52a14.525 14.525 0 0 1-.905-1.206h4.33c.258-.381.517-.826.71-1.27h-5.75a7.484 7.484 0 0 1-.518-1.27h6.72c.389-1.199.647-2.468.647-3.802z"
                fill="#EA192A" />
            <path
                d="M16.944 15.048l.194-1.08c-.064 0-.194.064-.323.064-.452 0-.517-.254-.452-.38l.387-2.223h.711l.194-1.206h-.646l.13-.762h-1.293s-.776 4.19-.776 4.698c0 .762.453 1.08 1.034 1.08.388 0 .711-.127.84-.19zm.451-2.033c0 1.778 1.227 2.223 2.261 2.223.97 0 1.357-.19 1.357-.19l.259-1.207s-.711.317-1.357.317c-1.422 0-1.163-1.015-1.163-1.015h2.65s.193-.826.193-1.143c0-.826-.452-1.842-1.874-1.842-1.357-.127-2.326 1.27-2.326 2.857zm2.261-1.84c.711 0 .582.825.582.888h-1.422c0-.063.13-.889.84-.889zm8.207 3.872l.258-1.397s-.646.318-1.098.318c-.905 0-1.293-.698-1.293-1.46 0-1.524.776-2.35 1.68-2.35.647 0 1.164.382 1.164.382l.194-1.334s-.776-.317-1.487-.317c-1.486 0-2.972 1.27-2.972 3.682 0 1.588.775 2.667 2.326 2.667.517 0 1.228-.19 1.228-.19zM9.835 10.031c-.905 0-1.551.254-1.551.254l-.194 1.08s.581-.254 1.421-.254c.453 0 .84.063.84.444 0 .254-.064.318-.064.318h-.582c-1.098 0-2.326.444-2.326 1.904 0 1.143.775 1.397 1.228 1.397.904 0 1.292-.571 1.357-.571l-.065.508h1.163l.517-3.493c0-1.523-1.292-1.587-1.744-1.587zm.258 2.857c0 .19-.13 1.207-.905 1.207-.387 0-.517-.318-.517-.508 0-.318.194-.762 1.164-.762.193.063.258.063.258.063zm2.714 2.285c.323 0 1.938.064 1.938-1.65 0-1.588-1.55-1.27-1.55-1.905 0-.318.258-.445.71-.445.194 0 .905.064.905.064l.194-1.143s-.452-.127-1.228-.127c-.97 0-1.939.38-1.939 1.65 0 1.46 1.616 1.334 1.616 1.905 0 .381-.452.445-.776.445-.581 0-1.163-.19-1.163-.19l-.194 1.142c.065.127.388.254 1.487.254zM38.59 9.016l-.259 1.714s-.517-.635-1.228-.635c-1.163 0-2.197 1.397-2.197 3.048 0 1.015.517 2.095 1.616 2.095.775 0 1.228-.508 1.228-.508l-.065.444h1.292l.97-6.095-1.357-.063zm-.582 3.365c0 .698-.323 1.587-1.034 1.587-.452 0-.71-.381-.71-1.016 0-1.016.452-1.65 1.033-1.65.453 0 .711.317.711 1.079zM2.79 15.11l.776-4.57.13 4.57H4.6l1.68-4.57-.71 4.57h1.356L7.96 9.017H5.828l-1.293 3.746-.064-3.746H2.596L1.562 15.11H2.79zm20.034 0c.388-2.095.452-3.809 1.357-3.492.13-.825.323-1.142.453-1.46h-.259c-.582 0-1.034.762-1.034.762l.13-.698h-1.229l-.84 4.952h1.422v-.063zm8.014-5.079c-.904 0-1.55.254-1.55.254l-.194 1.08s.581-.254 1.421-.254c.453 0 .84.063.84.444 0 .254-.064.318-.064.318h-.582c-1.098 0-2.326.444-2.326 1.904 0 1.143.775 1.397 1.228 1.397.904 0 1.292-.571 1.357-.571l-.065.508h1.163l.517-3.493c.065-1.523-1.292-1.587-1.744-1.587zm.324 2.857c0 .19-.13 1.207-.905 1.207-.388 0-.517-.318-.517-.508 0-.318.194-.762 1.163-.762.194.063.194.063.259.063zm2.518 2.222c.387-2.095.452-3.809 1.357-3.492.129-.825.323-1.142.452-1.46h-.258c-.582 0-1.035.762-1.035.762l.13-.698h-1.228l-.84 4.952h1.421v-.063z"
                fill="#fff" />
        </symbol>
        <symbol fill="none" viewBox="0 0 55 18" id="icon-payment_04">
            <path
                d="M29.51 9.556c2.492 0 4.513-1.985 4.513-4.434 0-2.45-2.02-4.434-4.513-4.434s-4.514 1.985-4.514 4.434c0 2.45 2.02 4.434 4.514 4.434z"
                fill="#F5821E" />
            <path
                d="M3.383.943H.953v8.358h2.43c1.302 0 2.257-.341 3.038-.938a4.189 4.189 0 0 0 1.563-3.241c0-2.473-1.823-4.179-4.6-4.179zM5.38 7.254c-.521.426-1.215.682-2.257.682h-.52V2.393h.433c1.042 0 1.736.17 2.257.682.608.512.955 1.28.955 2.047.087.768-.26 1.62-.868 2.132zM10.415.943h-1.65v8.358h1.65V.943zm4.166 3.24c-1.041-.34-1.302-.597-1.302-1.023 0-.512.521-.938 1.216-.938.52 0 .954.17 1.388.682l.868-1.109a3.82 3.82 0 0 0-2.517-.938c-1.476 0-2.69 1.024-2.69 2.388 0 1.194.52 1.706 2.082 2.303.695.256.955.34 1.129.511.347.171.52.512.52.853 0 .682-.52 1.194-1.301 1.194a2.028 2.028 0 0 1-1.823-1.109l-1.042 1.024c.782 1.108 1.736 1.62 2.951 1.62 1.736 0 2.952-1.109 2.952-2.729 0-1.45-.521-2.046-2.43-2.729zm2.95.938c0 2.473 1.997 4.35 4.514 4.35.694 0 1.302-.171 2.083-.512V6.997c-.695.683-1.302.939-1.997.939-1.649 0-2.864-1.194-2.864-2.9 0-1.62 1.215-2.9 2.778-2.9.78 0 1.388.256 2.083.939V1.113c-.695-.34-1.302-.511-2.083-.511-2.43.17-4.514 2.132-4.514 4.52zm20.224 1.451L35.498.943h-1.822l3.558 8.613h.955L41.922.943h-1.823l-2.344 5.629zM42.617 9.3h4.774V7.937h-3.038V5.634h2.951v-1.45h-2.95v-1.79h3.037V.943h-4.774V9.3z"
                fill="#141414" />
            <path
                d="M52.074 5.804c1.302-.256 1.997-1.108 1.997-2.388 0-1.535-1.129-2.473-3.038-2.473h-2.517v8.358h1.649V5.975h.26L52.77 9.3h1.996l-2.69-3.497zm-1.388-1.023h-.521V2.223h.52c1.042 0 1.65.426 1.65 1.279s-.608 1.279-1.65 1.279z"
                fill="#4D4D4D" />
            <path
                d="M52.074 5.804c1.302-.256 1.997-1.108 1.997-2.388 0-1.535-1.129-2.473-3.038-2.473h-2.517v8.358h1.649V5.975h.26L52.77 9.3h1.996l-2.69-3.497zm-1.388-1.023h-.521V2.223h.52c1.042 0 1.65.426 1.65 1.279s-.608 1.279-1.65 1.279z"
                fill="#141414" />
            <path
                d="M13.191 17.06v-4.69l3.299 3.325v-3.07h.694v4.69l-3.298-3.326v3.07h-.695zm7.463-3.753H18.83v1.024h1.736v.682H18.83v1.45h1.823v.596h-2.517v-4.434h2.517v.682zm2.172.001v3.752h-.695v-3.752H21.09v-.597h2.777v.597h-1.041zm2.084-.596l1.128 2.984 1.215-3.155 1.128 3.155 1.215-2.984h.868l-1.996 4.69-1.128-3.155-1.216 3.155-1.91-4.69h.695zm5.64 2.132c0-.597.261-1.194.695-1.62a2.393 2.393 0 0 1 1.65-.683c.607 0 1.214.256 1.648.682a2.31 2.31 0 0 1 .695 1.62 2.31 2.31 0 0 1-.694 1.62 2.393 2.393 0 0 1-1.65.683c-.607 0-1.128-.17-1.562-.597-.52-.426-.781-.938-.781-1.705zm.695 0c0 .511.174.852.521 1.193.347.341.694.512 1.128.512.434 0 .868-.17 1.215-.512.348-.34.521-.682.521-1.193 0-.512-.173-.853-.52-1.194-.348-.341-.695-.512-1.216-.512-.434 0-.868.17-1.215.512-.26.34-.434.767-.434 1.194zm6.423.339l1.389 1.877h-.868l-1.302-1.791H36.8v1.79h-.694v-4.434h.78c.608 0 1.042.085 1.303.341.26.256.434.597.434.938 0 .341-.087.597-.26.768-.174.34-.435.511-.695.511zm-.868-.511h.173c.608 0 .955-.256.955-.683 0-.426-.347-.682-.955-.682h-.26v1.365h.087zm3.56-.255l1.735-1.79h.868l-1.996 1.96 1.996 2.389h-.868l-1.649-1.962-.173.17v1.792h-.695V12.54h.694v1.876h.087z"
                fill="#858585" />
        </symbol>
        <symbol fill="none" viewBox="0 0 65 22" id="icon-payment_05">
            <path d="M6.328 5.525h2.209L7.432 2.764 6.328 5.525z" fill="#017AAB" />
            <path
                d="M55.215.2v1.183L54.613.199h-4.718v1.184L49.293.199h-6.425c-1.104 0-2.008.197-2.811.592V.199H35.54v.592c-.502-.395-1.105-.592-1.908-.592H17.47l-1.104 2.466L15.262.199h-5.12v1.184L9.54.199H5.223L3.215 4.835.906 9.964h5.12l.602-1.579h1.406l.602 1.579h5.822V8.78l.502 1.184h2.912l.502-1.184v1.184h13.953V7.399h.201c.2 0 .2 0 .2.296v2.17h7.229v-.592c.602.296 1.505.592 2.71.592h3.012l.602-1.578h1.405l.603 1.578h5.822v-1.48l.904 1.48h4.718V.199h-4.518zm-33.93 8.284h-1.707V3.06l-2.41 5.425h-1.505l-2.41-5.425v5.425H9.842l-.703-1.48H5.725l-.603 1.579H3.215L6.227 1.58h2.51l2.81 6.608V1.58h2.71l2.21 4.734 2.007-4.734h2.81v6.904zM28.11 3.06h-3.915v1.283h3.815v1.38h-3.815v1.381h3.915v1.48h-5.622V1.58h5.622v1.48zm7.529 2.86c.2.395.301.691.301 1.283v1.38h-1.706v-.887c0-.394 0-.986-.302-1.38-.3-.297-.602-.297-1.204-.297h-1.807v2.565h-1.707V1.58h3.815c.903 0 1.506 0 2.008.296s.803.789.803 1.578c0 1.085-.703 1.677-1.205 1.874.502.099.803.394 1.004.592zm3.012 2.565h-1.707V1.481h1.707v7.003zm19.776 0h-2.41l-3.212-5.227v5.227h-3.413l-.602-1.48h-3.514l-.602 1.579h-1.907c-.804 0-1.807-.198-2.41-.79-.602-.591-.903-1.38-.903-2.662 0-.987.2-1.973.903-2.762.502-.592 1.406-.789 2.51-.789h1.606v1.48h-1.606c-.602 0-.904.098-1.305.394-.301.296-.502.888-.502 1.578 0 .79.1 1.282.502 1.677.301.296.703.394 1.204.394h.703l2.31-5.424h2.509l2.81 6.608V1.679h2.51L56.52 6.51V1.68h1.707v6.805h.2z"
                fill="#017AAB" />
            <path
                d="M45.879 5.525h2.309l-1.105-2.761-1.204 2.761zM28.813 19.727v-5.622l-2.61 2.762 2.61 2.86zm-10.743-4.93v1.282h3.715v1.38H18.07v1.48h4.116l1.907-2.07-1.806-2.072H18.07zm14.562 0h-2.109v1.775h2.209c.602 0 1.004-.296 1.004-.887-.1-.592-.502-.888-1.104-.888z"
                fill="#017AAB" />
            <path
                d="M63.647 16.475v-4.438h-4.216c-.903 0-1.606.197-2.108.592v-.592h-4.618c-.703 0-1.606.197-2.008.592v-.592h-8.13v.592c-.603-.493-1.708-.592-2.21-.592h-5.42v.592c-.502-.493-1.707-.592-2.31-.592h-6.022l-1.406 1.48-1.305-1.48H14.86v9.666h8.834l1.406-1.48 1.305 1.48h5.42v-2.269h.703c.703 0 1.607 0 2.31-.296v2.663h4.517v-2.564h.2c.302 0 .302 0 .302.296V21.8h13.652c.904 0 1.807-.197 2.31-.591v.591h4.316c.903 0 1.807-.098 2.409-.493 1.004-.591 1.606-1.676 1.606-2.959 0-.69-.2-1.38-.502-1.874zm-31.12 1.578H30.52v2.368h-3.213L25.3 18.152l-2.108 2.269h-6.626v-7.003h6.726l2.008 2.268 2.108-2.268h5.32c1.305 0 2.811.394 2.811 2.268-.1 1.973-1.506 2.367-3.012 2.367zm10.04-.394c.2.296.3.69.3 1.282v1.381h-1.706v-.888c0-.394 0-1.085-.302-1.38-.2-.296-.602-.296-1.204-.296h-1.807v2.564H36.14v-7.003h3.815c.803 0 1.506 0 2.008.296s.903.79.903 1.578c0 1.085-.703 1.677-1.204 1.874.502.198.803.395.903.592zm6.926-2.86h-3.915v1.282h3.814v1.38h-3.814v1.382h3.915v1.479H43.87v-7.003h5.622v1.48zm4.216 5.523h-3.212v-1.48h3.212c.301 0 .502 0 .703-.197.1-.098.2-.296.2-.493s-.1-.394-.2-.493c-.1-.099-.301-.197-.603-.197-1.606-.099-3.513 0-3.513-2.17 0-.986.602-2.071 2.41-2.071h3.312v1.676h-3.112c-.301 0-.502 0-.703.099-.2.099-.2.296-.2.493 0 .296.2.395.401.493.2.099.401.099.602.099h.904c.903 0 1.506.197 1.907.592.301.296.502.789.502 1.48 0 1.479-.903 2.169-2.61 2.169zm8.633-.69c-.401.394-1.104.69-2.108.69h-3.212v-1.48h3.212c.301 0 .502 0 .703-.197.1-.098.2-.296.2-.493s-.1-.394-.2-.493c-.1-.099-.301-.197-.602-.197-1.607-.099-3.514 0-3.514-2.17 0-.986.602-2.071 2.41-2.071h3.312v1.676h-3.012c-.3 0-.502 0-.702.099-.201.099-.201.296-.201.493 0 .296.1.395.401.493.201.099.402.099.603.099h.903c.904 0 1.506.197 1.908.592.1 0 .1.098.1.098.301.395.402.888.402 1.381 0 .592-.201 1.085-.603 1.48z"
                fill="#017AAB" />
            <path d="M28.813 19.727v-5.622l-2.61 2.762 2.61 2.86z" fill="#017AAB" />
            <path d="M55.012 9.57l.2.296h.1l-.3-.296z" fill="#228FE0" />
            <path
                d="M39.944 14.797h-2.108v1.775h2.208c.603 0 1.004-.296 1.004-.887-.1-.592-.502-.888-1.104-.888zM33.03 2.887h-2.108v1.775h2.208c.603 0 1.004-.296 1.004-.888-.1-.591-.502-.887-1.104-.887z"
                fill="#017AAB" />
        </symbol>
        <symbol fill="none" viewBox="0 0 64 64" id="icon-play">
            <path fill="currentColor" d="M0 0h64v64H0z" />
            <path d="M43 32L22 44V20l21 12z" fill="#fff" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-quick_view">
            <path d="M15 11H7m4-4v8" stroke="currentColor" stroke-width="1.6" />
            <circle cx="11" cy="11" r="10.2" stroke="currentColor" stroke-width="1.6" />
            <path d="M23 23l-5-5" stroke="currentColor" stroke-width="1.6" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-remove">
            <path d="M5.754 23.2L4.848 7.8h14.304l-.906 15.4H5.754zM2 4h20M10 1h4" stroke="currentColor"
                stroke-width="1.6" />
        </symbol>
        <symbol fill="none" viewBox="0 0 16 16" id="icon-review">
            <path
                d="M7.552.272c.07-.181.2-.272.39-.272.208 0 .338.09.39.272l1.637 5.193a.35.35 0 0 0 .13.217.527.527 0 0 0 .285.082h5.197c.207 0 .337.1.39.299.069.2.017.362-.157.49L11.632 9.76a.6.6 0 0 0-.182.245.582.582 0 0 0 0 .245l1.636 5.165c.052.2-.008.363-.181.49-.156.127-.304.127-.442 0l-4.209-3.236a.485.485 0 0 0-.26-.081.452.452 0 0 0-.234.082l-4.209 3.235c-.155.127-.311.127-.467 0-.156-.127-.208-.29-.156-.49l1.637-5.165a.49.49 0 0 0-.026-.272.323.323 0 0 0-.156-.218L.2 6.552c-.173-.127-.234-.29-.182-.49.07-.199.208-.298.416-.298H5.63a.369.369 0 0 0 .234-.082.436.436 0 0 0 .182-.217L7.552.272z"
                fill="currentColor" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-search">
            <path fill="transparent" d="M0 0h24v24H0z" />
            <circle cx="11" cy="11" r="10.2" stroke="currentColor" stroke-width="1.6" />
            <path d="M23 23l-5-5" stroke="currentColor" stroke-width="1.6" />
        </symbol>
        <symbol fill="none" viewBox="0 0 36 36" id="icon-services_battery">
            <path fill="transparent" d="M0 0h36v36H0z" />
            <path
                d="M28.91 4.516h-2.183V1.13c0-.33-.102-.6-.306-.811A1.043 1.043 0 0 0 25.636 0h-4.363c-.319 0-.58.106-.784.318-.205.211-.307.482-.307.811v3.387h-4.364V1.13c0-.33-.102-.6-.307-.811A1.043 1.043 0 0 0 14.727 0h-4.363c-.319 0-.58.106-.784.318-.205.211-.307.482-.307.811v3.387H7.09c-.318 0-.58.106-.784.318-.205.211-.307.482-.307.811v28.226c0 .33.102.6.307.811.204.212.466.318.784.318h21.818c.318 0 .58-.106.784-.318.205-.211.307-.482.307-.811V5.645c0-.33-.102-.6-.307-.811a1.043 1.043 0 0 0-.784-.318zM8.181 11.29h19.636v16.936H8.182V11.29zm14.182-9.032h2.181v2.258h-2.181V2.258zm-10.91 0h2.182v2.258h-2.181V2.258zm16.364 4.516v2.258H8.182V6.774h19.636zM8.182 32.742v-2.258h19.636v2.258H8.182zM21.17 18.735a1.458 1.458 0 0 0-.41-.494.948.948 0 0 0-.58-.177H18l1.977-2.716c.16-.212.216-.482.17-.812-.045-.329-.181-.588-.408-.776-.205-.165-.466-.223-.785-.176a1.113 1.113 0 0 0-.75.423l-3.272 4.516a2.04 2.04 0 0 0-.205.565.696.696 0 0 0 .102.564c.114.165.25.318.41.459a.843.843 0 0 0 .58.212H18l-1.977 2.716c-.16.212-.216.482-.17.812.045.33.181.588.408.776.114.047.216.094.307.141.114.047.227.07.341.07.16 0 .318-.035.477-.105a.982.982 0 0 0 .41-.353l3.272-4.516a2.04 2.04 0 0 0 .205-.565.696.696 0 0 0-.102-.564z"
                fill="currentColor" />
        </symbol>
        <symbol fill="none" viewBox="0 0 36 36" id="icon-services_color">
            <path fill="transparent" d="M0 0h36v36H0z" />
            <path
                d="M32 20.25V1.125a.997.997 0 0 0-.352-.773A1.001 1.001 0 0 0 30.875 0H27.5a1.05 1.05 0 0 0-.527.14 1.2 1.2 0 0 0-.387.317l-2.461 3.305-2.46-3.305a1.115 1.115 0 0 0-.423-.316A.866.866 0 0 0 20.75 0H6.125a1.11 1.11 0 0 0-.809.352C5.106.562 5 .82 5 1.125V20.25c0 1.242.434 2.309 1.3 3.2.891.866 1.958 1.3 3.2 1.3H14v6.75c0 1.242.434 2.297 1.3 3.164.891.89 1.958 1.336 3.2 1.336 1.242 0 2.297-.445 3.164-1.336.89-.867 1.336-1.922 1.336-3.164v-6.75h4.5c1.242 0 2.297-.434 3.164-1.3.89-.891 1.336-1.958 1.336-3.2zm-11.813-18l3.024 4.043c.21.281.516.422.914.422s.703-.14.914-.422l3.023-4.043h1.688v14.625H7.25V2.25h12.938zm1.688 20.25a1.11 1.11 0 0 0-.809.352c-.21.21-.316.468-.316.773V31.5c0 .61-.223 1.137-.668 1.582-.445.445-.973.668-1.582.668-.61 0-1.137-.223-1.582-.668-.445-.445-.668-.973-.668-1.582v-7.875a.997.997 0 0 0-.352-.773 1.001 1.001 0 0 0-.773-.352H9.5c-.61 0-1.137-.223-1.582-.668-.445-.445-.668-.973-.668-1.582v-1.125h22.5v1.125c0 .61-.223 1.137-.668 1.582-.445.445-.973.668-1.582.668h-5.625zM18.5 28.125a1.11 1.11 0 0 0-.809.352c-.21.21-.316.468-.316.773v1.125c0 .305.105.574.316.809.235.21.504.316.809.316.305 0 .563-.105.773-.316a1.11 1.11 0 0 0 .352-.809V29.25a.997.997 0 0 0-.352-.773 1.001 1.001 0 0 0-.773-.352z"
                fill="currentColor" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-services_delivery">
            <path
                d="M24 12l-5.5-5H14V3H0v17h4.2c.4 1.2 1.5 2 2.8 2 1.3 0 2.4-.8 2.8-2h5.4c.4 1.2 1.5 2 2.8 2 1.3 0 2.4-.8 2.8-2H24v-8zm-6.1-3.4l3.9 3.6H14V8.6h3.9zM7 20.4c-.8 0-1.4-.6-1.4-1.4 0-.8.6-1.4 1.4-1.4.8 0 1.4.6 1.4 1.4 0 .8-.6 1.4-1.4 1.4zm2.9-2C9.7 17 8.4 16 7 16s-2.7 1-2.9 2.4H1.6V4.6h10.8v13.8H9.9zm8.1 2c-.8 0-1.4-.6-1.4-1.4 0-.8.6-1.4 1.4-1.4.8 0 1.4.6 1.4 1.4 0 .8-.6 1.4-1.4 1.4zm2.9-2C20.7 17 19.4 16 18 16s-2.7 1-2.9 2.4H14v-4.6h8.4v4.6h-1.5z"
                fill="currentColor" />
        </symbol>
        <symbol fill="none" viewBox="0 0 36 36" id="icon-services_dimensions">
            <path fill="transparent" d="M0 0h36v36H0z" />
            <path
                d="M9.537 34.67c.122.098.256.183.403.257a1.382 1.382 0 0 0 .88 0c.146-.074.28-.159.402-.257L34.67 11.222c.22-.244.33-.525.33-.843 0-.317-.11-.598-.33-.842L26.463 1.33a1.223 1.223 0 0 0-.842-.33c-.318 0-.599.11-.843.33L1.33 24.778c-.22.244-.33.525-.33.843 0 .317.11.598.33.842l8.207 8.207zM6.862 22.58l2.675 2.71c.122.099.256.184.403.257a1.35 1.35 0 0 0 .879 0c.146-.073.28-.158.403-.256.22-.244.33-.525.33-.843 0-.317-.11-.598-.33-.842L8.511 20.93l1.868-1.869 1.503 1.54c.122.097.256.183.402.256a1.385 1.385 0 0 0 .88 0c.146-.073.28-.159.403-.257.22-.244.33-.525.33-.842 0-.318-.11-.599-.33-.843l-1.539-1.502 1.869-1.869 2.674 2.711c.122.098.257.184.403.257a1.381 1.381 0 0 0 .88 0 2.29 2.29 0 0 0 .402-.256c.22-.245.33-.526.33-.843 0-.318-.11-.599-.33-.843l-2.71-2.674 1.868-1.869 1.502 1.539c.122.098.256.183.403.256a1.35 1.35 0 0 0 .88 0 2.29 2.29 0 0 0 .402-.256c.22-.244.33-.525.33-.843 0-.317-.11-.598-.33-.842l-1.538-1.503 1.868-1.868 2.675 2.711c.122.098.256.183.403.256a1.35 1.35 0 0 0 .879 0c.146-.073.28-.158.403-.256.22-.244.33-.525.33-.843 0-.317-.11-.598-.33-.842L22.58 6.862l3.04-3.04 6.559 6.557-21.8 21.8-6.558-6.558 3.041-3.041z"
                fill="currentColor" />
        </symbol>
        <symbol fill="none" viewBox="0 0 36 36" id="icon-services_drive_units">
            <path fill="transparent" d="M0 0h36v36H0z" />
            <path
                d="M27.352 11.755a1.107 1.107 0 0 0-.809-.355.998.998 0 0 0-.773.355 1.127 1.127 0 0 0-.352.816c0 .284.117.544.352.78 1.289 1.302 1.933 2.863 1.933 4.684 0 1.822-.644 3.36-1.933 4.613a1.127 1.127 0 0 0-.352.817c0 .283.117.544.352.78.117.118.246.213.386.284.14.047.27.071.387.071.117 0 .246-.024.387-.071a1.33 1.33 0 0 0 .422-.284 8.429 8.429 0 0 0 1.898-2.91c.422-1.088.633-2.2.633-3.335a9.148 9.148 0 0 0-.633-3.335 8.429 8.429 0 0 0-1.898-2.91zm2.671-4.436a1.19 1.19 0 0 0-.316.816c0 .284.105.545.316.781a12.07 12.07 0 0 1 2.743 4.152c.656 1.585.984 3.229.984 4.932 0 1.703-.328 3.335-.984 4.897a13.452 13.452 0 0 1-2.743 4.187 1.19 1.19 0 0 0-.316.816c0 .284.105.544.316.78a.985.985 0 0 0 .387.249c.164.047.305.071.422.071.117 0 .246-.024.387-.071.14-.047.27-.13.386-.248a15.427 15.427 0 0 0 1.864-2.271 13.08 13.08 0 0 0 1.37-2.59c.376-.923.657-1.87.845-2.84.21-.97.316-1.963.316-2.98s-.105-2.01-.316-2.98a14.183 14.183 0 0 0-.844-2.84 12.196 12.196 0 0 0-1.371-2.554 14.553 14.553 0 0 0-1.864-2.307A1.047 1.047 0 0 0 30.832 7c-.305 0-.574.106-.809.32zm-19.687 4.436a.997.997 0 0 0-.774-.355.998.998 0 0 0-.773.355 8.428 8.428 0 0 0-1.898 2.91 9.248 9.248 0 0 0-.633 3.37c0 1.136.21 2.26.633 3.372a8.797 8.797 0 0 0 1.898 2.945c.094.118.211.212.352.284.164.047.304.07.421.07.118 0 .247-.023.387-.07a.975.975 0 0 0 .387-.284c.234-.213.351-.474.351-.781 0-.308-.117-.58-.351-.816-1.29-1.301-1.934-2.863-1.934-4.684 0-1.822.645-3.36 1.934-4.613.187-.284.281-.58.281-.887 0-.308-.094-.58-.281-.816zM2.25 18c0-1.703.316-3.324.95-4.861a13.863 13.863 0 0 1 2.777-4.223 1.15 1.15 0 0 0 .316-.78c0-.308-.106-.58-.316-.817A1.167 1.167 0 0 0 5.168 7a1.04 1.04 0 0 0-.773.32 16.224 16.224 0 0 0-1.899 2.306 15.484 15.484 0 0 0-1.371 2.626 14.32 14.32 0 0 0-.844 2.803 15.517 15.517 0 0 0 0 5.89c.188.97.469 1.916.844 2.839a16.1 16.1 0 0 0 1.371 2.59 16.216 16.216 0 0 0 1.899 2.307.985.985 0 0 0 .386.248c.14.047.27.071.387.071.117 0 .246-.024.387-.071a.956.956 0 0 0 .422-.248c.21-.237.316-.497.316-.781 0-.307-.106-.58-.316-.816a13.997 13.997 0 0 1-2.778-4.187A12.915 12.915 0 0 1 2.25 18zM18 13.458c-1.242 0-2.309.45-3.2 1.348-.866.876-1.3 1.94-1.3 3.194s.434 2.33 1.3 3.229c.891.875 1.958 1.313 3.2 1.313 1.242 0 2.297-.438 3.164-1.313.89-.899 1.336-1.975 1.336-3.229s-.445-2.318-1.336-3.194c-.867-.898-1.922-1.348-3.164-1.348zm0 6.813c-.61 0-1.137-.225-1.582-.674A2.193 2.193 0 0 1 15.75 18c0-.615.223-1.147.668-1.597.445-.45.973-.674 1.582-.674.61 0 1.137.225 1.582.674.445.45.668.982.668 1.597s-.223 1.147-.668 1.597c-.445.45-.973.674-1.582.674z"
                fill="currentColor" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-services_return">
            <path
                d="M2 9l-.566-.566L.87 9l.565.566L2 9zm6.434-7.566l-7 7 1.132 1.132 7-7-1.132-1.132zm-7 8.132l7 7 1.132-1.132-7-7-1.132 1.132z"
                fill="currentColor" />
            <path
                d="M15.5 8H2v1.6h13.5c3.5 0 6.4 2.9 6.4 6.4 0 3.5-2.9 6.4-6.4 6.4H2V24h13.5c4.4 0 8-3.6 8-8s-3.6-8-8-8z"
                fill="currentColor" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-services_size_guide">
            <g clip-path="url(#clip0)">
                <path fill="#fff" d="M0 0h24v24H0z" />
                <path d="M0 5h22m-4-4l4 4-4 4m3 7v3m0-8v3m-5 7h3m-8 0h3M5 0v22m4-4l-4 4-4-4" stroke="currentColor"
                    stroke-width="1.6" />
            </g>
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-services_support">
            <path
                d="M12 0C5.5 0 .1 5.3 0 11.8v6c0 1.7 1.3 3 3 3h3v-9H1.6C1.7 6.1 6.4 1.6 12 1.6c5.7 0 10.3 4.5 10.4 10.2H18v9h3c.5 0 1-.1 1.4-.4v.6c0 .8-.6 1.4-1.4 1.4h-9V24h9c1.7 0 3-1.3 3-3v-9.2C23.9 5.3 18.6 0 12 0zM4.4 13.4v5.8H3c-.8 0-1.4-.6-1.4-1.4v-4.4h2.8zm18 4.4c0 .8-.6 1.4-1.4 1.4h-1.4v-5.8h2.8v4.4z"
                fill="currentColor" />
        </symbol>
        <symbol fill="none" viewBox="0 0 27 36" id="icon-services_technical">
            <path
                d="M1.125 36h24.75c.328 0 .598-.105.809-.316.21-.211.316-.48.316-.809V1.125c0-.328-.105-.598-.316-.809A1.098 1.098 0 0 0 25.875 0H1.125C.797 0 .527.105.316.316.106.527 0 .796 0 1.125v33.75c0 .328.105.598.316.809.211.21.48.316.809.316zM2.25 2.25h22.5v31.5H2.25V2.25zm11.25 13.5a7.61 7.61 0 0 0-3.094.633 8.13 8.13 0 0 0-2.496 1.652 8.087 8.087 0 0 0-1.687 2.496 7.997 7.997 0 0 0-.598 3.094c0 1.102.2 2.133.598 3.094.422.937.984 1.77 1.687 2.496a8.085 8.085 0 0 0 2.496 1.687 7.996 7.996 0 0 0 3.094.598c1.102 0 2.121-.2 3.059-.598a8.085 8.085 0 0 0 2.496-1.687 7.833 7.833 0 0 0 1.687-2.496 7.61 7.61 0 0 0 .633-3.094c0-1.102-.21-2.121-.633-3.059a7.607 7.607 0 0 0-1.652-2.496 7.348 7.348 0 0 0-2.496-1.687 7.61 7.61 0 0 0-3.094-.633zm0 13.5c-1.57 0-2.906-.54-4.008-1.617-1.078-1.102-1.617-2.438-1.617-4.008 0-1.57.54-2.895 1.617-3.973C10.594 18.551 11.93 18 13.5 18c1.57 0 2.895.55 3.973 1.652 1.101 1.078 1.652 2.403 1.652 3.973 0 1.57-.55 2.906-1.652 4.008-1.078 1.078-2.403 1.617-3.973 1.617zm0-15.75c1.242 0 2.297-.434 3.164-1.3C17.554 11.308 18 10.241 18 9c0-1.242-.445-2.297-1.336-3.164-.867-.89-1.922-1.336-3.164-1.336-1.242 0-2.309.445-3.2 1.336C9.435 6.703 9 7.758 9 9c0 1.242.434 2.309 1.3 3.2.891.866 1.958 1.3 3.2 1.3zm0-6.75c.61 0 1.137.223 1.582.668.445.445.668.973.668 1.582 0 .61-.223 1.137-.668 1.582-.445.445-.973.668-1.582.668-.61 0-1.137-.223-1.582-.668-.445-.445-.668-.973-.668-1.582 0-.61.223-1.137.668-1.582.445-.445.973-.668 1.582-.668zm2.25 16.875c0 .633-.223 1.172-.668 1.617-.422.422-.95.633-1.582.633-.633 0-1.172-.21-1.617-.633a2.266 2.266 0 0 1-.633-1.617c0-.633.21-1.16.633-1.582a2.203 2.203 0 0 1 1.617-.668c.633 0 1.16.223 1.582.668.445.422.668.95.668 1.582z"
                fill="currentColor" />
        </symbol>
        <symbol fill="none" viewBox="0 0 36 36" id="icon-services_weight">
            <path fill="transparent" d="M0 0h36v36H0z" />
            <path
                d="M9 31c.938 0 1.734-.331 2.39-.994.657-.663.985-1.468.985-2.415v-5.682h11.25v5.682c0 .947.328 1.752.984 2.415A3.238 3.238 0 0 0 27 31c.938 0 1.734-.331 2.39-.994.657-.663.985-1.468.985-2.415V9.409c0-.947-.328-1.752-.984-2.415A3.238 3.238 0 0 0 27 6c-.938 0-1.734.331-2.39.994-.657.663-.985 1.468-.985 2.415v5.682h-11.25V9.409c0-.947-.328-1.752-.984-2.415A3.238 3.238 0 0 0 9 6c-.938 0-1.734.331-2.39.994-.657.663-.985 1.468-.985 2.415v18.182c0 .947.328 1.752.984 2.415A3.238 3.238 0 0 0 9 31zM25.875 9.41c0-.309.105-.57.316-.782.235-.237.504-.355.809-.355.305 0 .563.118.773.355.235.213.352.473.352.781v18.182c0 .308-.117.58-.352.817-.21.213-.468.32-.773.32s-.574-.107-.809-.32a1.192 1.192 0 0 1-.316-.817V9.409zm-2.25 7.954v2.272h-11.25v-2.272h11.25zM7.875 9.409c0-.308.105-.568.316-.781.235-.237.504-.355.809-.355.305 0 .563.118.773.355.235.213.352.473.352.781v18.182c0 .308-.117.58-.352.817-.21.213-.468.32-.773.32s-.574-.107-.809-.32a1.192 1.192 0 0 1-.316-.817V9.409zm-6.75 10.227H2.25v5.682c0 .308.105.58.316.817.235.213.504.32.809.32.305 0 .563-.107.773-.32.235-.237.352-.51.352-.817V11.682c0-.308-.117-.568-.352-.781a.997.997 0 0 0-.773-.355c-.305 0-.574.118-.809.355a1.07 1.07 0 0 0-.316.78v5.683H1.125c-.305 0-.574.118-.809.355A1.07 1.07 0 0 0 0 18.5c0 .308.105.58.316.817.235.213.504.32.809.32zm33.75-2.272H33.75v-5.682c0-.308-.117-.568-.352-.781a.997.997 0 0 0-.773-.355c-.305 0-.574.118-.809.355a1.07 1.07 0 0 0-.316.78v13.637c0 .308.105.58.316.817.235.213.504.32.809.32.305 0 .563-.107.773-.32.235-.237.352-.51.352-.817v-5.682h1.125c.305 0 .563-.106.773-.32.235-.236.352-.508.352-.816 0-.308-.117-.568-.352-.781a.997.997 0 0 0-.773-.355z"
                fill="currentColor" />
        </symbol>
        <symbol fill="none" viewBox="0 0 18 19" id="icon-social_icon_1">
            <path
                d="M9 .5a8.885 8.885 0 0 0-3.516.703A9.09 9.09 0 0 0 2.62 3.137 8.975 8.975 0 0 0 .703 6.002 8.758 8.758 0 0 0 0 9.5a8.942 8.942 0 0 0 1.6 5.133 9.129 9.129 0 0 0 1.81 1.933c.703.551 1.47.99 2.303 1.319a17.834 17.834 0 0 1-.07-1.266 5.726 5.726 0 0 1 .105-1.318c.047-.176.123-.504.229-.985.117-.492.234-.996.351-1.511.129-.516.24-.973.334-1.371l.14-.616-.14-.369c-.082-.246-.123-.568-.123-.967 0-.62.158-1.136.475-1.546.316-.422.703-.633 1.16-.633.375 0 .656.129.844.386.187.247.28.54.28.88 0 .386-.093.849-.28 1.388-.176.54-.329 1.078-.457 1.617-.106.446-.024.826.246 1.143.28.316.644.474 1.09.474.398 0 .767-.1 1.107-.298.351-.2.65-.48.896-.844.258-.364.457-.797.598-1.301.152-.504.229-1.06.229-1.67 0-.539-.094-1.031-.282-1.476a3.358 3.358 0 0 0-.773-1.16 3.306 3.306 0 0 0-1.195-.756 3.947 3.947 0 0 0-1.512-.282c-.645 0-1.219.112-1.723.334a4.026 4.026 0 0 0-1.283.88c-.34.362-.604.778-.791 1.247a4.122 4.122 0 0 0-.264 1.46c0 .386.065.767.194 1.142.129.375.287.674.474.896a.234.234 0 0 1 .053.14.219.219 0 0 1 0 .124c-.035.14-.082.334-.14.58-.06.234-.094.38-.106.44-.024.082-.059.134-.106.158-.046.011-.11 0-.193-.035-.562-.258-1.008-.739-1.336-1.442-.328-.703-.492-1.383-.492-2.039 0-.715.129-1.4.387-2.057a5.173 5.173 0 0 1 1.125-1.74c.504-.504 1.125-.902 1.863-1.195.738-.305 1.594-.457 2.566-.457a5.77 5.77 0 0 1 2.18.404c.68.258 1.266.621 1.758 1.09a4.829 4.829 0 0 1 1.178 1.635c.293.633.439 1.324.439 2.074 0 .773-.117 1.5-.351 2.18a5.756 5.756 0 0 1-.967 1.775c-.41.504-.903.902-1.477 1.195a4.079 4.079 0 0 1-1.88.44c-.458 0-.88-.1-1.266-.299-.387-.211-.65-.457-.791-.738l-.246.914a60.04 60.04 0 0 1-.317 1.23 6.23 6.23 0 0 1-.51 1.248c-.222.446-.427.815-.615 1.108.422.129.856.228 1.3.299.446.07.903.105 1.372.105a8.759 8.759 0 0 0 3.498-.703 8.975 8.975 0 0 0 2.865-1.916 9.091 9.091 0 0 0 1.934-2.865A8.885 8.885 0 0 0 18 9.5a8.76 8.76 0 0 0-.703-3.498 8.833 8.833 0 0 0-1.934-2.865 8.832 8.832 0 0 0-2.865-1.934A8.758 8.758 0 0 0 9 .5z"
                fill="currentColor" />
        </symbol>
        <symbol fill="none" viewBox="0 0 11 18" id="icon-social_icon_facebook">
            <path
                d="M6.91 5.045c0-.516.103-.932.309-1.248.217-.317.687-.475 1.41-.475l1.838-.017V.14A23.92 23.92 0 0 0 7.786 0a5.6 5.6 0 0 0-1.822.28 3.713 3.713 0 0 0-1.427.826c-.39.375-.693.844-.91 1.407C3.409 3.076 3.3 3.738 3.3 4.5v2.25H0v3.375h3.3L3.317 18H6.91v-7.875H9.9L11 6.75H6.91V5.045z"
                fill="currentColor" />
        </symbol>
        <symbol fill="none" viewBox="0 0 18 18" id="icon-social_icon_instagram">
            <path
                d="M9 1.622c2.403 0 2.688.009 3.637.052.877.04 1.354.187 1.67.31.392.144.745.374 1.036.673.299.29.529.644.673 1.035.123.317.27.794.31 1.671.043.95.052 1.234.052 3.637s-.009 2.688-.052 3.637c-.04.877-.187 1.354-.31 1.671a2.982 2.982 0 0 1-1.708 1.708c-.317.124-.794.27-1.671.31-.95.043-1.234.053-3.637.053s-2.688-.01-3.637-.053c-.877-.04-1.354-.187-1.671-.31a2.788 2.788 0 0 1-1.035-.673 2.788 2.788 0 0 1-.673-1.035c-.123-.317-.27-.793-.31-1.671-.043-.949-.052-1.234-.052-3.637s.009-2.688.052-3.637c.04-.877.187-1.354.31-1.67.144-.392.374-.745.673-1.036a2.78 2.78 0 0 1 1.035-.673c.317-.123.794-.27 1.671-.31.95-.043 1.234-.052 3.637-.052zM9 0C6.556 0 6.25.01 5.29.054S3.676.25 3.104.473c-.6.225-1.145.58-1.594 1.038-.458.45-.813.993-1.039 1.594C.25 3.677.098 4.33.054 5.289.01 6.25 0 6.556 0 9s.01 2.75.054 3.71c.044.959.196 1.613.419 2.185.226.6.58 1.145 1.038 1.594.45.458.993.813 1.594 1.038.572.223 1.227.375 2.184.419C6.25 17.99 6.556 18 9 18s2.75-.01 3.71-.054c.959-.044 1.613-.196 2.185-.419a4.6 4.6 0 0 0 2.633-2.632c.222-.572.374-1.226.418-2.184C17.99 11.75 18 11.444 18 9s-.01-2.75-.054-3.71c-.044-.959-.196-1.613-.419-2.185A4.411 4.411 0 0 0 16.49 1.51 4.412 4.412 0 0 0 14.895.472C14.323.25 13.67.098 12.711.054 11.75.01 11.444 0 9 0z"
                fill="currentColor" />
            <path
                d="M9 4.378a4.622 4.622 0 1 0 0 9.244 4.622 4.622 0 0 0 0-9.244zM9 12a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm4.804-6.724a1.08 1.08 0 1 0 0-2.16 1.08 1.08 0 0 0 0 2.16z"
                fill="currentColor" />
        </symbol>
        <symbol viewBox="0 0 24 24" id="icon-unlock" xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor"
                d="M11.2 17.9V20h1.6v-2.1c1.3-.4 2.2-1.5 2.2-2.9 0-1.7-1.3-3-3-3s-3 1.3-3 3c0 1.4.9 2.5 2.2 2.9zm.8-4.3c.8 0 1.4.6 1.4 1.4s-.6 1.4-1.4 1.4-1.4-.6-1.4-1.4.6-1.4 1.4-1.4z" />
            <path fill="currentColor"
                d="M17.8 8h-10c0-3 2-5.2 4.2-5.2.8 0 1.6.3 2.3.9l1.2-1.1c-.9-.8-2.1-1.3-3.4-1.3C8.7 1.2 6.2 4.4 6.2 8H3v16h18V8h-3.2zm1.6 14.4H4.6V9.6h14.8v12.8z" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-update">
            <path
                d="M17.607 20.838C12.78 23.56 6.54 22.068 3.675 17.57l-1.35.86c3.344 5.248 10.535 6.921 16.068 3.802l-.786-1.394z"
                fill="currentColor" />
            <path
                d="M2.375 17l.194-.776-.776-.194-.194.776.776.194zm-.599 5.682l1.375-5.488-1.552-.388-1.375 5.487 1.552.389zm.404-4.906l5.488 1.375.388-1.552-5.487-1.375-.389 1.552zM6.393 3.162C11.22.44 17.46 1.932 20.325 6.43l1.35-.86C18.33.322 11.14-1.35 5.607 1.768l.786 1.394z"
                fill="currentColor" />
            <path
                d="M21.625 7l-.194.776.776.194.194-.776L21.625 7zm.599-5.682l-1.375 5.488 1.552.388 1.375-5.487-1.552-.389zm-.404 4.906l-5.488-1.375-.388 1.552 5.487 1.375.389-1.552z"
                fill="currentColor" />
        </symbol>
        <symbol viewBox="0 0 20 24" id="icon-user" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M12 13C6.4 13 2 17.8 2 24h20c0-6.2-4.4-11-10-11zm0 1.6c4.2 0 7.6 3.3 8.3 7.8H3.7c.7-4.5 4.1-7.8 8.3-7.8zm0-2.6c3.3 0 6-2.7 6-6s-2.7-6-6-6-6 2.7-6 6 2.7 6 6 6zm0-10.4c2.4 0 4.4 2 4.4 4.4s-2 4.4-4.4 4.4c-2.4 0-4.4-2-4.4-4.4s2-4.4 4.4-4.4z"
                fill="currentColor" />
        </symbol>
        <symbol viewBox="0 0 25.4 22" id="icon-wishlist" xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor"
                d="M6.9 2.6c1.4 0 2.7.6 3.8 1.6l.2.2L12 5.6l1.1-1.1.2-.2c1-1 2.3-1.6 3.8-1.6s2.8.6 3.8 1.6c2.1 2.1 2.1 5.6 0 7.7L12 20.7l-8.9-8.9C1 9.7 1 6.2 3.1 4.1c1.1-.9 2.4-1.5 3.8-1.5zm0-1.6C5.1 1 3.3 1.7 2 3.1-.7 5.8-.7 10.3 2 13l10 10 10-9.9c2.7-2.8 2.7-7.3 0-10-1.4-1.4-3.1-2-4.9-2-1.8 0-3.6.7-4.9 2l-.2.2-.2-.2C10.4 1.7 8.7 1 6.9 1z" />
        </symbol>
        <symbol viewBox="0 0 24 24" id="icon-wishlist-add" xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor"
                d="M6.902 1c-1.8 0-3.6.7-4.9 2.1-2.7 2.7-2.7 7.2 0 9.9l10 10 10-9.9c2.7-2.8 2.7-7.3 0-10-1.4-1.4-3.1-2-4.9-2-1.8 0-3.6.7-4.9 2l-.2.2-.2-.2c-1.4-1.4-3.1-2.1-4.9-2.1z" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon-youtube" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M20.824 8.263c-.105-.741-.357-1.355-.756-1.841-.386-.498-.96-.827-1.722-.984a22.231 22.231 0 0 0-2.04-.256 46.926 46.926 0 0 0-3.673-.164L12 5l-.65.018a47.334 47.334 0 0 0-3.656.164c-.739.061-1.419.146-2.04.256-.761.157-1.341.486-1.74.984-.387.486-.633 1.1-.738 1.841a22.252 22.252 0 0 0-.158 2.443L3 12l.018 1.313c.011.862.064 1.67.158 2.424.105.741.351 1.361.738 1.86.398.485.979.807 1.74.965.621.11 1.301.195 2.04.256.738.06 1.423.103 2.056.127a158.5 158.5 0 0 0 1.6.055h1.283c.433-.012.967-.03 1.6-.055a46.865 46.865 0 0 0 2.074-.127 22.252 22.252 0 0 0 2.039-.256c.761-.158 1.336-.48 1.722-.966.399-.498.65-1.118.756-1.859.094-.754.147-1.562.158-2.425L21 12l-.018-1.294a22.235 22.235 0 0 0-.158-2.443zM9.75 15.5v-7l5.625 3.5-5.625 3.5z"
                fill="currentColor" />
        </symbol>
        <symbol fill="none" viewBox="0 0 16 16" id="icon_add">
            <path d="M0 8h16M8 0v16" stroke="currentColor" stroke-width="1.6" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon_avatar" xmlns="http://www.w3.org/2000/svg">
            <path fill="transparent" d="M0 0h24v24H0z" />
            <path d="M2.826 23.2c.36-5.393 4.323-9.4 9.174-9.4 4.851 0 8.815 4.007 9.174 9.4H2.826z"
                stroke="currentColor" stroke-width="1.6" />
            <circle cx="12" cy="6" r="5.2" stroke="currentColor" stroke-width="1.6" />
        </symbol>
        <symbol fill="none" viewBox="0 0 16 13" id="icon_checkbox" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 5.167L6.385 11 15 1" stroke="currentColor" stroke-width="1.6" />
        </symbol>
        <symbol fill="none" viewBox="0 0 24 24" id="icon_comment" xmlns="http://www.w3.org/2000/svg">
            <path d="M4.8 18v-.8h-4V.8h22.4v16.4H9.669l-.235.234L4.8 22.07V18z" stroke="currentColor"
                stroke-width="1.6" />
        </symbol>
        <symbol fill="none" viewBox="0 0 16 16" id="icon_minus" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 8h16" stroke="currentColor" stroke-width="1.6" />
        </symbol>
    </svg>
</div> --}}
<div class="row bg-dark d-none d-md-block" style="height: 40px"></div>
</body>

</html>