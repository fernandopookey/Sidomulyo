<style>
    .btn-floating {
        position: fixed;
        right: 25px;
        overflow: hidden;
        width: 50px;
        height: 50px;
        border-radius: 100px;
        border: 0;
        z-index: 9999;
        color: white;
        transition: .2s;
    }

    .btn-floating:hover {
        width: auto;
        padding: 0 20px;
        cursor: pointer;
    }

    .btn-floating span {
        font-size: 16px;
        margin-left: 5px;
        transition: .2s;
        line-height: 0px;
        display: none;
    }

    .btn-floating:hover span {
        display: inline-block;
    }

    .btn-floating:hover img {
        margin-bottom: -3px;
    }



    .btn-floating.logo {
        bottom: 500px;
        background-color: #f0f0f0;
        border: 2px solid #fff;
        color: black;
    }

    .btn-floating.logo:hover {
        background-color: #f0f0f0;
    }

    .btn-floating.print {
        bottom: 450px;
        background-color: #00b9f2;
        border: 2px solid #fff;
    }

    .btn-floating.print:hover {
        background-color: #00b9f2;
    }

    .btn-floating.cs {
        bottom: 400px;
        background-color: #00b9f2;
        border: 2px solid #fff;
    }

    .btn-floating.cs:hover {
        background-color: #00b9f2;
    }

    .btn-floating.user {
        bottom: 350px;
        background-color: #00b9f2;
        border: 2px solid #fff;
    }

    .btn-floating.user:hover {
        background-color: #00b9f2;
    }

    .btn-floating.cart {
        bottom: 300px;
        background-color: #6d6d6d;
        border: 2px solid #fff;
    }

    .btn-floating.cart:hover {
        background-color: #102694;

    }

    .btn-floating.whatsapp {
        bottom: 25px;
        background-color: #34af23;
        border: 2px solid #fff;
    }

    .btn-floating.whatsapp:hover {
        background-color: #1f7a12;
    }
</style>

<!-- Floating Button -->
<!-- Top -->
<a href="/">
    <button class="btn-floating logo">
        <img src="/images/logocircle.png" width="40" alt="logo" />
        <span>Home</span>
    </button>
</a>
<a href="#">
    <button class="btn-floating print">
        <i class="fa-solid fa-print fa-2x"></i>
        <span>Cetak</span>
    </button>
</a>
<a href="#">
    <button class="btn-floating cs">
        <i class="fa-solid fa-phone fa-1x"></i>
        <span>Customer Service</span>
    </button>
</a>
<a href="#">
    <button class="btn-floating user">
        <i class="fa-solid fa-user fa-1x"></i>
        <span>User</span>
    </button>
</a>
<a href="#">
    <button class="btn-floating cart">
        <img src="/images/cart.png" style="max-width: 30px" alt="cart">
        <span>Keranjang</span>
    </button>
</a>

<!-- Bottom -->
<a href="https://wa.me/085254143531?text=I'm%20interested%20in%20your%20car%20for%20sale" target="_blank">
    <button class="btn-floating whatsapp">
        <img src="/images/whatsapp.png" alt="whatsapp">
        <span>Whatsapp</span>
    </button>
</a>