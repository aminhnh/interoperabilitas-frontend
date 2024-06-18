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
                    <input type="text" class="form-control" placeholder="Ex: Golongan Darah, Nama Lembaga" aria-label="Ex: Golongan Darah, Nama Lembaga" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">Search</button>
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
                            <td>{{ $darah->golongan_darah->golongan_darah ?? 'N/A' }}</td>
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
                            <tr>
                                <td colspan="5" class="text-center">No data available.</td>
                            </tr>
                        @endforelse
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
