@extends('layouts.bootstrap')

@section('title', 'Edit Jurusan')

@section('content')
<h1>Edit Jurusan</h1>
<form method="POST" action="{{ route('jurusan.update', $jurusan) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
        <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}" required>
        @error('nama_jurusan')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="akreditasi" class="form-label">Akreditasi</label>
        <input type="text" class="form-control" id="akreditasi" name="akreditasi" value="{{ old('akreditasi', $jurusan->akreditasi) }}" required>
        @error('akreditasi')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
