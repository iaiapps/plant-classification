@extends('layouts.app')
@section('title', 'About Page')

@section('content')
    <div class="wrapper">
        {{-- @dd($setting) --}}
        <div class="container">
            <p class="fs-3 pt-3">Tentang Aplikasi</p>

            <div class="bg-white text-dark mt-3 p-3 rounded">
                @forelse ($setting as $s)
                    <p>{{ $s->description }}</p>
                @empty
                    <p>tidak ada data</p>
                @endforelse
            </div>
        </div>
    </div>

@endsection
