@extends('layouts.app')

@section('title', 'Plant Edit Page')

@section('content')
    <div class="container mt-3 mb-5">
        <div class="text-center mb-3">
            <p class="display-6 m-0">Edit Data Tumbuhan</p>
        </div>

        <div class="mt-4">
            <form action="/plant/{{ $plant->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col">
                        <p class="fs-4 text-center">Data Tumbuhan</p>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Tumbuhan</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $plant->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi Tumbuhan</label>
                            <input type="text" class="form-control" id="description" name="description"
                                value="{{ $plant->description }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="benefit" class="form-label">Manfaat Tumbuhan</label>
                            <input type="text" class="form-control" id="benefit" name="benefit"
                                value="{{ $plant->benefit }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail, max: 512 kb</label>
                            <input type="file" class="form-control" id="thumbnail" name="img"
                                value="{{ $plant->img }}" onchange="previewImg()">
                            <div class="border p-2 mt-2 rounded">
                                <p>preview image</p>
                                @if ($plant->img)
                                    <img src="{{ asset('storage/' . $plant->img) }}" class="img-preview col-6">
                                @else
                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <p class="fs-4 text-center">Klasifikasi</p>
                        <div class="mb-3">
                            <label for="kingdom" class="form-label">Kingdom</label>
                            <input type="text" class="form-control" id="kingdom" name="kingdom"
                                value="{{ $plant->classification->kingdom }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="division" class="form-label">Division</label>
                            <input type="text" class="form-control" id="division" name="division"
                                value="{{ $plant->classification->division }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="class" class="form-label">Class</label>
                            <input type="text" class="form-control" id="class" name="class"
                                value="{{ $plant->classification->class }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="order" class="form-label">Order</label>
                            <input type="text" class="form-control" id="order" name="order"
                                value="{{ $plant->classification->order }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="family" class="form-label">Family</label>
                            <input type="text" class="form-control" id="family" name="family"
                                value="{{ $plant->classification->family }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="genus" class="form-label">Genus</label>
                            <input type="text" class="form-control" id="genus" name="genus"
                                value="{{ $plant->classification->genus }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="species" class="form-label">Species</label>
                            <input type="text" class="form-control" id="species" name="species"
                                value="{{ $plant->classification->species }}" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success w-100 mt-3">Submit</button>
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
