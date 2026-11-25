<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataRoleController extends Controller
{
    private function getDefaultRoles(): array
    {
        return [
            [
                'role_id'     => 1,
                'role_code'   => 'RL-001',
                'role_name'   => 'Super Admin',
                'status'      => 'Aktif',
                'description' => 'Akses penuh ke seluruh pengaturan sistem, manajemen pengguna, dan hak akses.',
                'permissions' => ['Dashboard', 'Kelola Jadwal', 'Kelola Konsultasi', 'Akses Pengguna', 'Manajemen Konten', 'Pusat Referensi'],
            ],
            [
                'role_id'     => 2,
                'role_code'   => 'RL-002',
                'role_name'   => 'Admin',
                'status'      => 'Aktif',
                'description' => 'Mengelola operasional harian, verifikasi perkara, penugasan advokat, dan konten.',
                'permissions' => ['Dashboard', 'Kelola Jadwal', 'Kelola Konsultasi', 'Akses Pengguna', 'Manajemen Konten', 'Pusat Referensi'],
            ],
            [
                'role_id'     => 3,
                'role_code'   => 'RL-003',
                'role_name'   => 'Advokat (Lawyer)',
                'status'      => 'Aktif',
                'description' => 'Menangani perkara yang ditugaskan, jadwal sidang, dan unggah eksekusi kasus.',
                'permissions' => ['Dashboard', 'Kelola Jadwal', 'Kelola Konsultasi', 'Pusat Referensi'],
            ],
            [
                'role_id'     => 4,
                'role_code'   => 'RL-004',
                'role_name'   => 'Editor Konten',
                'status'      => 'Aktif',
                'description' => 'Mengelola publikasi artikel kegiatan, layanan hukum, dan daftar FAQ.',
                'permissions' => ['Dashboard', 'Manajemen Konten', 'Pusat Referensi'],
            ],
            [
                'role_id'     => 5,
                'role_code'   => 'RL-005',
                'role_name'   => 'Petugas Layanan',
                'status'      => 'Aktif',
                'description' => 'Memantau antrean konsultasi online dan membantu verifikasi berkas awal klien.',
                'permissions' => ['Dashboard', 'Kelola Jadwal', 'Kelola Konsultasi'],
            ],
            [
                'role_id'     => 6,
                'role_code'   => 'RL-006',
                'role_name'   => 'Staf',
                'status'      => 'Nonaktif',
                'description' => 'Akses terbatas untuk dukungan administrasi umum kantor hukum.',
                'permissions' => ['Dashboard'],
            ],
        ];
    }

    private function getRolesSession(): array
    {
        if (!session()->has('admin_roles_list')) {
            session(['admin_roles_list' => $this->getDefaultRoles()]);
        }
        return session('admin_roles_list');
    }

    private function generateNextRoleCode(array $roles): string
    {
        $maxNum = 0;
        foreach ($roles as $r) {
            $num = (int) str_replace('RL-', '', $r['role_code']);
            if ($num > $maxNum) {
                $maxNum = $num;
            }
        }
        return 'RL-' . str_pad((string) ($maxNum + 1), 3, '0', STR_PAD_LEFT);
    }

    public function index()
    {
        $admin = [
            'admin_id'  => 1,
            'full_name' => 'Admin · RL-002',
            'initial'   => 'A',
        ];

        $roles = $this->getRolesSession();
        $nextRoleCode = $this->generateNextRoleCode($roles);

        $modules = [
            'Dashboard',
            'Kelola Jadwal',
            'Kelola Konsultasi',
            'Akses Pengguna',
            'Manajemen Konten',
            'Pusat Referensi',
        ];

        $stats = [
            'total'    => count($roles),
            'active'   => count(array_filter($roles, fn($r) => $r['status'] === 'Aktif')),
            'inactive' => count(array_filter($roles, fn($r) => $r['status'] === 'Nonaktif')),
        ];

        return view('admin.role.index', compact(
            'admin',
            'roles',
            'nextRoleCode',
            'modules',
            'stats'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'role_name'   => ['required', 'string', 'max:100'],
            'status'      => ['required', 'string', 'in:Aktif,Nonaktif'],
            'description' => ['nullable', 'string', 'max:500'],
            'permissions' => ['nullable', 'array'],
        ]);

        $roles = $this->getRolesSession();
        $newCode = $this->generateNextRoleCode($roles);

        $roles[] = [
            'role_id'     => count($roles) + 1,
            'role_code'   => $newCode,
            'role_name'   => $validated['role_name'],
            'status'      => $validated['status'],
            'description' => $validated['description'] ?? '',
            'permissions' => $validated['permissions'] ?? ['Dashboard'],
        ];

        session(['admin_roles_list' => $roles]);

        return redirect()
            ->route('admin.role.index')
            ->with('success', "Role \"{$validated['role_name']}\" ({$newCode}) berhasil ditambahkan.");
    }

    public function update(Request $request, string $roleCode)
    {
        $validated = $request->validate([
            'role_name'   => ['required', 'string', 'max:100'],
            'status'      => ['required', 'string', 'in:Aktif,Nonaktif'],
            'description' => ['nullable', 'string', 'max:500'],
            'permissions' => ['nullable', 'array'],
        ]);

        $roles = $this->getRolesSession();
        foreach ($roles as &$role) {
            if ($role['role_code'] === $roleCode) {
                $role['role_name']   = $validated['role_name'];
                $role['status']      = $validated['status'];
                $role['description'] = $validated['description'] ?? '';
                $role['permissions'] = $validated['permissions'] ?? [];
                break;
            }
        }
        unset($role);

        session(['admin_roles_list' => $roles]);

        return redirect()
            ->route('admin.role.index')
            ->with('success', "Role {$roleCode} ({$validated['role_name']}) berhasil diperbarui.");
    }

    public function destroy(string $roleCode)
    {
        $roles = $this->getRolesSession();
        $roles = array_values(array_filter($roles, fn($r) => $r['role_code'] !== $roleCode));
        session(['admin_roles_list' => $roles]);

        return redirect()
            ->route('admin.role.index')
            ->with('success', "Role {$roleCode} berhasil dihapus.");
    }
}