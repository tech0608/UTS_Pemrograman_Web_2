@extends('layouts.bootstrap')

@section('title', 'Daftar Matakuliah')

@section('content')
<h1>Daftar Matakuliah</h1>
<a href="{{ route('matakuliah.create') }}" class="btn btn-primary mb-3">Tambah Matakuliah</a>

<form method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Cari nama matakuliah..." value="{{ $search }}">
        <button class="btn btn-outline-secondary" type="submit">Cari</button>
    </div>
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Matakuliah</th>
            <th>SKS</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($matakuliahs as $matakuliah)
        <tr>
            <td>{{ $matakuliah->id_matakuliah }}</td>
            <td>{{ $matakuliah->nama_matakuliah }}</td>
            <td>{{ $matakuliah->sks }}</td>
            <td>{{ $matakuliah->jurusan->nama_jurusan ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('matakuliah.edit', $matakuliah) }}" class="btn btn-warning btn-sm">Edit</a>
                <form method="POST" action="{{ route('matakuliah.destroy', $matakuliah) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">Tidak ada data matakuliah.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $matakuliahs->appends(['search' => $search])->links() }}
@endsection
