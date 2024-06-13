@extends('layouts.layout')

@section('content')
<div class="p-5 mt-5">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card mb-4" style="width: 100%; height: 100%; background: white; box-shadow: -1px 2px 4px 2px rgba(0, 0, 0, 0.25); border-radius: 28px;">
        <div class="card-body d-flex align-items-center">
            <img src="assets/healthicons_blood-bag.png" alt="Gambar Darah" style="height: 172px; width: auto; margin-right: 20px;">
            <div>
                <div style="font-size: 64px;">Persediaan Darah</div>
                <div style="font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam minus saepe fuga molestiae alias. Sequi dolor amet doloremque, eum a id non neque possimus dignissimos tenetur veniam, incidunt at obcaecati?</div>
            </div>
        </div>
    </div>

    <div class="card" style="width: 100%; height: 100%; background: white; box-shadow: -1px 2px 4px 2px rgba(0, 0, 0, 0.25); border-radius: 28px;">
        <div class="card-header">
            <h2>Data Kantong Darah</h2>
        </div>
        <div class="card-body">
            <style>
                .red-header th {
                    background-color: #8B0000;
                    color: white; /* Adding white text color for better readability */
                }
            </style>
            <table class="table table-striped">
                <thead class="red-header">
                    <tr>
                        <th>No</th>
                        <th>Golongan Darah</th>
                        <th>Jumlah</th>
                        <th>Lembaga</th>
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
    </div>
</div>
@endsection
