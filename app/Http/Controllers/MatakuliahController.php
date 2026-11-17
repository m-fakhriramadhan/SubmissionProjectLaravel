<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;

class MatakuliahController extends Controller
{
    // Menampilkan seluruh data mata kuliah
    public function index()
    {
        $matakuliahs = Matakuliah::all();

        return view('matakuliah.index', compact('matakuliahs'));
    }

    // Menampilkan form tambah mata kuliah
    public function create()
    {
        return view('matakuliah.create');
    }

    // Memproses dan menyimpan data
    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required|string|max:20|unique:matakuliahs,kode_matakuliah',
            'nama_matakuliah' => 'required|string|max:100',
            'sks' => 'required|integer|min:1|max:6',
        ]);

        Matakuliah::create([
            'kode_matakuliah' => $request->kode_matakuliah,
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks' => $request->sks,
        ]);

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil ditambahkan.');
    }

    // Menampilkan detail mata kuliah berdasarkan ID
    public function show($id)
    {
        $matakuliah = Matakuliah::findOrFail($id);

        return view('matakuliah.show', compact('matakuliah'));
    }
}