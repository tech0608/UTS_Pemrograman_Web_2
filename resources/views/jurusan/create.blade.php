@extends('layouts.bootstrap')

@section('title', 'Tambah Jurusan')

@section('content')
<h1>Tambah Jurusan</h1>
<form method="POST" action="{{ route('jurusan.store') }}">
    @csrf
    <div class="mb-3">
        <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
        <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" value="{{ old('nama_jurusan') }}" required>
        @error('nama_jurusan')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="akreditasi" class="form-label">Akreditasi</label>
        <input type="text" class="form-control" id="akreditasi" name="akreditasi" value="{{ old('akreditasi') }}" required>
        @error('akreditasi')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
