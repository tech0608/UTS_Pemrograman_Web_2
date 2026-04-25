@extends('layouts.bootstrap')

@section('title', 'Dashboard')

@section('content')
    <h2 class="mb-4">Dashboard</h2>
    <div class="alert alert-info">
        {{ __("You're logged in!") }}
    </div>

    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Jurusan</h5>
                    <a href="{{ route('jurusan.index') }}" class="btn btn-primary">Kelola Jurusan</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Mahasiswa</h5>
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary">Kelola Mahasiswa</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Matakuliah</h5>
                    <a href="{{ route('matakuliah.index') }}" class="btn btn-primary">Kelola Matakuliah</a>
                </div>
            </div>
        </div>
    </div>
@endsection
