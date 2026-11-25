<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataAdvokatController extends Controller
{
    private function getDefaultLawyers(): array
    {
        return [
            [
                'lawyer_id'        => 1,
                'role_id'          => 2,
                'role_name'        => 'Lawyer',
                'full_name'        => 'Andi Pratama, S.H., M.H.',
                'nia'              => '24.02369',
                'email'            => 'andi.pratama@lawfirm.id',
                'phone'            => '0812-3456-7891',
                'specialization'   => 'Hukum Perdata',
                'self_description' => 'Saya mendampingi klien dalam sengketa perdata, kontrak, dan penyelesaian melalui mediasi.',
                'linkedin_url'     => 'https://www.linkedin.com/in/andi-pratama-demo',
                'linkedin_display' => 'linkedin.com/in/andi-pratama-demo',
                'photo_path'       => 'images/lawyer-andi.png',
                'account_status'   => 'Aktif',
                'article_ids'      => [1, 2],
            ],
            [
                'lawyer_id'        => 2,
                'role_id'          => 2,
                'role_name'        => 'Lawyer',
                'full_name'        => 'Siti Rahma, S.H.',
                'nia'              => '15.03602',
                'email'            => 'siti.rahma@lawfirm.id',
                'phone'            => '0812-3456-7892',
                'specialization'   => 'Hukum Pidana',
                'self_description' => 'Saya berfokus pada pendampingan perkara pidana serta perlindungan hak hukum klien.',
                'linkedin_url'     => 'https://www.linkedin.com/in/siti-rahma-demo',
                'linkedin_display' => 'linkedin.com/in/siti-rahma-demo',
                'photo_path'       => 'images/lawyer-siti.png',
                'account_status'   => 'Aktif',
                'article_ids'      => [3],
            ],
            [
                'lawyer_id'        => 3,
                'role_id'          => 2,
                'role_name'        => 'Lawyer',
                'full_name'        => 'Budi Santoso, S.H., M.Kn.',
                'nia'              => '18.04115',
                'email'            => 'budi.santoso@lawfirm.id',
                'phone'            => '0812-3456-7893',
                'specialization'   => 'Hukum Tata Usaha Negara',
                'self_description' => 'Saya membantu klien dalam sengketa tata usaha negara dan persoalan administrasi pemerintahan.',
                'linkedin_url'     => 'https://www.linkedin.com/in/budi-santoso-demo',
                'linkedin_display' => 'linkedin.com/in/budi-santoso-demo',
                'photo_path'       => 'images/lawyer-budi.png',
                'account_status'   => 'Aktif',
                'article_ids'      => [],
            ],
            [
                'lawyer_id'        => 4,
                'role_id'          => 2,
                'role_name'        => 'Lawyer',
                'full_name'        => 'Dewi Anggraini, S.H., M.H.',
                'nia'              => '19.05280',
                'email'            => 'dewi.anggraini@lawfirm.id',
                'phone'            => '0812-3456-7894',
                'specialization'   => 'Hukum Ketenagakerjaan',
                'self_description' => 'Saya mendampingi pekerja dan perusahaan dalam hubungan industrial serta sengketa ketenagakerjaan.',
                'linkedin_url'     => 'https://www.linkedin.com/in/dewi-anggraini-demo',
                'linkedin_display' => 'linkedin.com/in/dewi-anggraini-demo',
                'photo_path'       => 'images/lawyer-dewi.png',
                'account_status'   => 'Tidak Aktif',
                'article_ids'      => [2],
            ],
            [
                'lawyer_id'        => 5,
                'role_id'          => 2,
                'role_name'        => 'Lawyer',
                'full_name'        => 'Rizky Maulana, S.H.',
                'nia'              => '21.06412',
                'email'            => 'rizky.maulana@lawfirm.id',
                'phone'            => '0812-3456-7895',
                'specialization'   => 'Hukum Bisnis',
                'self_description' => 'Saya membantu pelaku usaha menyusun kontrak dan menyelesaikan persoalan hukum bisnis.',
                'linkedin_url'     => 'https://www.linkedin.com/in/rizky-maulana-demo',
                'linkedin_display' => 'linkedin.com/in/rizky-maulana-demo',
                'photo_path'       => 'images/lawyer-rizky.png',
                'account_status'   => 'Aktif',
                'article_ids'      => [4],
            ],
        ];
    }

    private function getArticles(): array
    {
        return [
            ['article_id' => 1, 'title' => 'Penyelesaian Sengketa Tanah Melalui Jalur Mediasi'],
            ['article_id' => 2, 'title' => 'Panduan Hak Pekerja dalam Perjanjian Kerja Waktu Tertentu'],
            ['article_id' => 3, 'title' => 'Hak Tersangka dan Terdakwa dalam Proses Pemeriksaan Pidana'],
            ['article_id' => 4, 'title' => 'Aspek Legalitas Kontrak Bisnis bagi Perusahaan Rintisan'],
        ];
    }

    private function getSpecializations(): array
    {
        return [
            'Hukum Perdata',
            'Hukum Pidana',
            'Hukum Tata Usaha Negara',
            'Hukum Ketenagakerjaan',
            'Hukum Bisnis',
            'Hukum Keluarga',
        ];
    }

    private function getLawyersSession(): array
    {
        if (!session()->has('admin_lawyers_list')) {
            session(['admin_lawyers_list' => $this->getDefaultLawyers()]);
        }
        return session('admin_lawyers_list');
    }

    public function index()
    {
        $admin = ['admin_id' => 1, 'full_name' => 'Admin', 'initial' => 'A'];
        $lawyers = $this->getLawyersSession();
        $articles = $this->getArticles();
        $specializations = $this->getSpecializations();

        // Statistik sesuai kartu atas
        $stats = [
            'total'    => 42,
            'active'   => 38,
            'inactive' => 3,
            'disabled' => 1,
        ];

        return view('admin.advokat.index', compact(
            'admin',
            'lawyers',
            'articles',
            'specializations',
            'stats'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'        => ['required', 'string', 'max:255'],
            'specialization'   => ['required', 'string', 'max:100'],
            'phone'            => ['required', 'string', 'max:30'],
            'email'            => ['required', 'email', 'max:255'],
            'nia'              => ['required', 'string', 'max:20'],
            'role_name'        => ['required', 'string', 'in:Klien,Lawyer,Admin'],
            'account_status'   => ['required', 'string', 'in:Aktif,Tidak Aktif,Nonaktif'],
            'self_description' => ['nullable', 'string'],
            'linkedin_url'     => ['nullable', 'string', 'max:255'],
            'article_ids'      => ['nullable', 'array'],
        ]);

        $lawyers = $this->getLawyersSession();
        $linkedinUrl = $validated['linkedin_url'] ?? '';
        $linkedinDisplay = preg_replace('#^https?://(www\.)?#', '', $linkedinUrl);

        $newLawyer = [
            'lawyer_id'        => rand(100, 999),
            'role_id'          => $validated['role_name'] === 'Admin' ? 1 : ($validated['role_name'] === 'Lawyer' ? 2 : 3),
            'role_name'        => $validated['role_name'],
            'full_name'        => $validated['full_name'],
            'nia'              => $validated['nia'],
            'email'            => $validated['email'],
            'phone'            => $validated['phone'],
            'specialization'   => $validated['specialization'],
            'self_description' => $validated['self_description'] ?: 'Advokat profesional di Ketut Surya Putra & Partners.',
            'linkedin_url'     => $linkedinUrl,
            'linkedin_display' => $linkedinDisplay ?: '-',
            'photo_path'       => 'images/lawyer-default.png',
            'account_status'   => $validated['account_status'],
            'article_ids'      => array_map('intval', $validated['article_ids'] ?? []),
        ];

        array_unshift($lawyers, $newLawyer);
        session(['admin_lawyers_list' => $lawyers]);

        return redirect()
            ->route('admin.advokat.index')
            ->with('success', "Data advokat \"{$validated['full_name']}\" berhasil ditambahkan.");
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'full_name'        => ['required', 'string', 'max:255'],
            'nia'              => ['required', 'string', 'max:20'],
            'specialization'   => ['required', 'string', 'max:100'],
            'role_name'        => ['required', 'string', 'in:Klien,Lawyer,Admin'],
            'self_description' => ['nullable', 'string'],
            'linkedin_url'     => ['nullable', 'string', 'max:255'],
            'article_ids'      => ['nullable', 'array'],
        ]);

        $lawyers = $this->getLawyersSession();
        $linkedinUrl = $validated['linkedin_url'] ?? '';
        $linkedinDisplay = preg_replace('#^https?://(www\.)?#', '', $linkedinUrl);

        foreach ($lawyers as &$item) {
            if ($item['lawyer_id'] === $id) {
                $item['full_name']        = $validated['full_name'];
                $item['nia']              = $validated['nia'];
                $item['specialization']   = $validated['specialization'];
                $item['role_name']        = $validated['role_name'];
                $item['self_description'] = $validated['self_description'] ?? $item['self_description'];
                $item['linkedin_url']     = $linkedinUrl;
                $item['linkedin_display'] = $linkedinDisplay ?: '-';
                $item['article_ids']      = array_map('intval', $validated['article_ids'] ?? []);
                break;
            }
        }
        unset($item);

        session(['admin_lawyers_list' => $lawyers]);

        return redirect()
            ->route('admin.advokat.index')
            ->with('success', "Profil advokat \"{$validated['full_name']}\" berhasil diperbarui.");
    }

    public function destroy(int $id)
    {
        $lawyers = $this->getLawyersSession();
        $lawyers = array_values(array_filter($lawyers, fn($l) => $l['lawyer_id'] !== $id));
        session(['admin_lawyers_list' => $lawyers]);

        return redirect()
            ->route('admin.advokat.index')
            ->with('success', 'Data advokat berhasil dihapus.');
    }
}