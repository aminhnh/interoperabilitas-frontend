@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.layout')

@section('title')
Lembaga
@endsection

@section('content')
<div class="container" style="padding-top: 5rem;">  
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lembaga</li>
        </ol>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-9 card d-flex flex-row p-3">
                <img src="/assets/ri_building-fill.png" width="150px" height="auto" alt="Icon 2">
                <div class="d-flex flex-column justify-content-between px-3">
                    <h1>Lembaga</h1>
                    <p class="text-justify">Sebanyak 11,507 lembaga/instansi/organisasi telah terdaftar dalam Sistem Ketersediaan Darah</p>
                </div>
            </div>
            <div class="col-3 d-flex flex-column justify-content-between pr-0">
                <div class="card p-2 d-flex flex-row align-items-baseline">
                    <h3 class="mb-0">1000</h3>
                    <p class="mb-0 px-2">Lembaga</p>
                </div>
                <div class="card p-2 d-flex flex-row align-items-baseline">
                    <h3 class="mb-0">574</h3>
                    <p class="mb-0 px-2">Instansi</p>
                </div>
                <div class="card p-2 d-flex flex-row align-items-baseline">
                    <h3 class="mb-0">673</h3>
                    <p class="mb-0 px-2">Organisasi</p>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 card d-flex flex-col p-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Ex: Nama Lembaga atau Alamat" aria-label="Ex: Nama Lembaga atau Alamat" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="searchButton">Cari</button>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Kode Pos</th>
                            <th scope="col">No Telp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lembagas as $lembaga)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $lembaga->nama }}</td>
                            <td>{{str_replace('_', ' ', Str::ucfirst($lembaga->jenis))}}</td>
                            <td>{{ $lembaga->alamat }}</td>
                            <td>{{ $lembaga->kode_pos }}</td>
                            <td>{{ $lembaga->no_telepon }}</td>
                        </tr>
                        @empty
                            <tr id="noDataMessage" class="d-none">
                                <td colspan="6" class="text-center">Tidak ada data yang bisa ditampilkan.</td>
                            </tr>
                        @endforelse
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
            const namaLembaga = row.children[1].textContent.toLowerCase().trim();
            const alamatLembaga = row.children[3].textContent.toLowerCase().trim();

            if (searchTerm === '' || namaLembaga.includes(searchTerm) || alamatLembaga.includes(searchTerm)) {
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
@endsection
