<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataLayananController extends Controller
{
    private function getDefaultPracticingAreas(): array
    {
        return [
            [
                'legal_field_id' => 1,
                'order'          => 1,
                'field_name'     => 'Bankruptcy and Insolvency',
                'description'    => 'Pendampingan hukum kepailitan, penundaan kewajiban pembayaran utang (PKPU), dan restrukturisasi aset perusahaan.',
                'status'         => 'Aktif',
            ],
            [
                'legal_field_id' => 2,
                'order'          => 2,
                'field_name'     => 'Civil Litigation and Dispute Resolution',
                'description'    => 'Penyelesaian sengketa perdata, wanprestasi, perbuatan melawan hukum, serta mediasi di dalam dan luar pengadilan.',
                'status'         => 'Aktif',
            ],
            [
                'legal_field_id' => 3,
                'order'          => 3,
                'field_name'     => 'Criminal Defense Litigation',
                'description'    => 'Pembelaan dan pendampingan hukum pada tingkat penyelidikan, penyidikan, hingga persidangan perkara pidana.',
                'status'         => 'Aktif',
            ],
            [
                'legal_field_id' => 4,
                'order'          => 4,
                'field_name'     => 'Administrative Litigation and Dispute Resolution',
                'description'    => 'Penanganan sengketa tata usaha negara (PTUN) terkait keputusan pejabat administrasi pemerintahan.',
                'status'         => 'Aktif',
            ],
            [
                'legal_field_id' => 5,
                'order'          => 5,
                'field_name'     => 'Medical and Healthcare',
                'description'    => 'Konsultasi regulasi fasilitas kesehatan, sengketa medis, serta perlindungan hukum tenaga kesehatan.',
                'status'         => 'Aktif',
            ],
            [
                'legal_field_id' => 6,
                'order'          => 6,
                'field_name'     => 'Employment and Industrial Relations',
                'description'    => 'Penyusunan peraturan perusahaan, perjanjian kerja, dan penyelesaian perselisihan hubungan industrial.',
                'status'         => 'Aktif',
            ],
            [
                'legal_field_id' => 7,
                'order'          => 7,
                'field_name'     => 'Real Estate and Property Law',
                'description'    => 'Uji tuntas legalitas tanah, peralihan hak atas tanah, dan penyelesaian sengketa properti.',
                'status'         => 'Nonaktif',
            ],
        ];
    }

    private function getDefaultLegalServices(): array
    {
        return [
            [
                'category_id'   => 1,
                'order'         => 1,
                'category_name' => 'Dispute Resolution',
                'description'   => 'Layanan negosiasi, mediasi, dan arbitrase untuk menyelesaikan konflik bisnis maupun perdata secara efisien.',
                'status'        => 'Aktif',
            ],
            [
                'category_id'   => 2,
                'order'         => 2,
                'category_name' => 'Litigation',
                'description'   => 'Pendampingan dan perwakilan hukum penuh di seluruh tingkat peradilan (PN, PT, MA, hingga MK).',
                'status'        => 'Aktif',
            ],
            [
                'category_id'   => 3,
                'order'         => 3,
                'category_name' => 'Intellectual Property',
                'description'   => 'Pendaftaran, perlindungan, serta penegakan hukum merek, hak cipta, paten, dan desain industri.',
                'status'        => 'Aktif',
            ],
            [
                'category_id'   => 4,
                'order'         => 4,
                'category_name' => 'Corporate, Commercial & Compliance',
                'description'   => 'Pendirian badan usaha, penyusunan kontrak komersial, merger & akuisisi, serta kepatuhan regulasi.',
                'status'        => 'Aktif',
            ],
            [
                'category_id'   => 5,
                'order'         => 5,
                'category_name' => 'Retainer & General Counsel Service',
                'description'   => 'Layanan konsultasi hukum berkelanjutan sebagai penasihat hukum tetap bagi perusahaan.',
                'status'        => 'Aktif',
            ],
        ];
    }

    private function getPracticingAreasSession(): array
    {
        if (!session()->has('admin_practicing_areas')) {
            session(['admin_practicing_areas' => $this->getDefaultPracticingAreas()]);
        }
        return session('admin_practicing_areas');
    }

    private function getLegalServicesSession(): array
    {
        if (!session()->has('admin_legal_services')) {
            session(['admin_legal_services' => $this->getDefaultLegalServices()]);
        }
        return session('admin_legal_services');
    }

    public function index()
    {
        $admin = [
            'admin_id'  => 1,
            'full_name' => 'Admin',
            'initial'   => 'A',
        ];

        $practicingAreas = $this->getPracticingAreasSession();
        $legalServices   = $this->getLegalServicesSession();

        // Total sesuai badge angka di judul masing-masing kartu (17 & 5)
        $paTotalCount = max(17, count($practicingAreas));
        $lsTotalCount = count($legalServices);

        return view('admin.layanan.index', compact(
            'admin',
            'practicingAreas',
            'legalServices',
            'paTotalCount',
            'lsTotalCount'
        ));
    }

    // ==================== PRACTICING AREA CRUD ====================
    public function storePracticingArea(Request $request)
    {
        $validated = $request->validate([
            'field_name'  => ['required', 'string', 'max:255'],
            'order'       => ['nullable', 'integer', 'min:1'],
            'status'      => ['required', 'string', 'in:Aktif,Nonaktif'],
            'description' => ['nullable', 'string'],
        ]);

        $list = $this->getPracticingAreasSession();
        $nextOrder = $validated['order'] ?? (count($list) + 1);

        $list[] = [
            'legal_field_id' => rand(100, 999),
            'order'          => (int) $nextOrder,
            'field_name'     => $validated['field_name'],
            'description'    => $validated['description'] ?? '',
            'status'         => $validated['status'],
        ];

        usort($list, fn($a, $b) => $a['order'] <=> $b['order']);
        session(['admin_practicing_areas' => $list]);

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', "Practicing Area \"{$validated['field_name']}\" berhasil ditambahkan.");
    }

    public function updatePracticingArea(Request $request, int $id)
    {
        $validated = $request->validate([
            'field_name'  => ['required', 'string', 'max:255'],
            'order'       => ['required', 'integer', 'min:1'],
            'status'      => ['required', 'string', 'in:Aktif,Nonaktif'],
            'description' => ['nullable', 'string'],
        ]);

        $list = $this->getPracticingAreasSession();
        foreach ($list as &$item) {
            if ($item['legal_field_id'] === $id) {
                $item['field_name']  = $validated['field_name'];
                $item['order']       = (int) $validated['order'];
                $item['status']      = $validated['status'];
                $item['description'] = $validated['description'] ?? '';
                break;
            }
        }
        unset($item);

        usort($list, fn($a, $b) => $a['order'] <=> $b['order']);
        session(['admin_practicing_areas' => $list]);

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', "Practicing Area \"{$validated['field_name']}\" berhasil diperbarui.");
    }

    public function destroyPracticingArea(int $id)
    {
        $list = $this->getPracticingAreasSession();
        $list = array_values(array_filter($list, fn($item) => $item['legal_field_id'] !== $id));
        session(['admin_practicing_areas' => $list]);

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', 'Practicing Area berhasil dihapus.');
    }

    // ==================== LEGAL SERVICE CRUD ====================
    public function storeLegalService(Request $request)
    {
        $validated = $request->validate([
            'category_name' => ['required', 'string', 'max:255'],
            'order'         => ['nullable', 'integer', 'min:1'],
            'status'        => ['required', 'string', 'in:Aktif,Nonaktif'],
            'description'   => ['nullable', 'string'],
        ]);

        $list = $this->getLegalServicesSession();
        $nextOrder = $validated['order'] ?? (count($list) + 1);

        $list[] = [
            'category_id'   => rand(100, 999),
            'order'         => (int) $nextOrder,
            'category_name' => $validated['category_name'],
            'description'   => $validated['description'] ?? '',
            'status'        => $validated['status'],
        ];

        usort($list, fn($a, $b) => $a['order'] <=> $b['order']);
        session(['admin_legal_services' => $list]);

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', "Legal Service \"{$validated['category_name']}\" berhasil ditambahkan.");
    }

    public function updateLegalService(Request $request, int $id)
    {
        $validated = $request->validate([
            'category_name' => ['required', 'string', 'max:255'],
            'order'         => ['required', 'integer', 'min:1'],
            'status'        => ['required', 'string', 'in:Aktif,Nonaktif'],
            'description'   => ['nullable', 'string'],
        ]);

        $list = $this->getLegalServicesSession();
        foreach ($list as &$item) {
            if ($item['category_id'] === $id) {
                $item['category_name'] = $validated['category_name'];
                $item['order']         = (int) $validated['order'];
                $item['status']        = $validated['status'];
                $item['description']   = $validated['description'] ?? '';
                break;
            }
        }
        unset($item);

        usort($list, fn($a, $b) => $a['order'] <=> $b['order']);
        session(['admin_legal_services' => $list]);

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', "Legal Service \"{$validated['category_name']}\" berhasil diperbarui.");
    }

    public function destroyLegalService(int $id)
    {
        $list = $this->getLegalServicesSession();
        $list = array_values(array_filter($list, fn($item) => $item['category_id'] !== $id));
        session(['admin_legal_services' => $list]);

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', 'Legal Service berhasil dihapus.');
    }
}