<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="user-template/external/jquery/jquery.min.js"><\/script>')
</script>
<script async src="user-template/build/js/bundle.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}

{{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js'></script>
<script src="slider/dist/script.js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/644b852531ebfa0fe7fae2d8/1gv3g078f';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->


{{-- <script>
    $(document).ready(function() {
        //     cartload();

        $('.increment-btn').click(function(e) {
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
                value++;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });
        $('.decrement-btn').click(function(e) {
            e.preventDefault();
            var
                decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });

    });
</script> --}}


{{-- <script>
    function reserve(id, iteration) {
        const linkId = 'link_' + id + '_' + iteration;
        const linkElement = document.getElementById(linkId);
        const bookingContentElement = document.getElementById("bookingContent");

        bookingContentElement.style.display = "none"
        if (linkElement.className == "timing") {
            const myFormData = {
                id,
                iteration,
                "_token": "{{ csrf_token() }}",
            };

            $.ajax({
                type: 'POST',
                url: "<?= URL::to('/cart/update-quantity/{id}/{quantity}') ?>",
                data: myFormData,
                success: function(data) {
                    linkElement.className = "timing selected";
                },
                error: function(e) {
                    alert(e.statusText);
                }
            });
        } else if (linkElement.className == "timing selected") {
            const myFormData = {
                id,
                iteration,
                "_token": "{{ csrf_token() }}",
            };

            $.ajax({
                type: 'POST',
                url: "<?= URL::to('/delete-reserve') ?>",
                data: myFormData,
                success: function(data) {
                    linkElement.className = "timing";
                },
                error: function(e) {
                    alert(e.statusText);
                }
            });
        } else {
            alert("Jadwal sudah digunakan!!");
        }
        bookingContentElement.style.display = "block";
    };
</script> --}}

<script>
    const firstTotalPrice = document.getElementById('firstTotalPrice')
    const valorant = document.querySelectorAll('.valorant')
    const totalPriceInput = document.getElementById('totalPriceInput')

    function increaseQty(id, price, qty) {
        fetch(`/cart/update-quantity/${id}/1`).then(res => {
            if (res.ok) {
                const priceProductCart = document.getElementById(`priceProductCart-${id}`)
                const cartQtyValue = document.getElementById(`cartQtyValue-${id}`)
                const btnMinus = document.getElementById(`btnMinus-${id}`)
                // const jayho = document.querySelectorAll('.jayho')
                const totalPrice = price * +cartQtyValue.innerHTML

                // console.log(firstTotalPrice.dataset.totalprice)

                let totaltotalprice = 0

                valorant.forEach(e => {
                    if (e.id === cartQtyValue.id) {
                        totaltotalprice += +e.dataset.itemprice * (+e.innerHTML + 1)
                    } else {
                        totaltotalprice += +e.dataset.itemprice * +e.innerHTML
                    }
                })

                // console.log(totaltotalprice)
                firstTotalPrice.innerHTML = `Total Semua: Rp.  ${totaltotalprice.toLocaleString("id-ID")}`

                cartQtyValue.innerHTML = +cartQtyValue.innerHTML + 1
                priceProductCart.innerHTML = `Rp.  ${(totalPrice + price).toLocaleString("id-ID")}`

                if (cartQtyValue.innerHTML !== '1') {
                    btnMinus.disabled = false
                    // console.log(cartQtyValue.innerHTML)
                }
                totalPriceInput.value = totaltotalprice

            }
        })
    }

    function decreaseQty(id, price, qty) {
        fetch(`/cart/update-quantity/${id}/-1`).then(res => {
            if (res.ok) {
                const priceProductCart = document.getElementById(`priceProductCart-${id}`)
                const cartQtyValue = document.getElementById(`cartQtyValue-${id}`)
                const btnMinus = document.getElementById(`btnMinus-${id}`)
                // const jayho = document.querySelectorAll('.jayho')
                const totalPrice = price * +cartQtyValue.innerHTML
                // const sova = document.getElementById('sova');

                // console.log(firstTotalPrice.dataset.totalprice)

                // console.log(cartQtyValue.innerHTML)

                let totaltotalprice = 0


                valorant.forEach(e => {
                    if (e.id === cartQtyValue.id) {
                        totaltotalprice += +e.dataset.itemprice * (+e.innerHTML - 1)
                    } else {
                        totaltotalprice += +e.dataset.itemprice * +e.innerHTML
                    }
                })
                // console.log(totaltotalprice)
                firstTotalPrice.innerHTML = `Total Semua: Rp.  ${totaltotalprice.toLocaleString("id-ID")}`

                cartQtyValue.innerHTML = +cartQtyValue.innerHTML - 1
                priceProductCart.innerHTML = `Rp.  ${(totalPrice - price).toLocaleString("id-ID")}`

                if (cartQtyValue.innerHTML === '1') {
                    btnMinus.disabled = true
                    console.log(cartQtyValue.innerHTML)
                }
                totalPriceInput.value = totaltotalprice

            }
        })
    }
</script>
