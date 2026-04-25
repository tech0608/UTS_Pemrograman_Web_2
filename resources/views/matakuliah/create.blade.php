@extends('layouts.bootstrap')

@section('title', 'Tambah Matakuliah')

@section('content')
<h1>Tambah Matakuliah</h1>
<form method="POST" action="{{ route('matakuliah.store') }}">
    @csrf
    <div class="mb-3">
        <label for="nama_matakuliah" class="form-label">Nama Matakuliah</label>
        <input type="text" class="form-control" id="nama_matakuliah" name="nama_matakuliah" value="{{ old('nama_matakuliah') }}" required>
        @error('nama_matakuliah')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="sks" class="form-label">SKS</label>
        <input type="number" class="form-control" id="sks" name="sks" value="{{ old('sks') }}" required min="1">
        @error('sks')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="id_jurusan" class="form-label">Jurusan</label>
        <select class="form-control" id="id_jurusan" name="id_jurusan" required>
            <option value="">Pilih Jurusan</option>
            @foreach($jurusans as $jurusan)
                <option value="{{ $jurusan->id_jurusan }}" {{ old('id_jurusan') == $jurusan->id_jurusan ? 'selected' : '' }}>{{ $jurusan->nama_jurusan }}</option>
            @endforeach
        </select>
        @error('id_jurusan')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
