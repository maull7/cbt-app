<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MasterMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapel = Mapel::with('guru')->get();
        return view('mapel.index', compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guru = Guru::all();
        return view('mapel.create', compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_mapel' => 'required|string',
            'id_guru' => 'required'
        ]);

        Mapel::create($validate);
        return redirect()->route('master_mapel.index')->with('success', 'Berhasil Menyimpan Mata pelajaran');
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
        $mapel = Mapel::findOrFail(base64_decode($id)); // ✅ jika ingin Laravel tangani error 404
        $guru = Guru::all();
        return view('mapel.edit', compact('mapel', 'guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mapel = Mapel::findOrFail($id);
        $data = $request->validate([
            'nama_mapel' => 'string|required',
            'id_guru' => 'required'
        ]);
        $mapel->update($data);

        return redirect()->route('master_mapel.index')->with('success', 'Berhasil Mengubah Data Mapel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return redirect()->route('master_mapel.index')->with('succes', 'Berhasil Menghapus Data Mapel');
    }
}
