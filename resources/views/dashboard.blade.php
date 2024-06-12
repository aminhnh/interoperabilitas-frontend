@extends('layouts/app')

@section('title')
Dashboard
@endsection

@section('content')
    <div class="container text-center" style="padding-top: 5rem;">
        <h2 class="">Selamat datang, User!</h2>
        <div class="">Apa yang ingin Anda lakukan hari ini?</div>

        <div class="card-deck row mt-5 justify-content-center ">
            <div class="col-md-3">
                <a class="card card-custom align-items-center custom-link-style">
                    <img src="/assets/healthicons_blood-bag.png" class="card-img-top" alt="Icon 1">
                    <div class="card-body">
                        <h5 class="card-title">Persediaan Darah</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('dashboard.lembaga') }}" class="card card-custom align-items-center custom-link-style">
                    <img  src="/assets/ri_building-fill.png" class="card-img-top" alt="Icon 2">
                    <div class="card-body">
                        <h5 class="card-title">Lembaga</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a class="card card-custom align-items-center custom-link-style">
                    <img src="/assets/tdesign_map-location.png" class="card-img-top" alt="Icon 3">
                    <div class="card-body">
                        <h5 class="card-title ">Wilayah</h5>
                    </div>
                </a>
            </div>
        </div>
        
    </div>

@endsection

