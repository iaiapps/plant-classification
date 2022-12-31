@extends('layouts.app')

@section('title', 'Dashboard Page')

@section('content')
    <div class="container mt-3">
        <div class="text-center mb-3">
            <p class="display-6 m-0">PLANT LIST</p>
        </div>
        <div class="d-flex justify-content-between">
            <a href="plant/create" class="btn btn-success">Tambah Data Tumbuhan</a>
            <button class="btn btn-outline-success">Jumlah : {{ $plants->count() }}</button>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($plants as $plant)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>
                                {{-- <img src="storage/{{ $plant->img }}" alt="image-plant"> --}}
                                <img src="{{ asset('storage/' . $plant->img) }}" class="img-thumb" alt="image-plant">
                            </td>
                            <td>{{ $plant->name }}</td>
                            <td>
                                <a href="/plant/{{ $plant->id }}">detail</a>
                                <a href="/plant/{{ $plant->id }}/edit">edit</a>

                                <form action="/plant/{{ $plant->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center fs-3">
                            <td colspan="4">
                                Maaf data belum ada
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
