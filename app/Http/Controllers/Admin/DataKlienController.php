<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataKlienController extends Controller
{
    private function getDefaultClients(): array
    {
        return [
            [
                'customer_id'    => 1,
                'full_name'      => 'Rina Wijaya',
                'email'          => 'rina.wijaya@email.com',
                'whatsapp'       => '0812-3456-7890',
                'role_name'      => 'Klien',
                'account_status' => 'Aktif',
                'last_login'     => '17 Nov 2026, 09.15',
            ],
            [
                'customer_id'    => 2,
                'full_name'      => 'Budi Santoso',
                'email'          => 'budi.santoso@email.com',
                'whatsapp'       => '0813-2210-4587',
                'role_name'      => 'Klien',
                'account_status' => 'Aktif',
                'last_login'     => '17 Nov 2026, 08.42',
            ],
            [
                'customer_id'    => 3,
                'full_name'      => 'Dewi Lestari',
                'email'          => 'dewi.lestari@email.com',
                'whatsapp'       => '0821-5540-6712',
                'role_name'      => 'Klien',
                'account_status' => 'Aktif',
                'last_login'     => '16 Nov 2026, 14.30',
            ],
            [
                'customer_id'    => 4,
                'full_name'      => 'Ahmad Fauzi',
                'email'          => 'ahmad.fauzi@email.com',
                'whatsapp'       => '0857-1123-9045',
                'role_name'      => 'Klien',
                'account_status' => 'Nonaktif',
                'last_login'     => '12 Nov 2026, 10.05',
            ],
            [
                'customer_id'    => 5,
                'full_name'      => 'Siti Rahmawati',
                'email'          => 'siti.rahma@email.com',
                'whatsapp'       => '0812-9087-6543',
                'role_name'      => 'Klien',
                'account_status' => 'Aktif',
                'last_login'     => '16 Nov 2026, 11.20',
            ],
            [
                'customer_id'    => 6,
                'full_name'      => 'Andi Pratama',
                'email'          => 'andi.pratama@email.com',
                'whatsapp'       => '0878-3321-4567',
                'role_name'      => 'Klien',
                'account_status' => 'Aktif',
                'last_login'     => '15 Nov 2026, 15.48',
            ],
        ];
    }

    private function getClientsSession(): array
    {
        if (!session()->has('admin_clients_list')) {
            session(['admin_clients_list' => $this->getDefaultClients()]);
        }
        return session('admin_clients_list');
    }

    public function index()
    {
        $admin = [
            'admin_id'  => 1,
            'full_name' => 'Admin',
            'initial'   => 'A',
        ];

        $clients = $this->getClientsSession();

        // Statistik sesuai kartu atas
        $stats = [
            'total'    => 24,
            'active'   => 20,
            'inactive' => 4,
        ];

        return view('admin.klien.index', compact('admin', 'clients', 'stats'));
    }

    public function create()
    {
        $admin = [
            'admin_id'  => 1,
            'full_name' => 'Admin',
            'initial'   => 'A',
        ];

        return view('admin.klien.create', compact('admin'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'role_name' => ['required', 'string', 'in:Klien,Lawyer,Admin'],
            'full_name' => ['required', 'string', 'max:255'],
            'whatsapp'  => ['required', 'string', 'max:30'],
            'email'     => ['required', 'email', 'max:255'],
            'password'  => ['required', 'string', 'min:8'],
        ]);

        $clients = $this->getClientsSession();

        array_unshift($clients, [
            'customer_id'    => rand(100, 999),
            'full_name'      => $validated['full_name'],
            'email'          => $validated['email'],
            'whatsapp'       => $validated['whatsapp'],
            'role_name'      => $validated['role_name'],
            'account_status' => 'Aktif',
            'last_login'     => 'Belum pernah masuk',
        ]);

        session(['admin_clients_list' => $clients]);

        return redirect()
            ->route('admin.klien.index')
            ->with('success', "Akun pengguna \"{$validated['full_name']}\" ({$validated['role_name']}) berhasil dibuat.");
    }

    public function updateRole(Request $request, int $id)
    {
        $validated = $request->validate([
            'role_name'      => ['required', 'string', 'in:Klien,Lawyer,Admin'],
            'account_status' => ['nullable', 'string', 'in:Aktif,Nonaktif'],
        ]);

        $clients = $this->getClientsSession();
        $updatedName = '';

        foreach ($clients as &$client) {
            if ($client['customer_id'] === $id) {
                $client['role_name'] = $validated['role_name'];
                if (!empty($validated['account_status'])) {
                    $client['account_status'] = $validated['account_status'];
                }
                $updatedName = $client['full_name'];
                break;
            }
        }
        unset($client);

        session(['admin_clients_list' => $clients]);

        return redirect()
            ->route('admin.klien.index')
            ->with('success', "Role untuk {$updatedName} berhasil diperbarui menjadi {$validated['role_name']}.");
    }
}