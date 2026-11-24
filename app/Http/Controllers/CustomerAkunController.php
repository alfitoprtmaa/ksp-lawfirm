<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerAkunController extends Controller
{
    public function index()
    {
        // Simulasi data dari tabel CUSTOMER sesuai ERD
        $customer = session('customer_user', [
            'customer_id'    => 1,
            'full_name'      => 'Alfito Pratama',
            'email'          => 'alfito.pratama@email.com',
            'password_hash'  => 'password123',
            'account_status' => 'active',
            'created_at'     => '2026-10-15 09:00:00',
        ]);

        // Nomor telepon diambil dari data BOOKING terbaru milik customer (karena kolom phone ada di tabel BOOKING)
        $latestBookingPhone = session('customer_phone', '+62 812-3456-7890');
        $avatarUrl = session('customer_avatar', null);

        return view('customer.akun.index', compact(
            'customer',
            'latestBookingPhone',
            'avatarUrl'
        ));
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'max:255'],
            'phone'     => ['nullable', 'string', 'max:30'],
        ], [
            'full_name.required' => 'Nama lengkap wajib diisi.',
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
        ]);

        // Simulasi update tabel CUSTOMER (full_name, email) & session sementara
        $customer = session('customer_user', [
            'customer_id'    => 1,
            'password_hash'  => 'password123',
            'account_status' => 'active',
            'created_at'     => '2026-10-15 09:00:00',
        ]);

        $customer['full_name'] = $validated['full_name'];
        $customer['email']     = $validated['email'];

        session([
            'customer_user'  => $customer,
            'customer_phone' => $validated['phone'] ?? '+62 812-3456-7890',
        ]);

        return back()->with('success_profile', 'Informasi pribadi berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'string'],
            'password'         => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'current_password.required' => 'Kata sandi saat ini wajib diisi.',
            'password.required'         => 'Kata sandi baru wajib diisi.',
            'password.min'              => 'Kata sandi baru minimal 8 karakter.',
            'password.confirmed'        => 'Konfirmasi kata sandi baru tidak cocok.',
        ]);

        $customer = session('customer_user', [
            'customer_id'    => 1,
            'full_name'      => 'Alfito Pratama',
            'email'          => 'alfito.pratama@email.com',
            'password_hash'  => 'password123',
            'account_status' => 'active',
        ]);

        // Simulasi pengecekan password_hash pada tabel CUSTOMER
        if ($validated['current_password'] !== $customer['password_hash']) {
            return back()
                ->withErrors(['current_password' => 'Kata sandi saat ini tidak sesuai.'])
                ->withInput();
        }

        $customer['password_hash'] = $validated['password'];
        session(['customer_user' => $customer]);

        return back()->with('success_password', 'Kata sandi berhasil diperbarui.');
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        // Simulasi simpan foto profil sementara sebelum backend menyambungkan storage
        return back()->with('success_profile', 'Foto profil berhasil diperbarui.');
    }
}