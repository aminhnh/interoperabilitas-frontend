@extends('layouts.layout')

@section('title')
Lembaga
@endsection

@section('content')
    <div class="container" style="padding-top: 5rem;">
        <div class="jejak d-flex flex-row">
            <img width="20rem" src="{{ asset('assets/ic_baseline-home.svg') }}">    
            <a class="p-2 text-muted" href="/dashboard">Dashboard/List Lembaga</a>
        </div>
        
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
                <th scope="col">Alamat</th>
                <th scope="col">No Telp</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Considine and Sons</td>
                <td>989 Hank Knoll Port Jayneton, ND 81834</td>
                <td>+1-386-691-9124</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Thompson, Stehr and Goodwin</td>
                <td>2623 Esperanza Loaf Apt. 708 Abbottfurt, IL 41395-5096</td>
                <td>+1-859-970-8427</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>Hirthe Ltd</td>
                <td>23151 Quigley Camp Lake Marianoville, RI 25886</td>
                <td>+1 (534) 610-6500</td>
                </tr>
                <tr>
                <th scope="row">4</th>
                <td>Armstrong-Hill</td>
                <td>74009 Haley Prairie Maggiobury, TX 91278</td>
                <td>+1-270-880-3562</td>
                </tr>
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