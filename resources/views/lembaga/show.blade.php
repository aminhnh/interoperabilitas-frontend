@extends('layouts.layout')

@section('title', 'Detail Lembaga')

@section('content')
<div class="container" style="padding-top: 5rem;">  
    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('lembaga') }}">Lembaga</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $lembaga->nama }}</li>
        </ol>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <!-- Top Card -->
                <div class="card shadow-sm mb-4 position-relative">
                    <!-- Banner Container -->
                    <div class="card-img-top" style="background-color: #D9D9D9; height: 250px; background-size: cover; background-position: center;"></div>
                    <div class="card-body">
                        <!-- Profile Image Container -->
                        <div class="position-relative">
                            <div class="rounded-circle" style="background-color: #D9D9D9; width: 150px; height: 150px; position: absolute; top: -75px; left: 20px; border: 2px solid white; overflow: hidden;">
                                <img src="/assets/profile_image.jpg" class="img-fluid">
                            </div>
                        </div>
                        <!-- Lembaga Details -->
                        <div class="d-flex flex-column" style="margin-top: 80px;">
                            <h1>{{ $lembaga->nama }}</h1>
                            <p class="text-muted" style="font-size: 24px; text-transform: uppercase;">{{ str_replace('_', ' ', Str::ucfirst($lembaga->jenis)) }}</p>
                            <p class="text-muted">{{ $lembaga->kelurahan->nama }}, {{ $lembaga->kelurahan->kecamatan->nama }}, Kec. {{ $lembaga->kelurahan->kecamatan->kota->nama }}, {{ $lembaga->kelurahan->kecamatan->kota->provinsi->nama }} {{ $lembaga->kode_pos }}</p>
                            <p class="text-muted">{{ $lembaga->no_telepon }}</p>
                        </div>
                    </div>
                </div>

                <!-- Bottom Card for additional content -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <!-- Additional content can be added here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
