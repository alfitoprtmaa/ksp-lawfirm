<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LawyerAuthController extends Controller
{
    private function getDummyLawyers(): array
    {
        return [
            [
                'lawyer_id'        => 3,
                'role_id'          => 2, // Role: Lawyer
                'role_name'        => 'Lawyer',
                'full_name'        => 'Adv. Adi Pratama, S.H., M.H.',
                'email'            => 'adi.pratama@ksp-law.id',
                'password_hash'    => 'password123',
                'specialization'   => 'Hukum Perdata & Sengketa Pertanahan',
                'self_description' => 'Advokat senior dengan pengalaman lebih dari 10 tahun menangani sengketa pertanahan, waris, dan perdata umum.',
                'account_status'   => 'active',
                'created_at'       => '2026-09-01 08:00:00',
            ],
            [
                'lawyer_id'        => 4,
                'role_id'          => 2,
                'role_name'        => 'Lawyer',
                'full_name'        => 'Adv. Larasati Putri, S.H.',
                'email'            => 'larasati@ksp-law.id',
                'password_hash'    => 'password123',
                'specialization'   => 'Hukum Bisnis & Kontrak Korporasi',
                'self_description' => 'Spesialis penyusunan perjanjian komersial, wanprestasi bisnis, dan penyelesaian sengketa hubungan industrial.',
                'account_status'   => 'inactive',
                'created_at'       => '2026-09-10 10:30:00',
            ],
        ];
    }

    public function showLoginForm()
    {
        return view('lawyer.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required'    => 'Email advokat wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        $lawyer = collect($this->getDummyLawyers())
            ->firstWhere('email', $credentials['email']);

        if (!$lawyer || $lawyer['password_hash'] !== $credentials['password']) {
            return back()
                ->withInput($request->only('email'))
                ->with('error', 'Email atau kata sandi advokat tidak sesuai.');
        }

        if ($lawyer['account_status'] !== 'active') {
            return back()
                ->withInput($request->only('email'))
                ->with('error', 'Akun advokat Anda berstatus nonaktif. Silakan hubungi administrator.');
        }

        session(['lawyer_user' => $lawyer]);

        return redirect()->route('lawyer.index');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('lawyer_user');

        return redirect()->route('lawyer.login');
    }
}