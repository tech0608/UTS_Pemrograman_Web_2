<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatakuliahController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $matakuliahs = Matakuliah::with('jurusan')
            ->when($search, function ($query) use ($search) {
                return $query->where('nama_matakuliah', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('matakuliah.index', compact('matakuliahs', 'search'));
    }

    public function create()
    {
        $jurusans = Jurusan::all();
        return view('matakuliah.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_matakuliah' => 'required|string|max:255',
            'sks' => 'required|integer|min:1',
            'id_jurusan' => 'required|exists:jurusans,id_jurusan',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Matakuliah::create($request->all());

        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah berhasil ditambahkan.');
    }

    public function edit(Matakuliah $matakuliah)
    {
        $jurusans = Jurusan::all();
        return view('matakuliah.edit', compact('matakuliah', 'jurusans'));
    }

    public function update(Request $request, Matakuliah $matakuliah)
    {
        $validator = Validator::make($request->all(), [
            'nama_matakuliah' => 'required|string|max:255',
            'sks' => 'required|integer|min:1',
            'id_jurusan' => 'required|exists:jurusans,id_jurusan',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $matakuliah->update($request->all());

        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah berhasil diperbarui.');
    }

    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();

        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah berhasil dihapus.');
    }
}