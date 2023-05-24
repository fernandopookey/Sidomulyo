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



    .btn-floating.satu {
        bottom: 650px;
        background-color: #00b9f2;
        border: 2px solid #fff;
    }

    .btn-floating.satu:hover {
        background-color: #00b9f2;
    }

    .btn-floating.dua {
        bottom: 590px;
        background-color: #00b9f2;
        border: 2px solid #fff;
    }

    .btn-floating.dua:hover {
        background-color: #00b9f2;
    }

    .btn-floating.tiga {
        bottom: 530px;
        background-color: #00b9f2;
        border: 2px solid #fff;
    }

    .btn-floating.tiga:hover {
        background-color: #00b9f2;
    }

    .btn-floating.empat {
        bottom: 470px;
        background-color: #00b9f2;
        border: 2px solid #fff;
    }

    .btn-floating.empat:hover {
        background-color: #00b9f2;
    }
</style>

<!-- Floating Button -->
<!-- Top -->

@foreach ($floating as $item)
<a href="{{ $item->link }}" target="_blank">
    <button class="btn-floating satu">
        <img src="{{ Storage::url($item->photos) }}" width="40" alt="logo" />
        <span>{{ $item->name }}</span>
    </button>
</a>
@endforeach

@foreach ($secondFloating as $item)
<a href="{{ $item->link }}" target="_blank">
    <button class="btn-floating dua">
        <img src="{{ Storage::url($item->photos) }}" width="40" alt="logo" />
        <span>{{ $item->name }}</span>
    </button>
</a>
@endforeach
@foreach ($thirdFloating as $item)
<a href="{{ $item->link }}" target="_blank">
    <button class="btn-floating tiga">
        <img src="{{ Storage::url($item->photos) }}" width="40" alt="logo" />
        <span>{{ $item->name }}</span>
    </button>
</a>
@endforeach
@foreach ($fourthFloating as $item)
<a href="{{ $item->link }}" target="_blank">
    <button class="btn-floating empat">
        <img src="{{ Storage::url($item->photos) }}" width="40" alt="logo" />
        <span>{{ $item->name }}</span>
    </button>
</a>
@endforeach