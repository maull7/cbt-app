<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class DashboardController extends Controller
{
    public function index()
    {

        return view('index');
    }
    public function profile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
            'confirmPassword' => 'required_with:password|same:password',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $user = User::findOrFail($id);

        $user->name = $validated['name'];

        // Update password jika diisi
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        // Proses upload foto jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika bukan default.png
            if ($user->image && $user->image !== 'default.png' && Storage::exists('public/profile/admin/' . $user->image)) {
                Storage::delete('public/profile/admin/' . $user->image);
            }

            $image = $request->file('foto');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/profile/admin', $imageName);
            $user->image = $imageName;
        }


        $user->save();

        return redirect()->route('profile')->with('success', 'Data Berhasil DiPerbarui');
    }
}
