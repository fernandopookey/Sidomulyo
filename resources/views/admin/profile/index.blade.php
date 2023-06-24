<div class="row">
    <div class="col-md-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/admin/profile/update" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            {{-- <a href="{{ asset('images/tes.pdf') }}">Open the pdf!</a> --}}
            {{-- <a href="{{ Storage::disk('local')->url($profile->document) }}">Download Dokumen PDF</a> --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ isset($profile) ? $profile->name : old('name') }}" autocomplete="off">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Profil Perusahaan</label>
                        <textarea name="proper" id="editor"
                            class="form-control @error('proper') is-invalid @enderror">{!! isset($profile) ? $profile->proper : old('proper') !!}</textarea>
                        @error('proper')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Visi</label>
                        <textarea name="visi" id="editor2"
                            class="form-control @error('visi') is-invalid @enderror">{!! isset($profile) ? $profile->visi : old('visi') !!}</textarea>
                        @error('visi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Misi</label>
                        <textarea name="misi" id="editor3"
                            class="form-control @error('misi') is-invalid @enderror">{!! isset($profile) ? $profile->misi : old('misi') !!}</textarea>
                        @error('misi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="description" id="editor4"
                            class="form-control @error('description') is-invalid @enderror">{!! isset($profile) ? $profile->description : old('description') !!}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Document</label>
                        <input type="file" name="document" class="form-control" value="{{ $profile->document }}">
                        {{ $profile->document }}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="photos" class="form-control" value="{{ $profile->photos }}"
                            onchange="loadFile(event)">
                        <img src="{{ Storage::disk('local')->url($profile->photos) }}"
                            style="width: 250px; height: 200px; object-fit: cover;" class="pt-4" alt="">
                    </div>
                    <img id="output" class="pb-4" style="width: 250px; height: 200px; object-fit: cover;" />
                </div>

                <div class="row">
                    <div class="col-lg-6 text-start">
                        <button type="submit" class="btn btn-success px-5">
                            Simpan
                        </button>
                    </div>
                    {{-- <div class="col-lg-6">
                        <div class="col text-end">
                            <a href="{{ route('profile.show', $profile->id) }}">
                                <button type="button" class="btn btn-primary px-5">
                                    Detail
                                </button>
                            </a>
                        </div>
                    </div> --}}
                </div>
        </form>
    </div>
</div>

@push('addon-script')

<script>
    var loadFile = function(e) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
              .create(document.querySelector('#editor'))
              .then(editor => {
                console.log(editor);
              })
              .catch(error => {
                console.error(error);
              });
</script>

<script>
    ClassicEditor
              .create(document.querySelector('#editor2'))
              .then(editor => {
                console.log(editor);
              })
              .catch(error => {
                console.error(error);
              });
</script>

<script>
    ClassicEditor
              .create(document.querySelector('#editor3'))
              .then(editor => {
                console.log(editor);
              })
              .catch(error => {
                console.error(error);
              });
</script>

<script>
    ClassicEditor
              .create(document.querySelector('#editor4'))
              .then(editor => {
                console.log(editor);
              })
              .catch(error => {
                console.error(error);
              });
</script>
<script type="text/javascript">
    $(document).ready(function (e) {
 
   
   $('#image').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
 
</script>
@endpush