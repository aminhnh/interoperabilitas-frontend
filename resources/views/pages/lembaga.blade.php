@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.layout')

@section('title')
Lembaga
@endsection

@section('content')
    <div class="container" style="padding-top: 5rem;">  
        
        <div class="container">
            <div class="row ">
                <div class="col-9 card d-flex flex-row p-3">
                    <img  src="/assets/ri_building-fill.png" width="150px" height="auto" alt="Icon  2">
                    <div class="d-flex flex-column justify-content-between px-3 " >
                        <h1>Lembaga</h1>
                        <p class="text-justify">Sebanyak 11,507 lembaga/instansi/organisasi telah terdaftar dalam Sistem Ketersediaan Darah</p>
                    </div>
                </div>
                <div class="col-3 d-flex flex-column justify-content-between pr-0" >
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
                <input type="text" class="form-control" placeholder="Ex: Nama Lembaga, Alamat Lembaga" aria-label="Ex: Nama Lembaga, Alamat Lembaga" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">Search</button>
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
                @foreach ($lembagas as $lembaga)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $lembaga->nama }}</td>
                    <td>{{str_replace('_', ' ', Str::ucfirst($lembaga->jenis))}}</td>
                    <td>{{ $lembaga->alamat }}</td>
                    <td>{{$lembaga-> kode_pos}}</td>
                    <td>{{ $lembaga->no_telepon }}</td>
                </tr>
                @endforeach

            </tbody>
            </table>
            </div>
        </div>


        </div>

        


    </div>


@endsection


@section('script')
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('input[type="text"]');
        const tableRows = document.querySelectorAll('tbody tr');

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase();

            tableRows.forEach(row => {
                const rowData = row.textContent.toLowerCase();
                if (rowData.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Function to handle search button click
        document.querySelector('button').addEventListener('click', function() {
            const searchTerm = searchInput.value.toLowerCase();

            tableRows.forEach(row => {
                const rowData = row.textContent.toLowerCase();
                if (rowData.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
@endsection