<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KonsultasiPerkaraController extends Controller
{
    private function getDefaultCases(): array
    {
        return [
            [
                'booking_id'         => 10,
                'case_code'          => 'CASE-010',
                'consultation_title' => 'Sengketa Lahan',
                'applicant_name'     => 'Agus Salim',
                'lawyer_id'          => null,
                'lawyer_name'        => 'Belum dipilih',
                'category_name'      => 'Perdata',
                'legal_field_name'   => 'Perdata',
                'created_at'         => '12 Mei 2025',
                'submitted_datetime' => '20 Oktober 2026, 20:27',
                'booking_status'     => 'Dalam Proses',
                'stage'              => 1,
                'doc_title'          => 'Pengajuan Dokumen Awal',
                'case_summary'       => "Pada tahap ini, kami telah meninjau seluruh dokumen awal yang diberikan oleh klien, termasuk sertifikat tanah, surat keterangan, dan dokumen pendukung lainnya. Dari hasil peninjauan awal, ditemukan beberapa hal yang perlu diklarifikasi lebih lanjut untuk memperkuat posisi hukum klien.\n\nKami akan segera menghubungi pihak terkait untuk memperoleh informasi tambahan.",
                'documents'          => [
                    ['document_id' => 1, 'document_name' => 'putusan-pengadilan.pdf', 'file_size' => '248.2 KB', 'document_type' => 'PDF'],
                    ['document_id' => 2, 'document_name' => 'sertifikat-tanah-shm.pdf', 'file_size' => '248.2 KB', 'document_type' => 'PDF'],
                ],
            ],
            [
                'booking_id'         => 9,
                'case_code'          => 'CASE-009',
                'consultation_title' => 'Pelanggaran Hak Cipta',
                'applicant_name'     => 'CV Kreatif Indo',
                'lawyer_id'          => null,
                'lawyer_name'        => 'Belum dipilih',
                'category_name'      => 'Bisnis',
                'legal_field_name'   => 'Bisnis',
                'created_at'         => '2 Mei 2025',
                'submitted_datetime' => '19 Oktober 2026, 14:15',
                'booking_status'     => 'Dalam Proses',
                'stage'              => 1,
                'doc_title'          => 'Pengajuan Bukti Hak Kekayaan Intelektual',
                'case_summary'       => "Klien melaporkan penggunaan aset desain komersial tanpa izin oleh pihak ketiga pada platform distribusi digital. Berkas sertifikat pencatatan ciptaan dan tangkapan layar pelanggaran telah dilampirkan untuk verifikasi.",
                'documents'          => [
                    ['document_id' => 3, 'document_name' => 'sertifikat-hki-kreatif.pdf', 'file_size' => '312.0 KB', 'document_type' => 'PDF'],
                ],
            ],
            [
                'booking_id'         => 6,
                'case_code'          => 'CASE-006',
                'consultation_title' => 'Perizinan Usaha',
                'applicant_name'     => 'PT Maju Jaya',
                'lawyer_id'          => null,
                'lawyer_name'        => 'Belum dipilih',
                'category_name'      => 'Bisnis',
                'legal_field_name'   => 'Bisnis',
                'created_at'         => '22 Apr 2025',
                'submitted_datetime' => '18 Oktober 2026, 11:05',
                'booking_status'     => 'Dalam Proses',
                'stage'              => 1,
                'doc_title'          => 'Permohonan Pendampingan Legalitas OSS & NIB',
                'case_summary'       => "Pemeriksaan kelengkapan akta pendirian perseroan, SK Kemenkumham, serta kendala sinkronisasi KBLI pada sistem perizinan berusaha.",
                'documents'          => [
                    ['document_id' => 4, 'document_name' => 'akta-pendirian-pt.pdf', 'file_size' => '520.4 KB', 'document_type' => 'PDF'],
                ],
            ],
            [
                'booking_id'         => 8,
                'case_code'          => 'CASE-008',
                'consultation_title' => 'Kasus KDRT',
                'applicant_name'     => 'Dewi Lestari',
                'lawyer_id'          => null,
                'lawyer_name'        => 'Belum dipilih',
                'category_name'      => 'Keluarga',
                'legal_field_name'   => 'Keluarga',
                'created_at'         => '18 Apr 2025',
                'submitted_datetime' => '17 Oktober 2026, 09:40',
                'booking_status'     => 'Dalam Proses',
                'stage'              => 1,
                'doc_title'          => 'Permohonan Perlindungan Hukum & Pendampingan',
                'case_summary'       => "Klien mengajukan permohonan pendampingan hukum terkait tindak kekerasan dalam rumah tangga beserta bukti hasil visum dan kronologi kejadian.",
                'documents'          => [
                    ['document_id' => 5, 'document_name' => 'laporan-kronologi.pdf', 'file_size' => '195.8 KB', 'document_type' => 'PDF'],
                ],
            ],
            [
                'booking_id'         => 7,
                'case_code'          => 'CASE-007',
                'consultation_title' => 'Sengketa Utang',
                'applicant_name'     => 'Rina Wati',
                'lawyer_id'          => null,
                'lawyer_name'        => 'Belum dipilih',
                'category_name'      => 'Perdata',
                'legal_field_name'   => 'Perdata',
                'created_at'         => '5 Apr 2025',
                'submitted_datetime' => '16 Oktober 2026, 16:20',
                'booking_status'     => 'Dalam Proses',
                'stage'              => 1,
                'doc_title'          => 'Pengajuan Somasi Wanprestasi Piutang',
                'case_summary'       => "Peninjauan perjanjian pinjam-meminjam bermaterai dan bukti transfer sebagai dasar penyusunan surat somasi pertama.",
                'documents'          => [
                    ['document_id' => 6, 'document_name' => 'perjanjian-pinjaman.pdf', 'file_size' => '210.5 KB', 'document_type' => 'PDF'],
                ],
            ],
            [
                'booking_id'         => 5,
                'case_code'          => 'CASE-005',
                'consultation_title' => 'Tindak Pidana Ringan',
                'applicant_name'     => 'Dimas Adi',
                'lawyer_id'          => null,
                'lawyer_name'        => 'Belum dipilih',
                'category_name'      => 'Pidana',
                'legal_field_name'   => 'Pidana',
                'created_at'         => '18 Mar 2025',
                'submitted_datetime' => '15 Oktober 2026, 13:10',
                'booking_status'     => 'Dalam Proses',
                'stage'              => 1,
                'doc_title'          => 'Pendampingan Pemeriksaan Kepolisian',
                'case_summary'       => "Permohonan pendampingan advokat untuk klarifikasi berita acara pemeriksaan tingkat penyidikan.",
                'documents'          => [
                    ['document_id' => 7, 'document_name' => 'surat-panggilan.pdf', 'file_size' => '180.2 KB', 'document_type' => 'PDF'],
                ],
            ],
            [
                'booking_id'         => 3,
                'case_code'          => 'CASE-003',
                'consultation_title' => 'Perceraian',
                'applicant_name'     => 'Siti Rahayu',
                'lawyer_id'          => null,
                'lawyer_name'        => 'Belum dipilih',
                'category_name'      => 'Keluarga',
                'legal_field_name'   => 'Keluarga',
                'created_at'         => '10 Mar 2025',
                'submitted_datetime' => '14 Oktober 2026, 10:00',
                'booking_status'     => 'Dalam Proses',
                'stage'              => 1,
                'doc_title'          => 'Pengajuan Gugatan Cerai & Hak Asuh',
                'case_summary'       => "Verifikasi buku nikah, kartu keluarga, dan akta kelahiran anak untuk pendaftaran gugatan di Pengadilan Agama.",
                'documents'          => [
                    ['document_id' => 8, 'document_name' => 'dokumen-nikah.pdf', 'file_size' => '275.0 KB', 'document_type' => 'PDF'],
                ],
            ],
            [
                'booking_id'         => 4,
                'case_code'          => 'CASE-004',
                'consultation_title' => 'Sengketa Waris',
                'applicant_name'     => 'Ahmad Fauzi',
                'lawyer_id'          => null,
                'lawyer_name'        => 'Belum dipilih',
                'category_name'      => 'Keluarga',
                'legal_field_name'   => 'Keluarga',
                'created_at'         => '2 Mar 2025',
                'submitted_datetime' => '13 Oktober 2026, 15:45',
                'booking_status'     => 'Dalam Proses',
                'stage'              => 1,
                'doc_title'          => 'Penetapan Ahli Waris & Pembagian Harta',
                'case_summary'       => "Pemeriksaan surat keterangan kematian, silsilah keluarga, dan daftar aset peninggalan pewaris.",
                'documents'          => [
                    ['document_id' => 9, 'document_name' => 'silsilah-ahli-waris.pdf', 'file_size' => '230.1 KB', 'document_type' => 'PDF'],
                ],
            ],
            [
                'booking_id'         => 2,
                'case_code'          => 'CASE-002',
                'consultation_title' => 'Perselisihan Kontrak',
                'applicant_name'     => 'Budi Santoso',
                'lawyer_id'          => null,
                'lawyer_name'        => 'Belum dipilih',
                'category_name'      => 'Bisnis',
                'legal_field_name'   => 'Bisnis',
                'created_at'         => '5 Feb 2025',
                'submitted_datetime' => '12 Oktober 2026, 11:30',
                'booking_status'     => 'Dalam Proses',
                'stage'              => 1,
                'doc_title'          => 'Analisis Sengketa Kontrak Pengadaan',
                'case_summary'       => "Peninjauan klausul penyelesaian sengketa dan perhitungan kerugian keterlambatan proyek.",
                'documents'          => [
                    ['document_id' => 10, 'document_name' => 'kontrak-kerjasama.pdf', 'file_size' => '412.6 KB', 'document_type' => 'PDF'],
                ],
            ],
            [
                'booking_id'         => 1,
                'case_code'          => 'CASE-001',
                'consultation_title' => 'Sengketa Tanah',
                'applicant_name'     => 'Andi Pratama',
                'lawyer_id'          => null,
                'lawyer_name'        => 'Belum dipilih',
                'category_name'      => 'Perdata',
                'legal_field_name'   => 'Perdata',
                'created_at'         => '12 Jan 2025',
                'submitted_datetime' => '10 Oktober 2026, 08:50',
                'booking_status'     => 'Dalam Proses',
                'stage'              => 1,
                'doc_title'          => 'Pengajuan Dokumen Awal Sengketa Tanah',
                'case_summary'       => "Pemeriksaan riwayat kepemilikan tanah girik dan batas wilayah sengketa dengan pihak tetangga.",
                'documents'          => [
                    ['document_id' => 11, 'document_name' => 'riwayat-tanah.pdf', 'file_size' => '298.4 KB', 'document_type' => 'PDF'],
                ],
            ],
        ];
    }

    private function getAvailableLawyers(): array
    {
        return [
            [
                'lawyer_id'      => 1,
                'full_name'      => 'Andi Pratama, S.H., M.H.',
                'specialization' => 'Perdata',
                'active_cases'   => 2,
                'match_score'    => '96% Cocok',
                'experience'     => '8 tahun pengalaman',
                'availability'   => 'Tersedia',
            ],
            [
                'lawyer_id'      => 2,
                'full_name'      => 'Siti Rahma, S.H.',
                'specialization' => 'Pidana',
                'active_cases'   => 3,
                'match_score'    => '92% Cocok',
                'experience'     => '6 tahun pengalaman',
                'availability'   => 'Tersedia',
            ],
            [
                'lawyer_id'      => 3,
                'full_name'      => 'Budi Santoso, S.H., M.Kn.',
                'specialization' => 'Bisnis',
                'active_cases'   => 1,
                'match_score'    => '95% Cocok',
                'experience'     => '9 tahun pengalaman',
                'availability'   => 'Tersedia',
            ],
            [
                'lawyer_id'      => 4,
                'full_name'      => 'Dewi Anggraini, S.H.',
                'specialization' => 'Keluarga',
                'active_cases'   => 2,
                'match_score'    => '94% Cocok',
                'experience'     => '7 tahun pengalaman',
                'availability'   => 'Tersedia',
            ],
        ];
    }

    private function getCasesMergedWithSession(): array
    {
        $cases = $this->getDefaultCases();
        $overrides = session('admin_case_overrides', []);

        return array_map(function ($item) use ($overrides) {
            $code = $item['case_code'];
            if (isset($overrides[$code])) {
                return array_merge($item, $overrides[$code]);
            }
            return $item;
        }, $cases);
    }

    public function index()
    {
        $admin = ['admin_id' => 1, 'full_name' => 'Admin', 'initial' => 'A'];
        $cases = $this->getCasesMergedWithSession();

        $stats = [
            'total'      => count($cases),
            'in_process' => count(array_filter($cases, fn($c) => $c['booking_status'] === 'Dalam Proses')),
            'categories' => count(array_unique(array_column($cases, 'category_name'))),
            'completed'  => count(array_filter($cases, fn($c) => $c['booking_status'] === 'Selesai')),
        ];

        return view('admin.perkara.index', compact('admin', 'cases', 'stats'));
    }

    public function show(string $caseCode)
    {
        $admin = ['admin_id' => 1, 'full_name' => 'Admin', 'initial' => 'A'];
        $cases = $this->getCasesMergedWithSession();
        $case = collect($cases)->firstWhere('case_code', $caseCode) ?? $cases[0];

        return view('admin.perkara.show', compact('admin', 'case'));
    }

    public function requestRevision(Request $request, string $caseCode)
    {
        $request->validate([
            'revision_note' => ['required', 'string', 'max:500'],
        ]);

        $overrides = session('admin_case_overrides', []);
        $overrides[$caseCode] = [
            'booking_status' => 'Perlu Perbaikan',
            'revision_note'  => $request->input('revision_note'),
        ];
        session(['admin_case_overrides' => $overrides]);

        return redirect()
            ->route('admin.perkara.index')
            ->with('success', "Permintaan perbaikan untuk perkara {$caseCode} telah dikirim kepada klien.");
    }

    public function seleksi(string $caseCode)
    {
        $admin = ['admin_id' => 1, 'full_name' => 'Admin', 'initial' => 'A'];
        $cases = $this->getCasesMergedWithSession();
        $case = collect($cases)->firstWhere('case_code', $caseCode) ?? $cases[0];
        $lawyers = $this->getAvailableLawyers();

        // Cari advokat rekomendasi utama berdasarkan bidang hukum perkara
        $recommendedLawyer = collect($lawyers)->firstWhere('specialization', $case['legal_field_name']) ?? $lawyers[0];

        return view('admin.perkara.seleksi', compact('admin', 'case', 'lawyers', 'recommendedLawyer'));
    }

    public function assignLawyer(Request $request, string $caseCode)
    {
        $validated = $request->validate([
            'selected_lawyer_id' => ['required', 'integer'],
        ], [
            'selected_lawyer_id.required' => 'Silakan jalankan seleksi atau pilih advokat pengganti terlebih dahulu.',
        ]);

        $lawyer = collect($this->getAvailableLawyers())->firstWhere('lawyer_id', (int) $validated['selected_lawyer_id']);
        $lawyerName = $lawyer['full_name'] ?? 'Advokat Terpilih';

        $overrides = session('admin_case_overrides', []);
        $overrides[$caseCode] = [
            'lawyer_id'      => (int) $validated['selected_lawyer_id'],
            'lawyer_name'    => $lawyerName,
            'booking_status' => 'Dalam Proses',
            'stage'          => 3,
        ];
        session(['admin_case_overrides' => $overrides]);

        return redirect()
            ->route('admin.perkara.index')
            ->with('success', "Penugasan {$lawyerName} untuk perkara {$caseCode} berhasil disetujui.");
    }
}