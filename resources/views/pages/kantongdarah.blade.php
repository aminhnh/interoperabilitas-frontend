@extends('layouts.layout')

@section('title')
Kantong Darah
@endsection

@section('content')
<div class="container" style="padding-top: 5rem;">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kantong Darah</li>
        </ol>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-9 card d-flex flex-row p-3">
                <img src="assets/healthicons_blood-bag.png" alt="Gambar Darah" width="150px" height="auto">
                <div class="d-flex flex-column justify-content-between px-3">
                    <h1>Kantong Darah</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam minus saepe fuga molestiae alias. Sequi dolor amet doloremque, eum a id non neque possimus dignissimos tenetur veniam, incidunt at obcaecati?</p>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 card d-flex flex-col p-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Ex: Golongan Darah (A, B, AB, O)" aria-label="Ex: Golongan Darah (A, B, AB, O)" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="searchButton">Cari</button>
                    </div>
                </div>

                <table class="table">
                    <thead class="red-header">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Golongan Darah</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Lembaga</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kantongdarah as $darah)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $darah->golongan_darah->golongan_darah }} {{ $darah->golongan_darah->rhesus }}</td>
                            <td>{{ $darah->jumlah ?? 'N/A' }}</td>
                            <td>{{ $darah->lembaga->nama ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('darah.show', $darah->id) }}" class="btn btn-info">Detail</a>
                                <a href="{{ route('darah.edit', $darah->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('darah.destroy', $darah->id) }}" method="post" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr id="noDataMessage" class="d-none">
                                <td colspan="5" class="text-center">Tidak ada data yang bisa ditampilkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div id="errorMessage" class="alert alert-danger d-none" role="alert">
                    Tidak ada data yang bisa ditampilkan.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
document.addEventListener('DOMContentLoaded', function() {
    const searchButton = document.getElementById('searchButton');
    const tableRows = document.querySelectorAll('tbody tr');
    const noDataMessage = document.getElementById('noDataMessage');
    const errorMessage = document.getElementById('errorMessage');

    searchButton.addEventListener('click', function() {
        const searchInput = document.querySelector('input[type="text"]');
        const searchTerm = searchInput.value.trim().toLowerCase();
        let dataFound = false;

        tableRows.forEach(row => {
            const golonganDarahCell = row.querySelector('td:nth-child(2)').textContent.toLowerCase().trim();
            const golonganDarah = golonganDarahCell.split(' ')[0]; // Ambil hanya golongan darah tanpa rhesus

            if (searchTerm === '') {
                row.style.display = ''; // Tampilkan jika pencarian kosong
                dataFound = true;
            } else if (searchTerm === 'a' && golonganDarah === 'a' && !golonganDarahCell.includes('ab')) {
                row.style.display = ''; // Tampilkan golongan darah A
                dataFound = true;
            } else if (searchTerm === 'b' && golonganDarah === 'b' && !golonganDarahCell.includes('ab')) {
                row.style.display = ''; // Tampilkan golongan darah B
                dataFound = true;
            } else if (searchTerm === 'ab' && golonganDarah === 'ab') {
                row.style.display = ''; // Tampilkan golongan darah AB
                dataFound = true;
            } else if (searchTerm === 'o' && golonganDarah === 'o') {
                row.style.display = ''; // Tampilkan golongan darah O
                dataFound = true;
            } else {
                row.style.display = 'none'; // Sembunyikan jika tidak sesuai dengan filter
            }
        });

        if (!dataFound) {
            errorMessage.classList.remove('d-none'); // Tampilkan pesan error jika tidak ada data
            noDataMessage.classList.remove('d-none'); // Tampilkan pesan "No data available"
        } else {
            errorMessage.classList.add('d-none'); // Sembunyikan pesan error jika ada data yang cocok
            noDataMessage.classList.add('d-none'); // Sembunyikan pesan "No data available"
        }
    });
});
@endsection
