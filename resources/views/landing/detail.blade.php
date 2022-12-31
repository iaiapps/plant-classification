@extends('layouts.app')
@section('title', 'Details Page')

@section('content')
    <div class="container pb-3">
        <p class="fs-3 mt-3 text-center">Nama Tumbuhan : {{ $plant->name }}</p>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="bg-white rounded p-3">
                    <p class="text-dark fs-4">Gambar Tumbuhan</p>

                    <img class="img-fluid" src="{{ asset('storage/' . $plant->img) }}" alt="imgPlant" />
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="bg-white rounded p-3">
                    <p class="text-dark fs-4">Classification</p>
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <td class="lebar">Kingdom</td>
                                <td>{{ $plant->classification->kingdom }}</td>
                            </tr>
                            <tr>
                                <td class="lebar">division</td>
                                <td>{{ $plant->classification->division }}</td>
                            </tr>
                            <tr>
                                <td class="lebar">class</td>
                                <td>{{ $plant->classification->class }}</td>
                            </tr>
                            <tr>
                                <td class="lebar">order</td>
                                <td>{{ $plant->classification->order }}</td>
                            </tr>
                            <tr>
                                <td class="lebar">family</td>
                                <td>{{ $plant->classification->family }}</td>
                            </tr>
                            <tr>
                                <td class="lebar">genus</td>
                                <td>{{ $plant->classification->genus }}</td>
                            </tr>
                            <tr>
                                <td class="lebar">species</td>
                                <td>{{ $plant->classification->species }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="bg-white rounded mt-4 p-3">
            <p class="text-dark fs-4 ">Deskripsi</p>
            <p class="text-dark">{{ $plant->description }}</p>
        </div>
        <div class="bg-white rounded mt-4 p-3">
            <p class="text-dark fs-4 ">Manfaat</p>
            <p class="text-dark">{{ $plant->benefit }}</p>
        </div>
    </div>

@endsection
