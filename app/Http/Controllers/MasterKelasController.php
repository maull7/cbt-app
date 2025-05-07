<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;

class MasterKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::with('jurusan')->get();
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('kelas.create', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kelas = $request->validate([
            'kelas' => 'string|required',
            'nama_kelas' => 'string|required',
            'id_jurusan' => 'required'
        ]);

        Kelas::create($kelas);
        return redirect()->route('master_kelas.index')->with('success', 'Berhasil menambahkan kelas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jurusan = Jurusan::all();
        $kelas = Kelas::findOrFail(base64_decode($id));

        return view('kelas.edit', compact('jurusan', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kelas = Kelas::findOrFail($id);

        $data = $request->validate([
            'kelas' => 'string|required',
            'nama_kelas' => 'string|required',
            'id_jurusan' => 'required'
        ]);

        $kelas->update($data);
        return redirect()->route('master_kelas.index')->with('success', 'Berhasil mengubah kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);

        $kelas->delete();
        return redirect()->route('master_kelas.index')->with('success', 'Berhasil menghapus kelas');
    }
}
