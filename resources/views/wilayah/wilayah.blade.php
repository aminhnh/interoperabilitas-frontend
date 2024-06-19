@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.layout')

@section('title')
Wilayah
@endsection

@section('content')
<div class="container" style="padding-top: 5rem;">  
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Wilayah</li>
        </ol>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-9 card d-flex flex-row p-3">
                <img src="/assets/tdesign_map-location.png" width="150px" height="auto" alt="Icon 2">
                <div class="d-flex flex-column justify-content-between px-3">
                    <h1>Wilayah</h1>
                    <p class="text-justify">Sebanyak 11,507 wilayah telah terdaftar dalam Sistem Ketersediaan Darah</p>
                </div>
            </div>
            <div class="col-3 d-flex flex-column justify-content-between pr-0">
                <div class="card p-2 d-flex flex-row align-items-baseline">
                    <h3 class="mb-0">3000</h3>
                    <p class="mb-0 px-2">Kelurahan</p>
                </div>
                <div class="card p-2 d-flex flex-row align-items-baseline">
                    <h3 class="mb-0">574</h3>
                    <p class="mb-0 px-2">Kecamatan</p>
                </div>
                <div class="card p-2 d-flex flex-row align-items-baseline">
                    <h3 class="mb-0">673</h3>
                    <p class="mb-0 px-2">Kabupaten</p>
                </div>
                <div class="card p-2 d-flex flex-row align-items-baseline">
                    <h3 class="mb-0">34</h3>
                    <p class="mb-0 px-2">Provinsi</p>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 card d-flex flex-col p-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Ex: Nama Kelurahan atau Alamat" aria-label="Ex: Nama Kelurahan atau Alamat" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="searchButton">Cari</button>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kelurahan</th>
                            <th scope="col">Kecamatan</th>
                            <th scope="col">Kabupaten</th>
                            <th scope="col">Provinsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data statis sementara untuk contoh -->
                        <tr>
                            <th scope="row">1</th>
                            <td>Kelurahan 1</td>
                            <td>Kecamatan 1</td>
                            <td>Kabupaten 1</td>
                            <td>Provinsi 1</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Kelurahan 2</td>
                            <td>Kecamatan 2</td>
                            <td>Kabupaten 2</td>
                            <td>Provinsi 2</td>
                        </tr>
                        <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
                        <tr id="noDataMessage" class="d-none">
                            <td colspan="5" class="text-center">Tidak ada data yang bisa ditampilkan.</td>
                        </tr>
                    </tbody>
                </table>

                <div id="errorMessage" class="alert alert-danger d-none" role="alert">
                    Tidak ada data yang sesuai dengan pencarian.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchButton = document.getElementById('searchButton');
    const searchInput = document.querySelector('input[type="text"]');
    const tableRows = document.querySelectorAll('tbody tr');
    const noDataMessage = document.getElementById('noDataMessage');
    const errorMessage = document.getElementById('errorMessage');

    searchButton.addEventListener('click', function() {
        const searchTerm = searchInput.value.trim().toLowerCase();
        let dataFound = false;

        tableRows.forEach(row => {
            const kelurahan = row.children[1].textContent.toLowerCase().trim();
            const kecamatan = row.children[2].textContent.toLowerCase().trim();
            const kabupaten = row.children[3].textContent.toLowerCase().trim();
            const provinsi = row.children[4].textContent.toLowerCase().trim();

            if (searchTerm === '' || kelurahan.includes(searchTerm) || kecamatan.includes(searchTerm) || kabupaten.includes(searchTerm) || provinsi.includes(searchTerm)) {
                row.style.display = '';
                dataFound = true;
            } else {
                row.style.display = 'none';
            }
        });

        if (!dataFound) {
            errorMessage.classList.remove('d-none');
            noDataMessage.classList.remove('d-none');
        } else {
            errorMessage.classList.add('d-none');
            noDataMessage.classList.add('d-none');
        }
    });
});
</script>
@endsection
