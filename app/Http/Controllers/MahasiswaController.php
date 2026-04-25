<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $mahasiswas = Mahasiswa::with('jurusan')
            ->when($search, function ($query) use ($search) {
                return $query->where('nama', 'like', '%' . $search . '%')
                             ->orWhere('nim', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('mahasiswa.index', compact('mahasiswas', 'search'));
    }

    public function create()
    {
        $jurusans = Jurusan::all();
        return view('mahasiswa.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|string|max:255|unique:mahasiswas',
            'nama' => 'required|string|max:255',
            'id_jurusan' => 'required|exists:jurusans,id_jurusan',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $jurusans = Jurusan::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'jurusans'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|string|max:255|unique:mahasiswas,nim,' . $mahasiswa->id_mahasiswa . ',id_mahasiswa',
            'nama' => 'required|string|max:255',
            'id_jurusan' => 'required|exists:jurusans,id_jurusan',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}