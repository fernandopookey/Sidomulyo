<style>
    .delete-gallery {
        display: block;
        position: absolute;
        top: -10px;
        right: 0;
    }
</style>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <section class="content">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('admin-product-update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $product->name) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="price" class="form-control rupiah"
                                        value="{{ old('price', $product->price) }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Product Category</label>
                                    <select name="categories_id" class="form-control">
                                        <option value="{{ $product->categories_id ?? 'Category has been deleted' }}">Not
                                            Changed ({{
                                            $product->categories->name ?? 'Category has been deleted' }})</option>
                                        @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description"
                                        id="editor">{!! old('description', $product->description) !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Additional Info</label>
                                    <textarea name="additional_info"
                                        id="editor2">{!! old('additional_info', $product->additional_info) !!}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-success px-5">
                                    Save
                                </button>
                            </div>
                            <div class="col-lg-6 text-right">
                                <a href="{{ route('admin-product') }}">
                                    <button type="button" class="btn btn-primary px-5">
                                        Back
                                    </button>
                                </a>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        @foreach ($product->galleries as $gallery)
                        <div class="col-md-4">
                            <div class="gallery-container">
                                <img src="{{ Storage::url($gallery->photos ?? '') }}" alt=""
                                    class="img-fluid w-100 mt-4 mb-4">
                                <a href="{{ route('admin-product-gallery-delete', $gallery->id) }}"
                                    class="delete-gallery">
                                    <img src="/images/icon-delete.svg" alt="">
                                </a>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-12">
                            <form action="{{ route('admin-product-gallery-upload') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="file" name="photos" id="file" style="display: none;"
                                    onchange="form.submit()">
                                <button type="button" class="btn btn-secondary mt-3" onclick="thisFileUpload()">
                                    Add Product Image
                                </button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>