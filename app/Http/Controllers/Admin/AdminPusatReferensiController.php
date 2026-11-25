<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminPusatReferensiController extends Controller
{
    private function getCaseMap(): array
    {
        return [
            'PK-2023-001' => ['booking_id' => 1, 'category' => 'Pidana', 'default_lawyer' => 'Dewi Lestari'],
            'PK-2022-007' => ['booking_id' => 2, 'category' => 'Perdata', 'default_lawyer' => 'Raka Pratama'],
            'PK-2021-024' => ['booking_id' => 3, 'category' => 'Perdata', 'default_lawyer' => 'Andi Saputra'],
            'PK-2024-012' => ['booking_id' => 4, 'category' => 'Perdata', 'default_lawyer' => 'Nadia Putri'],
            'PK-2025-003' => ['booking_id' => 5, 'category' => 'Bisnis', 'default_lawyer' => 'Raka Pratama'],
            'PK-2025-008' => ['booking_id' => 6, 'category' => 'Keluarga', 'default_lawyer' => 'Dewi Lestari'],
        ];
    }

    private function getLawyers(): array
    {
        return [
            'Dewi Lestari',
            'Raka Pratama',
            'Andi Saputra',
            'Nadia Putri',
        ];
    }

    private function getReferenceTypes(): array
    {
        return [
            'Peraturan Perundang-undangan',
            'Putusan Pengadilan',
            'Jurnal & Artikel',
            'Pedoman & Dokumen Hukum',
        ];
    }

    private function getDefaultReferences(): array
    {
        return [
            [
                'reference_id'   => 1,
                'booking_id'     => 1,
                'case_code'      => 'PK-2023-001',
                'title'          => 'Undang-Undang Nomor 1 Tahun 2023',
                'subtitle'       => 'Kitab Undang-Undang Hukum Pidana (KUHP)',
                'reference_type' => 'Peraturan Perundang-undangan',
                'category'       => 'Pidana',
                'file_type'      => 'pdf',
                'pdf_document'   => 'UU_NO_1_TAHUN_2023_KUHP.pdf',
                'published_at'   => '02 Jan 2023',
                'raw_date'       => '2023-01-02',
                'lawyer_name'    => 'Dewi Lestari',
                'status'         => 'Publik',
            ],
            [
                'reference_id'   => 2,
                'booking_id'     => 2,
                'case_code'      => 'PK-2022-007',
                'title'          => 'Peraturan Mahkamah Agung Nomor 7 Tahun 2022',
                'subtitle'       => 'Tentang Administrasi Perkara di Pengadilan',
                'reference_type' => 'Peraturan Perundang-undangan',
                'category'       => 'Perdata',
                'file_type'      => 'pdf',
                'pdf_document'   => 'PERMA_NO_7_TAHUN_2022.pdf',
                'published_at'   => '18 Okt 2022',
                'raw_date'       => '2022-10-18',
                'lawyer_name'    => 'Raka Pratama',
                'status'         => 'Publik',
            ],
            [
                'reference_id'   => 3,
                'booking_id'     => 3,
                'case_code'      => 'PK-2021-024',
                'title'          => 'Putusan Mahkamah Agung No. 1234 K/Pdt/2021',
                'subtitle'       => 'Perkara Wanprestasi',
                'reference_type' => 'Putusan Pengadilan',
                'category'       => 'Perdata',
                'file_type'      => 'doc',
                'pdf_document'   => 'PUTUSAN_MA_1234_K_PDT_2021.docx',
                'published_at'   => '15 Jul 2021',
                'raw_date'       => '2021-07-15',
                'lawyer_name'    => 'Andi Saputra',
                'status'         => 'Publik',
            ],
            [
                'reference_id'   => 4,
                'booking_id'     => 4,
                'case_code'      => 'PK-2024-012',
                'title'          => 'Analisis Yuridis Perlindungan Data Pribadi',
                'subtitle'       => 'Jurnal Hukum dan Teknologi, Vol. 5 No. 2',
                'reference_type' => 'Jurnal & Artikel',
                'category'       => 'Perdata',
                'file_type'      => 'pdf',
                'pdf_document'   => 'ANALISIS_YURIDIS_PDP_VOL5.pdf',
                'published_at'   => '12 Jun 2024',
                'raw_date'       => '2024-06-12',
                'lawyer_name'    => 'Nadia Putri',
                'status'         => 'Publik',
            ],
            [
                'reference_id'   => 5,
                'booking_id'     => 1,
                'case_code'      => 'PK-2023-001',
                'title'          => 'Pedoman Bantuan Hukum',
                'subtitle'       => 'Kemenkumham RI',
                'reference_type' => 'Pedoman & Dokumen Hukum',
                'category'       => 'Pidana',
                'file_type'      => 'link',
                'pdf_document'   => 'https://bphn.go.id/pedoman-bantuan-hukum',
                'published_at'   => '10 Mar 2023',
                'raw_date'       => '2023-03-10',
                'lawyer_name'    => 'Dewi Lestari',
                'status'         => 'Draf',
            ],
        ];
    }

    private function getReferencesSession(): array
    {
        if (!session()->has('admin_references_list')) {
            session(['admin_references_list' => $this->getDefaultReferences()]);
        }
        return session('admin_references_list');
    }

    public function index()
    {
        $admin = [
            'admin_id'  => 1,
            'full_name' => 'Admin',
            'initial'   => 'A',
        ];

        $references     = $this->getReferencesSession();
        $caseMap        = $this->getCaseMap();
        $lawyers        = $this->getLawyers();
        $referenceTypes = $this->getReferenceTypes();

        $categories = ['Pidana', 'Perdata', 'Bisnis', 'Keluarga'];

        // Statistik sesuai kartu atas
        $stats = [
            'total'       => 156,
            'regulations' => 68,
            'verdicts'    => 24,
            'journals'    => 64,
        ];

        return view('admin.referensi.index', compact(
            'admin',
            'references',
            'caseMap',
            'lawyers',
            'referenceTypes',
            'categories',
            'stats'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'document_file'  => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:10240'],
            'document_name'  => ['nullable', 'string', 'max:255'],
            'case_code'      => ['required', 'string'],
            'reference_type' => ['required', 'string'],
            'lawyer_name'    => ['required', 'string'],
            'document_date'  => ['required', 'date'],
            'status'         => ['required', 'string', 'in:Publik,Draf'],
            'description'    => ['nullable', 'string', 'max:500'],
        ]);

        $caseMap = $this->getCaseMap();
        $caseInfo = $caseMap[$validated['case_code']] ?? ['booking_id' => 1, 'category' => 'Perdata'];

        // Ambil nama dokumen & tipe file dari unggahan (atau fallback nama standar)
        $fileName = $validated['document_name'] ?: 'DOKUMEN_REFERENSI.pdf';
        $fileType = 'pdf';

        if ($request->hasFile('document_file')) {
            $file = $request->file('document_file');
            $fileName = $file->getClientOriginalName();
            $ext = strtolower($file->getClientOriginalExtension());
            $fileType = in_array($ext, ['doc', 'docx']) ? 'doc' : 'pdf';
        } elseif (str_ends_with(strtolower($fileName), '.doc') || str_ends_with(strtolower($fileName), '.docx')) {
            $fileType = 'doc';
        }

        // Format judul tampil dari nama file tanpa ekstensi
        $displayTitle = pathinfo($fileName, PATHINFO_FILENAME);
        $displayTitle = str_replace('_', ' ', $displayTitle);

        $references = $this->getReferencesSession();

        array_unshift($references, [
            'reference_id'   => rand(100, 999),
            'booking_id'     => $caseInfo['booking_id'],
            'case_code'      => $validated['case_code'],
            'title'          => $displayTitle,
            'subtitle'       => $validated['description'] ?: $validated['reference_type'],
            'reference_type' => $validated['reference_type'],
            'category'       => $caseInfo['category'],
            'file_type'      => $fileType,
            'pdf_document'   => $fileName,
            'published_at'   => Carbon::parse($validated['document_date'])->translatedFormat('d M Y'),
            'raw_date'       => $validated['document_date'],
            'lawyer_name'    => $validated['lawyer_name'],
            'status'         => $validated['status'],
        ]);

        session(['admin_references_list' => $references]);

        return redirect()
            ->route('admin.referensi.index')
            ->with('success', "Dokumen referensi \"{$displayTitle}\" berhasil ditambahkan.");
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'title'          => ['required', 'string', 'max:255'],
            'case_code'      => ['required', 'string'],
            'reference_type' => ['required', 'string'],
            'lawyer_name'    => ['required', 'string'],
            'document_date'  => ['required', 'date'],
            'status'         => ['required', 'string', 'in:Publik,Draf'],
            'description'    => ['nullable', 'string', 'max:500'],
        ]);

        $caseMap = $this->getCaseMap();
        $caseInfo = $caseMap[$validated['case_code']] ?? ['booking_id' => 1, 'category' => 'Perdata'];

        $references = $this->getReferencesSession();
        foreach ($references as &$item) {
            if ($item['reference_id'] === $id) {
                $item['title']          = $validated['title'];
                $item['case_code']      = $validated['case_code'];
                $item['booking_id']     = $caseInfo['booking_id'];
                $item['category']       = $caseInfo['category'];
                $item['reference_type'] = $validated['reference_type'];
                $item['lawyer_name']    = $validated['lawyer_name'];
                $item['raw_date']       = $validated['document_date'];
                $item['published_at']   = Carbon::parse($validated['document_date'])->translatedFormat('d M Y');
                $item['status']         = $validated['status'];
                $item['subtitle']       = $validated['description'] ?: $item['subtitle'];
                break;
            }
        }
        unset($item);

        session(['admin_references_list' => $references]);

        return redirect()
            ->route('admin.referensi.index')
            ->with('success', "Dokumen \"{$validated['title']}\" berhasil diperbarui.");
    }

    public function destroy(int $id)
    {
        $references = $this->getReferencesSession();
        $references = array_values(array_filter($references, fn($r) => $r['reference_id'] !== $id));
        session(['admin_references_list' => $references]);

        return redirect()
            ->route('admin.referensi.index')
            ->with('success', 'Dokumen referensi berhasil dihapus.');
    }
}