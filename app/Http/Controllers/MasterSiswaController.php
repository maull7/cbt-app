<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasterSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::with('kelas')->get();

        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('siswa.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $siswa = $request->validate([
            'nis' => 'string|required',
            'nisn' => 'string|required',
            'nama' => 'string|required',
            'tanggal_lahir' => 'string|required',
            'jenis_kelamin' => 'string|required',
            'id_kelas' => 'required'
        ]);

        // Generate random 8-digit number as password
        $plainPassword = str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);

        // Tambahkan password ke data siswa (disimpan secara plain text)
        $siswa['password'] = $plainPassword;
        Siswa::create($siswa);

        // Tentukan gambar berdasarkan jenis kelamin
        $image = $request->jenis_kelamin == 'Laki-laki' ? 'pria.jpg' : 'perempuan.jpg';

        // Buat user dengan password yang sudah di-hash
        User::create([
            'name' => $request->nama,
            'username' => $request->nis,
            'image' => $image,
            'password' => Hash::make($plainPassword),
            'role' => 2
        ]);

        return redirect()->route('master_siswa.index')->with('success', 'Berhasil menambahkan siswa');
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
        $siswa = Siswa::findOrFail(base64_decode($id));
        $kelas = Kelas::all('id', 'nama_kelas');
        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = Siswa::findOrFail($id);

        // Validasi input
        $data = $request->validate([
            'nis' => 'string|required',
            'nisn' => 'string|required',
            'nama' => 'string|required',
            'tanggal_lahir' => 'string|required',
            'jenis_kelamin' => 'string|required',
            'id_kelas' => 'required'
        ]);

        // Update siswa
        $siswa->update($data);

        // Cari user berdasarkan username = nis lama (jika nis berubah)
        $user = User::where('username', $siswa->nis)->first();

        // Update user jika ditemukan
        if ($user) {
            $user->update([
                'name' => $request->nama,
                'username' => $request->nis,
                'image' => $request->jenis_kelamin == 'Laki-laki' ? 'pria.jpg' : 'perempuan.jpg'
                // password tidak diubah di update
            ]);
        }

        return redirect()->route('master_siswa.index')->with('success', 'Data siswa berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        $user = User::where('username', $siswa->nis)->first();
        if ($user) {
            $user->delete();
        }

        return redirect()->route('master_siswa.index')->with('success', 'Berhasil menghapus siswa');
    }
}
