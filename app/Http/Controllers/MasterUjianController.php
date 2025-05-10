<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Ujian;
use Illuminate\Http\Request;

class MasterUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ujian = Ujian::with('mapel')->get();
        return view('ujian.index', compact('ujian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mapel = Mapel::all('id', 'nama_mapel');
        return view('ujian.create', compact('mapel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_mapel' => 'required',
            'nama_ujian' => 'required|string',
            'jumlah_soal' => 'required',
            'soal_acak' => 'required',
            'jawaban_acak' => 'required',
            'deskripsi' => ['required', function ($attribute, $value, $fail) {
                $valueWithoutTags = strip_tags($value); // Menghapus tag HTML
                if (trim($valueWithoutTags) === '') {
                    $fail('Deskripsi tidak boleh kosong.');
                }
            }],
        ]);

        Ujian::create($validated);

        return redirect()->route('master_ujian.index')->with('success', 'Berhasil Menambahkan ujian');
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
        $mapel = Mapel::all('id', 'nama_mapel');
        $ujian = Ujian::findOrFail(base64_decode($id));
        return view('ujian.edit', compact('ujian', 'mapel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Ujian::findOrFail($id);

        $validated = $request->validate([
            'id_mapel' => 'required',
            'nama_ujian' => 'required|string',
            'jumlah_soal' => 'required',
            'soal_acak' => 'required',
            'jawaban_acak' => 'required',
            'deskripsi' => ['required', function ($attribute, $value, $fail) {
                $valueWithoutTags = strip_tags($value); // Menghapus tag HTML
                if (trim($valueWithoutTags) === '') {
                    $fail('Deskripsi tidak boleh kosong.');
                }
            }],
        ]);


        $data->update($validated);
        return redirect()->route('master_ujian.index')->with('success', 'Berhasil Mengedit data Ujian');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Ujian::findOrFail($id);
        $data->delete();

        return redirect()->route('master_ujian.index');
    }
}
