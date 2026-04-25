@extends('layouts.bootstrap')

@section('title', 'Daftar Mahasiswa')

@section('content')
<h1>Daftar Mahasiswa</h1>
<a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah Mahasiswa</a>

<form method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Cari nama atau NIM..." value="{{ $search }}">
        <button class="btn btn-outline-secondary" type="submit">Cari</button>
    </div>
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($mahasiswas as $mahasiswa)
        <tr>
            <td>{{ $mahasiswa->id_mahasiswa }}</td>
            <td>{{ $mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->nama }}</td>
            <td>{{ $mahasiswa->jurusan->nama_jurusan ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('mahasiswa.edit', $mahasiswa) }}" class="btn btn-warning btn-sm">Edit</a>
                <form method="POST" action="{{ route('mahasiswa.destroy', $mahasiswa) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">Tidak ada data mahasiswa.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $mahasiswas->appends(['search' => $search])->links() }}
@endsection
