<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasterGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::all();

        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $guru = $request->validate([
            'nip' => 'string|required',
            'nama' => 'string|required',
            'tanggal_lahir' => 'string|required',
            'jenis_kelamin' => 'string|required',
        ]);

        // Generate random 8-digit number as password
        $plainPassword = str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);

        // Tambahkan password ke data siswa (disimpan secara plain text)
        $guru['password'] = $plainPassword;
        Guru::create($guru);

        // Tentukan gambar berdasarkan jenis kelamin
        $image = $request->jenis_kelamin == 'Laki-laki' ? 'pria.jpg' : 'perempuan.jpg';

        // Buat user dengan password yang sudah di-hash
        User::create([
            'name' => $request->nama,
            'username' => $request->nip,
            'image' => $image,
            'password' => Hash::make($plainPassword),
            'role' => 3
        ]);

        return redirect()->route('master_guru.index')->with('success', 'Berhasil menambahkan guru');
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
        $guru = Guru::findOrFail(base64_decode($id));

        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $guru = Guru::findOrFail($id);

        // Validasi input
        $data = $request->validate([
            'nip' => 'string|required',
            'nama' => 'string|required',
            'tanggal_lahir' => 'string|required',
            'jenis_kelamin' => 'string|required',

        ]);

        // Update siswa
        $guru->update($data);

        // Cari user berdasarkan username = nis lama (jika nis berubah)
        $user = User::where('username', $guru->nip)->first();

        // Update user jika ditemukan
        if ($user) {
            $user->update([
                'name' => $request->nama,
                'username' => $request->nip,
                'image' => $request->jenis_kelamin == 'Laki-laki' ? 'pria.jpg' : 'perempuan.jpg'
            ]);
        }

        return redirect()->route('master_guru.index')->with('success', 'Data Guru berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('master_guru.index')->with('success', 'Data Guru berhasil dihapus');
    }
}
