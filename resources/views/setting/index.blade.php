@extends('layouts.app')

@section('title', 'Dashboard Page')

@section('content')
    <div class="container mt-3">
        <div class="text-center mb-3">
            <p class="display-6 m-0">SETTING PAGE</p>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($settings as $setting)
                        <tr>
                            <th>{{ $loop->iteration }}</th>

                            <td>{{ $setting->name }}</td>
                            <td>{{ $setting->description }}</td>
                            <td>
                                {{-- <a href="/setting/{{ $setting->id }}">detail</a> --}}
                                <a href="/setting/{{ $setting->id }}/edit">edit</a>

                                {{-- <form action="/setting/{{ $setting->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">delete</button>
                                </form> --}}
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
