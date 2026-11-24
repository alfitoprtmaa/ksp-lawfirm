<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    private function getDummyCustomers(): array
    {
        return [
            [
                'customer_id'    => 1,
                'full_name'      => 'Budi Santoso',
                'email'          => 'budi@email.com',
                'password_hash'  => 'password123', // Simulasi sebelum Hash::check()
                'account_status' => 'active',
                'created_at'     => '2026-10-15 09:00:00',
            ],
            [
                'customer_id'    => 2,
                'full_name'      => 'Siti Aminah',
                'email'          => 'siti@email.com',
                'password_hash'  => 'password123',
                'account_status' => 'suspended',
                'created_at'     => '2026-10-20 14:30:00',
            ],
        ];
    }

    public function showLoginForm()
    {
        return view('customer.login.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        $customer = collect($this->getDummyCustomers())
            ->firstWhere('email', $credentials['email']);

        if (!$customer || $customer['password_hash'] !== $credentials['password']) {
            return back()
                ->withInput($request->only('email'))
                ->with('error', 'Email atau kata sandi yang Anda masukkan salah.');
        }

        if ($customer['account_status'] !== 'active') {
            return back()
                ->withInput($request->only('email'))
                ->with('error', 'Akun Anda berstatus nonaktif. Silakan hubungi admin Ruang Adil.');
        }

        session(['customer_user' => $customer]);

        return redirect()->route('customer.index');
    }
}