@extends('layouts.app')
@section('title', 'Plants Page')

@section('content')
    <div class="wrapper">
        <div class="container pb-3">
            <p class="fs-3 pt-3">Daftar Tumbuhan, Cari Disini ...</p>
            <form action="">
                <div class="d-flex">
                    <input type="text" class="form-control form-control-lg w-75 me-1" placeholder="ketikkan sesuatu"
                        name="search" value="{{ request('search') }}" />

                    <button class="btn btn-success float-end w-25 fs-5" type="submit">
                        CARI ...
                    </button>
                </div>
            </form>

            <div class="bg-white rounded mt-4 p-3 ">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Name</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plants as $plant)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td> <img src="{{ asset('storage/' . $plant->img) }}" class="img-thumb" alt="">
                                </td>
                                <td>{{ $plant->name }}</td>
                                <td><a href="/plantlist/{{ $plant->id }}" class="btn btn-success"> <i
                                            class="bi bi-menu-up"></i>
                                    </a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
