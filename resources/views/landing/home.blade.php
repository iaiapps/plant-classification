@extends('layouts.app')
@section('title', 'Home Page')

@section('content')
    <div class="wrapper vh-100">
        <div class="container ">
            <div class="text-center">
                <img class="logo mt-5 mb-5" src="/img/logo.svg" alt="plantLogo" />
                <p class="display-4 text-uppercase">Plant Classification Organizer</p>
                <p class="display-6 m-0">Klasifikasi Tumbuhan dan Manfaatnya</p>

                <div class="mt-5">
                    <a href="/plant" class="btn btn-light btn-lg">CARI DISINI ...</a>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partials.footer')
@endsection
