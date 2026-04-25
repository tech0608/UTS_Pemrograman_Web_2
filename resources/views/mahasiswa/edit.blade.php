@extends('layouts.bootstrap')

@section('title', 'Edit Mahasiswa')

@section('content')
<h1>Edit Mahasiswa</h1>
<form method="POST" action="{{ route('mahasiswa.update', $mahasiswa) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" required>
        @error('nim')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" required>
        @error('nama')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="id_jurusan" class="form-label">Jurusan</label>
        <select class="form-control" id="id_jurusan" name="id_jurusan" required>
            <option value="">Pilih Jurusan</option>
            @foreach($jurusans as $jurusan)
                <option value="{{ $jurusan->id_jurusan }}" {{ old('id_jurusan', $mahasiswa->id_jurusan) == $jurusan->id_jurusan ? 'selected' : '' }}>{{ $jurusan->nama_jurusan }}</option>
            @endforeach
        </select>
        @error('id_jurusan')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
