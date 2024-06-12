@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Daftar Kantong Darah</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Golongan Darah</th>
                <th>Jumlah</th>
                <th>Lokasi</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kantongdarah as $darah)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $darah->golongan_darah->golongan_darah ?? 'N/A' }}</td>
                <td>{{ $darah['jumlah'] ?? 'N/A' }}</td>
                <td>{{ $darah->golongan_darah ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('darah.show', $darah['id']) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('darah.edit', $darah['id']) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('darah.destroy', $darah['id']) }}" method="post" style="display:inline-block;">
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
@endsection
