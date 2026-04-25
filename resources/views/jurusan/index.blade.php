@extends('layouts.bootstrap')

@section('title', 'Daftar Jurusan')

@section('content')
<h1>Daftar Jurusan</h1>
<a href="{{ route('jurusan.create') }}" class="btn btn-primary mb-3">Tambah Jurusan</a>

<form method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Cari nama jurusan..." value="{{ $search }}">
        <button class="btn btn-outline-secondary" type="submit">Cari</button>
    </div>
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Jurusan</th>
            <th>Akreditasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($jurusans as $jurusan)
        <tr>
            <td>{{ $jurusan->id_jurusan }}</td>
            <td>{{ $jurusan->nama_jurusan }}</td>
            <td>{{ $jurusan->akreditasi }}</td>
            <td>
                <a href="{{ route('jurusan.edit', $jurusan) }}" class="btn btn-warning btn-sm">Edit</a>
                <form method="POST" action="{{ route('jurusan.destroy', $jurusan) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">Tidak ada data jurusan.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $jurusans->appends(['search' => $search])->links() }}
@endsection
