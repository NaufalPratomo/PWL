<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Menampilkan form edit profil
     */
    public function edit()
    {
        $activeMenu = 'profile';
        $breadcrumb = (object) [
            'title' => 'Edit Profil',
            'list' => ['Beranda', 'Profil', 'Edit']
        ];
        return view('profile.edit', ['activeMenu' => $activeMenu, 'breadcrumb' => $breadcrumb]);
    }

    /**
     * Update profil pengguna
     */
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:100', // Sesuai dengan migrasi m_user (max 100 karakter)
            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:2048',
                function ($attribute, $value, $fail) {
                    if ($value->getSize() > 2048 * 1024) {
                        $fail('Ukuran file terlalu besar. Maksimal 2MB.');
                    }

                    $image = getimagesize($value);
                    if ($image[0] > 2000 || $image[1] > 2000) {
                        $fail('Dimensi gambar terlalu besar. Maksimal 2000x2000 piksel.');
                    }
                },
            ],
        ]);

        // Dapatkan user yang sedang login
        $user = auth()->user();

        // Update data dasar - gunakan 'nama' bukan 'name'
        $user->nama = $request->nama;

        // Cek apakah ada upload foto
        if ($request->hasFile('profile_photo')) {
            // Hapus foto lama jika ada
            if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // Simpan foto baru
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $user->profile_photo = $path;
        }

        // Simpan perubahan
        /** @var \App\Models\User $user */
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }
}
