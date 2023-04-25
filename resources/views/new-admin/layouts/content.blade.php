@include('sweetalert::alert')

<div class="content-wrapper">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 mt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">{{ isset($title) ? $title : '' }}</h6>
        </div>
    </div>

    <!-- Main content -->
    <div class="card-body px-0 mx-4 mt-4">
        @if ($content)
        @include($content)
        @endif
    </div>
    <!-- /.content -->
</div>