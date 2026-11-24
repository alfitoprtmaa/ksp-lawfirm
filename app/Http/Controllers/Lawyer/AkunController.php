<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    /**
     * Menampilkan halaman Pengaturan Akun Lawyer.
     */
    public function index()
    {
        // Struktur array disamakan dengan halaman Overview (lawyer.index)
        // dan disesuaikan dengan atribut tabel LAWYER + ROLE pada ERD
        $lawyer = [
            'lawyer_id'        => 1,
            'role_id'          => 2,
            'role_name'        => 'Lawyer',
            'full_name'        => 'Adv. Adi Pratama, S.H., M.H.',
            'email'            => 'adi.pratama@ksp-law.com',
            'phone'            => '+62 812-3456-7890',
            'specialization'   => 'Hukum Perdata & Korporasi',
            'self_description' => 'Advokat senior dengan pengalaman lebih dari 10 tahun dalam penyelesaian sengketa bisnis.',
            'account_status'   => 'active',
            'photo_path'       => 'images/avatar-lawyer-large.jpg',
        ];

        return view('lawyer.akun.index', compact('lawyer'));
    }

    /**
     * Memperbarui data profil dan kata sandi Lawyer.
     */
    public function update(Request $request)
    {
        $request->validate([
            'full_name'        => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'phone'            => 'nullable|string|max:25',
            'avatar'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'current_password' => 'nullable|string',
            'new_password'     => 'nullable|string|min:8|required_with:current_password',
        ], [
            'full_name.required'         => 'Nama lengkap wajib diisi.',
            'email.required'             => 'Email wajib diisi.',
            'email.email'                => 'Format email tidak valid.',
            'avatar.max'                 => 'Ukuran foto maksimal 2MB.',
            'new_password.min'           => 'Sandi baru minimal 8 karakter.',
            'new_password.required_with' => 'Masukkan sandi baru jika ingin mengubah sandi.',
        ]);

        // TODO (Tim Backend):
        // 1. Update tabel LAWYER (full_name, email, dan password_hash jika new_password diisi)
        // 2. Simpan file foto ke storage jika $request->hasFile('avatar')

        return redirect()
            ->route('lawyer.akun.index')
            ->with('success', 'Perubahan pengaturan akun berhasil disimpan.');
    }

    /**
     * Menghapus foto profil Lawyer.
     */
    public function deleteAvatar()
    {
        // TODO (Tim Backend): Hapus file avatar dari storage & kembalikan ke default

        return redirect()
            ->route('lawyer.akun.index')
            ->with('success', 'Foto profil berhasil dihapus.');
    }
}