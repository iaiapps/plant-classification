@extends('layouts.app')

@section('title', 'setting Edit Page')

@section('content')
    <div class="container mt-3 mb-5">
        <div class="text-center mb-3">
            <p class="display-6 m-0">Edit Data</p>
        </div>

        <div class="mt-4">
            <form action="/setting/{{ $setting->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Tumbuhan</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $setting->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi About</label>
                            <textarea type="text" class="form-control" id="description" name="description" rows='3' required>{{ $setting->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100 mt-3">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        //fungsi onchange
        function previewImg() {

            const thumbnail = document.querySelector('#thumbnail');
            const imgPreview = document.querySelector('.img-preview');

            //fungsi ambil data gambar
            const oFReader = new FileReader();
            oFReader.readAsDataURL(thumbnail.files[0]);

            //fungsi load data gambar
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>

@endsection
