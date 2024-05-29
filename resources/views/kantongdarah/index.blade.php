@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Kantong Darah</h1>

        @if (count($kantongdarah) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal Diperoleh</th>
                        <th>Tanggal Kadaluarsa</th>
                        <th>Jumlah</th>
                        <th>Jenis</th>
                        <th>Nama Lembaga</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($kantongdarah as $kantong)
                    <tr>
                        <td>{{ $kantong['id'] }}</td>
                        <td>{{ $kantong['tanggal_diperoleh'] }}</td>
                        <td>{{ $kantong['tanggal_kadaluarsa'] }}</td>
                        <td>{{ $kantong['jumlah'] }}</td>
                        <td>{{ $kantong['golongan_darah']['golongan_darah'] . $kantong['golongan_darah']['rhesus']}}</td>
                        <td>{{ $kantong['lembaga']['nama'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>No Kantong Darah records found.</p>
        @endif
    </div>
@endsection
